<?php get_header(); ?>

<main class="wrapper mrg-top-2r">

   <div class="w70 center-content">

      <?php if (have_posts()): while (have_posts()) : the_post(); ?>

         <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>

            <?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
               <?php  the_post_thumbnail(); ?>
            <?php  endif; ?>

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

</div>

   <?php get_sidebar(); ?>

</main>

<?php get_footer(); ?>
