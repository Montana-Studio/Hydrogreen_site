<?php
/**
 * The main template file for display single post portfolio.
 *
 * @package WordPress
*/

if(isset($post->ID))
{
    $current_page_id = $post->ID;
}

get_header(); 

//Include custom header feature
get_template_part("/templates/template-project-header");
?>

<?php
	//Check if use page builder
	$ppb_form_data_order = '';
	$ppb_form_item_arr = array();
	$ppb_enable = get_post_meta($current_page_id, 'ppb_enable', true);
?>

<?php
	if(!empty($ppb_enable))
	{
?>
<div class="ppb_wrapper <?php if(!empty($pp_page_bg)) { ?>hasbg<?php } ?> <?php if(!empty($pp_page_bg) && !empty($global_pp_topbar)) { ?>withtopbar<?php } ?>">
<?php
	tg_apply_builder($current_page_id, 'projects');
?>
</div>
<?php
	}
	else
	{
?>
    
    <div class="inner">

    	<!-- Begin main content -->
    	<div class="inner_wrapper">

	    	<div class="sidebar_content full_width">
	    	
	    		<?php
					if (have_posts())
					{ 
						while (have_posts()) : the_post();
		
						the_content();
		    		    
		    		    endwhile; 
		    		}
		    	?>
		    </div>
		    
    	</div>
    
    </div>
    <!-- End main content -->
   
</div> 
		    	
<?php
} // End if not using content builder
?>
		    
<?php
    $tg_project_next_prev = kirki_get_option('tg_project_next_prev');
    
    if(!empty($tg_project_next_prev))
    {

    $args = array(
    	'before'           => '<p>' . __('Pages:', THEMEDOMAIN),
    	'after'            => '</p>',
    	'link_before'      => '',
    	'link_after'       => '',
    	'next_or_number'   => 'number',
    	'nextpagelink'     => __('Next page', THEMEDOMAIN),
    	'previouspagelink' => __('Previous page', THEMEDOMAIN),
    	'pagelink'         => '%',
    	'echo'             => 1
    );
    wp_link_pages($args);
?>
<?php
    	//Get Previous and Next Post
    	$prev_post = get_previous_post();
    	
    	//If previous post is empty then get last post
    	if(empty($prev_post))
    	{
        	$args = array(
    		    'numberposts' => 1,
    		    'order' => 'ASC',
    		    'orderby' => 'menu_order',
    		    'post_type' => array('projects'),
    		);
    		$prev_post = get_posts($args);
    		
        	$prev_post_bak = $prev_post[0];
        	unset($prev_post);
        	$prev_post = $prev_post_bak;
    	}
    	
    	$next_post = get_next_post();
    	
    	//If next post is empty then get first post
    	if(empty($next_post))
    	{
        	$args = array(
    		    'numberposts' => 1,
    		    'order' => 'DESC',
    		    'orderby' => 'menu_order',
    		    'post_type' => array('projects'),
    		);
    		$next_post = get_posts($args);
        	
        	$next_post_bak = $next_post[0];
        	unset($next_post);
        	$next_post = $next_post_bak;
    	}
?>
<div class="portfolio_next_prev_wrapper">
	<h2 class="ppb_title"><span class="ppb_title_first"><?php _e( 'Other', THEMEDOMAIN ); ?></span><?php _e( 'Projects', THEMEDOMAIN ); ?></h2>
	<div class="page_header_sep"></div>
   <?php
       //Get Previous Post
       if (!empty($prev_post)): 
       
       	$prev_image_thumb = wp_get_attachment_image_src(get_post_thumbnail_id($prev_post->ID), 'gallery_next_prev', true);
       	
       	if(isset($prev_image_thumb[0]) && !empty($prev_image_thumb[0]))
       	{
   ?>
       <div class="portfolio_prev">
           <div class="effect">
           		<img src="<?php echo esc_attr($prev_image_thumb[0]); ?>" alt=""/>
           		<div class="caption">
           			<div>
    	       			<h4><?php echo esc_html($prev_post->post_title); ?></h4>
    	       			<p><?php _e( 'Previous Project', THEMEDOMAIN ); ?></p>
    	       			<a href="<?php echo get_permalink($prev_post->ID); ?>"></a>
           			</div>
           		</div>
           </div>
       </div>
   <?php 
   		}
   		endif; ?>
   <?php
       //Get Next Post
       if (!empty($next_post)): 
       
       $next_image_thumb = wp_get_attachment_image_src(get_post_thumbnail_id($next_post->ID), 'gallery_next_prev', true);
       
       if(isset($next_image_thumb[0]) && !empty($next_image_thumb[0]))
       {
   ?>
   		<div class="portfolio_next">
           <div class="effect">
           		<img src="<?php echo esc_attr($next_image_thumb[0]); ?>" alt=""/>
           		<div class="caption">
           			<div>
    	       			<h4><?php echo esc_html($next_post->post_title); ?></h4>
    	       			<p><?php _e( 'Next Project', THEMEDOMAIN ); ?></p>
    	       			<a href="<?php echo get_permalink($next_post->ID); ?>"></a>
           			</div>
           		</div>
           </div>
       </div>
   <?php 
   		}
   		endif; ?>
</div>
<?php
    
    //If has previous or next post then add line break
    if(!empty($prev_post) OR !empty($next_post))
    {
        echo '<br class="clear"/>';
    }
    
} //End if display previous and next portfolios
?>

<?php
	//Display social sharing
    global $share_id;
    global $share_class;
    $share_id = 'share_post_'.$post->ID;
    $share_class = 'inline';
?>
<div class="post_share_bubble">
    <?php		
    	//Get Social Share
    	get_template_part("/templates/template-share-blog");
    ?>
    <a href="javascript:;" class="post_share" data-share="<?php echo esc_attr($share_id); ?>" data-parent="post-<?php the_ID(); ?>"><i class="fa fa-share-alt"></i></a>
</div>


<?php get_footer(); ?>