<?php
/**
 * File used for homepage higlights
 *
 * @package WordPress
 */


$home_highlights_query = new WP_Query(
	array(
		'post_type' => 'hp_highlights',
		'showposts' =>'-1',
		'no_found_rows' => true
	)
);

if( $home_highlights_query->posts ) : ?>

<!-- Yellow Wrap -->
    <div id="y">
        <div class="container">
            <div class="row centered">

    <div id="home-highlights" class="clearfix">
        
        <?php
        //start loop
        $count=0;
       	while ( $home_highlights_query->have_posts() ) : $home_highlights_query->the_post();
		$count++;
    
         ?>
        
        <div class="col-lg-3 col-sm-6 count-<?php echo $count; ?>">
        	<?php if( rwmb_meta( 'wtf_hp_highlights_icon' ) !== '' ) { ?>
            	<?php echo rwmb_meta( 'wtf_hp_highlights_icon' ); ?>
            <?php } ?>
                <h3><?php the_title(); ?></h3>
           <?php the_content(); ?>
        </div><!-- col-lg-4  -->
        <?php if( $count == '3') { $count = '0'; } endwhile; ?>
    
    </div><!-- home-highlights -->

    </div><!-- /row -->
        </div><!-- /container -->
    </div><!-- /yellow wrap -->
    
<?php endif; wp_reset_postdata(); ?>