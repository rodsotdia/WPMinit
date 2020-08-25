<?php get_header(); ?>

<main>

    <section>

         <h1><?php _e( 'Tag: ' ); echo single_tag_title('', false); ?></h1>
         <?php get_template_part('loop'); ?>
         <?php get_template_part('pagination'); ?>

	</section>

</main>

<?php get_footer(); ?>
