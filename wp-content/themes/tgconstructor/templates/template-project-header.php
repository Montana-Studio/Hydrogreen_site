<?php
/**
*	Get Current page object
**/
$page = get_page($post->ID);

/**
*	Get current page id
**/

if(!isset($current_page_id) && isset($page->ID))
{
    $current_page_id = $page->ID;
}

//Get page header display setting
$page_title = get_the_title();
$tg_project_header = kirki_get_option('tg_project_header');
$page_menu_transparent = 0;

if(!empty($tg_project_header))
{
	$pp_page_bg = '';
	
	//Get page featured image
	if(has_post_thumbnail($current_page_id, 'full'))
    {
        $image_id = get_post_thumbnail_id($current_page_id); 
        $image_thumb = wp_get_attachment_image_src($image_id, 'full', true);
        
        if(isset($image_thumb[0]) && !empty($image_thumb[0]))
        {
        	$pp_page_bg = $image_thumb[0];
        	$page_menu_transparent = 1;
        }
        
        //Check if add blur effect
		$tg_page_title_img_blur = get_theme_mod('tg_page_title_img_blur');
    }
    
    global $global_pp_topbar;
?>
<div id="page_caption" class="<?php if(!empty($pp_page_bg)) { ?>hasbg parallax<?php } ?> <?php if(!empty($global_pp_topbar)) { ?>withtopbar<?php } ?>">

	<?php if(!empty($pp_page_bg)) { ?>
		<div class="parallax_overlay_header"></div>
		<div id="bg_regular" style="background-image:url(<?php echo esc_url($pp_page_bg); ?>);"></div>
	<?php } ?>
	<?php
	    if(!empty($tg_page_title_img_blur))
	    {
	?>
	<div id="bg_blurred" style="background-image:url(<?php echo get_template_directory_uri().'/modules/blurred.php?src='.esc_url($pp_page_bg); ?>);"></div>
	<?php
	    }
	?>
	
	<div class="page_title_wrapper">
		<div class="page_title_inner">
			<h1 <?php if(!empty($pp_page_bg) && !empty($global_pp_topbar)) { ?>class ="withtopbar"<?php } ?>><?php echo esc_html($page_title); ?></h1>
		</div>
	</div>
</div>
<?php
}
?>

<!-- Begin content -->
<?php
//Check if use page builder
$ppb_enable = get_post_meta($current_page_id, 'ppb_enable', true);

if(empty($ppb_enable))
{
	global $page_content_class;
?>
<div id="page_content_wrapper" class="<?php if(!empty($pp_page_bg)) { ?>hasbg <?php } ?><?php if(!empty($pp_page_bg) && !empty($global_pp_topbar)) { ?>withtopbar <?php } ?><?php if(!empty($page_content_class)) { echo esc_attr($page_content_class); } ?>">
<?php
}
?>