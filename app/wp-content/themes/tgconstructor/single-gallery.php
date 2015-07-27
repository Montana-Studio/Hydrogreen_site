<?php
/**
 * The main template file for display gallery page.
 *
 * @package WordPress
*/

get_header(); 
?>

<div class="ppb_wrapper">
<?php
		echo do_shortcode('[tg_grid_gallery gallery_id="'.esc_attr($post->ID).'"]');
?>
</div>
<?php get_footer(); ?>