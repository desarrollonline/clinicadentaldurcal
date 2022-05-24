<?php
// @author: Orion Themes

/********************************************************************/
/*****************         Site Origin panels       *****************/
/********************************************************************/

/*no row bottom margin */
add_action( 'after_setup_theme', 'orion_panel_setup' );

function orion_panel_setup() { 
	add_theme_support( 'siteorigin-panels', array(
		'margin-bottom' => '0',
		'padding-bottom' => '24px',
		'padding-top' => '24px',
	) );
}

/********************************************************************/
/*  						Row attributes							*/
/********************************************************************/
if(!function_exists('orion_custom_row_style_attributes_paralax')) {
	function orion_custom_row_style_attributes_paralax( $attributes, $args ) {

	    /*Bottom to top parallax*/
	    if (isset($args['background_display']) && $args['background_display'] == 'para-bottom') {
	    	array_push($attributes['class'], 'vertical_up');
	    	array_push($attributes['class'], 'orion-parallax');
	    }
	    /*Bottom to top parallax*/
	    if (isset($args['background_display']) && $args['background_display'] == 'para-top') {
	    	array_push($attributes['class'], 'vertical_down');
	    	array_push($attributes['class'], 'orion-parallax');
	    }	    
	    /*Bottom to top parallax*/
	    if (isset($args['background_display']) && $args['background_display'] == 'para-left') {
	    	array_push($attributes['class'], 'horizontal_left');
	    	array_push($attributes['class'], 'orion-parallax');
	    }
	    /*Bottom to top parallax*/
	    if (isset($args['background_display']) && $args['background_display'] == 'para-right') {
	    	array_push($attributes['class'], 'horizontal_right');
	    	array_push($attributes['class'], 'orion-parallax');
	    }
	    /* Additional style options
	    /*this isn't exactly for parallax, but just a fixed backround*/
	    if (isset($args['background_display']) && $args['background_display'] == 'fixed') {
	    	array_push($attributes['class'], 'fixed-bg');
	    }		  	    	    	    
	    return $attributes;   
	}
}	
add_filter('siteorigin_panels_row_style_attributes', 'orion_custom_row_style_attributes_paralax', 1, 2);
add_filter('siteorigin_panels_cell_style_attributes', 'orion_custom_row_style_attributes_paralax', 1, 2);

if(!function_exists('orion_add_row_stretch_style')) {
	function orion_add_row_stretch_style( $form_options, $fields ) {
		$form_options["row_stretch"]["options"]['standard-no-padding'] = esc_html__('Standard, no padding', 'dentalia');
		$form_options["row_stretch"]["options"]['padding-5'] = esc_html__('Stretched, with padding ', 'dentalia');
		return $form_options;
	}
}	
/* Depreciated 15.5.2020, left for compatibility reasons */
// add_filter('siteorigin_panels_row_style_fields', 'orion_add_row_stretch_style', 10, 2);
		
if(!function_exists('orion_add_row_bg_styles')) {
	function orion_add_row_bg_styles( $form_options, $fields ) {
		//paralax styles
		$form_options['background_display']['options']['fixed'] = esc_html__('Fixed', 'dentalia');
		$form_options['background_display']['options']['para-bottom'] = esc_html__( 'Parallax Top to bottom', 'dentalia' );
		$form_options['background_display']['options']['para-top'] = esc_html__( 'Parallax Bottom to top', 'dentalia' );
		$form_options['background_display']['options']['para-left'] = esc_html__( 'Parallax Right to left', 'dentalia' );
		$form_options['background_display']['options']['para-right'] = esc_html__( 'Parallax Left to right', 'dentalia' );

		//additional styles: 
		$form_options['background_display']['options']['cover-center'] = esc_html__( 'Cover - center', 'dentalia' );
		$form_options['background_display']['options']['bg-cover-golden'] = esc_html__( 'Cover - golden section', 'dentalia' );
		$form_options['background_display']['options']['right-top'] = esc_html__( 'Top, Right (original size)', 'dentalia' );
		$form_options['background_display']['options']['right-bottom'] = esc_html__( 'Bottom, Right (original size)', 'dentalia' );
		$form_options['background_display']['options']['left-bottom'] = esc_html__( 'Bottom, Left (original size)', 'dentalia' );
		$form_options['background_display']['options']['left-top'] = esc_html__( 'Top, Left (original size)', 'dentalia' );
		$form_options['background_display']['options']['responsive-fit'] = esc_html__( 'Responsive Fit', 'dentalia' );
		$form_options['background_display']['options']['contain-left'] = esc_html__( 'Contain Left', 'dentalia' );
		$form_options['background_display']['options']['contain-center'] = esc_html__( 'Contain Center', 'dentalia' );
		$form_options['background_display']['options']['contain-right'] = esc_html__( 'Contain Right', 'dentalia' );

		return $form_options;
	}
}	
add_filter('siteorigin_panels_row_style_fields', 'orion_add_row_bg_styles', 10, 2);
add_filter('siteorigin_panels_cell_style_fields', 'orion_add_row_bg_styles', 10, 2);
add_filter('siteorigin_panels_widget_style_fields', 'orion_add_row_bg_styles', 10, 2);

/********************************************************************/
/*						Background positions						*/
/********************************************************************/
if(!function_exists('orion_dumprowdata')) {
	function orion_dumprowdata( $attributes, $args ) {
	 
	    if (isset($args['background_display'])) {

	    	$style_css = $attributes["style"];

	    	switch ($args['background_display']) {
	    		case 'right-top':
	    		$style_css .= 'background-position: right top; background-repeat: no-repeat;';
	    			break;
	    		case 'left-top':
	    		$style_css .= 'background-position: left top; background-repeat: no-repeat;';
	    			break;
	    		case 'right-bottom':
	    		$style_css .= 'background-position: right bottom; background-repeat: no-repeat;';
	    			break;
	    		case 'left-bottom':
	    		$style_css .= 'background-position: left bottom; background-repeat: no-repeat;';
	    			break;
	    		case 'responsive-fit':
	    		array_push($attributes['class'], 'responsive-fit');
	    			break;
	    		case 'bg-cover-golden':
	    		array_push($attributes['class'], 'bg-cover-golden');
	    			break;	    			
	    		case 'contain-left':
	    		$style_css .= 'background-position: left bottom; background-repeat: no-repeat; background-size:contain;';
	    			break;
	    		case 'contain-center':
	    		$style_css .= 'background-position: center center; background-repeat: no-repeat; background-size:contain;';
	    			break;	    			
	    		case 'contain-right':
	    		$style_css .= 'background-position: right bottom; background-repeat: no-repeat; background-size:contain;';
	    			break;
	    		case 'cover-center':
	    		$style_css .= 'background-position: center center; background-repeat: no-repeat; background-size:cover;';
	    			break;
	    	}
	    	$attributes["style"] = $style_css;
	    }
		return $attributes; 	    
	}
}	
add_filter('siteorigin_panels_row_style_attributes', 'orion_dumprowdata', 20, 2);
add_filter('siteorigin_panels_cell_style_attributes', 'orion_dumprowdata', 20, 2);
add_filter('siteorigin_panels_widget_style_attributes', 'orion_dumprowdata', 20, 2);

