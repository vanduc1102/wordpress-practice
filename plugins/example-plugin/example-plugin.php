<?php
/*
Plugin Name: Example Plugin
Description: This is an example of plugin for <a href="http://webcraft.tools/how-to-create-a-simple-wordpress-plugin/" >http://webcraft.tools/how-to-create-a-simple-wordpress-plugin/</a>
Plugin URI: http://wordpress.org/extend/plugins/batcache/
Author: Duc Nguyen
Author URI: http://andyskelton.com/
Version: 1.0
*/

/**
 * Main plugin class.
 */
class Example_Plugin {

	public function setup() {
		add_filter( 'the_content', array( $this, 'update_post_content' ) , 1000);
	}

	public function update_post_content ( $content  ) {
		$content = '<h1>' . __CLASS__ .'</h1>' . $content;
		return $content;
	}

}


// Initialize the plugin.
$installed_example_plugin = new Example_Plugin();
$installed_example_plugin->setup();
