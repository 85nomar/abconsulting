<?php
/**
 * Contact
 *
   Template Name:  Contact Page
 *
 * @file           template-contact.php
 * @package        SmartWP 
 * @author         Brad Williams 
 * @copyright      2013 Brag Interactive
 * @license        license.txt
 * @version        Release: 3.0.0
 * @link           http://codex.wordpress.org/Theme_Development#Pages_.28page.php.29
 * @since          available since Release 1.0
 */
?>

<?php
if(isset($_POST['submitted'])) {
    if(trim($_POST['contactName']) === '') {
        $nameError = 'Please enter your name.';
        $hasError = true;
    } else {
        $name = trim($_POST['contactName']);
    }

    if(trim($_POST['email']) === '')  {
        $emailError = 'Please enter your email address.';
        $hasError = true;
    } else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
        $emailError = 'You entered an invalid email address.';
        $hasError = true;
    } else {
        $email = trim($_POST['email']);
    }

    if(trim($_POST['comments']) === '') {
        $commentError = 'Please enter a message.';
        $hasError = true;
    } else {
        if(function_exists('stripslashes')) {
            $comments = stripslashes(trim($_POST['comments']));
        } else {
            $comments = trim($_POST['comments']);
        }
    }

    if(!isset($hasError)) {
        $emailTo = get_option('tz_email');
        if (!isset($emailTo) || ($emailTo == '') ){
            $emailTo = get_option('admin_email');
        }
        $subject = '[SmartWP] From '.$name;
        $body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
        $headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

        wp_mail($emailTo, $subject, $body, $headers);
        $emailSent = true;
    }

} ?>

<?php get_header(); ?>

    <!-- White Wrap Ver. 1 / Intro -->
    <div id="w1">
        <div class="container">
            <br>
            <div class="col-lg-10 col-lg-offset-1 centered">
                <h2>Get in <b>touch</b>. Let's work <b>together</b>.</h2>
                <br>
            </div>
        </div><!-- /container -->
    </div> <!-- /White Wrap 1 / Intro -->


<?php if( rwmb_meta( 'wtf_contact_map' ) !== '' ) { ?>
<!-- Map Wrap -->
<div id="map">
            <?php echo rwmb_meta( 'wtf_contact_map' ); ?>
     </div>      
             <?php } ?> 


    <!-- White Wrap Ver. 2 / Contact -->
    <div id="w2">
        <div class="container">
            <br>
            <div class="col-lg-10 col-lg-offset-1">
                <div class="row">
                    <div class="col-md-8">
        
<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
    
        
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
               
                <section class="post-entry">

                             <?php if(isset($emailSent) && $emailSent == true) { ?>
                            <div class="alert alert-success">
                                <p>Thanks, your email was sent successfully.</p>
                            </div>
                        <?php } else { ?>

                            <?php if(isset($hasError) || isset($captchaError)) { ?>
                                <div class="alert alert-danger alert-dismissable">
                                    <a class="close" data-dismiss="alert">×</a>
                                    <h4 class="alert-heading">Sorry, an error occured.</h4>
                                <p class="error">Please try again!<p>
                                </div>
                            <?php } ?>

                    <form action="<?php the_permalink(); ?>" id="contactForm" method="post">
                        <fieldset>
                        <div class="form-group">
                                <label class="control-label" for="contactName">Name:</label>
                                <input class="form-control" type="text" name="contactName" id="contactName" value="" />
                                <?php if($nameError != '') { ?>
                                    <p><span class="error"><?=$nameError;?></span></p>
                                <?php } ?>
                          
                           </div>
                           <div class="form-group">
                                <label class="control-label" for="email">Email:</label>
                            
                                <input class="form-control" type="text" name="email" id="email" value="" />
                                <?php if($emailError != '') { ?>
                                    <p><span class="error"><?=$emailError;?></span></p>
                                <?php } ?>
                           
                           </div>
                            <div class="form-group">
                                <label class="control-label" for="commentsText">Message:</label>
                           
                                <textarea class="form-control" name="comments" id="commentsText" rows="10" cols="20"></textarea>
                                 <?php if($commentError != '') { ?>
                                    <p><span class="error"><?=$commentError;?></span></p>
                                <?php } ?>
                            
                           </div>
                           <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Send email</button>
                           </div>
                        <input type="hidden" name="submitted" id="submitted" value="true" />
                    </fieldset>
                    </form>
                    <?php } ?>

                    </div><!-- col-md-8 -->

                </section><!-- end of .post-entry -->
                
            </article><!-- end of #post-<?php the_ID(); ?> -->
            
            
            
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
      

<?php get_sidebar('contact'); ?>
<?php get_footer(); ?>