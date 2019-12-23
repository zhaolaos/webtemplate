<?php get_header(); ?>
	<!-- 大轮播图 -->
	<div id="slide1" class="carousel">
		<div class="carousel-inner">
      <div class="item active">
         <img src="<?php bloginfo('template_url'); ?>/images/slide2.jpg" alt="First slide">
      </div>
<!--       <div class="item">
         <img src=" bloginfo('template_url'); ?>/images/slide2.jpg" alt="Second slide">
      </div> -->
   	</div>
	</div>
	<!--  -->
	<div class="wrapper">
		<div class="container">
	<div class="row">
		<!-- 图片新闻 -->
		<div class="col-md-4">
			<div class="panel">
					<?php include 'slider.php';	?>	
			</div>

		</div>
		<div class="col-md-5">
			<div class="panel panel-primary">
				<!-- 新闻动态 -->
	<?php query_posts('showposts=8&cat=1'); ?>
				<div class="panel-heading"><span class="glyphicon glyphicon-list-alt">&nbsp;</span><?php single_cat_title(); ?></div>
				<div class="more"><a class="btn btn-success" href="<?php echo get_category_link(1);?>">More</a></div>
				<ul class="panel-body">
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<li><a href="<?php the_permalink() ?>" target="_blank"><?php  customTitle(66); ?></a><span class="pull-right"><?php the_time('Y/m/d') ?></span></li>
<?php endwhile; ?><?php else : ?><li>此分类暂无内容</li>
<?php endif; ?>
				</ul>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel panel-danger">
				<!-- 团队构成 -->
				<div class="panel-heading"><span class="glyphicon glyphicon-user">&nbsp;</span>团队构成</div>
				<div class="panel-body text-center">
					<div><img src="<?php bloginfo('template_url'); ?>/images/zjlogin.jpg" alt=""></div>
					<div><img src="<?php bloginfo('template_url'); ?>/images/zjlogin.jpg" alt=""></div>
					<div><img src="<?php bloginfo('template_url'); ?>/images/zjlogin.jpg" alt=""></div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-primary">
				<!-- 技术交流 -->
<?php query_posts('showposts=8&cat=9'); ?>
				<div class="panel-heading"><span class="glyphicon glyphicon-envelope">&nbsp;</span><?php single_cat_title(); ?></div>
				<div class="more"><a class="btn btn-success" href="<?php echo get_category_link(9);?>">More</a></div>
				<ul class="panel-body">
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<li><a href="<?php the_permalink() ?>" target="_blank"><?php  customTitle(50); ?></a><span class="pull-right"><?php the_time('Y/m/d') ?></span></li>
<?php endwhile; ?><?php else : ?><li>此分类暂无内容</li>
<?php endif; ?>
				</ul>
			</div>	
		</div>
		<div class="col-md-5">
			<div class="panel panel-primary">
				<!-- 通知公告 -->
<?php query_posts('showposts=8&cat=8'); ?>
				<div class="panel-heading"><span class="glyphicon glyphicon-envelope">&nbsp;</span><?php single_cat_title(); ?></div>
				<div class="more"><a class="btn btn-success" href="<?php echo get_category_link(8);?>">More</a></div>
				<ul class="panel-body">
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<li><a href="<?php the_permalink() ?>" target="_blank"><?php  customTitle(66); ?></a><span class="pull-right"><?php the_time('Y/m/d') ?></span></li>
<?php endwhile; ?><?php else : ?><li>此分类暂无内容</li>
<?php endif; ?>
				</ul>
			</div>			
		</div>
		<div class="col-md-3">
			<!--  -->
			<div class="panel panel-danger">
				<!-- 登录 -->
				<div class="panel-heading"><span class="glyphicon glyphicon-pencil">&nbsp;</span>登录搜索</div>
				<div class="panel-body">
					<form class="form-horizontal">
					  <div class="form-group">
					  	<div class="col-sm-1"></div>
					    <label class="col-sm-3 btn" for="leibie">用户名</label>
					    <div class="col-sm-7">
					    	<input type="text" class="form-control" id="username">
<!-- 						    <select class="form-control" id="leibie">
							  <option>1</option>
							  <option>2</option>
							  <option>3</option>
							  <option>4</option>
							  <option>5</option>
							</select>	 -->				    	
					    </div>
					    <div class="col-sm-1"></div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-1"></div>
					    <label class="col-sm-3 btn" for="leibie">密&nbsp;&nbsp;&nbsp;码</label>
					    <div class="col-sm-7">
					    	<input type="text" class="form-control" id="password">
					    </div>
					    <div class="col-sm-1"></div>
					  </div>
					  <div class="text-center">
						<button type="submit" class="btn btn-warning">专家登录</button>
					  </div>
					</form>
			    <div class="input-group"  style="margin-top: 30px">
			      <input type="text" class="form-control" placeholder="站内搜索">
			      <span class="input-group-btn">
			        <button class="btn btn-primary" type="button"><span class="glyphicon glyphicon-search"></span>搜索</button>
			      </span>
			    </div><!-- /input-group -->
<!-- 					<div class="text-center" style="padding-top: 30px;"><a href="#" class="btn btn-danger btn-lg" role="button"><span class="glyphicon glyphicon-log-in">&nbsp;</span>专家登录</a></div> -->
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-primary">
				<!-- 体系动态 -->
<?php query_posts('showposts=8&cat=3'); ?>
				<div class="panel-heading"><span class="glyphicon glyphicon-list">&nbsp;</span><?php single_cat_title(); ?></div>
				<div class="more"><a class="btn btn-success" href="<?php echo get_category_link(3);?>">More</a></div>
				<ul class="panel-body">
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<li><a href="<?php the_permalink() ?>" target="_blank"><?php  customTitle(50); ?></a><span class="pull-right"><?php the_time('Y/m/d') ?></span></li>
<?php endwhile; ?><?php else : ?><li>此分类暂无内容</li>
<?php endif; ?>
				</ul>
			</div>
		</div>
		<div class="col-md-5">
			<div class="panel panel-primary">
				<!-- 市场行情 -->
<?php query_posts('showposts=8&cat=10'); ?>
				<div class="panel-heading"><span class="glyphicon glyphicon-envelope">&nbsp;</span><?php single_cat_title(); ?></div>
				<div class="more"><a class="btn btn-success" href="<?php echo get_category_link(10);?>">More</a></div>
				<ul class="panel-body">
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<li><a href="<?php the_permalink() ?>" target="_blank"><?php  customTitle(66); ?></a><span class="pull-right"><?php the_time('Y/m/d') ?></span></li>
<?php endwhile; ?><?php else : ?><li>此分类暂无内容</li>
<?php endif; ?>
				</ul>
			</div>
		</div>
		<div class="col-md-3">
			<!-- 企业推介 -->
			<div class="panel panel-danger">
<?php query_posts('showposts=8&cat=11'); ?>
				<div class="panel-heading"><span class="glyphicon glyphicon-bullhorn">&nbsp;</span><?php single_cat_title(); ?></div>
				<div class="more"><a class="btn btn-success" href="<?php echo get_category_link(11);?>">More</a></div>
				<ul class="panel-body">
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<li><a href="<?php the_permalink() ?>" target="_blank"><?php customTitle(46); ?></a></li>
<?php endwhile; ?><?php else : ?><li>此分类暂无内容</li>
<?php endif; ?>
				</ul>
			</div>
			<!--  -->
		</div>
	</div>			
		</div>
	</div>
<?php get_footer(); ?>