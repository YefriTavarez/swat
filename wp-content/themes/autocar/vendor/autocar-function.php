<?php
/************** Header Background Image ****************/
add_action('wp_head','autocar_hook_css');
function autocar_hook_css() {
	$redux = autocar_reduxData();
	if(isset( $redux['autocar-page-header']['url'] )) {
		$header_image = $redux['autocar-page-header']['url'];
	}
?>
	<style type="text/css"> 
	.page-heading{
		background-image: url("<?php echo esc_url( $header_image ) ;?>");
	}
	</style>
<?php	
}
/************** Style Switcher ****************/

function autocar_style_switcher() {
	$redux = autocar_reduxData();
if(isset( $redux['style_switcher'] ) && $redux['style_switcher'] == '1' ) {
		echo '<input type="hidden" name="atc_template_url" value="'.get_template_directory_uri().'" />';
		echo '<section id="style-switcher">
  <h2>Style Switcher <a href="#"><i class="fa fa-cog fa-spin"></i></a></h2>
  <div class="swircher_overlay"></div>
  <div class="switcher_content">
	<h3>Color Scheme</h3>
	<ul class="colors">
	   <li><a href="#" class="color1"></a></li>
	   <li><a href="#" class="color2"></a></li>
	   <li><a href="#" class="color3"></a></li>
	   <li><a href="#" class="color4"></a></li>
	   <li><a href="#" class="color5"></a></li>
	   <li><a href="#" class="color6"></a></li>
	   <li><a href="#" class="color7"></a></li>
	   <li><a href="#" class="color8"></a></li>
	</ul>
  </div>
  <div id="reset">
    <button class="button color" value="Reload Page" onClick="window.location.reload();return false;">Reset</button>
  </div>
</section>';
	}	
}
/************** Menu Callback Function ****************/
if(!function_exists('autocar_menu_editor')){
	function autocar_menu_editor($args){
		if ( ! current_user_can( 'manage_options' ) )
		{
			return;
		}

		// see wp-includes/nav-menu-template.php for available arguments
		extract( $args );

		$link = $link_before
			. '<a href="' .admin_url( 'nav-menus.php' ) . '">' . $before . 'Add a menu' . $after . '</a>'
			. $link_after;

		// We have a list
		if ( FALSE !== stripos( $items_wrap, '<ul' )
			or FALSE !== stripos( $items_wrap, '<ol' )
		)
		{
			$link = "<li>$link</li>";
		}

		$output = sprintf( $items_wrap, $menu_id, $menu_class, $link );
		if ( ! empty ( $container ) )
		{
			$output  = "<$container class='$container_class' id='$container_id'>$output</$container>";
		}

		if ( $echo )
		{
			echo $output;
		}

		return $output;
	}
}
/************** Social Setting ****************/
if(!function_exists('autocar_social_setting')){
	function autocar_social_setting(){
		$redux = autocar_reduxData();
		$result = $vim = $rss = $fb = $twt = $link = $fkr = $yt = $gp = $sky = $pin = $social = '';
		if(isset($redux['autocar_facebookurl']))
			$fb = $redux['autocar_facebookurl'];
		if(isset($redux['autocar_twitterurl']))
			$twt = $redux['autocar_twitterurl'];
		if(isset($redux['autocar_linkedinurl']))
			$link = $redux['autocar_linkedinurl'];
		if(isset($redux['autocar_flickrurl']))
			$fkr = $redux['autocar_flickrurl'];
		if(isset($redux['autocar_youtubeurl']))
			$yt = $redux['autocar_youtubeurl'];
		if(isset($redux['autocar_gpurl']))
			$gp = $redux['autocar_gpurl'];
		if(isset($redux['autocar_skypeurl']))
			$sky = $redux['autocar_skypeurl'];
		if(isset($redux['autocar_pinteresturl']))
			$pin = $redux['autocar_pinteresturl'];
		if(isset($redux['autocar_vimeourl']))
			$vim = $redux['autocar_vimeourl'];
		if(isset($redux['autocar_displaysocial']))
			$social = $redux['autocar_displaysocial'];
		if(isset($social['enabled'])){
			foreach($social['enabled'] as $v){
				if($v == 'Vimeo'){
				$result .= '<li><a href="'.esc_url($vim).'" target="_blank"><i class="fa fa-vimeo-square"></i></a></li>';
				} 
				if($v == 'Skype'){ 
				$result .= '<li><a href="skype:'.esc_attr($sky).'?call" target="_blank"><i class="fa fa-skype"></i></a></li>';
				}
				if($v == 'Youtube'){ 
				$result .= '<li><a href="'.esc_url($yt).'" target="_blank"><i class="fa fa-youtube"></i></a></li>';
				 } 
				if($v == 'Twitter'){ 
				$result .= '<li><a href="'.esc_url($twt).'" target="_blank"><i class="fa fa-twitter"></i></a></li>';
				}
				if($v == 'Facebook'){
				$result .= '<li><a href="'.esc_url($fb).'" target="_blank"><i class="fa fa-facebook"></i></a></li>';
				} 
				if($v == 'Linkedin'){ 
				$result .= '<li><a href="'.esc_url($link).'" target="_blank"><i class="fa fa-linkedin-square"></i></a></li>';
				} 
				if($v == 'Flickr'){ 
				$result .= '<li><a href="'.esc_url($fkr).'" target="_blank"><i class="fa fa-flickr"></i></a></li>';
				}
				if($v == 'Google Plus'){ 
				$result .= '<li><a href="'.esc_url($gp).'" target="_blank"><i class="fa fa-google-plus"></i></a></li>';
				}
				if($v == 'Pinterest'){ 
				$result .= '<li><a href="'.esc_url($pin).'" target="_blank"><i class="fa fa-pinterest"></i></a></li>';
				}
			}
		}
		return $result;
	}
}
		/**************End****************/
	
	/**************Custom Excerpt Length****************/
