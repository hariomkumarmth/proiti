<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */

get_header();

include('scripts/search_excerpt/ylsy_search_excerpt.php');
query_posts($query_string . '&showposts=10');
?>

<div id="content-container" class="container_24">
    <div id="main-content" class="grid_24">
	<div class="main-content-padding">
<?php       do_action('udesign_above_page_content'); ?>

<?php       if (have_posts()) : ?>
	
<?php               while (have_posts()) : the_post(); ?>

			<div <?php post_class() ?>>
<?php
				$title = get_the_title();
				$search_term = preg_replace('/\/|\+|\*|\[|\]/iu','', trim($s));
				$keys= explode(" ",$search_term);
				$title = preg_replace( '/('.implode('|', $keys) .')/iu', '<strong class="search-excerpt">\0</strong>', $title );
?>
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php echo $title; ?></a></h3>
				
				<?php
				    $excerpt = new SearchExcerpt();
                                    echo strip_shortcodes( $excerpt->the_excerpt( get_the_excerpt() ) );
				?>
			</div>

<?php               endwhile; ?>

		    <div class="clear"></div>

<?php		    // Pagination
		    if(function_exists('wp_pagenavi')) :
			wp_pagenavi();
		    else : ?>
			<div class="navigation">
				<div class="alignleft"><?php previous_posts_link() ?></div>
				<div class="alignright"><?php next_posts_link() ?></div>
			</div>
<?php		    endif; ?>

	<?php else : ?>
		<h2 class="center"><?php esc_html_e("Didn't find what you were looking for? Refine your search!", 'udesign'); ?></h2>
		<?php get_search_form(); ?>

	<?php endif; ?>

	</div><!-- end main-content-padding -->
    </div><!-- end main-content -->
</div><!-- end content-container -->

<div class="clear"></div>

<?php

get_footer();


