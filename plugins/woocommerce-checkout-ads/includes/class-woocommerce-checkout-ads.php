<?php

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
