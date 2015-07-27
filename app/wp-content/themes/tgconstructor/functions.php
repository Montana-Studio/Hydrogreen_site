<?php
/*
Theme Name: Constructor Theme
Theme URI: http://themes.themegoods2.com/constructor
Author: ThemeGoods
Author URI: http://themeforest.net/user/ThemeGoods
License: GPLv2
*/

//Setup theme default constant and data
require_once (get_template_directory() . "/lib/config.lib.php");

//Setup theme translation
require_once (get_template_directory() . "/lib/translation.lib.php");

//Setup theme admin action handler
require_once (get_template_directory() . "/lib/admin.action.lib.php");

//Setup theme support and image size handler
require_once (get_template_directory() . "/lib/theme.support.lib.php");

//Get custom function
require_once (get_template_directory() . "/lib/custom.lib.php");

//Setup menu settings
require_once (get_template_directory() . "/lib/menu.lib.php");

//Setup twitter related functions
require_once (get_template_directory() . "/lib/twitter.lib.php");

//Setup CSS compression related functions
require_once (get_template_directory() . "/lib/cssmin.lib.php");

//Setup JS compression related functions
require_once (get_template_directory() . "/lib/jsmin.lib.php");

//Setup Sidebar
require_once (get_template_directory() . "/lib/sidebar.lib.php");

//Setup theme custom widgets
require_once (get_template_directory() . "/lib/widgets.lib.php");

//Setup auto update
require_once (get_template_directory() . "/lib/theme.update.lib.php");

//Setup theme admin settings
require_once (get_template_directory() . "/lib/admin.lib.php");

//Setup theme custom filters
require_once (get_template_directory() . "/lib/theme.filter.lib.php");

//Setup required plugin activation
require_once (get_template_directory() . "/lib/tgm.lib.php");

//Setup Theme Customizer
include (get_template_directory() . "/modules/kirki/kirki.php");
include (get_template_directory() . "/lib/customizer.lib.php");

//Setup page custom fields and action handler
require_once (get_template_directory() . "/fields/page.fields.php");

//Setup content builder
require_once (get_template_directory() . "/modules/content_builder.php");

// Setup shortcode generator
require_once (get_template_directory() . "/modules/shortcode_generator.php");

// Setup Twitter API
require_once (get_template_directory() . "/modules/twitteroauth.php");


//Check if Woocommerce is installed	
if(class_exists('Woocommerce'))
{
	//Setup Woocommerce Config
	require_once (get_template_directory() . "/modules/woocommerce.php");
}

/**
*	Setup one click update theme function
**/
/*add_action('wp_ajax_pp_update_theme', 'pp_update_theme');
add_action('wp_ajax_nopriv_pp_update_theme', 'pp_update_theme');

function pp_update_theme() {
	if(is_admin())
	{
		include_once(get_template_directory() . '/modules/envato-wordpress-toolkit-library/class-envato-wordpress-theme-upgrader.php');

		$pp_envato_username = get_option('pp_envato_username');
		$pp_envato_api_key = get_option('pp_envato_api_key');
		
		if(!empty($pp_envato_username) && !empty($pp_envato_api_key))
		{
			$upgrader = new Envato_WordPress_Theme_Upgrader( $pp_envato_username, $pp_envato_api_key );
			$upgrader_obj = $upgrader->check_for_theme_update();
			
			if($upgrader_obj->updated_themes_count > 0)
			{
				$result = $upgrader->upgrade_theme();
				echo $result->installation_feedback;
			}
			else
			{
				echo 'There is no theme update available';
			}
		}
		else
		{
			echo 'Please enter Envato username and API Key';
		}
	}
}*/

/**
*	Setup AJAX portfolio content builder function
**/
add_action('wp_ajax_pp_ppb', 'pp_ppb');
add_action('wp_ajax_nopriv_pp_ppb', 'pp_ppb');

