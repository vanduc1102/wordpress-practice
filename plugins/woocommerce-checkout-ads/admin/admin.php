<?php

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

	echo "<br /><b>woocommerce_checkout_order_received_endpoint::: </b>" . get_option('woocommerce_checkout_order_received_endpoint');

	$woocommerce_identity = [
		"woocommerce_site_url"          => get_site_url(),
		"woocommerce_user_email"        => $current_user->user_email,
		"woocommerce_user_display_name" => $current_user->display_name,
	];

	// inject scripts -

	// API createAccount ( secretKey?? )
	// createAccount ==> accessToken , uniqueId
	// store uniqueId ( wordpressOption )

	echo '<iframe src="https://fervent-davinci-a3507d.netlify.app?' . http_build_query($woocommerce_identity) . '" height="600px" width="100%" title="WooCommerce Checkout Ads Page" style="overflow:scroll; margin-top:-4px; margin-left:-4px; border:none;"></iframe>';
}
