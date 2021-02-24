<?php

printf(__('Username: %s', 'textdomain'), esc_html($current_user->user_login)) . '<br />';
printf(__('User email: %s', 'textdomain'), esc_html($current_user->user_email)) . '<br />';
printf(__('User first name: %s', 'textdomain'), esc_html($current_user->user_firstname)) . '<br />';
printf(__('User last name: %s', 'textdomain'), esc_html($current_user->user_lastname)) . '<br />';
printf(__('User display name: %s', 'textdomain'), esc_html($current_user->display_name)) . '<br />';
printf(__('User ID: %s', 'textdomain'), esc_html($current_user->ID));

echo "<br /><b>woocommerce_checkout_order_received_endpoint::: </b>" . get_option('woocommerce_checkout_order_received_endpoint');

$woocommerce_identity = [
	"woocommerce_site_url" => get_site_url(),
	"woocommerce_user_email" => $current_user->user_email,
	"woocommerce_user_display_name" => $current_user->display_name,
];

// inject scripts -

// API createAccount ( secretKey?? )
// createAccount ==> accessToken , uniqueId
// store uniqueId ( wordpressOption )
// $user_id, $account_id = ajax_create_account($	);
// get RoktTagId for account - store in wp_option

?>

<iframe src="https://fervent-davinci-a3507d.netlify.app?<?php echo http_build_query($woocommerce_identity) ?>" height="600px" width="100%" title="WooCommerce Checkout Ads Page" style="overflow:scroll; margin-top:-4px; margin-left:-4px; border:none;"></iframe>
