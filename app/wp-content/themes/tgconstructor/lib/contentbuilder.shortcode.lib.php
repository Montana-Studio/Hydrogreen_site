<?php
//Get all galleries
$args = array(
    'numberposts' => -1,
    'post_type' => array('galleries'),
);

$galleries_arr = get_posts($args);
$galleries_select = array();
$galleries_select[''] = '';

foreach($galleries_arr as $gallery)
{
    $galleries_select[$gallery->ID] = $gallery->post_title;
}

//Get all categories
$categories_arr = get_categories();
$categories_select = array();
$categories_select[''] = '';

foreach ($categories_arr as $cat) {
	$categories_select[$cat->cat_ID] = $cat->cat_name;
}

//Get all project sectors
$projectsectors_arr = get_terms('projectsectors', 'hide_empty=0&hierarchical=0&parent=0&orderby=menu_order');
$projectsectors_select = array();
$projectsectors_select[''] = '';

foreach ($projectsectors_arr as $set) {
	$projectsectors_select[$set->slug] = $set->name;
}

//Get all project services
$projectservices_arr = get_terms('projectservices', 'hide_empty=0&hierarchical=0&parent=0&orderby=menu_order');
$projectservices_select = array();
$projectservices_select[''] = '';

foreach ($projectservices_arr as $set) {
	$projectservices_select[$set->slug] = $set->name;
}

//Get all team categories
$team_cats_arr = get_terms('teamcats', 'hide_empty=0&hierarchical=0&parent=0&orderby=menu_order');
$team_cats_select = array();
$team_cats_select[''] = '';

foreach ($team_cats_arr as $team_cat) {
	$team_cats_select[$team_cat->slug] = $team_cat->name;
}

//Get all testimonials categories
$testimonial_cats_arr = get_terms('testimonialcats', 'hide_empty=0&hierarchical=0&parent=0&orderby=menu_order');
$testimonial_cats_select = array();
$testimonial_cats_select[''] = '';

foreach ($testimonial_cats_arr as $testimonial_cat) {
	$testimonial_cats_select[$testimonial_cat->slug] = $testimonial_cat->name;
}

//Get all client categories
$client_cats_arr = get_terms('clientcats', 'hide_empty=0&hierarchical=0&parent=0&orderby=menu_order');
$client_cats_select = array();
$client_cats_select[''] = '';

foreach ($client_cats_arr as $client_cats) {
	$client_cats_select[$client_cats->slug] = $client_cats->name;
}

//Get all pricing categories
$pricing_cat_arr = get_terms('pricingcats', 'hide_empty=0&hierarchical=0&parent=0&orderby=menu_order');
$pricing_cat_select = array();
$pricing_cat_select[''] = '';

foreach($pricing_cat_arr as $pricing_cat)
{
    $pricing_cat_select[$pricing_cat->slug] = $pricing_cat->name;
}

//Get all sidebars
$theme_sidebar = array(
	'' => '',
	'Page Sidebar' => 'Page Sidebar', 
	'Blog Sidebar' => 'Blog Sidebar', 
	'Contact Sidebar' => 'Contact Sidebar', 
	'Single Post Sidebar' => 'Single Post Sidebar',
	'Single Image Page Sidebar' => 'Single Image Page Sidebar',
	'Archive Sidebar' => 'Archive Sidebar',
	'Category Sidebar' => 'Category Sidebar',
	'Search Sidebar' => 'Search Sidebar',
	'Tag Sidebar' => 'Tag Sidebar', 
	'Footer Sidebar' => 'Footer Sidebar',
);
$dynamic_sidebar = get_option('pp_sidebar');

if(!empty($dynamic_sidebar))
{
	foreach($dynamic_sidebar as $sidebar)
	{
		$theme_sidebar[$sidebar] = $sidebar;
	}
}

//Get order options
$order_select = array(
	'default' 	=> 'By Default',
	'newest'	=> 'By Newest',
	'oldest'	=> 'By Oldest',
	'title'		=> 'By Title',
	'random'	=> 'By Random',
);

//Get column options
$column_select = array(
	'1' => '1 Column',
	'2' => '2 Columns',
	'3'	=> '3 Columns',
	'4'	=> '4 Columns',
);

//Get column options
$blog_column_select = array(
	'3'	=> '3 Columns',
	'4'	=> '4 Columns',
	'5' => '5 Columns',
);

//Get column options
$team_column_select = array(
	'3'	=> '3 Columns',
	'4'	=> '4 Columns',
	'5' => '5 Columns',
);

$testimonial_column_select = array(
	'2' => '2 Columns',
	'3'	=> '3 Columns',
	'4'	=> '4 Columns',
);

$gallery_column_select = array(
	'3'	=> '3 Columns',
	'4'	=> '4 Columns',
);

$text_block_layout_select = array(
	'fixedwidth'=> 'Fixed Width',
	'fullwidth'	=> 'Fullwidth',
);

$portfolio_column_select = array(
	'3'	=> '3 Columns',
	'4'	=> '4 Columns',
);


$portfolio_layout_select = array(
	'fullwidth'	=> 'Fullwidth',
	'fixedwidth'=> 'Fixed Width',
);

$gallery_layout_select = array(
	'fullwidth'	=> 'Fullwidth',
	'fixedwidth'=> 'Fixed Width',
);

$team_layout_select = array(
	'fullwidth'	=> 'Fullwidth',
	'fixedwidth'=> 'Fixed Width',
);

$client_layout_select = array(
	'fullwidth'	=> 'Fullwidth',
	'fixedwidth'=> 'Fixed Width',
);

