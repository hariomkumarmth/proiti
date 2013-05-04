<?php
	$i = 1;
	
	if ( is_home() ){
		$args=array(
			'showposts'=> (int) get_option('estore_homepage_posts'),
			'paged'=>$paged,
			'category__not_in' => (array) get_option('estore_exlcats_recent'),
		);
		if (get_option('estore_duplicate') == 'false'){
			global $ids;
			$args['post__not_in'] = $ids;
		}
		query_posts($args);
	}
?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php $thumb = '';
	$width = 193;
	$height = 130;
	$classtext = '';
	$titletext = get_the_title();

	$thumbnail = get_thumbnail($width,$height,$classtext,$titletext,$titletext,true);
	$thumb = $thumbnail["thumb"]; 
	$custom = get_post_custom($post->ID);
	$price = isset($custom["price"][0]) ? $custom["price"][0] : '';
	if ($price <> '') $price = get_option('estore_cur_sign') . $price;
	$et_band =  isset($custom["et_band"][0]) ? $custom["et_band"][0] : ''; ?>

	<div class="product<?php if ($i % 3 == 0) echo(' last'); ?>">
		<div class="product-content clearfix">
			<a href="<?php the_permalink(); ?>" class="image">
				<span class="rounded" style="background: url('<?php print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext, $width, $height, $classtext, true, true); ?>') no-repeat;"></span>
				<?php if ($price <> '') { ?>
					<span class="tag"><span><?php echo esc_html($price); ?></span></span>
				<?php }; ?>
			</a>
			
			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<p><?php truncate_post(115); ?></p>
			
			<a href="<?php the_permalink(); ?>" class="more"><span><?php esc_html_e('more info','eStore'); ?></span></a>
			
			<?php if ($et_band <> '') { ?>
				<span class="band<?php echo(' '. esc_attr($et_band)); ?>"></span>
			<?php }; ?>
		</div> <!-- .product-content -->
	</div> <!-- .product -->
	
	<?php if ($i % 3 == 0) echo('<div class="clear"></div>'); ?>
	<?php $i++; ?>
<?php endwhile; ?>
	<?php if (($i-1) % 3 <> 0) echo('<div class="clear"></div>'); ?>
	<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); }
	else { ?>
		 <?php get_template_part('includes/navigation'); ?>
	<?php } ?>	
<?php else : ?>
	<?php get_template_part('includes/no-results'); ?>
<?php endif; if ( is_home() ) wp_reset_query(); ?>