<?php
/*
Plugin Name: DWD Widget
Plugin URI: http://github.com/mybecks/dwd_plugin
Description: DWD Widget
Version: 0.0.2
Author: Andre Becker
Author URI: la.ffbs.de
License: GPL2
*/

/**
 * Widget class
 * 
 * @author Andre Becker
 **/
class DWD_Widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
	 		'dwd_widget', // Base ID
			'DWD Widget', // Name
			array( 'description' => __( 'Aktuelle Unwetterwarnungen vom Deutschen Wetter Dienst', 'text_domain' ), ) // Args
		);
	}

 	public function form( $instance ) {
		// outputs the options form on admin
	}

	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
	}

	public function widget( $args, $instance ) {
		// outputs the content of the widget
		
		$html = "<aside id='dwd-widget'>".
					"<h3 class='widget-title'>Unwetterwarnungen</h3>".
					"<figur>".
						"<img src='http://www.dwd.de/dyn/app/ws/maps/SU_x_x_0.gif' alt='Unwetterkarte BW' width='100%' />".
					"</figur>".
					// "<a href='http://www.dwd.de/bvbw/appmanager/bvbw/dwdwwwDesktop?_nfpb=true&_windowLabel=T14600649251144330032285&_urlType=action&_pageLabel=_dwdwww_wetter_warnungen_warnungen&WEEKLY_REPORT_VIEW=false&TIME=x&SHOW_HEIGHT_SEL=true&MAP_VIEW=true&MOVIE_VIEW=false&TABLE_VIEW=false&HEIGHT=x&SHOW_TIME_SEL=true&STATIC_CONTENT_VIEW=false&WARNING_TYPE=0&LAND_CODE=SU' target='_blank'><img src='http://www.dwd.de/dyn/app/ws/maps/SU_x_x_0.gif' alt='Unwetterkarte BW' width='100%' /></a>".
					"<a href='http://www.dwd.de/dyn/app/ws/html/reports/KAX_warning_de.html#WS_ANCHOR_0' target='_blank'>Warnlage - Karlsruhe</a>".
				"</aside>";
		print($html);

		// Warnungen vor extremem Unwetter - color: rgb(175,0,100)

		// Unwetterwarnungen - color: rgb(250,0,0)
		 
		// Warnungen vor markantem Wetter - color: rgb(250,150,0)
		 
		// Wetterwarnungen - color: rgb(255,255,0)
		 
		// Hitzewarnungen - color: rgb(204,153,255)
		 
		// Keine Warnungen - color: rgb(100,180,255)
	}

}

/**
 * Initialize Widget
 * 
 * @author Andre Becker
 **/
function dwd_widget_init() {
  register_widget( 'DWD_Widget' );
}

add_action( 'widgets_init', 'dwd_widget_init' );
?>
