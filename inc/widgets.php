<?php
class Newsletter_Widget extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'Newsletter_Widget', 'description' => 'Newsletter');
		$control_ops = array('width' => 400, 'height' => 350);
		parent::__construct('Newsletter_Widget','Newsletter Widget', $widget_ops, $control_ops);
	}

	public function widget( $args, $instance ) {

		/** This filter is documented in wp-includes/default-widgets.php */
		$title = apply_filters( 'widget_newsletter_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		/**
		 * Filter the content of the Text widget.
		 *
		 * @since 2.3.0
		 *
		 * @param string    $widget_text The widget content.
		 * @param WP_Widget $instance    WP_Widget instance.
		 */
		$form_end = apply_filters( 'widget_newsletter_form_end', empty( $instance['form_end'] ) ? '' : $instance['image'], $instance );
		$sub_title = apply_filters( 'widget_newsletter_sub_title', empty( $instance['sub_title'] ) ? '' : $instance['sub_title'], $instance );
		$placeholder = apply_filters( 'widget_newsletter_placeholder', empty( $instance['placeholder'] ) ? '' : $instance['placeholder'], $instance );
		$text = apply_filters( 'widget_newsletter_text', empty( $instance['text'] ) ? '' : $instance['text'], $instance ); ?>
		<h5><?php echo $title;?></h5>
		<small><?php echo $sub_title;?></small>
		<p><?php echo $text;?></p>
		<form action="<?php echo $form_end;?>">

			<fieldset>

				<input type="text" placeholder="<?php echo $placeholder;?>" class="input-text autoclear" /><input type="submit" value="" class="input-submit" />

			</fieldset>

		</form>
		<?php
	}

	public function update( $new_instance, $old_instance ){
		$instance = $old_instance;
		$instance['form_end'] = $new_instance['form_end'];
		$instance['sub_title'] = $new_instance['sub_title'];
		$instance['placeholder'] = $new_instance['placeholder'];
		$instance['title'] = $new_instance['title'];
		if ( current_user_can('unfiltered_html') )
			$instance['text'] =  $new_instance['text'];
		else
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) ); // wp_filter_post_kses() expects slashed
		return $instance;
	}

	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'form_end' => '', 'sub_title' => '', 'placeholder' => '', 'title' => '', 'text' => '') );
		$form_end = strip_tags($instance['form_end']);
		$sub_title = strip_tags($instance['sub_title']);
		$placeholder = strip_tags($instance['placeholder']);
		$title = strip_tags($instance['title']);
		$text = esc_textarea($instance['text']);
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php echo 'Titulo:'; ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('sub-title'); ?>"><?php echo 'Sub Titulo:'; ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('sub_title'); ?>" name="<?php echo $this->get_field_name('sub_title'); ?>" type="text" value="<?php echo esc_attr($sub_title); ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('placeholder'); ?>"><?php echo 'Texto antes de digitar o email (PLACEHOLDER):'; ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('placeholder'); ?>" name="<?php echo $this->get_field_name('placeholder'); ?>" type="text" value="<?php echo esc_attr($placeholder); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('text'); ?>"><?php echo 'Texto:'; ?></label>
		<textarea class="widefat" rows="8" cols="8" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>
	<?php
	}
}
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
				<span class="item"><?php echo $title; ?></span>
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
		$instance = wp_parse_args( (array) $instance, array( 'link' => '', 'text' => '', 'class' => '', 'title' => '', 'text' => '', 'image' => '') );
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
class Image_Widget_Techcd extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'Image_Widget_Techcd', 'description' => 'Image Widget');
		$control_ops = array('width' => 400, 'height' => 350);
		parent::__construct('Image_Widget_Techcd','Widget de Imagem', $widget_ops, $control_ops);
	}

	public function widget( $args, $instance ) {


		/**
		 * Filter the content of the Text widget.
		 *
		 * @since 2.3.0
		 *
		 * @param string    $widget_text The widget content.
		 * @param WP_Widget $instance    WP_Widget instance.
		 */
		$image = apply_filters( 'widget_home_image', empty( $instance['image'] ) ? '' : $instance['image'], $instance );
		$link = apply_filters( 'widget_home_link', empty( $instance['link'] ) ? '' : $instance['link'], $instance );?>
		<div class="col-md-4 home_widget">
			<img src="<?php echo $image; ?>">
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
		if ( current_user_can('unfiltered_html') )
			$instance['text'] =  $new_instance['text'];
		else
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) ); // wp_filter_post_kses() expects slashed
		return $instance;
	}

	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'link' => '', 'text' => '', 'image' => '') );
		$link = strip_tags($instance['link']);
		$image = strip_tags($instance['image']);
		?>
		<p><label for="<?php echo $this->get_field_id('link'); ?>"><?php echo 'Link:'; ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo esc_attr($link); ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('image'); ?>"><?php echo 'URL da imagem:'; ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('image'); ?>" type="text" value="<?php echo esc_attr($image); ?>" /></p>
	<?php
	}
}
function theme_register_widgets() {
    register_widget( 'Image_Widget_Techcd' );
	register_widget( 'Home_Widget' );
	register_widget( 'Newsletter_Widget' );
}

add_action( 'widgets_init', 'theme_register_widgets' );
register_sidebar( array(
    'id'          => 'home_sidebar',
    'name'        => __( 'Home Sidebar', 'techcd-theme' ),
    //'description' => __( 'This sidebar is located above the age logo', 'techcd' )
) );
register_sidebar( array(
    'id'          => 'newsletter_sidebar',
    'name'        => __( 'Newsletter sidebar', 'techcd-theme' ),
    //'description' => __( 'This sidebar is located above the age logo', 'techcd' )
) );
 $args = array(
	'name'          => __( 'Blog', 'techcd-theme' ),
	'id'            => 'blog_sidebar',
	'before_title'  => '<h5 class="widget-title">',
	'after_title'   => '</h5>'
	);
register_sidebar($args);
?>