if( !function_exists( 'autocar_excerpt_length' ) ){	
	function autocar_excerpt_length( $length ) {
		return 17;
	}
}
add_filter( 'excerpt_length', 'autocar_excerpt_length', 999 );
		/**************End****************/		
		
if(!function_exists('autocar_set_feature_image')){
	function autocar_set_feature_image($id = null){
		if($id === null){
			the_post_thumbnail();
		}else{
			$image_src = wp_get_attachment_url( get_post_thumbnail_id($id) );
			echo '<a href="'. esc_url( get_the_permalink() ) .'"><img src="'. esc_url( $image_src ) .'" alt="autocar"></a>';
		}
	}	
}		
	/**************Autocar Breadcrumb Method****************/
function autocar_breadcrumb() {
    $post = autocar_postData();
	$post_type = get_post_type( get_the_ID() );
		if( $post_type == 'page' ) {
			$subtitle = get_post_meta($post->ID, 'autocar_sub_title', true);
	} elseif( $post_type == 'post' ) {
			$subtitle = get_post_meta($post->ID, 'autocar_post_sub_title', true);
	}
	remove_filter('term_description','wpautop'); //remove auto P from cat discription.
	echo '<div class="col-md-12">
			<div class="heading-content-bg">
				<div class="row">
					<div class="heading-content col-md-8 col-sm-8">';
					if( is_archive() ){
						the_archive_title( '<h2>', '</h2>' );
						the_archive_description( '<span>', '</span>' );
					}else{
						if( is_single() ){
							echo '<h2>'.esc_attr( get_the_title($post->ID) ).'</h2><span>'.esc_html( $subtitle ).'</span>';
						}else{
							echo '<h2>'.esc_attr( get_the_title($post->ID) ).'</h2><span>'.esc_html( $subtitle ).'</span>';
						}
					}
					echo '</div>
				<div class="go-back col-md-4 col-sm-4">';
											
    echo '<ul id="breadcrumbs">';
if (!is_home()) {
	if( !is_archive() ){
		echo '<li><a href="'. esc_url( home_url( '/' ) ) .'">'.esc_html__('Home','autocar').'</a></li><li class="separator"> / </li>';
	}
	if (is_category() || is_single()) {
		echo '<li>';
		the_category( ' </li><li class="separator"> / </li><li> ' );
		echo '</li>';
		if (is_single()) {
			echo '<li class="separator"> / </li><li>';
			the_title();
			echo '</li>'; 
		}
	}elseif ( is_page() ) {
		if($post->post_parent){
			$anc = get_post_ancestors( $post->ID );
			$title = get_the_title();
			foreach ( $anc as $ancestor ) {
				echo '<li><a href="'.esc_url(get_permalink($ancestor)).'" title="'.esc_attr(get_the_title($ancestor)).'">'.esc_html(get_the_title($ancestor)).'</a></li> <li class="separator">/</li>';
			}
			echo '<li title="'.esc_attr($title).'"> '.esc_html($title).'</li>';
		} else {
			echo '<li><strong> '.esc_html(get_the_title()).'</strong></li>';
		}
	}
}
    elseif (is_tag()) {single_tag_title();}
    elseif (is_day()) {echo"<li>Archive for "; echo get_option( 'date_format' ); echo'</li>';}
    elseif (is_month()) {echo"<li>Archive for "; echo get_option( 'date_format' ); echo'</li>';}
    elseif (is_year()) {echo"<li>Archive for "; echo get_option( 'date_format' ); echo'</li>';}
    elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
    elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
    echo '</ul>'; ?>
			</div>
		</div>
	</div>
</div>
<?php							
}		
	/**************Autocar Breadcrumb End****************/
	
	/**************Autocar Custom Comment Start****************/
