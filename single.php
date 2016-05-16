<?php get_header(); ?>
<div class="row">
	<?php if (have_posts()) : while (have_posts()) : the_post(); setPostViews(get_the_ID()); ?>
	<div class="col-md-3" id="single-side">
		<h4 class="title">App Info</h4>
		<div class="thumbnail">
			<div class="img-div">
				<img src="<?php echo img(); ?>" alt="<?php the_title(); ?>">
			</div>
			<div class="caption">
				<h4 class="text-center"><?php the_title(); ?></h4>
				<p class="text-center">
					<a target="_blank" rel="nofollow" href="<?php echo meta('link'); ?>" class="btn btn-primary">Download App</a>
<p class="text-center">
<div class="fb-like" data-href="/<?php the_permalink(); ?>" align="center" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
</p>
				</p>
				<?php echo meta('meta'); ?>
			</div>
		</div>
	</div>
	<div class="col-md-9" id="single-content">
		<h4 class="title">Details</h4>
		<?php if(meta('appimg')) : $appimgs = explode(',',meta('appimg')); ?>
		<div id="carousel-example-generic-s" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<?php foreach($appimgs as $appimg) :  ?>
				<li data-target="#carousel-example-generic-s" data-slide-to="<?php echo $num; ?>" class="<?php if($num<1) echo 'active'; ?>">
					<div class="img-div"><img src="<?php echo $appimg; ?>"></div>
				</li>
				<?php $num++; endforeach; ?>
			</ol>
			<!-- Wrapper for slides -->
			<div class="carousel-inner">
				<?php foreach($appimgs as $appimg) :  $num2++;?>
				<div class="item <?php if($num2==1) echo 'active'; ?>">
					<img src="<?php echo $appimg; ?>">
				</div>
				<?php endforeach; ?>
			</div>
		</div>
		<?php endif; ?>
		<div id="entry">
			<?php the_content(); ?>
		</div>
	</div>
	<?php endwhile; endif; ?>
<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-numposts="20" width="100%" data-colorscheme="light" data-version="v2.3"></div>
</div>
<?php get_footer(); ?>