/********************************************************************/
/*								Separators							*/
/********************************************************************/

function orion_separator_group( $groups ) {
    $groups['separators'] = array(
    	'name' => esc_html__('Separators', 'dentalia'),
   	 	'priority' => 30
    );
    return $groups;
}
add_filter( 'siteorigin_panels_row_style_groups', 'orion_separator_group', 2, 3 );

if(!function_exists('orion_separator_row_style_fields')) {
	function orion_separator_row_style_fields($fields) {

		$fields['separator_top'] = array(
	    	'name' => esc_html__('Top Separator', 'dentalia'),
	        'type' => 'select',
	        'group' => 'separators',
	        'description' => esc_html__('Will add a separator to the row.', 'dentalia'),
	        'default' => 'none',
	        'options' => array(
	        	'none' => esc_html__( 'None', 'dentalia' ),
	            'top-svg-3' => esc_html__( 'Arc', 'dentalia' ),
	            'top-svg-1' => esc_html__( 'Arrow', 'dentalia' ),
	            'top-svg-9' => esc_html__( 'Book', 'dentalia' ),
	            'top-svg-8' => esc_html__( 'Clouds', 'dentalia' ),
	            'top-svg-13' => esc_html__( 'Flow', 'dentalia' ), 
	            'top-svg-5' => esc_html__( 'Frill', 'dentalia' ),    
	            'top-svg-2' => esc_html__( 'Half Circle', 'dentalia' ),
	             'top-svg-6' => esc_html__( 'Lift', 'dentalia' ),
	            'top-svg-10' => esc_html__( 'Torn Paper', 'dentalia' ),
	            'top-svg-7' => esc_html__( 'Triangle', 'dentalia' ),
	            'top-svg-12' => esc_html__( 'Violin', 'dentalia' ),
	            'top-svg-11' => esc_html__( 'Wave', 'dentalia' ),
	            'top-svg-4' => esc_html__( 'Zigzag', 'dentalia' ),
	                       
	        ),
	        'priority' =>  '99'
		);

		$fields['separator_top_color'] = array(
	    	'name'      => esc_html__('Top Separator color', 'dentalia'),
	        'type' 		=> 'color',
	        'group'     => 'separators',
	        'description' => esc_html__('Choose a color', 'dentalia'),
	        'priority' =>  '101'
		);
		$fields['separator_top_position'] = array(
	    	'name' => esc_html__('Top Separator position', 'dentalia'),
	        'type' => 'select',
	        'group' => 'separators',
	        'description' => esc_html__('Will add a separator to the row.', 'dentalia'),
	        'default' => 'top-svg-inside',
	        'options' => array(
	            'top-svg-outside' => esc_html__( 'outside row', 'dentalia' ),
	            'top-svg-inside' => esc_html__( 'inside row', 'dentalia' ),
	        ),
	        'priority' =>  '102'
		);				
		$fields['separator_bottom'] = array(
	    	'name'        => esc_html__('Bottom Separator', 'dentalia'),
	        'type' => 'select',
	        'group'       => 'separators',
	        'description' => esc_html__('Will add a separator to the row.', 'dentalia'),
	        'default' => 'none',
	        'options' => array(
	        	'none' => esc_html__( 'None', 'dentalia' ),
	            'bottom-svg-3' => esc_html__( 'Arc', 'dentalia' ),
	            'bottom-svg-1' => esc_html__( 'Arrow', 'dentalia' ),
	            'bottom-svg-9' => esc_html__( 'Book', 'dentalia' ),
	            'bottom-svg-8' => esc_html__( 'Clouds', 'dentalia' ),
	            'bottom-svg-13' => esc_html__( 'Flow', 'dentalia' ),
	            'bottom-svg-5' => esc_html__( 'Frill', 'dentalia' ),
	            'bottom-svg-2' => esc_html__( 'Half Circle', 'dentalia' ),
	            'bottom-svg-6' => esc_html__( 'Lift', 'dentalia' ),	            
	            'bottom-svg-10' => esc_html__( 'Torn Paper', 'dentalia' ),
	            'bottom-svg-7' => esc_html__( 'Triangle', 'dentalia' ),
	            'bottom-svg-12' => esc_html__( 'Violin', 'dentalia' ),
	            'bottom-svg-11' => esc_html__( 'Wave', 'dentalia' ),
	            'bottom-svg-4' => esc_html__( 'Zigzag', 'dentalia' ),
	            
	        ),
	        'priority' =>  '103'
		);
		$fields['separator_bottom_color'] = array(
	    	'name'      => esc_html__('Bottom Separator color', 'dentalia'),
	        'type' 		=> 'color',
	        'group'     => 'separators',
	        'description' => esc_html__('Choose a color', 'dentalia'),
	        'priority' =>  '106'
		);		
		$fields['separator_bottom_position'] = array(
	    	'name'      => esc_html__('Bottom Separator position', 'dentalia'),
	        'type' 		=> 'select',
	        'group'     => 'separators',
	        'description' => esc_html__('Will add a separator to the row.', 'dentalia'),
	        'default' => 'bottom-svg-inside',
	        'options' => array(
	            'bottom-svg-outside' => esc_html__( 'outside row', 'dentalia' ),
	            'bottom-svg-inside' => esc_html__( 'inside row', 'dentalia' ),
	        ),
	        'priority' =>  '107'
		);	

		$fields['separator_animation'] = array(
		  'label' => esc_html__('Animate separators', 'dentalia'),
		  'type'        => 'checkbox',
		  'group'       => 'separators',
		  'default' => false,
		  'priority'    => '110',
		);
		$fields['separator_responsive'] = array(
		  'label' => esc_html__('Disable responsive scaling', 'dentalia'),
		  'type'        => 'checkbox',
		  'group'       => 'separators',
		  'default' => false,
		  'description' => esc_html__('Prevent addapting separator size to screen size.', 'dentalia'),
		  'priority'    => '111',
		);
		$fields['separators_on_mobile'] = array(
	    	'name' => esc_html__('Display separators on mobile', 'dentalia'),
	        'type' => 'select',
	        'group' => 'separators',
	        'default' => 'display_separators_mobile',
	        'options' => array(
	            'display_separators_mobile' => esc_html__( 'Display', 'dentalia' ),
	            'hide_separators_mobile' => esc_html__( 'Hide', 'dentalia' ),
	        ),
	        'priority' =>  '112',
		);			
	return $fields;
	}
}
add_filter( 'siteorigin_panels_row_style_fields', 'orion_separator_row_style_fields', 10, 2 );


