<article class="one-third column">
  <div class="image">
    <a href="<?php the_permalink(); ?>">
    <?php if( have_rows('overlay') ): ?>
    <div class="overlay">
      <ul>
      <?php while( have_rows('overlay') ): the_row(); 
        // vars
        $overlayText = get_sub_field('overlay_text');
		  ?>
      <li><?php echo $overlayText; ?></li>
      <?php endwhile; ?>
      </ul>
    </div>
    <?php endif; ?> 
    <img src="<?php the_post_thumbnail_url( 'featured-img' ); ?>" />
  </div>
  <div class="content">
    <h3><?php the_title(); ?></h3></a>
  </div>
</article>