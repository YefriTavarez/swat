<?php
/*************About Autocar Widget*****************/

class autocar_About_Autocar extends WP_Widget {

	function __construct()
	{
		parent::__construct('about-autocar',esc_html__('About Autocar','autocar'),array('description' => esc_html__('Widget About Autocar','autocar')));
	}
	
	public function widget( $args, $instance ) {
		extract($args);
		$aboutauto_title = esc_attr( ! empty( $instance['aboutauto_title'] ) ? $instance['aboutauto_title'] : esc_html__( '', 'autocar' ));
		
		$about_disc = esc_textarea( ! empty( $instance['about_disc'] ) ? $instance['about_disc'] : esc_html__( '', 'autocar' ));

		echo $args['before_widget'];
		echo '<div class="about-autocar">';
		if ( ! empty( $aboutauto_title )) {
			echo $args['before_title'] . $aboutauto_title. $args['after_title'];
		}
		echo !empty( $instance['about_disc'] ) ? wpautop( $about_disc ) : $about_disc;
		echo '</div>';
		echo $args['after_widget'];
	}
	
	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
		$aboutauto_title = esc_attr( ! empty( $instance['aboutauto_title'] ) ? $instance['aboutauto_title'] : __( '', 'autocar' ));
		$about_disc = esc_textarea( ! empty( $instance['about_disc'] ) ? $instance['about_disc'] : __( '', 'autocar' ));
		?>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'aboutauto_title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'aboutauto_title' ); ?>" name="<?php echo $this->get_field_name( 'aboutauto_title' ); ?>" type="text" value="<?php echo  $aboutauto_title ; ?>">
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'about_disc' ); ?>"><?php _e( 'Discription:' ); ?></label> 
		<textarea class="widefat" id="<?php echo $this->get_field_id( 'about_disc' ); ?>" name="<?php echo $this->get_field_name( 'about_disc' ); ?>" ><?php echo  $about_disc ; ?></textarea>
		</p>
		<?php 
	}
	
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['aboutauto_title'] = ( ! empty( $new_instance['aboutauto_title'] ) ) ? strip_tags( $new_instance['aboutauto_title'] ) : '';
		$instance['about_disc'] = ( ! empty( $new_instance['about_disc'] ) ) ? strip_tags( $new_instance['about_disc'] ) : '';
		return $instance;
	}
}
add_action( 'widgets_init','autocar_register_About_Autocar' );
function autocar_register_About_Autocar()
{
	register_widget( 'autocar_About_Autocar' );
}
/**************End About Autocar******************/

/**************Social Setting Widget******************/
class autocar_Social_Setting_Widget extends WP_Widget {

	function __construct()
	{
		parent::__construct('social-setting-widget', esc_html__('Social Setting Widget','autocar'),array('description' => esc_html__('Social Setting For Autocar Footer','autocar')));
	}
	
	public function widget( $args, $instance ) {
		extract($args);
		$social_title = esc_attr( ! empty( $instance['social_title'] ) ? $instance['social_title'] : esc_html__( '', 'autocar' ));

		echo $args['before_widget'];
		if ( ! empty( $social_title )) {
			echo $args['before_title'] . $social_title. $args['after_title'];
		}
		echo '<ul class="footer_social">'.autocar_social_setting().'</ul>';
	
		echo $args['after_widget'];
	}
	
	public function form( $instance ) {
		
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
		$social_title = esc_attr( ! empty( $instance['social_title'] ) ? $instance['social_title'] : __( '', 'autocar' ));
		?>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'social_title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'social_title' ); ?>" name="<?php echo $this->get_field_name( 'social_title' ); ?>" type="text" value="<?php echo  $social_title ; ?>">
		</p>
		<?php 
	}
	
