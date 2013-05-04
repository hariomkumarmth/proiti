<?php get_header(); ?>

<?php get_template_part('includes/breadcrumbs'); ?>
	
<div id="main-area">
	<div id="main-content" class="clearfix">
		<div id="left-column">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>	
				<div class="post clearfix">				
					<?php $custom = get_post_custom($post->ID);
					$et_page_template = isset($custom["et_page_template"][0]) ? $custom["et_page_template"][0] : '';
					$et_page = true;
					if ($et_page_template <> 'usual') get_template_part('includes/single-product');
					else { ?>
						<h1 class="title"><?php the_title(); ?></h1>
						<?php the_content(); ?>
						<div class="clear"></div>
						<?php wp_link_pages(array('before' => '<p><strong>'.esc_html__('Pages','eStore').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
						<?php edit_post_link(esc_html__('Edit this page','eStore')); ?>
					<?php }; ?>	
				</div> <!-- end .post -->
				
				<?php if (get_option('estore_integration_single_bottom') <> '' && get_option('estore_integrate_singlebottom_enable') == 'on') echo(get_option('estore_integration_single_bottom')); ?>
				
				<?php if (get_option('estore_468_enable') == 'on') { ?>
					<?php if(get_option('estore_468_adsense') <> '') echo(get_option('estore_468_adsense'));
					else { ?>
						<a href="<?php echo esc_url(get_option('estore_468_url')); ?>"><img src="<?php echo esc_url(get_option('estore_468_image')); ?>" alt="468 ad" class="foursixeight" /></a>
					<?php } ?>	
				<?php } ?>
			<?php endwhile; endif; ?>
		</div> <!-- #left-column -->
	
		<?php get_sidebar(); ?>
						
<?php get_footer(); ?>