/**
 * This is The Scripts used for Awesome Photography/Portfolio Template
 *
 * @package RokoPhoto
 */

/* global WOW */
/* global slider_speed */
function main() {

	(function () {
		'use strict';

		// Page Loader
		// <![CDATA[
		jQuery( window ).load(
			function() { // makes sure the whole site is loaded
				jQuery( '#status' ).fadeOut(); // will first fade out the loading animation
				jQuery( '#preloader' ).delay( 350 ).fadeOut( 'slow' ); // will fade out the white DIV that covers the website.
				jQuery( 'body' ).delay( 350 ).css( {'overflow':'visible'} );
			}
		);
		// ]]>
		// Contact form toggle hide/show
		jQuery( document ).ready(
			function(){
				jQuery( '#show' ).click(
					function(){
						jQuery( '#contact' ).slideToggle( 'slow,swing' );
					}
				);
			}
		);

		// Wow animation
		if (typeof WOW !== 'undefined' && jQuery.isFunction( WOW )) {
			new WOW().init();
		}

		// Header/Vision carousel slider
		jQuery( '.carousel' ).carousel(
			{
				interval: slider_speed.slider_speed
			}
		);

		// jQuery for page scrolling feature - requires jQuery Easing plugin
		jQuery(
			function($) {
				$( 'a.page-scroll' ).bind(
					'click', function(event) {
						var $anchor = $( this );
						$( 'html, body' ).stop().animate(
							{
								scrollTop: $( $anchor.attr( 'href' ) ).offset().top
							}, 1500, 'easeInOutExpo'
						);
						event.preventDefault();
					}
				);
			}
		);

		// Highlight the top nav as scrolling occurs
		jQuery( 'body' ).scrollspy(
			{
				target: '.navbar-fixed-top'
			}
		);

		// Closes the Responsive Menu on Menu Item Click
		jQuery( '.navbar-collapse ul li a' ).click(
			function() {
				jQuery( '.navbar-toggle:visible' ).click();
			}
		);

		// Portfolio fix
		jQuery( document ).ready( portfolioItemWidth );
		jQuery( window ).resize( portfolioItemWidth );

		function portfolioItemWidth() {
			var $portfolioWrap = jQuery( '#portfolio' ),
				portfolioItem  = '.effect-portfolio';
			if ('undefined' !== typeof $portfolioWrap) {
				$portfolioWrap.find( portfolioItem ).each(
					function () {
						var width = jQuery( this ).find( 'figcaption' ).innerWidth() - 2 * parseInt( jQuery( 'figure.effect-portfolio figcaption' ).css( 'padding-left' ) );
						jQuery( this ).find( 'h2' ).css( 'width', width );
					}
				);
			}
		}

	}());

}
main();

var isMobile = {
	Android: function() {
		return navigator.userAgent.match( /Android/i );
	},
	BlackBerry: function() {
		return navigator.userAgent.match( /BlackBerry/i );
	},
	iOS: function() {
		return navigator.userAgent.match( /iPhone|iPad|iPod/i );
	},
	Opera: function() {
		return navigator.userAgent.match( /Opera Mini/i );
	},
	Windows: function() {
		return navigator.userAgent.match( /IEMobile/i );
	},
	any: function() {
		return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
	}
};

if ( isMobile.iOS() ) {
	var aboutSection                        = document.getElementById( 'about' );
	aboutSection.style.backgroundAttachment = 'initial';
	aboutSection.style.backgroundSize       = 'initial';
}
