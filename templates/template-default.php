<?php /* Template Name: Default Template */ get_header(); ?>

<main class="wrapper mrg-top-2r">
       
   <section class="w-70 center-content">

   <h1><?php the_title(); ?></h1>

      <?php if (have_posts()): while (have_posts()) : the_post(); ?>

         <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

         <?php the_content(); ?>

         <br class="clear">

         <?php edit_post_link(); ?>

      </article>

   <?php endwhile; ?>
   <?php else: ?>
      <article>
         <h2>Nothing to show :(</h2>
      </article>
   <?php endif; ?>

	</section>
		
</main>
              
<?php get_footer(); ?>

