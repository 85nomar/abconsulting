<?php
/**
 * File used for homepage tagline module
 *
 * @package WordPress
 */
?>

    
 <!-- White Wrap Version 2 - Social Icons -->
	<div id="w2">
		<div class="container">
			<div class="row centered">
				<?php echo stripslashes(do_shortcode(bi_get_data('social_title'))); ?>
				<br>
				<br>
         <?php
        //social output - see functions/social-output.php
      		 bi_display_social(); ?>
    </div><!-- /row -->
		</div><!-- /container -->
	</div><!-- /White Wrap Ver.2 - Social Icons -->
