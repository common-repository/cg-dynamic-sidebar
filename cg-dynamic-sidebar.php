<?php 
/*
Plugin Name: Dynamic Sidebar
Plugin URI: http://chandangarg.wordpress.com
Description: Plugin for creating dynamic sidebar area at wordpress admin
Author: Chandan Garg
Version: 1.0
Author URI: http://chandangarg.wordpress.com
*/
    
/*
* Register our sidebars  areas.
*/

// code to create sidebar area.
if( isset($_REQUEST['action']) && !empty($_REQUEST['action']) && $_REQUEST['action'] == 'create_sidebar' ){
	$file = plugin_basename( __FILE__ );
	$path = plugin_dir_path( __FILE__ );
	global $widgettitle;
	$widgettitle = $_REQUEST['widgettitle'];
	$id = $_REQUEST['widgetid'];
	$widgetcontent = array(
		'name'          => $widgettitle,
		'id'            => $id,
		'class'         => 'custom_dynamic_widget',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'text_domain' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	);
	$widgetcontent = serialize($widgetcontent);
	
	$custom_widget_count = get_option( 'custom_widget_1' );
	if( empty($custom_widget_count) ){
		add_option( 'custom_widget_1', $widgetcontent, '', 'yes' );
	}else{
		$count = 0;
		for($i=1; $i < 20; $i++){
			$custom_widget_count = '';
			$custom_widget_count = get_option( 'custom_widget_'.$i );
			if( empty( $custom_widget_count) ){
				$count = $i;
				break;
			}
		}
		add_option( 'custom_widget_'.$count, $widgetcontent, '', 'yes' );
	}
	// code to add notice to wordpress admin
	function ds_admin_notice_success() { global $widgettitle; ?>
		<div class="notice notice-success is-dismissible">
			<p><?php _e( 'Your new Sidebar area [ '.$widgettitle.' ] is added successfully.', 'sample-text-domain' ); ?></p>
		</div>
		<?php
	}
	add_action( 'admin_notices', 'ds_admin_notice_success' );
}
// code to initialize sidebar
function ds_widgets_init() {
	// It allows maximum of 20 custom sidebar's to create
	for($i=1; $i < 20; $i++){
		$widgetcontent = '';
		$widgetcontent = get_option( 'custom_widget_'.$i );
		if( !empty($widgetcontent) ){
			$widgetcontent = unserialize($widgetcontent);
			register_sidebar( $widgetcontent );
		}
	}
}
add_action( 'widgets_init', 'ds_widgets_init' );
function ds_theme_name_scripts() {
	wp_enqueue_style( 'custom_style', plugins_url( '/css/ds_style.css' , __FILE__ ) );
	wp_enqueue_script( 'custom_script', plugins_url( '/js/ds_script.js' , __FILE__ ), array(), '1.0.0', true );
	wp_localize_script( 'custom_script', 'ajax_object',
            array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'admin_init', 'ds_theme_name_scripts' );
function ds_admin_widget_add_new() { ?>
    <div class="add_new_widget_area_section">
		<div class="button add_new_widget_area">Add New Sidebar Area</div>
		<div class="widget_area">
			<div class="wid">
				<form name="save_sidebar" method="POST" >
					<div class="row">
						<label>Sidebar Title</label>
						<input required="required" id="widgettitle" type="text" name="widgettitle" value="" placeholder="Enter Sidebar title here..." />
					</div>
					<div class="row">
						<label>Sidebar id <span style="font-size: 10px">( Alphabets and Numbers Only )</span></label><br>
						<label><span style="font-size: 10px">Allowed Strings : </span><span style="font-size: 12px">A-Z, a-z, 0-9</span></label>
						<input id="widgetid" required="required" type="text" name="widgetid" value="" pattern='[A-Za-z0-9\\s]*' placeholder="Enter Sidebar id here..." />
					</div>
					<div class="row">
						<input type="hidden" name="action" value="create_sidebar" />
						<input type="submit" value="Create New Sidebar Area" />
					</div>
				</form>
			</div>
		</div>
    </div>
    <?php
}
add_action('sidebar_admin_page', 'ds_admin_widget_add_new');
add_action( 'wp_ajax_ds_remove_custom_widget', 'ds_remove_custom_widget' );
add_action( 'wp_ajax_nopriv_ds_remove_custom_widget', 'ds_remove_custom_widget' );
function ds_remove_custom_widget(){
	$widget_id = $_REQUEST['id'];
	$count = 0;
	for($i=1; $i < 20; $i++){
		$custom_widget_count = '';
		$custom_widget_count = get_option( 'custom_widget_'.$i );
		$custom_widget_count = unserialize($custom_widget_count);
		if( $custom_widget_count ){
			$custom_id = $custom_widget_count['id'];
			if( $custom_id == $widget_id){
				delete_option( 'custom_widget_'.$i );
				function ds_admin_notice_error() { ?>
					<div class="notice notice-error is-dismissible">
						<p><?php _e( 'Your custom widget is deleted successfully.', 'sample-text-domain' ); ?></p>
					</div>
				<?php }
				add_action( 'admin_notices', 'ds_admin_notice_error' );
			}
		}
	}
	die();
} ?>
