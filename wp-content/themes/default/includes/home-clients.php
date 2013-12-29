<?php
/**
 * File used for homepage testimonials
 *
 * @package WordPress
 */


$home_clients_query = new WP_Query(
    array(
        'post_type' => 'clients',
        'showposts' =>'-1',
        'no_found_rows' => true
    )
);

if( $home_clients_query->posts ) : ?>

<!-- Dark Blue Wrap - Clients Logos -->
    <div id="db">
        <div class="container">
            <div class="col-lg-12 centered">
                <?php echo stripslashes(do_shortcode(bi_get_data('client_content'))); ?>
            </div><!-- /col-lg-12 -->

    <div id="home-clients" class="clearfix">
         <div class="row">
        
        <?php
        //start loop
        $count=0;
        while ( $home_clients_query->have_posts() ) : $home_clients_query->the_post();
        $count++;
         ?>
        
        <div class="col-lg-2 <?php if( $count == '1' ) { echo 'col-lg-offset-2';} ?>">
                <?php if ( has_post_thumbnail()) : ?>
            <a data-toggle="tooltip" title="<?php the_title(); ?>" href="#">
              <?php the_post_thumbnail(); ?>
            </a>
          <?php endif; ?>
        </div><!-- col-lg-4  -->
        <?php if( $count == '4' ) { $count=0; } ?>
        <?php endwhile; ?>

        </div><!-- /row -->
    
    </div><!-- home-clients -->

        </div><!-- /container -->
    </div><!-- /db -->
    
<?php endif; wp_reset_postdata(); ?>