if(!function_exists('orion_custom_row_style_attributes')) {
	function orion_custom_row_style_attributes( $attributes, $args ) {
		if ( (!empty($args['separator_top']) && $args['separator_top']!= 'none') || (!empty($args['separator_bottom']) && $args['separator_bottom']!= 'none' )) {
			array_push($attributes['class'], 'orion-separator');
		}
	    if( !empty( $args['separator_top'] ) && ($args['separator_top']!= 'none') ) {
	        array_push($attributes['class'], $args['separator_top']);
	        array_push($attributes['class'], $args['separator_top_position']);
	    } 
	    if( !empty( $args['separator_bottom'] ) && ($args['separator_bottom']!= 'none') ) {   
	        array_push($attributes['class'], $args['separator_bottom']);
	        array_push($attributes['class'], $args['separator_bottom_position']);
	    }
	    if ( !empty( $args['orion_theme_colors_separator_bottom'] ) && $args['orion_theme_colors_separator_bottom'] != 'custom') {
 			$attributes['data-svg-bottom-color'] = $args['orion_theme_colors_separator_bottom'];
	    } else if( !empty( $args['separator_bottom_color'] ) && ($args['separator_bottom_color']!= 'none') ) {   
	        $attributes['data-svg-bottom-color'] = $args['separator_bottom_color'];	
	    }
	    if ( !empty( $args['orion_theme_colors_separator_top'] ) && $args['orion_theme_colors_separator_top'] != 'custom') {
 			$attributes['data-svg-top-color'] = $args['orion_theme_colors_separator_top'];
	    } else if( !empty( $args['separator_top_color'] ) && ($args['separator_top_color']!= 'none') ) {   
	        $attributes['data-svg-top-color'] = $args['separator_top_color'];
	    }
		if( !empty( $args['separators_on_mobile'] ) && $args['separators_on_mobile'] != 'display_separators_mobile') {
		    array_push($attributes['class'], $args['separators_on_mobile']);
		}
		if( !empty( $args['separator_responsive'] )) {
		    array_push($attributes['class'], 'divider-notresponsive');
		}		
		if( empty( $args['separator_animation'] )) {
		    array_push($attributes['class'], 'divider-no-animation');
		}
	    return $attributes;
	}
}	
add_filter('siteorigin_panels_row_style_attributes', 'orion_custom_row_style_attributes', 10, 2);

/********************************************************************/
/*							Responsive options  					*/
/********************************************************************/

function orion_responsive_group( $groups ) {
    $groups['responsive'] = array(
    	'name' => esc_html__('Tablet Layout', 'dentalia'),
   	 	'priority' => 10
    );
    return $groups;
}
add_filter( 'siteorigin_panels_row_style_groups', 'orion_responsive_group', 2, 3 );
add_filter('siteorigin_panels_widget_style_groups', 'orion_responsive_group', 2, 3);
add_filter('siteorigin_panels_cell_style_groups', 'orion_responsive_group', 2, 3);

if(!function_exists('orion_responsive_row_style_fields_responsive_options')) {
	function orion_responsive_row_style_fields_responsive_options($fields) {
		$fields['mobile'] = array(
		    	'name'        => esc_html__('Mobile display', 'dentalia'),
		        'type' => 'select',
		        'group'       => 'mobile_layout',
		        'description' => esc_html__('Defines behaviour of the row on small (mobile) displays.', 'dentalia'),
		        'default' => 'mobile-default',
		        'options' => array(
		        	'mobile-default' => esc_html__( 'Default', 'dentalia' ),
		        	'mobile-1-in-row' => esc_html__( '1 column', 'dentalia' ),
		            'mobile-2-in-row' => esc_html__( '2 columns', 'dentalia' ),
		            'hidden-xs' => esc_html__( 'Hide', 'dentalia' ),
		        ),
		        'priority' =>  '100'
		);
		$fields['tablet'] = array(
		    	'name'      => esc_html__('Tablet display', 'dentalia'),
		        'type' 		=> 'select',
		        'group'     => 'responsive',
		        'description' => esc_html__('Defines behaviour of the row on Tablet devices.', 'dentalia'),
		        'default' => 'tablet-default',
		        'options' => array(
		            'tablet-default' => esc_html__( 'Same as desktop', 'dentalia' ),
		            'tablet-1-in-row' => esc_html__( '1 column', 'dentalia' ),
		            'tablet-2-in-row' => esc_html__( '2 column', 'dentalia' ),
		            'tablet-3-in-row' => esc_html__( '3 column', 'dentalia' ),
		            'tablet-4-in-row' => esc_html__( '4 column', 'dentalia' ),
		            'hidden-sm' => esc_html__( 'Hide', 'dentalia' ),
		        ),
		        'priority' =>  '101'
		);
		$fields['desktop'] = array(
		    	'name'      => esc_html__('Desktop display', 'dentalia'),
		        'type' 		=> 'select',
		        'group'     => 'layout',
		        'description' => esc_html__('Defines behaviour of the row on Desktop devices.', 'dentalia'),
		        'default' => 'desktop-default',
		        'options' => array(
		            'desktop-default' => esc_html__( 'Default', 'dentalia' ),
		            'desktop-1-in-row' => esc_html__( '1 column', 'dentalia' ),
		            'desktop-2-in-row' => esc_html__( '2 column', 'dentalia' ),
		            'desktop-3-in-row' => esc_html__( '3 column', 'dentalia' ),
		            'desktop-4-in-row' => esc_html__( '4 column', 'dentalia' ),
		            'hidden-md-lg' => esc_html__( 'Hide', 'dentalia' ),
		        ),
		        'priority' =>  '102'
		);
		$fields['full_width_small'] = array(
		  'name'        => esc_html__('Stretch on mobile', 'dentalia'),
		  'type'        => 'checkbox',
		  'group'       => 'mobile_layout',
		  'description' => esc_html__('Removes side margins and stretches the content', 'dentalia'),
		  'priority'    => 102,
		);
		$fields['full_width_tablets'] = array(
		  'name'        => esc_html__('Stretch on tablet', 'dentalia'),
		  'type'        => 'checkbox',
		  'group'       => 'responsive',
		  'description' => esc_html__('Removes side margins and stretches the content', 'dentalia'),
		  'priority'    => 102,
		);
	return $fields;
	}
}
add_filter( 'siteorigin_panels_row_style_fields', 'orion_responsive_row_style_fields_responsive_options', 10, 2 );


if(!function_exists('orion_widget_hide_on_mobile_checkbox')) {
	function orion_widget_hide_on_mobile_checkbox($fields) {
		$fields['hide_mobile'] = array(
		  'name'        => esc_html__('Hide on Mobile', 'dentalia'),
		  'type'        => 'checkbox',
		  'group'       => 'mobile_layout',
		  'description' => esc_html__('The widget will be hidden on mobile.', 'dentalia'),
		  'priority'    => 103,
		);
		$fields['hide_tablet'] = array(
		  'name'        => esc_html__('Hide on Tablet', 'dentalia'),
		  'type'        => 'checkbox',
		  'group'       => 'responsive',
		  'description' => esc_html__('The widget will be hidden on tablet.', 'dentalia'),
		  'priority'    => 103,
		);		
		return $fields;
	}
}
add_filter( 'siteorigin_panels_widget_style_fields', 'orion_widget_hide_on_mobile_checkbox', 10, 2);

