<?php
/*
Plugin Name: WooCommerce Checkout Ads
Description: This is a plugin to show ads after checkout completed of WooCommerce Shop
Plugin URI: https://github.com/vanduc1102/wordpress-practice/tree/main/plugins/woocommerce-checkout-ads
Author: Duc Nguyen
Author URI: http://vanduc1102.github.io/
Version: 1.0
*/

/**
 * Main plugin class.
 */
class WooCommerceCheckoutAdsPlugin {

	public function setup() {
		add_filter( 'the_content', array( $this, 'update_post_content' ) , 1000);
	}

	public function update_post_content ( $content  ) {
		$content = '<h1>' . __CLASS__ .'</h1>' . $content;
		return $content;
	}

}

// Initialize the plugin.
$plugin_instance = new WooCommerceCheckoutAdsPlugin();
$plugin_instance->setup();
