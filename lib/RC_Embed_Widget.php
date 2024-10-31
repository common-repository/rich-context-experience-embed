<?php
require_once('RC_Utils.php');

class RC_Embed_Widget extends WP_Widget {
	// Main constructor
	public function __construct() {
		parent::__construct(
			'rc_embed_widget',
			__( 'Rich Context Embed', 'text_domain' ),
			array(
				'customize_selective_refresh' => true,
			)
		);
	}
	// The widget form (for the backend )
	public function form( $instance ) {
		// Set widget defaults
		$defaults = array(
			'configuration_id'    => '',
		);

		// Parse current settings with defaults
		extract( wp_parse_args( ( array ) $instance, $defaults ) ); ?>

		<?php // Configuration ID ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'configuration_id' ) ); ?>"><?php _e( 'Configuration ID', 'text_domain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'configuration_id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'configuration_id' ) ); ?>" type="text" value="<?php echo esc_attr( $configuration_id ); ?>" />
		</p>

	<?php
  }
	// Update widget settings
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['configuration_id']    = isset( $new_instance['configuration_id'] ) ? wp_strip_all_tags( $new_instance['configuration_id'] ) : '';
		return $instance;
	}
	// Display the widget
	public function widget( $args, $instance ) {
		extract( $args );
		// Check the widget options
		$configuration_id  = isset( $instance['configuration_id'] ) ? $instance['configuration_id'] : '';
		// WordPress core before_widget hook (always include )
		echo $before_widget;
		// Display the widget
		if ( $configuration_id ) {
			echo RC_Utils::display_embed($configuration_id);
		} else {
      echo "Please configure.";
    }
		// WordPress core after_widget hook (always include )
		echo $after_widget;
	}
}
 ?>
