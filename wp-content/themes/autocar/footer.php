<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package autocar
 */
$redux = autocar_reduxData();
$copyright = '';
 if( isset($redux['autocar-copyright']) ){
	 $copyright = $redux['autocar-copyright'];
 }
?>
				<footer>
					<div class="container">
							<?php if ( ! dynamic_sidebar( 'footer-1' ) ) : endif; ?>
					</div>
				</footer>
				<div class="sub-footer">
					<div class="container">
						<div class="row">
							<p><?php  echo esc_html($copyright); ?></p>
						</div>
					</div>
				</div>
				<a href="#" class="go-top"><i class="fa fa-angle-up"></i></a>
			</div>
		</div>
		<nav class="sidebar-menu slide-from-left">
			<div class="nano">
				<div class="content">
					<nav class="responsive-menu">
						<?php
					wp_nav_menu( array('theme_location'=> 'primary','container' => 'false','fallback_cb' => 'autocar_menu_editor','depth' => 4));
						?>
					</nav>
				</div>
			</div>
		</nav>
	</div>
<?php wp_footer();?>
<script type="text/javascript">
	window.scrollTo(0, 0);
</script>
</body>
</html>
