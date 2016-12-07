<?php
/*
 * Plugin Name:       Shapely Companion
 * Plugin URI:        http://colorlib.com/wp/themes/blesk/
 * Description:       Shapely Companion is a companion plugin for Shapely theme.
 * Version:           1.0.1
 * Author:            Colorlib
 * Author URI:        http://colorlib.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       shapely-companion
 * Domain Path:       /languages
 */

define( 'SHAPELY_COMPANION', '1.0.0' );

/** 
 * Widgets
 */
foreach ( glob( plugin_dir_path( __FILE__ ) . 'widgets/*.php' ) as $lib_filename ) {
	require_once( $lib_filename );
}

add_action( 'widgets_init', 'shapely_companion_widgets_init' );

function shapely_companion_widgets_init(){

	register_widget( 'shapely_recent_posts' );
    register_widget( 'shapely_categories' );
    register_widget( 'shapely_home_parallax' );
    register_widget( 'shapely_home_features' );
    register_widget( 'shapely_home_testimonial' );
    register_widget( 'shapely_home_CFA' );
    register_widget( 'shapely_home_clients' );
    register_widget( 'shapely_home_portfolio' );

}

// Import Demo content
add_action( 'shapely_welcome', 'shapely_companion_demo_tab' );

function shapely_companion_demo_tab (){
  	include 'shapely-demo-content.php';
}

add_action( 'admin_enqueue_scripts', 'shapely_companion_admin_scripts' );
function shapely_companion_admin_scripts($hook){

  	wp_enqueue_style( 'shapely-companion-admin-css', plugins_url( '/css/admin.css' , __FILE__ ) );
  	wp_enqueue_script( 'shapely-companion-admin-js', plugins_url( '/js/admin.js' , __FILE__ ), array('jquery') );
  	wp_localize_script( 'shapely-companion-admin-js', 'shapelyCompanion', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
  	) );

	if ( $hook == 'widgets.php' || $hook == 'customize.php' ) {
		wp_enqueue_media();
		wp_enqueue_script( 'shapely_cloneya_js', plugins_url() . '/js/jquery-cloneya.min.js', array( 'jquery' ) );
		wp_enqueue_script( 'widget-js', plugins_url() . '/js/widget.js', array( 'media-upload' ), '1.0', true );

		// Add Font Awesome stylesheet
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/inc/css/font-awesome.min.css' );

	}

}

