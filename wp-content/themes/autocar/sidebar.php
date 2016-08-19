<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package autocar
 */

	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		return;
	}
?>
	<div class="col-md-4">
		<div id="secondary" class="widget-area sidebar-widgets" role="complementary">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div><!-- #secondary -->
	</div>
