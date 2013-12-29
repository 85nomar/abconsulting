<?php
/**
 * File used for homepage recent portfolio carousel
 *
 * @package WordPress
 */

//get and set portfolio category
$home_portfolio_cat = ( bi_get_data('home_portfolio_cat') != 'Select' ) ? bi_get_data('home_portfolio_cat') : NULL;

//tax query
if( $home_portfolio_cat ) {
	$portfolio_tax_query = array(
		array(
			  'taxonomy' => 'portfolio_cats',
			  'field' => 'slug',
			  'terms' => $home_portfolio_cat
			  )
		);
} else { $portfolio_tax_query = NULL; }

//query post types
$home_portfolio_query = new WP_Query(
	array(
		'post_type' => bi_get_data('home_post_type','portfolio'),
		'showposts' =>  bi_get_data('home_portfolio_count','4'),
		'tax_query' => $portfolio_tax_query,
		'no_found_rows' => true,
	)
);

if ( $home_portfolio_query->posts ) :
	
 ?>        
    
<!-- White Wrap Version 2 - Portfolio Projects -->
    <div id="w2">
        <div class="container">
            <div class="row centered">
                <?php echo stripslashes(do_shortcode(bi_get_data('hp_port_txt'))); ?>
                <br>
    
        <?php $home_portfolio_title = bi_get_data('home_portfolio_title') ? bi_get_data('home_portfolio_title') : __('Recent Work','bi'); ?>
            
				<?php
                $count=0;
                while ( $home_portfolio_query->have_posts() ) : $home_portfolio_query->the_post();
                $count++
               
                 ?>
                <!-- PORTFOLIO IMAGE 1 -->
                <div class="col-lg-3 ">
                    <div class="grid mask">
                        <figure>
                                         <?php
                                         $permalink = get_permalink();
                                    $images = rwmb_meta( 'thickbox', 'type=image' );
                                    foreach ( $images as $image ) { 
                                        echo "<a data-toggle='modal' href='#myModal$count' title='{$image['title']}'><img src='{$image['full_url']}' alt='{$image['alt']}' /></a>";
                                    } ?>
                                   
                                <figcaption>
                                    <?php if( rwmb_meta( 'wtf_port_hover' ) !== '' ) { ?>
                                    <?php echo rwmb_meta( 'wtf_port_hover' ); ?>
                                         <?php } ?>
                                    <a data-toggle="modal" href="#myModal<?php echo $count; ?>" class="btn btn-theme btn-lg">Show Me</a>
                                </figcaption><!-- /figcaption -->
                           
                        </figure><!-- /figure -->
                    </div><!-- /grid-mask -->
                    <h4><?php the_title(); ?></h4>
                </div><!-- /col -->

                <!-- MODAL SHOW THE PORTFOLIO IMAGE. In this demo, all links point to this modal. You should create
                              a modal for each of your projects. -->
                              
                          <div class="modal fade" id="myModal<?php echo $count; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title"><?php the_title(); ?></h4>
                                </div>
                                <div class="modal-body">
                                  <p><?php echo "<img src='{$image['full_url']}' alt='{$image['alt']}' />"; ?></p>
                                  <p> <?php the_excerpt(); ?> </p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                              </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                          </div><!-- /.modal -->

            
        <?php endwhile; ?>
            
            </div><!-- /row -->
        </div><!-- /container -->
    </div><!-- /White Wrap Version 2 - Portfolio -->
    
<?php endif; wp_reset_postdata(); ?>