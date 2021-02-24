<?php

/**
 * Main plugin class.
 */
class WooCommerceCheckoutAdsPlugin
{

	static $instance = false;

	public function __construct()
	{

	}

	public static function getInstance()
	{
		if (!self::$instance) {
			self::$instance =  new self;
		}
		return self::$instance;
	}
}
