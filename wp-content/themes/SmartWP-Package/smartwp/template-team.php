<?php
/**
 * @package WordPress
 * Template Name: Team
 */
?>

<?php get_header(); ?>

<!-- White Wrap Ver. 2 / Intro -->
<div id="w1">
    <div class="container">
        <br>

        <?php while (have_posts()) : the_post(); ?>

        <br>
        <div class="col-lg-10 col-lg-offset-1 centered">
          <?php if( rwmb_meta( 'wtf_team_title' ) !== '' ) { ?>
            <?php echo rwmb_meta( 'wtf_team_title' ); ?>
            <br>
            <hr>
             <?php } ?> 
        </div>

          <div id="services-wrap" class="clearfix">
              <div id="service-content" class="entry">
                 <div class="row">
                    <article id="" class="service-content">
                        <div class="col-lg-2 col-lg-offset-1">
                            <h3><?php the_title(); ?></h3>
                            <?php if( rwmb_meta( 'wtf_team_subtitle' ) !== '' ) { ?>
                            <?php echo rwmb_meta( 'wtf_team_subtitle' ); ?>
                            <?php } ?> 
                        </div>
                        <div class="col-lg-8">
                            <?php the_content(); ?>
                        </div>
                    </article><!-- /service-tab-content -->
                </div>

            <?php wp_reset_postdata(); ?>
        </div><!-- /service-content -->

    </div><!-- /services-wrap -->

</div><!-- /container -->
</div> <!-- /White Wrap 1 / Intro -->

<?php endwhile; ?>	

<!-- Yellow Wrap / Intro Text -->
 <?php if( rwmb_meta( 'wtf_team_yellow_txt' ) !== '' ) { ?>
<div id="y">
    <div class="container">
        <div class="col-lg-12 centered">
         <?php echo rwmb_meta( 'wtf_team_yellow_txt' ); ?>
     </div>
 </div><!-- /container -->
</div><!-- /yellow wrap -->
<?php } ?>  


<!-- White Wrap Ver. 2 / Services -->
    <div id="w2">
        <div class="container">
            <div class="row centered">
                <?php if( rwmb_meta( 'wtf_team_col_title' ) !== '' ) { ?>
                <?php echo rwmb_meta( 'wtf_team_col_title' ); ?>
                
                <br>                
          
                <?php } ?> 
                
<?php if( rwmb_meta( 'wtf_team_col' ) !== '' ) { ?>
                    <?php 
                    $service_col = rwmb_meta( 'wtf_team_col' );
                    foreach ( $service_col as $value ) { ?>

                    <div class="col-lg-2">
                        <h1><?php echo $value; ?></h1>
                    </div>

                    <?php } ?>

                    <?php } ?> 
         
            </div><!-- /row -->
        </div><!-- /container -->
    </div>  <!-- /White Wrap Ver.2 - Services  -->        


<?php if ( has_post_thumbnail()) : ?>
    <?php $background = wp_get_attachment_image_src( get_post_thumbnail_id( $page->ID ), 'full' ); ?>
 <div id="about" style="background-image: url('<?php echo $background[0]; ?>');">
      </div>
<?php endif; ?>
        


<?php get_footer(); ?>