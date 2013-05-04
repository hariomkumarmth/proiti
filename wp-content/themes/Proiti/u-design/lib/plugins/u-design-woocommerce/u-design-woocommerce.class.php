<?php
/*
Plugin Name: U-Design WooCommerce Integration
Plugin URI: 
Description: Make the U-Design WordPress theme compatible with WooCommerce plugin.
Author: Andon
Version: 1.0.1
Author URI: http://themeforest.net/user/internq7/portfolio?ref=internq7
License: GPL2
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/


class UDesignWooCommerce {
	var $plugin_path;
	var $plugin_url;
	
	public function __construct() {
		// Set Plugin Path
		$this->plugin_path = dirname(__FILE__);
	
		// Set Plugin URL
		$this->plugin_url = WP_PLUGIN_URL . '/u-design-woocommerce';
		
	        // Init Hook
	        add_action( 'init', array(&$this, 'init') );
                
                add_action('plugins_loaded', array($this, 'udesign_woocommerce_plugin'));
	}
        
        public function init() {
            // Enqueue plugin files (front end)
            if ( !is_admin() ) $this->udesign_woocommerce_enqueue_plugin_files();
        }
        
	protected function udesign_woocommerce_enqueue_plugin_files() {
            wp_enqueue_style('udesign-woocommerce-styles', $this->plugin_url . '/css/udesign-woocommerce-style.css', false, '1.0');
        }
        
        public function udesign_woocommerce_plugin() {
            
                // Register widgets
                include_once( 'widgets/widget-ud-wc-cart.php' );
                
                function udesign_wc_post_thumbnails_setup() {
                    remove_theme_support( 'post-thumbnails' );
                    add_theme_support( 'post-thumbnails', array( 'post', 'page', 'movie', 'product' ) );    
                }
                add_action('after_setup_theme', 'udesign_wc_post_thumbnails_setup');

                 // Remove the WooCommerce Logout link from main menu
                remove_filter( 'wp_nav_menu_items', 'woocommerce_nav_menu_items' );

                // First unhook the WooCommerce wrappers
                remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
                remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

                
                function udesign_theme_wrapper_start() {
                    global $udesign_options;
                    $content_position = ( $udesign_options['pages_sidebar_8'] == 'left' ) ? 'grid_16 push_8' : 'grid_16';
                    echo '<div id="content-container" class="container_24">';
                    echo '    <div id="main-content" class="'.$content_position.'">';
                    echo '        <div class="main-content-padding">';
                }
                function udesign_theme_wrapper_end() {
                    echo '        </div><!-- end main-content-padding -->';
                    echo '    </div><!-- end main-content -->';
                    if( sidebar_exist('PagesSidebar8') ) { get_sidebar('PagesSidebar8'); }
                    echo '</div><!-- end content-container -->';
                }
                // Then hook in functions to display the wrappers the "U-Design" theme requires:
                add_action('woocommerce_before_main_content', 'udesign_theme_wrapper_start', 10);
                add_action('woocommerce_after_main_content', 'udesign_theme_wrapper_end', 10);



                // Remove the Sidebar
                remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );


                remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20,0 );
                add_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 5, 0 );
                
                // Output the WooCommerce Breadcrumb
                function woocommerce_breadcrumb( $args = array() ) {
                        $defaults = array(
                                'delimiter'  => ' &rarr; ',
                                'wrap_before'  => '<div class="container_24"><div id="wc-breadcrumbs" itemprop="breadcrumb">',
                                'wrap_after' => '</div></div>',
                                'before'   => '',
                                'after'   => '',
                                'home'    => null
                        );
                        $args = wp_parse_args( $args, $defaults  );
                        woocommerce_get_template( 'shop/breadcrumb.php', $args );
                }

                
                // Set WooCommerce image dimensions
                global $pagenow;
                if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) add_action('init', 'woo_install_theme', 1);
                function woo_install_theme() {
                    update_option( 'woocommerce_catalog_image_width', '180' );
                    update_option( 'woocommerce_catalog_image_height', '180' );
                    update_option( 'woocommerce_single_image_width', '442' );
                    update_option( 'woocommerce_single_image_height', '442' );
                    update_option( 'woocommerce_thumbnail_image_width', '200' );
                    update_option( 'woocommerce_thumbnail_image_height', '200' );

                    // Hard Crop [0 = false, 1 = true]
                    update_option( 'woocommerce_catalog_image_crop', 0 );
                    update_option( 'woocommerce_single_image_crop', 0 );
                    update_option( 'woocommerce_thumbnail_image_crop', 0 );
                }

                // Redefine woocommerce_output_related_products()
                function woocommerce_output_related_products() {
                    woocommerce_related_products(3,3); // Display 3 products in rows of 3
                }
                
                
                // Style the WooCommerce Login Widget with the consisntent for the theme bullet list style 
                function udesign_woocommerce_filter_widget( $params ) {
                    switch( _get_widget_id_base($params[0]['widget_id']) ) {
                        case 'woocommerce_login':
                        case 'product_categories':
                              $params[0]['before_widget'] = str_replace( 'substitute_widget_class', 'custom-formatting', $params[0]['before_widget'] ); // add the 'custom-formatting' class
                              return $params;
                              break;
                        default:
                              return $params;
                    }
                }
                add_filter('dynamic_sidebar_params','udesign_woocommerce_filter_widget');
               
                // Fix the bullet padding for "Product Categories" widget when empty
                function wc_product_cats_widget_args( $cat_args ) {
                    $cat_args['show_option_none']  = __('<span style="padding:5px 5px 5px 22px; display:block;">No product categories exist.</span>', 'woocommerce');
                    return $cat_args;
                }
                add_filter( 'woocommerce_product_categories_widget_args', 'wc_product_cats_widget_args' );
         
                
                // Fix the posts' count under a product category into the a-tag when listing the categories
                function udesign_woocommerce_product_categories_widget_args( $html ) {
                    $html = preg_replace( '/\<\/a\> \<span class=\"count\"\>\((.*)\)\<\/span\>/', ' <span class="posts-counter">($1)</span></a>', $html );
                    return $html;
                }
                add_filter('wp_list_categories', 'udesign_woocommerce_product_categories_widget_args');
                
                
                remove_action( 'woocommerce_pagination', 'woocommerce_catalog_ordering', 20 );
                add_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 20 );

                // Add Dynamic Styles
                function udesign_wc_insert_dynamic_css() {
                    global $udesign_options;
                    $css  = "\r\n";
                    $css .= '<style type="text/css">';
                    $css .=     'ul.products li.product .price .from, .order-info mark  { color:#'.$udesign_options['body_text_color'].'; }';
                    $css .= '</style>';
                    echo $css;
                }
                add_action('wp_head', 'udesign_wc_insert_dynamic_css');
                
                // Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
                function udesign_woocommerce_header_add_to_cart_fragment( $fragments ) {
                        global $woocommerce;
                        ob_start();
                        ?>
                        <a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('Cart: %d item', 'Cart: %d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
                        <?php
                        $fragments['a.cart-contents'] = ob_get_clean();
                        return $fragments;
                }
                add_filter('add_to_cart_fragments', 'udesign_woocommerce_header_add_to_cart_fragment');
                
                // add custom pagination with WP-PageNavi
                if( function_exists('wp_pagenavi') ) {
                    remove_action('woocommerce_pagination', 'woocommerce_pagination', 10);
                    function woocommerce_pagination() {
                        wp_pagenavi(); 		
                    }
                    add_action( 'woocommerce_pagination', 'woocommerce_pagination', 10);
                }
                
        }
        
}


// Get the current theme name (always from parent theme)
if ( function_exists('wp_get_theme') ) { // if WordPress v3.4+
    $curr_theme = ( wp_get_theme()->parent() ) ? wp_get_theme()->parent() : wp_get_theme();
    $curr_theme_name = $curr_theme->get('Name');
} else {
    $curr_theme_name = get_current_theme();
}

// Check if "U-Design" theme and WooCommerce are currently active, and only then run this plugin...
if ( ( $curr_theme_name == "U-Design" ) && in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    $uDesignWooCommerce = new UDesignWooCommerce();
}

