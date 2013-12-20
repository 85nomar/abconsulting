<?php
/**
 Template Name: Portfolio
 *
 *
 * @file           template-portfolio.php
 * @package        SmartWP 
 * @author         Brad Williams
 * @copyright      2003 - 2013 Brag Interactive
 * @license        license.txt
 * @version        Release: 3.0.0
 * @link           http://codex.wordpress.org/Theme_Development#Pages_.28page.php.29
 * @since          available since Release 1.0
 */
?>
<?php get_header(); ?>

<div id="w2">
        <div class="container">

        <div class="row centered">
            <br>
            <?php if( rwmb_meta( 'wtf_portfolio_title' ) !== '' ) { ?>
            <?php echo rwmb_meta( 'wtf_portfolio_title' ); ?>
            
                <hr>
                
                 <?php } ?> 
                 <br>
            <?php
                // get portfolio column count
                $portfolio_count = bi_get_data('portfolio_column', 'three' );
                if ( $portfolio_count == "two") {
                    $pcount = '6';
                } elseif ($portfolio_count == "three") {
                    $pcount = '4';
                } elseif ($portfolio_count == "four") {
                     $pcount = '3';
                }
            ?>

            <?php
                $loop = new WP_Query(array('post_type' => 'portfolio', 'posts_per_page' => -1));
                $count =0;
            ?>

               <div id="portfolio-<?php echo $portfolio_count ?>-column">

                <?php if ( $loop ) : 

                    while ( $loop->have_posts() ) : $loop->the_post(); ?>
                        
                        <div class="col-lg-<?php echo ($pcount); ?>">
                            <div class="grid mask">

                                <figure>
                                    <?php
                                    $permalink = get_permalink();
                                    $images = rwmb_meta( 'thickbox', 'type=image' );
                                    foreach ( $images as $image ) { 
                                        echo "<a href='$permalink' title='{$image['title']}'><img src='{$image['full_url']}' alt='{$image['alt']}' /></a>";
                                    } ?>
                            <figcaption>
                                  <?php if( rwmb_meta( 'wtf_port_hover' ) !== '' ) { ?>
                                    <?php echo rwmb_meta( 'wtf_port_hover' ); ?>
                                         <?php } ?>
                                <a href="<?php the_permalink() ?>" class="btn btn-theme btn-lg">Show Me</a>
                            </figcaption><!-- /figcaption -->
                        </figure><!-- /figure -->
                            </div><!-- /grid-mask -->
                            <?php if(bi_get_data('project_title', '1')) {?>
                     <h4><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
                      <?php } ?>
                    <br>
                        </div> <!-- /col -->
                  

                    <?php endwhile; else: ?>

                </div>

                    <div class="error-not-found">Sorry, no portfolio entries for while.</div>

                <?php endif; ?>

      
        </div><!-- end of row centered -->
    </div><!-- end of container -->
</div><!-- end of w2 -->

<?php if(bi_get_data('project_testimonial', '1')) {?>
    <?php get_template_part( 'includes/home', 'testimonials' ); ?>
<?php } ?>
 
 <?php if(bi_get_data('project_social', '1')) {?>   
   <?php get_template_part( 'includes/home', 'social' ); ?>
 <?php } ?>  

<?php get_footer(); ?>