	public function update( $new_instance, $old_instance ) {
		
		$instance = array();
		$instance['social_title'] = ( ! empty( $new_instance['social_title'] ) ) ? strip_tags( $new_instance['social_title'] ) : '';
		return $instance;
	}
}
add_action( 'widgets_init','autocar_register_Social_Setting' );
function autocar_register_Social_Setting()
{
	register_widget( 'autocar_Social_Setting_Widget' );
}
/**************Social Setting Widget End******************/


	
/*************** AutoCar Flicker Widget *****************/
class Autocar_Flickr_Widget extends WP_Widget {
	public function __construct() {
		parent::__construct( 'quick-flickr-widget', 'Autocar Flickr Widget', array(
			'description' => 'Display up to 20 of your latest Flickr submissions in your sidebar.',
		) );
	}

	/**
	 * Displays the widget contents.
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];

		$photos = $this->get_photos( array(
			'username' => $instance['username'],
			'count' => $instance['count'],
			'tags' => $instance['tags'],
		) );

		if ( is_wp_error( $photos ) ) {
			echo $photos->get_error_message();
		} else {
			foreach ( $photos as $photo ) {
				$link = esc_url( $photo->link );
				$src = esc_url( $photo->media->m );
				$title = esc_attr( $photo->title );

				$item = sprintf( '<a href="%s"><img src="%s" alt="%s" /></a>', $link, $src, $title );
				$item = sprintf( '<div class="quick-flickr-item">%s</div>', $item );
				echo $item;
			}
		}

		echo $args['after_widget'];
	}

	/**
	 * Returns an array of photos on a WP_Error.
	 */
	private function get_photos( $args = array() ) {
		$transient_key = md5( 'aquick-flickr-cache-' . print_r( $args, true ) );
		$cached = get_transient( $transient_key );
		if ( $cached )
			return $cached;

		$username = isset( $args['username'] ) ? $args['username'] : '';
		$tags = isset( $args['tags'] ) ? $args['tags'] : '';
		$count = isset( $args['count'] ) ? absint( $args['count'] ) : 10;
		$query = array(
			'tagmode' => 'any',
			'tags' => $tags,
		);

		// If username is an RSS feed
		if ( preg_match( '#^https?://api\.flickr\.com/services/feeds/photos_public\.gne#', $username ) ) {
			$url = parse_url( $username );
			$url_query = array();
			wp_parse_str( $url['query'], $url_query );
			$query = array_merge( $query, $url_query );
		} else {
			$user = $this->request( 'flickr.people.findByUsername', array( 'username' => $username ) );
			if ( is_wp_error( $user ) )
				return $user;

			$user_id = $user->user->id;
			$query['id'] = $user_id;
		}

		$photos = $this->request_feed( 'photos_public', $query );

		if ( ! $photos )
			return new WP_Error( 'error', 'Could not fetch photos.' );

		$photos = array_slice( $photos, 0, $count );
		set_transient( $transient_key, $photos, apply_filters( 'quick_flickr_widget_cache_timeout', 3600 ) );
		return $photos;
	}

	/**
	 * Make a request to the Flickr API.
	 */
	private function request( $method, $args ) {
		$args['method'] = $method;
		$args['format'] = 'json';
		$args['api_key'] = 'd348e6e1216a46f2a4c9e28f93d75a48';
		$args['nojsoncallback'] = 1;
		$url = esc_url_raw( add_query_arg( $args, 'https://api.flickr.com/services/rest/' ) );

		$response = wp_remote_get( $url );
		if ( is_wp_error( $response ) )
			return false;

		$body = wp_remote_retrieve_body( $response );
 		$obj = json_decode( $body );

		if ( $obj && $obj->stat == 'fail' )
			return new WP_Error( 'error', $obj->message );

		return $obj ? $obj : false;
	}

	/**
	 * Fetch items from the Flickr Feed API.
	 */
	private function request_feed( $feed = 'photos_public', $args = array() ) {
		$args['format'] = 'json';
		$args['nojsoncallback'] = 1;
		$url = sprintf( 'https://api.flickr.com/services/feeds/%s.gne', $feed );
		$url = esc_url_raw( add_query_arg( $args, $url ) );

		$response = wp_remote_get( $url );
		if ( is_wp_error( $response ) )
			return false;
		
		$body = wp_remote_retrieve_body( $response );
		$body = preg_replace( "#\\\\'#", "\\\\\\'", $body );
 		$obj = json_decode( $body );

		return $obj ? $obj->items : false;

	}

