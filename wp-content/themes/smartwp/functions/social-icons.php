<?php
// Create Social Array
if ( !function_exists('bi_social_links') ) {
	
	function bi_social_links() {
				
		$social_icons = array('twitter','tumblr','github','instagram','pinterest','dribbble','flickr','google-plus','facebook','linkedin','youtube','rss');		
			
		return apply_filters('bi_social_links', $social_icons);
				
	}
	
}

if ( !function_exists('bi_display_social') ) {
	
	function bi_display_social() {
		
		$bi_social_links = bi_social_links();
		$social_style = ( bi_get_data('social_style') !== 'one' ) ? NULL : '-square';
		
		if ( !$bi_social_links ) return;
		
		$output = '<div class="social-icons">';

				$count=0;		
				foreach ( $bi_social_links as $social_link ) {
				 if(bi_get_data($social_link)) { $count++; }

				$col_num = ( $count == '1' ) ? 'col-lg-offset-2' : NULL;
				
					if ( bi_get_data($social_link) ) {
					
						$output .= '<div class="col-lg-2 '.$col_num.'"><a href="'. bi_get_data($social_link) .'" title="'. $social_link .'" target="_blank">
						<i class="fa fa-'.$social_link.''.$social_style.'"></i></a></div>';
					
					}
					if( $count == '4' ) { $count=0; }
				}
				
		$output .= '</div><!-- #social -->';
		
		echo apply_filters('bi_display_social', $output);
	}
	
}