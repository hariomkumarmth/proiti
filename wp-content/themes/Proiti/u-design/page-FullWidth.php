<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
/**
 * Template Name: Full-width page
 */


get_header(); ?>
<div id="content-container" class="container_24">
    <div id="main-content" class="grid_24">
	<div class="main-content-padding">
<?php       do_action('udesign_above_page_content'); ?>
<?php	    if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		    <div class="entry">
<?php			the_content(__('<p class="serif">Read the rest of this entry &raquo;</p>', 'udesign'));
			wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
		    </div>
		</div>
<?php		( $udesign_options['show_comments_on_pages'] == 'yes' ) ? comments_template() : ''; ?>
<?php	    endwhile; endif; ?>
	    <div class="clear"></div>
<?php	    edit_post_link(esc_html__('Edit this entry.', 'udesign'), '<p class="editLink">', '</p>'); ?>

	</div><!-- end main-content-padding -->
    </div><!-- end main-content -->
</div><!-- end content-container -->

<div class="clear"></div>

<?php

get_footer();


