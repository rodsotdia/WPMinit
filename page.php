<?php get_header(); ?>

<div class="wrapper mrg-top-2r">

   <main class="w70 center-content">
         
      <?php if (have_posts()): while (have_posts()) : the_post(); ?>

         <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
         
            <h1><?php the_title(); ?></h1>

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
   
      
   </main>
      
   <?php get_sidebar(); ?>
   
</div>
    
<?php get_footer(); ?>