	/**
	 * Validate and update widget options.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['username'] = strip_tags( $new_instance['username'] );
		$instance['tags'] = strip_tags( $new_instance['tags'] );
		$instance['count'] = absint( $new_instance['count'] );
		return $new_instance;
	}

	/**
	 * Render widget controls.
	 */
	public function form( $instance ) {
		$title = isset( $instance['title'] ) ? $instance['title'] : 'Photostream';
		$username = isset( $instance['username'] ) ? $instance['username'] : '';
		$tags = isset( $instance['tags'] ) ? $instance['tags'] : '';
		$count = isset( $instance['count'] ) ? absint( $instance['count'] ) : 10;
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'username' ); ?>"><?php _e( 'Username or RSS:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'username' ); ?>" name="<?php echo $this->get_field_name( 'username' ); ?>" type="text" value="<?php echo esc_attr( $username ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'tags' ); ?>"><?php _e( 'Tags:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'tags' ); ?>" name="<?php echo $this->get_field_name( 'tags' ); ?>" type="text" value="<?php echo esc_attr( $tags ); ?>" /><br />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php _e( 'Count:' ); ?></label><br />
			<input type="number" min="1" max="20" value="<?php echo esc_attr( $count ); ?>" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" />
		</p>

		<?php
	}
}

// Register the widget.
add_action( 'widgets_init', 'quick_flickr_widget_init' );
function quick_flickr_widget_init() {
	register_widget( 'Autocar_Flickr_Widget' );
}

// Upgrade from old versions.
add_action( 'admin_init', 'quick_flickr_widget_upgrade' );
function quick_flickr_widget_upgrade() {
	$old = get_option( 'widget_quickflickr', false );
	if ( ! $old )
		return;

	$new = get_option( 'widget_quick-flickr-widget' );
	$new[] = array(
		'title' => isset( $old['title'] ) ? strip_tags( $old['title'] ) : 'Photostream',
		'count' => isset( $old['items'] ) ? absint( $old['items'] ) : 10,
		'tags' => isset( $old['tags'] ) ? strip_tags( $old['tags'] ) : '',
		'username' => isset( $old['username'] ) ? strip_tags( $old['username'] ) : '',
	);
	end( $new );
	$new_index = key( $new );
	update_option( 'widget_quick-flickr-widget', $new );

	$sidebars_widgets = get_option( 'sidebars_widgets' );
	foreach ( $sidebars_widgets as $sidebar => $widgets )
		if ( is_array( $widgets ) )
			foreach ( $widgets as $key => $widget )
				if ( $widget == 'quick-flickr' )
					$sidebars_widgets[$sidebar][$key] = 'quick-flickr-widget-' . $new_index;

	update_option( 'sidebars_widgets', $sidebars_widgets );
	delete_option( 'widget_quickflickr' );
}

			/*************** End *****************/
			
