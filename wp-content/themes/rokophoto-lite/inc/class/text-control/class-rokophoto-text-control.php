<?php
/**
 * Class for messages controls in customizer
 *
 * @package WordPress
 * @subpackage RokoPhoto
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return;
}

/**
 * Class RokoPhoto_Info
 */
class RokoPhoto_Text_Control extends WP_Customize_Control {

	/**
	 * The message to display in the controler
	 *
	 * @var string $message The message to display in the controler
	 */
	private $message = '';

	/**
	 * RokoPhoto_Text_Control constructor.
	 *
	 * @param string  $manager Manager.
	 * @param integer $id Id.
	 * @param array   $args Array of arguments.
	 */
	public function __construct( $manager, $id, $args = array() ) {
		parent::__construct( $manager, $id, $args );
		if ( ! empty( $args['rokophoto_message'] ) ) {
			$this->message = $args['rokophoto_message'];
		}
	}

	/**
	 * The render function for the controler
	 */
	public function render_content() {
		echo $this->message;
	}
}
