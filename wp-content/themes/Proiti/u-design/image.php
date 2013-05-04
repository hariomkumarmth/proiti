<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */

get_header();
?>

<div id="content-container" class="container_24">
    <div id="main-content" class="grid_24">
	<div class="main-content-padding">
<?php       do_action('udesign_above_page_content'); ?>

<?php	    if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="post" id="post-<?php the_ID(); ?>">
			<h2><a href="<?php echo get_permalink($post->post_parent); ?>" rev="attachment"><?php echo get_the_title($post->post_parent); ?></a> &raquo; <?php the_title(); ?></h2>
			<div class="entry">
				<p class="attachment"><a href="<?php echo wp_get_attachment_url($post->ID); ?>"><?php echo wp_get_attachment_image( $post->ID, 'medium' ); ?></a></p>
				<div class="caption"><?php if ( !empty($post->post_excerpt) ) the_excerpt(); // this is the "caption" ?></div>

				<?php the_content(__('<p class="serif">Read the rest of this entry &raquo;</p>'), 'udesign'); ?>

                                    <div class="navigation">
					<div class="alignleft"><?php previous_image_link() ?></div>
					<div class="alignright"><?php next_image_link() ?></div>
                                    </div>
				<br class="clear" />
			</div>

		</div>

<?php		endwhile; else: ?>

		    <p><?php esc_html_e('Sorry, no attachments matched your criteria.', 'udesign'); ?></p>

<?php	    endif; ?>

	</div><!-- end main-content-padding -->
    </div><!-- end main-content -->
</div><!-- end content-container -->

<div class="clear"></div>

<?php get_footer();
