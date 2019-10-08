/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @package RokoPhoto
 */

/*global requestpost*/
( function( $ ) {

	// Site title
	wp.customize(
		'blogname', function( value ) {
			value.bind(
				function( to ) {
					$( 'a.navbar-brand h4' ).text( to );
				}
			);
		}
	);

	// Site Logo
	wp.customize(
		'rokophoto_logo_image', function(value) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.navbar-brand-title' ).addClass( 'rokophoto_only_customizer' );
						$( '.navbar-brand-logo' ).removeClass( 'rokophoto_only_customizer' );
						$( '.navbar-brand img' ).attr( 'src', to );
					} else {
						$( '.navbar-brand-title' ).removeClass( 'rokophoto_only_customizer' );
						$( '.navbar-brand-logo' ).addClass( 'rokophoto_only_customizer' );
					}
				}
			);
		}
	);

	// [Color] Menu Background (After sliding)
	wp.customize(
		'rokophoto_menu_background', function( value ) {
			value.bind(
				function( to ) {
					if ( '' !== to ) {
						$( '.navbar-default.navbar-shrink' ).attr( 'style','background:' + to );
					} else {
						$( '.ribbon-wrap' ).removeAttr( 'style' );
					}
				}
			);
		}
	);

	// [Color] Menu Items
	wp.customize(
		'rokophoto_menu_color', function( value ) {
			value.bind(
				function( to ) {
					if ( '' !== to ) {
						$( '.navbar-default .nav li a' ).attr( 'style','color:' + to );
					} else {
						$( '.navbar-default .nav li a' ).removeAttr( 'style' );
					}
				}
			);
		}
	);

	// [Sub-Header] Welcome to
	wp.customize(
		'rokophoto_subhead_title', function( value ) {
			value.bind(
				function( to ) {
					$( '.centered.vision-border h4' ).text( to );
				}
			);
		}
	);

	// [Frontpage: Slider][Slider Settings] Disable Slider
	wp.customize(
		'rokophoto_slider_display_settings', function( value ) {
			value.bind(
				function( to ) {
					if ( to === true ) {
						$( '#banner' ).addClass( 'rokophoto_only_customizer' );
					} else {
						$( '#banner' ).removeClass( 'rokophoto_only_customizer' );
					}
				}
			);
		}
	);

	// [Frontpage: Slider][Slider Colors] Banner opacity
	wp.customize(
		'rokophoto_slider_colors_banner_opacity', function( value ) {
			value.bind(
				function( to ) {
					if ( '' !== to ) {
						$( '.carousel-content-wrap' ).attr( 'style','background:' + to );
					} else {
						$( '.carousel-content-wrap' ).removeAttr( 'style' );
					}
				}
			);
		}
	);

	// [Frontpage: Slider][Slider Colors] Text color
	wp.customize(
		'rokophoto_slider_colors_text', function( value ) {
			value.bind(
				function( to ) {
					if ( '' !== to ) {
						$( '.carousel-caption h1' ).attr( 'style','color:' + to );
					} else {
						$( '.carousel-caption h1' ).removeAttr( 'style' );
					}
				}
			);
		}
	);

	// [Frontpage: Slider][Slide One] Slide Image
	wp.customize(
		'rokophoto_slider_one_image', function( value ) {
			value.bind(
				function( to ) {
					var $element = $( '.item-slider-one a.slider-item-wrap' );
					if ( '' !== to ) {
						$element.attr( 'style','background-image: url(' + to + ')' );
					} else {
						$element.removeAttr( 'style' );
					}
				}
			);
		}
	);

	// [Frontpage: Slider][Slide One] Slide Text
	wp.customize(
		'rokophoto_slider_one_text', function( value ) {
			value.bind(
				function( to ) {
					$( '.item-slider-one h1' ).text( to );
				}
			);
		}
	);

	// [Frontpage: Slider][Slide Two] Slide Image
	wp.customize(
		'rokophoto_slider_two_image', function( value ) {
			value.bind(
				function( to ) {
					var $element = $( '.item-slider-two a.slider-item-wrap' );
					if ( '' !== to ) {
						$element.attr( 'style','background-image: url(' + to + ')' );
					} else {
						$element.removeAttr( 'style' );
					}
				}
			);
		}
	);

	// [Frontpage: Slider][Slide Two] Slide Text
	wp.customize(
		'rokophoto_slider_two_text', function( value ) {
			value.bind(
				function( to ) {
					$( '.item-slider-two h1' ).text( to );
				}
			);
		}
	);

	// [Frontpage: Slider][Slide Three] Slide Image
	wp.customize(
		'rokophoto_slider_three_image', function( value ) {
			value.bind(
				function( to ) {
					var $element = $( '.item-slider-three a.slider-item-wrap' );
					if ( '' !== to ) {
						$element.attr( 'style','background-image: url(' + to + ')' );
					} else {
						$element.removeAttr( 'style' );
					}
				}
			);
		}
	);

	// [Frontpage: Slider][Slide Three] Slide Text
	wp.customize(
		'rokophoto_slider_three_text', function( value ) {
			value.bind(
				function( to ) {
					$( '.item-slider-three h1' ).text( to );
				}
			);
		}
	);

	// [Frontpage: Slider][Slide Four] Slide Image
	wp.customize(
		'rokophoto_slider_four_image', function( value ) {
			value.bind(
				function( to ) {
					var $element = $( '.item-slider-four a.slider-item-wrap' );
					if ( '' !== to ) {
						$element.attr( 'style','background-image: url(' + to + ')' );
					} else {
						$element.removeAttr( 'style' );
					}
				}
			);
		}
	);

	// [Frontpage: Slider][Slide Four] Slide Text
	wp.customize(
		'rokophoto_slider_four_text', function( value ) {
			value.bind(
				function( to ) {
					$( '.item-slider-four h1' ).text( to );
				}
			);
		}
	);

	// [Frontpage: Slider][Slide Five] Slide Image
	wp.customize(
		'rokophoto_slider_five_image', function( value ) {
			value.bind(
				function( to ) {
					var $element = $( '.item-slider-five a.slider-item-wrap' );
					if ( '' !== to ) {
						$element.attr( 'style','background-image: url(' + to + ')' );
					} else {
						$element.removeAttr( 'style' );
					}
				}
			);
		}
	);

	// [Frontpage: Slider][Slide Five] Slide Text
	wp.customize(
		'rokophoto_slider_five_text', function( value ) {
			value.bind(
				function( to ) {
					$( '.item-slider-five h1' ).text( to );
				}
			);
		}
	);

	// [Frontpage: Vision][Vision Settings] Disable Vision
	wp.customize(
		'rokophoto_vision_display_settings', function( value ) {
			value.bind(
				function( to ) {
					var $element = $( '#vision #carousel-example-generic' );
					if ( to !== true ) {
						$element.removeClass( 'rokophoto_only_customizer' );
					} else {
						$element.addClass( 'rokophoto_only_customizer' );
					}
				}
			);
		}
	);

	// [Frontpage: Vision][Vision Settings] Vision Background Image
	wp.customize(
		'rokophoto_vision_image', function( value ) {
			value.bind(
				function( to ) {
					var $element = $( '#vision' );
					if ( '' !== to ) {
						$element.attr( 'style','background-image: url(' + to + ')' );
					} else {
						$element.removeAttr( 'style' );
					}
				}
			);
		}
	);

	// [Frontpage: Vision][Vision Colors] Background
	wp.customize(
		'rokophoto_vision_colors_opacity', function( value ) {
			value.bind(
				function( to ) {
					if ( '' !== to ) {
						$( '#vision #carousel-example-generic' ).attr( 'style','background:' + to );
					} else {
						$( '#vision #carousel-example-generic' ).removeAttr( 'style' );
					}
				}
			);
		}
	);

	// [Frontpage: Vision][Vision Colors] Text color
	wp.customize(
		'rokophoto_vision_colors_text', function( value ) {
			value.bind(
				function( to ) {
					if ( '' !== to ) {
						$( '#vision .vision-border' ).attr( 'style', 'color:' + to + '; border-color:' + to );
					} else {
						$( '#vision .vision-border' ).removeAttr( 'style' );
					}
				}
			);
		}
	);

	// [Frontpage: Vision][Vision One] Disable First Slide
	/*  wp.customize( 'rokophotolite_vision_one_text_display', function( value ) {
		value.bind( function( to ) {
			var $element = $( '#vision .item-vision-one' );
			if ( to !== true ) {
				$element.removeClass('rokophoto_only_customizer');
			} else {
				$element.addClass('rokophoto_only_customizer');
			}
		} );
	} );
	*/
	// [Frontpage: Vision][Vision One] First Line
	wp.customize(
		'rokophoto_vision_one_text_one', function( value ) {
			value.bind(
				function( to ) {
					$( '#vision .item-vision-one .vision-border h4' ).text( to );
				}
			);
		}
	);

	// [Frontpage: Vision][Vision One] Second Line
	wp.customize(
		'rokophoto_vision_one_text_two', function( value ) {
			value.bind(
				function( to ) {
					$( '#vision .item-vision-one .vision-border h2' ).text( to );
				}
			);
		}
	);

	// [Frontpage: Vision][Vision One] Third Line
	wp.customize(
		'rokophoto_vision_one_text_three', function( value ) {
			value.bind(
				function( to ) {
					$( '#vision .item-vision-one .vision-border h6' ).text( to );
				}
			);
		}
	);

	// [Frontpage: Vision][Vision Two] Disable Second Slide
	/*  wp.customize( 'rokophotolite_vision_two_text_display', function( value ) {
		value.bind( function( to ) {
			var $element = $( '#vision .item-vision-two' );
			if ( to !== true ) {
				$element.removeClass('rokophoto_only_customizer');
			} else {
				$element.addClass('rokophoto_only_customizer');
			}
		} );
	} );
	*/

	// [Frontpage: Vision][Vision Two] First Line
	wp.customize(
		'rokophoto_vision_two_text_one', function( value ) {
			value.bind(
				function( to ) {
					$( '#vision .item-vision-two .vision-border h4' ).text( to );
				}
			);
		}
	);

	// [Frontpage: Vision][Vision Two] Second Line
	wp.customize(
		'rokophoto_vision_two_text_two', function( value ) {
			value.bind(
				function( to ) {
					$( '#vision .item-vision-two .vision-border h2' ).text( to );
				}
			);
		}
	);

	// [Frontpage: Vision][Vision Two] Third Line
	wp.customize(
		'rokophoto_vision_two_text_three', function( value ) {
			value.bind(
				function( to ) {
					$( '#vision .item-vision-two .vision-border h6' ).text( to );
				}
			);
		}
	);

	/*  // [Frontpage: Vision][Vision Three] Disable Third Slide
	wp.customize( 'rokophotolite_vision_three_text_display', function( value ) {
		value.bind( function( to ) {
			var $element = $( '#vision .item-vision-three' );
			if ( to !== true ) {
				$element.removeClass('rokophoto_only_customizer');
			} else {
				$element.addClass('rokophoto_only_customizer');
			}
		} );
	} );
	*/

	// [Frontpage: Vision][Vision Three] First Line
	wp.customize(
		'rokophoto_vision_three_text_one', function( value ) {
			value.bind(
				function( to ) {
					$( '#vision .item-vision-three .vision-border h4' ).text( to );
				}
			);
		}
	);

	// [Frontpage: Vision][Vision Three] Second Line
	wp.customize(
		'rokophoto_vision_three_text_two', function( value ) {
			value.bind(
				function( to ) {
					$( '#vision .item-vision-three .vision-border h2' ).text( to );
				}
			);
		}
	);

	// [Frontpage: Vision][Vision Three] Third Line
	wp.customize(
		'rokophoto_vision_three_text_three', function( value ) {
			value.bind(
				function( to ) {
					$( '#vision .item-vision-three .vision-border h6' ).text( to );
				}
			);
		}
	);

	// [Frontpage: Portfolio][Portfolio Settings] Disable Portfolio
	wp.customize(
		'rokophoto_portfolio_display_settings', function( value ) {
			value.bind(
				function( to ) {
					var $element = $( '#portfolio, .light-overlay.ptitle' );
					if ( to !== true ) {
						$element.removeClass( 'rokophoto_only_customizer' );
					} else {
						$element.addClass( 'rokophoto_only_customizer' );
					}
				}
			);
		}
	);

	wp.customize(
		'rokophoto_portfolio_display_settings', function( value ) {
			value.bind(
				function( to ) {
					var $element = $( '#portfolio, .light-overlay.ptitle' );
					if ( to !== true ) {
						$element.removeClass( 'rokophoto_only_customizer' );
					} else {
						$element.addClass( 'rokophoto_only_customizer' );
					}
				}
			);
		}
	);

	wp.customize(
		'rokophoto_portfolio_link_to_single', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== true) {
						$( '.portfolio-link' ).each(
							function () {
								var id = $( this ).attr( 'data-id' );
								$( this ).attr( 'href','#portfolioModa' + id );
							}
						);
					} else {
						var post_ids = [];
						$( '.portfolio-link' ).each(
							function () {
								var id = $( this ).attr( 'data-id' );
								post_ids.push( id );
							}
						);
						$.ajax(
							{
								url: requestpost.ajaxurl,
								type: 'post',
								data: {
									ids: JSON.stringify( post_ids ),
									action: 'request_post'
								},
								success: function( result ) {
									var i             = 0;
									var decode_result = JSON.parse( result );
									$( '.portfolio-link' ).each(
										function () {
												$( this ).attr( 'href',decode_result[i] );
												i++;
										}
									);
								}
							}
						);
					}
				}
			);
		}
	);

	// [Frontpage: Portfolio][Portfolio Settings] Section Heading
	wp.customize(
		'rokophoto_portfolio_heading', function( value ) {
			value.bind(
				function( to ) {
					$( '.ptitle h2' ).text( to );
				}
			);
		}
	);

	// [Frontpage: Portfolio][Portfolio Settings] Section Sub-heading
	wp.customize(
		'rokophoto_portfolio_subheading', function( value ) {
			value.bind(
				function( to ) {
					$( '.ptitle h5' ).text( to );
				}
			);
		}
	);

	// [---] [Frontpage: Portfolio][Portfolio Settings] Item Count
	// [Frontpage: Portfolio][Portfolio Colors] Header Background
	wp.customize(
		'rokophoto_portfolio_header_background', function( value ) {
			value.bind(
				function( to ) {
					if ( '' !== to ) {
						$( '.light-overlay' ).attr( 'style', 'background:' + to );
					} else {
						$( '.light-overlay' ).removeAttr( 'style' );
					}
				}
			);
		}
	);

	// [Frontpage: Portfolio][Portfolio Colors] Header Text
	wp.customize(
		'rokophoto_portfolio_text', function( value ) {
			value.bind(
				function( to ) {
					if ( '' !== to ) {
						$( '.ptitle h2,.ptitle h5' ).attr( 'style', 'color:' + to );
					} else {
						$( '.ptitle h2,.ptitle h5' ).removeAttr( 'style' );
					}
				}
			);
		}
	);

	// [Frontpage: Ribbon][Ribbon Settings] Disable Ribbon
	wp.customize(
		'rokophoto_ribbon_display_settings', function( value ) {
			value.bind(
				function( to ) {
					var $element = $( '#subscribe' );
					if ( to !== true ) {
						$element.removeClass( 'rokophoto_only_customizer' );
					} else {
						$element.addClass( 'rokophoto_only_customizer' );
					}
				}
			);
		}
	);

	// [Frontpage: Ribbon][Ribbon Content] Text
	wp.customize(
		'rokophoto_ribbon_text', function( value ) {
			value.bind(
				function( to ) {
					$( '#subscribe p > span' ).text( to );
				}
			);
		}
	);

	// [Frontpage: Ribbon][Ribbon Content] Button Text
	wp.customize(
		'rokophoto_ribbon_button', function( value ) {
			value.bind(
				function( to ) {
					$( '#subscribe a > span' ).text( to );
				}
			);
		}
	);

	// [---] [Frontpage: Ribbon][Ribbon Content] Button Link
	// [Frontpage: Ribbon][Ribbon Colors] Background
	wp.customize(
		'rokophoto_ribbon_background', function( value ) {
			value.bind(
				function( to ) {
					if ( '' !== to ) {
						$( '#subscribe' ).attr( 'style', 'background:' + to );
					} else {
						$( '#subscribe' ).removeAttr( 'style' );
					}
				}
			);
		}
	);

	// [Frontpage: Ribbon][Ribbon Colors] Text/Button
	wp.customize(
		'rokophoto_ribbon_text_color', function( value ) {
			value.bind(
				function( to ) {
					if ( '' !== to ) {
						$( '#subscribe .row' ).attr( 'style', 'color:' + to );
						$( '#subscribe span.right' ).attr( 'style', 'color:' + to + '; border-color:' + to );
					} else {
						$( '#subscribe row, #subscribe span.right' ).removeAttr( 'style' );
					}
				}
			);
		}
	);

	// [---] [Frontpage: Ribbon][Ribbon Colors] Button (Hover)
	// [Frontpage: About][About Settings] Disable About
	wp.customize(
		'rokophoto_about_display_settings', function( value ) {
			value.bind(
				function( to ) {
					var $element = $( '#about' );
					if ( to !== true ) {
						$element.removeClass( 'rokophoto_only_customizer' );
					} else {
						$element.addClass( 'rokophoto_only_customizer' );
					}
				}
			);
		}
	);

	// [Frontpage: About][About Settings] Background Image
	wp.customize(
		'rokophoto_about_image', function( value ) {
			value.bind(
				function( to ) {
					var $element = $( '#about' );
					if ( '' !== to ) {
						$element.attr( 'style', 'background-image: url(' + to + ')' );
					} else {
						$element.removeAttr( 'style' );
					}
				}
			);
		}
	);

	// [Frontpage: About][About Content] Name
	wp.customize(
		'rokophoto_about_name', function( value ) {
			value.bind(
				function( to ) {
					$( '#about h2' ).text( to );
				}
			);
		}
	);

	// [Frontpage: About][About Content] Address
	wp.customize(
		'rokophoto_about_address', function( value ) {
			value.bind(
				function( to ) {
					$( '#about p.large-address' ).text( to );
				}
			);
		}
	);

	// [Frontpage: About][About Content] Website
	wp.customize(
		'rokophoto_about_website', function( value ) {
			value.bind(
				function( to ) {
					$( '#about p.small' ).text( to );
				}
			);
		}
	);

	// [Frontpage: About][About Content] Heading
	wp.customize(
		'rokophoto_about_heading', function( value ) {
			value.bind(
				function( to ) {
					$( '#about p.large-heading' ).text( to );
				}
			);
		}
	);

	// [Frontpage: About][About Content] Bio
	wp.customize(
		'rokophoto_about_bio', function( value ) {
			value.bind(
				function( to ) {
					$( '#about p.atext' ).html( to );
				}
			);
		}
	);

	// [Frontpage: About][About Colors] Text
	// wp.customize( 'rokophotolite_about_text', function( value ) {
	// value.bind( function( to ) {
	// if ( '' !== to ) {
	// $( '#about, #about h2' ).attr( 'style', 'color:'+to );
	// $( '#about h2' ).attr( 'style', 'border-color:'+to );
	// } else {
	// $( '#about, #about h2' ).removeAttr('style');
	// }
	// } );
	// } );
	wp.customize(
		'rokophoto_about_text', function( value ) {
			value.bind(
				function( to ) {
					if ( '' !== to ) {
						$( '.about-content' ).attr( 'style', 'color:' + to );
						$( '#about h2' ).attr( 'style', 'border-color:' + to );
					} else {
						$( '.about-content, #about h2' ).removeAttr( 'style' );
					}
				}
			);
		}
	);

	// [Frontpage: Contact][Contact Settings] Disable Contact
	wp.customize(
		'rokophoto_contact_display_settings', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== true ) {
						$( '#footer, #contact' ).removeClass( 'rokophoto_only_customizer' );
					} else {
						$( '#footer, #contact' ).addClass( 'rokophoto_only_customizer' );
					}
				}
			);
		}
	);

	// [---] [Frontpage: Contact][Contact Settings] Custom Form Shortcode
	// [Frontpage: Contact][Contact Settings] Section Title
	wp.customize(
		'rokophoto_contact_heading', function( value ) {
			value.bind(
				function( to ) {
					$( '#footer a > h2' ).text( to );
				}
			);
		}
	);

	// [Frontpage: Contact][Contact Details] Email
	wp.customize(
		'rokophoto_contact_email', function( value ) {
			value.bind(
				function( to ) {
					$( '.contact-footer-email' ).text( to );
				}
			);
		}
	);

	// [Frontpage: Contact][Contact Details] Website
	wp.customize(
		'rokophoto_contact_website', function( value ) {
			value.bind(
				function( to ) {
					$( '.contact-footer-website' ).text( to );
				}
			);
		}
	);

	// [Frontpage: Contact][Contact Colors] Background
	wp.customize(
		'rokophoto_contact_background', function( value ) {
			value.bind(
				function( to ) {
					if ( '' !== to ) {
						$( '#footer, section#contact' ).attr( 'style', 'background:' + to );
					} else {
						$( '#footer, section#contact' ).removeAttr( 'style' );
					}
				}
			);
		}
	);

	// [Frontpage: Contact][Contact Colors] Text
	wp.customize(
		'rokophoto_contact_text', function( value ) {
			value.bind(
				function( to ) {
					if ( '' !== to ) {
						$( '#footer h2, #contact .btn' ).attr( 'style', 'color:' + to + ';border: 2px solid ' + to );
						$( '#contact .form-control' ).attr( 'style', 'color:' + to + ';border: 1px solid ' + to );
						$( '#footer p, #footer .contact-footer-email a, #footer .contact-footer-website a' ).attr( 'style', 'color:' + to );
					} else {
						$( '#footer h2, #contact .btn' ).removeAttr( 'style' );
						$( '#contact .form-control' ).removeAttr( 'style' );
						$( '#footer p' ).removeAttr( 'style' );
					}
				}
			);
		}
	);

	// [---] [Frontpage: Contact][Contact Colors] Button (Hover)
	// [Frontpage: Slider][Slider Settings] Disable Slider
	wp.customize(
		'rokophoto_social_display_settings', function( value ) {
			value.bind(
				function( to ) {
					if ( to === true ) {
						$( '#socials' ).addClass( 'rokophoto_only_customizer' );
						$( '#bsocials' ).addClass( 'rokophoto_only_customizer' );
					} else {
						$( '#socials' ).removeClass( 'rokophoto_only_customizer' );
						$( '#bsocials' ).removeClass( 'rokophoto_only_customizer' );
					}
				}
			);
		}
	);

	// [Footer] Social Box Label
	wp.customize(
		'rokophoto_social_label', function( value ) {
			value.bind(
				function( to ) {
					$( '#socials .social-label, #bsocials .social-label' ).text( to );
				}
			);
		}
	);

	// [Footer] Social Box Text
	wp.customize(
		'rokophoto_social_text', function( value ) {
			value.bind(
				function( to ) {
					$( '#socials .social-text .follow, #bsocials .social-text .follow' ).text( to );
				}
			);
		}
	);

	// [Footer] Facebook URL
	wp.customize(
		'rokophoto_facebook_link', function( value ) {
			value.bind(
				function( to ) {
					if ( '' !== to ) {
						var $social = $( '#socials .social-fa, #bsocials .social-fa' );
						$social.removeClass( 'rokophoto_only_customizer' );
						$social.find( 'a' ).attr( 'href', to );
					} else {
						$( '#socials .social-fa' ).addClass( 'rokophoto_only_customizer' );
					}
				}
			);
		}
	);

	// [Footer] Twitter URL
	wp.customize(
		'rokophoto_twitter_link', function( value ) {
			value.bind(
				function( to ) {
					var $social = $( '#socials .social-tw, #bsocials .social-tw' );
					if ( '' !== to ) {
						$social.removeClass( 'rokophoto_only_customizer' );
						$social.find( 'a' ).attr( 'href', to );
					} else {
						$social.addClass( 'rokophoto_only_customizer' );
					}
				}
			);
		}
	);

	// [Footer] Behance URL
	wp.customize(
		'rokophoto_behance_link', function( value ) {
			value.bind(
				function( to ) {
					var $social = $( '#socials .social-be, #bsocials .social-be' );
					if ( '' !== to ) {
						$social.removeClass( 'rokophoto_only_customizer' );
						$social.find( 'a' ).attr( 'href', to );
					} else {
						$social.addClass( 'rokophoto_only_customizer' );
					}
				}
			);
		}
	);

	// [Footer] Dribbble URL
	wp.customize(
		'rokophoto_dribbble_link', function( value ) {
			value.bind(
				function( to ) {
					var $social = $( '#socials .social-dr, #bsocials .social-dr' );
					if ( '' !== to ) {
						$social.removeClass( 'rokophoto_only_customizer' );
						$social.find( 'a' ).attr( 'href', to );
					} else {
						$social.addClass( 'rokophoto_only_customizer' );
					}
				}
			);
		}
	);

	// [Footer] Flickr URL
	wp.customize(
		'rokophoto_flickr_link', function( value ) {
			value.bind(
				function( to ) {
					var $social = $( '#socials .social-fl, #bsocials .social-fl' );
					if ( '' !== to ) {
						$social.removeClass( 'rokophoto_only_customizer' );
						$social.find( 'a' ).attr( 'href', to );
					} else {
						$social.addClass( 'rokophoto_only_customizer' );
					}
				}
			);
		}
	);

	// [Footer] Google + URL
	wp.customize(
		'rokophoto_googleplus_link', function( value ) {
			value.bind(
				function( to ) {
					var $social = $( '#socials .social-go, #bsocials .social-go' );
					if ( '' !== to ) {
						$social.removeClass( 'rokophoto_only_customizer' );
						$social.find( 'a' ).attr( 'href', to );
					} else {
						$social.addClass( 'rokophoto_only_customizer' );
					}
				}
			);
		}
	);

	// [Footer] Instagram URL
	wp.customize(
		'rokophoto_instagram_link', function( value ) {
			value.bind(
				function( to ) {
					var $social = $( '#socials .social-in, #bsocials .social-in' );
					if ( '' !== to ) {
						$social.removeClass( 'rokophoto_only_customizer' );
						$social.find( 'a' ).attr( 'href', to );
					} else {
						$social.addClass( 'rokophoto_only_customizer' );
					}
				}
			);
		}
	);

	// [Footer] LinkedIn URL
	wp.customize(
		'rokophoto_linkedin_link', function( value ) {
			value.bind(
				function( to ) {
					var $social = $( '#socials .social-li, #bsocials .social-li' );
					if ( '' !== to ) {
						$social.removeClass( 'rokophoto_only_customizer' );
						$social.find( 'a' ).attr( 'href', to );
					} else {
						$social.addClass( 'rokophoto_only_customizer' );
					}
				}
			);
		}
	);

	// [Footer] Mail Address
	wp.customize(
		'rokophoto_mail_link', function( value ) {
			value.bind(
				function( to ) {
					var $social = $( '#socials .social-em, #bsocials .social-em' );
					if ( '' !== to ) {
						$social.removeClass( 'rokophoto_only_customizer' );
						$social.find( 'a' ).attr( 'href', to );
					} else {
						$social.addClass( 'rokophoto_only_customizer' );
					}
				}
			);
		}
	);

	// [Footer] Footer Copyrights
	wp.customize(
		'rokophoto_footer_copyrights', function( value ) {
			value.bind(
				function( to ) {
					$( '#footer-nav .cprts' ).text( to );
				}
			);
		}
	);

	// [Footer] Footer Powered By
	wp.customize(
		'rokophoto_footer_powerdby', function( value ) {
			value.bind(
				function( to ) {
					$( '#footer-nav .pwred' ).html( to );
				}
			);
		}
	);

} )( jQuery );