$ppb_shortcodes = array(
	1 => array(
		'title' => 'Elements',
	),
    'ppb_divider' => array(
    	'title' =>  'Paragraph Break',
    	'icon' => 'divider.png',
    	'attr' => array(),
    	'desc' => array(),
    	'content' => FALSE
    ),
    'ppb_header' => array(
    	'title' =>  'Header',
    	'icon' => 'header.png',
    	'attr' => array(
    		'slug' => array(
    			'title' => 'Slug (Optional)',
    			'type' => 'text',
    			'desc' => 'The "slug" is the URL-friendly version of this content. It is usually all lowercase and contains only letters, numbers, and hyphens. This option is used for one page template',
    		),
    		'subtitle' => array(
    			'title' => 'Sub Title (Optional)',
    			'type' => 'text',
    			'desc' => 'Enter short description for this header',
    		),
    		'width' => array(
    			'title' => 'Content Width',
    			'type' => 'select',
    			'options' => array(
    				'100%' 	=> '100%',
    				'90%' 	=> '90%',
    				'80%' 	=> '80%',
    				'70%' 	=> '70%',
    				'60%' 	=> '60%',
    			),
    			'desc' => 'Select width in percentage for this content',
    		),
    		'textalign' => array(
    			'title' => 'Text Alignment',
    			'type' => 'select',
    			'options' => array(
    				'left' 	=> 'Left',
    				'center' => 'center',
    				'right'	=> 'Right',
    			),
    			'desc' => 'Select width in percentage for this content',
    		),
    		'padding' => array(
    			'title' => 'Content Padding',
    			'type' => 'jslider',
    			"std" => "30",
				"min" => 0,
				"max" => 200,
				"step" => 5,
    			'desc' => 'Select padding top and bottom value for this header block',
    		),
    		'bgcolor' => array(
    			'title' => 'Background Color',
    			'type' => 'colorpicker',
    			"std" => "#f9f9f9",
    			'desc' => 'Select background color for this this block',
    		),
    		'fontcolor' => array(
    			'title' => 'Font Color',
    			'type' => 'colorpicker',
    			"std" => "#444444",
    			'desc' => 'Select font color for content on this block',
    		),
    		'custom_css' => array(
    			'title' => 'Custom CSS',
    			'type' => 'text',
    			'desc' => 'You can add custom CSS style for this block (advanced user only)',
    		),
    	),
    	'desc' => array(),
    	'content' => TRUE
    ),
    'ppb_header_image' => array(
    	'title' =>  'Header With Background Image',
    	'icon' => 'header_image.png',
    	'attr' => array(
    		'slug' => array(
    			'title' => 'Slug (Optional)',
    			'type' => 'text',
    			'desc' => 'The "slug" is the URL-friendly version of this content. It is usually all lowercase and contains only letters, numbers, and hyphens. This option is used for one page template',
    		),
    		'subtitle' => array(
    			'title' => 'Sub Title (Optional)',
    			'type' => 'text',
    			'desc' => 'Enter short description for this header',
    		),
    		'textalign' => array(
    			'title' => 'Text Alignment',
    			'type' => 'select',
    			'options' => array(
    				'left' 	=> 'Left',
    				'center' => 'center',
    				'right'	=> 'Right',
    			),
    			'desc' => 'Select width in percentage for this content',
    		),
    		'background' => array(
    			'title' => 'Background Image',
    			'type' => 'file',
    			'desc' => 'Upload image you want to display as background',
    		),
    		'background_parallax' => array(
    			'title' => 'Background Parallax',
    			'type' => 'select',
    			'options' => array(
    				'' => 'No Parallax',
    				'yes' => 'Yes',
    			),
    			'desc' => 'Select to enable parallax effect to background image',
    		),
    		'background_position' => array(
    			'title' => 'Background Position (Optional)',
    			'type' => 'select',
    			'options' => array(
    				'top' => 'Top',
    				'center' => 'Center',
    				'bottom' => 'Bottom',
    			),
    			'desc' => 'Select image background position option',
    		),
    		'padding' => array(
    			'title' => 'Content Padding',
    			'type' => 'jslider',
    			"std" => "30",
				"min" => 0,
				"max" => 400,
				"step" => 5,
    			'desc' => 'Select padding top and bottom value for this header block',
    		),
    		'fontcolor' => array(
    			'title' => 'Font Color',
    			'type' => 'colorpicker',
    			"std" => "#444444",
    			'desc' => 'Select font color for content on this block',
    		),
    		'custom_css' => array(
    			'title' => 'Custom CSS',
    			'type' => 'text',
    			'desc' => 'You can add custom CSS style for this block (advanced user only)',
    		),
    	),
    	'desc' => array(),
    	'content' => TRUE
    ),
    'ppb_text' => array(
    	'title' =>  'Text Content',
    	'icon' => 'text.png',
    	'attr' => array(
    		'slug' => array(
    			'title' => 'Slug (Optional)',
    			'type' => 'text',
    			'desc' => 'The "slug" is the URL-friendly version of this content. It is usually all lowercase and contains only letters, numbers, and hyphens. This option is used for one page template',
    		),
    		'width' => array(
    			'title' => 'Content Width',
    			'type' => 'select',
    			'options' => array(
    				'100%' 	=> '100%',
    				'90%' 	=> '90%',
    				'80%' 	=> '80%',
    				'70%' 	=> '70%',
    				'60%' 	=> '60%',
    			),
    			'desc' => 'Select width in percentage for this content',
    		),
    		'padding' => array(
    			'title' => 'Content Padding',
    			'type' => 'jslider',
    			"std" => "30",
				"min" => 0,
				"max" => 200,
				"step" => 5,
    			'desc' => 'Select padding top and bottom value for this header block',
    		),
    		'bgcolor' => array(
    			'title' => 'Background Color',
    			'type' => 'colorpicker',
    			"std" => "#f9f9f9",
    			'desc' => 'Select background color for this header block',
    		),
    		'fontcolor' => array(
    			'title' => 'Font Color',
    			'type' => 'colorpicker',
    			"std" => "#444444",
    			'desc' => 'Select font color for content on this block',
    		),
    		'custom_css' => array(
    			'title' => 'Custom CSS',
    			'type' => 'text',
    			'desc' => 'You can add custom CSS style for this block (advanced user only)',
    		),
    	),
    	'desc' => array(),
    	'content' => TRUE
    ),
    'ppb_text_image' => array(
    	'title' =>  'Text With Background Image',
    	'icon' => 'text_image.png',
    	'attr' => array(
    		'slug' => array(
    			'title' => 'Slug (Optional)',
    			'type' => 'text',
    			'desc' => 'The "slug" is the URL-friendly version of this content. It is usually all lowercase and contains only letters, numbers, and hyphens. This option is used for one page template',
    		),
    		'background' => array(
    			'title' => 'Background Image',
    			'type' => 'file',
    			'desc' => 'Upload image you want to display as background',
    		),
    		'background_parallax' => array(
    			'title' => 'Background Parallax',
    			'type' => 'select',
    			'options' => array(
    				'' => 'No Parallax',
    				'yes' => 'Yes',
    			),
    			'desc' => 'Select to enable parallax effect to background image',
    		),
    		'background_position' => array(
    			'title' => 'Background Position (Optional)',
    			'type' => 'select',
    			'options' => array(
    				'top' => 'Top',
    				'center' => 'Center',
    				'bottom' => 'Bottom',
    			),
    			'desc' => 'Select image background position option',
    		),
    		'padding' => array(
    			'title' => 'Content Padding',
    			'type' => 'jslider',
    			"std" => "30",
				"min" => 0,
				"max" => 400,
				"step" => 5,
    			'desc' => 'Select padding top and bottom value for this header block',
    		),
    		'fontcolor' => array(
    			'title' => 'Font Color',
    			'type' => 'colorpicker',
    			"std" => "#444444",
    			'desc' => 'Select font color for content on this block',
    		),
    		'custom_css' => array(
    			'title' => 'Custom CSS',
    			'type' => 'text',
    			'desc' => 'You can add custom CSS style for this block (advanced user only)',
    		),
    	),
    	'desc' => array(),
    	'content' => TRUE
    ),
    'ppb_text_sidebar' => array(
    	'title' =>  'Text With Sidebar',
    	'icon' => 'contact_sidebar.png',
    	'attr' => array(
    		'slug' => array(
    			'title' => 'Slug (Optional)',
    			'type' => 'text',
    			'desc' => 'The "slug" is the URL-friendly version of this content. It is usually all lowercase and contains only letters, numbers, and hyphens. This option is used for one page template',
    		),
    		'sidebar' => array(
    			'Title' => 'Content Sidebar',
    			'type' => 'select',
    			'options' => $theme_sidebar,
    			'desc' => 'You can select sidebar to display next to classic blog content',
    		),
    		'padding' => array(
	    	    'title' => 'Content Padding',
	    	    'type' => 'jslider',
	    	    "std" => "30",
			    "min" => 0,
			    "max" => 200,
			    "step" => 5,
	    	    'desc' => 'Select padding top and bottom value for this header block',
	    	),
    		'custom_css' => array(
    			'title' => 'Custom CSS',
    			'type' => 'text',
    			'desc' => 'You can add custom CSS style for this block (advanced user only)',
    		),
    	),
    	'desc' => array(),
    	'content' => TRUE
    ),
    'ppb_image_fullwidth' => array(
    	'title' =>  'Image Fullwidth',
    	'icon' => 'image_full.png',
    	'attr' => array(
    		'slug' => array(
    			'title' => 'Slug (Optional)',
    			'type' => 'text',
    			'desc' => 'The "slug" is the URL-friendly version of this content. It is usually all lowercase and contains only letters, numbers, and hyphens. This option is used for one page template',
    		),
    		'image' => array(
    			'title' => 'Image',
    			'type' => 'file',
    			'desc' => 'Upload image you want to display for this content',
    		),
    		'height' => array(
    			'title' => 'Height',
    			'type' => 'jslider',
    			"std" => "600",
				"min" => 30,
				"max" => 1000,
				"step" => 5,
    			'desc' => 'Select number of height for this content (in pixel)',
    		),
    		'background_position' => array(
    			'title' => 'Background Position',
    			'type' => 'select',
    			'options' => array(
    				'top' => 'Top',
    				'center' => 'Center',
    				'bottom' => 'Bottom',
    			),
    			'desc' => 'Select image background position option',
    		),
    		'display_caption' => array(
    			'title' => 'Display caption',
    			'type' => 'select',
    			'options' => array(
    				1 => 'Yes',
    				0 => 'No'
    			),
    			'desc' => '',
    		),
    		'padding' => array(
    			'title' => 'Content Padding',
    			'type' => 'jslider',
    			"std" => "30",
				"min" => 0,
				"max" => 200,
				"step" => 5,
    			'desc' => 'Select padding top and bottom value for this header block',
    		),
    		'custom_css' => array(
    			'title' => 'Custom CSS',
    			'type' => 'text',
    			'desc' => 'You can add custom CSS style for this block (advanced user only)',
    		),
    	),
    	'desc' => array(),
    	'content' => FALSE
    ),
    'ppb_image_parallax' => array(
    	'title' =>  'Image Parallax',
    	'icon' => 'image_parallax.png',
    	'attr' => array(
    		'slug' => array(
    			'title' => 'Slug (Optional)',
    			'type' => 'text',
    			'desc' => 'The "slug" is the URL-friendly version of this content. It is usually all lowercase and contains only letters, numbers, and hyphens. This option is used for one page template',
    		),
    		'image' => array(
    			'title' => 'Image',
    			'type' => 'file',
    			'desc' => 'Upload image you want to display for this content',
    		),
    		'height' => array(
    			'title' => 'Height',
    			'type' => 'jslider',
    			"std" => "600",
				"min" => 30,
				"max" => 1000,
				"step" => 5,
    			'desc' => 'Select number of height for this content (in pixel)',
    		),
    		'custom_css' => array(
    			'title' => 'Custom CSS',
    			'type' => 'text',
    			'desc' => 'You can add custom CSS style for this block (advanced user only)',
    		),
    	),
    	'desc' => array(),
    	'content' => FALSE
    ),
    'ppb_image_fixed_width' => array(
    	'title' =>  'Image Fixed Width',
    	'icon' => 'image_fixed.png',
    	'attr' => array(
    		'slug' => array(
    			'title' => 'Slug (Optional)',
    			'type' => 'text',
    			'desc' => 'The "slug" is the URL-friendly version of this content. It is usually all lowercase and contains only letters, numbers, and hyphens. This option is used for one page template',
    		),
    		'image' => array(
    			'title' => 'Image',
    			'type' => 'file',
    			'desc' => 'Upload image you want to display for this content',
    		),
    		'display_caption' => array(
    			'title' => 'Display caption and description',
    			'type' => 'select',
    			'options' => array(
    				1 => 'Yes',
    				0 => 'No'
    			),
    			'desc' => '',
    		),
    		'padding' => array(
    			'title' => 'Content Padding',
    			'type' => 'jslider',
    			"std" => "30",
				"min" => 0,
				"max" => 200,
				"step" => 5,
    			'desc' => 'Select padding top and bottom value for this header block',
    		),
    		'bgcolor' => array(
    			'title' => 'Background Color',
    			'type' => 'colorpicker',
    			"std" => "#f9f9f9",
    			'desc' => 'Select background color for this header block',
    		),
    		'custom_css' => array(
    			'title' => 'Custom CSS',
    			'type' => 'text',
    			'desc' => 'You can add custom CSS style for this block (advanced user only)',
    		),
    	),
    	'desc' => array(),
    	'content' => FALSE
    ),
    'ppb_content_half_bg' => array(
    	'title' =>  'One Half Content with Background',
    	'icon' => 'half_content_bg.png',
    	'attr' => array(
    		'slug' => array(
    			'title' => 'Slug (Optional)',
    			'type' => 'text',
    			'desc' => 'The "slug" is the URL-friendly version of this content. It is usually all lowercase and contains only letters, numbers, and hyphens. This option is used for one page template',
    		),
    		'subtitle' => array(
    			'title' => 'Sub Title (Optional)',
    			'type' => 'text',
    			'desc' => 'Enter short description for this header',
    		),
    		'background' => array(
    			'title' => 'Background Image',
    			'type' => 'file',
    			'desc' => 'Upload image you want to display as background',
    		),
    		'background_parallax' => array(
    			'title' => 'Background Parallax',
    			'type' => 'select',
    			'options' => array(
    				'' => 'No Parallax',
    				'yes' => 'Yes',
    			),
    			'desc' => 'Select to enable parallax effect to background image',
    		),
    		'background_position' => array(
    			'title' => 'Background Position (Optional)',
    			'type' => 'select',
    			'options' => array(
    				'top' => 'Top',
    				'center' => 'Center',
    				'bottom' => 'Bottom',
    			),
    			'desc' => 'Select image background position option',
    		),
    		'padding' => array(
    			'title' => 'Content Padding',
    			'type' => 'jslider',
    			"std" => "30",
				"min" => 0,
				"max" => 400,
				"step" => 5,
    			'desc' => 'Select padding top and bottom value for this header block',
    		),
    		'bgcolor' => array(
    			'title' => 'Content Background Color',
    			'type' => 'colorpicker',
    			"std" => "#f9f9f9",
    			'desc' => 'Select background color for this content block',
    		),
    		'opacity' => array(
    			'title' => 'Content Background Opacity',
    			'type' => 'jslider',
    			"std" => "100",
				"min" => 10,
				"max" => 100,
				"step" => 5,
    			'desc' => 'Select background opacity for this content block',
    		),
    		'fontcolor' => array(
    			'title' => 'Font Color (Optional)',
    			'type' => 'colorpicker',
    			"std" => "#444444",
    			'desc' => 'Select font color for this content',
    		),
    		'align' => array(
    			'title' => 'Content Box alignment',
    			'type' => 'select',
    			'options' => array(
    				'left' => 'Left',
    				'right' => 'Right'
    			),
    			'desc' => 'Select the alignment for content box',
    		),
    		'custom_css' => array(
    			'title' => 'Custom CSS',
    			'type' => 'text',
    			'desc' => 'You can add custom CSS style for this block (advanced user only)',
    		),
    	),
    	'desc' => array(),
    	'content' => TRUE
    ),
    'ppb_image_half_fixed_width' => array(
    	'title' =>  'Image One Half Width',
    	'icon' => 'image_half_fixed.png',
    	'attr' => array(
    		'slug' => array(
    			'title' => 'Slug (Optional)',
    			'type' => 'text',
    			'desc' => 'The "slug" is the URL-friendly version of this content. It is usually all lowercase and contains only letters, numbers, and hyphens. This option is used for one page template',
    		),
    		'image' => array(
    			'title' => 'Image',
    			'type' => 'file',
    			'desc' => 'Upload image you want to display for this content',
    		),
    		'align' => array(
    			'title' => 'Image alignment',
    			'type' => 'select',
    			'options' => array(
    				'left' => 'Left',
    				'right' => 'Right'
    			),
    			'desc' => 'Select the alignment for image',
    		),
    		'padding' => array(
    			'title' => 'Content Padding',
    			'type' => 'jslider',
    			"std" => "30",
				"min" => 0,
				"max" => 200,
				"step" => 5,
    			'desc' => 'Select padding top and bottom value for this header block',
    		),
    		'bgcolor' => array(
    			'title' => 'Background Color',
    			'type' => 'colorpicker',
    			"std" => "#f9f9f9",
    			'desc' => 'Select background color for this header block',
    		),
    		'custom_css' => array(
    			'title' => 'Custom CSS',
    			'type' => 'text',
    			'desc' => 'You can add custom CSS style for this block (advanced user only)',
    		),
    	),
    	'desc' => array(),
    	'content' => TRUE
    ),
    'ppb_image_half_fullwidth' => array(
    	'title' =>  'Image One Half Fullwidth',
    	'icon' => 'image_half_full.png',
    	'attr' => array(
    		'slug' => array(
    			'title' => 'Slug (Optional)',
    			'type' => 'text',
    			'desc' => 'The "slug" is the URL-friendly version of this content. It is usually all lowercase and contains only letters, numbers, and hyphens. This option is used for one page template',
    		),
    		'subtitle' => array(
    			'title' => 'Sub Title (Optional)',
    			'type' => 'text',
    			'desc' => 'Enter short description for this header',
    		),
    		'image' => array(
    			'title' => 'Image',
    			'type' => 'file',
    			'desc' => 'Upload image you want to display for this content',
    		),
    		'height' => array(
    			'title' => 'Height',
    			'type' => 'jslider',
    			"std" => "600",
				"min" => 30,
				"max" => 1000,
				"step" => 5,
    			'desc' => 'Select number of height for this content (in pixel)',
    		),
    		'align' => array(
    			'title' => 'Image alignment',
    			'type' => 'select',
    			'options' => array(
    				'left' => 'Left',
    				'right' => 'Right'
    			),
    			'desc' => 'Select the alignment for image',
    		),
    		'padding' => array(
    			'title' => 'Content Padding',
    			'type' => 'jslider',
    			"std" => "30",
				"min" => 0,
				"max" => 200,
				"step" => 5,
    			'desc' => 'Select padding top and bottom value for this header block',
    		),
    		'bgcolor' => array(
    			'title' => 'Background Color',
    			'type' => 'colorpicker',
    			"std" => "#f9f9f9",
    			'desc' => 'Select background color for this header block',
    		),
    		'fontcolor' => array(
    			'title' => 'Font Color',
    			'type' => 'colorpicker',
    			"std" => "#000000",
    			'desc' => 'Select font color for title and subtitle',
    		),
    		'custom_css' => array(
    			'title' => 'Custom CSS',
    			'type' => 'text',
    			'desc' => 'You can add custom CSS style for this block (advanced user only)',
    		),
    	),
    	'desc' => array(),
    	'content' => TRUE
    ),
    'ppb_two_cols_images' => array(
    	'title' =>  'Images Two Columns',
    	'icon' => 'images_two_cols.png',
    	'attr' => array(
    		'slug' => array(
    			'title' => 'Slug (Optional)',
    			'type' => 'text',
    			'desc' => 'The "slug" is the URL-friendly version of this content. It is usually all lowercase and contains only letters, numbers, and hyphens. This option is used for one page template',
    		),
    		'image1' => array(
    			'title' => 'Image 1',
    			'type' => 'file',
    			'desc' => 'Upload image you want to display for this content',
    		),
    		'image2' => array(
    			'title' => 'Image 2',
    			'type' => 'file',
    			'desc' => 'Upload image you want to display for this content',
    		),
    		'display_caption' => array(
    			'title' => 'Display caption and description',
    			'type' => 'select',
    			'options' => array(
    				1 => 'Yes',
    				0 => 'No'
    			),
    			'desc' => '',
    		),
    		'padding' => array(
    			'title' => 'Content Padding',
    			'type' => 'jslider',
    			"std" => "30",
				"min" => 0,
				"max" => 200,
				"step" => 5,
    			'desc' => 'Select padding top and bottom value for this header block',
    		),
    		'bgcolor' => array(
    			'title' => 'Background Color',
    			'type' => 'colorpicker',
    			"std" => "#f9f9f9",
    			'desc' => 'Select background color for this header block',
    		),
    		'custom_css' => array(
    			'title' => 'Custom CSS',
    			'type' => 'text',
    			'desc' => 'You can add custom CSS style for this block (advanced user only)',
    		),
    	),
    	'desc' => array(),
    	'content' => FALSE
    ),
    'ppb_three_cols_images' => array(
    	'title' =>  'Images Three Columns',
    	'icon' => 'images_three_cols.png',
    	'attr' => array(
    		'slug' => array(
    			'title' => 'Slug (Optional)',
    			'type' => 'text',
    			'desc' => 'The "slug" is the URL-friendly version of this content. It is usually all lowercase and contains only letters, numbers, and hyphens. This option is used for one page template',
    		),
    		'image1' => array(
    			'title' => 'Image 1',
    			'type' => 'file',
    			'desc' => 'Upload image you want to display for this content',
    		),
    		'image2' => array(
    			'title' => 'Image 2',
    			'type' => 'file',
    			'desc' => 'Upload image you want to display for this content',
    		),
    		'image3' => array(
    			'title' => 'Image 3',
    			'type' => 'file',
    			'desc' => 'Upload image you want to display for this content',
    		),
    		'display_caption' => array(
    			'title' => 'Display caption and description',
    			'type' => 'select',
    			'options' => array(
    				1 => 'Yes',
    				0 => 'No'
    			),
    			'desc' => '',
    		),
    		'padding' => array(
    			'title' => 'Content Padding',
    			'type' => 'jslider',
    			"std" => "30",
				"min" => 0,
				"max" => 200,
				"step" => 5,
    			'desc' => 'Select padding top and bottom value for this header block',
    		),
    		'bgcolor' => array(
    			'title' => 'Background Color',
    			'type' => 'colorpicker',
    			"std" => "#f9f9f9",
    			'desc' => 'Select background color for this header block',
    		),
    		'custom_css' => array(
    			'title' => 'Custom CSS',
    			'type' => 'text',
    			'desc' => 'You can add custom CSS style for this block (advanced user only)',
    		),
    	),
    	'desc' => array(),
    	'content' => FALSE
    ),
    'ppb_three_images_block' => array(
    	'title' =>  'Images Three blocks',
    	'icon' => 'images_three_block.png',
    	'attr' => array(
    		'slug' => array(
    			'title' => 'Slug (Optional)',
    			'type' => 'text',
    			'desc' => 'The "slug" is the URL-friendly version of this content. It is usually all lowercase and contains only letters, numbers, and hyphens. This option is used for one page template',
    		),
    		'image_portrait' => array(
    			'title' => 'Image Portrait',
    			'type' => 'file',
    			'desc' => 'Upload image you want to display for this content (Portrait image size)',
    		),
    		'image_portrait_align' => array(
    			'title' => 'Image Portrait alignment',
    			'type' => 'select',
    			'options' => array(
    				'left' => 'Left',
    				'right' => 'Right'
    			),
    			'desc' => 'Select the alignment for image portrait size',
    		),
    		'image2' => array(
    			'title' => 'Image 2',
    			'type' => 'file',
    			'desc' => 'Upload image you want to display for this content',
    		),
    		'image3' => array(
    			'title' => 'Image 3',
    			'type' => 'file',
    			'desc' => 'Upload image you want to display for this content',
    		),
    		'display_caption' => array(
    			'title' => 'Display caption and description',
    			'type' => 'select',
    			'options' => array(
    				1 => 'Yes',
    				0 => 'No'
    			),
    			'desc' => '',
    		),
    		'padding' => array(
    			'title' => 'Content Padding',
    			'type' => 'jslider',
    			"std" => "30",
				"min" => 0,
				"max" => 200,
				"step" => 5,
    			'desc' => 'Select padding top and bottom value for this header block',
    		),
    		'bgcolor' => array(
    			'title' => 'Background Color',
    			'type' => 'colorpicker',
    			"std" => "#f9f9f9",
    			'desc' => 'Select background color for this header block',
    		),
    		'custom_css' => array(
    			'title' => 'Custom CSS',
    			'type' => 'text',
    			'desc' => 'You can add custom CSS style for this block (advanced user only)',
    		),
    	),
    	'desc' => array(),
    	'content' => FALSE
    ),
    'ppb_four_images_block' => array(
    	'title' =>  'Images Four blocks',
    	'icon' => 'images_four_block.png',
    	'attr' => array(
    		'slug' => array(
    			'title' => 'Slug (Optional)',
    			'type' => 'text',
    			'desc' => 'The "slug" is the URL-friendly version of this content. It is usually all lowercase and contains only letters, numbers, and hyphens. This option is used for one page template',
    		),
    		'image1' => array(
    			'title' => 'Image 1',
    			'type' => 'file',
    			'desc' => 'Upload image you want to display for this content',
    		),
    		'image2' => array(
    			'title' => 'Image 2',
    			'type' => 'file',
    			'desc' => 'Upload image you want to display for this content',
    		),
    		'image3' => array(
    			'title' => 'Image 3',
    			'type' => 'file',
    			'desc' => 'Upload image you want to display for this content',
    		),
    		'image4' => array(
    			'title' => 'Image 4',
    			'type' => 'file',
    			'desc' => 'Upload image you want to display for this content',
    		),
    		'display_caption' => array(
    			'title' => 'Display caption and description',
    			'type' => 'select',
    			'options' => array(
    				1 => 'Yes',
    				0 => 'No'
    			),
    			'desc' => '',
    		),
    		'padding' => array(
    			'title' => 'Content Padding',
    			'type' => 'jslider',
    			"std" => "30",
				"min" => 0,
				"max" => 200,
				"step" => 5,
    			'desc' => 'Select padding top and bottom value for this header block',
    		),
    		'bgcolor' => array(
    			'title' => 'Background Color',
    			'type' => 'colorpicker',
    			"std" => "#f9f9f9",
    			'desc' => 'Select background color for this header block',
    		),
    		'custom_css' => array(
    			'title' => 'Custom CSS',
    			'type' => 'text',
    			'desc' => 'You can add custom CSS style for this block (advanced user only)',
    		),
    	),
    	'desc' => array(),
    	'content' => FALSE
    ),
    'ppb_fullwidth_button' => array(
    	'title' =>  'Full Width Button',
    	'icon' => 'fullwidth_button.png',
    	'attr' => array(
    		'slug' => array(
    			'title' => 'Slug (Optional)',
    			'type' => 'text',
    			'desc' => 'The "slug" is the URL-friendly version of this content. It is usually all lowercase and contains only letters, numbers, and hyphens. This option is used for one page template',
    		),
    		'padding' => array(
    			'title' => 'Button Padding',
    			'type' => 'jslider',
    			"std" => "30",
				"min" => 0,
				"max" => 200,
				"step" => 5,
    			'desc' => 'Select padding top and bottom value for this content block',
    		),
    		'bgcolor' => array(
    			'title' => 'Background Color',
    			'type' => 'colorpicker',
    			"std" => "#f9f9f9",
    			'desc' => 'Select background color for this header block',
    		),
    		'fontcolor' => array(
    			'title' => 'Font Color',
    			'type' => 'colorpicker',
    			"std" => "#000000",
    			'desc' => 'Select font color for title and subtitle',
    		),
    		'button_text' => array(
    			'title' => 'Button Text (Optional)',
    			'type' => 'text',
    			'desc' => 'Enter text for button',
    		),
    		'link_url' => array(
    			'title' => 'Button Link URL (Optional)',
    			'type' => 'text',
    			'desc' => 'Enter redirected link URL when button is clicked',
    		),
    		'button_bgcolor' => array(
    			'title' => 'Button Background Color',
    			'type' => 'colorpicker',
    			"std" => "#000000",
    			'desc' => 'Select background color for button',
    		),
    		'button_fontcolor' => array(
    			'title' => 'Font Color',
    			'type' => 'colorpicker',
    			"std" => "#ffffff",
    			'desc' => 'Select font color for button',
    		),
    	),
    	'desc' => array(),
    	'content' => FALSE
    ),
    
    2 => array(
		'title' => 'Close',
	),
    
    3 => array(
		'title' => 'Contents',
	),
    
    'ppb_gallery_slider' => array(
    	'title' =>  'Gallery Slider Fullwidth',
    	'icon' => 'gallery_slider_full.png',
    	'attr' => array(
    		'slug' => array(
    			'title' => 'Slug (Optional)',
    			'type' => 'text',
    			'desc' => 'The "slug" is the URL-friendly version of this content. It is usually all lowercase and contains only letters, numbers, and hyphens. This option is used for one page template',
    		),
    		'gallery' => array(
    			'title' => 'Gallery',
    			'type' => 'select',
    			'options' => $galleries_select,
    			'desc' => 'Select the gallery you want to display',
    		),
    		'autoplay' => array(
    			'title' => 'Auto Play',
    			'type' => 'select',
    			'options' => array(
    				1 => 'Yes',
    				0 => 'No'
    			),
    			'desc' => 'Auto play gallery image slider',
    		),
    		'timer' => array(
    			'title' => 'Timer',
    			'type' => 'jslider',
    			"std" => "5",
				"min" => 1,
				"max" => 60,
				"step" => 1,
    			'desc' => 'Select number of seconds for slider timer',
    		),
    		'caption' => array(
    			'title' => 'Display Image Caption',
    			'type' => 'select',
    			'options' => array(
    				1 => 'Yes',
    				0 => 'No'
    			),
    			'desc' => 'Display gallery image caption',
    		),
    		'padding' => array(
    			'title' => 'Content Padding',
    			'type' => 'jslider',
    			"std" => "30",
				"min" => 0,
				"max" => 200,
				"step" => 5,
    			'desc' => 'Select padding top and bottom value for this header block',
    		),
    		'custom_css' => array(
    			'title' => 'Custom CSS',
    			'type' => 'text',
    			'desc' => 'You can add custom CSS style for this block (advanced user only)',
    		),
    	),
    	'desc' => array(),
    	'content' => FALSE
    ),
    'ppb_gallery_slider_fixed_width' => array(
    	'title' =>  'Gallery Slider Fixed Width',
    	'icon' => 'gallery_slider_fixed.png',
    	'attr' => array(
    		'slug' => array(
    			'title' => 'Slug (Optional)',
    			'type' => 'text',
    			'desc' => 'The "slug" is the URL-friendly version of this content. It is usually all lowercase and contains only letters, numbers, and hyphens. This option is used for one page template',
    		),
    		'gallery' => array(
    			'title' => 'Gallery',
    			'type' => 'select',
    			'options' => $galleries_select,
    			'desc' => 'Select the gallery you want to display',
    		),
    		'autoplay' => array(
    			'title' => 'Auto Play',
    			'type' => 'select',
    			'options' => array(
    				1 => 'Yes',
    				0 => 'No'
    			),
    			'desc' => 'Auto play gallery image slider',
    		),
    		'timer' => array(
    			'title' => 'Timer',
    			'type' => 'jslider',
    			"std" => "5",
				"min" => 1,
				"max" => 60,
				"step" => 1,
    			'desc' => 'Select number of seconds for slider timer',
    		),
    		'caption' => array(
    			'title' => 'Display Image Caption',
    			'type' => 'select',
    			'options' => array(
    				1 => 'Yes',
    				0 => 'No'
    			),
    			'desc' => 'Display gallery image caption',
    		),
    		'padding' => array(
    			'title' => 'Content Padding',
    			'type' => 'jslider',
    			"std" => "30",
				"min" => 0,
				"max" => 200,
				"step" => 5,
    			'desc' => 'Select padding top and bottom value for this header block',
    		),
    		'bgcolor' => array(
    			'title' => 'Background Color',
    			'type' => 'colorpicker',
    			"std" => "#f9f9f9",
    			'desc' => 'Select background color for this header block',
    		),
    		'custom_css' => array(
    			'title' => 'Custom CSS',
    			'type' => 'text',
    			'desc' => 'You can add custom CSS style for this block (advanced user only)',
    		),
    	),
    	'desc' => array(),
    	'content' => FALSE
    ),
    'ppb_gallery_grid' => array(
    	'title' =>  'Gallery Grid',
    	'icon' => 'gallery_grid.png',
    	'attr' => array(
    		'slug' => array(
    			'title' => 'Slug (Optional)',
    			'type' => 'text',
    			'desc' => 'The "slug" is the URL-friendly version of this content. It is usually all lowercase and contains only letters, numbers, and hyphens. This option is used for one page template',
    		),
    		'gallery_id' => array(
    			'title' => 'Gallery',
    			'type' => 'select',
    			'options' => $galleries_select,
    			'desc' => 'Select the gallery you want to display',
    		),
    		'margin' => array(
    			'title' => 'Margin',
    			'type' => 'select',
    			'options' => array(
    				'' => 'No Margin',
					'true' => 'With Margin',
    			),
    			'desc' => 'Select to display gallery with margin',
    		),
    	),
    	'desc' => array(),
    	'content' => FALSE
    ),
    'ppb_gallery_masonry' => array(
    	'title' =>  'Gallery Masonry',
    	'icon' => 'gallery_masonry.png',
    	'attr' => array(
    		'slug' => array(
    			'title' => 'Slug (Optional)',
    			'type' => 'text',
    			'desc' => 'The "slug" is the URL-friendly version of this content. It is usually all lowercase and contains only letters, numbers, and hyphens. This option is used for one page template',
    		),
    		'gallery_id' => array(
    			'title' => 'Gallery',
    			'type' => 'select',
    			'options' => $galleries_select,
    			'desc' => 'Select the gallery you want to display',
    		),
    		'margin' => array(
    			'title' => 'Margin',
    			'type' => 'select',
    			'options' => array(
    				'' => 'No Margin',
					'true' => 'With Margin',
    			),
    			'desc' => 'Select to display gallery with margin',
    		),
    	),
    	'desc' => array(),
    	'content' => FALSE
    ),
    'ppb_portfolio_slider' => array(
    	'title' =>  'Project Slider',
    	'icon' => 'portfolio_slider.png',
    	'attr' => array(
    		'slug' => array(
    			'title' => 'Slug (Optional)',
    			'type' => 'text',
    			'desc' => 'The "slug" is the URL-friendly version of this content. It is usually all lowercase and contains only letters, numbers, and hyphens. This option is used for one page template',
    		),
    		'sector' => array(
    			'title' => 'Filter by project sector (Optional)',
    			'type' => 'select',
    			'options' => $projectsectors_select,
    			'desc' => 'You can choose to display only some project items from selected project sector',
    		),
    		'service' => array(
    			'title' => 'Filter by project service (Optional)',
    			'type' => 'select',
    			'options' => $projectservices_select,
    			'desc' => 'You can choose to display only some project items from selected project service',
    		),
    		'order' => array(
    			'title' => 'Order By',
    			'type' => 'select',
    			'options' => $order_select,
    			'desc' => 'Select how you want to order project items',
    		),
    		'items' => array(
    			'type' => 'jslider',
    			"std" => "9",
				"min" => 0,
				"max" => 100,
				"step" => 1,
    			'desc' => 'Enter number of items to display',
    		),
    		'custom_css' => array(
    			'title' => 'Custom CSS',
    			'type' => 'text',
    			'desc' => 'You can add custom CSS style for this block (advanced user only)',
    		),
    	),
    	'desc' => array(),
    	'content' => FALSE
    ),
    'ppb_portfolio_classic' => array(
    	'title' =>  'Project Classic',
    	'icon' => 'portfolio_classic.png',
    	'attr' => array(
    		'slug' => array(
    			'title' => 'Slug (Optional)',
    			'type' => 'text',
    			'desc' => 'The "slug" is the URL-friendly version of this content. It is usually all lowercase and contains only letters, numbers, and hyphens. This option is used for one page template',
    		),
    		'sector' => array(
    			'title' => 'Filter by project sector (Optional)',
    			'type' => 'select',
    			'options' => $projectsectors_select,
    			'desc' => 'You can choose to display only some project items from selected project sector',
    		),
    		'service' => array(
    			'title' => 'Filter by project service (Optional)',
    			'type' => 'select',
    			'options' => $projectservices_select,
    			'desc' => 'You can choose to display only some project items from selected project service',
    		),
    		'layout' => array(
    			'title' => 'Layout',
    			'type' => 'select',
    			'options' => $portfolio_layout_select,
    			'desc' => 'Select layout you want to display project wrapper',
    		),
    		'order' => array(
    			'title' => 'Order By',
    			'type' => 'select',
    			'options' => $order_select,
    			'desc' => 'Select how you want to order project items',
    		),
    		'items' => array(
    			'type' => 'jslider',
    			"std" => "9",
				"min" => 0,
				"max" => 100,
				"step" => 1,
    			'desc' => 'Enter number of items to display',
    		),
    		'custom_css' => array(
    			'title' => 'Custom CSS',
    			'type' => 'text',
    			'desc' => 'You can add custom CSS style for this block (advanced user only)',
    		),
    	),
    	'desc' => array(),
    	'content' => FALSE
    ),
    'ppb_portfolio_classic_masonry' => array(
    	'title' =>  'Project Classic Masonry',
    	'icon' => 'portfolio_classic_masonry.png',
    	'attr' => array(
    		'slug' => array(
    			'title' => 'Slug (Optional)',
    			'type' => 'text',
    			'desc' => 'The "slug" is the URL-friendly version of this content. It is usually all lowercase and contains only letters, numbers, and hyphens. This option is used for one page template',
    		),
    		'sector' => array(
    			'title' => 'Filter by project sector (Optional)',
    			'type' => 'select',
    			'options' => $projectsectors_select,
    			'desc' => 'You can choose to display only some project items from selected project sector',
    		),
    		'service' => array(
    			'title' => 'Filter by project service (Optional)',
    			'type' => 'select',
    			'options' => $projectservices_select,
    			'desc' => 'You can choose to display only some project items from selected project service',
    		),
    		'layout' => array(
    			'title' => 'Layout',
    			'type' => 'select',
    			'options' => $portfolio_layout_select,
    			'desc' => 'Select layout you want to display project wrapper',
    		),
    		'order' => array(
    			'title' => 'Order By',
    			'type' => 'select',
    			'options' => $order_select,
    			'desc' => 'Select how you want to order project items',
    		),
    		'items' => array(
    			'type' => 'jslider',
    			"std" => "9",
				"min" => 0,
				"max" => 100,
				"step" => 1,
    			'desc' => 'Enter number of items to display',
    		),
    		'custom_css' => array(
    			'title' => 'Custom CSS',
    			'type' => 'text',
    			'desc' => 'You can add custom CSS style for this block (advanced user only)',
    		),
    	),
    	'desc' => array(),
    	'content' => FALSE
    ),
    'ppb_portfolio_grid' => array(
    	'title' =>  'Project Grid',
    	'icon' => 'gallery_grid.png',
    	'attr' => array(
    		'slug' => array(
    			'title' => 'Slug (Optional)',
    			'type' => 'text',
    			'desc' => 'The "slug" is the URL-friendly version of this content. It is usually all lowercase and contains only letters, numbers, and hyphens. This option is used for one page template',
    		),
    		'sector' => array(
    			'title' => 'Filter by project sector (Optional)',
    			'type' => 'select',
    			'options' => $projectsectors_select,
    			'desc' => 'You can choose to display only some project items from selected project sector',
    		),
    		'service' => array(
    			'title' => 'Filter by project service (Optional)',
    			'type' => 'select',
    			'options' => $projectservices_select,
    			'desc' => 'You can choose to display only some project items from selected project service',
    		),
    		'layout' => array(
    			'title' => 'Layout',
    			'type' => 'select',
    			'options' => $portfolio_layout_select,
    			'desc' => 'Select layout you want to display project wrapper',
    		),
    		'order' => array(
    			'title' => 'Order By',
    			'type' => 'select',
    			'options' => $order_select,
    			'desc' => 'Select how you want to order project items',
    		),
    		'items' => array(
    			'type' => 'jslider',
    			"std" => "9",
				"min" => 0,
				"max" => 100,
				"step" => 1,
    			'desc' => 'Enter number of items to display',
    		),
    		'custom_css' => array(
    			'title' => 'Custom CSS',
    			'type' => 'text',
    			'desc' => 'You can add custom CSS style for this block (advanced user only)',
    		),
    	),
    	'desc' => array(),
    	'content' => FALSE
    ),
    'ppb_portfolio_grid_masonry' => array(
    	'title' =>  'Project Grid Masonry',
    	'icon' => 'gallery_masonry.png',
    	'attr' => array(
    		'slug' => array(
    			'title' => 'Slug (Optional)',
    			'type' => 'text',
    			'desc' => 'The "slug" is the URL-friendly version of this content. It is usually all lowercase and contains only letters, numbers, and hyphens. This option is used for one page template',
    		),
    		'sector' => array(
    			'title' => 'Filter by project sector (Optional)',
    			'type' => 'select',
    			'options' => $projectsectors_select,
    			'desc' => 'You can choose to display only some project items from selected project sector',
    		),
    		'service' => array(
    			'title' => 'Filter by project service (Optional)',
    			'type' => 'select',
    			'options' => $projectservices_select,
    			'desc' => 'You can choose to display only some project items from selected project service',
    		),
    		'layout' => array(
    			'title' => 'Layout',
    			'type' => 'select',
    			'options' => $portfolio_layout_select,
    			'desc' => 'Select layout you want to display project wrapper',
    		),
    		'order' => array(
    			'title' => 'Order By',
    			'type' => 'select',
    			'options' => $order_select,
    			'desc' => 'Select how you want to order project items',
    		),
    		'items' => array(
    			'type' => 'jslider',
    			"std" => "9",
				"min" => 0,
				"max" => 100,
				"step" => 1,
    			'desc' => 'Enter number of items to display',
    		),
    		'custom_css' => array(
    			'title' => 'Custom CSS',
    			'type' => 'text',
    			'desc' => 'You can add custom CSS style for this block (advanced user only)',
    		),
    	),
    	'desc' => array(),
    	'content' => FALSE
    ),
    'ppb_blog_grid' => array(
    	'title' =>  'Blog Grid',
    	'icon' => 'blog.png',
    	'attr' => array(
    		'slug' => array(
    			'title' => 'Slug (Optional)',
    			'type' => 'text',
    			'desc' => 'The "slug" is the URL-friendly version of this content. It is usually all lowercase and contains only letters, numbers, and hyphens. This option is used for one page template',
    		),
    		'cat' => array(
    			'title' => 'Filter by category',
    			'type' => 'select',
    			'options' => $categories_select,
    			'desc' => 'You can choose to display only some posts from selected category',
    		),
    		'items' => array(
    			'type' => 'jslider',
    			"std" => "9",
				"min" => 1,
				"max" => 100,
				"step" => 1,
    			'desc' => 'Enter number of items to display',
    		),
    		'padding' => array(
    			'title' => 'Content Padding',
    			'type' => 'jslider',
    			"std" => "30",
				"min" => 0,
				"max" => 200,
				"step" => 5,
    			'desc' => 'Select padding top and bottom value for this header block',
    		),
    		'link_title' => array(
    			'title' => 'Enter button title (Optional)',
    			'type' => 'text',
    			'desc' => 'Enter link button to display link to your blog page for example. Read more',
    		),
    		'link_url' => array(
    			'title' => 'Button Link URL (Optional)',
    			'type' => 'text',
    			'desc' => 'Enter redirected link URL when button is clicked',
    		),
    		'custom_css' => array(
    			'title' => 'Custom CSS',
    			'type' => 'text',
    			'desc' => 'You can add custom CSS style for this block (advanced user only)',
    		),
    	),
    	'desc' => array(),
    	'content' => FALSE
    ),
    'ppb_blog_minimal' => array(
    	'title' =>  'Blog Minimal',
    	'icon' => 'blog_minimal.png',
    	'attr' => array(
    		'slug' => array(
    			'title' => 'Slug (Optional)',
    			'type' => 'text',
    			'desc' => 'The "slug" is the URL-friendly version of this content. It is usually all lowercase and contains only letters, numbers, and hyphens. This option is used for one page template',
    		),
    		'cat' => array(
    			'title' => 'Filter by category',
    			'type' => 'select',
    			'options' => $categories_select,
    			'desc' => 'You can choose to display only some posts from selected category',
    		),
    		'items' => array(
    			'type' => 'jslider',
    			"std" => "3",
				"min" => 1,
				"max" => 100,
				"step" => 1,
    			'desc' => 'Enter number of items to display',
    		),
    		'padding' => array(
    			'title' => 'Content Padding',
    			'type' => 'jslider',
    			"std" => "30",
				"min" => 0,
				"max" => 200,
				"step" => 5,
    			'desc' => 'Select padding top and bottom value for this header block',
    		),
    		'link_title' => array(
    			'title' => 'Enter button title (Optional)',
    			'type' => 'text',
    			'desc' => 'Enter link button to display link to your blog page for example. Read more',
    		),
    		'link_url' => array(
    			'title' => 'Button Link URL (Optional)',
    			'type' => 'text',
    			'desc' => 'Enter redirected link URL when button is clicked',
    		),
    		'custom_css' => array(
    			'title' => 'Custom CSS',
    			'type' => 'text',
    			'desc' => 'You can add custom CSS style for this block (advanced user only)',
    		),
    	),
    	'desc' => array(),
    	'content' => FALSE
    ),
    'ppb_team_column' => array(
    	'title' =>  'Team Column',
    	'icon' => 'images_three_cols.png',
    	'attr' => array(
    		'slug' => array(
    			'title' => 'Slug (Optional)',
    			'type' => 'text',
    			'desc' => 'The "slug" is the URL-friendly version of this content. It is usually all lowercase and contains only letters, numbers, and hyphens. This option is used for one page template',
    		),
    		'layout' => array(
    			'title' => 'Layout',
    			'type' => 'select',
    			'options' => $team_layout_select,
    			'desc' => 'Select layout you want to display team wrapper',
    		),
    		'cat' => array(
    			'title' => 'Filter by team category',
    			'type' => 'select',
    			'options' => $team_cats_select,
    			'desc' => 'You can choose to display only some team members from selected team category',
    		),
    		'columns' => array(
    			'title' => 'Columns',
    			'type' => 'select',
    			'options' => $team_column_select,
    			'desc' => 'Select how many columns you want to display service items in a row',
    		),
    		'order' => array(
    			'title' => 'Order By',
    			'type' => 'select',
    			'options' => $order_select,
    			'desc' => 'Select how you want to order team members',
    		),
    		'items' => array(
    			'type' => 'jslider',
    			"std" => "5",
				"min" => 1,
				"max" => 50,
				"step" => 1,
    			'desc' => 'Enter number of items to display',
    		),
    		'padding' => array(
    			'title' => 'Content Padding',
    			'type' => 'jslider',
    			"std" => "30",
				"min" => 0,
				"max" => 200,
				"step" => 5,
    			'desc' => 'Select padding top and bottom value for this header block',
    		),
    		'bgcolor' => array(
    			'title' => 'Background Color',
    			'type' => 'colorpicker',
    			"std" => "#f9f9f9",
    			'desc' => 'Select background color for this header block',
    		),
    		'fontcolor' => array(
    			'title' => 'Font Color',
    			'type' => 'colorpicker',
    			"std" => "#000000",
    			'desc' => 'Select font color for content',
    		),
    		'custom_css' => array(
    			'title' => 'Custom CSS',
    			'type' => 'text',
    			'desc' => 'You can add custom CSS style for this block (advanced user only)',
    		),
    	),
    	'desc' => array(),
    	'content' => FALSE
    ),
    'ppb_team_card' => array(
    	'title' =>  'Team Card',
    	'icon' => 'team_card.png',
    	'attr' => array(
    		'slug' => array(
    			'title' => 'Slug (Optional)',
    			'type' => 'text',
    			'desc' => 'The "slug" is the URL-friendly version of this content. It is usually all lowercase and contains only letters, numbers, and hyphens. This option is used for one page template',
    		),
    		'cat' => array(
    			'title' => 'Filter by team category',
    			'type' => 'select',
    			'options' => $team_cats_select,
    			'desc' => 'You can choose to display only some team members from selected team category',
    		),
    		'order' => array(
    			'title' => 'Order By',
    			'type' => 'select',
    			'options' => $order_select,
    			'desc' => 'Select how you want to order team members',
    		),
    		'items' => array(
    			'type' => 'jslider',
    			"std" => "5",
				"min" => 1,
				"max" => 50,
				"step" => 1,
    			'desc' => 'Enter number of items to display',
    		),
    		'padding' => array(
    			'title' => 'Content Padding',
    			'type' => 'jslider',
    			"std" => "30",
				"min" => 0,
				"max" => 200,
				"step" => 5,
    			'desc' => 'Select padding top and bottom value for this header block',
    		),
    		'bgcolor' => array(
    			'title' => 'Background Color',
    			'type' => 'colorpicker',
    			"std" => "#f9f9f9",
    			'desc' => 'Select background color for this header block',
    		),
    		'card_bgcolor' => array(
    			'title' => 'Card Background Color',
    			'type' => 'colorpicker',
    			"std" => "#f9f9f9",
    			'desc' => 'Select background color for this header block',
    		),
    		'fontcolor' => array(
    			'title' => 'Font Color',
    			'type' => 'colorpicker',
    			"std" => "#000000",
    			'desc' => 'Select font color for content',
    		),
    		'custom_css' => array(
    			'title' => 'Custom CSS',
    			'type' => 'text',
    			'desc' => 'You can add custom CSS style for this block (advanced user only)',
    		),
    	),
    	'desc' => array(),
    	'content' => FALSE
    ),
    'ppb_client_slider' => array(
    	'title' =>  'Client Slider',
    	'icon' => 'client_slider.png',
    	'attr' => array(
    		'slug' => array(
    			'title' => 'Slug (Optional)',
    			'type' => 'text',
    			'desc' => 'The "slug" is the URL-friendly version of this content. It is usually all lowercase and contains only letters, numbers, and hyphens. This option is used for one page template',
    		),
    		'layout' => array(
    			'title' => 'Layout',
    			'type' => 'select',
    			'options' => $client_layout_select,
    			'desc' => 'Select layout you want to display client wrapper',
    		),
    		'cat' => array(
    			'title' => 'Filter by client category',
    			'type' => 'select',
    			'options' => $client_cats_select,
    			'desc' => 'You can choose to display only some clients from selected client category',
    		),
    		'items' => array(
    			'title' => 'Items',
    			'type' => 'jslider',
    			"std" => "5",
				"min" => 1,
				"max" => 50,
				"step" => 1,
    			'desc' => 'Enter number of items to display',
    		),
    		'bgcolor' => array(
    			'title' => 'Background Color (Optional)',
    			'type' => 'colorpicker',
    			"std" => "#f9f9f9",
    			'desc' => 'Select background color for this content block',
    		),
    		'padding' => array(
    			'title' => 'Content Padding',
    			'type' => 'jslider',
    			"std" => "30",
				"min" => 0,
				"max" => 200,
				"step" => 5,
    			'desc' => 'Select padding top and bottom value for this header block',
    		),
    		'custom_css' => array(
    			'title' => 'Custom CSS',
    			'type' => 'text',
    			'desc' => 'You can add custom CSS style for this block (advanced user only)',
    		),
    	),
    	'desc' => array(),
    	'content' => FALSE
    ),
    'ppb_testimonial_slider' => array(
    	'title' =>  'Testimonials Slider',
    	'icon' => 'testimonial_slider.png',
    	'attr' => array(
    		'slug' => array(
    			'title' => 'Slug (Optional)',
    			'type' => 'text',
    			'desc' => 'The "slug" is the URL-friendly version of this content. It is usually all lowercase and contains only letters, numbers, and hyphens. This option is used for one page template',
    		),
    		'cat' => array(
    			'title' => 'Filter by testimonials category',
    			'type' => 'select',
    			'options' => $testimonial_cats_select,
    			'desc' => 'You can choose to display only some testimonials from selected testimonial category',
    		),
    		'items' => array(
    			'type' => 'jslider',
    			"std" => "3",
				"min" => 1,
				"max" => 50,
				"step" => 1,
    			'desc' => 'Enter number of items to display',
    		),
    		'bgcolor' => array(
    			'title' => 'Background Color (Optional)',
    			'type' => 'colorpicker',
    			"std" => "#f9f9f9",
    			'desc' => 'Select background color for this content block',
    		),
    		'fontcolor' => array(
    			'title' => 'Font Color (Optional)',
    			'type' => 'colorpicker',
    			"std" => "#444444",
    			'desc' => 'Select font color for this content',
    		),
    		'background' => array(
    			'title' => 'Background Image (Optional)',
    			'type' => 'file',
    			'desc' => 'Upload background image you want to display for this content',
    		),
    		'custom_css' => array(
    			'title' => 'Custom CSS',
    			'type' => 'text',
    			'desc' => 'You can add custom CSS style for this block (advanced user only)',
    		),
    	),
    	'desc' => array(),
    	'content' => FALSE
    ),
    'ppb_testimonial_column' => array(
    	'title' =>  'Testimonials Column',
    	'icon' => 'testimonial_column.png',
    	'attr' => array(
    		'slug' => array(
    			'title' => 'Slug (Optional)',
    			'type' => 'text',
    			'desc' => 'The "slug" is the URL-friendly version of this content. It is usually all lowercase and contains only letters, numbers, and hyphens. This option is used for one page template',
    		),
    		'columns' => array(
    			'title' => 'Columns',
    			'type' => 'select',
    			'options' => $testimonial_column_select,
    			'desc' => 'Select how many columns you want to display service items in a row',
    		),
    		'cat' => array(
    			'title' => 'Filter by testimonials category',
    			'type' => 'select',
    			'options' => $testimonial_cats_select,
    			'desc' => 'You can choose to display only some testimonials from selected testimonial category',
    		),
    		'items' => array(
    			'type' => 'jslider',
    			"std" => "4",
				"min" => 1,
				"max" => 50,
				"step" => 1,
    			'desc' => 'Enter number of items to display',
    		),
    		'padding' => array(
    			'title' => 'Content Padding',
    			'type' => 'jslider',
    			"std" => "30",
				"min" => 0,
				"max" => 200,
				"step" => 5,
    			'desc' => 'Select padding top and bottom value for this header block',
    		),
    		'bgcolor' => array(
    			'title' => 'Background Color (Optional)',
    			'type' => 'colorpicker',
    			"std" => "#f9f9f9",
    			'desc' => 'Select background color for this content block',
    		),
    		'fontcolor' => array(
    			'title' => 'Font Color (Optional)',
    			'type' => 'colorpicker',
    			"std" => "#444444",
    			'desc' => 'Select font color for this content',
    		),
    		'custom_css' => array(
    			'title' => 'Custom CSS',
    			'type' => 'text',
    			'desc' => 'You can add custom CSS style for this block (advanced user only)',
    		),
    	),
    	'desc' => array(),
    	'content' => FALSE
    ),
    'ppb_pricing' => array(
			'title' => 'Pricing Table',
			'icon' => 'pricing_table.png',
			'attr' => array(
				'slug' => array(
	    			'title' => 'Slug (Optional)',
	    			'type' => 'text',
	    			'desc' => 'The "slug" is the URL-friendly version of this content. It is usually all lowercase and contains only letters, numbers, and hyphens. This option is used for one page template',
	    		),
	    		'skin' => array(
	    			'title' => 'Skin',
	    			'type' => 'select',
	    			'options' => array(
						'light' => 'Light',
						'normal' => 'Normal',
					),
	    			'desc' => 'Select skin for this content',
	    		),
	    		'cat' => array(
	    			'title' => 'Filter by prciing category',
	    			'type' => 'select',
	    			'options' => $pricing_cat_select,
	    			'desc' => 'You can choose to display only some items from selected pricing category',
	    		),
	    		'columns' => array(
	    			'title' => 'Columns',
	    			'type' => 'select',
	    			'options' => array(
						2 => '2 Columns',
						3 => '3 Columns',
						4 => '4 Columns',
					),
	    			'desc' => 'Select Number of Pricing Columns',
	    		),
	    		'items' => array(
	    			'type' => 'jslider',
	    			"std" => "4",
					"min" => 1,
					"max" => 50,
					"step" => 1,
	    			'desc' => 'Enter number of items to display',
	    		),
	    		'padding' => array(
	    			'title' => 'Content Padding',
	    			'type' => 'jslider',
	    			"std" => "30",
					"min" => 0,
					"max" => 200,
					"step" => 5,
	    			'desc' => 'Select padding top and bottom value for this header block',
	    		),
	    		'highlightcolor' => array(
	    			'title' => 'Highlight Color',
	    			'type' => 'colorpicker',
	    			"std" => "#001d2c",
	    			'desc' => 'Select hightlight color for this content',
	    		),
	    		'bgcolor' => array(
	    			'title' => 'Background Color (Optional)',
	    			'type' => 'colorpicker',
	    			"std" => "#f9f9f9",
	    			'desc' => 'Select background color for this content block',
	    		),
	    		'custom_css' => array(
	    			'title' => 'Custom CSS',
	    			'type' => 'text',
	    			'desc' => 'You can add custom CSS style for this block (advanced user only)',
	    		),
	    	),
	    	'desc' => array(),
	    	'content' => FALSE
		),
    'ppb_contact_map' => array(
    	'title' =>  'Contact Form With Map',
    	'icon' => 'contact_map.png',
    	'attr' => array(
    		'slug' => array(
	    	    'title' => 'Slug (Optional)',
	    	    'type' => 'text',
	    	    'desc' => 'The "slug" is the URL-friendly version of this content. It is usually all lowercase and contains only letters, numbers, and hyphens. This option is used for one page template',
	    	),
    		'subtitle' => array(
    			'title' => 'Sub Title (Optional)',
    			'type' => 'text',
    			'desc' => 'Enter short description for this header',
    		),
    		'type' => array(
    			'title' => 'Map Type',
    			'type' => 'select',
    			'options' => array(
					'ROADMAP' => 'Roadmap',
					'SATELLITE' => 'Satellite',
					'HYBRID' => 'Hybrid',
					'TERRAIN' => 'Terrain',
				),
    			'desc' => 'Select google map type',
    		),
    		'lat' => array(
    			'title' => 'Latitude',
    			'type' => 'text',
    			'desc' => 'Map latitude <a href="http://www.tech-recipes.com/rx/5519/the-easy-way-to-find-latitude-and-longitude-values-in-google-maps/">Find here</a>',
    		),
    		'long' => array(
    			'title' => 'Longtitude',
    			'type' => 'text',
    			'desc' => 'Map longitude <a href="http://www.tech-recipes.com/rx/5519/the-easy-way-to-find-latitude-and-longitude-values-in-google-maps/">Find here</a>',
    		),
    		'zoom' => array(
    			'title' => 'Zoom Level',
    			'type' => 'jslider',
    			"std" => "8",
				"min" => 1,
				"max" => 16,
				"step" => 1,
    			'desc' => 'Enter zoom level',
    		),
    		'popup' => array(
    			'title' => 'Popup Text',
    			'type' => 'text',
    			'desc' => 'Enter text to display as popup above location on map for example. your company name',
    		),
    		'marker' => array(
    			'title' => 'Custom Marker Icon (Optional)',
    			'type' => 'file',
    			'desc' => 'Enter custom marker image URL',
    		),
    		'bgcolor' => array(
    			'title' => 'Background Color (Optional)',
    			'type' => 'colorpicker',
    			"std" => "#f9f9f9",
    			'desc' => 'Select background color for this content block',
    		),
    		'fontcolor' => array(
    			'title' => 'Font Color (Optional)',
    			'type' => 'colorpicker',
    			"std" => "#444444",
    			'desc' => 'Select font color for this content',
    		),
    		'buttonbgcolor' => array(
    			'title' => 'Button Background Color (Optional)',
    			'type' => 'colorpicker',
    			"std" => "#000000",
    			'desc' => 'Select background color for contact form button',
    		),
    		'custom_css' => array(
    			'title' => 'Custom CSS',
    			'type' => 'text',
    			'desc' => 'You can add custom CSS style for this block (advanced user only)',
    		),
    	),
    	'desc' => array(),
    	'content' => TRUE
    ),
    'ppb_contact_sidebar' => array(
    	'title' =>  'Contact Form With Sidebar',
    	'icon' => 'contact_sidebar.png',
    	'attr' => array(
    		'slug' => array(
	    	    'title' => 'Slug (Optional)',
	    	    'type' => 'text',
	    	    'desc' => 'The "slug" is the URL-friendly version of this content. It is usually all lowercase and contains only letters, numbers, and hyphens. This option is used for one page template',
	    	),
    		'subtitle' => array(
    			'title' => 'Sub Title (Optional)',
    			'type' => 'text',
    			'desc' => 'Enter short description for this header',
    		),
    		'sidebar' => array(
    			'Title' => 'Content Sidebar',
    			'type' => 'select',
    			'options' => $theme_sidebar,
    			'desc' => 'You can select sidebar to display next to classic blog content',
    		),
    		'padding' => array(
	    	    'title' => 'Content Padding',
	    	    'type' => 'jslider',
	    	    "std" => "30",
			    "min" => 0,
			    "max" => 200,
			    "step" => 5,
	    	    'desc' => 'Select padding top and bottom value for this header block',
	    	),
    		'custom_css' => array(
    			'title' => 'Custom CSS',
    			'type' => 'text',
    			'desc' => 'You can add custom CSS style for this block (advanced user only)',
    		),
    	),
    	'desc' => array(),
    	'content' => TRUE
    ),
    'ppb_map' => array(
    	'title' =>  'Fullwidth Map',
    	'icon' => 'googlemap.png',
    	'attr' => array(
    		'slug' => array(
	    	    'title' => 'Slug (Optional)',
	    	    'type' => 'text',
	    	    'desc' => 'The "slug" is the URL-friendly version of this content. It is usually all lowercase and contains only letters, numbers, and hyphens. This option is used for one page template',
	    	),
    		'type' => array(
    			'title' => 'Map Type',
    			'type' => 'select',
    			'options' => array(
					'ROADMAP' => 'Roadmap',
					'SATELLITE' => 'Satellite',
					'HYBRID' => 'Hybrid',
					'TERRAIN' => 'Terrain',
				),
    			'desc' => 'Select google map type',
    		),
    		'height' => array(
    			'title' => 'Height',
    			'type' => 'jslider',
    			"std" => "600",
				"min" => 10,
				"max" => 1000,
				"step" => 10,
    			'desc' => 'Select map height (in px)',
    		),
    		'lat' => array(
    			'title' => 'Latitude',
    			'type' => 'text',
    			'desc' => 'Map latitude <a href="http://www.tech-recipes.com/rx/5519/the-easy-way-to-find-latitude-and-longitude-values-in-google-maps/">Find here</a>',
    		),
    		'long' => array(
    			'title' => 'Longtitude',
    			'type' => 'text',
    			'desc' => 'Map longitude <a href="http://www.tech-recipes.com/rx/5519/the-easy-way-to-find-latitude-and-longitude-values-in-google-maps/">Find here</a>',
    		),
    		'zoom' => array(
    			'title' => 'Zoom Level',
    			'type' => 'jslider',
    			"std" => "8",
				"min" => 1,
				"max" => 16,
				"step" => 1,
    			'desc' => 'Enter zoom level',
    		),
    		'popup' => array(
    			'title' => 'Popup Text',
    			'type' => 'text',
    			'desc' => 'Enter text to display as popup above location on map for example. your company name',
    		),
    		'marker' => array(
    			'title' => 'Custom Marker Icon (Optional)',
    			'type' => 'file',
    			'desc' => 'Enter custom marker image URL',
    		),
    	),
    	'desc' => array(),
    	'content' => FALSE
    ),
);