function autocar_customcomment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
	<<?php echo esc_attr($tag); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	
	
	<div id="div-comment-<?php comment_ID() ?>" class="comments-content comment-body">
	<?php endif; ?>
	<?php // Gravtar Image?>
	<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
	
	<div class="continue-button reply">
	<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
	</div>
	
	<div class="comment-data">
	<h6><?php printf( esc_html__( '%s', 'autocar' ), get_comment_author_link() ); ?></h6>

	<?php if ( $comment->comment_approved == '0' ) : ?>
		<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.','autocar' ); ?></em>
		<br />
	<?php endif; ?>

	<span><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
		<?php
			/* translators: 1: date, 2: time */
			printf( esc_html__('%1$s','autocar'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( esc_html__( '(Edit)','autocar' ), '  ', '' );
		?>
	</span>
	<?php comment_text(); ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
		</div>
	<?php endif; ?>
	<?php
	}
// Add custom meta (Subject) fields to the default comment form
add_filter('comment_form_default_fields', 'autocar_custom_fields');
function autocar_custom_fields($fields) {

    $commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required=true" : '' );
	
    $fields[ 'author' ] = '<div class="row"><div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"><p class="comment-form-author">'.
      '<label for="author"></label>'.
      ( $req ? '<span class="required"></span>' : '' ).
      '<input id="author" name="author" type="text" value="'. esc_attr( $commenter['comment_author'] ) .
      '" size="30" tabindex="1"' . esc_attr($aria_req) . ' placeholder="'.esc_html__( 'Your name...','autocar' ).'" /></p></div>';

    $fields[ 'email' ] = '<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"><p class="comment-form-email">'.
      '<label for="email"></label>'.
      ( $req ? '<span class="required"></span>' : '' ).
      '<input id="email" name="email" type="text" value="'. esc_attr( $commenter['comment_author_email'] ) .
      '" size="30"  tabindex="2"' . esc_attr($aria_req) . ' placeholder="'.esc_html__( 'Your email...','autocar' ).'" /></p></div>';
    $fields[ 'url' ] = '';

    $fields[ 'subject' ] = '<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"><p class="comment-form-subject">'.
      '<label for="subject"></label>'.
      '<input id="subject" name="subject" type="text" size="30"  tabindex="4" placeholder="'.esc_html__( 'Subject...','autocar' ).'" /></p></div></div>';
	
  return $fields;
}
// Save the comment meta data along with comment
add_action( 'comment_post', 'autocar_save_comment_meta_data' );
function autocar_save_comment_meta_data( $comment_id ) {
	$subject = '';
  if ( ( isset( $_POST['subject'] ) ) && ( $_POST['subject'] != '') )
  $subject = wp_filter_nohtml_kses($_POST['subject']);
  add_comment_meta( $comment_id, 'subject', $subject );
}

// Get subject to the comment edit field
add_action( 'add_meta_boxes_comment', 'autocar_comment_add_meta_box' );
function autocar_comment_add_meta_box()
{
 add_meta_box( 'my-comment-title', esc_html__( 'subject','autocar' ), 'autocar_comment_meta_box_subject',     'comment', 'normal', 'high' );
}

function autocar_comment_meta_box_subject( $comment )
{
    $subject = get_comment_meta( get_comment_ID(), 'subject', true );
	

   ?>
 <p>
     <label for="age"><?php esc_html_e( 'subject', 'autocar' ); ?></label>;
     <input type="text" name="age" value="<?php echo esc_attr( $subject ); ?>"  class="widefat" />
 </p>
 <?php
} 
add_action( 'edit_comment', 'autocar_subject_on_edit_screen' );
function autocar_subject_on_edit_screen( $comment_id ){
    if( isset( $_POST['subject'] ) )
      update_comment_meta( $comment_id, 'subject', esc_attr( $_POST['subject'] ) );
}


// Filter For authorname in breadcrumb
add_filter( 'get_the_archive_title', function ($title) {
 if ( is_author() ) {
	 $title =  get_the_author();
    }
	return $title;
});

add_action('autocar_vehicle_maintitle','autocar_vehicle_maintitle_function');
function autocar_vehicle_maintitle_function(){
	global $post;
	echo '<div class="col-md-12">';
		echo '<div class="heading-content-bg">';
			echo '<div class="row">';
				echo '<div class="heading-content col-md-8 col-sm-8">';
					echo '<h2>',esc_attr( get_the_title($post->ID) ),'</h2>';
					echo '<span>',esc_attr( get_post_meta( $post->ID, 'autocar_vehicle_subtitle', true ) ),'</span>';
				echo '</div>';
				echo '<div class="go-back col-md-4 col-sm-4">';
					echo '<ul id="breadcrumbs">';
						echo '<li><a href="'. esc_url( home_url( '/' ) ) .'">'.esc_html__('Home','autocar').'</a></li><li class="separator"> / </li>';
						echo '<li>',esc_attr( get_the_title($post->ID) ),'</li>';
					echo '</ul>';
				echo '</div>';
			echo '</div>';
		echo '</div>';
	echo '</div>';
}

add_filter( 'pcd/get_specs', 'autocar_specification', 1, 2 );
function autocar_specification( $html, $fields ){
	$html = '';
	global $post;
	if ( ! empty( $fields ) ) {

		$html .= '<ul class="car-info">';
		
		$categories = get_the_terms($post->ID,'make');
		foreach($categories as $category) {      
			$make = $category->name;
			break;
		}
		
		$categories = get_the_terms($post->ID,'model');
		foreach($categories as $category) {      
			$model = $category->name;
			break;
		}
		
		$html .= "<li><span>". esc_html__('Make','autocar')."</span> <p>". esc_html($make) ."</p></li>";
		$html .= "<li><span>". esc_html__('Model','autocar')."</span> <p>". esc_html($model) ."</p></li>";
		
		foreach ( $fields as $k => $field ) {

			$label = $field['label'];

			$html .= "<li><span>". esc_html($label)."</span> <p>". $fields[$k]['value'] ."</p></li>";

		}

		$html .= '</ul>';
		return $html;
	}
}

add_action('autocar_scheduleform', 'autocar_scheduleform_function');
function autocar_scheduleform_function(){
	$schedule = get_option('autocar_schedule');
	if($schedule == 'enable'){
		wp_enqueue_style('autocar-datetimepickercss');
		wp_enqueue_script('autocar-datetimepickerjs');
		?>
		<div id="autocar_schedule_dialog" class="autocar_main_schedule_popup">
			<div class="autocar_main_schedule_overlay"></div>
			<a href="javascript:;" class="autocar_schedule_close"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/cross.png" alt=""></a>
			<div class="autocar_schedule_form">
			<div class="ac_popup_wrapper">
			<div class="ac_popup_heading">
			 <h1><?php echo esc_html__('Test Drive Schedule','autocar'); ?></h1>
			</div>
				<form id="autocar_schedule_request">
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<div class="form-modal-label"><?php esc_html_e('Name','autocar'); ?></div>
								<input class="form-control" name="name" type="text">
								<input class="form-control autocar_schdule_title" name="title" type="hidden">
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<div class="form-modal-label"><?php esc_html_e('Email','autocar'); ?></div>
								<input class="form-control" name="email" type="email">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<div class="form-modal-label"><?php esc_html_e('Phone','autocar'); ?></div>
								<input class="form-control" name="phone" type="text">
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<div class="form-modal-label"><?php esc_html_e('Best time','autocar'); ?></div>
								<input class="form-control autocar_date_timepicker" type="text" name="datetime" >
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 col-sm-6">
							
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<button class="ac_form_submit" type="submit" name="submit">
									<?php esc_html_e('Send','autocar');?>
									<i class="fa fa-refresh fa-spin"></i>
								</button>								
							</div>
						</div>
					</div>
				</form>
				</div>
			</div>
		</div>
	<?php }
}

add_action( 'wp_ajax_nopriv_autocar_scheduled', 'autocar_scheduled' );
add_action( 'wp_ajax_autocar_scheduled', 'autocar_scheduled' );
function autocar_scheduled(){
	if(isset($_POST['action']) && $_POST['action'] == 'autocar_scheduled'){
		global $wpdb;
		$table_name = $wpdb->prefix . 'schedule_tbl';
		$data = array(
			'name' => $_POST['name'],
			'title' => $_POST['title'],
			'email' => $_POST['email'],
			'phone' => $_POST['phone'],
			'datetime' => $_POST['datetime'],		
			'status' => 0		
		);
		if($wpdb->insert( $table_name, $data )){
			print_r($data);
			echo '1';
		}else{
			echo '0';
		}
	}
	die();
}

function autocar_get_vehicle_specs($post_id = null){
	global $car_dealer;

	$html = '';

	$fields = $car_dealer->fields->get_registered_fields( 'specs' );

	// render output
	if ( ! empty( $fields ) ) {
		foreach ( $fields as $k => $field ) {
			echo '<li>';
			$label = $field['label'];
			if($post_id === null){			
				echo '<a href="#">'.esc_html($label).'</a>';			
			}elseif($post_id === ''){
				//echo '<a href="#"></a>';
			}else{
        		$name  = $field['name'];

        		$value = get_field( $field['name'], $post_id );

        		if ( $value ) { 
					echo '<a href="#">'.esc_html($value).'</a>';	
        		}
				
			}
			echo '</li>';
		}		
	}	
}

function autocar_compare_itemsadd(){
	echo '<div class="col-md-3">';
		echo '<div class="ac_compare_wrapper">';
			echo '<div class="compare_heading">';
				echo '<a href="',esc_url( home_url() ),'" class="compare_link"><i class="fa fa-plus"></i>',esc_html__('add to compare','autocar'),'</a>';
			echo '</div>';
			echo '<div class="ac_car_property">';
				echo '<ul>';
					autocar_get_vehicle_specs('');
				echo '</ul>';
			echo '</div>';
		echo '</div>';
	echo '</div>';
}

function autocar_compare_itemsremove($id){
	$src = '';
	echo '<div class="col-md-3 autocar_slideremove">';
		echo '<div class="ac_compare_wrapper">';
			echo '<div class="compare_heading">';
				echo '<div class="car-item">';
					echo '<div class="thumb-content">';
						if(has_post_thumbnail($id)){
							$thumb = get_post_thumbnail_id($id);
							$src = wp_get_attachment_url($thumb, 'full');
						}
						echo '<a href="#"><img src="',esc_url($src),'" alt=""></a>';
						echo '<div class="remove_btn_wrapper primary-button">';
							echo '<a href="javascript:;" class="autocar_remove_comparecar" data-carId="'.esc_attr($id).'">',esc_html__('remove from list','autocar'),'</a>';
						echo '</div>';
					echo '</div>';
					echo '<div class="down-content">';
						echo '<a href="',get_the_permalink($id),'"><h4>',get_the_title($id),'</h4></a>';
						echo '<span>',autocar_format_price(get_field( 'price', $id )),'</span>';
						echo '<div class="line-dec"></div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
			echo '<div class="ac_car_property">';
				echo '<ul>';
					autocar_get_vehicle_specs($id);
				echo '</ul>';
			echo '</div>';
			
			echo '<div class="ac_addition_content">';
				echo '<ul>';
					autocar_get_addtional_feature($id);
				echo '</ul>';
			echo '</div>';
			
		echo '</div>';
	echo '</div>';
}

function autocar_format_price( $price = '0' ) {

	$original_price = $price;
	$symbol 		= get_option( 'options_pcd_currency_symbol', '$' );
	$placement 		= get_option( 'options_pcd_symbol_placement', 'prepend' );
	$decimal_spaces = 0;
	$decimal_sep 	= ',';
	$thousands_sep 	= get_option( 'options_pcd_thousands_separator', ',' );

	if ( 'space' == $thousands_sep ) {
		$thousands_sep = ' ';
	}

	$price = number_format( $price, $decimal_spaces, $decimal_sep, $thousands_sep );

	if ( 'append' == $placement ) {
		$price = $price. '&nbsp;' .$symbol;
	} else {
		$price = $symbol. '' .$price;
	}
	return $price;
}

function autocar_get_addtional_feature($id){
	$features = get_post_meta($id,'autocar_v_feature',true);
	$feature = explode(',',$features);
	$tot = count($feature) <= 8 ? count($feature) : 8;
	for($i=0;$i<$tot;$i++){
		echo '<li><i class="fa fa-check-square-o"></i><span>',esc_html($feature[$i]),'</span></li>';
	}
}
function autocar_removeDemoModeLink() {  
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
    }
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
    }
}
add_action('init', 'autocar_removeDemoModeLink');