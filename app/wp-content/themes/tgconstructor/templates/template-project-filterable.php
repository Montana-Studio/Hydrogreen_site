<?php  

//Get all project service and sorting option
$tg_project_filterable = kirki_get_option('tg_project_filterable');

//Check filterable link option
$tg_project_filterable_link = kirki_get_option('tg_project_filterable_link');

if(!empty($tg_project_filterable_link) && !empty($term))
{
	$tg_project_filterable = 1;
}

if(!empty($tg_project_filterable))
{
?>
<div class="portfolio_tilter_wrapper">
<?php
	$tg_project_filterable_sort = kirki_get_option('tg_project_filterable_sort');
	
	$projectservices_arr = get_terms('projectservices', 'hide_empty=0&hierarchical=0&parent=0&orderby='.$tg_project_filterable_sort);
	    
	if(!empty($projectservices_arr))
	{
	?>
		<div class="portfolio_filter_dropdown">
			<div class="portfolio_filter_dropdown_title">
				<a><span><?php echo _e( 'Filter By Service', THEMEDOMAIN ); ?></span></a>
			</div>
			
			<div class="portfolio_filter_dropdown_select">
				<ul id="project_services_filters" class="portfolio_select">
					<li class="icon arrow"></li>
					<?php 
					if(empty($tg_project_filterable_link))
					{
					?>
					<li class="all-projects active">
			    		<a class="active" href="javascript:;" data-filter="*"><?php echo _e( 'All Services', THEMEDOMAIN ); ?></a>
			    	</li>
			    	<?php
			    	}
			    	?>
			    	<?php
			    		foreach($projectservices_arr as $key => $projectservice_item)
			    		{
			    			$filter_link_url = 'javascript:;';
			    			
			    			if(!empty($tg_project_filterable_link))
							{
								$filter_link_url = get_term_link($projectservice_item);
							}
			    	?>
			    	<li class="cat-item <?php echo esc_attr($projectservice_item->slug); ?>" data-type="<?php echo esc_attr($projectservice_item->slug); ?>" style="clear:none">
			    		<a data-filter=".<?php echo esc_attr($projectservice_item->slug); ?>" href="<?php echo esc_attr($filter_link_url); ?>" title="<?php echo esc_attr($projectservice_item->name); ?>"><?php echo esc_html($projectservice_item->name); ?></a>
			    	</li>
			    	<?php
			    		}
			    	?>
				</ul>
			</div>
		</div>
	<?php
	}
	
	$projectsectors_arr = get_terms('projectsectors', 'hide_empty=0&hierarchical=0&parent=0&orderby='.$tg_project_filterable_sort);
	    
	if(!empty($projectsectors_arr))
	{
	?>
		<div class="portfolio_filter_dropdown">
			<div class="portfolio_filter_dropdown_title">
				<a><span><?php echo _e( 'Filter By Sector', THEMEDOMAIN ); ?></span></a>
			</div>
			
			<div class="portfolio_filter_dropdown_select">
				<ul id="project_sectors_filters" class="portfolio_select">
					<li class="icon arrow"></li>
					<?php 
					if(empty($tg_project_filterable_link))
					{
					?>
					<li class="all-projects active">
			    		<a class="active" href="javascript:;" data-filter="*"><?php echo _e( 'All Sectors', THEMEDOMAIN ); ?></a>
			    	</li>
			    	<?php
			    	}
			    	?>
			    	<?php
			    		foreach($projectsectors_arr as $key => $projectsector_item)
			    		{
			    			$filter_link_url = 'javascript:;';
			    			
			    			if(!empty($tg_project_filterable_link))
							{
								$filter_link_url = get_term_link($projectsector_item);
							}
			    	?>
			    	<li class="cat-item <?php echo esc_attr($projectsector_item->slug); ?>" data-type="<?php echo esc_attr($projectsector_item->slug); ?>" style="clear:none">
			    		<a data-filter=".<?php echo esc_attr($projectsector_item->slug); ?>" href="<?php echo esc_attr($filter_link_url); ?>" title="<?php echo esc_attr($projectsector_item->name); ?>"><?php echo esc_html($projectsector_item->name); ?></a>
			    	</li>
			    	<?php
			    		}
			    	?>
				</ul>
			</div>
		</div>
	<?php
	}
?>
</div><br class="clear"/>
<?php
} //End if enable filterable
?>