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
		$html = '<h1 style="
				position: static;
				z-index: 99999;
				top: 0;
				left: 0;
				width: 100%;
				height: 100%;
				background: gray;
				display: flex;
				justify-content: center;
				align-items: center;
			">'
			. __CLASS__ . '</h1>';

		return $html . $content;
	}
}

// Hook in
add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields_action');

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields_action($fields)
{
	$fields['order']['order_comments']['placeholder'] = 'My new placeholder : ' . __FILE__;
	return $fields;
}

// Hook in
add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields');

// Our hooked in function – $fields is passed via the filter!
function custom_override_checkout_fields($fields)
{
	$fields['shipping']['shipping_phone'] = array(
		'label'     => __('Phone', 'woocommerce'),
		'placeholder'   => _x('Phone', 'placeholder', 'woocommerce'),
		'required'  => false,
		'class'     => array('form-row-wide'),
		'clear'     => true
	);

	return $fields;
}

/**
 * Display field value on the order edit page
 */

add_action(
	'woocommerce_review_order_after_payment',
	'action_woocommerce_after_checkout_form',
	999,
	1
);

function action_woocommerce_after_checkout_form($checkout)
{
	// echo '<h1>DUC:::: <strong>'
	// . __('Phone From Checkout Form') . ':</strong> '
	// . get_post_meta($order->get_id(), '_shipping_phone', true) . '</h1>';
	error_log(__FILE__ . wp_json_encode($checkout));
	echo '<h1>DUC:::: <strong>' . wp_json_encode($checkout)
		. __('Phone From Checkout Form') . ':</strong> ' . '</h1>';
}

/**
 * Add the field to the checkout
 */
add_action('woocommerce_after_order_notes', 'my_custom_checkout_field');

function my_custom_checkout_field($checkout)
{

	echo '<div id="my_custom_checkout_field"><h2>' . __('My Field') . '</h2>';

	woocommerce_form_field('my_field_name', array(
		'type'          => 'text',
		'class'         => array('my-field-class form-row-wide'),
		'label'         => __('Fill in this field'),
		'placeholder'   => __('Enter something'),
	), $checkout->get_value('my_field_name'));

	echo '</div>';
}

add_action('admin_menu', 'test_plugin_setup_menu');

function test_plugin_setup_menu(){
    add_menu_page( 'WooCommerce Checkout Ads Page', 'Checkout Ads', 'manage_options', 'test-plugin', 'test_init' );
}

function test_init(){
	$current_user = wp_get_current_user();

	printf( __( 'Username: %s', 'textdomain' ), esc_html( $current_user->user_login ) ) . '<br />';
	printf( __( 'User email: %s', 'textdomain' ), esc_html( $current_user->user_email ) ) . '<br />';
	printf( __( 'User first name: %s', 'textdomain' ), esc_html( $current_user->user_firstname ) ) . '<br />';
	printf( __( 'User last name: %s', 'textdomain' ), esc_html( $current_user->user_lastname ) ) . '<br />';
	printf( __( 'User display name: %s', 'textdomain' ), esc_html( $current_user->display_name ) ) . '<br />';
	printf( __( 'User ID: %s', 'textdomain' ), esc_html( $current_user->ID ) );

	echo '<iframe src="https://fervent-davinci-a3507d.netlify.app" height="100%" width="100%" title="WooCommerce Checkout Ads Page" style="overflow:scroll; margin-top:-4px; margin-left:-4px; border:none;"></iframe>';

}

// Initialize the plugin.
$plugin_instance = WooCommerceCheckoutAdsPlugin::getInstance();

function my_plugin_activate()
{

	add_option('Activated_Plugin_' . __FILE__, __FILE__);

	/* activation code here */
}
register_activation_hook(__FILE__, 'my_plugin_activate');
