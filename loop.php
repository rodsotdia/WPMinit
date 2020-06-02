<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        
		<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_post_thumbnail(array(120,120)); // Declare pixel size you need inside the array ?>
			</a>
		<?php endif; ?>

		<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

		<?php wpminit_excerpt('wpminit_index'); // Custom callback length in functions.php ?>
		
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read more...</a>

	</article>

    <?php endwhile; ?>

    <?php else: ?>

	<article>
		<h2>Nothing to show :(</h2>
	</article>

<?php endif; ?>