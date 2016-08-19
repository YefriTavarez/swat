<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Car_Dealer_Install
 */
class Car_Dealer_Install {

	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {
		$this->default_terms();
		update_option( 'car_dealer_version', CAR_DEALER_VERSION );
	}

	/**
	 * default_terms function.
	 *
	 * @access public
	 * @return void
	 */
	public function default_terms() {
		if ( get_option( 'car_dealer_installed_terms' ) == 1 )
			return;

		$taxonomies = array(
			'vehicle_type' => array(
				__( 'Car', 'progression-car-dealer' ),
				__( 'Motorcycle', 'progression-car-dealer' ),
				__( 'Truck', 'progression-car-dealer' ),
			)
		);

		foreach ( $taxonomies as $taxonomy => $terms ) {
			foreach ( $terms as $term ) {
				if ( ! get_term_by( 'slug', sanitize_title( $term ), $taxonomy ) ) {
					wp_insert_term( $term, $taxonomy );
				}
			}
		}

		update_option( 'car_dealer_installed_terms', 1 );
	}
}

new Car_Dealer_Install();