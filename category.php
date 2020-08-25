<?php get_header(); ?>

<main>

   <section>

      <h1><?php single_cat_title(); ?></h1>
		<?php get_template_part('loop'); ?>
		<?php get_template_part('pagination'); ?>

	</section>

</main>

<?php get_footer(); ?>
