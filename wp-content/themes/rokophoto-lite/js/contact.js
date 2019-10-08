/**
 * Contact js
 *
 * @package RokoPhoto
 */

/*global SiteParameters*/
jQuery(
	function($) {

		$( 'input,textarea' ).jqBootstrapValidation(
			{
				preventSubmit: true,
				submitError: function() {
					// additional error messages or events
				},
				submitSuccess: function($form, event) {
					event.preventDefault(); // prevent default submit behaviour
					// get values from FORM
					var name         = $( 'input#name' ).val();
					var email        = $( 'input#email' ).val();
					var phone        = $( 'input#phone' ).val();
					var message      = $( 'textarea#message' ).val();
					var firstName    = name; // For Success/Failure Message
					var emailaddress = SiteParameters.email_script;
					// Check for white space in name for Success/Fail message
					if (firstName.indexOf( ' ' ) >= 0) {
						firstName = name.split( ' ' ).slice( 0, -1 ).join( ' ' );
					}
					$.ajax(
						{
							url: SiteParameters.contact_script,
							type: 'POST',
							data: {
								name: name,
								phone: phone,
								email: email,
								message: message,
								emailaddress: emailaddress
							},
							cache: false,
							success: function() {
								// Success message
								$( '#success' ).html( '<div class="alert alert-success">' );
								$( '#success > .alert-success' ).html( '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;' )
								.append( '</button>' );
								$( '#success > .alert-success' )
								.append( '<strong>Your message has been sent. </strong>' );
								$( '#success > .alert-success' )
								.append( '</div>' );

								// clear all fields
								$( '#contactForm' ).trigger( 'reset' );
							},
							error: function() {
								// Fail message
								$( '#success' ).html( '<div class="alert alert-danger">' );
								$( '#success > .alert-danger' ).html( '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;' )
								.append( '</button>' );
								$( '#success > .alert-danger' ).append( '<strong>Sorry ' + firstName + ', it seems that my mail server is not responding. Please try again later!' );
								$( '#success > .alert-danger' ).append( '</div>' );
								// clear all fields
								$( '#contactForm' ).trigger( 'reset' );
							}
						}
					);
				},
				filter: function() {
					return $( this ).is( ':visible' );
				},
			}
		);

		$( 'a[data-toggle="tab"]' ).click(
			function(e) {
				e.preventDefault();
				$( this ).tab( 'show' );
			}
		);
	}
);


/*When clicking on Full hide fail/success boxes */
jQuery( '#name' ).focus(
	function() {
		jQuery( '#success' ).html( '' );
	}
);
