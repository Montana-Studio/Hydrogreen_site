<?php
/**
 * Template Name: Project Grid + Sidebar
 * The main template file for display portfolio page.
 *
 * @package WordPress
*/

/**
/**
*	Get Current page object
**/
if(!is_null($post))
{
	$page_obj = get_page($post->ID);
}

$current_page_id = '';

/**
*	Get current page id
**/

if(!is_null($post) && isset($page_obj->ID))
{
    $current_page_id = $page_obj->ID;
}

$page_sidebar = get_post_meta($current_page_id, 'page_sidebar', true);

//If not select sidebar then select default one
if(empty($page_sidebar))
{
	$page_sidebar = 'Page Sidebar';
}

get_header();
?>
<input type="hidden" id="pp_portfolio_columns" name="pp_portfolio_columns" value="2"/>
<?php
    //Include custom header feature
	get_template_part("/templates/template-header");
?>

<!-- Begin content -->
<?php
	//Get number of portfolios per page
	$tg_project_items = kirki_get_option('tg_project_items');
	
	//Get all portfolio items for paging
	global $wp_query;
	
	if(is_front_page())
	{
	    $paged = (get_query_var('page')) ? get_query_var('page') : 1;
	}
	else
	{
	    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	}
	
	$query_string = 'paged='.$paged.'&orderby=menu_order&order=ASC&post_type=projects&numberposts=-1&suppress_filters=0&posts_per_page='.$tg_project_items;
	/*if(!empty($term))
	{
	    $query_string .= '&posts_per_page=-1&projectservices='.$term;
	}
	else
	{
		$query_string .= '&posts_per_page='.$tg_project_items;
	}*/
	query_posts($query_string);
	
	//Include project filterable options
	get_template_part("/templates/template-project-filterable");
?>
    
