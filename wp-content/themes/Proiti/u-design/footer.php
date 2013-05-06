<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
?>
<?php	global $udesign_options, $style; ?>


</div><!-- end page-content -->

	
 <footer>
    <div class="footer">
    <div class="container">
    	<div class="four columns">
            <h5>Navigation</h5>
            <ul>
            <?php
    				 $menu_name = 'footer-nav';
                     $args = array(
                     'order'                  => 'ASC',
                     'orderby'                => 'menu_order',
                     'post_type'              => 'nav_menu_item',
                     'post_status'            => 'publish',
                     'output'                 => ARRAY_A,
                     'output_key'             => 'menu_order',
                     'nopaging'               => true,
                     'update_post_term_cache' => false );
                     $items = wp_get_nav_menu_items( $menu_name, $args );
    				 // print_r($items);
    				 foreach($items as $k)
    				 {
    				 	?>
    				 		<li class="remove-border-top">
    				 			<a href="<?php echo $k->url;?>"> <?php echo $k->title;?> </a>
    				 		</li>
                        <?php } ?>

    				 </ul>
        </div><!--end of four column-->
  
        <div class="four columns">
        <h5>Legal</h5>
        <ul>
            <li class="remove-border-top"><a href="#">Terms &amp; Conditions</a></li>
            <li><a href="#">Privacy</a></li>
            <li class="remove-border-bottom"><a href="#">Why Choose Us!</a></li>
        </ul>
         <h5>Contact Us</h5>
            	<p><span class="color">Phone</span>(011) 123-456-78<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(011) 123-456-78<br>
                <span class="color">E-Mail</span>info@admaniaa.com<br>
                <span class="color">Location</span>New Delhi,India
                </p>
        </div><!--end of three column-->
        
        <div class="four columns">
        	<h5>&nbsp;&nbsp;Share Us</h5>
        		<ul class="share">
                <li class="facebook"><a href="#">Facebook</a></li>
                <li class="plus"><a href="#">Google Plus</a></li>
                <li class="twitter"><a href="#">Twitter</a></li>
                <li class="linkedin"><a href="#">LinkedIn</a></li>
                <li class="rss"><a href="#">Rss</a></li>
                </ul>
           
        </div><!--end of four column-->
        
        <div class="four columns">
        	<h5>Get In Touch</h5>
            <form method="POST" name="contactform" action="contact-form-handler.php">
        		<label label="" for="name" id="label">Name*</label>
                <input type="text" id="regularInput" name="name">
                <label for="email" id="label">E-Mail*</label>
        		<input type="email" id="regularInput" name="email">
                <label for="message" id="label">Message*</label>
                <textarea name="message"></textarea>
                <button type="submit" name="submit" class="learn-more">SUBMIT</button>
            </form>
            <script language="JavaScript">
			// Code for validating the form
				var frmvalidator  = new Validator("contactform");
				frmvalidator.addValidation("name","req","Please provide your name"); 
				frmvalidator.addValidation("email","req","Please provide your email"); 				frmvalidator.addValidation("email","email","Please enter a valid email address"); 
				</script>
        </div><!--end of four column-->
       
    </div><!--end of footer-container -->
   </div><!--end of top -footer -->
   
   
   
   </div><!--end of footer-bottom-container-->
    </div><!--end of footer-bottom-->
</footer>
<div id="footer-bg">
		<div id="footer" class="container_24 footer-top">
		    <div id="footer_text" class="grid_20">
			<div>
<?php			    echo do_shortcode( $udesign_options['copyright_message'] );
			    if( $udesign_options['show_wp_link_in_footer'] ) :
				_e(' is proudly powered by <a href="http://wordpress.org/"><strong>WordPress</strong></a>', 'udesign');
			    endif;
			    if( $udesign_options['show_udesign_affiliate_link'] ) :
				printf( esc_html__(' | Designed with %1$sU-Design Theme%2$s', 'udesign'), '<a target="_blank" title="U-Design WordPress Premium Theme" href="http://themeforest.net/item/udesign-wordpress-theme/253220?ref='.$udesign_options['affiliate_username'].'">', '</a>' );
			    endif;
			    if( $udesign_options['show_entries_rss_in_footer'] ) : ?>
				| <a href="<?php bloginfo('rss2_url'); ?>"><?php esc_html_e('Entries (RSS)', 'udesign'); ?></a>
<?php			    endif;
			    if( $udesign_options['show_comments_rss_in_footer'] ) : ?>
				| <a href="<?php bloginfo('comments_rss2_url'); ?>"><?php esc_html_e('Comments (RSS)', 'udesign'); ?></a>
<?php			    endif; ?>
			</div>
		    </div>

		    <p id="back-top" style="display: block;">
		      <a href="#top"><span></span>Top</a>
	       </p>
		</div>
</div>

	

	<?php //wp_footer(); ?>
    </div><!-- end wrapper-1 -->
<?php
    if( $udesign_options['enable_cufon'] ) : ?>
	<script type="text/javascript"> Cufon.now(); </script>
<?php
    endif; ?>
</body>
</html>