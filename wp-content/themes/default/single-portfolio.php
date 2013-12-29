<?php
/**
 * Single Portfolio Template
 *
 *
 * @file           single-portfolio.php
 * @package        SmartWP 
 * @author         Brad WIlliams 
 * @copyright      2003 - 2013 Brag Interactive
 * @license        license.txt
 * @version        Release: 3.0.0
 * @link           http://codex.wordpress.org/Theme_Development#Single_Post_.28single.php.29
 * @since          available since Release 1.0
 */
?>
<?php get_header(); ?>

<div id="content-project">

 <?php if (have_posts()) : ?>

 <?php while (have_posts()) : the_post(); ?>


 <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


  <!-- White Wrap Ver. 1 / Intro -->
  <div id="w1">
    <div class="container">
      <br>
      <div class="row">
        <div class="col-lg-10 col-lg-offset-1 centered">

          <?php if( rwmb_meta( 'wtf_portfolio_top_title' ) !== '' ) { ?>
            <?php echo rwmb_meta( 'wtf_portfolio_top_title' ); ?>
             <?php } ?> 
          
          <br>
          <br>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 centered">
          <?php the_post_thumbnail('full'); ?> 
        </div>
      </div><!-- /row -->
    </div><!-- /container -->
  </div> <!-- /White Wrap 1 / Intro -->


  <section id="single-project">

<?php if( rwmb_meta( 'wtf_portfolio_b_left' ) !== '' || rwmb_meta( 'wtf_portfolio_b_right' ) !== ''  ) { ?>
    <!-- Dark Blue Wrap / Project Info -->
    <div id="db">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-lg-offset-1">
             <?php if( rwmb_meta( 'wtf_portfolio_b_left' ) !== '' ) { ?>
            <?php echo rwmb_meta( 'wtf_portfolio_b_left' ); ?>
             <?php } ?> 
          </div>

          <div class="col-lg-6">

            <?php if( rwmb_meta( 'wtf_portfolio_b_right' ) !== '' ) { ?>
            <?php echo rwmb_meta( 'wtf_portfolio_b_right' ); ?>
             <?php } ?> 
            
          </div>
        </div>
      </div><!-- /container -->
    </div><!-- /db wrap -->
    <?php } ?> 


    <!-- White Wrap Ver. 2 / Project Images -->
    <div id="w2">
      <div class="container">
        <div class="row">
          <div class="project-entry">
             <?php if( rwmb_meta( 'wtf_portfolio_content_title' ) !== '' ) { ?>
            <?php echo rwmb_meta( 'wtf_portfolio_content_title' ); ?>
             <?php } ?> 
            <br>        

              <?php the_content(); ?>
            
          </div><!-- end of .project-entry -->
        </div><!-- /row -->
        <br>
      </div><!-- /container -->
    </div>  <!-- /White Wrap Ver.2 - Project Images  -->

  </section>       
</article><!-- end of #post-<?php the_ID(); ?> -->

<?php endwhile; ?> 

<?php else : ?>

  <div class="container">
   <article id="post-not-found" class="hentry clearfix">
    <header>
     <h1 class="title-404"><?php _e('404 &#8212; Fancy meeting you here!', 'responsive'); ?></h1>
   </header>
   <section>
     <p><?php _e('Don&#39;t panic, we&#39;ll get through this together. Let&#39;s explore our options here.', 'responsive'); ?></p>
   </section>
   <footer>
     <h6><?php _e( 'You can return', 'responsive' ); ?> <a href="<?php echo home_url(); ?>/" title="<?php esc_attr_e( 'Home', 'responsive' ); ?>"><?php _e( '&#9166; Home', 'responsive' ); ?></a> <?php _e( 'or search for the page you were looking for', 'responsive' ); ?></h6>
     <?php get_search_form(); ?>
   </footer>

 </article>
</div>

<?php endif; ?>  

</div><!-- end of #content -->


<?php get_footer(); ?>