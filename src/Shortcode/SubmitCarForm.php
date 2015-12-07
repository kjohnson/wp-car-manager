<?php

namespace Never5\WPCarManager\Shortcode;

use Never5\WPCarManager\Vehicle;
use Never5\WPCarManager;

class SubmitCarForm extends Shortcode {

	/**
	 * Constructor
	 */
	public function __construct() {
		// parent constructor
		parent::__construct( 'submit_car_form' );
	}

	/**
	 * @param array $atts
	 *
	 * @return string
	 */
	public function output( $atts ) {

		$listing_id = 0;

		// start output buffer
		ob_start();

		// load template
		wp_car_manager()->service( 'template_manager' )->get_template_part( 'submit-car-form', '', array(
			'listing_id'         => $listing_id,
			'action'             => '',
			'submit_button_text' => __( 'Submit Car', 'wp-car-manager' ),
			'can_post_listing'   => wp_car_manager()->service( 'user_manager' )->can_post_listing(),
			'can_edit_listing'   => wp_car_manager()->service( 'user_manager' )->can_edit_listing( $listing_id ),
		) );

		return ob_get_clean();
	}

}