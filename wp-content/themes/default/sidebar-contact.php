<?php
/**
 * Main Widget Template
 *
 *
 * @file           sidebar.php
 * @package        SmartWP 
 * @author         Brad Williams 
 * @copyright      2011 - 2013 Brag Interactive
 * @license        license.txt
 * @version        Release: 3.0.0
 * @link           http://codex.wordpress.org/Theme_Development#Widgets_.28sidebar.php.29
 * @since          available since Release 1.0
 */
?>
      
       <div class="col-md-4">
        <aside id="contact-widgets">
        <?php responsive_widgets(); // above widgets hook ?>
            
            <?php if (!dynamic_sidebar('contact-widget')) : ?>
            

            <?php endif; //end of right-sidebar ?>

        <?php responsive_widgets_end(); // after widgets hook ?>
        </aside><!-- end of widgets -->
    </div>
        </div><!-- row -->
    </div><!--col-lg-10 col-lg-offset-1-->
    </div><!-- /container -->
</div> <!-- /White Wrap 2 / Contact -->