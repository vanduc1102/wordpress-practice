<?php
/*
Plugin Name: WooCommerce Checkout Ads
Description: This is a plugin to show ads after checkout completed of WooCommerce Shop
Plugin URI: https://github.com/vanduc1102/wordpress-practice/tree/main/plugins/woocommerce-checkout-ads
Author: Duc Nguyen
Author URI: http://vanduc1102.github.io/
Version: 1.0
*/


function activate_woocommerce_checkout_ads() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/activator.php';
}

function deactivate_woocommerce_checkout_ads() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/deactivator.php';
}

register_activation_hook( __FILE__, 'activate_woocommerce_checkout_ads' );
register_deactivation_hook( __FILE__, 'deactivate_woocommerce_checkout_ads' );

require_once plugin_dir_path( __FILE__ ) . 'admin/admin.php';
require_once plugin_dir_path( __FILE__ ) . 'frontend/frontend.php';

require plugin_dir_path( __FILE__ ) . 'includes/class-woocommerce-checkout-ads.php';


// Initialize the plugin.
$plugin_instance = WooCommerceCheckoutAdsPlugin::getInstance();
