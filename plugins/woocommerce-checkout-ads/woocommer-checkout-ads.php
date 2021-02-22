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
class WooCommerceCheckoutAdsPlugin
{

	static $instance = false;

	public function __construct()
	{
		add_filter('the_content', array($this, 'update_post_content'), 1000);
	}

	public static function getInstance()
	{
		if (!self::$instance) {
			self::$instance =  new self;
		}
		return self::$instance;
	}

	public function update_post_content($content)
	{
		$html = '<h1>' . __FILE__  . ':' . __LINE__ . '</h1>';

		return $html . $content;
	}
}

add_action('admin_menu', 'woocommerce_checkout_ads_admin_menu');

function woocommerce_checkout_ads_admin_menu()
{
	add_menu_page('WooCommerce Checkout Ads Page', 'Checkout Ads', 'manage_options', 'woocommerce-checkout-ads', 'show_woocommerce_checkout_ads_admin_menu');
}

function show_woocommerce_checkout_ads_admin_menu()
{
	$current_user = wp_get_current_user();

	printf(__('Username: %s', 'textdomain'), esc_html($current_user->user_login)) . '<br />';
	printf(__('User email: %s', 'textdomain'), esc_html($current_user->user_email)) . '<br />';
	printf(__('User first name: %s', 'textdomain'), esc_html($current_user->user_firstname)) . '<br />';
	printf(__('User last name: %s', 'textdomain'), esc_html($current_user->user_lastname)) . '<br />';
	printf(__('User display name: %s', 'textdomain'), esc_html($current_user->display_name)) . '<br />';
	printf(__('User ID: %s', 'textdomain'), esc_html($current_user->ID));

	echo '<iframe src="https://fervent-davinci-a3507d.netlify.app" height="100%" width="100%" title="WooCommerce Checkout Ads Page" style="overflow:scroll; margin-top:-4px; margin-left:-4px; border:none;"></iframe>';
}

// Initialize the plugin.
$plugin_instance = WooCommerceCheckoutAdsPlugin::getInstance();

function woocommerce_checkout_ads_activate()
{
	add_option('Activated_Plugin_' . __FILE__, __FILE__);
}
register_activation_hook(__FILE__, 'woocommerce_checkout_ads_activate');
