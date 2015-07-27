<?php
//Get page ID
if(is_object($post))
{
    $obj_page = get_page($post->ID);
}
$current_page_id = '';

if(isset($obj_page->ID))
{
    $current_page_id = $obj_page->ID;
}
elseif(is_home())
{
    $current_page_id = get_option('page_on_front');
}
?>

<div class="header_style_wrapper">
<?php
    //Check if display top bar
    $tg_topbar = kirki_get_option('tg_topbar');
    if(THEMEDEMO && isset($_GET['topbar']) && !empty($_GET['topbar']))
	{
	    $tg_topbar = true;
	}
    
    global $global_pp_topbar;
    $global_pp_topbar = $tg_topbar;
    
    if(!empty($tg_topbar))
    {
?>

<!-- Begin top bar -->
<div class="above_top_bar">
    <div class="page_content_wrapper">
    	
    <?php
    	//Get Soical Icon
    	get_template_part("/templates/template-socials");
    
    	//Display Top Menu
    	if ( has_nav_menu( 'top-menu' ) ) 
		{
		    wp_nav_menu( 
		        	array( 
		        		'menu_id'			=> 'top_menu',
		        		'menu_class'		=> 'top_nav',
		        		'theme_location' 	=> 'top-menu',
		        	) 
		    ); 
		}
    ?>
    <br class="clear"/>
    </div>
</div>
<?php
    }
?>
<!-- End top bar -->

