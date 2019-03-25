<?php get_header(); ?>

<h1><?php single_cat_title(); ?></h1>

<?php if ( category_description() ): ?>
	<?php echo category_description(); ?>
<?php endif; ?>

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