function pp_ppb() {
	if(is_admin() && isset($_GET['shortcode']) && !empty($_GET['shortcode']))
	{
		if(isset($ppb_post_type) && $ppb_post_type == 'page')
		{
			require_once (get_template_directory() . "/lib/contentbuilder.shortcode.lib.php");
		}
		else if(isset($ppb_post_type) && $ppb_post_type == 'projects')
		{
			require_once (get_template_directory() . "/lib/contentbuilder_project.shortcode.lib.php");
		}
		else
		{
			require_once (get_template_directory() . "/lib/contentbuilder.shortcode.lib.php");
		}
		//pp_debug($ppb_shortcodes);
		
		if(isset($ppb_shortcodes[$_GET['shortcode']]) && !empty($ppb_shortcodes[$_GET['shortcode']]))
		{
			$selected_shortcode = $_GET['shortcode'];
			$selected_shortcode_arr = $ppb_shortcodes[$_GET['shortcode']];
			//pp_debug($selected_shortcode_arr);
?>

			<div class="ppb_inline_wrap">
				<h2><?php echo $selected_shortcode_arr['title']; ?></h2>
				<a id="save_<?php echo $_GET['rel']; ?>" data-parent="ppb_inline_<?php echo $selected_shortcode; ?>" class="button-primary ppb_inline_save" href="javascript:;"><?php _e( 'Update', THEMEDOMAIN ); ?></a>
				<a class="button" href="javascript:;" onClick="jQuery.fancybox.close();">Cancel</a>
			</div>
			<div id="ppb_inline_<?php echo $selected_shortcode; ?>" data-shortcode="<?php echo $selected_shortcode; ?>" class="ppb_inline">
			<div class="ppb_inline_option_wrap">
				<?php
					if(isset($selected_shortcode_arr['title']) && $selected_shortcode_arr['title']!='Divider')
					{
				?>
				<div class="ppb_inline_option">
					<label for="<?php echo $selected_shortcode; ?>_title"><?php _e( 'Title', THEMEDOMAIN ); ?></label><br/>
					<input type="text" id="<?php echo $selected_shortcode; ?>_title" name="<?php echo $selected_shortcode; ?>_title" data-attr="title" value="Title" class="ppb_input"/>
					<span class="label_desc"><?php _e( 'Enter Title for this content', THEMEDOMAIN ); ?></span>
				</div>
				<br/>
				<?php
					}
					else
					{
				?>
				<input type="hidden" id="<?php echo $selected_shortcode; ?>_title" name="<?php echo $selected_shortcode; ?>_title" data-attr="title" value="<?php echo $selected_shortcode_arr['title']; ?>" class="ppb_input"/>
				<?php
					}
				?>
				
				<?php
					foreach($selected_shortcode_arr['attr'] as $attr_name => $attr_item)
					{
						if(!isset($attr_item['title']))
						{
							$attr_title = ucfirst($attr_name);
						}
						else
						{
							$attr_title = $attr_item['title'];
						}
					
						if($attr_item['type']=='jslider')
						{
				?>
				<div class="ppb_inline_option">
					<label for="<?php echo $selected_shortcode; ?>_<?php echo $attr_name; ?>"><?php echo $attr_title; ?></label><br/>
					<input name="<?php echo $selected_shortcode; ?>_<?php echo $attr_name; ?>" id="<?php echo $selected_shortcode; ?>_<?php echo $attr_name; ?>" type="range" class="ppb_input" min="<?php echo $attr_item['min']; ?>" max="<?php echo $attr_item['max']; ?>" step="<?php echo $attr_item['step']; ?>" value="<?php echo $attr_item['std']; ?>" /><output for="<?php echo $selected_shortcode; ?>_<?php echo $attr_name; ?>" onforminput="value = foo.valueAsNumber;"></output><br/>
					<span class="label_desc"><?php echo $attr_item['desc']; ?></span>
					
					<input type="hidden" id="type_<?php echo $selected_shortcode; ?>_<?php echo $attr_name; ?>" name="type_<?php echo $selected_shortcode; ?>_<?php echo $attr_name; ?>" value="jslider"/>
				</div>
				<br/>
				<?php
						}
				
						if($attr_item['type']=='file')
						{
				?>
				<div class="ppb_inline_option">
					<label for="<?php echo $selected_shortcode; ?>_<?php echo $attr_name; ?>"><?php echo $attr_title; ?></label><br/>
					<input name="<?php echo $selected_shortcode; ?>_<?php echo $attr_name; ?>" id="<?php echo $selected_shortcode; ?>_<?php echo $attr_name; ?>" type="text"  class="ppb_input ppb_file" />
					<a id="<?php echo $selected_shortcode; ?>_<?php echo $attr_name; ?>_button" name="<?php echo $selected_shortcode; ?>_<?php echo $attr_name; ?>_button" type="button" class="metabox_upload_btn button" rel="<?php echo $selected_shortcode; ?>_<?php echo $attr_name; ?>">Upload</a>
					<img id="image_<?php echo $selected_shortcode; ?>_<?php echo $attr_name; ?>" class="ppb_file_image" />
					<span class="label_desc"><?php echo $attr_item['desc']; ?></span>
					
					<input type="hidden" id="type_<?php echo $selected_shortcode; ?>_<?php echo $attr_name; ?>" name="type_<?php echo $selected_shortcode; ?>_<?php echo $attr_name; ?>" value="file"/>
				</div>
				<br/>
				<?php
						}
						
						if($attr_item['type']=='select')
						{
				?>
				<div class="ppb_inline_option">
					<label for="<?php echo $selected_shortcode; ?>_<?php echo $attr_name; ?>"><?php echo $attr_title; ?></label><br/>
					<select name="<?php echo $selected_shortcode; ?>_<?php echo $attr_name; ?>" id="<?php echo $selected_shortcode; ?>_<?php echo $attr_name; ?>" class="ppb_input">
						<?php
								foreach($attr_item['options'] as $attr_key => $attr_item_option)
								{
						?>
								<option value="<?php echo $attr_key; ?>"><?php echo ucfirst($attr_item_option); ?></option>
						<?php
								}
						?>
					</select><br style="clear:both"/>
					<span class="label_desc"><?php echo $attr_item['desc']; ?></span>
					
					<input type="hidden" id="type_<?php echo $selected_shortcode; ?>_<?php echo $attr_name; ?>" name="type_<?php echo $selected_shortcode; ?>_<?php echo $attr_name; ?>" value="select"/>
					
					<input type="hidden" id="type_<?php echo $selected_shortcode; ?>_<?php echo $attr_name; ?>" name="type_<?php echo $selected_shortcode; ?>_<?php echo $attr_name; ?>" value="select"/>
				</div>
				<br/>
				<?php
						}
						
						if($attr_item['type']=='select_multiple')
						{
				?>
				<div class="ppb_inline_option">
					<label for="<?php echo $selected_shortcode; ?>_<?php echo $attr_name; ?>"><?php echo $attr_title; ?></label><br/>
					<select name="<?php echo $selected_shortcode; ?>_<?php echo $attr_name; ?>" id="<?php echo $selected_shortcode; ?>_<?php echo $attr_name; ?>" class="ppb_input" multiple="multiple">
						<?php
								foreach($attr_item['options'] as $attr_key => $attr_item_option)
								{
									if(!empty($attr_item_option))
									{
						?>
									<option value="<?php echo $attr_key; ?>"><?php echo ucfirst($attr_item_option); ?></option>
						<?php
									}
								}
						?>
					</select><br style="clear:both"/>
					<span class="label_desc"><?php echo $attr_item['desc']; ?></span>
					
					<input type="hidden" id="type_<?php echo $selected_shortcode; ?>_<?php echo $attr_name; ?>" name="type_<?php echo $selected_shortcode; ?>_<?php echo $attr_name; ?>" value="select_multiple"/>
				</div>
				<br/>
				<?php
						}
						
						if($attr_item['type']=='text')
						{
				?>
				<div class="ppb_inline_option">
					<label for="<?php echo $selected_shortcode; ?>_<?php echo $attr_name; ?>"><?php echo $attr_title; ?></label><br/>
					<input name="<?php echo $selected_shortcode; ?>_<?php echo $attr_name; ?>" id="<?php echo $selected_shortcode; ?>_<?php echo $attr_name; ?>" type="text" class="ppb_input" />
					<span class="label_desc"><?php echo $attr_item['desc']; ?></span>
					
					<input type="hidden" id="type_<?php echo $selected_shortcode; ?>_<?php echo $attr_name; ?>" name="type_<?php echo $selected_shortcode; ?>_<?php echo $attr_name; ?>" value="text"/>
				</div>
				<br/>
				<?php
						}
						
						if($attr_item['type']=='colorpicker')
						{
				?>
				<div class="ppb_inline_option">
					<label for="<?php echo $selected_shortcode; ?>_<?php echo $attr_name; ?>"><?php echo $attr_title; ?></label><br/>
					<input name="<?php echo $selected_shortcode; ?>_<?php echo $attr_name; ?>" id="<?php echo $selected_shortcode; ?>_<?php echo $attr_name; ?>" type="text" class="ppb_input color_picker" readonly />
					<div id="<?php echo $selected_shortcode; ?>_<?php echo $attr_name; ?>_bg" class="colorpicker_bg" onclick="jQuery('#<?php echo $selected_shortcode; ?>_<?php echo $attr_name; ?>').click()" style="background-color:<?php echo $attr_item['std']; ?>;background-image: url(<?php echo get_template_directory_uri(); ?>/functions/images/trigger.png);margin-top:3px">&nbsp;</div><br style="clear:both"/>
					<span class="label_desc"><?php echo $attr_item['desc']; ?></span>
					
					<input type="hidden" id="type_<?php echo $selected_shortcode; ?>_<?php echo $attr_name; ?>" name="type_<?php echo $selected_shortcode; ?>_<?php echo $attr_name; ?>" value="colorpicker"/>
				</div>
				<br/>
				<?php
						}
						
						if($attr_item['type']=='textarea')
						{
				?>
				<div class="ppb_inline_option">
					<label for="<?php echo $selected_shortcode; ?>_<?php echo $attr_name; ?>"><?php echo $attr_title; ?></label><br/>
					<textarea name="<?php echo $selected_shortcode; ?>_<?php echo $attr_name; ?>" id="<?php echo $selected_shortcode; ?>_<?php echo $attr_name; ?>" cols="" rows="3" class="ppb_input"></textarea>
					<span class="label_desc"><?php echo $attr_item['desc']; ?></span>
					
					<input type="hidden" id="type_<?php echo $selected_shortcode; ?>_<?php echo $attr_name; ?>" name="type_<?php echo $selected_shortcode; ?>_<?php echo $attr_name; ?>" value="textarea"/>
				</div>
				<br/>
				<?php
						}
					}
				?>
				
				<?php
					if(isset($selected_shortcode_arr['content']) && $selected_shortcode_arr['content'])
					{
				?>
					<div class="ppb_inline_option">
						<label for="<?php echo $selected_shortcode; ?>_content"><?php _e( 'Content', THEMEDOMAIN ); ?></label><br/>
						<textarea id="<?php echo $selected_shortcode; ?>_content" name="<?php echo $selected_shortcode; ?>_content" cols="" rows="7" class="ppb_input"></textarea>
						<span class="label_desc"><?php _e( 'You can enter text, HTML for its content', THEMEDOMAIN ); ?></span>
						
						<input type="hidden" id="type_<?php echo $selected_shortcode; ?>_<?php echo $attr_name; ?>" name="type_<?php echo $selected_shortcode; ?>_<?php echo $attr_name; ?>" value="content"/>
					</div>
				<?php
					}
				?>
			</div>
		</div>
		<br/>
		
		<script>
		jQuery(document).ready(function(){
			var formfield = '';
			
			jQuery('#ppb_options_unsaved').val(1);
	
			jQuery('.metabox_upload_btn').click(function() {
			    jQuery('.fancybox-overlay').css('visibility', 'hidden');
			    jQuery('.fancybox-wrap').css('visibility', 'hidden');
		     	formfield = jQuery(this).attr('rel');
			    
			    var send_attachment_bkp = wp.media.editor.send.attachment;
			    wp.media.editor.send.attachment = function(props, attachment) {
			     	jQuery('#'+formfield).attr('value', attachment.url);
			     	jQuery('#image_'+formfield).attr('src', attachment.url);
			
			        wp.media.editor.send.attachment = send_attachment_bkp;
			        jQuery('.fancybox-overlay').css('visibility', 'visible');
			     	jQuery('.fancybox-wrap').css('visibility', 'visible');
			    }
			
			    wp.media.editor.open();
		     	return false;
		    });
		
			jQuery("#ppb_inline :input").each(function(){
				if(typeof jQuery(this).attr('id') != 'undefined')
				{
					 jQuery(this).attr('value', '');
				}
			});
			
			var currentItemData = jQuery('#<?php echo $_GET['rel']; ?>').data('ppb_setting');
			var currentItemOBJ = jQuery.parseJSON(currentItemData);
			
			jQuery.each(currentItemOBJ, function(index, value) { 
			  	if(typeof jQuery('#'+index) != 'undefined')
				{
					jQuery('#'+index).val(decodeURI(value));
					
					//If textarea then convert to visual editor
					if(jQuery('#'+index).is('textarea'))
					{
						jQuery('#'+index).wp_editor();
						jQuery('#'+index).val(decodeURI(value));
					}
					
					//Check if in put file
					if(jQuery('#type_'+index).val()=='file')
					{
						jQuery('#image_'+index).attr('src', value);
					}
				}
			});
			
			jQuery('.color_picker').each(function()
			{	
			    var inputID = jQuery(this).attr('id');
			    
			    jQuery(this).ColorPicker({
			    	color: jQuery(this).val(),
			    	onShow: function (colpkr) {
			    		jQuery(colpkr).fadeIn(200);
			    		return false;
			    	},
			    	onHide: function (colpkr) {
			    		jQuery(colpkr).fadeOut(200);
			    		return false;
			    	},
			    	onChange: function (hsb, hex, rgb, el) {
			    		jQuery('#'+inputID).val('#' + hex);
			    		jQuery('#'+inputID+'_bg').css('backgroundColor', '#' + hex);
			    	}
			    });	
			    
			    jQuery(this).css('width', '200px');
			    jQuery(this).css('float', 'left');
			});
			
			var el, newPoint, newPlace, offset;
 
			 jQuery("input[type='range']").change(function() {
			 
			   el = jQuery(this);
			   
			   width = el.width();
			   newPoint = (el.val() - el.attr("min")) / (el.attr("max") - el.attr("min"));
			   el.next("output").text(el.val());
			 })
			 .trigger('change');
			
			jQuery("#save_<?php echo $_GET['rel']; ?>").click(function(){
				tinyMCE.triggerSave();
			
			    var targetItem = jQuery('#ppb_inline_current').attr('value');
			    var parentInline = jQuery(this).attr('data-parent');
			    var currentItemData = jQuery('#'+targetItem).find('.ppb_setting_data').attr('value');
			    var currentShortcode = jQuery('#'+parentInline).attr('data-shortcode');
			    
			    var itemData = {};
			    itemData.id = targetItem;
			    itemData.shortcode = currentShortcode;
			    
			    jQuery("#"+parentInline+" :input.ppb_input").each(function(){
			     	if(typeof jQuery(this).attr('id') != 'undefined')
			     	{	
			    	 	itemData[jQuery(this).attr('id')] = encodeURI(jQuery(this).attr('value'));
			    	 	
				    	 if(jQuery(this).attr('data-attr') == 'title')
				    	 {
				    	  	jQuery('#'+targetItem).find('.title').html(decodeURI(jQuery(this).attr('value')));
				    	  	if(jQuery('#'+targetItem).find('.ppb_unsave').length==0)
				    	  	{
				    	  		jQuery('<a href="javascript:;" class="ppb_unsave">Unsaved</a>').insertAfter(jQuery('#'+targetItem).find('.title'));
				    	  		
				    	  		jQuery('#ppb_options_unsaved').val(1);
				    	  	}
				    	 }
			     	}
			    });
			    
			    var currentItemDataJSON = JSON.stringify(itemData);
			    jQuery('#'+targetItem).data('ppb_setting', currentItemDataJSON);
			    
			    jQuery.fancybox.close();
			});
			
			jQuery.fancybox.hideLoading();
		});
		</script>
<?php
		}
	}
	
	die();
}