if(!function_exists('orion_hide_widget_mobile')) {
	function orion_hide_widget_mobile( $attributes, $args ) {

		if (!empty($args['hide_mobile']) && $args['hide_mobile'] == true) {
			// $add_class = 'hidden-sm';
			$add_class = 'hidden-xs';
			
			$attributes['class'][] = $add_class;
		}
		if (!empty($args['hide_tablet']) && $args['hide_tablet'] == true) {
			$add_class_t = 'hidden-sm';			
			$attributes['class'][] = $add_class_t;
		}		
		return $attributes;

	}
}
add_filter('siteorigin_panels_widget_style_attributes', 'orion_hide_widget_mobile', 10, 2);


if(!function_exists('orion_custom_row_style_attributes_responsive_options')) {
	function orion_custom_row_style_attributes_responsive_options( $attributes, $args ) {
		if (!empty($args['tablet']) && $args['tablet']!= 'none') {
			array_push($attributes['class'], $args['tablet']);
		}
		if (!empty($args['mobile']) && $args['mobile']!= 'none') {
			array_push($attributes['class'], $args['mobile']);
		}
		if (!empty($args['desktop']) && $args['desktop']!= 'none') {
			array_push($attributes['class'], $args['desktop']);
		}		
		if (!empty($args['full_width_small']) && $args['full_width_small']== 'true') {
			array_push($attributes['class'], 'full-width-on-small-devices');
		}
		if (!empty($args['full_width_tablets']) && $args['full_width_tablets']== 'true') {
			array_push($attributes['class'], 'full-width-on-tablets');
		}		
	    return $attributes;
	}
}	
add_filter('siteorigin_panels_row_style_attributes', 'orion_custom_row_style_attributes_responsive_options', 10, 2);


/********************************************************************/
/*						END Responsive options  					*/
/********************************************************************/
/********************************************************************/
/*						Row Position  								*/
/********************************************************************/

if(!function_exists('orion_row_position')) {
	function orion_row_position($fields) {

		$fields['row_position'] = array(
	    	'name'      => esc_html__('Row Position', 'dentalia'),
	        'type' 		=> 'select',
	        'group'     => 'layout',
	        'default' => 'default',
	        'options' => array(
	            'default' => esc_html__( 'Default', 'dentalia' ),
	            'push-up-row' => esc_html__( 'Push up 100%', 'dentalia' ),		            
	            'row-divide' => esc_html__( 'Push up 50%', 'dentalia' ),
	            'push-up-120' => esc_html__( 'Push up 120px', 'dentalia' ),
	            'push-up-60' => esc_html__( 'Push up 60px', 'dentalia' ),
	        ),
	        'priority' =>  100,
		);
		$fields['row_zindex'] = array(
			'name'      => esc_html__('Z-index', 'dentalia'),
			'type' 		=> 'text',
			'group'     => 'attributes',
			'sanitize' 	=> 'number',
			'priority' =>  105,
		);
		return $fields;
	}
}
add_filter('siteorigin_panels_row_style_fields', 'orion_row_position', 10, 2);

function orion_row_position_class( $attributes, $args ) {
    if( !empty( $args['row_position'] ) && $args['row_position'] != 'default' ) {
        array_push($attributes['class'], $args['row_position']);
    }
    if( isset( $args['row_zindex'] ) && !empty( $args['row_zindex'] ) && is_numeric($args['row_zindex'])) {
        $attributes['data-z-index'] = $args['row_zindex'];

    	$style_css = $attributes["style"];
   		$style_css .= 'z-index:' . $args['row_zindex'] . ';';        
        $attributes['style'] = $style_css;
    }    
    return $attributes;
}

add_filter('siteorigin_panels_row_style_attributes', 'orion_row_position_class', 10, 2);


/********************************************************************/
/*						Cell Position  								*/
/********************************************************************/

if(!function_exists('orion_cell_position')) {
	function orion_cell_position($fields) {

		$fields['cell_position'] = array(
	    	'name'      => esc_html__('Cell Position', 'dentalia'),
	        'type' 		=> 'select',
	        'group'     => 'layout',
	        'description' => esc_html__('Change cell position.', 'dentalia'),
	        'default' => 'default',
	        'options' => array(
	            'default' => esc_html__( 'Default', 'dentalia' ),
	            'push-up-60' => esc_html__( 'Push up 60px', 'dentalia' ),
	            'push-up-120' => esc_html__( 'Push up 120px', 'dentalia' ),
	            'push-down-60' => esc_html__( 'Push down 60px', 'dentalia' ),
	            'push-down-120' => esc_html__( 'Push down 120px', 'dentalia' ),	            
	        ),
	        'priority' =>  100,
		);
		return $fields;
	}
}
add_filter('siteorigin_panels_cell_style_fields', 'orion_cell_position', 10, 2);
function orion_cell_position_class( $attributes, $args ) {
    if( !empty( $args['cell_position'] ) && $args['cell_position'] != 'default' ) {
        array_push($attributes['class'], $args['cell_position']);
    }
    return $attributes;
}
add_filter('siteorigin_panels_cell_style_attributes', 'orion_cell_position_class', 10, 2);


/********************************************************************/
/*						Full screen option 	(row)					*/
/********************************************************************/

function orion_fullscreen_checkbox($fields) {
  $fields['full_screen'] = array(
      'name'        => esc_html__('Fullscreen row (desktop)', 'dentalia'),
      'type'        => 'checkbox',
      'group'       => 'layout',
      'description' => esc_html__('The height of the row will adapt to the height of the screen.', 'dentalia'),
      'priority'    => 103,
  );
  return $fields;
}
add_filter( 'siteorigin_panels_row_style_fields', 'orion_fullscreen_checkbox', 10, 2);

function orion_fullscreen_layout( $attributes, $args ) {
    if( !empty( $args['full_screen'] ) && $args['full_screen'] == '1' ) {
        array_push($attributes['class'], 'full-screen-row');
    }
    return $attributes;
}
add_filter('siteorigin_panels_row_style_attributes', 'orion_fullscreen_layout', 10, 2);

/********************************************************************/
/*						text color / rows   						*/
/********************************************************************/

if(!function_exists('orion_row_text_style')) {
	function orion_row_text_style($fields) {

		$fields['text_style'] = array(
	    	'name'      => esc_html__('Text color', 'dentalia'),
	        'type' 		=> 'select',
	        'group'     => 'design',
	        'description' => esc_html__('Text color.', 'dentalia'),
	        'default' => 'default',
	        'options' => array(
	            'default' => esc_html__( 'Default', 'dentalia' ),
	            'text-dark' => esc_html__( 'Dark text', 'dentalia' ),
	            'text-light' => esc_html__( 'Light text', 'dentalia' ),
	        ),
	        'priority' =>  '101'
		);
		return $fields;
	}
}
add_filter('siteorigin_panels_row_style_fields', 'orion_row_text_style', 10, 2);

function orion_row_text_style_class( $attributes, $args ) {
    if( !empty( $args['text_style'] ) && $args['text_style'] != 'default' ) {
        array_push($attributes['class'], $args['text_style']);
    }
    return $attributes;
}
add_filter('siteorigin_panels_row_style_attributes', 'orion_row_text_style_class', 10, 2);

/********************************************************************/
/*						text color / Widget  						*/
/********************************************************************/

add_filter('siteorigin_panels_widget_style_fields', 'orion_row_text_style', 10);

