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

 <div class="col-lg-4 sidebar-zone">
            <h4>SIDEBAR <i class="fa fa-chevron-down"></i></h4>
            <br>
        <aside id="widgets">
        
        <?php responsive_widgets(); // above widgets hook ?>
            
            <?php if (!dynamic_sidebar('right-sidebar')) : ?>
            
                <div class="widget-title"><?php _e('In Archive', 'responsive'); ?></div>
                    <ul>
                        <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
                    </ul>

                <div class="widget-title"><?php _e('My Account', 'responsive'); ?></div>
                    <ul>
                        <?php wp_register(); ?>
                        <li><?php wp_loginout(); ?></li>
                        <?php wp_meta(); ?>
                    </ul>

            <?php endif; //end of main-sidebar ?>

        <?php responsive_widgets_end(); // after widgets hook ?>
            </aside><!-- end of widgets -->
        </div> <!-- end of .col-lg-4 -->
    </div> <!-- container -->
    </div> <!-- end of .col-lg-9 -->