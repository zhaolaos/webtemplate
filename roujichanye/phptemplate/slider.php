
<?php
	$arr = array('meta_key' => '_thumbnail_id',
                'showposts' => 5,        // 显示5个特色图像
                'posts_per_page' => 5,   // 显示5个特色图像
                'orderby' => 'date',     // 按发布时间先后顺序获取特色图像，可选：'title'、'rand'、'comment_count'等
                'ignore_sticky_posts' => 1,
                'order' => 'DESC');

	$slideshow = new WP_Query($arr);
	if ($slideshow->have_posts()) {
		$postCount = 0;
?>
<div id="slide2" class="carousel">
				<ul class="carousel-indicators">
<?php
		while ($slideshow->have_posts()) {
			$slideshow->the_post();
?><li data-target="#slide2" data-slide-to="<?php echo $postCount; ?>" <?php if($postCount == 0) echo 'class="active"';?>></li>

<?php
			$postCount++;
		} // endwhile
?>
</ul>
<div class="carousel-inner">
	<?php
	$postCount = 0;
		while ($slideshow->have_posts()) {
			$slideshow->the_post();

?>
		      <div class="item text-center <?php if($postCount == 0) echo 'active';?>">
		      	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		         <?php
			// 获取特色图像的地址
			//$timthumb_src = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID(),'') );
			//echo '<img alt="' . get_the_title() . '" style="display:inline" src="' . $timthumb_src[0] . '" /> ';
		         the_post_thumbnail('large');
		?>
		       	</a>
		         <div class="carousel-caption"><?php the_title(); ?></div>
		      </div>

<?php
			$postCount++;
		} // endwhile
		wp_reset_postdata();
	} // endif
?>


		   	</div>
			</div>