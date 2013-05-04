<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
?>
<?php	global $udesign_options, $style; ?>


</div><!-- end page-content -->

<div class="clear"></div>

<?php

	$bottom_1_is_active = sidebar_exist_and_active('bottom-widget-area-1');
	$bottom_2_is_active = sidebar_exist_and_active('bottom-widget-area-2');
	$bottom_3_is_active = sidebar_exist_and_active('bottom-widget-area-3');
	$bottom_4_is_active = sidebar_exist_and_active('bottom-widget-area-4');

	if ( $bottom_1_is_active || $bottom_2_is_active || $bottom_3_is_active || $bottom_4_is_active ) : // hide this area if no widgets are active...
?>
	    <div id="bottom-bg">
		<div id="bottom" class="container_24">
		    <div class="bottom-content-padding">
<?php
                        $output = '';
			// all 4 active: 1 case
			if ( $bottom_1_is_active && $bottom_2_is_active && $bottom_3_is_active && $bottom_4_is_active ) {
			    $output .= get_dynamic_column( 'bottom_1', 'one_fourth', 'bottom-widget-area-1' );
			    $output .= get_dynamic_column( 'bottom_2', 'one_fourth', 'bottom-widget-area-2' );
			    $output .= get_dynamic_column( 'bottom_3', 'one_fourth', 'bottom-widget-area-3' );
			    $output .= get_dynamic_column( 'bottom_4', 'one_fourth last_column', 'bottom-widget-area-4' );
			}
			// 3 active: 4 cases
			if ( $bottom_1_is_active && $bottom_2_is_active && $bottom_3_is_active && !$bottom_4_is_active ) {
			    $output .= get_dynamic_column( 'bottom_1', 'one_third', 'bottom-widget-area-1' );
			    $output .= get_dynamic_column( 'bottom_2', 'one_third', 'bottom-widget-area-2' );
			    $output .= get_dynamic_column( 'bottom_3', 'one_third last_column', 'bottom-widget-area-3' );
			}
			if ( $bottom_1_is_active && $bottom_2_is_active && !$bottom_3_is_active && $bottom_4_is_active ) {
			    $output .= get_dynamic_column( 'bottom_1', 'one_third', 'bottom-widget-area-1' );
			    $output .= get_dynamic_column( 'bottom_2', 'one_third', 'bottom-widget-area-2' );
			    $output .= get_dynamic_column( 'bottom_4', 'one_third last_column', 'bottom-widget-area-4' );
			}
			if ( $bottom_1_is_active && !$bottom_2_is_active && $bottom_3_is_active && $bottom_4_is_active ) {
			    $output .= get_dynamic_column( 'bottom_1', 'one_third', 'bottom-widget-area-1' );
			    $output .= get_dynamic_column( 'bottom_3', 'one_third', 'bottom-widget-area-3' );
			    $output .= get_dynamic_column( 'bottom_4', 'one_third last_column', 'bottom-widget-area-4' );
			}
			if ( !$bottom_1_is_active && $bottom_2_is_active && $bottom_3_is_active && $bottom_4_is_active ) {
			    $output .= get_dynamic_column( 'bottom_2', 'one_third', 'bottom-widget-area-2' );
			    $output .= get_dynamic_column( 'bottom_3', 'one_third', 'bottom-widget-area-3' );
			    $output .= get_dynamic_column( 'bottom_4', 'one_third last_column', 'bottom-widget-area-4' );
			}
			// 2 active: 6 cases
			if ( $bottom_1_is_active && $bottom_2_is_active && !$bottom_3_is_active && !$bottom_4_is_active ) {
			    $output .= get_dynamic_column( 'bottom_1', 'one_half', 'bottom-widget-area-1' );
			    $output .= get_dynamic_column( 'bottom_2', 'one_half last_column', 'bottom-widget-area-2' );
			}
			if ( $bottom_1_is_active && !$bottom_2_is_active && $bottom_3_is_active && !$bottom_4_is_active ) {
			    $output .= get_dynamic_column( 'bottom_1', 'one_half', 'bottom-widget-area-1' );
			    $output .= get_dynamic_column( 'bottom_3', 'one_half last_column', 'bottom-widget-area-3' );
			}
			if ( !$bottom_1_is_active && $bottom_2_is_active && $bottom_3_is_active && !$bottom_4_is_active ) {
			    $output .= get_dynamic_column( 'bottom_2', 'one_half', 'bottom-widget-area-2' );
			    $output .= get_dynamic_column( 'bottom_3', 'one_half last_column', 'bottom-widget-area-3' );
			}
			if ( !$bottom_1_is_active && $bottom_2_is_active && !$bottom_3_is_active && $bottom_4_is_active ) {
			    $output .= get_dynamic_column( 'bottom_2', 'one_half', 'bottom-widget-area-2' );
			    $output .= get_dynamic_column( 'bottom_4', 'one_half last_column', 'bottom-widget-area-4' );
			}
			if ( !$bottom_1_is_active && !$bottom_2_is_active && $bottom_3_is_active && $bottom_4_is_active ) {
			    $output .= get_dynamic_column( 'bottom_3', 'one_half', 'bottom-widget-area-3' );
			    $output .= get_dynamic_column( 'bottom_4', 'one_half last_column', 'bottom-widget-area-4' );
			}
			if ( $bottom_1_is_active && !$bottom_2_is_active && !$bottom_3_is_active && $bottom_4_is_active ) {
			    $output .= get_dynamic_column( 'bottom_1', 'one_half', 'bottom-widget-area-1' );
			    $output .= get_dynamic_column( 'bottom_4', 'one_half last_column', 'bottom-widget-area-4' );
			}
			// 1 active: 4 cases
			if ( $bottom_1_is_active && !$bottom_2_is_active && !$bottom_3_is_active && !$bottom_4_is_active ) {
			    $output .= get_dynamic_column( 'bottom_1', 'full_width', 'bottom-widget-area-1' );
			}
			if ( !$bottom_1_is_active && $bottom_2_is_active && !$bottom_3_is_active && !$bottom_4_is_active ) {
			    $output .= get_dynamic_column( 'bottom_2', 'full_width', 'bottom-widget-area-2' );
			}
			if ( !$bottom_1_is_active && !$bottom_2_is_active && $bottom_3_is_active && !$bottom_4_is_active ) {
			    $output .= get_dynamic_column( 'bottom_3', 'full_width', 'bottom-widget-area-3' );
			}
			if ( !$bottom_1_is_active && !$bottom_2_is_active && !$bottom_3_is_active && $bottom_4_is_active ) {
			    $output .= get_dynamic_column( 'bottom_4', 'full_width', 'bottom-widget-area-4' );
			}
                        
                        echo $output;
