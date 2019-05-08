<?php get_header(); ?>

<h1><?php the_archive_title(); ?></h1>

<?php if ( have_posts() ) {
	while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'template-parts/loop' ); ?>

	<?php endwhile;
} else {
	echo "<div class='no-posts'>Пока тут ничего нет. Извините</div>";
} ?>


<?php if ( function_exists( 'pagination' ) ) {
	pagination();
} ?>

<?php get_footer(); ?>
