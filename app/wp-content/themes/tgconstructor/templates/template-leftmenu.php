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
?>

<div class="header_style_wrapper">
<div class="top_bar">

    <div id="menu_wrapper">
    	
    	<!-- Begin logo -->	
    	<?php
    	   $tg_retina_logo = kirki_get_option('tg_retina_logo');
    	?>
    	<a id="custom_logo" class="logo_wrapper <?php if(!empty($page_menu_transparent)) { ?>hidden<?php } else { ?>default<?php } ?>" href="<?php echo home_url(); ?>">
    	    <img src="<?php echo esc_url($tg_retina_logo); ?>" alt=""/>
    	</a>
    	
    	<!-- End logo -->
    	
        <!-- Begin main nav -->
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
    		    			        		'walker' => new tg_description_walker(),
    		    			        	) 
    		    			    ); 
    		    			}
    		    			else
    		    			{
    			    			echo '<div class="notice">Please setup "Main Menu" using Wordpress Dashboard > Appearance > Menus</div>';
    		    			}
    	    			}
    	    			else
    				    {
    				     	if( $page_menu && is_nav_menu( $page_menu ) ) {  
    						    wp_nav_menu( 
    						        array(
    						            'menu' => $page_menu,
    						            'walker' => new tg_description_walker(),
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
		    </div>
	    </div>

        </div>
    </div>
</div>