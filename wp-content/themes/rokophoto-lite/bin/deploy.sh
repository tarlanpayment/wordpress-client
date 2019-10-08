#!/bin/bash

# We run this just one time, for a first job from the buid and just at once after_deploy hook.
if ! [ "$AFTER_DEPLOY_RUN" ] && [ "$TRAVIS_PHP_VERSION" == "$DEPLOY_BUILD" ]; then

    # Flag the run in order to not be trigged again on the next after_deploy.
        export AFTER_DEPLOY_RUN=1;
        echo " Started deploy script. ";

    # Setup git username and email.

        git config user.name "selul"
        git config user.email "$GITHUB_EMAIL"
        git fetch

     # Check if we already have a tag with this version.
     if ! git rev-parse "v$THEMEISLE_VERSION" >/dev/null 2>&1
        then

    # Send changelog changes to git.
        git checkout "$MASTER_BRANCH"
        git add -v .

        # We use [skip ci] in message to prevent this commit to trigger the build.
        git commit -a -m "ci: Updating changelog for v$THEMEISLE_VERSION [skip ci]" --no-verify
        git push --quiet "https://${GITHUB_TOKEN}@github.com/$UPSTREAM_REPO.git" HEAD:"$MASTER_BRANCH"

    # Tag the new release.
        git tag -a "v$THEMEISLE_VERSION" -m "[AUTO] Release of $THEMEISLE_VERSION ";
        git push --quiet "https://${GITHUB_TOKEN}@github.com/$UPSTREAM_REPO.git"  --tags ;
        sleep 5;

    # Sends the api call for creating the release.
    # We use this as the travis release provider does not offer any way
    # to set the body of the release.
        API_JSON='{"tag_name": "v'$THEMEISLE_VERSION'","target_commitish": "'$MASTER_BRANCH'","name": "v'$THEMEISLE_VERSION'","body": "'$CHANGES'","draft": false,"prerelease": false}';
        curl -s --data  "$API_JSON" "https://api.github.com/repos/$UPSTREAM_REPO/releases?access_token=$GITHUB_TOKEN"  > /dev/null;

		if [ "$STORE_URL" == "https://themeisle.com" ]; then
			export STORE_URL="https://store.themeisle.com"
		fi
        # Send update to the store
        if [ ! -z "$THEMEISLE_ID" ]; then
            STORE_JSON='{"version": "'$THEMEISLE_VERSION'","id": "'$THEMEISLE_ID'","body": "'$CHANGES'"}';
            echo "$STORE_JSON";
            curl -X POST -H 'Cache-Control: no-cache' -H "Content-Type: application/json" -H "x-themeisle-auth: $THEMEISLE_AUTH"  --data "$STORE_JSON" "$STORE_URL/wp-json/edd-so/v1/update_changelog/" > /dev/null
        fi

         # Send update to the store
         if [ ! -z "$THEMEISLE_LITE_ID" ]; then
            STORE_JSON='{"version": "'$THEMEISLE_VERSION'","id": "'$THEMEISLE_LITE_ID'","body": "'$CHANGES'"}';
            echo "$STORE_JSON";
            curl -X POST -H 'Cache-Control: no-cache' -H "Content-Type: application/json" -H "x-themeisle-auth: $THEMEISLE_AUTH"  --data "$STORE_JSON" "$STORE_URL/wp-json/edd-so/v1/update_changelog/"  > /dev/null
         fi
    fi

    # Send the distribution files to demo server.

        if [ -f "/tmp/key" ]; then
            # Adding the ssh key to the agent.
            eval "$(ssh-agent -s)"
            chmod 600 /tmp/key
            ssh-add /tmp/key

            # Creating the maintenance file.
            echo "<?php \$upgrading = time(); ?>" > .maintenance
            # rsync the maintenance file.
            grunt rsync:start


            # Copy the dist folder.
            grunt rsync:prod

            #Copy the lite version, if there is one.

            if [ ! -z "$DEMO_THEMEISLE_LITE_PATH" ]; then
                grunt rsync:lite
            fi;

            #Removing the maintenance.
            echo -n > .maintenance
            grunt rsync:end
            rm -rf .maintenance
        fi

     # Upload to Wordpress SVN
     if [ ! -z "$WPORG_PASS" ]; then

            svn co -q "http://svn.wp-plugins.org/$THEMEISLE_REPO" svn

            # Move out the trunk directory to a temp location
            mv svn/trunk ./svn-trunk
            # Create trunk directory
            mkdir svn/trunk
            # Copy our new version of the plugin into trunk
            rsync -r -p dist/* svn/trunk

            # Copy all the .svn folders from the checked out copy of trunk to the new trunk.
            # This is necessary as the Travis container runs Subversion 1.6 which has .svn dirs in every sub dir
            cd svn/trunk/ || exit
            TARGET=$(pwd)
            cd ../../svn-trunk/ || exit

            # Find all .svn dirs in sub dirs
            SVN_DIRS=$(find . -type d -iname .svn)

            for SVN_DIR in $SVN_DIRS; do
                SOURCE_DIR=${SVN_DIR/.}
                TARGET_DIR=$TARGET${SOURCE_DIR/.svn}
                TARGET_SVN_DIR=$TARGET${SVN_DIR/.}
                if [ -d "$TARGET_DIR" ]; then
                    # Copy the .svn directory to trunk dir
                    cp -r "$SVN_DIR" "$TARGET_SVN_DIR"
                fi
            done

            # Back to builds dir
            cd ../ || exit
            rm -fR svn-trunk

            # Add new version
            mkdir -p svn/tags/"$THEMEISLE_VERSION"
            rsync -r -p  dist/* svn/tags/"$THEMEISLE_VERSION"

            # Add new files to SVN
            svn stat svn | grep '^?' | awk '{print $2}' | xargs -I x svn add x@
            # Remove deleted files from SVN
            svn stat svn | grep '^!' | awk '{print $2}' | xargs -I x svn rm --force x@

            svn stat svn

            # Commit to SVN
            svn commit svn   --no-auth-cache  -m "Release  v$THEMEISLE_VERSION" --username "$WPORG_USER" --password "$WPORG_PASS"

            # Remove svn dir.
            rm -fR svn

     fi


     #Get the lite name from the package.json file.
     export LITE_NAME
     LITE_NAME=$(node -pe "require('./package.json').litename");

    if [ "$LITE_REPO_SYNC" ] && [ "$LITE_NAME" ]; then
        # Check if the dist folder already exists. If not, run grunt deploy.
        if [ ! -d "dist" ]; then
            grunt deploy
        fi
        # Remove lite if is already there (we need to clone the repo here).
        if [ -d ../"$LITE_NAME" ]; then
            rm -rf ../"$LITE_NAME"
        fi
        # Clone the lite repo in the same place that the lite version will be generated.
        git clone https://github.com/"$LITE_REPO_SYNC" -b master ../"$LITE_NAME"
        # Copy the files from the lite version in dist to the cloned repo folder (recursive | verbose).
        cp -Rv dist/"$LITE_NAME"/* ../"$LITE_NAME"/
        # Change dir into the cloned repo folder.
        cd ../"$LITE_NAME"/ || exit

        # Commit and push
        git add -Av
        git commit -am "Version v$THEMEISLE_VERSION" --no-verify
        git push --quiet

        # Tag release
        git tag -a "v$THEMEISLE_VERSION" -m "Release of $THEMEISLE_VERSION";
        git push --quiet --tags;

        # Go back to build directory.
        cd "$TRAVIS_BUILD_DIR" || exit
    fi

fi;
