<?php

add_action('admin_menu', 'woocommerce_checkout_ads_admin_menu');

function woocommerce_checkout_ads_admin_menu()
{
	add_menu_page('WooCommerce Checkout Ads Page', 'Checkout Ads', 'manage_options', 'woocommerce-checkout-ads', 'show_woocommerce_checkout_ads_admin_page');
}

function show_woocommerce_checkout_ads_admin_page()
{
	$current_user = wp_get_current_user();

	$mock_rokt_tag_id = '2864516936144809052_2864517060850814107';
	add_option('woocommerce_checkout_ads_rokt_tag_id', $mock_rokt_tag_id);

	require_once plugin_dir_path( __FILE__ ) . 'views/index.php';
}
