<?php
/**
 * Blog Template
 *
   Template Name: Blog
 *
 * @file           blog.php
 * @package        SmartWP 
 * @author         Brad Williams 
 * @copyright      2011 - 2013 Brag Interactive
 * @license        license.txt
 * @version        Release: 3.0.0
 * @link           http://codex.wordpress.org/Templates
 * @since          available since Release 1.0
 */
   ?>
   <?php get_header(); ?>
   <?php global $more; $more = 0; ?>

   <div class="container">
    <div class="row main-blog">
      <div class="col-lg-8">

        
        <?php
        global $wp_query;
        if ( get_query_var('paged') ) {
          $paged = get_query_var('paged');
        } elseif ( get_query_var('page') ) {
          $paged = get_query_var('page');
        } else {
          $paged = 1;
        }
        query_posts( array( 'post_type' => 'post', 'paged' => $paged ) );
        ?>   
        <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>


        
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

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
               <header>
                <h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'responsive'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h2>
              </header>
            </div><!-- /col9 Blog Title -->
          </div><!-- /row -->
          
          
          <section class="post-entry">
            <?php if ( has_post_thumbnail()) : ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
              <?php the_post_thumbnail(); ?>
            </a>
            <br>
          <?php endif; ?>
          
          <div class="col-md-9 col-md-offset-3">
            <?php the_content(); ?>
            <?php custom_link_pages(array(
              'before' => '<nav class="pagination"><ul>' . __(''),
              'after' => '</ul></nav>',
                            'next_or_number' => 'next_and_number', # activate parameter overloading
                            'nextpagelink' => __('&rarr;'),
                            'previouspagelink' => __('&larr;'),
                            'pagelink' => '%',
                            'echo' => 1 )
                            ); ?>
                            <br>
                            <hr>
                          </div><!-- /col9 -->
                        </section><!-- end of .post-entry -->         
                        
                      </article><!-- end of #post-<?php the_ID(); ?> -->


                      
                    <?php endwhile; ?> 
                    
                    <?php if (  $wp_query->max_num_pages > 1 ) : ?>
                    <nav>
                      <ul class="pager">
                       <li class="previous"><?php next_posts_link( __( '&#8249; Older posts', 'responsive' ) ); ?></li>
                       <li class="next"><?php previous_posts_link( __( 'Newer posts &#8250;', 'responsive' ) ); ?></li>
                     </ul><!-- end of .navigation -->
                   </nav>
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
           

         </div> <!-- /col-lg-8 -->

         <?php get_sidebar(); ?>
         <?php get_footer(); ?>