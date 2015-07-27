<?php 
$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];
require_once( $path_to_wp.'/wp-load.php' );

if(THEMEDEMO)
{
	//Add cache control to custom CSS header
	$max_age = 60*60*24*7; // 24 hours
	$now = gmdate('D, d M Y H:i:s', time()).'GMT';
	$last_modified = get_theme_mod('my_custom_css_last_modified',$now);
	$etag = md5($last_modified);
	
	if (strtotime($s['HTTP_IF_MODIFIED_SINCE']) >= strtotime($last_modified) || $s['HTTP_IF_NONE_MATCH']==$etag) {
	  header('HTTP/1.1 304 Not Modified');
	} else {
	  header('HTTP/1.1 200 Ok');
	  header("Expires: " . gmdate('D, d M Y H:i:s', time()+$max_age.'GMT'));
	  header("Cache-Control: max-age={$mag_age}, public, must-revalidate");
	  header("Last-Modified: {$last_modified}");
	  header("ETag: {$etag}");
	}
}
header('Content-type: text/css');

$pp_advance_combine_css = get_option('pp_advance_combine_css');

if(!empty($pp_advance_combine_css))
{
	//Function for compressing the CSS as tightly as possible
	function compress($buffer) {
	    //Remove CSS comments
	    $buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
	    //Remove tabs, spaces, newlines, etc.
	    $buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $buffer);
	    return $buffer;
	}

	//This GZIPs the CSS for transmission to the user
	//making file size smaller and transfer rate quicker
	ob_start("ob_gzhandler");
	ob_start("compress");
}
?>

<?php
	//Check if hide portfolio navigation
	$pp_portfolio_single_nav = get_option('pp_portfolio_single_nav');
	if(empty($pp_portfolio_single_nav))
	{
?>
.portfolio_nav { display:none; }
<?php
	}
?>
<?php
	$tg_fixed_menu = kirki_get_option('tg_fixed_menu');
	
	if(!empty($tg_fixed_menu))
	{
		//Check if Wordpress admin bar is enabled
		$menu_top_value = 0;
		if(is_admin_bar_showing())
		{
			$menu_top_value = 30;
		}
?>
.top_bar.fixed
{
	position: fixed;
	animation-name: slideDown;
	-webkit-animation-name: slideDown;	
	animation-duration: 0.5s;	
	-webkit-animation-duration: 0.5s;
	z-index: 999;
	visibility: visible !important;
	top: <?php echo intval($menu_top_value); ?>px;
}

<?php
	$pp_menu_font = get_option('pp_menu_font');
	$pp_menu_font_diff = 16-$pp_menu_font;
?>
.top_bar.fixed #menu_wrapper div .nav
{
	margin-top: <?php echo intval($pp_menu_font_diff); ?>px;
}

.top_bar.fixed #searchform
{
	margin-top: <?php echo intval($pp_menu_font_diff-8); ?>px;
}

.top_bar.fixed .header_cart_wrapper
{
	margin-top: <?php echo intval($pp_menu_font_diff+5); ?>px;
}

.top_bar.fixed #menu_wrapper div .nav > li > a
{
	padding-bottom: 24px;
}

.top_bar.fixed .logo_wrapper img
{
	max-height: 40px;
	width: auto;
}
<?php
	}
	
	//Hack animation CSS for Safari
	$current_browser = getBrowser();

	if(isset($current_browser['name']) && $current_browser['name'] == 'Internet Explorer')
	{
?>
#wrapper
{
	overflow-x: hidden;
}
.mobile_menu_wrapper
{
    display: none;
}
body.js_nav .mobile_menu_wrapper 
{
    display: block;
}
.gallery_type, .portfolio_type
{
	opacity: 1;
}
#searchform input[type=text]
{
	width: 75%;
}
.woocommerce .logo_wrapper img
{
	max-width: 50%;
}
<?php
	}
?>

<?php
	if(isset($current_browser['name']) && $current_browser['name'] == 'Internet Explorer' && $current_browser['name'] < 10)
	{
?>
#wrapper
{
	background: red !important;
}
<?php
	}
?>

