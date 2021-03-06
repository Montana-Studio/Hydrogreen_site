<?php
/**
 * The Header for the template.
 *
 * @package WordPress
 */
 
if (!isset( $content_width ) ) $content_width = 1170;

if(session_id() == '') {
	session_start();
}
 
global $pp_homepage_style;
?><!DOCTYPE html>
<html <?php language_attributes(); ?> <?php if(isset($pp_homepage_style) && !empty($pp_homepage_style)) { echo 'data-style="'.esc_attr($pp_homepage_style).'"'; } ?>>
<head>
<meta charset="<?php echo get_bloginfo( 'charset' ); ?>" />

<?php
	$tg_mobile_responsive = kirki_get_option('tg_mobile_responsive');
	
	if(!empty($tg_mobile_responsive))
	{
?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<?php
	}
?>

<meta name="format-detection" content="telephone=no">

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php
if ( ! function_exists( '_wp_render_title_tag' ) ) :
    function tg_render_title() {
?>
<title><?php wp_title(); ?></title>
<?php
    }
    add_action( 'wp_head', 'tg_render_title' );
endif;

if(is_single())
{
	if(has_post_thumbnail(get_the_ID(), 'blog_f'))
	{
	    $image_id = get_post_thumbnail_id(get_the_ID());
	    $fb_thumb = wp_get_attachment_image_src($image_id, 'thumbnail', true);
	}

	if(isset($fb_thumb[0]) && !empty($fb_thumb[0]))
	{
		$post_content = get_post_field('post_excerpt', $post->ID);
	?>
	<meta property="og:image" content="<?php echo esc_url($fb_thumb[0]); ?>"/>
	<meta property="og:title" content="<?php echo esc_attr(get_the_title()); ?>"/>
	<meta property="og:url" content="<?php echo esc_url(get_permalink($post->ID)); ?>"/>
	<meta property="og:description" content="<?php echo esc_attr(strip_tags($post_content)); ?>"/>
	<?php
	}
}
?>

<?php
	/**
	*	Get favicon URL
	**/
	$tg_favicon = kirki_get_option('tg_favicon');
	
	if(!empty($tg_favicon))
	{
?>
		<link rel="shortcut icon" href="<?php echo esc_url($tg_favicon); ?>" />
<?php
	}
?> 
	
<?php
	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/Hydrogreen.css">
</head>