/**
*	Begin theme custom AJAX calls handler
**/

/**
*	Setup one click importer function
**/
add_action('wp_ajax_pp_import_demo_content', 'pp_import_demo_content');
add_action('wp_ajax_nopriv_pp_import_demo_content', 'pp_import_demo_content');

function pp_import_demo_content() {
	if(is_admin() && isset($_POST['demo']) && !empty($_POST['demo']))
	{
		global $wpdb; 

	    if ( !defined('WP_LOAD_IMPORTERS') ) define('WP_LOAD_IMPORTERS', true);
	
	    // Load Importer API
	    require_once ABSPATH . 'wp-admin/includes/import.php';
	
	    if ( ! class_exists( 'WP_Importer' ) ) {
	        $class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
	        if ( file_exists( $class_wp_importer ) )
	        {
	            require $class_wp_importer;
	        }
	    }
	
	    if ( ! class_exists( 'WP_Import' ) ) {
	        $class_wp_importer = get_template_directory() ."/modules/import/wordpress-importer.php";
	        if ( file_exists( $class_wp_importer ) )
	            require $class_wp_importer;
	    }
	
		//Check import selected demo
	    if ( class_exists( 'WP_Import' ) ) 
	    { 
	    	switch($_POST['demo'])
	    	{
		    	case 1:
		    	default:
		    		//Check if install Woocommerce
		    		if(!class_exists('Woocommerce'))
					{
		    			$import_filepath = get_template_directory() ."/cache/demos/1.xml" ;
		    		}
		    		else
		    		{
			    		$import_filepath = get_template_directory() ."/cache/demos/1_woo.xml" ;
		    		}
		    		
		    		$page_on_front = 3462; //Demo 1 Homepage ID
		    		$oldurl = 'http://themes.themegoods2.com/constructor';
		    	break;
	    	}
			
			//Run and download demo contents
			$wp_import = new WP_Import();
	        $wp_import->fetch_attachments = true;
	        $wp_import->import($import_filepath);
	    }
	    
	    //Setup default front page settings.
	    update_option('show_on_front', 'page');
	    update_option('page_on_front', $page_on_front);
	    
	    //Set default custom menu settings
	    $locations = get_theme_mod('nav_menu_locations');
		$locations['primary-menu'] = 2;
		$locations['top-menu'] = 3;
		$locations['side-menu'] = 50;
		$locations['footer-menu'] = 49;
		set_theme_mod( 'nav_menu_locations', $locations );
		
		//Change all URLs from demo URL to localhost
		$update_options = array ( 0 => 'content', 1 => 'excerpts', 2 => 'links', 3 => 'attachments', 4 => 'custom', 5 => 'guids', );
		$newurl = esc_url( site_url() ) ;
		VB_update_urls($update_options, $oldurl, $newurl);
	    
		exit();
	}
}

