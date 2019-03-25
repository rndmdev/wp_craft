<?php get_header(); ?>

<?php if ( have_posts() ) {
	while ( have_posts() ) : the_post(); // старт цикла ?>
		<h1><?php the_title(); // заголовок поста ?></h1>

		<?php the_content(); // контент ?>
	<?php endwhile;
} // конец цикла ?>

<?php if ( comments_open() || get_comments_number() ) {
	comments_template( '', true );
} ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