if( !function_exists( 'shapely_companion_add_default_widgets' ) ) {
  /**
  * Function to import widgets based on a JSON config file
  * JSON file is generated using plugin: Widget Importer / Exporter
  * @link https://github.com/stevengliebe/widget-importer-exporter
  */
  function shapely_companion_add_default_widgets() {
      $json = '{"sidebar-home":{"shapely_home_parallax-2":{"title":"We Change Everything WordPress","image_src":"https:\/\/colorlib.com\/flexible\/wp-content\/uploads\/sites\/12\/2016\/03\/photo-1443527216320-7e744084f5a7.jpg","image_pos":"background-full","body_content":"This is the only WordPress theme you will ever want to use.","button1":"Read More","button2":"Download Now","button1_link":"#","button2_link":"#"},"shapely_home_parallax-3":{"title":"SEO Friendly","image_src":"https:\/\/colorlib.com\/flexible\/wp-content\/uploads\/sites\/12\/2016\/03\/macbook-preview-flexible.png","image_pos":"left","body_content":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam pulvinar luctus sem, eget porta orci. Maecenas molestie dui id diam feugiat, eu tincidunt mauris aliquam. Duis commodo vitae ligula et interdum. Maecenas faucibus mattis imperdiet. In rhoncus ac ligula id ultricies.","button1":"Read more","button2":"","button1_link":"#","button2_link":""},"shapely_home_parallax-4":{"title":"Portfolio Section","image_src":"https:\/\/colorlib.com\/flexible\/wp-content\/uploads\/sites\/12\/2016\/03\/flexible-portfolio.png","image_pos":"right","body_content":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam pulvinar luctus sem, eget porta orci. Maecenas molestie dui id diam feugiat, eu tincidunt mauris aliquam. Duis commodo vitae ligula et interdum.","button1":"See it in action","button2":"","button1_link":"#","button2_link":""},"shapely_home_parallax-5":{"title":"Small Parallax Section","image_src":"https:\/\/colorlib.com\/flexible\/wp-content\/uploads\/sites\/12\/2016\/03\/photo-1452723312111-3a7d0db0e024.jpg","image_pos":"background-small","body_content":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus imperdiet rhoncus porta. Ut quis sem quis purus lobortis dictum. Aliquam nec dignissim nisl. Vivamus cursus feugiat sapien, eget tincidunt leo ornare quis.","button1":"MORE INFO","button2":"","button1_link":"#","button2_link":""},"shapely_home_parallax-6":{"title":"Limitless Options","image_src":"https:\/\/colorlib.com\/flexible\/wp-content\/uploads\/sites\/12\/2016\/03\/photo-1440557653082-e8e186733eeb-1.jpg","image_pos":"bottom","body_content":"Phasellus sed nisi ac dui interdum semper. Etiam consequat fermentum sollicitudin. Fusce vulputate porta faucibus. Vivamus nulla tellus, accumsan non efficitur id, pretium quis ante","button1":"Download Now","button2":"","button1_link":"#","button2_link":""},"shapely_home_portfolio-2":{"title":"Our Latest Projects","body_content":"Here is our latest projects. You&#039;ll love them!"},"shapely_home_testimonial-2":{"title":"What Our Customers Say","limit":"5","image_src":"https:\/\/colorlib.com\/flexible\/wp-content\/uploads\/sites\/12\/2016\/03\/photo-1451417379553-15d8e8f49cde.jpg"},"shapely_home_clients-2":{"title":"Our Main Clients","client_logo":{"img":["https:\/\/colorlib.com\/flexible\/wp-content\/uploads\/sites\/12\/2016\/03\/wordpress-logo.png","https:\/\/colorlib.com\/flexible\/wp-content\/uploads\/sites\/12\/2016\/03\/less-logo.png","https:\/\/colorlib.com\/flexible\/wp-content\/uploads\/sites\/12\/2016\/03\/adobe-logo.png","https:\/\/colorlib.com\/flexible\/wp-content\/uploads\/sites\/12\/2016\/03\/css-logo.png","https:\/\/colorlib.com\/flexible\/wp-content\/uploads\/sites\/12\/2016\/03\/sass-logo.png","https:\/\/colorlib.com\/flexible\/wp-content\/uploads\/sites\/12\/2016\/03\/bootstrap-logo.jpg","https:\/\/colorlib.com\/flexible\/wp-content\/uploads\/sites\/12\/2016\/03\/html5-logo.png","https:\/\/colorlib.com\/flexible\/wp-content\/uploads\/sites\/12\/2016\/03\/facebook-logo.png","https:\/\/colorlib.com\/flexible\/wp-content\/uploads\/sites\/12\/2016\/03\/js-logo.png"],"link":["#","#","#","#","#","#","#","#","#"]}},"shapely_home_cfa-2":{"title":"Do you like this awesome WordPress theme?","button":"Download Now","button_link":"#"}}}';
      $config = json_decode($json);
      $sidebars_widgets = get_option( 'sidebars_widgets' );
      # Parse config
      foreach ( $config as $sidebar => $elemements ) {
          # verify if the sidebar doesn't have ny widgets
          if (  strpos( $sidebar, 'orphaned_widgets' ) === false && !is_active_sidebar($sidebar) ) {
              # create an empty array for active widgets
              $this_sidebar_active_widgets = array();
              # parse all widgets for current sidebar
              foreach ( $elemements as $id_widget => $args ) {
                  # add current widget to current sidebar
                  $this_sidebar_active_widgets[] = $id_widget;
                  # split widget name in order to get widget name and index
                  $id_widget_parts = explode('-',$id_widget);
                  # get widget index
                  $index_widget = end($id_widget_parts);
                  #remove widget index from array
                  array_pop($id_widget_parts);
                  #generate widget name
                  $widget_name = implode('-', $id_widget_parts);
                  #get all widgets who are like current widget
                  $widgets = get_option( 'widget_'.$widget_name );
                  #check if current index exist in array
                  if ( !isset($widgets[$index_widget]) ) {
                      #add current widget with his index and args
                      $widgets[$index_widget] = get_object_vars($args);
                  }
                  #update widgets who are like current widget
                  update_option( 'widget_'.$widget_name, $widgets );
              }
              $sidebars_widgets[$sidebar] = $this_sidebar_active_widgets;
          }
      }
      update_option( 'sidebars_widgets', $sidebars_widgets );
  }
}

add_action( 'wp_ajax_shapely_companion_import_content', 'shapely_companion_import_content' );

function shapely_companion_import_content() {

  if ( isset($_POST['import']) ) {
    
    if ( $_POST['import'] == 'import-all' ) {
      
      $frontpage_title = __( 'Front Page', 'shapely-companion' );
      $blog_title = __( 'Blog', 'shapely-companion' );

      $frontpage_id = wp_insert_post(  array( 'post_title' => $frontpage_title, 'post_status'   => 'publish', 'post_type' => 'page' ) );
      $blog_id = wp_insert_post(  array( 'post_title' => $blog_title, 'post_status'   => 'publish', 'post_type' => 'page' ) );

      if( -1 != $frontpage_id ) {
        update_post_meta( $frontpage_id, '_wp_page_template', 'template-home.php' );
      } // end if

      update_option( 'show_on_front', 'page' );
      update_option( 'page_on_front', $frontpage_id );
      update_option( 'page_for_posts', $blog_id );

      shapely_companion_add_default_widgets();


    }elseif ( $_POST['import'] == 'import-widgets' ) {
      shapely_companion_add_default_widgets();
    }

    $shapely_show_required_actions = get_option('shapely_show_required_actions');
    $shapely_show_required_actions['shapely-req-import-content'] = true;
    update_option( 'shapely_show_required_actions',$shapely_show_required_actions );

    echo 'succes';
  }else{
    echo 'error';
  }
  
  exit();

}

function shapely_allow_skype_protocol( $protocols ){
	$protocols[] = 'skype';
	return $protocols;
}
add_filter( 'kses_allowed_protocols' , 'shapely_allow_skype_protocol' );