/*************** AutoCar Featured Post Widget *****************/
class widget_for_featured_post extends WP_Widget{
	function __construct()
	{
		parent::__construct('autocar_featured_post',__('Autocar Featured Post','autocar'),array('description' => __('Add Featured Post','autocar')));
	}
		public function widget( $args, $instance ) {
		extract( $args );
		$featured_postTitle = esc_attr( ! empty( $instance['featured_postTitle'] ) ? $instance['featured_postTitle'] : __( '', 'autocar' ));
		$no_fpost = esc_attr( ! empty( $instance['no_fpost'] ) ? $instance['no_fpost'] : __( '', 'autocar' ));
		echo '<div class="item">
				<aside id="%1$s" class="widget %2$s">';
		?>
		<?php if ( ! empty( $featured_postTitle )) {
			echo $args['before_title'] . $featured_postTitle. $args['after_title'];
			} 
			echo '<div class="futured-post">
					<ul class="slides">';
					
					$args = array( 'post_type' => 'post','category_name' => 'featured', 'posts_per_page' => esc_html($no_fpost) );
									 
					$loop = null;
					$loop = new WP_Query( $args );
					if( $loop->have_posts() ) {
					while ( $loop->have_posts() ) : $loop->the_post();
					$feat_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(),'autocar_feturedpost' );		
					 echo '<li><img src="'. esc_url( $feat_image_url[0] ). '" alt="" />
						 <div class="slide-caption">
						 <a href="#"><h6>'. get_the_title() .'</h6></a>';
						 echo '
						 </div>
						  </li>';
				endwhile;
				wp_reset_postdata();
			}	
				echo '</ul></div></aside></div>';
	}
		public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
		$featured_postTitle = esc_attr( ! empty( $instance['featured_postTitle'] ) ? $instance['featured_postTitle'] : __( '', 'autocar' ));
		$no_fpost = esc_attr( ! empty( $instance['no_fpost'] ) ? $instance['no_fpost'] : __( '', 'autocar' ));
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'featured_postTitle' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'featured_postTitle' ); ?>" name="<?php echo $this->get_field_name( 'featured_postTitle' ); ?>" type="text" value="<?php echo  $featured_postTitle ; ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'no_fpost' ); ?>"><?php _e( 'No. Of Post:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'no_fpost' ); ?>" name="<?php echo $this->get_field_name( 'no_fpost' ); ?>" type="text" value="<?php echo  $no_fpost ; ?>">
		</p>
		<?php 
	}
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['featured_postTitle'] = ( ! empty( $new_instance['featured_postTitle'] ) ) ? strip_tags( $new_instance['featured_postTitle'] ) : '';
		$instance['no_fpost'] = ( ! empty( $new_instance['no_fpost'] ) ) ? strip_tags( $new_instance['no_fpost'] ) : '';
		return $instance;
	}

}
add_action( 'widgets_init','register_featured_post_widget' );
function register_featured_post_widget()
{
	register_widget( 'widget_for_featured_post' );
}

/* recent car post type vehicle */
class autocar_recent_vehicle extends WP_Widget {
	function __construct() {
		parent::__construct(
			'autocar_recent_vehicle', // Base ID
			__('Recent Vehicle', 'autocar'), // Name
			array( 'description' => __( 'Recent vehicle Widget', 'autocar' ), ) 
		);
	} 
	public function widget( $args, $instance ) {
		$title = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
		$no_of_post = isset( $instance[ 'no_of_post' ] ) ? $instance[ 'no_of_post' ] : '';
		echo $args['before_widget'];
		echo '<div class="recent-posts">';
			echo $args['before_title'] . esc_html($title) . $args['after_title'];
			global $post;
			$arg = array(
				'post_type' => 'vehicle',
				'posts_per_page' => $no_of_post,
			);
			$recentcar = new WP_Query( $arg );
			if($recentcar){
				if ( $recentcar->have_posts() ) : 
					while ( $recentcar->have_posts() ) : $recentcar->the_post(); 
						echo '<div class="recent-item">';
							echo '<div class="autocar_recent_car_img">';
								echo '<a href="'.esc_url(get_the_permalink($post->ID)).'">';
									$src = '';
									if(has_post_thumbnail($post->ID)){
										$thumb = get_post_thumbnail_id($post->ID);
										$src = wp_get_attachment_image_src($thumb,'autocar_recentpost');	
										echo '<img src="'.esc_url($src[0]).'" alt="'.esc_html(get_the_title($post->ID)).'" />';
									}
								echo '</a>';
							echo '</div>';
							echo '<div class="autocar_recent_car_content">';
								echo '<a href="'.esc_url(get_the_permalink($post->ID)).'">
								<h4>'.esc_html(get_the_title($post->ID)).'</h4></a>';
								echo '<div class="line-dec"></div>';
								echo '<span>';
								echo get_option( 'options_pcd_currency_symbol', '$' ); 
								echo esc_html(get_field( 'price', $post->ID ));
								echo '</span>';
							echo '</div>';
						echo '</div>';
					endwhile; 
				endif;	
			}
			wp_reset_postdata();
		echo '</div>';
		echo $args['after_widget'];
	}
	public function form( $instance ) {
		$title = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
		$no_of_post = isset( $instance[ 'no_of_post' ] ) ? $instance[ 'no_of_post' ] : '';
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo 'Title:'; ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'no_of_post' ); ?>"><?php echo 'No Of Post:'; ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'no_of_post' ); ?>" name="<?php echo $this->get_field_name( 'no_of_post' ); ?>" type="text" value="<?php echo esc_attr( $no_of_post ); ?>">
		</p>
		  <?php 
	}
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['no_of_post'] = ( ! empty( $new_instance['no_of_post'] ) ) ? strip_tags( $new_instance['no_of_post'] ) : '';
		return $instance;
	}
}
function autocarcore_recent_vehicle() {
    register_widget( 'autocar_recent_vehicle' );
}
add_action( 'widgets_init', 'autocarcore_recent_vehicle' );
/* recent car post type vehicle */

