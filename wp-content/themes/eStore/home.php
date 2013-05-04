<?php get_header(); ?>
	
<?php if (get_option('estore_scroller') == 'on') get_template_part('includes/scroller'); ?>
	
<div id="main-area">
	<div id="main-content" class="clearfix">
		<div id="left-column">
			<?php get_template_part('includes/entry'); ?>
		</div> <!-- #left-column -->

		<?php get_sidebar(); ?>
			
<?php get_footer(); ?>			