?>
		    </div>
		    <!-- end bottom-content-padding -->
		</div>
		<!-- end bottom -->
	    </div>
	    <!-- end bottom-bg -->

	    <div class="clear"></div>


<?php	endif; ?>


	<div id="footer-bg">
		<div id="footer" class="container_24 footer-top">
		    <div id="footer_text" class="grid_20">
			<div>
<?php			    echo do_shortcode( $udesign_options['copyright_message'] );
			    if( $udesign_options['show_wp_link_in_footer'] ) :
				_e(' is proudly powered by <a href="http://wordpress.org/"><strong>WordPress</strong></a>', 'udesign');
			    endif;
			    if( $udesign_options['show_udesign_affiliate_link'] ) :
				printf( esc_html__(' | Designed with %1$sU-Design Theme%2$s', 'udesign'), '<a target="_blank" title="U-Design WordPress Premium Theme" href="http://themeforest.net/item/udesign-wordpress-theme/253220?ref='.$udesign_options['affiliate_username'].'">', '</a>' );
			    endif;
			    if( $udesign_options['show_entries_rss_in_footer'] ) : ?>
				| <a href="<?php bloginfo('rss2_url'); ?>"><?php esc_html_e('Entries (RSS)', 'udesign'); ?></a>
<?php			    endif;
			    if( $udesign_options['show_comments_rss_in_footer'] ) : ?>
				| <a href="<?php bloginfo('comments_rss2_url'); ?>"><?php esc_html_e('Comments (RSS)', 'udesign'); ?></a>
<?php			    endif; ?>
			</div>
		    </div>
		    <div class="back-to-top">
			<a href="#top"><?php esc_html_e('Back to Top', 'udesign'); ?></a>
		    </div>
		</div>
	</div>

	<div class="clear"></div>

	<?php wp_footer(); ?>
    </div><!-- end wrapper-1 -->
<?php
    if( $udesign_options['enable_cufon'] ) : ?>
	<script type="text/javascript"> Cufon.now(); </script>
<?php
    endif; ?>
</body>
</html>