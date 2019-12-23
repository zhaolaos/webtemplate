<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<title><?php if (is_home()) { 
		bloginfo('name');
	} elseif ( is_category() ) {
		single_cat_title(); echo " - "; bloginfo('name');
	} elseif (is_single() || is_page() ) {
		single_post_title();
	} elseif (is_search() ) {
		echo "搜索结果"; echo " - "; bloginfo('name');
	} elseif (is_404() ) {
		echo '页面未找到!';
	} else {
		wp_title('',true);
	} ?></title>
	<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
</head>
<body>
	<header>
		<div class="container">
			<div id="logo" class="row">
				<div class="col-lg-8">
					<div class="media">
						<div class="media-left">
							<img class="media-object" src="<?php bloginfo('template_url'); ?>/images/logo.jpg" alt="" style="width: 80px;">
						</div>
						<div class="media-body">
							<h1 class="media-heading" style="padding-top: 15px"><?php bloginfo('name'); ?></h1>							
						</div>
					</div>
				</div>
			<div class="col-lg-4">
<?php include("searchform.php")?>
			</div><!--col-lg-4-->
			</div>			
		</div>
		<nav class="navbar navbar-inverse">
	   <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-collapse" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	    </div>	
			<div class="container">
<!-- 			<div class="collapse navbar-collapse" id="menu-collapse">
				<ul class="nav nav-justified"> -->
<?php //wp_list_categories('orderby=id&hide_empty=0&title_li='); 
	wp_nav_menu( array(
		'container'       => 'div',
		'container_class' => 'collapse navbar-collapse',
		'container_id'    => 'menu-collapse',
		'menu_class'      => 'nav nav-justified',
		'menu_id'         => '',
		'echo'            => true,
		'items_wrap'      => '<ul class = "%2$s">%3$s</ul>',
		'depth'           => 0,
	) );
?>
<!-- 				</ul>
			</div> -->
		</div>
		</nav>
	</header>