function orion_cell_text_style_class( $attributes, $args) {
	if (!empty($args["text_style"])) {
		$add_class = $args["text_style"];
		$attributes['class'][] = $add_class;
	}
	return $attributes;
}
add_filter('siteorigin_panels_widget_style_attributes', 'orion_cell_text_style_class', 20, 2);


/********************************************************************/
/*						Center on mobile / Widget  						*/
/********************************************************************/

if(!function_exists('orion_text_center_on_mobile')) {
	function orion_text_center_on_mobile($fields) {

		$fields['center_on_mobile'] = array(
		    	'name'      => esc_html__('Center on Mobile', 'dentalia'),
		        'type' 		=> 'checkbox',
		        'group'     => 'mobile_layout',
		        'default' => false,
		        'priority' =>  '101'
		);
		$fields['center_on_tablets'] = array(
		    	'name'      => esc_html__('Center on Tablet', 'dentalia'),
		        'type' 		=> 'checkbox',
		        'group'     => 'responsive',
		        'default' => false,
		        'priority' =>  '101'
		);		
		return $fields;
	}
}
add_filter('siteorigin_panels_widget_style_fields', 'orion_text_center_on_mobile', 10, 2);

function orion_text_center_mobile_html_class( $attributes, $args ) {
    if( !empty($args['center_on_mobile']) && $args['center_on_mobile'] == true ) {
	    $attributes['class'][] = 'mobile-text-center';
    }
    if( !empty($args['center_on_tablets']) && $args['center_on_tablets'] == true ) {
	    $attributes['class'][] = 'tablets-text-center';
    }    
    return $attributes;
}

add_filter('siteorigin_panels_widget_style_attributes', 'orion_text_center_mobile_html_class', 11, 2);


/********************************************************************/
/*					shadows and borders / Widget  					*/
/********************************************************************/

if(!function_exists('orion_widget_shadow')) {
	function orion_widget_shadow($fields) {

		$fields['widget_shadow'] = array(
		    	'name'      => esc_html__('Drop Shadow Effect', 'dentalia'),
		        'type' 		=> 'select',
		        'group'     => 'design',
		        'description' => esc_html__('Add shadow to the widget.', 'dentalia'),
		        'default' => 'none',
		        'options' => array(
		            'none' => esc_html__( 'None', 'dentalia' ),
		            'shadow-1' => esc_html__( 'Raised Box', 'dentalia' ),
		            'shadow-2' => esc_html__( 'Lifted Corners', 'dentalia' ),
		            'shadow-3' => esc_html__( 'Horizontal Curves', 'dentalia' ),
		            'shadow-4' => esc_html__( 'Smooth', 'dentalia' ),
		        ),
		        'priority' =>  '101'
		);

		$fields['widget_border_radius'] = array(
		    	'name'      => esc_html__('Border radius', 'dentalia'),
		        'type' => 'measurement',
		        'group'     => 'design',
		        'label' => esc_html__( 'Add rounded corners.', 'dentalia' ),
		        'priority' =>  '8'
		);
		return $fields;
	}
}
add_filter('siteorigin_panels_widget_style_fields', 'orion_widget_shadow', 10, 2);

function orion_cell_shadow_class( $attributes, $args) {
	if (!empty($args["widget_shadow"]) && $args["widget_shadow"]!= 'none') {
		$add_class = $args["widget_shadow"];
		$attributes['class'][] = $add_class;

		if ($args["widget_shadow"] == 'shadow-2' || $args["widget_shadow"] == 'shadow-3') { 
			$style_css = $attributes["style"];
			preg_match("/background-color:(.*?);/", $style_css, $preg_match_result);
			if( count( $preg_match_result ) == 0 ) {
				// add bg color:
				$style_css .= 'background-color: #fff;';
		    }		
		    $attributes["style"] = $style_css;	
	    }	
	}
	if (!empty($args["widget_border_radius"]) && $args["widget_border_radius"] != 0) {
		$style_css = $attributes["style"];
		$style_css .= 'border-radius:' .$args["widget_border_radius"] .';';
		$attributes["style"] = $style_css;
	}	
	return $attributes;
}

add_filter('siteorigin_panels_widget_style_attributes', 'orion_cell_shadow_class', 20, 2);

/********************************************************************/
/*						remove cell side padding					*/
/********************************************************************/
if(!function_exists('orion_remove_side_padding_mobile')) {
	function orion_remove_side_padding_mobile($fields) {

		/* depreciated, left  commented out for compatibility reasons 6.5.2020 */
		/*	$fields['remove_padding_mobile'] = array(
	    	'name'      => esc_html__('Remove side padding on small devices', 'dentalia'),
	        'type' 		=> 'checkbox',
	        'group'     => 'mobile_layout',
	        'default' => false,
	        'priority' =>  '101'
		); */

		$fields['remove_margin_mobile'] = array(
	    	'name'      => esc_html__('Stretch on Mobile', 'dentalia'),
	    	'description' => esc_html__('Removes side margins on mobile.', 'dentalia'),
	        'type' 		=> 'checkbox',
	        'group'     => 'mobile_layout',
	        'default' => false,
	        'priority' =>  '102'
		);		
		$fields['remove_margin_tablet'] = array(
	    	'name'      => esc_html__('Stretch on Tablet', 'dentalia'),
	    	'description' => esc_html__('Removes side margins on tablet.', 'dentalia'),
	        'type' 		=> 'checkbox',
	        'group'     => 'responsive',
	        'default' => false,
	        'priority' =>  '102',
		);	
		return $fields;
	}
}
add_filter('siteorigin_panels_widget_style_fields', 'orion_remove_side_padding_mobile', 10, 2);

function orion_remove_side_margin_mobile_html_class( $attributes, $args ) {
	/* depreciated, left for compatibility reasons 6.5.2020 */
    /*
    if( !empty($args['remove_padding_mobile']) && $args['remove_padding_mobile'] == true ) {
	    $attributes['class'][] = 'remove-padding-mobile';
    }
    */
    if( !empty($args['remove_margin_tablet']) && $args['remove_margin_tablet'] == true ) {
	    $attributes['class'][] = 'remove-margin-tablet';
    }     
    if( !empty($args['remove_margin_mobile']) && $args['remove_margin_mobile'] == true ) {
	    $attributes['class'][] = 'remove-margin-mobile';
    }    
    return $attributes;
}
add_filter('siteorigin_panels_widget_style_attributes', 'orion_remove_side_margin_mobile_html_class', 11, 2);

/********************************************************************/
/*						Absolute positions 							*/
/********************************************************************/

