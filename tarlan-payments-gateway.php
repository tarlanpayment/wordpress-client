<?php
/* @wordpress-plugin
 * Plugin Name:       Tarlan Payments
 * Plugin URI:        https://tarlanpayments.kz
 * Version:           1.1
 * Author:            Tarlan Developers
 * Author URI:        https://tarlanpayments.kz
 * Text Domain:       woocommerce-tarlan-payments-gateway
 */

$active_plugins = apply_filters('active_plugins', get_option('active_plugins'));
if(tarlan_custom_payment_is_woocommerce_active()){
	add_filter('woocommerce_payment_gateways', 'add_tarlan_payment_gateway');
	function add_tarlan_payment_gateway( $gateways ){
        $gateways[] = 'WC_Tarlan_Payments_Gateway';
        return $gateways;
    }

    add_action('plugins_loaded', 'init_tarlan_payment_gateway');
	function init_tarlan_payment_gateway(){
		require 'tarlan-pay.php';
	}

	add_action( 'plugins_loaded', 'tarlan_payment_load_plugin_textdomain' );
	function tarlan_payment_load_plugin_textdomain() {
	  load_plugin_textdomain( 'tarlan-payments-gateway', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
	}
}



function tarlan_custom_payment_is_woocommerce_active()
{
	$active_plugins = (array) get_option('active_plugins', array());

	if (is_multisite()) {
		$active_plugins = array_merge($active_plugins, get_site_option('active_sitewide_plugins', array()));
	}

	return in_array('woocommerce/woocommerce.php', $active_plugins) || array_key_exists('woocommerce/woocommerce.php', $active_plugins);
}