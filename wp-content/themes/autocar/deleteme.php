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
						<div class="footer-item">
							<h2>Redes Sociales</h2>
							<div class="line-dec"></div>
								<ul class="footer_social">
									<li><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a></li>
									<li><a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a></li>
									<li><a href="https://www.youtube.com/" target="_blank"><i class="fa fa-youtube"></i></a></li>
									<li><a href="skype:https://login.skype.com/login?message=signin_continue?call" target="_blank"><i class="fa fa-skype"></i></a></li>
								</ul>
							</div>
							<div class="footer-item">
								<h2>Últimos comentarios</h2>
								<div class="line-dec"></div>
									<ul id="recentcomments">
										<li class="recentcomments">
											<span class="comment-author-link"><a href='https://wordpress.org/' rel='external nofollow' class='url'>Mr WordPress</a></span> on <a href="http://swatimport.com/hello-world/#comment-1">Hello world!</a></li><li class="recentcomments"><span class="comment-author-link">autocar</span> on <a href="http://swatimport.com/yolo-dreamcatcher-carles-banksy-etsy/#comment-3">YOLO dreamcatcher Carles Banksy</a></li><li class="recentcomments"><span class="comment-author-link">autocar</span> on <a href="http://swatimport.com/yolo-dreamcatcher-carles-banksy-etsy/#comment-2">YOLO dreamcatcher Carles Banksy</a></li></ul></div>					</div>
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

</body>
</html>