if(!function_exists('orion_widget_absolute_position')) {
	function orion_widget_absolute_position($fields) {
		
		$fields['absolute'] = array(
		    	'name'      => esc_html__('Overlap Row', 'dentalia'),
		        'type' 		=> 'select',
		        'group'     => 'layout',
		        'default' => '',
		        'options' => array(
		            '' => esc_html__( 'None', 'dentalia' ),
		            'absolute-top-left' => esc_html__( 'Top Left', 'dentalia' ),
		            'absolute-top-center' => esc_html__( 'Top Center', 'dentalia' ),
		            'absolute-top-right' => esc_html__( 'Top Right', 'dentalia' ),
		            'absolute-bottom-left' => esc_html__( 'Bottom Left', 'dentalia' ),
		            'absolute-bottom-center' => esc_html__( 'Bottom Center', 'dentalia' ),
		            'absolute-bottom-right' => esc_html__( 'Bottom Right', 'dentalia' ),
		        ),
		        'priority' =>  '111'
		);
		return $fields;
	}
}
add_filter('siteorigin_panels_widget_style_fields', 'orion_widget_absolute_position', 10, 2);

function orion_widget_absolute_position_class( $attributes, $args ) {
    if( !empty($args['absolute']) && $args['absolute'] != '' ) {
    	$absolute_top_array = array('absolute-top-left', 'absolute-top-center','absolute-top-right');
    	if (in_array($args['absolute'], $absolute_top_array)) {
    		$attributes['class'][] = 'absolute-top';
    	} else {
			$attributes['class'][] = 'absolute-bottom';
    	}
	    $attributes['class'][] = $args['absolute'];
    }
    return $attributes;
}
add_filter('siteorigin_panels_widget_style_attributes', 'orion_widget_absolute_position_class', 11, 2);

/********************************************************************/
/*						Panel Row overlay 							*/
/********************************************************************/

if(!function_exists('orion_row_overlay')) {
	function orion_row_overlay($fields) {

		$fields['row_overlay'] = array(
		    	'name'      => esc_html__('Background Overlay', 'dentalia'),
		        'type' 		=> 'select',
		        'group'     => 'design',
		        'default' => 'default',
		        'options' => array(
		            'default' => esc_html__( 'None', 'dentalia' ),
		            'overlay-dark' => esc_html__( 'Dark', 'dentalia' ),
		            'overlay-light' => esc_html__( 'Light', 'dentalia' ),
		            'overlay-c1' => esc_html__( 'Color 1', 'dentalia' ),
		            'overlay-c2' => esc_html__( 'Color 2', 'dentalia' ),
		            'overlay-c3' => esc_html__( 'Color 3', 'dentalia' ),
		            'overlay-c2-c1' => esc_html__( 'Gradient 1', 'dentalia' ),		            
		            'overlay-c1-c2' => esc_html__( 'Gradient 2', 'dentalia' ),
		            'overlay-c1-t' => esc_html__( 'Color 1 to Transparent', 'dentalia' ),
		            'overlay-c2-t' => esc_html__( 'Color 2 to Transparent', 'dentalia' ),
		            'overlay-c3-t' => esc_html__( 'Color 3 to Transparent', 'dentalia' ),
		            'overlay-fade-black' => esc_html__( 'Black to Transparent', 'dentalia' ),
		            'overlay-black2trans' => esc_html__( 'Transparent to Black', 'dentalia' ),         	
		         	'overlay-white-t' => esc_html__( 'White to Transparent X', 'dentalia' ),
		            'overlay-fade-light' => esc_html__( 'White to Transparent Y', 'dentalia' ),				            
		        ),
		        'priority' =>  '10'
		);
		return $fields;
	}
}
add_filter('siteorigin_panels_row_style_fields', 'orion_row_overlay', 10, 2);
add_filter('siteorigin_panels_cell_style_fields', 'orion_row_overlay', 10, 2);

function orion_row_overlay_html_class( $attributes, $args ) {

    if( !empty( $args['row_overlay'] ) && $args['row_overlay'] != 'default' ) {
        array_push($attributes['class'], $args['row_overlay']);
    }
    return $attributes;
}
add_filter('siteorigin_panels_row_style_attributes', 'orion_row_overlay_html_class', 10, 2);
add_filter('siteorigin_panels_cell_style_attributes', 'orion_row_overlay_html_class', 10, 2);
/********************************************************************/
/*						Cell BG Opacity 							*/
/********************************************************************/

if(!function_exists('orion_bg_opacity_field')) {
	function orion_bg_opacity_field($fields) {

		$fields['bg_opacity'] = array(
		    	'name'      => esc_html__('Background Opacity', 'dentalia'),
		        'type' 		=> 'text',
		        'group'     => 'design',
		        'description' => esc_html__('Must be a number between 1 and 100. Works only with custom background color selected.', 'dentalia'),
		        'default' => 100,
		        'priority' =>  '5',
		);
		return $fields;
	}
}
add_filter('siteorigin_panels_widget_style_fields', 'orion_bg_opacity_field', 10, 2);

function orion_cell_bg_color( $attributes, $args) {
	if (!empty($args['background']) && !empty($args['bg_opacity']) && intval($args['bg_opacity']) > 0 && intval($args['bg_opacity']) < 100 ) {
		preg_match("/background-color:(.*?);/", $attributes["style"], $preg_match_result);
		if( count( $preg_match_result ) > 0 ) {
			// get color:
	        $color_to_replace = $preg_match_result[1];
			$opacity_100 = intval(preg_replace('/[^0-9]+/', '', $args['bg_opacity']), 10);

			if( count( $opacity_100 ) > 0 ) {
				if ($opacity_100 != '' && $opacity_100 != '0') {
					$opacity = intval($opacity_100) / 100;
				} else {
					$opacity = 100;
				}
				$color_rgba = orion_hextorgba($color_to_replace, $opacity);

		        // set background color with rgba value
		        $attributes["style"] = str_replace('background-color:' . $color_to_replace, 'background-color:'.$color_rgba, $attributes["style"]);
			}
	    }
	}
	return $attributes;
}
add_filter('siteorigin_panels_widget_style_attributes', 'orion_cell_bg_color', 20, 2);

/********************************************************************/
/*						basic widget class  						*/
/********************************************************************/

function orion_panels_cell( $attributes, $args ) {
	array_push($attributes['class'], 'orion');
	return $attributes; 
}
add_filter('siteorigin_panels_widget_style_attributes', 'orion_panels_cell', 10, 2);

/********************************************************************/
/*				Remove SO premium refferences  						*/
/********************************************************************/

add_filter( 'siteorigin_premium_upgrade_teaser', '__return_false' );

/********************************************************************/
/*				add a field multiple media upload					*/
/********************************************************************/

// experimental features
$orion_experimental = false;

function orion_widgets_collection_folder($folders){
	$folders[] = get_template_directory(). '/framework/so-fields/';
	return $folders;
} 

function orion_fields_class_prefixes( $class_prefixes ) {
	$class_prefixes[] = 'Orion_';
	return $class_prefixes;
}

function orion_fields_class_paths( $class_paths ) {
	$class_paths[] = get_template_directory(). '/framework/so-fields/';
	return $class_paths;
}

if ($orion_experimental = true) {
	add_filter('siteorigin_widgets_widget_folders', 'orion_widgets_collection_folder');
	add_filter('siteorigin_widgets_field_class_prefixes', 'orion_fields_class_prefixes');
	add_filter('siteorigin_widgets_field_class_paths', 'orion_fields_class_paths');
}

/********************************************************************/
/*						Force Collapse on medium screens			*/
/********************************************************************/

