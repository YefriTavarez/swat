<?php
/*
Plugin Name: autocarcore
Plugin URI: http://kamleshyadav.com/wp/autocar
Description: This plugin create custom post type and some meta option.
Version: 1.0.0
Author: Himanshu Mehta - himanshusofttech.com
Author URI: http://himanshusofttech.com/
*/

define('PLUGIN_PATH', plugin_dir_url( __FILE__ ) ); 

function autocar_load_plugin_textdomain() {

	$domain = 'autocarcore';
	$locale = apply_filters( 'plugin_locale', get_locale(), $domain );

	// wp-content/languages/plugin-name/plugin-name-de_DE.mo
	load_textdomain( $domain, trailingslashit( WP_LANG_DIR ) . $domain . '/' . $domain . '-' . $locale . '.mo' );
	// wp-content/plugins/plugin-name/languages/plugin-name-de_DE.mo
	load_plugin_textdomain( $domain, FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );

}
add_action( 'init', 'autocar_load_plugin_textdomain' );

function activate_autocarcore(){
	global $wpdb;
	$table_name = $wpdb->prefix . 'schedule_tbl';
	
	$charset_collate = $wpdb->get_charset_collate();
	$sql = "CREATE TABLE " . $table_name . " (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		name varchar(120) NOT NULL,
		title varchar(120) NOT NULL,
		email varchar(120) NOT NULL,
		phone varchar(50) NOT NULL,
		datetime DATETIME NOT NULL,
		status tinyint(2),
		PRIMARY KEY  (id),
		KEY (id)
		) $charset_collate;";
	
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta($sql);
}
register_activation_hook( __FILE__, 'activate_autocarcore' );

/* Admin enqueue */
function autocarcore_adminload_script(){
	wp_enqueue_script('autocarcore_admin', PLUGIN_PATH. 'js/admin.js');
	wp_enqueue_style('padmincss', PLUGIN_PATH. 'css/admin.css');
	wp_localize_script( 'autocarcore_admin', 'ajaxobject', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' )
	));
}
add_action('admin_enqueue_scripts','autocarcore_adminload_script');

require_once 'autocar-widgets.php';
require_once 'autocar-shortcode.php';
require_once 'autocar-CustomPostType.php';
require_once 'installdata/autocar-install.php';

add_filter( 'pcd/searchform/field/price' , 'autocarcore_sliderprice', 15, 2 );
function autocarcore_sliderprice( $field_html, $field ){
	global $car_dealer;
	$min = $car_dealer->fields->get_field_min_value( $field['name'] );
	$max = $car_dealer->fields->get_field_max_value( $field['name'] );
	ob_start();
	?>
	<input type="hidden" value="<?php echo esc_attr($min); ?>" id="autocarcore_price_min" name="<?php echo $field['name'].'[min]'; ?>" >
	<input type="hidden" value="<?php echo esc_attr($min + 10000); ?>" id="autocarcore_price_max" name="<?php echo $field['name'].'[max]'; ?>" >
	<div class="field slider_field">
		<p><?php esc_html_e('Price Range','autocarcore'); ?></p>
		<input id="autocarcore-slider-range" type="text" class="span2" value="" data-slider-min=" <?php echo esc_attr($min); ?>" data-slider-max="<?php echo esc_attr($max); ?>" data-slider-step="5" data-slider-value="[<?php echo esc_attr($min); ?>,<?php echo esc_attr($min + 10000); ?>]"/>
	</div>
	<?php
	return ob_get_clean();
}

add_action('admin_menu', 'autocarcore_vehicle_submenu_page');
function autocarcore_vehicle_submenu_page(){
	add_submenu_page( 'edit.php?post_type=vehicle', esc_html__('schedule','autocar'), esc_html__('schedule','autocar'), 'edit_themes', 'autocar_schedule', 'autocar_schedule');
}
function autocar_schedule(){
	
	$schedule = get_option('autocar_schedule');
	
	echo '<div class="autocar_wrapper">';
		echo '<div class="autocar_bottom_section">';
			echo '<div class="autocar_top_tabs autocar_right_section">';
				echo '<div class="autocar_input_section">';
					echo '<label>Schedule Form</label>';
					echo '<select name="autocar_testschedule" id="autocar_testschedule">';
					echo '<option value="enable" ',($schedule == 'enable' ? 'selected' : ''),' >', esc_html__('Enable','autocarcore'), '</option>';
					echo '<option value="disable" ',($schedule == 'disable' ? 'selected' : ''),' >',esc_html__('Disable','autocarcore'),'</option>';
				echo '</select>';
				echo '</div>';
				echo '<div class="autocar_input_section">';
					echo '<button id="autocar_schedulebtn">submit</button>';
					echo '<div class="autocar_loading"></div>';
					echo '<div class="autocarcore_success"></div>';
				echo '</div>';
			echo '</div>';
		echo '</div>';
	echo '</div>';
	
	echo '<div class="autocar_wrapper">';
		global $wpdb;
		$table_name = $wpdb->prefix . 'schedule_tbl';
		$rows = $wpdb->get_results( "SELECT * FROM $table_name" );
		if($rows){
			echo '<table class="wp-list-table widefat fixed striped posts">';
			echo '<thead>';
				echo '<tr>';
				echo '<th>',esc_html__('S. NO.','autocarcore'),'</th>';
				echo '<th>',esc_html__('Title','autocarcore'),'</th>';
				echo '<th>',esc_html__('Name','autocarcore'),'</th>';
				echo '<th>',esc_html__('Email','autocarcore'),'</th>';
				echo '<th>',esc_html__('Phone Number','autocarcore'),'</th>';
				echo '<th>',esc_html__('Date and Time','autocarcore'),'</th>';
				echo '<th>',esc_html__('Status','autocarcore'),'</th>';
				echo '</tr>';
			echo '</thead>';
			echo '<tbody>';
			$i = 0;
			foreach($rows as $row){
				echo '<tr>';
				echo '<td>',++$i,'</td>';
				echo '<td>',esc_html($row->title),'</td>';
				echo '<td>',esc_html($row->name),'</td>';
				echo '<td>',esc_html($row->email),'</td>';
				echo '<td>',esc_html($row->phone),'</td>';
				echo '<td>',esc_html($row->datetime),'</td>';
				echo '<td><a href="javascript:;" class="autocar_schedule_done" data-id="'.$row->id.'" data-status="',$row->status,'">',$row->status == 1 ? esc_html__('Done','autocarcore') : 'Not Done','</a></td>';
				echo '</tr>';
			}
			echo '</tbody>';
			echo '<table>';
		}
	echo '</div>';
}

