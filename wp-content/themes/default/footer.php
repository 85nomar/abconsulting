<?php
/**
 * Footer Template
 *
 *
 * @file           footer.php
 * @package        SmartWP 
 * @author         Brad Williams 
 * @copyright      2011 - 2013 Brag Interactive
 * @license        license.txt
 * @version        Release: 3.0.0
 * @link           http://codex.wordpress.org/Theme_Development#Footer_.28footer.php.29
 * @since          available since Release 1.0
 */
?>
</div><!-- end of wrapper-->
<?php responsive_wrapper_end(); // after wrapper hook ?>


<?php responsive_container_end(); // after container hook ?>

<footer id="f">
<div class="container">
      <div class="row">
        <div class="col-sm-4">
          <?php dynamic_sidebar('footer-left'); ?>
        </div>
        <div class="col-sm-4">
          <?php dynamic_sidebar('footer-middle'); ?>
        </div>
        <div class="col-sm-4">
          <?php dynamic_sidebar('footer-right'); ?>
        </div>
      
      </div><!-- /row -->
    </div><!-- /container -->
</footer><!-- end #footer -->

<div id="c">
    <div class="container">
      <div class="pull-right">

          <?php if( bi_get_data('custom_copyright') ) : ?>
        <?php echo bi_get_data('custom_copyright'); ?>
      <?php else : ?>
              <p>Crafted with  <i class="fa fa-heart"></i>  by Carlos & Brad</p>
            <?php endif; ?>
      </div>
    </div>
  </div>

<?php wp_footer(); ?>

</body>
</html>