<?php
	$tg_sidemenu = kirki_get_option('tg_sidemenu');
	
	if(empty($tg_sidemenu))
	{
?>
#mobile_nav_icon
{
    display: none !important;
}
<?php
	}
?>

<?php
//Display Customizer Live CSS Preview
global $wp_customize;
$tg_menu_layout = kirki_get_option('tg_menu_layout');
if(THEMEDEMO && isset($_GET['menu']) && !empty($_GET['menu']))
{
    $tg_menu_layout = $_GET['menu'];
}

if ( !isset( $wp_customize ) ) 
{
	        
	//If extended menu layout
	if($tg_menu_layout == 2)
	{
?>
#nav_wrapper
{
    float: right;
}
.extend_top_contact_info
{
	text-align:right;
	padding-top: 15px;
	display: block;
}
.nav_wrapper_inner
{
	display: block;
}

#menu_wrapper div .nav > li > a
{
	padding-top: 20px !important;
	padding-bottom: 21px !important;
}

.top_contact_info
{
	display: block;
}

#mobile_nav_icon
{
	top: 22px;
}

.top_contact_info span
{
	margin-right: 0;
	margin-left: 10px;
}

#menu_wrapper .nav ul li ul, #menu_wrapper div .nav li ul
{
	margin-top: -1px;
}
<?php
	}
	//If left menu layout
	else if(false)
	{
?>
.ppb_fullwidth_button { text-align: center; }
.ppb_fullwidth_button h2.title { float: none; width: 100%; }
.ppb_fullwidth_button .button { float: none; margin-top: 10px; }
.footer_before_widget .footer_logo.logo_wrapper { margin-top: 0; }
.one_half_bg:not(.nopadding) { padding: 40px !important; } 

@media only screen and (min-width: 961px) {
.logo_wrapper { margin-top: 50px; display: block; }
.logo_wrapper img { transform: scale(0.5); max-height: 100%; }
#nav_wrapper { float: left; display: block; margin-left: 0; margin-top: 20px; height: auto; } 
#wrapper { padding-top: 0; }
body.error404 #wrapper { padding-top: 50px !important; }
.header_style_wrapper { width: 265px; min-height: 100%; height: 100%; -webkit-backface-visibility: hidden; }
.header_style_wrapper .top_bar { width: 100%; }
.top_bar { height: 100%; box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.1); }
#menu_wrapper { width: 100% !important; padding: 0 !important; }
#page_content_wrapper, .ppb_wrapper, #page_caption, #page_caption.hasbg { width: calc(100% - 265px) !important; margin-left: 265px !important; box-sizing: border-box; max-width: 100%; padding: 0; } 
#page_content_wrapper .inner .sidebar_content.full_width
{
	width: calc(100% - 265px) !important;
}
#page_content_wrapper .inner .sidebar_content.full_width.fixed_column
{
	width: 100% !important;
}
#page_caption.hasbg .page_title_wrapper { 100%; }
.logo_wrapper { width: 100%; text-align: center; }
#menu_wrapper .nav ul li, #menu_wrapper div .nav li, #menu_wrapper .nav ul li a, #menu_wrapper div .nav li > a { width: 100%; box-sizing: border-box; }
#menu_wrapper .nav ul li a, #menu_wrapper div .nav li > a { padding: 15px 40px 15px 40px;  }
#menu_wrapper .nav ul li ul, #menu_wrapper div .nav li ul { margin: -65px 0 0 265px; }
#menu_wrapper .nav li.arrow > a:after, #menu_wrapper div .nav li.arrow > a:after { display: none; }
.top_bar .company_info { padding: 0 60px 0 60px; box-sizing: border-box; margin-top: 30px; }
#menu_wrapper .nav ul li ul li a, #menu_wrapper div .nav li ul li a, #menu_wrapper div .nav li.current-menu-parent ul li a { width: 100%; box-sizing: border-box; }
#page_content_wrapper .inner .inner_wrapper { padding: 40px 40px 0 40px; box-sizing: border-box; }
#page_content_wrapper .inner .sidebar_content.full_width, .page_content_wrapper .inner .sidebar_content.full_width, #page_content_wrapper .inner .sidebar_content.full_width .sidebar_content { width: 100%; }
#page_content_wrapper .inner .sidebar_content, .page_content_wrapper .inner .sidebar_content { width: 70%; margin-right: 0; }
#page_content_wrapper .inner .sidebar_content.left_sidebar, .page_content_wrapper .inner .sidebar_content.left_sidebar { padding-left: 4%; }
#page_content_wrapper .inner .sidebar_wrapper, .page_content_wrapper .inner .sidebar_wrapper { width: 22%; margin-left: 4%; }
#page_content_wrapper .inner .sidebar_wrapper.left_sidebar { width: 23%; }
.post_share_bubble { right: 0; left: 30px; }
.footer_bar { margin-left: 265px; width: auto; border-bottom: 0; }
.footer_bar_wrapper { width: auto; padding-left: 30px; padding-right: 30px; }
#footer { box-shadow: none; }
#footer ul.sidebar_widget { width: 100%; padding: 0 40px 0 40px; }
.one .page_content_wrapper { width: 100%; padding: 0 40px 0 40px; box-sizing: border-box; }
.one .page_content_wrapper.nopadding { padding: 0; }
.contact_form_wrapper textarea { width: 95.5% !important; }
#page_content_wrapper.fullwidth #portfolio_filter_wrapper.gallery, #page_content_wrapper.fullwidth .portfolio_filter_wrapper.gallery { margin: 0; width: calc(100% - 265px); }
#portfolio_filter_wrapper.gallery { width: 100%; }
.portfolio_filter_dropdown { float: left; margin-left: 30px; }
.page_content_wrapper .inner, .standard_wrapper, #page_content_wrapper .inner #portfolio_filter_wrapper.sidebar_content { width: 100% !important; padding: 0 !important; max-width: 100%; }
.portfolio_next_prev_wrapper { width: calc(100% - 265px); margin-left: 265px; }
#page_content_wrapper iframe, .page_content_wrapper iframe, #page_content_wrapper img, .page_content_wrapper img { max-width: 100%; }
#page_content_wrapper .inner .sidebar_content.full_width#blog_grid_wrapper, .page_content_wrapper .inner .sidebar_content.full_width.blog_grid_wrapper { width: 100%; }
body.page-template-blog_g-php .post.type-post, body.error404 .post.type-post, body.page-template-galleries-php .galleries.type-galleries, body.tax-gallerycat .galleries.type-galleries, .ppb_blog_posts .post.type-post, body.archive #blog_grid_wrapper .post.type-post { width: 30.6%; }
.post_wrapper.grid_layout .slider_wrapper { min-height: 150px; }
.page_content_wrapper.fullwidth #portfolio_filter_wrapper.gallery, #page_content_wrapper.fullwidth #portfolio_filter_wrapper.gallery, .page_content_wrapper.fullwidth .portfolio_filter_wrapper.gallery, #page_content_wrapper.fullwidth .portfolio_filter_wrapper.gallery { width: 100%; margin: 0; }
.top_contact_info { display: block; padding: 0 40px 0 40px; box-sizing: border-box; text-align: left; margin-top: 30px; }
#menu_wrapper div > .nav > li { border-bottom: 1px solid #e1e1e1; }
#menu_wrapper div > .nav > li:first-child { border-top: 1px solid #e1e1e1; }
#menu_wrapper .nav ul li a, #menu_wrapper div .nav li > i { padding: 0 40px 0 40px; font-size: 12px; font-style:normal; margin-bottom: 10px; display: block; margin-top: -15px; } 
.footer_before_widget .footer_logo.logo_wrapper img { zoom: 100%; } 
.footer_before_widget{ margin-top: 0; } 
#menu_wrapper .nav ul li ul, #menu_wrapper div .nav li ul { border-top: 0px } 
#portfolio_filter_wrapper.gallery, .portfolio_filter_wrapper.gallery { margin-left: 0; }
#menu_wrapper .nav ul li ul li ul, #menu_wrapper div .nav li ul li ul { margin-top: -44px; }
.pagination { margin-left: 40px; }
.pagination_detail { margin-right: 40px; } 
}

@media only screen and (max-width: 960px) {
	.social_wrapper.leftmenu, .company_info { display: none; }
}

@media only screen and (min-width: 768px) and (max-width: 1024px) {
	body.page-template-blog_g-php .post.type-post, body.error404 .post.type-post, body.page-template-galleries-php .galleries.type-galleries, body.tax-gallerycat .galleries.type-galleries, .ppb_blog_posts .post.type-post, body.archive #blog_grid_wrapper .post.type-post
	{
		width: 100%%;
	}
}
@media only screen and (min-width: 1024px) and (max-width: 1090px) {
	body.page-template-blog_g-php .post.type-post, body.error404 .post.type-post, body.page-template-galleries-php .galleries.type-galleries, body.tax-gallerycat .galleries.type-galleries, .ppb_blog_posts .post.type-post, body.archive #blog_grid_wrapper .post.type-post
	{
		width: 47%%;
	}
}
@media only screen and (min-width: 1600px) {
	body.page-template-blog_g-php .post.type-post, body.error404 .post.type-post, body.page-template-galleries-php .galleries.type-galleries, body.tax-gallerycat .galleries.type-galleries, .ppb_blog_posts .post.type-post, body.archive #blog_grid_wrapper .post.type-post
	{
		width: 31.6%%;
	}
}
@media only screen and (min-width: 2000px) {
	body.page-template-blog_g-php .post.type-post, body.error404 .post.type-post, body.page-template-galleries-php .galleries.type-galleries, body.tax-gallerycat .galleries.type-galleries, .ppb_blog_posts .post.type-post, body.archive #blog_grid_wrapper .post.type-post
	{
		width: 32%%;
	}
}
#blog_grid_wrapper.sidebar_content:not(.full_width) .post.type-post
{
	width: 100%;
}
#page_content_wrapper .inner #blog_grid_wrapper.sidebar_content { width: 70%; margin-right: 0; }


@media only screen and (max-width: 1019px) {
	.three_cols.gallery .element { width: 47%; }
}

#page_content_wrapper .inner .sidebar_content #commentform p.comment-form-author, #page_content_wrapper .inner .sidebar_content #commentform p.comment-form-email, #page_content_wrapper .inner .sidebar_content #commentform p.comment-form-url { width: 29.4%; }
#commentform p.comment-form-author, #commentform p.comment-form-email, #commentform p.comment-form-url { width: 30.6%; }
}
<?php
	}
}
?>

