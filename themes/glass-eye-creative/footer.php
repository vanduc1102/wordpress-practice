<?php
	/**
	 * Footer template.
	 */
?>

<footer class="footer">
	<nav>
		<?php
			wp_nav_menu( $arg = array (
				'menu_class' => 'footer-navigation',
				'theme_location' => 'footer',
			) );
		?>
	</nav>
	<p class="copyright">
		<small>All content on this site &copy; Glass Eye Creative</small>
	</p>
	</footer>
</body>
	<?php wp_footer(); ?>
</html>