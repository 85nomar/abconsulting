<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories 		= array();  
		$of_categories_obj 	= get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
			$of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
			$categories_tmp 	= array_unshift($of_categories, "Select a category:");
     

		//Access the WordPress Pages via an Array
			$of_pages 			= array();
			$of_pages_obj 		= get_pages('sort_column=post_parent,menu_order');    
			foreach ($of_pages_obj as $of_page) {
				$of_pages[$of_page->ID] = $of_page->post_name; }
				$of_pages_tmp 		= array_unshift($of_pages, "Select a page:"); 
      

		//Testing 
				$of_options_select 	= array("one","two","three","four","five"); 
				$of_options_radio 	= array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");

				$font_size = array( 'select', '12px', '13px', '14px' );
				$font_style = array( "normal", "italic", "bold", "bold italic");

		//Sample Homepage blocks for the layout manager (sorter)
				$of_options_homepage_blocks = array(
			"enabled"	=> array (
				"placebo"	=> "placebo", //REQUIRED!
				"home_image"	=> "Image",
				"home_highlights"	=> "Highlights",
				"home_tagline"	=> "Tagline",
				"home_testimonials"	=> "Testimonials",
					
			),
			"disabled"	=> array (
				"placebo"	=> "placebo", //REQUIRED!
				"home_social"	=> "Social",
				"home_static_page"	=> "Page Content",
				"home_clients"	=> "Clients",
				"home_portfolio"	=> "Portfolio",				
			),
		);


		//Stylesheets Reader
				$alt_stylesheet_path = LAYOUT_PATH;
				$alt_stylesheets = array();

				if ( is_dir($alt_stylesheet_path) ) 
				{
					if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) 
					{ 
						while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) 
						{
							if(stristr($alt_stylesheet_file, ".css") !== false)
							{
								$alt_stylesheets[] = $alt_stylesheet_file;
							}
						}    
					}
				}


		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/images/bg/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri().'/images/bg/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
			if ($bg_images_dir = opendir($bg_images_path) ) { 
				while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
					if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
						$bg_images[] = $bg_images_url . $bg_images_file;
					}
				}    
			}
		}
		

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/

		$menu_color = array( 'Default', 'Inverse' );
		// Homepage Latest Blog or Featured Image
		$hp_array = array('featured' => __('Featured Hero Unit', 'responsive'),'latest' => __('Latest Blog Post', 'responsive'));
		// Buttons
		$btn_color = array("default" => "Default Gray","primary" => "Primary","info" => "Info","success" => "Success","warning" => "Warning","danger" => "Danger","inverse" => "Inverse");
		$btn_size = array("xs" => "Extra Small","sm" => "Small","default" => "Medium","lg" => "Large");
		
		//More Options
		$uploads_arr 		= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads 		= get_option('of_uploads');
		$other_entries 		= array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat 		= array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos 			= array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 


		/*-----------------------------------------------------------------------------------*/
		/* The Options Array */
		/*-----------------------------------------------------------------------------------*/

