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
			array( 'description' => __( 'Aktuelle Unwetterwarnungen vom Deutschen Wetter Dienst', 'dwd_textdomain' ), ) // Args
		);
	}

 	public function form( $instance ) {
		// outputs the options form on admin
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'New title', 'dwd_textdomain' );
		}
		// Widget admin form
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}

	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) )
		echo $args['before_title'] . $title . $args['after_title'];
		// outputs the content of the widget
		$html = 	"<figur>".
						"<img src='http://www.dwd.de/dyn/app/ws/maps/SU_x_x_0.gif' alt='Unwetterkarte BW' width='100%' />".
					"</figur>".
					"<a href='http://www.dwd.de/dyn/app/ws/html/reports/KAX_warning_de.html#WS_ANCHOR_0' target='_blank'>Warnlage - Karlsruhe</a>";
				
		echo $html;
		echo $args['after_widget'];

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
