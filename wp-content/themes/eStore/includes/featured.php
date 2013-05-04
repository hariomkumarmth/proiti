<?php global $ids;
	$ids = array();
	$arr = array();
	$i=1;
	
	$width = 1400;
	$height = 501;
	$width_small = 109;
	$height_small = 109;
				
	$featured_cat = get_option('estore_feat_cat'); 
	$featured_num = get_option('estore_featured_num'); 
		
	if (get_option('estore_use_pages') == 'false') query_posts("showposts=$featured_num&cat=".get_catId($featured_cat));
	else {
		global $pages_number;
		
		if (get_option('estore_feat_pages') <> '') $featured_num = count(get_option('estore_feat_pages'));
		else $featured_num = $pages_number;
				
		query_posts(array('post_type' => 'page',
						'orderby' => 'menu_order',
						'order' => 'DESC',
						'post__in' => (array) get_option('estore_feat_pages'),
						'showposts' => (int) $featured_num));
	};
			
	while (have_posts()) : the_post();
		global $post;	
		$arr[$i]["title"] = truncate_title(25,false);
		$arr[$i]["fulltitle"] = truncate_title(250,false);
		
		$arr[$i]["excerpt"] = truncate_post(250,false);
				
		$arr[$i]["permalink"] = get_permalink();
				
		$arr[$i]["thumbnail"] = get_thumbnail($width,$height,'',$arr[$i]["fulltitle"],$arr[$i]["fulltitle"],true,'featured_image');
		$arr[$i]["thumb"] = $arr[$i]["thumbnail"]["thumb"];
		
		$arr[$i]["thumbnail_small"] = get_thumbnail($width_small,$height_small,'',$arr[$i]["fulltitle"],$arr[$i]["fulltitle"]);
		$arr[$i]["thumb_small"] = $arr[$i]["thumbnail_small"]["thumb"];
		
		$arr[$i]["use_timthumb"] = $arr[$i]["thumbnail"]["use_timthumb"];
		
		$custom = '';
		$custom = get_post_custom($post->ID);
		$arr[$i]["price"] = isset($custom["price"][0]) ? $custom["price"][0] : '';
		if ($arr[$i]["price"] <> '') $arr[$i]["price"] = get_option('estore_cur_sign') . $arr[$i]["price"];
		$arr[$i]["color"] = isset($custom["featured_bgcolor"][0]) ? $custom["featured_bgcolor"][0] : '969384';

		$i++;
		$ids[] = $post->ID;
	endwhile; wp_reset_query();	?>

<div id="featured">
	<div id="slides">
		<?php for ($i = 1; $i <= $featured_num; $i++) { ?>
			<div class="slide<?php if ($i==1) echo(' active'); ?>" style="background: #<?php echo esc_attr($arr[$i]["color"]); ?> url('<?php print_thumbnail($arr[$i]["thumb"], $arr[$i]["use_timthumb"], $arr[$i]["fulltitle"], $width, $height, '', true, true); ?>') no-repeat top center;">
				<div class="container">
					<div class="description">
						<div class="product">
							<?php if ($arr[$i]["price"] <> '') { ?>
								<span class="tag"><span><?php echo esc_html($arr[$i]["price"]); ?></span></span>
							<?php }; ?>
							<h2 class="title"><a href="<?php echo esc_url($arr[$i]["permalink"]); ?>"><?php echo esc_html($arr[$i]["fulltitle"]); ?></a></h2>
							<p><?php echo($arr[$i]["excerpt"]); ?></p>
							<a class="more" href="<?php echo esc_attr($arr[$i]["permalink"]); ?>"><span><?php esc_html_e('more info','eStore'); ?></span></a>
						</div> <!-- .product -->
					</div> <!-- .description -->
				</div> <!-- .container -->			
			</div> <!-- .slide -->
		<?php }; ?>
	</div> <!-- #slides-->
	
	
	<div id="controllers">
		<div class="container">
			<div id="switcher">
				
				<?php for ($i = 1; $i <= $featured_num; $i++) { ?>
					<div class="item<?php if ($i==1) echo(' active'); if ($i == $featured_num) echo(' last'); ?>">
						<a href="#" class="product">
							<?php print_thumbnail($arr[$i]["thumb_small"], $arr[$i]["use_timthumb"], $arr[$i]["fulltitle"] ,$width_small, $height_small); ?>
							<?php if ($arr[$i]["price"] <> '') { ?>
								<span class="tag"><span><?php echo esc_html($arr[$i]["price"]); ?></span></span>
							<?php }; ?>
						</a>
					</div> <!-- .item -->
				<?php }; ?>
	
			</div> <!-- #switcher -->
		</div> <!-- .container -->
	</div> <!-- #controllers -->

	<div id="top-shadow"></div>
	<div id="bottom-shadow"></div>
	
</div> <!-- end #featured -->