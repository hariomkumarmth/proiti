<?php get_header(); ?>

<?php get_template_part('includes/breadcrumbs'); ?>
	
<div id="main-area">
	<div id="main-content" class="clearfix">
		<div id="left-column">
			<?php if (get_option('estore_integration_single_top') <> '' && get_option('estore_integrate_singletop_enable') == 'on') echo(get_option('estore_integration_single_top')); ?>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="post clearfix">				
				
				<?php get_template_part('includes/single-product'); ?>
						
			</div> <!-- end .post -->
		<?php endwhile; endif; ?>
			<?php if (get_option('estore_integration_single_bottom') <> '' && get_option('estore_integrate_singlebottom_enable') == 'on') echo(get_option('estore_integration_single_bottom')); ?>
			
			<?php if (get_option('estore_468_enable') == 'on') { ?>
				<?php if(get_option('estore_468_adsense') <> '') echo(get_option('estore_468_adsense'));
				else { ?>
					<a href="<?php echo esc_url(get_option('estore_468_url')); ?>"><img src="<?php echo esc_url(get_option('estore_468_image')); ?>" alt="468 ad" class="foursixeight" /></a>
				<?php } ?>	
			<?php } ?>
				
		</div> <!-- #left-column -->
	
		<?php get_sidebar(); ?>
						
<?php get_footer(); ?>