<?php
/**
 * Plugin Name:       Woocommerce Backorder Message
 * Description:       A little plugin to change the front end message for backorder products.
 * Plugin URI:        https://github.com/nicolaerario/woo-backorder-message
 * Version:           0.0.1
 * Author:            Nicola Erario
 * Author URI:        https://github.com/nicolaerario
 * Requires at least: 3.0.0
 * Tested up to:      5.4.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Plugin depends on WooCommerce activation state
 **/
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    function op_change_backorder_message( $text, $product ){
		if ( $product->managing_stock() && $product->is_on_backorder( 1 ) ) {
			$text = 'Su Ordinazione (tempi di spedizione variabili)';
		}
		return $text;
	}
	add_filter( 'woocommerce_get_availability_text', 'op_change_backorder_message', 10, 2 );
}
