<?php get_header(); ?>

<main class="wrapper mrg-top-2r">

    <section class="w70 center-content">

        <h1><?php echo sprintf( __( '%s Results for: ' ), $wp_query->found_posts ); echo get_search_query(); ?></h1>

		<?php get_template_part('loop'); ?>

		<?php get_template_part('pagination'); ?>

	</section>

</main>

<?php get_footer(); ?>