<?php
    $pp_page_bg = '';
    //Get page featured image
    if(has_post_thumbnail($current_page_id, 'full'))
    {
        $image_id = get_post_thumbnail_id($current_page_id); 
        $image_thumb = wp_get_attachment_image_src($image_id, 'full', true);
        $pp_page_bg = $image_thumb[0];
    }
    
   if(!empty($pp_page_bg) && basename($pp_page_bg)=='default.png')
    {
    	$pp_page_bg = '';
    }
    
    //If enable menu transparent
    $page_menu_transparent = get_post_meta($current_page_id, 'page_menu_transparent', true);
    
    //Check if single post page
    if(is_single() && $post->post_type == 'post')
    {
        $tg_blog_header_bg = kirki_get_option('tg_blog_header_bg');
		
		if(!empty($tg_blog_header_bg) && has_post_thumbnail($current_page_id, 'full'))
		{
    		$page_menu_transparent = 1;
    	}
    }
    
    //Check ifi single project page
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
<div class="top_bar <?php if(!empty($pp_page_bg) && !empty($page_menu_transparent)) { ?>hasbg<?php } ?> <?php if(!empty($page_menu_transparent)) { ?>hasbg<?php } ?>">

    <div id="menu_wrapper">
    	
    	<!-- Begin logo -->
    	<?php
    	    //get custom logo
    	    $tg_retina_logo = kirki_get_option('tg_retina_logo');

    	    if(!empty($tg_retina_logo))
    	    {	
    	    	//Get image width and height
		    	$image_id = pp_get_image_id($tg_retina_logo);
		    	$obj_image = wp_get_attachment_image_src($image_id, 'original');
		    	$image_width = 0;
		    	$image_height = 0;
		    	
		    	if(isset($obj_image[1]))
		    	{
		    		$image_width = intval($obj_image[1]/2);
		    	}
		    	if(isset($obj_image[2]))
		    	{
		    		$image_height = intval($obj_image[2]/2);
		    	}
    	?>
    	<div id="logo_normal" class="logo_container">
    		<div class="logo_align">
	    	    <a id="custom_logo" class="logo_wrapper <?php if(!empty($page_menu_transparent)) { ?>hidden<?php } else { ?>default<?php } ?>" href="<?php echo home_url(); ?>">
	    	    	<?php
						if($image_width > 0 && $image_height > 0)
						{
					?>
					<img src="<?php echo esc_url($tg_retina_logo); ?>" alt="" width="<?php echo $image_width; ?>" height="<?php echo $image_height; ?>"/>
					<?php
						}
						else
						{
					?>
	    	    	<img src="<?php echo esc_url($tg_retina_logo); ?>" alt=""/>
	    	    	<?php 
		    	    	}
		    	    ?>
	    	    </a>
    		</div>
    	</div>
    	<?php
    	    }
    	?>
    	
    	<?php
    		//get custom logo transparent
    	    $tg_retina_transparent_logo = kirki_get_option('tg_retina_transparent_logo');

    	    if(!empty($tg_retina_transparent_logo))
    	    {
    	    	//Get image width and height
		    	$image_id = pp_get_image_id($tg_retina_transparent_logo);
		    	$obj_image = wp_get_attachment_image_src($image_id, 'original');
		    	$image_width = 0;
		    	$image_height = 0;
		    	
		    	if(isset($obj_image[1]))
		    	{
		    		$image_width = intval($obj_image[1]/2);
		    	}
		    	if(isset($obj_image[2]))
		    	{
		    		$image_height = intval($obj_image[2]/2);
		    	}
    	?>
    	<div id="logo_transparent" class="logo_container">
    		<div class="logo_align">
	    	    <a id="custom_logo_transparent" class="logo_wrapper <?php if(empty($page_menu_transparent)) { ?>hidden<?php } else { ?>default<?php } ?>" href="<?php echo home_url(); ?>">
	    	    	<?php
						if($image_width > 0 && $image_height > 0)
						{
					?>
					<img src="<?php echo esc_url($tg_retina_transparent_logo); ?>" alt="" width="<?php echo $image_width; ?>" height="<?php echo $image_height; ?>"/>
					<?php
						}
						else
						{
					?>
	    	    	<img src="<?php echo esc_url($tg_retina_transparent_logo); ?>" alt=""/>
	    	    	<?php 
		    	    	}
		    	    ?>
	    	    </a>
    		</div>
    	</div>
    	<?php
    	    }
    	?>
    	<!-- End logo -->
    	
        <!-- Begin main nav -->
        <?php
	        $tg_menu_layout = kirki_get_option('tg_menu_layout');
	        if(THEMEDEMO && isset($_GET['menu']) && !empty($_GET['menu']))
			{
			    $tg_menu_layout = $_GET['menu'];
			}
	        
	        //If extended menu layout
	        if($tg_menu_layout == 2)
	        {
	    ?>
	    	<div class="extend_top_contact_info top_contact_info">
	    		<?php
				    $tg_menu_contact_hours = kirki_get_option('tg_menu_contact_hours');
				    
				    if(!empty($tg_menu_contact_hours))
				    {	
				?>
				    <span id="top_contact_hours"><i class="fa fa-clock-o"></i><?php echo esc_html($tg_menu_contact_hours); ?></span>
				<?php
				    }
				?>
				<?php
				    //Display top contact info
				    $tg_menu_contact_number = kirki_get_option('tg_menu_contact_number');
				    
				    if(!empty($tg_menu_contact_number))
				    {
				?>
				    <span id="top_contact_number"><a href="tel:<?php echo esc_attr($tg_menu_contact_number); ?>"><i class="fa fa-phone"></i><?php echo esc_html($tg_menu_contact_number); ?></a></span>
				<?php
				    }
				?>
				
				<?php
				if (class_exists('Woocommerce')) {
				    //Check if display cart in header
			
				    global $woocommerce;
				    $cart_url = $woocommerce->cart->get_cart_url();
				    $cart_count = $woocommerce->cart->cart_contents_count;
				?>
				<div class="header_cart_wrapper">
				    <div class="cart_count"><?php echo esc_html($cart_count); ?></div>
				    <a href="<?php echo esc_url($cart_url); ?>"><i class="fa fa-shopping-cart"></i></a>
				</div>
				<?php
				}
				?>
	    	</div>
        
	        <div class="top_contact_info_container">
	        	<div class="top_contact_info">
		    	    <!-- Begin side menu -->
			    	<a href="#" id="mobile_nav_icon"></a>
					<!-- End side menu -->
		    	</div>
	        </div>
	    <?php
	    	}
	    ?>
        
        <div id="nav_wrapper">
        	<div class="nav_wrapper_inner">
        		<div id="menu_border_wrapper">
        			<?php 	
        				//Check if has custom menu
        				if(is_object($post) && $post->post_type == 'page')
    					{
    						$page_menu = get_post_meta($current_page_id, 'page_menu', true);
    					}
        			
        				if(empty($page_menu))
    					{
    						if ( has_nav_menu( 'primary-menu' ) ) 
    						{
    		    			    wp_nav_menu( 
    		    			        	array( 
    		    			        		'menu_id'			=> 'main_menu',
    		    			        		'menu_class'		=> 'nav',
    		    			        		'theme_location' 	=> 'primary-menu',
    		    			        		'walker' => new tg_walker(),
    		    			        	) 
    		    			    ); 
    		    			}
    		    			else
    		    			{
    			    			echo '<div class="notice">'.__( 'Setup Menu via Wordpress Dashboard > Appearance > Menus', THEMEDOMAIN ).'</div>';
    		    			}
    	    			}
    	    			else
    				    {
    				     	if( $page_menu && is_nav_menu( $page_menu ) ) {  
    						    wp_nav_menu( 
    						        array(
    						            'menu' => $page_menu,
    						            'walker' => new tg_walker(),
    						            'menu_id'			=> 'main_menu',
    		    			        	'menu_class'		=> 'nav',
    						        )
    						    );
    						}
    				    }
        			?>
        		</div>
        	</div>
        </div>
        <!-- End main nav -->
        
        <!-- Begin main contact info -->
        <?php
	        $tg_menu_layout = kirki_get_option('tg_menu_layout');
	        if(THEMEDEMO && isset($_GET['menu']) && !empty($_GET['menu']))
			{
			    $tg_menu_layout = $_GET['menu'];
			}
	        
	        //If classic menu layout
	        if($tg_menu_layout == 1)
	        {
	    ?>
        
	        <div class="top_contact_info_container">
	        	<div class="top_contact_info">
		    	    <?php
		    	        $tg_menu_contact_hours = kirki_get_option('tg_menu_contact_hours');
		    	        
		    	        if(!empty($tg_menu_contact_hours))
		    	        {	
		    	    ?>
		    	        <span id="top_contact_hours"><i class="fa fa-clock-o"></i><?php echo esc_html($tg_menu_contact_hours); ?></span>
		    	    <?php
		    	        }
		    	    ?>
		    	    <?php
		    	    	//Display top contact info
		    	    	$tg_menu_contact_number = kirki_get_option('tg_menu_contact_number');
		    	        
		    	        if(!empty($tg_menu_contact_number))
		    	        {
		    	    ?>
		    	        <span id="top_contact_number"><a href="tel:<?php echo esc_attr($tg_menu_contact_number); ?>"><i class="fa fa-phone"></i><?php echo esc_html($tg_menu_contact_number); ?></a></span>
		    	    <?php
		    	        }
		    	    ?>
		    	    
		    	    <!-- Begin side menu -->
			    	<a href="#" id="mobile_nav_icon"></a>
					<!-- End side menu -->
					
					<?php
					if (class_exists('Woocommerce')) {
					    //Check if display cart in header
			
					    global $woocommerce;
					    $cart_url = $woocommerce->cart->get_cart_url();
					    $cart_count = $woocommerce->cart->cart_contents_count;
					?>
					<div class="header_cart_wrapper">
						<div class="cart_count"><?php echo esc_html($cart_count); ?></div>
					    <a href="<?php echo esc_url($cart_url); ?>"><i class="fa fa-shopping-cart"></i></a>
					</div>
					<?php
					}
					?>
		    	</div>
	        </div>
	    <?php
	    	}
	    ?>
    	<!-- End main contact info -->

        </div>
    </div>
</div>