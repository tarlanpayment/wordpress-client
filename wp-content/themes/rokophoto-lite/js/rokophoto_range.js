/**
 * Range control
 *
 * @package RokoPhoto
 */
wp.customize.controlConstructor['range-slider'] = wp.customize.Control.extend(
	{

		ready: function() {

			'use strict';

			var control = this;

			// Save changes.
			this.container.on(
				'change', 'input', function() {
					control.setting.set( jQuery( this ).val() );
				}
			);
		}

	}
);
