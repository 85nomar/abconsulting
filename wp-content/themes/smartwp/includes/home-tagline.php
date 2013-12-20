<?php
/**
 * File used for homepage tagline module
 *
 * @package WordPress
 */
?>

<?php
if ( bi_get_data('home_tagline') ) : ?>
    
    <!-- Dark Blue Wrap / Action Call -->
    <div id="db">
        <div class="container centered">
        <?php echo stripslashes(do_shortcode(bi_get_data('home_tagline'))); ?>
    </div><!-- /container -->
</div><!-- /Dark Blue wrap -->
				
<?php endif; ?>