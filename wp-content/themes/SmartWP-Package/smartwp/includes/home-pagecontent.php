<?php
/**
 * File used for homepage static page content module
 *
 * @package WordPress
 */
?>

<!-- White Wrap - Version 1 -->

    <div id="w1">
        <div class="container centered">
            <?php while( have_posts() ) : the_post(); ?>
             <div class="homepage-content">
           <?php the_content(); ?>
       </div><!-- /homepage-content-->
       <div class="col-lg-10 col-lg-offset-1">
				<?php if ( has_post_thumbnail()) : ?>
              <?php the_post_thumbnail(); ?>
          <?php endif; ?>
			</div>
            <?php endwhile; ?>
        </div><!-- /container -->
    </div><!-- /White Wrap Ver. 1 -->