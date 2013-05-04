<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
/*
Template Name: Archives
*/
?>

<?php get_header();

$content_position = ( $udesign_options['blog_sidebar'] == 'left' ) ? 'grid_16 push_8' : 'grid_16';

?>


<div id="content-container" class="container_24">
    <div id="main-content" class="<?php echo $content_position; ?>">
	<div class="main-content-padding">
<?php       do_action('udesign_above_page_content'); ?>
<?php	    if (have_posts()) :
		while (have_posts()) : the_post(); ?>
		    <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<div class="post-top">
			    <h2><?php esc_html_e('Archive Index Page', 'udesign'); ?></h2>
			</div>
			<div class="entry">
<?php			    the_content(__('<p class="serif">Read the rest of this entry &raquo;</p>', 'udesign')); ?>
			</div>
		    </div>
<?php		endwhile; ?>
<?php	    endif; ?>

	    <div class="clear"></div>

	    <h2><?php esc_html_e('Archives by Year:', 'udesign'); ?></h2>
	    <ul class="list-10">
		<?php wp_get_archives('type=yearly'); ?>
	    </ul>

	    <h2><?php esc_html_e('Archives by Month:', 'udesign'); ?></h2>
	    <ul class="list-10">
		<?php wp_get_archives('type=monthly'); ?>
	    </ul>

	    <h2><?php esc_html_e('Archives by Subject:', 'udesign'); ?></h2>
	    <ul class="list-10">
		<?php wp_list_categories(); ?>
	    </ul>

	</div><!-- end main-content-padding -->
    </div><!-- end main-content -->

<?php	if( sidebar_exist('BlogSidebar') ) { get_sidebar('BlogSidebar'); } ?>

</div><!-- end content-container -->

<?php

get_footer();