if(!function_exists('force_collapse_medium')) {
	function force_collapse_medium($form_options, $fields) {
	$form_options["collapse_behaviour"]["options"]["collapse_below_lg"] = esc_html__('Force Collapse on md screens', 'dentalia');
		return $form_options;
	}
}
add_filter('siteorigin_panels_row_style_fields', 'force_collapse_medium', 10, 2);

/* collapse if not screen-lg */
if(!function_exists('orion_collapse_lg_row_style_attributes')) {
	function orion_collapse_lg_row_style_attributes( $attributes, $args ) {
		
		if (!empty($args["collapse_behaviour"]) && $args['collapse_behaviour'] == 'collapse_below_lg') {
		array_push( $attributes['class'], 'orion-collapse-below-lg');
		}
	    return $attributes;
	}
}	
add_filter('siteorigin_panels_row_style_attributes', 'orion_collapse_lg_row_style_attributes', 10, 2);

/********************************************************************/
/*						SO settings 	  							*/
/********************************************************************/

// Add dentalia Widgets to Siteorigin Panels
function orion_add_widget_tabs_to_siteorigin ($tabs) {
    $tabs[] = array(
        'title' => esc_html__('OrionThemes', 'dentalia'),
        'filter' => array(
            'groups' => array('dentalia')
        )
    );

    return $tabs;
}
add_filter('siteorigin_panels_widget_dialog_tabs', 'orion_add_widget_tabs_to_siteorigin', 10);



/********************************************************************/
/*						Tablet padding 	  							*/
/********************************************************************/

// add control to Page builder row settings:

if(!function_exists('orion_tablet_padding')) {
	function orion_tablet_padding($fields) {

		$fields['tablet_padding'] = array(
			'name'        => __( 'Tablet Padding', 'dentalia' ),
			'type'        => 'measurement',
			'group'       => 'responsive',
			'description' => __( 'Padding when on tablets.', 'dentalia' ),
			'priority'    => 7,
			'multiple'    => true
		);

		return $fields;
	}
}
add_filter('siteorigin_panels_row_style_fields', 'orion_tablet_padding', 10, 2);
add_filter('siteorigin_panels_cell_style_fields', 'orion_tablet_padding', 10, 2);


function orion_process_responsive_options ( $css, $panels_data, $post_id, $layout_data ) {
	$settings = siteorigin_panels_setting();
	// Check if Tablet Layouts are enabled, and if the tablet width and Mobile Width are correctly setup
	// 
	
	/* set the width of mobile-2-in-row and similar (gutter issues) */
	foreach ( $layout_data as $ri => $row ) {

		foreach ( $row['cells'] as $ci => $cell ) {
			if( ! empty( $cell['style']['tablet_padding'] ) ) {
				$css->add_cell_css( 
					// :not(#idspecific) id specificy added so it overwrites the desktop version.
					$post_id, $ri, $ci, '> div:not(#idspecific)', 
					array(
						'padding' => $cell['style']['tablet_padding'],
					), 
					$settings[ 'tablet-width' ] . ':' . ( $settings[ 'mobile-width' ] + 1 ), false
				);
			}			
		}

		if( empty( $row['style']['mobile']) && empty( $row['style']['tablet']) && empty( $row['style']['desktop'] )) continue;

		if(!empty($row['style']['desktop'])) {
				/* get the gutter*/
			$gutter = apply_filters( 'siteorigin_panels_css_row_gutter', $settings['margin-sides'] . 'px', $row, $ri, $panels_data );

			$set_cell_width = true;
			switch ($row['style']['desktop']) {
				case 'desktop-2-in-row':
					$weight = '0.5';
					$rounded_width = '50%';	
					break;
				case 'desktop-1-in-row':
					$weight = '1';
					$rounded_width = '100%';	
					break;		
				case 'desktop-3-in-row':
					$weight = '0.3333';
					$rounded_width = '33,3333%';	
					break;
				case 'desktop-4-in-row':
					$weight = '0.25';
					$rounded_width = '25%';	
					break;
				default:
					$set_cell_width = false;
					break;
			}
			
			if($set_cell_width) {
				foreach ( $row['cells'] as $ci => $cell ) {
					$calc_width = 'calc(' . $rounded_width . ' - ( ' . ( 1 - $weight ) . ' * ' . $gutter . ' ) )';

					$css->add_cell_css( 
						$post_id, $ri, $ci, 
						'.panel-grid-cell', 
						array(
							'width' => array(
								// For some locales PHP uses ',' for decimal separation.
								// This seems to happen when a plugin calls `setlocale(LC_ALL, 'de_DE');` or `setlocale(LC_NUMERIC, 'de_DE');`
								// This should prevent issues with column sizes in these cases.
								str_replace( ',', '.', $rounded_width ),
								str_replace( ',', '.', $calc_width ),
							)
						)
					);
				}
			}
		}

		if(!empty($row['style']['mobile'])) {
				/* get the gutter*/
			$gutter = apply_filters( 'siteorigin_panels_css_row_gutter', $settings['margin-sides'] . 'px', $row, $ri, $panels_data );

			$set_cell_width = true;
			switch ($row['style']['mobile']) {
				case 'mobile-2-in-row':
					$weight = '0.5';
					$rounded_width = '50%';	
					break;
				case 'mobile-1-in-row':
					$weight = '1';
					$rounded_width = '100%';	
					break;				
				default:
					$set_cell_width = false;
					break;
			}
			
			if($set_cell_width) {
				foreach ( $row['cells'] as $ci => $cell ) {
					$calc_width = 'calc(' . $rounded_width . ' - ( ' . ( 1 - $weight ) . ' * ' . $gutter . ' ) )!important';

					$css->add_cell_css( 
						$post_id, $ri, $ci, 
						'.panel-grid-cell', 
						array(
							'width' => array(
								// For some locales PHP uses ',' for decimal separation.
								// This seems to happen when a plugin calls `setlocale(LC_ALL, 'de_DE');` or `setlocale(LC_NUMERIC, 'de_DE');`
								// This should prevent issues with column sizes in these cases.
								str_replace( ',', '.', $rounded_width ),
								str_replace( ',', '.', $calc_width ),
							)
						), 
						$settings[ 'mobile-width' ] );
				}
			}
		}
		
		if( !empty($row['style']['tablet']) ) {
				/* get the gutter*/
			$gutter = apply_filters( 'siteorigin_panels_css_row_gutter', $settings['margin-sides'] . 'px', $row, $ri, $panels_data );

			$set_cell_width = true;
			switch ($row['style']['tablet']) {
				case 'tablet-2-in-row':
					$weight = '0.5';
					$rounded_width = '50%';	
					break;
				case 'tablet-1-in-row':
					$weight = '1';
					$rounded_width = '100%';	
					break;		
				case 'tablet-3-in-row':
					$weight = '0.3333';
					$rounded_width = '33,3333%';	
					break;
				case 'tablet-4-in-row':
					$weight = '0.25';
					$rounded_width = '25%';	
					break;
				default:
					$set_cell_width = false;
					break;
			}
			
			if($set_cell_width) {
				foreach ( $row['cells'] as $ci => $cell ) {

					$calc_width = 'calc(' . $rounded_width . ' - ( ' . ( 1 - $weight ) . ' * ' . $gutter . ' ) )!important';

					$css->add_cell_css( 
						$post_id, $ri, $ci, 
						'.panel-grid-cell', 
						array(
							'width' => array(
								// For some locales PHP uses ',' for decimal separation.
								// This seems to happen when a plugin calls `setlocale(LC_ALL, 'de_DE');` or `setlocale(LC_NUMERIC, 'de_DE');`
								// This should prevent issues with column sizes in these cases.
								str_replace( ',', '.', $rounded_width ),
								str_replace( ',', '.', $calc_width ),
							),					
						), 
						$settings[ 'tablet-width' ] . ':' . ( $settings[ 'mobile-width' ] + 1 ) 
					);
				}
			}
		}
	}
	if ($settings[ 'tablet-width' ] && $settings[ 'mobile-width' ] ) {
		foreach ( $layout_data as $ri => $row ) {

			if( empty( $row['cells'] ) ) continue; // Nothing here, move on
			// Check if there's tablet padding applied
			
			if( ! empty( $row['style']['tablet_padding'] ) ) {

				// If there is, apply it regardless of whether there is no other styling or not
				$css->add_row_css( $post_id, $ri, array( '.panel-no-style', '.panel-has-style > .panel-row-style' ), array(
					'padding' => $row['style']['tablet_padding'],
				), $settings[ 'tablet-width' ] . ':' . ( $settings[ 'mobile-width' ] + 1 ) );
			}
		}
	}
	return $css;
}
add_filter( 'siteorigin_panels_css_object', 'orion_process_responsive_options', 10, 5 );