/* autocar search car form */
class AutoCar_search_form extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'AutoCar_search_form', 'description' => __('this is widgets for search car in vehicle post type.'));
		$control_ops = array('width' => 400, 'height' => 350);
		parent::__construct('AutoCar_search_form', __('Vehicle Search Form'), $widget_ops, $control_ops);
	}
	
	public function widget( $args, $instance ) {
		$title = ( ! empty( $instance['title'] ) ) ? strip_tags( $instance['title'] ) : '';
		$search_fields = isset($instance['search_fields']) ? $instance['search_fields'] : array();
		
		global $car_dealer;
		
		$search_fields = implode(',',$search_fields);
		
		echo $args['before_widget'];
			echo $args['before_title'] . esc_html($title) . $args['after_title'];
			echo do_shortcode( "[vehicle_searchform include='".esc_attr($search_fields)."']" );
		echo $args['after_widget'];
	}
	
	public function form( $instance ) {
		global $car_dealer;
		
		$registered_fields = array();
		
		if($car_dealer){
			$registered_fields = $car_dealer->fields->get_registered_fields();			
		}
		
		$registered_fields['keyword'] = array('label'=>'keyword');
		$registered_fields['order'] = array('label'=>'order');
		
		$title = isset($instance['title']) ? strip_tags($instance['title']) : '';
		$fields = isset($instance['search_fields']) ? $instance['search_fields'] : array();
		
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo __('Title:','autocar'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_html( $title ); ?>">
		</p>
		<?php
		foreach($registered_fields as $k=>$v){
			?>
			<p>
			<input class="widefat" name="<?php echo $this->get_field_name( $k ); ?>" type="checkbox" value="<?php echo esc_html( $k ); ?>" <?php echo in_array($k, $fields) ? 'checked' : ''; ?> > <?php echo esc_html($v['label']); ?>
			</p>
			<?php
		}
		
	}
	
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		
		global $car_dealer;
		$fields = array();
		
		if($car_dealer){
			$registered_fields = $car_dealer->fields->get_registered_fields();			
		}
		
		$registered_fields['keyword'] = array('label'=>'keyword');
		$registered_fields['order'] = array('label'=>'order');
		
		foreach($registered_fields as $k=>$v){
			if(isset($new_instance[$k])){
				$fields[] = $k;
			}
		}
		
		$instance['search_fields'] = $fields;
		
		return $instance;
	}
}

function autocarcore_search_form() {
    register_widget( 'AutoCar_search_form' );
}
add_action( 'widgets_init', 'autocarcore_search_form' );
/* autocar search car form */
?>