<?php
/**
*	Get custom CSS for Desktop View
**/
$pp_custom_css = get_option('pp_custom_css');


if(!empty($pp_custom_css))
{
    echo stripslashes($pp_custom_css);
}
?>

<?php
/**
*	Get custom CSS for iPad Portrait View
**/
$pp_custom_css_tablet_portrait = get_option('pp_custom_css_tablet_portrait');


if(!empty($pp_custom_css_tablet_portrait))
{
?>
@media only screen and (min-width: 768px) and (max-width: 959px) {
<?php
    echo stripslashes($pp_custom_css_tablet_portrait);
?>
}
<?php
}
?>

<?php
/**
*	Get custom CSS for iPhone Portrait View
**/
$pp_custom_css_mobile_portrait = get_option('pp_custom_css_mobile_portrait');


if(!empty($pp_custom_css_mobile_portrait))
{
?>
@media only screen and (max-width: 767px) {
<?php
    echo stripslashes($pp_custom_css_mobile_portrait);
?>
}
<?php
}
?>

<?php
/**
*	Get custom CSS for iPhone Landscape View
**/
$pp_custom_css_mobile_landscape = get_option('pp_custom_css_mobile_landscape');


if(!empty($pp_custom_css_tablet_portrait))
{
?>
@media only screen and (min-width: 480px) and (max-width: 767px) {
<?php
    echo stripslashes($pp_custom_css_mobile_landscape);
?>
}
<?php
}
?>

<?php
if(!empty($pp_advance_combine_css))
{
	ob_end_flush();
	ob_end_flush();
}
?>