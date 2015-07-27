<style type="text/css">
<?php
	$tg_menu_layout = kirki_get_option('tg_menu_layout');
	        
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
<?php
	}
	//If left menu layout
	else if($tg_menu_layout == 3)
	{
?>
@media only screen and (min-width: 961px) {
.logo_wrapper { margin-top: 50px; display: block; }
.logo_wrapper img { transform: scale(0.5); max-height: 100%; }
#nav_wrapper { float: left; display: block; margin-left: 0; margin-top: 20px; height: auto; } 
#wrapper { padding-top: 0; }
body.error404 #wrapper { padding-top: 50px !important; }
.header_style_wrapper { width: 265px; min-height: 100%; height: 100%; -webkit-backface-visibility: hidden; }
.header_style_wrapper .top_bar { width: 100%; }
.top_bar { height: 100%; box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.1); }
#menu_wrapper { width: 100%; padding: 0; }
#page_content_wrapper, .ppb_wrapper, #page_caption, #page_caption.hasbg { width: calc(100% - 265px); margin-left: 265px; box-sizing: border-box; max-width: 100%; padding: 0; } 
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
.page_content_wrapper .inner, .standard_wrapper, #page_content_wrapper .inner #portfolio_filter_wrapper.sidebar_content { width: 100%; padding: 0; max-width: 100%; }
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
	
	//If not left align menu then display mega menu CSS
	if($tg_menu_layout != 3)
	{
?>
#menu_wrapper .nav ul li.megamenu > ul, #menu_wrapper div .nav li.megamenu > ul
{
	position: absolute;
	width: 960px;
	left: 0;
	right: 0;
	margin-left:auto;
    margin-right:auto;
    padding: 15px;
	box-sizing: border-box;
}

#menu_wrapper .nav ul li:not(.megamenu) ul.sub-menu li.arrow > a:after, #menu_wrapper div .nav li:not(.megamenu) ul.sub-menu li.arrow > a:after
{
	font-size:11px;
	margin-left: 0.5em;
	text-decoration: inherit;
	-webkit-font-smoothing: antialiased;
	display: inline;
	width: auto;
	height: auto;
	line-height: normal;
	vertical-align: 10%;
	background-image: none;
	background-position: 0% 0%;
	background-repeat: repeat;
	margin-top: 0;
	font-family: 'FontAwesome';
	content: "\f105";
	float: right;
	margin-right: 0px;
	margin-top: 5px;
}

#menu_wrapper div .nav li.megamenu ul li
{
	display: block;
	box-sizing: border-box;
	clear: none;
	float: left;
	border-left: 1px solid #eeeeee;
}

#menu_wrapper div .nav li.megamenu ul li.hidden > a
{
	display: none;
}

#menu_wrapper div .nav li.megamenu ul li:first-child
{
	border: 0;
}

#menu_wrapper div .nav li.megamenu.col2 ul li
{
	width: 50%;
	padding: 0px 12px;
}

#menu_wrapper div .nav li.megamenu.col3 ul li
{
	width: 33.3%;
	padding: 0px 12px;
}

#menu_wrapper div .nav li.megamenu.col4 ul li
{
	width: 25%;
	padding: 0px 12px;
}

#menu_wrapper .nav ul li.megamenu ul li ul, #menu_wrapper div .nav li.megamenu ul li ul
{
	position: relative;
	width: 100%;
	margin: 0;
	border: 0;
	box-shadow: 0 0 0;
	display: block !important;
	opacity: 1 !important;
	left: 0;
}

#menu_wrapper .nav ul li.megamenu ul li ul li, #menu_wrapper div .nav li.megamenu ul li ul li
{
	width: 100% !important;
	border: 0 !important;
}

#menu_wrapper div .nav li.megamenu ul li > a, #menu_wrapper div .nav li.megamenu ul li > a:hover, #menu_wrapper div .nav li.megamenu ul li  > a:active
{
	width: 100%;
	color: #444;
	box-sizing: border-box;
	font-size: 15px;
	background: transparent;
}

#menu_wrapper .nav ul li.megamenu ul li ul li a, #menu_wrapper div .nav li.megamenu ul li ul li a
{
	font-size: 13px;
	color: #888;
}

#menu_wrapper .nav ul li.megamenu ul li ul li a:before, #menu_wrapper div .nav li.megamenu ul li ul li a:before
{
	text-decoration: inherit;
	-webkit-font-smoothing: antialiased;
	display: inline;
	width: auto;
	height: auto;
	line-height: normal;
	vertical-align: 10%;
	background-image: none;
	background-position: 0% 0%;
	background-repeat: repeat;
	margin-top: 0;
	font-family: 'FontAwesome';
	content: "\f105";
	float: left;
	margin-right: 8px;
	margin-top: 4px;
}

#menu_wrapper .nav ul li.megamenu ul li ul li a:hover, #menu_wrapper div .nav li.megamenu ul li ul li a:hover, #menu_wrapper .nav ul li.megamenu ul li ul li a:active, #menu_wrapper div .nav li.megamenu ul li ul li a:active
{
	font-size: 13px;
	color: #444;
	background: #f9f9f9;
	width: auto;
}

#menu_wrapper div .nav li.megamenu ul li a:after
{
	display: none;
}

#menu_wrapper .nav ul li.megamenu ul li ul li, #menu_wrapper div .nav li.megamenu ul li ul li a
{
	width: auto;
	display: inline-block;
	margin-left: 20px;
	padding: 7px 20px 7px 5px;
}

@media only screen and (min-width: 1100px) {
	#menu_wrapper .nav ul li.megamenu > ul, #menu_wrapper div .nav li.megamenu > ul
	{
		max-width: 1425px;
		width: 100%;
		width: calc(100% - 180px);
		box-sizing: border-box;
	}
}
<?php
	}
?>
?>
</style>