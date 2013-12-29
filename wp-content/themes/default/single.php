<?php
/**
 * Single Posts Template
 *
 *
 * @file           single.php
 * @package        SmartWP 
 * @author         Brad Williams 
 * @copyright      2011 - 2013 Brag Interactive
 * @license        license.txt
 * @version        Release: 3.0.0
 * @link           http://codex.wordpress.org/Theme_Development#Single_Post_.28single.php.29
 * @since          available since Release 1.0
 */
?>
<?php get_header(); ?>


<div class="container">
  <div class="row main-blog">
    <div class="col-lg-8">

      <div id="content">

        <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>


        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <br>
          <?php if ( has_post_thumbnail()) : ?>

          <?php the_post_thumbnail(); ?>
        <?php endif; ?>

        <div class="row">
          <div class="col-md-3 blog-date">
           

             <section class="post-meta">
               <p>
              <b>Published</b><br />
              <?php 
              printf( __( '%2$s', 'responsive' ),'meta-prep meta-prep-author',
                sprintf( '%3$s',
                  get_permalink(),
                  esc_attr( get_the_time() ),
                  get_the_date()
                  )
                );
                ?> 
                </p>
              </section><!-- end of .post-meta -->

            
          </div><!-- /col3 Blog Date -->

          <div class="col-md-9 blog-title">
            <h2><?php the_title(); ?></h2>
          </div><!-- /col9 Blog Title -->
        </div><!-- /row -->


        <div class="col-md-9 col-md-offset-3 blog-post">

          <section class="post-entry">
            <?php the_content(); ?>

            <?php if ( get_the_author_meta('description') != '' ) : ?>

            <div id="author-meta">
              <?php if (function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email'), '80' ); }?>
              <div class="about-author"><?php _e('About','responsive'); ?> <?php the_author_posts_link(); ?></div>
              <p><?php the_author_meta('description') ?></p>
            </div><!-- end of #author-meta -->

          <?php endif; // no description, no author's meta ?>


          <?php custom_link_pages(array(
            'before' => '<nav class="pagination"><ul>' . __(''),
            'after' => '</ul></nav>',
                            'next_or_number' => 'next_and_number', # activate parameter overloading
                            'nextpagelink' => __('&rarr;'),
                            'previouspagelink' => __('&larr;'),
                            'pagelink' => '%',
                            'echo' => 1 )
                            ); ?>
                            

                          </section><!-- end of .post-entry -->

                          <footer class="article-footer">
                            <?php if( bi_get_data('enable_disable_tags','1') == '1') {?>
                            <div class="post-data">
                              <?php the_tags(__('Tagged with:', 'responsive') . ' ', ' ', '<br />'); ?>  
                            </div><!-- end of .post-data --> 
                            <?php } ?>            

                            <div class="post-edit"><?php edit_post_link(__('Edit', 'responsive')); ?></div>  
                          </footer> 
                        </div><!-- /col9 -->          
                      </article><!-- end of #post-<?php the_ID(); ?> -->

                      <?php comments_template( '', true ); ?>

                    <?php endwhile; ?> 

                    <?php if (  $wp_query->max_num_pages > 1 ) : ?>
                    <nav class="navigation">
                     <div class="previous"><?php next_posts_link( __( '&#8249; Older posts', 'responsive' ) ); ?></div>
                     <div class="next"><?php previous_posts_link( __( 'Newer posts &#8250;', 'responsive' ) ); ?></div>
                   </nav><!-- end of .navigation -->
                 <?php endif; ?>

               <?php else : ?>

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

           <?php endif; ?>  

         </div><!-- end of #content -->
       </div>

       <?php get_sidebar(); ?>
       <?php get_footer(); ?>