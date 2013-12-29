<?php
/**
 * File used for homepage testimonials
 *
 * @package WordPress
 */


$home_testimonials_query = new WP_Query(
	array(
		'post_type' => 'testimonials',
		'showposts' =>'-1',
		'no_found_rows' => true
       )
    );
$number = 0;
if( $home_testimonials_query->posts ) : ?>

<!-- Yellow Wrap -->
<div id="y">
    <div class="container">
        <div class="row centered">
            <br>
            <div id="home-testimonials" class="clearfix">

                <div class="col-lg-10 col-lg-offset-1">
                   <div id="carousel-example-generic" class="carousel slide">

                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <?php while ( $home_testimonials_query->have_posts() ) : $home_testimonials_query->the_post(); ?>
                        <li data-target="#carousel-example-generic" data-slide-to="<?php echo $number++; ?>"></li>
                    <?php endwhile; ?>
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <?php while ( $home_testimonials_query->have_posts() ) : $home_testimonials_query->the_post(); ?>

                    <?php if( rwmb_meta( 'wtf_hp_testimonial' ) !== '' ) { ?>

                      <?php
                    $hp_testi = rwmb_meta( 'wtf_hp_testimonial' );
                     ?>

                    <div class="item">
                        <?php echo $hp_testi; ?>
                    </div>

                   
                    <?php } ?>         
                <?php endwhile; ?>
            </div><!-- /carousel-inner -->
            <br>
            <br>
            <br>
        </div><!-- /carousel-example -->
    </div><!-- col-lg-10 col-lg-offset-1 -->
    
</div><!--home-testimonials -->

</div><!-- /row -->
</div><!-- /container -->
</div><!-- /yellow wrap -->

<?php endif; wp_reset_postdata(); ?>
