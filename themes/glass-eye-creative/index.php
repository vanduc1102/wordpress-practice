<?php
/**
 * Main template file.
 */

	get_header();
?>
<div class="main-content-width-wrapper">
	<div class="two-column-entry">
		<h1> <?php echo get_the_title(); ?> </h1>
		<main class="main-content">
			<?php
				// Start a loop.
			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post();
					the_content();
				}
			}
			?>
		</main>
	</div>
</div>

<?php
	get_footer();