/**
*	Setup AJAX search function
**/
add_action('wp_ajax_pp_ajax_search', 'pp_ajax_search');
add_action('wp_ajax_nopriv_pp_ajax_search', 'pp_ajax_search');

function pp_ajax_search() {
	global $wpdb;
	
	if (strlen($_POST['s'])>0) {
		$limit=5;
		$s=strtolower(addslashes($_POST['s']));
		$querystr = "
			SELECT $wpdb->posts.*
			FROM $wpdb->posts
			WHERE 1=1 AND ((lower($wpdb->posts.post_title) like '%$s%'))
			AND $wpdb->posts.post_type IN ('post', 'page', 'attachment', 'projects', 'galleries')
			AND (post_status = 'publish')
			ORDER BY $wpdb->posts.post_date DESC
			LIMIT $limit;
		 ";

	 	$pageposts = $wpdb->get_results($querystr, OBJECT);
	 	
	 	if(!empty($pageposts))
	 	{
			echo '<ul>';
	
	 		foreach($pageposts as $result_item) 
	 		{
	 			$post=$result_item;
	 			
	 			$post_type = get_post_type($post->ID);
				$post_type_class = '';
				$post_type_title = '';
				
				switch($post_type)
				{
				    case 'galleries':
				    	$post_type_class = '<i class="fa fa-picture-o"></i>';
				    	$post_type_title = __( 'Gallery', THEMEDOMAIN );
				    break;
				    
				    case 'page':
				    default:
				    	$post_type_class = '<i class="fa fa-file-text-o"></i>';
				    	$post_type_title = __( 'Page', THEMEDOMAIN );
				    break;
				    
				    case 'projects':
				    	$post_type_class = '<i class="fa fa-folder-open-o"></i>';
				    	$post_type_title = __( 'Projects', THEMEDOMAIN );
				    break;
				    
				    case 'services':
				    	$post_type_class = '<i class="fa fa-star"></i>';
				    	$post_type_title = __( 'Service', THEMEDOMAIN );
				    break;
				    
				    case 'clients':
				    	$post_type_class = '<i class="fa fa-user"></i>';
				    	$post_type_title = __( 'Client', THEMEDOMAIN );
				    break;
				}
				
				$post_thumb = array();
				if(has_post_thumbnail($post->ID, 'thumbnail'))
				{
				    $image_id = get_post_thumbnail_id($post->ID);
				    $post_thumb = wp_get_attachment_image_src($image_id, 'thumbnail', true);
				    
				    if(isset($post_thumb[0]) && !empty($post_thumb[0]))
				    {
				        $post_type_class = '<div class="search_thumb"><img src="'.$post_thumb[0].'" alt=""/></div>';
				    }
				}
	 			
				echo '<li>';
				
				if(!isset($post_thumb[0]))
				{
					echo '<div class="post_type_icon">';
				}
				
				echo '<a href="'.get_permalink($post->ID).'">'.$post_type_class.'</i></a>';
				
				if(!isset($post_thumb[0]))
				{
					echo '</div>';
				}
				
				echo '<div class="ajax_post">';
				echo '<a href="'.get_permalink($post->ID).'"><strong>'.$post->post_title.'</strong><br/>';
				echo '<span class="post_detail">'.date(THEMEDATEFORMAT, strtotime($post->post_date)).'</span></a>';
				echo '</div>';
				echo '</li>';
			}
			
			echo '<li class="view_all"><a href="javascript:jQuery(\'#searchform\').submit()">'.__( 'View all results', THEMEDOMAIN ).'</a></li>';
	
			echo '</ul>';
		}

	}
	else 
	{
		echo '';
	}
	die();

}