// Set the Options Array
		global $of_options;
		$of_options = array();

		$of_options[] = array( "name"	=> __( 'General', 'responsive' ),
			"type"	=> "heading",
			);

		$of_options[] = array( "name"	=> __( 'Login Logo', 'responsive' ),
			"desc"	=> __( 'Upload a custom logo for your Wordpress login screen. (Recommended 300px x 80px)', 'responsive' ),
			"id"	=> "custom_login_logo",
			"std"	=> "",
			"type"	=> "media");

		$of_options[] = array( "name"	=> __( 'Login Logo Height', 'responsive' ),
			"desc"	=> __( 'Enter the height of your custom logo to override the default WordPress image height. Width, can not change.', 'responsive' ),
			"id"	=> "custom_login_logo_height",
			"std"	=> "67px",
			"type"	=> "text");

		$of_options[] = array( "name"	=> __( 'Favicon', 'responsive' ),
			"desc"	=> __( 'Upload or past the URL for your custom favicon.', 'responsive' ),
			"id"	=> "custom_favicon",
			"std"	=> "",
			"type"	=> "media");

		// Header
		$of_options[] = array( "name"	=> __( 'Header', 'responsive' ),
			"type"	=> "heading");


		$of_options[] = array( "name"	=> __( 'Main Logo', 'responsive' ),
			"desc"	=> __( 'Use this field to upload your custom logo for use in the theme header. (Recommended 200px x 40px)', 'responsive' ),
			"id"	=> "custom_logo",
			"std"	=> "",
			"type"	=> "media",
			);
	

		//Homepage					
		$of_options[] = array( "name"	=> __( 'Homepage', 'responsive' ),
			"type"	=> "heading");

		$of_options[] = array( "name"	=> __( 'Homepage Layout Manager', 'responsive' ),
			"desc"	=> __( 'Organize how you want the layout to appear on the homepage.', 'responsive' ),
			"id"	=> "homepage_blocks",
			"std"	=> $of_options_homepage_blocks,
			"type"	=> "sorter");

		$of_options[] = array( 	"name"	=> "",
							"desc"	=> "",
							"id"	=> "subheading",
							"std"	=> "<h3 style=\"margin: 0;\">". __( 'Clients', 'responsive' ) ."</h3>",
							"icon"	=> true,
							"type"	=> "info"
					);

		$of_options[] = array( "name"	=> __( 'Clients', 'responsive' ),
							"desc"	=> __( 'Content in the clients section. HTML allowed.', 'responsive' ),
							"id"	=> "client_content",
							"std"	=> '<h2>Some brands working with us.</h2>
										<p>The most important brands trust in our work. We create exclusive partnerships to endorse their work and beliefs. 
										We truly care about our clients and their needs. That\'s why their choose us to work with them.</p>',
							"type"	=> "textarea");

		$of_options[] = array( 	"name"	=> "",
							"desc"	=> "",
							"id"	=> "subheading",
							"std"	=> "<h3 style=\"margin: 0;\">". __( 'Social', 'responsive' ) ."</h3>",
							"icon"	=> true,
							"type"	=> "info"
					);

		$of_options[] = array( "name"	=> __( 'Social Title', 'responsive' ),
							"desc"	=> __( 'Title of the social icon section. HTML allowed.', 'responsive' ),
							"id"	=> "social_title",
							"std"	=> '<h2>Keep in touch, we are social people.</h2>',
							"type"	=> "textarea");	

		$of_options[] = array( 	"name"	=> "",
							"desc"	=> "",
							"id"	=> "subheading",
							"std"	=> "<h3 style=\"margin: 0;\">". __( 'Image & Text', 'responsive' ) ."</h3>",
							"icon"	=> true,
							"type"	=> "info"
					);

		$of_options[] = array( "name"	=> __( 'HP Image', 'responsive' ),
							"desc"	=> __( 'Upload image for homepage image section.', 'responsive' ),
							"id"	=> "hp_image",
							"std"	=> "",
							"type"	=> "media");

		$of_options[] = array( "name"	=> __( 'Image Text', 'responsive' ),
							"desc"	=> __( 'Control your homepage tagline here. HTML and shortcodes allowed.', 'responsive' ),
							"id"	=> "hp_image_txt",
							"std"	=> '<h1>Welcome to <b>Smart</b>, <br/>
					a Beautiful & Multipurpose Bootstrap Theme.
				</h1>',
							"type"	=> "textarea");	

		$of_options[] = array( 	"name"	=> "",
							"desc"	=> "",
							"id"	=> "subheading",
							"std"	=> "<h3 style=\"margin: 0;\">". __( 'Portfolio', 'responsive' ) ."</h3>",
							"icon"	=> true,
							"type"	=> "info"
					);
							
	$of_options[] = array( "name"	=> __( 'Portfolio Text', 'responsive' ),
							"desc"	=> __( 'Control your homepage tagline here. HTML and shortcodes allowed.', 'responsive' ),
							"id"	=> "hp_port_txt",
							"std"	=> '<h2>Show your work with style. Let others appreciate it.</h2>
				<p>Put the best pieces of your work here. Show your talent & inspire others to work with you. Be the agency or freelancer that they are waiting for.</p>',
							"type"	=> "textarea"
							);

			$of_options[] = array( "name"	=> __( 'Portfolio Items', 'responsive' ),
							"desc"	=> __( 'Enter the number of portfolio items to display on the homepage. -1 for all items.', 'responsive' ),
							"id"	=> "home_portfolio_count",
							"std"	=> "4",
							"type"	=> "text");

			$of_options[] = array( 	"name"	=> "",
							"desc"	=> "",
							"id"	=> "subheading",
							"std"	=> "<h3 style=\"margin: 0;\">". __( 'Tagline', 'responsive' ) ."</h3>",
							"icon"	=> true,
							"type"	=> "info"
					);				
							
		$of_options[] = array( "name"	=> __( 'Tagline Content', 'responsive' ),
							"desc"	=> __( 'Control your homepage tagline here. HTML and shortcodes allowed.', 'responsive' ),
							"id"	=> "home_tagline",
							"std"	=> '<h2>Create something really beautiful with this theme. Enjoy the possibilities.</h2>
										<br>
										<button type="button" class="btn btn-theme">SHOW MORE</button>',
							"type"	=> "textarea");	

				//Blog				
		$of_options[] = array( "name"	=> __( 'Blog', 'responsive' ),
			"type"	=> "heading");


		$of_options[] = array( 	"name" 		=> "Read More Button Text",
			"desc" 		=> "This is the text that will replace Read More.",
			"id" 		=> "read_more_text",
			"std" 		=> "Read More",
			"type" 		=> "text"
			);

		$of_options[] = array( "name"	=> __( 'Make the Read More button Full Width - Block', 'responsive' ),
			"desc"	=> __( 'Enable/Disable full width button.', 'responsive' ),
			"id"	=> "read_more_block",
			"std"	=> '0',
			"on"	=> __( 'Enable', 'responsive' ),
			"off"	=> __( 'Disable', 'responsive' ),
			"type"	=> "switch");

		$of_options[] = array( 	"name"	=> "",
			"desc"	=> "",
			"id"	=> "subheading",
			"std"	=> "<h3 style=\"margin: 0;\">". __( 'Single Blog Entry', 'responsive' ) ."</h3>",
			"icon"	=> true,
			"type"	=> "info");


		$of_options[] = array( "name"	=> __( 'Display Tags', 'responsive' ),
			"desc"	=> __( 'Select to enable/disable the post tags.', 'responsive' ),
			"id"	=> "enable_disable_tags",
			"std"	=> '1',
			"on"	=> __( 'Enable', 'responsive' ),
			"off"	=> __( 'Disable', 'responsive' ),
			"type"	=> "switch");

		$of_options[] = array( 	"name"	=> "",
			"desc"	=> "",
			"id"	=> "subheading",
			"std"	=> "<h3 style=\"margin: 0;\">". __( 'Blog Archive', 'responsive' ) ."</h3>",
			"icon"	=> true,
			"type"	=> "info");

		$of_options[] = array( "name"	=> __( 'Display Tags', 'responsive' ),
			"desc"	=> __( 'Select to enable/disable the post tags.', 'responsive' ),
			"id"	=> "enable_disable_archive_tags",
			"std"	=> '1',
			"on"	=> __( 'Enable', 'responsive' ),
			"off"	=> __( 'Disable', 'responsive' ),
			"type"	=> "switch");



			//Portfolio					
		$of_options[] = array( "name"	=> __( 'Portfolio', 'responsive' ),
			"type"	=> "heading");


		$url =  ADMIN_DIR . 'assets/images/';
		$of_options[] = array( "name"	=> __( 'Portfolio Columns', 'responsive' ),
			"desc"	=> __( 'Select the number of columns you would like to use for the portfolio.', 'responsive' ),
			"id"	=> "portfolio_column",
			"std"	=> "three",
			"type"	=> "images",
			"options"	=> array(
				'two'	=> $url . '2-col-portfolio.png',
				'three'	=> $url . '3-col-portfolio.png',
				'four'	=> $url . '4-col-portfolio.png' )
			);

		$of_options[] = array( "name"	=> __( 'Display Project Titles', 'responsive' ),
			"desc"	=> __( 'Select to enable/disable the project titles.', 'responsive' ),
			"id"	=> "project_title",
			"std"	=> '1',
			"on"	=> __( 'Enable', 'responsive' ),
			"off"	=> __( 'Disable', 'responsive' ),
			"type"	=> "switch");

		$of_options[] = array( "name"	=> __( 'Display Testimonial Carousel', 'responsive' ),
			"desc"	=> __( 'Select to enable/disable the carousel under thumbnails.', 'responsive' ),
			"id"	=> "project_testimonial",
			"std"	=> '1',
			"on"	=> __( 'Enable', 'responsive' ),
			"off"	=> __( 'Disable', 'responsive' ),
			"type"	=> "switch");

		$of_options[] = array( "name"	=> __( 'Display Social Icons', 'responsive' ),
			"desc"	=> __( 'Select to enable/disable the social icons under thumbnails.', 'responsive' ),
			"id"	=> "project_social",
			"std"	=> '1',
			"on"	=> __( 'Enable', 'responsive' ),
			"off"	=> __( 'Disable', 'responsive' ),
			"type"	=> "switch");

		//Social
		$of_options[] = array( "name"	=> __( 'Social', 'responsive' ),
			"type"	=> "heading");

		$url =  ADMIN_DIR . 'assets/images/';					
		$of_options[] = array( "name"	=> __( 'Social Style', 'responsive' ),
			"desc"	=> __( 'Select your social icon style. Some icons don\'t have both styles. Refer to <a href="http://fortawesome.github.io/Font-Awesome/" target="_blank">Font Awesome</a>.', 'responsive' ),
			"id"	=> "social_style",
			"std"	=> "one",
			"type"	=> "images",
			"options"	=> array(
				'one'	=> $url . 'facebook.jpg',
				'two'	=> $url . 'facebook2.jpg' )
			);

		$social_links = bi_social_links();		
		foreach( $social_links as $social_link ) {
			$of_options[] = array( "name"	=> ucfirst($social_link),
				'desc'	=> ' '. __( 'Enter your ', 'responsive' ) . $social_link . __( ' url', 'responsive' ) .' <br />'. __( 'Include http:// at the front of the url.', 'responsive' ),
				'id'	=> $social_link,
				'std'	=> '#',
				'type'	=> 'text' );
		}

		//Post Types
		$of_options[] = array( "name"	=> __( 'Post Types', 'reponsive' ),
							"type"	=> "heading");
							
		$of_options[] = array( 	"name"	=> "",
							"desc"	=> "",
							"id"	=> "subheading",
							"std"	=> "<h3 style=\"margin: 0;\">". __( 'Portfolio', 'reponsive' ) ."</h3>",
							"icon"	=> true,
							"type"	=> "info"
					);
								
		$of_options[] = array( "name"	=> __( 'Portfolio Name', 'reponsive' ),
							"desc"	=> __( 'Enter a custom name for your portfolio post type.', 'reponsive' ),
							"id"	=> "portfolio_post_type_name",
							"std"	=> "Portfolio",
							"type"	=> "text");
							
		$of_options[] = array( "name"	=> __( 'Portfolio Slug', 'reponsive' ),
							"desc"	=> __( 'Enter a custom slug for your portfolio post type. Go <strong>save your permalinks</strong> after changing this.', 'reponsive' ),
							"id"	=> "portfolio_post_type_slug",
							"std"	=> "portfolio",
							"type"	=> "text");
							
							
		$of_options[] = array( 	"name"	=> "",
							"desc"	=> "",
							"id"	=> "subheading",
							"std"	=> "<h3 style=\"margin: 0;\">". __( 'Services', 'reponsive' ) ."</h3>",
							"icon"	=> true,
							"type"	=> "info"
					);
							
		$of_options[] = array( "name"	=> __( 'Services Name', 'reponsive' ),
							"desc"	=> __( 'Enter a custom name for your staff post type.', 'reponsive' ),
							"id"	=> "services_post_type_name",
							"std"	=> "Services",
							"type"	=> "text");
							
		$of_options[] = array( "name"	=> __( 'Services Slug', 'reponsive' ),
							"desc"	=> __( 'Enter a custom slug for your staff post type. Go <strong>save your permalinks</strong> after changing this.', 'reponsive' ),
							"id"	=> "services_post_type_slug",
							"std"	=> "services",
							"type"	=> "text"); 
							
		$of_options[] = array( 	"name"	=> "",
							"desc"	=> "",
							"id"	=> "subheading",
							"std"	=> "<h3 style=\"margin: 0;\">". __( 'Testimonials', 'reponsive' ) ."</h3>",
							"icon"	=> true,
							"type"	=> "info"
					);
							
		$of_options[] = array( "name"	=> __( 'Testimonials Name', 'reponsive' ),
							"desc"	=> __( 'Enter a custom name for your staff post type.', 'reponsive' ),
							"id"	=> "testimonials_post_type_name",
							"std"	=> "Testimonials",
							"type"	=> "text");
							
		$of_options[] = array( "name"	=> __( 'Testimonials Slug', 'reponsive' ),
							"desc"	=> __( 'Enter a custom slug for your staff post type. Go <strong>save your permalinks</strong> after changing this.', 'reponsive' ),
							"id"	=> "testimonials_post_type_slug",
							"std"	=> "testimonials",
							"type"	=> "text");

		$of_options[] = array( 	"name"	=> "",
							"desc"	=> "",
							"id"	=> "subheading",
							"std"	=> "<h3 style=\"margin: 0;\">". __( 'Clients', 'reponsive' ) ."</h3>",
							"icon"	=> true,
							"type"	=> "info"
					);
							
		$of_options[] = array( "name"	=> __( 'Clients Name', 'reponsive' ),
							"desc"	=> __( 'Enter a custom name for your clients post type.', 'reponsive' ),
							"id"	=> "clients_post_type_name",
							"std"	=> "Clients",
							"type"	=> "text");
							
		$of_options[] = array( "name"	=> __( 'Clients Slug', 'reponsive' ),
							"desc"	=> __( 'Enter a custom slug for your clients post type. Go <strong>save your permalinks</strong> after changing this.', 'reponsive' ),
							"id"	=> "clients_post_type_slug",
							"std"	=> "clients",
							"type"	=> "text");
							

		//Footer
		$of_options[] = array( "name"	=> __( 'Footer', 'responsive' ),
			"type"	=> "heading");


		$of_options[] = array( "name"	=> __( 'Custom Copyright', 'responsive' ),
			"desc"	=> __( 'Add your own custom text/html for copyright region.', 'responsive' ),
			"id"	=> "custom_copyright",
			"std"	=> "",
			"type"	=> "textarea");

		$of_options[] = array( "name"	=> __( 'Tracking', 'responsive' ),
			"type"	=> "heading");

		$of_options[] = array( "name"	=> __( 'Header Tracking Code', 'responsive' ),
			"desc"	=> __( 'Paste your Google Analytics (or other) tracking code here. This will be added into the header template of your theme.', 'responsive' ),
			"id"	=> "tracking_header",
			"std"	=> "",
			"type"	=> "textarea");    

		$of_options[] = array( "name"	=> __( 'Footer Tracking Code', 'responsive' ),
			"desc"	=> __( 'Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.', 'responsive' ),
			"id"	=> "tracking_footer",
			"std"	=> "",
			"type"	=> "textarea");

		//Custom CSS
		$of_options[] = array( "name"	=> __( 'Custom CSS', 'responsive' ),
			"type"	=> "heading");

		$of_options[] = array( "name"	=> __( 'Custom CSS', 'responsive' ),
			"desc"	=> __( 'Quickly add some CSS to your theme by adding it to this block.', 'responsive' ),
			"id"	=> "custom_css_box",
			"std"	=> "",
			"type"	=> "textarea"); 

	// Backup Options
		$of_options[] = array( 	"name" 		=> "Backup Options",
			"type" 		=> "heading",
			);

		$of_options[] = array( 	"name" 		=> "Backup and Restore Options",
			"id" 		=> "of_backup",
			"std" 		=> "",
			"type" 		=> "backup",
			"desc" 		=> 'You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.',
			);

		$of_options[] = array( 	"name" 		=> "Transfer Theme Options Data",
			"id" 		=> "of_transfer",
			"std" 		=> "",
			"type" 		=> "transfer",
			"desc" 		=> 'You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".',
			);

	}//End function: of_options()
}//End chack if function exists: of_options()
?>
