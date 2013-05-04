<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */

get_header();

$curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
?>

<div id="content-container" class="container_24">
    <div id="main-content" class="grid_24">
	<div class="main-content-padding">
<?php       do_action('udesign_above_page_content'); ?>
            <h2 class="margin-top-3"><?php esc_html_e('About:', 'udesign'); ?> <?php echo $curauth->display_name; ?></h2>
            <p>
                <span class="custom-frame alignleft"><?php echo get_avatar($curauth->user_email, 100); ?></span>
                <strong><?php esc_html_e('Website:', 'udesign'); ?></strong> <a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a><br />
                <strong><?php esc_html_e('Profile:', 'udesign'); ?></strong> <br />
                <?php echo $curauth->user_description; ?>
            </p>
            <div class="clear"></div>
            <h2><?php esc_html_e('Posts by', 'udesign'); ?> <?php echo $curauth->display_name; ?>:</h2>
<?php       if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <ul class="list-11">
                    <li>
                        <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a> (<?php echo get_the_date(); ?> - <?php the_category('&');?>)
                    </li>
                </ul>
<?php       endwhile; else: ?>
                <p><?php esc_html_e('No posts by this author.', 'udesign'); ?></p>
<?php       endif; ?>
	    <div class="clear"></div>
<?php	    edit_post_link(esc_html__('Edit this entry.', 'udesign'), '<p class="editLink">', '</p>'); ?>
	</div><!-- end main-content-padding -->
    </div><!-- end main-content -->
</div><!-- end content-container -->

<div class="clear"></div>

<?php

get_footer();
