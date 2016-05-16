<?php get_header(); ?>
<h4 class="title">
	All App
</h4>
<div class="row">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php get_template_part('foot-loop'); ?>
	<?php endwhile; endif; ?>
</div>
<style>.carousel-example-generic {display: none;}</style>
<?php get_footer(); ?>