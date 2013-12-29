<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = 'wtf_';

global $meta_boxes;

$meta_boxes = array();

// Post Type name
	$portfolio_post_type_name = ( bi_get_data('portfolio_post_type_name') ) ? bi_get_data('portfolio_post_type_name') : __('Portfolio','responsive');

	//Individual Portfolio
	$meta_boxes[] = array(
		'id'         => 'portfolio_metabox',
		'title'      => 'Options',
		'pages'      => array( 'portfolio', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true,
		'fields'     => array(
			array(
				'name' => __('Main Title','responsive'),
				'desc' => __('This is the content that will be displayed at the very top. Optional.','responsive'),
				'id' => $prefix . 'portfolio_top_title',
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 3,
				'std' => '<h2><b>SmartWP</b> is an awesome theme<br/> created for <b>WordPress</b>.</h2>',
			),
			array(
				'name' => __('Blue Bar Left','responsive'),
				'desc' => __('This is the content that will be displayed on the left. Optional.','responsive'),
				'id' => $prefix . 'portfolio_b_left',
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 3,
				'std' => '<h3>Theme Name</h3><p><b>Team Leader:</b><br/>Brad Carson</p><p><b>Our Work:</b><br/>Theme Development<br/>Theme Design</p>',
			),
			array(
				'name' => __('Blue Bar Right','responsive'),
				'desc' => __('This is the content that will be displayed on the right. Optional.','responsive'),
				'id' => $prefix . 'portfolio_b_right',
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 3,
				'std' => '<h3>Project Resume</h3><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>',
			),
			array(
				'name' => __('Content Title','responsive'),
				'desc' => __('This is the title that will be displayed above the content and below the blue bar. Optional.','responsive'),
				'id' => $prefix . 'portfolio_content_title',
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 3,
				'std' => '<h2>Theme - Project Information.</h2>',
			),
			array(
				'name' => __('Thumbnail Hover Text','responsive'),
				'desc' => __('Enter the text you would like to display in the thumbnail mouseover. Optional.','responsive'),
				'id' => $prefix . 'port_hover',
				'type' => 'text',
				'size' => '50',
				'std' => '<h5>Client Name</h5>',
			),
			array(
				'name' => __( 'Thumbnail Image', 'responsive' ),
				'id'   => "thickbox",
				'type' => 'thickbox_image',
		),
		),
	);


	// Portfolio Page
$meta_boxes[] = array(
	'title'  => __( 'Options', 'responsive' ),
	'pages' => array('page'),
	'fields' => array(
			array(
				'name' => __('Title','responsive'),
				'desc' => __('Enter the text to be displayed above the portfolio items. ','responsive'),
				'id' => $prefix . 'portfolio_title',
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 3,
				'std'  => '<h1>Show your work with style. Let others appreciate it.</h1>
                <p>Put the best pieces of your work here. Show your talent & inspire others to work with you. Be the agency or freelancer that they are waiting for.</p>',
			),

	),
	'only_on'    => array(
		'template' => array( 'template-portfolio.php' )
	),
);


	// Highlights
	$meta_boxes[] = array(
		'id'         => 'hp_highlights_metabox',
		'title'      => 'Options',
		'pages'      => array( 'hp_highlights', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true,
		'fields'     => array(
			array(
				'name' => __('Icon','responsive'),
				'desc' => __('Enter the icon to be displayed. Optional.','responsive'),
				'id' => $prefix . 'hp_highlights_icon',
				'type' => 'text',
				'std' => '<p><i class="fa fa-fire"></i></p>'
			),
		),
	);

	// Post Type name
	$testimonials_post_type_name = ( bi_get_data('testimonials_post_type_name') ) ? bi_get_data('testimonials_post_type_name') : __('Testimonials','responsive');



		// Testimonials
	$meta_boxes[] = array(
		'id'         => 'hp_testimonials_metabox',
		'title'      => 'Options',
		'pages'      => array( 'testimonials', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true,
		'fields'     => array(
			array(
				'name' => __('Homepage Testimonial','responsive'),
				'desc' => __('Enter the Testimonial to be displayed on the homepage. Optional.','responsive'),
				'id' => $prefix . 'hp_testimonial',
				'type' => 'text',
				'size' => '50',
				'std' => '<h1>Working with Smart was amazing. Their team is incredible.</h1>',
			),

		),
	);


	// Indiviual Services
	$meta_boxes[] = array(
		'id'         => 'services_metabox',
		'title'      => 'Options',
		'pages'      => array( 'services', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true,
		'fields'     => array(
			array(
				'name' => __('Subtitle','responsive'),
				'desc' => __('Enter the text you want displayed under the title of each service. Optional.','responsive'),
				'id' => $prefix . 'service_subtitle',
				'type' => 'text',
				'size' => '50',
				'std' => '<p>The way we work.</p>',
			),

		),
	);


	// Post Type name
	$services_post_type_name = ( bi_get_data('services_post_type_name') ) ? bi_get_data('services_post_type_name') : __('Services','responsive');

// Services
$meta_boxes[] = array(
	'title'  => __( 'Options', 'responsive' ),
	'pages' => array('page'),
	'fields' => array(
			array(
				'name' => __('Title','responsive'),
				'desc' => __('Enter the text to be displayed above the different services. ','responsive'),
				'id' => $prefix . 'service_title',
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 3,
				'std'  => '<h2>Unser <strong>Leitfaden</strong></h2>',
			),
			array(
				'name' => __('Yellow Bar Text','responsive'),
				'desc' => __('Enter the text to be displayed under the services content in the yellow bar. Optional.','responsive'),
				'id' => $prefix . 'yellow_txt',
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 3,
				'std'  => '<h2><strong>Ihre</strong> absolute Zufriedenheit ist unser höchstes Ziel.</h2>',
			),
			array(
				'name' => __('Service Column Title','responsive'),
				'desc' => __('Enter the text to be displayed above the columns. Optional.','responsive'),
				'id' => $prefix . 'service_col_title',
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 3,
				'std'  => '<h2>Was wir für Sie tun können.</h2>',
			),

			array(
				'name' => __('Column Content','responsive'),
				'desc' => __('Enter the text to be displayed under the yellow bar. Optional.','responsive'),
				'id' => $prefix . 'service_col',
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 3,
				'clone' => true,
			),

	),
	'only_on'    => array(
		'template' => array( 'template-service.php' )
	),
);

// Team
$meta_boxes[] = array(
	'title'  => __( 'Options', 'responsive' ),
	'pages' => array('page'),
	'fields' => array(
			array(
				'name' => __('Title','responsive'),
				'desc' => __('Enter the text to be displayed above the main content. ','responsive'),
				'id' => $prefix . 'team_title',
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 3,
				'std'  => '<h2>We are <b>Smart</b>, an Awesome team,<br/> looking for <b>awesome clients</b>.</h2>',
			),
			array(
				'name' => __('Subtitle','responsive'),
				'desc' => __('Enter the text you want displayed under the title of the team page. Optional.','responsive'),
				'id' => $prefix . 'team_subtitle',
				'type' => 'text',
				'size' => '50',
				'std' => '<p>Every agency has their history. This is ours.</p> ',
			),
			array(
				'name' => __('Yellow Bar Text','responsive'),
				'desc' => __('Enter the text to be displayed under the team content in the yellow bar. Optional.','responsive'),
				'id' => $prefix . 'team_yellow_txt',
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 3,
				'std'  => '<h2>Want to know more? Keep reading to learn more about us.</h2>',
			),
			array(
				'name' => __('Service Column Title','responsive'),
				'desc' => __('Enter the text to be displayed above the columns. Optional.','responsive'),
				'id' => $prefix . 'team_col_title',
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 3,
				'std'  => '<h2><strong>Ihre</strong> absolute Zufriedenheit ist unser höchstes Ziel.</h2>',
			),

			array(
				'name' => __('Column Content','responsive'),
				'desc' => __('Enter the text to be displayed under the yellow bar. Optional.','responsive'),
				'id' => $prefix . 'team_col',
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 3,
				'clone' => true,
			),

	),
	'only_on'    => array(
		'template' => array( 'template-team.php' )
	),
);


// Contact
$meta_boxes[] = array(
	'title'  => __( 'Contact Map', 'responsive' ),
	'pages' => array('page'),
	'fields' => array(
			array(
				'name' => __('Map HTML Code','responsive'),
				'desc' => __('Enter the iframe code to display a map. Optional. (Set width to 100% and height to 400px)','responsive'),
				'id' => $prefix . 'contact_map',
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 10,
				'std' => '<iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=New+York,+NY&amp;aq=0&amp;oq=new+york+ne&amp;sll=31.168934,-100.076842&amp;sspn=16.284561,28.103027&amp;t=h&amp;ie=UTF8&amp;hq=&amp;hnear=New+York&amp;z=11&amp;ll=40.714353,-74.005973&amp;output=embed"></iframe>'
			),
	),
	'only_on'    => array(
		'template' => array( 'template-contact.php' )
	),
);


/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function wtf_register_meta_boxes()
{
	global $meta_boxes;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) ) {
		foreach ( $meta_boxes as $meta_box ) {
			if ( isset( $meta_box['only_on'] ) && ! rw_maybe_include( $meta_box['only_on'] ) ) {
				continue;
			}

			new RW_Meta_Box( $meta_box );
		}
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'wtf_register_meta_boxes' );

/**
 * Check if meta boxes is included
 *
 * @return bool
 */
function rw_maybe_include( $conditions ) {
	// Include in back-end only
	if ( ! defined( 'WP_ADMIN' ) || ! WP_ADMIN ) {
		return false;
	}

	// Always include for ajax
	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
		return true;
	}

	if ( isset( $_GET['post'] ) ) {
		$post_id = $_GET['post'];
	}
	elseif ( isset( $_POST['post_ID'] ) ) {
		$post_id = $_POST['post_ID'];
	}
	else {
		$post_id = false;
	}

	$post_id = (int) $post_id;
	$post    = get_post( $post_id );

	foreach ( $conditions as $cond => $v ) {
		// Catch non-arrays too
		if ( ! is_array( $v ) ) {
			$v = array( $v );
		}

		switch ( $cond ) {
			case 'id':
				if ( in_array( $post_id, $v ) ) {
					return true;
				}
			break;
			case 'parent':
				$post_parent = $post->post_parent;
				if ( in_array( $post_parent, $v ) ) {
					return true;
				}
			break;
			case 'slug':
				$post_slug = $post->post_name;
				if ( in_array( $post_slug, $v ) ) {
					return true;
				}
			break;
			case 'template':
				$template = get_post_meta( $post_id, '_wp_page_template', true );
				if ( in_array( $template, $v ) ) {
					return true;
				}
			break;
		}
	}

	// If no condition matched
	return false;
}
?>