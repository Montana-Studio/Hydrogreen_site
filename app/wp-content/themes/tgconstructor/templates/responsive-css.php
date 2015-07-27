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

//Main style
require_once(get_template_directory()."/css/grid.css");

if(!empty($pp_advance_combine_css))
{
	ob_end_flush();
	ob_end_flush();
}
?>