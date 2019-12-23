<?php 
if(!is_user_logged_in()) {
	echo "登陆后才能访问";
} else{
 get_header(); ?>
	<!-- 大轮播图 -->
	<div id="slide1" class="carousel">
		<div class="carousel-inner">
      <div class="item active">
         <img src="<?php bloginfo('template_url'); ?>/images/slide2.jpg" alt="First slide">
      </div>
<!--       <div class="item">
         <img src="images/slide2.jpg" alt="Second slide">
      </div> -->
   	</div>
	</div>
	<div class="wrapper">
		<div class="container">
<?php if(function_exists('get_breadcrumbs')) get_breadcrumbs();?>
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-danger">
						<div class="panel-heading">体系建设</div>
						<div class="panel-body">
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<div class="article">
								<h3 class="text-center"><?php the_title(); ?></h3>
							<p class="text-center">文章来源：本站原创 | 文章作者： 管理员 | 发布时间： <?php the_time('Y年m月d日 G:i') ?></p>
							<hr>
<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
							</div>
							<?php endwhile; else: ?>
							<div class="post">
<h2>暂无内容</h2>
<center><br/>抱歉！您所浏览的页面暂无内容。<br/><br/>可能页面正在制作中；<br/><br/>可能已经更名或迁移；<br/><br/>也可能该页并未存在过。<br/><br/><br/>您可<a href="<?php echo get_option('home'); ?>/">返回首页</a>，或试试搜索：<br/><br/>
<?php include (TEMPLATEPATH . '/searchform.php'); ?>
</center></div><!--END POST-->

<?php endif; ?>
							<div id="relativelink">
								<hr>
								<p class="pull-left">上一篇:<?php previous_post_link('%link') ?></a></p>
								<p class="pull-right">下一篇:<?php next_post_link('%link') ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); }?>