<body <?php body_class(); ?>>
	<?php
		//Display Customizer Live CSS Preview
		global $wp_customize;
		$tg_menu_layout = kirki_get_option('tg_menu_layout');
		
		if ( isset( $wp_customize ) ) 
		{
		    get_template_part("/templates/customizer-css");
		}
	?>
		
	<?php
		//Check if disable right click
		$tg_enable_right_click = kirki_get_option('tg_enable_right_click');
		
		//Check if disable image dragging
		$tg_enable_dragging = kirki_get_option('tg_enable_dragging');
		
		//Check if use AJAX search
		$tg_menu_search_instant = kirki_get_option('tg_menu_search_instant');
		
		//Check if sticky menu
		$tg_fixed_menu = kirki_get_option('tg_fixed_menu');
		
		//Check if display top bar
		$tg_topbar = kirki_get_option('tg_topbar');
		if(THEMEDEMO && isset($_GET['topbar']) && !empty($_GET['topbar']))
		{
			$tg_topbar = true;
		}
		
		//Check if add blur effect
		$tg_page_title_img_blur = kirki_get_option('tg_page_title_img_blur');

		//Check menu layout
		$tg_menu_layout = kirki_get_option('tg_menu_layout');
		switch($tg_menu_layout)
		{
			case 1:
				$pp_menu_layout = 'topmenu';
			break;
			
			case 2:
			default:
				$pp_menu_layout = 'topmenu_fixed';
			break;
			
			case 3:
				$pp_menu_layout = 'leftmenu';
			break;
		}
		
		//Check filterable link option
		$tg_project_filterable_link = kirki_get_option('tg_project_filterable_link');
	?>
	<input type="hidden" id="pp_menu_layout" name="pp_menu_layout" value="<?php echo esc_attr($pp_menu_layout); ?>"/>
	<input type="hidden" id="pp_enable_right_click" name="pp_enable_right_click" value="<?php echo esc_attr($tg_enable_right_click); ?>"/>
	<input type="hidden" id="pp_enable_dragging" name="pp_enable_dragging" value="<?php echo esc_attr($tg_enable_dragging); ?>"/>
	<input type="hidden" id="pp_image_path" name="pp_image_path" value="<?php echo get_template_directory_uri(); ?>/images/"/>
	<input type="hidden" id="pp_homepage_url" name="pp_homepage_url" value="<?php echo esc_url(home_url()); ?>"/>
	<input type="hidden" id="pp_ajax_search" name="pp_ajax_search" value="<?php echo esc_attr($tg_menu_search_instant); ?>"/>
	<input type="hidden" id="pp_fixed_menu" name="pp_fixed_menu" value="<?php echo esc_attr($tg_fixed_menu); ?>"/>
	<input type="hidden" id="pp_topbar" name="pp_topbar" value="<?php echo esc_attr($tg_topbar); ?>"/>
	<input type="hidden" id="post_client_column" name="post_client_column" value="4"/>
	<input type="hidden" id="pp_back" name="pp_back" value="<?php _e( 'Back', THEMEDOMAIN ); ?>"/>
	<input type="hidden" id="pp_page_title_img_blur" name="pp_page_title_img_blur" value="<?php echo esc_attr($tg_page_title_img_blur); ?>"/>
	<input type="hidden" id="tg_project_filterable_link" name="tg_project_filterable_link" value="<?php echo esc_attr($tg_project_filterable_link); ?>"/>
	
	<?php
		//Check footer sidebar columns
		$tg_footer_sidebar = kirki_get_option('tg_footer_sidebar');
	?>
	<input type="hidden" id="pp_footer_style" name="pp_footer_style" value="<?php echo esc_attr($tg_footer_sidebar); ?>"/>
	
	<!-- Begin mobile menu -->
	<div class="mobile_menu_wrapper">
		<a id="close_mobile_menu" href="javascript:;"><i class="fa fa-close"></i></a>
		
		<?php
    	    //Check if display search in header	
    	    $tg_menu_search = kirki_get_option('tg_menu_search');
    	    
    	    if(!empty($tg_menu_search))
    	    {
    	?>
    	<form role="search" method="get" name="searchform" id="searchform" action="<?php echo home_url(); ?>/">
    	    <div>
    	    	<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" autocomplete="off" placeholder="<?php _e( 'Search...', THEMEDOMAIN ); ?>"/>
    	    	<button>
    	        	<i class="fa fa-search"></i>
    	        </button>
    	    </div>
    	    <div id="autocomplete"></div>
    	</form>
    	<?php
    	    }
    	?>
    	
	    <?php 
	    	//Check if has custom menu
			if(is_object($post) && $post->post_type == 'page')
			{
			    $page_menu = get_post_meta($post->ID, 'page_menu', true);
			}	
			
			if ( has_nav_menu( 'side-menu' ) ) 
			{
			    //Get page nav
			    wp_nav_menu( 
			        array( 
			            'menu_id'			=> 'mobile_main_menu',
		                'menu_class'		=> 'mobile_main_nav',
			            'theme_location' 	=> 'side-menu',
			        )
			    ); 
			}
		?>
		
		<!-- Begin side menu sidebar -->
		<div class="page_content_wrapper">
			<div class="sidebar_wrapper">
		        <div class="sidebar">
		        
		        	<div class="content">
		        
		        		<ul class="sidebar_widget">
		        		<?php dynamic_sidebar('Side Menu Sidebar'); ?>
		        		</ul>
		        	
		        	</div>
		    
		        </div>
			</div>
		</div>
		<!-- End side menu sidebar -->
		
		<br class="clear"/>
		<?php
			//Get Soical Icon
			get_template_part("/templates/template-socials");
	    ?>
	</div>
	<!-- End mobile menu -->

	<!-- Begin template wrapper -->
	<?php 
		//Get page ID
		if(is_object($post))
		{
		    $page = get_page($post->ID);
		}
		$current_page_id = '';
		
		if(isset($page->ID))
		{
		    $current_page_id = $page->ID;
		}
		elseif(is_home())
		{
		    $current_page_id = get_option('page_on_front');
		}
		
	    //If enable menu transparent
	    $page_menu_transparent = get_post_meta($current_page_id, 'page_menu_transparent', true);
	    
	    if(is_single() && $post->post_type == 'post')
	    {
	        $tg_blog_header_bg = kirki_get_option('tg_blog_header_bg');
			
			if(!empty($tg_blog_header_bg) && has_post_thumbnail($current_page_id, 'full'))
			{
	    		$page_menu_transparent = 1;
	    	}
	    }
	    
	    if(is_single() && $post->post_type == 'projects')
	    {
	        $tg_project_header = kirki_get_option('tg_project_header');
			
			if(!empty($tg_project_header) && has_post_thumbnail($current_page_id, 'full'))
			{
	    		$page_menu_transparent = 1;
	    	}
	    }

		//Check if Woocommerce is installed	
		if(class_exists('Woocommerce'))
		{
		    //Check if woocommerce page
			if(tg_is_woocommerce_page() && !is_product_category())
			{
				$shop_page_id = get_option( 'woocommerce_shop_page_id' );
				$page_menu_transparent = get_post_meta($shop_page_id, 'page_menu_transparent', true);
			}
			elseif(tg_is_woocommerce_page() && is_product_category())
			{
				$page_menu_transparent = 0;
			}
		}
	    
	    if(is_search())
	    {
		    $page_menu_transparent = 0;
	    }
	    
	    if(is_404())
	    {
		    $page_menu_transparent = 0;
	    }
	?>
	<div id="wrapper" <?php if(!empty($page_menu_transparent)) { ?>class="hasbg"<?php } ?>>
	
	<?php
	    //Get main menu layout
	    $tg_menu_layout = kirki_get_option('tg_menu_layout');
		switch($tg_menu_layout)
		{
			case 1:
	    	case 2:
	    	default:
	    		get_template_part("/templates/template-topmenu");
	    	break;
		}
	?>