<?php
/**
 * Registers custom post types for use with this theme
 *
 * @package WordPress
*/

add_action( 'init', 'bi_create_post_types' );

if ( !function_exists('bi_create_post_types') ) {
	
	function bi_create_post_types() {
		  
		  
		/******* Home Highlights Post Type *******/
		register_post_type( 'hp_highlights',
			array(
			  'labels' => array(
				'name' => __( 'HP Highlights', 'responsive' ),
				'singular_name' => __( 'Highlight', 'responsive' ),		
				'add_new' => _x( 'Add New', 'Highlight', 'responsive' ),
				'add_new_item' => __( 'Add New Highlight', 'responsive' ),
				'edit_item' => __( 'Edit Highlight', 'responsive' ),
				'new_item' => __( 'New Highlight', 'responsive' ),
				'view_item' => __( 'View Highlight', 'responsive' ),
				'search_items' => __( 'Search Highlights', 'responsive' ),
				'not_found' =>  __( 'No Highlights found', 'responsive' ),
				'not_found_in_trash' => __( 'No Highlights found in Trash', 'responsive' ),
				'parent_item_colon' => ''
				
			  ),
			  'public' => true,
			  'supports' => array('title','editor','thumbnail','revisions','custom-fields'),
			  'query_var' => true,
			  'rewrite' => array( 'slug' => 'hp-highlights' ),
			  'has_archive' => false,
			  'show_in_nav_menus' => false,
			  'menu_icon' => get_template_directory_uri() . '/images/admin/icon-highlights.png',
			)
		  );
	
	
	
		/******* Portfolio Post Type *******/
	
		$portfolio_slug = ( bi_get_data('portfolio_post_type_slug') ) ? bi_get_data('portfolio_post_type_slug') : 'portfolio';
		$portfolio_post_type_name = ( bi_get_data('portfolio_post_type_name') ) ? bi_get_data('portfolio_post_type_name') : __('Portfolio','responsive');
		$portfolio_labels = array( 'name' => $portfolio_post_type_name );
		
		register_post_type( 'Portfolio',
			array(
			  'labels' => apply_filters('bi_portfolio_labels', $portfolio_labels),
			  'public' => true,
			  'has_archive' => false,
			  'supports' => array('title','editor','thumbnail','revisions','comments','custom-fields'),
			  'query_var' => true,
			  'rewrite' => array( 'slug' => $portfolio_slug ),
			  'menu_icon' => get_template_directory_uri() . '/images/admin/icon-portfolio.png',
			)
		  );
	  
		  
		  	  
		/******* Services Post Type *******/
		
		$services_slug = ( bi_get_data('services_post_type_slug') ) ? bi_get_data('services_post_type_slug') : 'services';
		$services_post_type_name = ( bi_get_data('services_post_type_name') ) ? bi_get_data('services_post_type_name') : __('Services','responsive');
		$services_labels = array( 'name' => $services_post_type_name );
		
		register_post_type( 'services',
			array(
			  'labels' => apply_filters('bi_service_labels', $services_labels),
			  'public' => true,
			  'has_archive' => false,
			  'supports' => array('title','editor','revisions','thumbnail','custom-fields','comments'),
			  'menu_icon' => get_template_directory_uri() . '/images/admin/icon-services.png',
			  'query_var' => true,
			  'rewrite' => array( 'slug' => $services_slug ),
			)
		);
		
		
		/******* Testimonials Post Type *******/
		
		$testimonials_slug = ( bi_get_data('testimonials_post_type_slug') ) ? bi_get_data('testimonials_post_type_slug') : 'testimonials';
		$testimonials_post_type_name = ( bi_get_data('testimonials_post_type_name') ) ? bi_get_data('testimonials_post_type_name') : __('Testimonials','responsive');
		$testimonials_labels = array( 'name' => $testimonials_post_type_name );
		
		register_post_type( 'testimonials',
			array(
			  'labels' => apply_filters('bi_testimonials_labels', $testimonials_labels),
			  'public' => true,
			  'has_archive' => false,
			  'supports' => array('title', 'revisions','comments'),
			  'menu_icon' => get_template_directory_uri() . '/images/admin/icon-testimonials.png',
			  'query_var' => true,
			  'rewrite' => array( 'slug' => $testimonials_slug ),
			)
		  );

			/******* Clients Post Type *******/
		
		$clients_slug = ( bi_get_data('clients_post_type_slug') ) ? bi_get_data('clients_post_type_slug') : 'clients';
		$clients_post_type_name = ( bi_get_data('clients_post_type_name') ) ? bi_get_data('clients_post_type_name') : __('Clients','responsive');
		$clients_labels = array( 'name' => $clients_post_type_name );
		
		register_post_type( 'clients',
			array(
			  'labels' => apply_filters('bi_clients_labels', $clients_labels),
			  'public' => true,
			  'has_archive' => false,
			  'supports' => array('title', 'thumbnail', 'revisions','comments'),
			  'menu_icon' => get_template_directory_uri() . '/images/admin/icon-staff.png',
			  'query_var' => true,
			  'rewrite' => array( 'slug' => $clients_slug ),
			)
		  );
	
	}
}