<div class="inner">

	<div class="inner_wrapper nopadding">
	
	<div class="sidebar_content portfolio">
	
	<?php
	    if(!empty($post->post_content) && empty($term))
	    {
	?>
	    <?php echo tg_apply_content($post->post_content); ?>
	<?php
	    }
	    elseif(!empty($term))
	    { 
	?>
	    <?php echo tg_apply_content($obj_term->description); ?>
	<?php
	    }
	?>
	
	<div id="portfolio_filter_wrapper" class="sidebar_content three_cols gallery portfolio-content section content clearfix">
	
	<?php
		$key = 0;
		if (have_posts()) : while (have_posts()) : the_post();
			$key++;
			$image_url = '';
			$portfolio_ID = get_the_ID();
					
			if(has_post_thumbnail($portfolio_ID, 'large'))
			{
			    $image_id = get_post_thumbnail_id($portfolio_ID);
			    $image_url = wp_get_attachment_image_src($image_id, 'large', true);
			    
			    $small_image_url = wp_get_attachment_image_src($image_id, 'gallery_grid', true);
			}
			
			$portfolio_link_url = get_post_meta($portfolio_ID, 'portfolio_link_url', true);
			
			if(empty($portfolio_link_url))
			{
			    $permalink_url = get_permalink($portfolio_ID);
			}
			else
			{
			    $permalink_url = $portfolio_link_url;
			}
			
			//Get project service category
			$project_item_service = '';
			$project_item_services = wp_get_object_terms($portfolio_ID, 'projectservices');
			
			if(is_array($project_item_services))
			{
			    foreach($project_item_services as $project_service)
			    {
			    	$project_item_service.= $project_service->slug.' ';
			    }
			}
			
			//Get project sector category
			$project_item_sector = '';
			$project_item_sectors = wp_get_object_terms($portfolio_ID, 'projectsectors');
			
			if(is_array($project_item_sectors))
			{
			    foreach($project_item_sectors as $project_sector)
			    {
			    	$project_item_sector.= $project_sector->slug.' ';
			    }
			}
	?>
	<div class="element grid classic3_cols <?php echo esc_attr($project_item_service); ?> <?php echo esc_attr($project_item_sector); ?>">
	
		<div class="one_third gallery3 filterable gallery_type static animated<?php echo esc_attr($key+1); ?>" data-id="post-<?php echo esc_attr($key+1); ?>">
		<?php 
				if(!empty($image_url[0]))
				{
			?>		
				<?php
						$portfolio_type = get_post_meta($portfolio_ID, 'portfolio_type', true);
						$portfolio_video_id = get_post_meta($portfolio_ID, 'portfolio_video_id', true);
						
						switch($portfolio_type)
						{
						case 'External Link':
							$portfolio_link_url = get_post_meta($portfolio_ID, 'portfolio_link_url', true);
					?>
					<a target="_blank" href="<?php echo esc_url($portfolio_link_url); ?>">
						<img src="<?php echo esc_url($small_image_url[0]); ?>" alt=""/>
						<div id="portfolio_desc_<?php echo esc_attr($portfolio_ID); ?>" class="portfolio_title">
        					<div class="table">
        						<div class="cell">
						            <h5><?php echo get_the_title(); ?></h5>
						            <div class="post_detail"><?php echo get_the_excerpt(); ?></div>
        						</div>
        					</div>
				        </div>
		            </a>
					
					<?php
						break;
						//end external link
						
						case 'Portfolio Content':
        				default:
        			?>
        			<a href="<?php echo esc_url(get_permalink($portfolio_ID)); ?>">
        				<img src="<?php echo esc_url($small_image_url[0]); ?>" alt="" />
        				<div id="portfolio_desc_<?php echo esc_attr($portfolio_ID); ?>" class="portfolio_title">
        					<div class="table">
        						<div class="cell">
						            <h5><?php echo get_the_title(); ?></h5>
						            <div class="post_detail"><?php echo get_the_excerpt(); ?></div>
        						</div>
        					</div>
				        </div>
		            </a>
	                
	                <?php
						break;
						//end portfolio content
        				
        				case 'Image':
					?>
					<a data-title="<?php echo esc_attr(get_the_title()); ?>" href="<?php echo esc_url($image_url[0]); ?>" class="fancy-gallery">
						<img src="<?php echo esc_url($small_image_url[0]); ?>" alt="" />
						<div id="portfolio_desc_<?php echo esc_attr($portfolio_ID); ?>" class="portfolio_title">
        					<div class="table">
        						<div class="cell">
						            <h5><?php echo get_the_title(); ?></h5>
						            <div class="post_detail"><?php echo get_the_excerpt(); ?></div>
        						</div>
        					</div>
				        </div>
	                </a>
					
					<?php
						break;
						//end image
						
						case 'Youtube Video':
					?>
					
					<a title="<?php echo gesc_attr(et_the_title()); ?>" href="#video_<?php echo esc_attr($portfolio_video_id); ?>" class="lightbox_youtube">
						<img src="<?php echo esc_url($small_image_url[0]); ?>" alt="" />
						<div id="portfolio_desc_<?php echo esc_attr($portfolio_ID); ?>" class="portfolio_title">
        					<div class="table">
        						<div class="cell">
						            <h5><?php echo get_the_title(); ?></h5>
						            <div class="post_detail"><?php echo get_the_excerpt(); ?></div>
        						</div>
        					</div>
				        </div>
		            </a>
						
					<div style="display:none;">
			    	    <div id="video_<?php echo esc_attr($portfolio_video_id); ?>" class="video-container">
			    	        
			    	        <iframe title="YouTube video player" width="900" height="488" src="http://www.youtube.com/embed/<?php echo esc_url($portfolio_video_id); ?>?theme=dark&amp;rel=0&amp;wmode=transparent" allowfullscreen></iframe>
			    	        
			    	    </div>	
			    	</div>
					
					<?php
						break;
						//end youtube
					
					case 'Vimeo Video':
					?>
					<a title="<?php echo esc_attr(get_the_title()); ?>" href="#video_<?php echo esc_attr($portfolio_video_id); ?>" class="lightbox_vimeo">
						<img src="<?php echo esc_url($small_image_url[0]); ?>" alt="" />
						<div id="portfolio_desc_<?php echo esc_attr($portfolio_ID); ?>" class="portfolio_title">
        					<div class="table">
        						<div class="cell">
						            <h5><?php echo get_the_title(); ?></h5>
						            <div class="post_detail"><?php echo get_the_excerpt(); ?></div>
        						</div>
        					</div>
				        </div>
		            </a>
						
					<div style="display:none;">
			    	    <div id="video_<?php echo esc_attr($portfolio_video_id); ?>" class="video-container">
			    	    
			    	        <iframe src="http://player.vimeo.com/video/<?php echo esc_url($portfolio_video_id); ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="900" height="506"></iframe>
			    	        
			    	    </div>	
			    	</div>
					
					<?php
						break;
						//end vimeo
						
					case 'Self-Hosted Video':
					
						//Get video URL
						$portfolio_mp4_url = get_post_meta($portfolio_ID, 'portfolio_mp4_url', true);
						$preview_image = wp_get_attachment_image_src($image_id, 'large', true);
					?>
					<a title="<?php echo esc_attr(get_the_title()); ?>" href="#video_self_<?php echo esc_attr($key); ?>" class="lightbox_vimeo">
						<img src="<?php echo esc_url($small_image_url[0]); ?>" alt="" />
						<div id="portfolio_desc_<?php echo esc_attr($portfolio_ID); ?>" class="portfolio_title">
        					<div class="table">
        						<div class="cell">
						            <h5><?php echo get_the_title(); ?></h5>
						            <div class="post_detail"><?php echo get_the_excerpt(); ?></div>
        						</div>
        					</div>
				        </div>
		            </a>
						
					<div style="display:none;">
			    	    <div id="video_self_<?php echo esc_attr($key); ?>" class="video-container">
			    	    
			    	        <div id="self_hosted_vid_<?php echo esc_attr($key); ?>"></div>
			    	        <?php do_shortcode('[jwplayer id="self_hosted_vid_'.$key.'" file="'.esc_url($portfolio_mp4_url).'" image="'.$preview_image[0].'" width="900" height="488"]'); ?>
			    	        
			    	    </div>	
			    	</div>
					
					<?php
						break;
						//end self-hosted
					?>
					
					<?php
						}
						//end switch
					?>
			<?php
				}		
			?>			
		</div>
	</div>
	<?php
		endwhile; endif;
	?>
	</div>
	
	<?php
	    if($wp_query->max_num_pages > 1)
	    {
	    	if (function_exists("wpapi_pagination")) 
	    	{
	?>
			<br class="clear"/><br/>
	<?php
	    	    wpapi_pagination($wp_query->max_num_pages);
	    	}
	    	else
	    	{
	    	?>
	    	    <div class="pagination"><p><?php posts_nav_link(' '); ?></p></div>
	    	<?php
	    	}
	    ?>
	    <div class="pagination_detail">
	     	<?php
	     		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	     	?>
	     	<?php _e( 'Page', THEMEDOMAIN ); ?> <?php echo esc_html($paged); ?> <?php _e( 'of', THEMEDOMAIN ); ?> <?php echo esc_html($wp_query->max_num_pages); ?>
	     </div>
	     <br class="clear"/><br/>
	     <?php
	     }
	?>
	
	</div>
	
		<div class="sidebar_wrapper">
    		
    	    <div class="sidebar_top"></div>
    	
    	    <div class="sidebar">
    	    
    	    	<div class="content">
    	    	
    	    		<?php 
					$page_sidebar = sanitize_title($page_sidebar);
					
					if (is_active_sidebar($page_sidebar)) { ?>
	    	    		<ul class="sidebar_widget">
	    	    		<?php dynamic_sidebar($page_sidebar); ?>
	    	    		</ul>
	    	    	<?php } ?>
    	    	
    	    	</div>
    	
    	    </div>
    	    <br class="clear"/>
    	
    	    <div class="sidebar_bottom"></div>
    	</div>
	
	</div>

</div>
<br class="clear"/><br/>
</div>
<?php get_footer(); ?>