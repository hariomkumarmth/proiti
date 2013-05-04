<?php 
/**
 * @package WordPress
 * @subpackage U-Design
 */

global $udesign_options, $style, $current_slider;
// get the current color scheme subdirectory
$style = ( $udesign_options['color_scheme'] ) ? "style{$udesign_options['color_scheme']}": "style1";
$current_slider = $udesign_options['current_slider'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="show-menu-auto-arrows" content="<?php echo ($udesign_options['show_menu_auto_arrows']) ? 1 : 0; ?>" />
<meta name="show-menu-drop-shadows" content="<?php echo ($udesign_options['show_menu_drop_shadows']) ? 1 : 0; ?>" />

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<!--[if IE 6]>
    <script  type="text/javascript" src="<?php bloginfo('template_url'); ?>/scripts/DD_belatedPNG_0.0.8a-min.js"></script>
    <script  type="text/javascript">
    // <![CDATA[
	DD_belatedPNG.fix('.pngfix, img, #home-page-content li, #page-content li, #bottom li, #footer li, #recentcomments li span');
    // ]]>
    </script>
<![endif]-->

<?php wp_head(); ?>

<!--[if lte IE 9]>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/styles/common-css/ie-all.css" media="screen" type="text/css" />
<![endif]-->
<!--[if lte IE 7]>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/styles/common-css/ie6-7.css" media="screen" type="text/css" />
<![endif]-->
<!--[if IE 6]>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/styles/common-css/ie6.css" media="screen" type="text/css" />
    <style type="text/css">
	body{ behavior: url("<?php bloginfo('template_directory'); ?>/scripts/csshover3.htc"); }
    </style>
<![endif]-->
<?php echo $udesign_options['google_analytics']; ?>

</head>
<body <?php body_class( $udesign_options['enable_cufon'] ); ?>>
<?php 
    if ($udesign_options['enable_feedback']) : ?>
	<div id="feedback"><a href="<?php echo $udesign_options['feedback_url']; ?>" title="<?php esc_attr_e('Feedback', 'udesign'); ?>" class="feedback"></a></div>
<?php 
    endif;
    if ($udesign_options['enable_page_peel']) : ?>
	<div id="page-peel">
		<a href="<?php echo $udesign_options['page_peel_url']; ?>" title="<?php esc_attr_e('Subscribe', 'udesign'); ?>"><img src="<?php bloginfo('template_directory'); ?>/styles/style1/images/page_peel.png" alt="<?php esc_attr_e('Subscribe', 'udesign'); ?>" /></a>
		<div class="msg_block"></div>
	</div>
<?php
    endif; ?>
    <div id="wrapper-1" class="pngfix">
	<div id="top-wrapper">
            <div id="top-elements" class="container_24">
                    <div id="logo" class="grid_14">
<?php                   if( is_front_page() ) : ?>
                            <h1><a title="<?php bloginfo('name'); ?>" class="pngfix" href="<?php echo get_bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
<?php                   else : ?>
                            <div class="site-name"><a  title="<?php bloginfo('name'); ?>" class="pngfix" href="<?php echo get_bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></div>
<?php                   endif; ?>
                    </div>
                    <div id="slogan" class="grid_17"><?php bloginfo('description'); ?></div>
                    <!-- end logo slogan -->
<?php               if ($udesign_options['top_page_phone_number']) : ?>
                        <div class="phone-number grid_7 prefix_17">
                            <div class="phone-number-padding">
<?php                            echo do_shortcode( $udesign_options["top_page_phone_number"] ); ?>
                            </div><!-- end phone-number-padding -->
                        </div><!-- end phone-number -->
<?php               endif; ?>
<?php               if ($udesign_options['enable_search']) : ?>
                        <div id="top-social-profiles">
                        <ul class="widget-container">
                                <div class="search_box">
                                    <li class="social-profiles-widget">
                                <a href="http://twitter.com/" target="_blank">
                                    <img title="Twitter" alt="Twitter" src="<?php echo get_template_directory_uri(); ?>/sliders/social-profiles/twitter.png">
                                </a>
                                <a href="http://facebook.com/" target="_blank">
                                    <img title="Facebook" alt="Facebook" src="<?php echo get_template_directory_uri(); ?>/sliders/social-profiles/facebook.png">
                                </a>
                                <a href="https://plus.google.com/" target="_blank">
                                    <img title="Google Plus" alt="Google Plus" src="<?php echo get_template_directory_uri(); ?>/sliders/social-profiles/gplus.png">
                                </a>
                                <a href="http://www.linkedin.com/" target="_blank">
                                    <img title="LinkedIn" alt="LinkedIn" src="<?php echo get_template_directory_uri(); ?>/sliders/social-profiles/linkedin.png">
                                </a>
                                <a href="http://localhost/bapudhammotihari/feed/" target="_blank">
                                    <img title="RSS Feed" alt="RSS Feed" src="<?php echo get_template_directory_uri(); ?>/sliders/social-profiles/rss.png"></a>
                                    <a href="mailto:your@email.com" target="_blank"><img title="Email" alt="Email" src="<?php echo get_template_directory_uri(); ?>/sliders/social-profiles/email.png">
                                </a>
                            </li>
                                </div>
                            
                        </div><!-- end search -->
<?php               endif; ?>
                        
<?php               $top_area_social_media = sidebar_exist_and_active('top-area-social-media');
                    if ( $top_area_social_media ) : // hide this area if no widgets are active... ?>
                        <div class="social-media-area grid_9 prefix_15">
                             <li class="social-profiles-widget">
                                <a href="http://twitter.com/" target="_blank">
                                    <img title="Twitter" alt="Twitter" src="<?php echo get_template_directory_uri(); ?>/sliders/social-profiles/twitter.png">
                                </a>
                                <a href="http://facebook.com/" target="_blank">
                                    <img title="Facebook" alt="Facebook" src="<?php echo get_template_directory_uri(); ?>/sliders/social-profiles/facebook.png">
                                </a>
                                <a href="https://plus.google.com/" target="_blank">
                                    <img title="Google Plus" alt="Google Plus" src="<?php echo get_template_directory_uri(); ?>/sliders/social-profiles/gplus.png">
                                </a>
                                <a href="http://www.linkedin.com/" target="_blank">
                                    <img title="LinkedIn" alt="LinkedIn" src="<?php echo get_template_directory_uri(); ?>/sliders/social-profiles/linkedin.png">
                                </a>
                                <a href="http://localhost/bapudhammotihari/feed/" target="_blank">
                                    <img title="RSS Feed" alt="RSS Feed" src="<?php echo get_template_directory_uri(); ?>/sliders/social-profiles/rss.png"></a>
                                    <a href="mailto:your@email.com" target="_blank"><img title="Email" alt="Email" src="<?php echo get_template_directory_uri(); ?>/sliders/social-profiles/email.png">
                                </a>
                            </li>
<?php                      // echo udesign_get_dynamic_sidebar( 'top-area-social-media' ); 
?>
                        </div><!-- end social-media-area -->
<?php               endif; ?>
	    </div>
	    <!-- end top-elements -->
            <div id="main-menu" class="pngfix">
                <div id="dropdown-holder" class="container_24">
<?php                   udesign_nav(); // this function calls the main menu ?>
                </div>
                <!-- end dropdown-holder -->
            </div>
            <!-- end top-main-menu -->
	</div>
	<!-- end top-wrapper -->

	<div class="clear"></div>

<?php	if( is_front_page() ) : ?>
        
<?php
	    if( $current_slider == '1' ) :
		include( 'sliders/flashmo/grid_slider/grid_slider_display.php' );
	    elseif( $current_slider == '2' ) :
		include( 'sliders/piecemaker/piecemaker_display.php' );
	    elseif( $current_slider == '3' ) :
		include( 'sliders/piecemaker_2/piecemaker_display.php' );
	    elseif ( $current_slider == '4' ) :
		include( 'sliders/cycle/cycle1/cycle1_display.php' );
	    elseif ( $current_slider == '5' ) :
		include( 'sliders/cycle/cycle2/cycle2_display.php' );
	    elseif ( $current_slider == '6' ) :
		include( 'sliders/cycle/cycle3/cycle3_display.php' );
	    elseif ( $current_slider == '8' ) : ?>
		<div id="rev-slider-header">
<?php               // Load Revolution slider
                    if ( class_exists('RevSliderFront') && $udesign_options['rev_slider_shortcode'] ) {
                        $rvslider = new RevSlider();
                        $arrSliders = $rvslider->getArrSliders();
                        if( !empty( $arrSliders ) ) {
                            echo do_shortcode( $udesign_options['rev_slider_shortcode'] );
                        }
                    } ?>
		</div>
		<!-- end rev-slider-header -->
<?php	    elseif ( $current_slider == '7' ) : // no slider ?>
		<div id="page-content-title">
		    <div id="page-content-header" class="container_24">
			<div id="page-title">
<?php                       if ( $udesign_options['no_slider_text'] ) echo '<h2>' . $udesign_options['no_slider_text'] . '</h2>'; ?>
			</div>
		    </div>
		    <!-- end page-content-header -->
		</div>
		<!-- end page-content-title -->
<?php	    endif; ?>

	    <div class="clear"></div>
<?php


            // home-page-before-content Widget Area
            $before_cont_1_is_active = sidebar_exist_and_active('home-page-before-content');
            if ( $before_cont_1_is_active  ) : // hide this area if no widgets are active...
?>
                <div id="before-content">
                    <div id="before-content-column" class="container_24">
                        <div class="home-page-divider pngfix"></div>
<?php
                        if ( $before_cont_1_is_active ) {
                            echo get_dynamic_column( 'before-cont-box-1', 'column_3_of_3 home-cont-box', 'home-page-before-content' );
                        } ?>
                        <div class="home-page-divider pngfix"></div>
                    </div>
                    <!-- end before-content-column -->
                </div>
                <!-- end before-content -->

		<div class="clear"></div>

<?php	    endif; ?>

	    <div id="home-page-content">

<?php	else : // NOT front page ?>

<?php       do_action('udesign_below_menu_not_front_page'); ?>

	    <div id="page-content">
<?php		    // Breadcrumbs
		    if ( ($udesign_options['show_breadcrumbs'] == 'yes') && class_exists('simple_breadcrumb') ) : ?>
			<div class="container_24">
<?php			    $breadcrumbs_go = new simple_breadcrumb; ?>
			</div>
<?php		    else : ?>
			<div class="no-breadcrumbs-padding"></div>
<?php		    endif; ?>



<?php	endif;




