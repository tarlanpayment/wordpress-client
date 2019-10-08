/**
 * SmoothScroll js
 *
 * @package RokoPhoto
 */
jQuery( document ).ready(
	function() {

		/*** SMOOTH SCROLL TO FRONPAGE SECTIONS */
		/* when click on menu item that correspons to a section scroll to that section */
		jQuery( '.navbar-nav a[href*="#"]:not([href="#"])' ).click(
			function() {

				if (location.pathname.replace( /^\//,'' ) === this.pathname.replace( /^\//,'' ) && location.hostname === this.hostname) {

					var target = jQuery( this.hash );
					target     = target.length ? target : jQuery( '[name=' + this.hash.slice( 1 ) + ']' );
					if (target.length) {
						jQuery( 'html,body' ).animate(
							{
								scrollTop: target.offset().top
							}, 1200
						);
						return false;
					}
				}

			}
		);
	}
);
