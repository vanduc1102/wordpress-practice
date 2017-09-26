<!DOCTYPE html>
<?php 

/**
 * WP Header Template.
 */
?>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link href="<?php bloginfo( 'template_url' ); ?>/style.css" type="text/css" rel=stylesheet />
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,400i,700" rel="stylesheet" />
	<?php wp_head(); ?>
</head>

<body>
	<header class="header">
		<nav class="main-navigation-container">
			<a href="index.html"><img src="<?php bloginfo( 'template_url' ) ?>/images/glass-eye-logo.png"
			 alt="" class="logo"></a>
			<?php
				wp_nav_menu( $arg = array (
					'menu_class' => 'main-navigation',
					'theme_location' => 'primary',
				) );
			?>
		</nav>
	</header