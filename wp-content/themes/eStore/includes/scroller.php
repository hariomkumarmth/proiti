<h3 id="deals-title"><span><?php esc_html_e('Deals Of The Day','eStore'); ?></span></h3>

<div id="scroller" class="clearfix">
	<a href="#" id="left-arrow"><?php esc_html_e('Previous','eStore'); ?></a>

	<div id="items">
		
		<?php $dealsNum = (int) get_option('estore_deals_numposts');
		$args=array(
			'showposts'=>$dealsNum,
			'cat' => get_cat_ID(get_option('estore_deals_category')),
		);
		query_posts($args);
		$i = 0;
		if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php if ( ($i % 4 == 0) || ($i == 0) ) echo ('<div class="block">'); ?>
			
				<div class="item<?php if (($i+1) % 4 == 0) echo(' last'); ?>">
					<div class="item-top"></div>
					
					<div class="item-content">
						<?php $custom = '';
						$custom = get_post_custom($post->ID);
						$arr[$i]["price"] = isset($custom["price"][0]) ? $custom["price"][0] : '';
						if ($arr[$i]["price"] <> '') $arr[$i]["price"] = get_option('estore_cur_sign') . $arr[$i]["price"];
						
						$thumb = '';
						$width = 162;
						$height = 112;
						$classtext = '';
						$titletext = get_the_title();

						$thumbnail = get_thumbnail($width,$height,$classtext,$titletext,$titletext);
						$thumb = $thumbnail["thumb"]; ?>
						
						<?php if ($arr[$i]["price"] <> '') { ?>
							<span class="tag"><span><?php echo esc_html($arr[$i]["price"]); ?></span></span>
						<?php }; ?>
						
						<?php if ($thumb <> '') { ?>
							<?php print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext, $width, $height, $classtext); ?>
						<?php }; ?>
						<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
					</div> <!-- .item-content -->
					
					<a href="<?php the_permalink(); ?>" class="more"><span><?php esc_html_e('more info','eStore'); ?></span></a>
				</div> <!-- .item -->
						
			<?php if ( ($i+1) % 4 == 0 ) echo ('</div> <!-- end .block -->'); ?>
			
			<?php $i++; ?>
			
		<?php endwhile; ?>
		<?php endif; wp_reset_query(); ?>
		
		<?php if ($dealsNum % 4 <> 0) echo('</div><!-- end .block-->'); ?>
			
	</div> <!-- #items -->
	
	<a href="#" id="right-arrow"><?php esc_html_e('Next','eStore'); ?></a>
</div> <!-- #scroller -->

<div class="clear"></div>