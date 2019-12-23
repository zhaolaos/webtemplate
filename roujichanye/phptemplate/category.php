<?php get_header();?>
	<!-- 大轮播图 -->
	<!-- <div id="slide1" class="carousel">
		<div class="carousel-inner">
      <div class="item active">
         <img src="<?php bloginfo('template_url')?>/images/slide2.jpg" alt="First slide">
      </div>
      <div class="item">
         <img src="<?php bloginfo('template_url')?>/images/slide1.jpg" alt="Second slide">
      </div>
   	</div>
	</div> -->
	<div class="wrapper">
		<div class="container">
			<?php if(function_exists('get_breadcrumbs')) get_breadcrumbs();?>
			<div class="row">
<?php /* If this is a category archive */ //if (is_category()) { ?>
				<div class="col-md-3 text-center">
					<div class="panel panel-default">
						<div class="panel-heading">
							栏目导航
						</div>
  					<div class="panel-body">
    					<div class="list-group">
<?php
 $categoryparent = get_the_category();//默认获取当前所属分类 
 //wp_list_categories("child_of=".$category[0]->cat_ID."&hide_empty=0&title_li=&style=none");
$args=array(
'child_of' => $categoryparent[0]->cat_ID,
'hide_empty' => 0,
);
$categories=get_categories($args);
foreach($categories as $category) {?>
　　　　<a class="list-group-item" href="<?php echo get_category_link($category->term_id);?>" ><?php echo $category->name;?></a>
<?php }?>
    					</div>
  					</div>
					</div>
				</div>
				<div class="col-md-9">
					<div class="panel panel-danger">
						<div class="panel-heading">
							<?php single_cat_title();  ?>分类文章列表
						</div>
						<div id="panel-content">
<?php if (have_posts()) : ?>
<?php // $post = $posts[0]; // Hack. Set $post so that the_date() works. 
// $limit = get_option('posts_per_page');
// $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
// echo('cat='.$categoryparent[0]->cat_ID.'&showposts=' . $limit=2 . '&paged=' . $paged);
// query_posts('cat='.$categoryparent[0]->cat_ID.'&showposts=' . $limit=2 . '&paged=' . $paged);
// $wp_query->is_archive = true; $wp_query->is_home = false;
?>
<ul class="panel-body">
<?php while (have_posts()) : the_post(); ?>
				<li>
					<a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><?php the_title(); ?></a>
					<span class="pull-right"><?php the_time('Y-m-d'); ?></span>
				</li>
			<?php endwhile; ?>
							</ul>
						<div id="page-content" class="text-center">
						<?php lingfeng_pagenavi(); ?>
						</div>
						<?php else : ?>
	<div class="panel-body">
<div class="col-lg-8"><p>抱歉！您所浏览的页面暂无内容。</p><p>可能页面正在制作中；可能已经更名或迁移；也可能该页并未存在过。</p><p>您可<a href="<?php echo get_option('home'); ?>/">返回首页</a>，或试试搜索</p>
<?php include ('searchform.php'); ?></div>
</center></div><!--END POST-->

<?php endif; ?>						
					</div>

					</div>
				</div>
			</div>
		</div>
	</div>
<?php wp_reset_postdata();
 get_footer();?>