/********************************************************************/
/*					Theme background color  						*/
/********************************************************************/

if(!function_exists('orion_theme_colors')) {
	function orion_theme_colors($fields) {

		$fields['orion_theme_colors_bg'] = array(
			'name'        => esc_html__( 'Background color', 'dentalia' ),
			'type'        => 'radio',
			'group'       => 'design',
			'priority'    => 1,
	        'options' => array(
	        	'clear' => esc_html__( 'Clear', 'dentalia' ),
	            'custom' => esc_html__( 'Custom', 'dentalia' ),
	            'bg-sitebg' => esc_html__( 'Site bg color', 'dentalia' ),
	            'bg-altsitebg' => esc_html__( 'Alt site bg', 'dentalia' ),
	            'bg-c1' => esc_html__( 'Color 1', 'dentalia' ),
	            'bg-c2' => esc_html__( 'Color 2', 'dentalia' ),
	            'bg-c3' => esc_html__( 'Color 3', 'dentalia' ),
	        ),
	        'default'  => 'custom',
		);
	
		$fields['orion_theme_colors_separator_top'] = array(
			'name'        => esc_html__( 'Separator Top color', 'dentalia' ),
			'type'        => 'radio',
			'group'       => 'separators',
			'priority'    => 100,
	        'options' => array(
	        	'bg-content-bg' => esc_html__( 'Default', 'dentalia' ),
	        	'color_altsitebg' => esc_html__( 'Alt site bg', 'dentalia' ),	        	
	            'custom' => esc_html__( 'Custom', 'dentalia' ),
	            'color_1' => esc_html__( 'Color 1', 'dentalia' ),
	            'color_2' => esc_html__( 'Color 2', 'dentalia' ),
	            'color_3' => esc_html__( 'Color 3', 'dentalia' ),
	        ),
	        'default'  => 'custom',
		);
		$fields['orion_theme_colors_separator_bottom'] = array(
			'name'        => esc_html__( 'Separator Bottom color', 'dentalia' ),
			'type'        => 'radio',
			'group'       => 'separators',
			'priority'    => 105,
	        'options' => array(
	        	'bg-content-bg' => esc_html__( 'Default', 'dentalia' ),
	        	'color_altsitebg' => esc_html__( 'Alt site bg', 'dentalia' ),	        	
	            'custom' => esc_html__( 'Custom', 'dentalia' ),
	            'color_1' => esc_html__( 'Color 1', 'dentalia' ),
	            'color_2' => esc_html__( 'Color 2', 'dentalia' ),
	            'color_3' => esc_html__( 'Color 3', 'dentalia' ),
	        ),
	        'default'  => 'custom',
		);		
		return $fields;
	}
}
add_filter('siteorigin_panels_row_style_fields', 'orion_theme_colors', 10, 2);
add_filter('siteorigin_panels_cell_style_fields', 'orion_theme_colors', 10, 2);
add_filter('siteorigin_panels_widget_style_fields', 'orion_theme_colors', 10, 2);

function orion_row_theme_colors_class( $attributes, $args ) {
    if( !empty( $args['orion_theme_colors_bg'] ) && $args['orion_theme_colors_bg'] != '' ) {
        array_push($attributes['class'], $args['orion_theme_colors_bg']);
    }
    return $attributes;
}
add_filter('siteorigin_panels_row_style_attributes', 'orion_row_theme_colors_class', 10, 2);
add_filter('siteorigin_panels_cell_style_attributes', 'orion_row_theme_colors_class', 10, 2);
add_filter('siteorigin_panels_widget_style_attributes', 'orion_row_theme_colors_class', 10, 2);

/********************************************************************/
/*					END Theme background color  					*/
/********************************************************************/


/* stretched left & stretched right */
if(!function_exists('orion_add_row_left_right_stretch_style')) {
	function orion_add_row_left_right_stretch_style( $form_options, $fields ) {
		$form_options["row_stretch"]["options"]['orion-str-left'] = esc_html__('Stretched left ', 'dentalia');
		$form_options["row_stretch"]["options"]['orion-str-right'] = esc_html__('Stretched right ', 'dentalia');
		return $form_options;
	}
}	
add_filter('siteorigin_panels_row_style_fields', 'orion_add_row_left_right_stretch_style', 10, 2);




/* Backward Compatibility */
/********************************************************************/
/*						Equal Height  								*/
/********************************************************************/

/* new */

if(!function_exists('orion_equal_height_layout_options')) {
	function orion_equal_height_layout_options($fields) {
		$fields['cell_alignment']['options']['equal_height'] = esc_html__( 'Equal Height (depreciated)', 'dentalia' );
		return $fields;
	}
}
add_filter('siteorigin_panels_row_style_fields', 'orion_equal_height_layout_options', 10, 2);

function orion_equal_height_class_layout( $attributes, $args ) {
    if( !empty( $args['cell_alignment'] ) && $args['cell_alignment'] == 'equal_height' ) {
        array_push($attributes['class'], 'orion-equal-height');
    }
    return $attributes;
}
add_filter('siteorigin_panels_row_style_attributes', 'orion_equal_height_class_layout', 10, 2);

/* end new */

/* left for backward compatibility */
function orion_equal_height_class( $attributes, $args ) {
    if( !empty( $args['equal_height'] ) && $args['equal_height'] != 'default' ) {
        array_push($attributes['class'], $args['equal_height']);
    }
    return $attributes;
}
add_filter('siteorigin_panels_row_style_attributes', 'orion_equal_height_class', 10, 2);