//Check if Rev slider is installed	
$revslider = ABSPATH . '/wp-content/plugins/revslider/revslider.php';

// Check if the file is available to prevent warnings
$pp_revslider_activated = file_exists($revslider);

if($pp_revslider_activated)
{
	//Get WPDB Object
	global $wpdb;
	
	// Get Rev Sliders
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	$is_revslider_active = is_plugin_active('revslider/revslider.php');
	$wp_revsliders = array();
	
	if($is_revslider_active)
	{
		$wp_revsliders = array(
			-1		=> "Choose a slide",
		);
		$revslider_objs = new RevSlider();
		$revslider_obj_arr = $revslider_objs->getArrSliders();
		
		foreach($revslider_obj_arr as $revslider_obj)
		{
			$wp_revsliders[$revslider_obj->getAlias()] = $revslider_obj->getTitle();
		}
	}
	
	$ppb_shortcodes['ppb_revslider'] = array(
    	'title' =>  'Revolution Slider',
    	'icon' => 'revslider.png',
    	'attr' => array(
    		'slug' => array(
	    	    'title' => 'Slug (Optional)',
	    	    'type' => 'text',
	    	    'desc' => 'The "slug" is the URL-friendly version of this content. It is usually all lowercase and contains only letters, numbers, and hyphens. This option is used for one page template',
	    	),
    		'slider_id' => array(
    			'title' => 'Select Slider to display',
    			'type' => 'select',
    			'options' => $wp_revsliders,
    			'desc' => 'Choose which revolution slider to display (if it\'s empty. You need to create a revolution slider first.)',
    		),
    	),
    	'desc' => array(),
    	'content' => FALSE
    );
}

