<?php 
/**
 * Widget Name: U-Design-WooCommerce Cart
 * Description: A widget that displayes account info such as Login | Register | Cart Info
 * Version: 0.1
 *
 */

/**
 * Add function to widgets_init that'll load our widget.
 * @since 0.1
 */
add_action( 'widgets_init', 'udesign_woocommerce_account_load_widgets' );

/**
 * Register our widget.
 * 'UDesign_WooCommerce_Widget_Cart' is the widget class used below.
 *
 * @since 0.1
 */
function udesign_woocommerce_account_load_widgets() {
	register_widget( 'UDesign_WooCommerce_Widget_Cart' );
}

/**
 * U-Design-WooCommerce My Cart Widget class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.  Nice!
 *
 * @since 0.1
 */
class UDesign_WooCommerce_Widget_Cart extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function UDesign_WooCommerce_Widget_Cart() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'udesign-wc-cart', 'description' => esc_html__('A widget that displays cart info.', 'udesign') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 150, 'height' => 350, 'id_base' => 'udesign-wc-cart-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'udesign-wc-cart-widget', esc_html__('U-Design: WooCommerce Cart', 'udesign'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );

		/* Before widget (defined by themes). */
		echo $before_widget;
                
		/* Display the widget title ONLY if the widget is used in widget area other than "Top Area Social Media" */
		//if ( $title && ( $args['id'] != 'top-area-social-media' ) )
		if ( $title )
			echo $before_title . $title . $after_title;
                
                
                /* Apply the following widget styles ONLY if the widget is used in "Top Area Social Media" widget area */
		if ( $args['id'] == 'top-area-social-media' ) : 
                    global $udesign_options; ?>
                    <style>
                        .social-media-area .udesign-wc-cart,
                        .social-media-area .udesign-wc-cart a,
                        .social-media-area .udesign-wc-cart h3.social_media_title { color:#<?php echo $udesign_options['top_text_color']; ?>; }
                    </style>
<?php           endif; ?>
                <div class="udesign-woocommerce-my-cart">
<?php               global $woocommerce; ?>
<?php               if ( is_user_logged_in() ) { ?>
                        <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','woothemes'); ?>"><?php _e('My Account','woothemes'); ?></a> | 
                        <a href="<?php echo wp_logout_url( get_permalink() ) ?>" title="<?php _e('Logout','woothemes'); ?>"><?php _e('Logout','woothemes'); ?></a>
<?php               } else { ?>
                        <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login','woothemes'); ?>"><?php _e('Login','woothemes'); ?></a> | 
                        <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Register','woothemes'); ?>"><?php _e('Register','woothemes'); ?></a>
<?php               } ?>

                    | <a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('Cart: %d item', 'Cart: %d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
                </div>

<?php 
		/* After widget (defined by themes). */
		echo $after_widget;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );

		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => esc_html__('Cart', 'udesign') );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e('Title:', 'udesign'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" type="text" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>

<?php
	}
}

