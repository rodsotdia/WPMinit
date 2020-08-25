<?php get_header(); ?>

<div>

   <main>
         
      <?php if (have_posts()): while (have_posts()) : the_post(); ?>

         <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
         
            <h1><?php the_title(); ?></h1>

         <?php the_content(); ?>

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