/**
*	Setup contact form mailing function
**/
add_action('wp_ajax_pp_contact_mailer', 'pp_contact_mailer');
add_action('wp_ajax_nopriv_pp_contact_mailer', 'pp_contact_mailer');

function pp_contact_mailer() {
	check_ajax_referer( 'tgajax-post-contact-nonce', 'tg_security' );
	
	//Error message when message can't send
	define('ERROR_MESSAGE', 'Oops! something went wrong, please try to submit later.');
	
	if (isset($_POST['your_name'])) {
	
		//Get your email address
		$contact_email = get_option('pp_contact_email');
		$pp_contact_thankyou = __( 'Thank you! We will get back to you as soon as possible', THEMEDOMAIN );
		
		/*
		|
		| Begin sending mail
		|
		*/
		
		$from_name = $_POST['your_name'];
		$from_email = $_POST['email'];
		
		//Get contact subject
		if(!isset($_POST['subject']))
		{
			$contact_subject = __( 'Email from contact form', THEMEDOMAIN );
		}
		else
		{
			$contact_subject = $_POST['subject'];
		}
		
		$headers = "";
	   	$headers.= 'From: '.$from_name.' <'.$from_email.'>'.PHP_EOL;
	   	$headers.= 'Reply-To: '.$from_name.' <'.$from_email.'>'.PHP_EOL;
	   	$headers.= 'Return-Path: '.$from_name.' <'.$from_email.'>'.PHP_EOL;
		
		$message = 'Name: '.$from_name.PHP_EOL;
		$message.= 'Email: '.$from_email.PHP_EOL.PHP_EOL;
		$message.= 'Message: '.PHP_EOL.$_POST['message'].PHP_EOL.PHP_EOL;
		
		if(isset($_POST['address']))
		{
			$message.= 'Address: '.$_POST['address'].PHP_EOL;
		}
		
		if(isset($_POST['phone']))
		{
			$message.= 'Phone: '.$_POST['phone'].PHP_EOL;
		}
		
		if(isset($_POST['mobile']))
		{
			$message.= 'Mobile: '.$_POST['mobile'].PHP_EOL;
		}
		
		if(isset($_POST['company']))
		{
			$message.= 'Company: '.$_POST['company'].PHP_EOL;
		}
		
		if(isset($_POST['country']))
		{
			$message.= 'Country: '.$_POST['country'].PHP_EOL;
		}
		    
		
		if(!empty($from_name) && !empty($from_email) && !empty($message))
		{
			wp_mail($contact_email, $contact_subject, $message, $headers);
			echo '<p>'.$pp_contact_thankyou.'</p>';
			
			die;
		}
		else
		{
			echo '<p>'.ERROR_MESSAGE.'</p>';
			
			die;
		}

	}
	else 
	{
		echo '<p>'.ERROR_MESSAGE.'</p>';
	}
	die();
}

/**
*	End theme custom AJAX calls handler
**/

//SVG CODE
//include (TEMPLATEPATH . '/svg_icons.php');
function cc_mime_types($mimes) {
 $mimes['svg'] = 'image/svg+xml';
 return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

//Setup custom settings when theme is activated
if (isset($_GET['activated']) && $_GET['activated']){
	//Add default contact fields
	$pp_contact_form = get_option('pp_contact_form');
	if(empty($pp_contact_form))
	{
		add_option( 'pp_contact_form', 's:1:"3";' );
	}
	
	$pp_contact_form_sort_data = get_option('pp_contact_form_sort_data');
	if(empty($pp_contact_form_sort_data))
	{
		add_option( 'pp_contact_form_sort_data', 'a:3:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"3";}' );
	}

	wp_redirect(admin_url("admin.php?page=admin.lib.php&activate=true#pp_panel_demo-content"));
}
?>