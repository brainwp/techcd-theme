<?php
class Home_Widget extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'Home_Widget', 'description' => 'Home Widget');
		$control_ops = array('width' => 400, 'height' => 350);
		parent::__construct('Home_Widget','Home Widget', $widget_ops, $control_ops);
	}

	public function widget( $args, $instance ) {

		/** This filter is documented in wp-includes/default-widgets.php */
		$title = apply_filters( 'widget_home_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		/**
		 * Filter the content of the Text widget.
		 *
		 * @since 2.3.0
		 *
		 * @param string    $widget_text The widget content.
		 * @param WP_Widget $instance    WP_Widget instance.
		 */
		$image = apply_filters( 'widget_home_image', empty( $instance['image'] ) ? '' : $instance['image'], $instance );
		$text = apply_filters( 'widget_home_text', empty( $instance['text'] ) ? '' : $instance['text'], $instance );
		$class = apply_filters( 'widget_home_class', empty( $instance['class'] ) ? '' : $instance['class'], $instance );
		$link = apply_filters( 'widget_home_link', empty( $instance['link'] ) ? '' : $instance['link'], $instance );?>
		<div class="col-md-4 home_widget">
			<img src="<?php echo $image; ?>">
			<div class="col-md-12 titulo <?php echo $class; ?>">
				<?php echo $title; ?>
			</div>
			<div class="col-md-12 text">
				<?php echo $text; ?>
			</div><!-- .col-md-12 text -->
			<div class="col-md-12 link">
				<a href="<?php echo $link; ?>" class="read-more small float-left pull-left">Saiba mais</a>
			</div><!-- .col-md-12 link -->
		</div>
		<?php
	}

	public function update( $new_instance, $old_instance ){
		$instance = $old_instance;
		$instance['link'] = $new_instance['link'];
		$instance['image'] = $new_instance['image'];
		$instance['class'] = $new_instance['class'];
		$instance['title'] = $new_instance['title'];
		if ( current_user_can('unfiltered_html') )
			$instance['text'] =  $new_instance['text'];
		else
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) ); // wp_filter_post_kses() expects slashed
		return $instance;
	}

	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'link' => '', 'text' => '', 'class' => '', 'title' => '', 'text' => '') );
		$link = strip_tags($instance['link']);
		$image = strip_tags($instance['image']);
		$class = strip_tags($instance['class']);
		$title = strip_tags($instance['title']);
		$text = esc_textarea($instance['text']);
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php echo 'Titulo:'; ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('link'); ?>"><?php echo 'Link:'; ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo esc_attr($link); ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('image'); ?>"><?php echo 'URL da imagem:'; ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('image'); ?>" type="text" value="<?php echo esc_attr($image); ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('class'); ?>"><?php echo 'Classe do icone:'; ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('class'); ?>" name="<?php echo $this->get_field_name('class'); ?>" type="text" value="<?php echo esc_attr($class); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('text'); ?>"><?php echo 'Texto:'; ?></label>
		<textarea class="widefat" rows="8" cols="8" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>
	<?php
	}
}
function theme_register_widgets() {
	register_widget( 'Home_Widget' );
}

add_action( 'widgets_init', 'theme_register_widgets' );
register_sidebar( array(
    'id'          => 'home_sidebar',
    'name'        => __( 'Home Sidebar', 'techcd-theme' ),
    'description' => __( 'This sidebar is located above the age logo', 'techcd' )
) );
?>
