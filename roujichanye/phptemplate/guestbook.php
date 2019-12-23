<?php
/*
Template Name: guestbook
*/
?>
<?php 
	if (have_posts()) {
		# code...
		the_content();
	}
?>
<?php get_header(); ?>
<div id="comments">
<?php comments_template(”,true); ?>
</div>
<?php get_footer(); ?>