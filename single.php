<?php get_header(); ?>
<section id="content" role="main">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<header>
<h1 class="title"><?php the_title(); ?></h1>
<time><?php the_date(); ?></time>
</header>
<?php the_content(); ?>

<nav id="nav-below" class="navigation" role="navigation">
<table>
<row>
<td>
<?php previous_post_link( '%link', '<span class="meta-nav">&larr;</span> %title' ); ?>
</td>
<td class="right">
<?php next_post_link( '%link', '%title <span class="meta-nav">&rarr;</span>' ); ?>
</td>
</row>
</table>
</nav>

<?php if ( ! post_password_required()) comments_template( '', true ); ?>
</article>

<?php endwhile; endif; ?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>