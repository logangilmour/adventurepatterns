<?php get_header(); ?>
<section id="content" class="archive" role="main">
<?php $last_heading = null;?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php $heading = date('F Y',strtotime($post->post_date));
if($last_heading!=$heading){
if($last_heading!=null){
	echo '</ul>';
}
echo '<h2>'.$heading.'</h2><ul>';
$last_heading = $heading;
}
?>
<li>
<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
</li>
<?php endwhile; endif; ?>
<?php if($last_heading!=null){echo '</ul>';} ?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>