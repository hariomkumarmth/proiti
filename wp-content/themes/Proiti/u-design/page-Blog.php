<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
/**
 * Template Name: Blog page
 */


get_header();

global $post;
// get the page id outside the loop (check if WPML plugin is installed and use the WPML way of getting the page ID in the current language)
$page_id = ( function_exists('icl_object_id') && function_exists('icl_get_default_language') ) ? icl_object_id($post->ID, 'page', true, icl_get_default_language()) : $post->ID;
$content_position = ( $udesign_options['blog_sidebar'] == 'left' ) ? 'grid_16 push_8' : 'grid_16';
if ( $udesign_options['remove_blog_sidebar'] == 'yes' ) $content_position = 'grid_24';

?>

<div id="content-container" class="container_24">
    <div id="main-content" class="<?php echo $content_position; ?>">
	<div class="main-content-padding">
<?php       do_action('udesign_above_page_content'); ?>
            
<?php   // Begin: Display Blog page Content if there is any
            $blog_page_query = new WP_Query( 'page_id='.$page_id );
	    if ($blog_page_query->have_posts()) : while ($blog_page_query->have_posts()) : $blog_page_query->the_post();
            if( get_the_content() ) : ?>
                    <div class="post" id="post-<?php the_ID(); ?>">
                        <div class="entry">
<?php                       the_content(); ?>
                        </div>
                    </div>
<?php           endif;
            endwhile; endif;
	    //Reset Query
	    wp_reset_postdata(); ?>
	    <div class="clear"></div>
<?php   // End: Display Blog page Content if there is any ?>

<?php       
            global $more; $more = 0; // Enable 'more tag' for this page
            // Begin main posts' loop stuff here
            //adhere to paging rules
            if ( get_query_var('paged') ) {
                $paged = get_query_var('paged');
            } elseif ( get_query_var('page') ) { // applies when this page template is used as a static homepage in WP3+
                $paged = get_query_var('page');
            } else {
                $paged = 1;
            }

            if ( $udesign_options['exclude_portfolio_from_blog'] == 'yes' ) {
                // get the portfolio categories to be excluded from the Blog section
                global $portfolio_cats_with_minus;
                $query_string = "cat=$portfolio_cats_with_minus&paged=$paged";
            } else {
                $query_string = "paged=$paged";
            }

            query_posts( $query_string );

            if (have_posts()) :
		while (have_posts()) : the_post(); ?>
		    <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<div class="entry">
                            <div class="post-top">
                                <h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                                <div class="postmetadata">
                                    <span>
<?php                                   if( $udesign_options['show_postmetadata_author'] == 'yes' ) :
                                            printf( __('By %1$s on %2$s ', 'udesign'), '</span>'.udesign_get_the_author_page_link().'<span>', get_the_date() );
                                        else :
                                            printf( __('On %1$s ', 'udesign'), get_the_date() );
                                        endif; ?>
                                    </span> &nbsp; / &nbsp; <span><?php the_category(', '); ?></span> &nbsp; / &nbsp; <?php comments_popup_link( __( 'Leave a comment', 'udesign' ), __( '1 Comment', 'udesign' ), __( '% Comments', 'udesign' ) ); ?> <?php edit_post_link(__('Edit', 'udesign'), '<div style="float:right;margin:0 10px;">', '</div>'); ?> 
<?php                               echo ( $udesign_options['show_postmetadata_tags'] == 'yes' ) ? the_tags('<div class="post-tags-wrapper">'.__('Tags: ', 'udesign'), ', ', '</div>') : ''; ?>
                                </div>
                            </div>
                            <div class="clear"></div>

<?php                       // Post Image
                            display_post_image_fn( $post->ID, true ); ?>
                            
<?php			    if ( $udesign_options['show_excerpt'] == 'yes' ) {
				the_excerpt(); //display the excerpt
                                if ( $udesign_options['blog_button_text'] ) {
                                    echo do_shortcode('[read_more text="'.$udesign_options['blog_button_text'].'" title="'.$udesign_options['blog_button_text'].'" url="'.get_permalink().'" align="left"]');
                                    echo '<div class="clear"></div>';
                                }
			    } else {
				the_content( $udesign_options['blog_button_text'] );
			    } ?>
			</div><!-- end entry -->
		    </div>
                    <?php echo do_shortcode('[divider_top]'); ?>
<?php		endwhile; ?>

		<div class="clear"></div>

<?php		// Pagination
		if(function_exists('wp_pagenavi')) :
		    wp_pagenavi();
		else : ?>
		    <div class="navigation">
			    <div class="alignleft"><?php previous_posts_link() ?></div>
			    <div class="alignright"><?php next_posts_link() ?></div>
		    </div>
<?php		endif; ?>

<?php	    else : ?>
		<h2 class="center"><?php esc_html_e('Not Found', 'udesign'); ?></h2>
		<p class="center"><?php esc_html_e("Sorry, but you are looking for something that isn't here.", 'udesign'); ?></p>
<?php		get_search_form();
	    endif;
	    //Reset Query
	    wp_reset_query();
            
            edit_post_link(__('Edit this page', 'udesign'), '<div style="float:right;margin:0 10px;">', '</div>'); ?>

	</div><!-- end main-content-padding -->
    </div><!-- end main-content -->

<?php	if( ( !$udesign_options['remove_blog_sidebar'] == 'yes' ) && sidebar_exist('BlogSidebar') ) { get_sidebar('BlogSidebar'); } ?>

</div><!-- end content-container -->

<div class="clear"></div>

<?php

get_footer();


