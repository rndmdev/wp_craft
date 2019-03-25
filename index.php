<?php get_header(); ?>
	<section>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'loop' ); ?>
		<?php endwhile;
		else: echo '<h2>Нет записей.</h2>'; endif; ?>
	</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>