add_action( 'wp_ajax_nopriv_autocarcore_schedule', 'autocarcore_schedule' );
add_action( 'wp_ajax_autocarcore_schedule', 'autocarcore_schedule' );

function autocarcore_schedule(){
	if(isset($_POST['action']) && $_POST['action'] == 'autocarcore_schedule'){
		update_option('autocar_schedule',$_POST['testschedule']);
	}
	die();
}

add_action( 'wp_ajax_nopriv_autocarcore_schedule_done', 'autocarcore_schedule_done' );
add_action( 'wp_ajax_autocarcore_schedule_done', 'autocarcore_schedule_done' );

function autocarcore_schedule_done(){
	if(isset($_POST['action']) && $_POST['action'] == 'autocarcore_schedule_done'){
		global $wpdb;
		$table_name = $wpdb->prefix . 'schedule_tbl';
		
		if($wpdb->update($table_name, array('status'=>$_POST['status'] == 1 ? 0 : 1),array('id'=>$_POST['id']))){
			echo '1';
		}
	}
	die();
}

add_action( 'wp_ajax_nopriv_autocar_compare', 'autocar_compare' );
add_action( 'wp_ajax_autocar_compare', 'autocar_compare' );
function autocar_compare(){
	if(isset($_POST['action']) && $_POST['action'] == 'autocar_compare'){
		
		$cookiearr = isset($_COOKIE['autocar_car_items']) ? $_COOKIE['autocar_car_items'] : '';
		
		if(! empty( $cookiearr ) && count(explode(',',$cookiearr)) >= 3){
			echo json_encode(array('message' => esc_html__('You have already added 3 cars','autocar') ));
			die();
		}elseif(! empty( $cookiearr ) ){
			$cookiearr .= ','.$_POST['carId'];
		}else{
			$cookiearr .= $_POST['carId'];
		}
		setcookie('autocar_car_items', $cookiearr, time() + (86400 * 30), "/");
		echo json_encode(array('success'=>true, 'message'=> get_the_title($_POST['carId']).' - '.esc_html__('Added to compare','autocar') ));
		
	}
	die();
}

function check_is_compare_id($id, $icon = 'false'){
	$cookiearr = isset($_COOKIE['autocar_car_items']) ? $_COOKIE['autocar_car_items'] : '';
	
	if($icon == 'true'){
		$r = '<i class="fa fa-times" aria-hidden="true"></i>';
		$a = '<i class="fa fa-tachometer"></i>';
	}else{
		$r = 'Remove from list';
		$a = 'Add to compare';
	}
	
	if(! empty( $cookiearr ) ){
		$arr = explode(',',$cookiearr);
		if(in_array($id,$arr))
			return array('cls' => 'autocar_remove_car', 'txt' => $r);
	}
	return array('cls' => 'autocar_added_car', 'txt' => $a);
}

add_action( 'wp_ajax_nopriv_autocar_remove_compare', 'autocar_remove_compare' );
add_action( 'wp_ajax_autocar_remove_compare', 'autocar_remove_compare' );
function autocar_remove_compare(){
	if(isset($_POST['action']) && $_POST['action'] == 'autocar_remove_compare'){
		
		$cookiearr = isset($_COOKIE['autocar_car_items']) ? $_COOKIE['autocar_car_items'] : '';
		if(! empty( $cookiearr ) ){
			$arr = explode(',',$cookiearr);
			if(($key = array_search($_POST['carId'], $arr)) !== false) {
				unset($arr[$key]);
			}
			$cookiearr = implode(',',$arr);
			setcookie('autocar_car_items', $cookiearr, time() + (86400 * 30), "/");
		}
		
		ob_start();
		autocar_compare_itemsadd();
		$html = ob_get_clean();
		
		echo json_encode(array('success'=>true, 'message'=> get_the_title($_POST['carId']).' '.esc_html__('have removed from compare list.','autocar'), 'html' => $html ));
		
	}
	die();
}