$ppb_shortcodes[4] = array(
    'title' => 'Close',
);

//Add demo pages layout to import
$ppb_shortcodes[5] = array(
    'title' => 'Demo Pages',
);

$ppb_shortcodes['demo_features'] = array(
	'title' =>  'Features',
	'type' => 'demo_page',
	'file' => 'ConstructorPageFeatures_Export_05-18-2015_1032am.json',
);
$ppb_shortcodes['demo_home1'] = array(
	'title' =>  'Home 1',
	'type' => 'demo_page',
	'file' => 'ConstructorPageHome 1_Export_05-17-2015_0225pm.json',
);
$ppb_shortcodes['demo_home2'] = array(
	'title' =>  'Home 2',
	'type' => 'demo_page',
	'file' => 'ConstructorPageHome 2_Export_05-17-2015_0226pm.json',
);
$ppb_shortcodes['demo_home3'] = array(
	'title' =>  'Home 3',
	'type' => 'demo_page',
	'file' => 'ConstructorPageHome 3_Export_05-17-2015_0227pm.json',
);
$ppb_shortcodes['demo_home4'] = array(
	'title' =>  'Home 4',
	'type' => 'demo_page',
	'file' => 'ConstructorPageHome 4_Export_05-17-2015_0227pm.json',
);
$ppb_shortcodes['demo_about1'] = array(
	'title' =>  'About Us 1',
	'type' => 'demo_page',
	'file' => 'ConstructorPageAbout Us 1_Export_05-17-2015_0217pm.json',
);
$ppb_shortcodes['demo_about2'] = array(
	'title' =>  'About Us 2',
	'type' => 'demo_page',
	'file' => 'ConstructorPageAbout Us 2_Export_05-17-2015_0220pm.json',
);
$ppb_shortcodes['demo_about3'] = array(
	'title' =>  'About Us 3',
	'type' => 'demo_page',
	'file' => 'ConstructorPageAbout Us 3_Export_05-17-2015_0221pm.json',
);
$ppb_shortcodes['demo_testimonials'] = array(
	'title' =>  'Testimonials',
	'type' => 'demo_page',
	'file' => 'ConstructorPageTestimonials_Export_05-17-2015_0229pm.json',
);
$ppb_shortcodes['demo_services'] = array(
	'title' =>  'Services',
	'type' => 'demo_page',
	'file' => 'ConstructorPageAllServices_Export_05-17-2015_0222pm.json',
);
$ppb_shortcodes['demo_contact_sidebar'] = array(
	'title' =>  'Contact With Sidebar',
	'type' => 'demo_page',
	'file' => 'ConstructorPageContactWithSidebar_Export_05-17-2015_0223pm.json',
);
$ppb_shortcodes['demo_contact_map'] = array(
	'title' =>  'Contact With Map',
	'type' => 'demo_page',
	'file' => 'ConstructorPageContactWithMap_Export_05-17-2015_0222pm.json',
);

$ppb_shortcodes[6] = array(
    'title' => 'Close',
);
?>