/*!
 * JS Scripts
 */
// Placeholder
jQuery(function(){

      //Shortcode Popover
     jQuery("a[rel=popover]").popover()
      .click(function(e) {
        e.preventDefault()
      });

      //Shortcode Tooltip
      jQuery("a[rel=tooltip]").tooltip();

      //Homepage Tooltip
      jQuery("[data-toggle='tooltip']").tooltip();

      //Testimonila Carousel
      jQuery('.carousel').carousel({interval: 3500});
      jQuery(".carousel-indicators li:first").addClass("active");
      jQuery(".carousel-inner .item:first").addClass("active");

});