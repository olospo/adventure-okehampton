<article class="standard one-third column">
  <div class="item_image">
    <a href="<?php the_permalink(); ?>">
      <img src="<?php echo get_template_directory_uri(); ?>/img/thumbnail-pattern.png" style="background: url(<?php the_post_thumbnail_url( 'featured-img' ); ?>) center center black; background-size: cover;" >
    </a>
  </div>
  <div class="item_content">
    <div class="content">
      <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
      <?php the_excerpt(); ?>
      <p class="date"><?php the_time('d/m/y'); ?> &nbsp; • &nbsp; <?php $category = get_the_category(); $name = $category[0]->cat_name; $cat_id = get_cat_ID( $name );$link = get_category_link( $cat_id ); echo '<a class="category_tag" href="'. esc_url( $link ) .'"">'. $name .'</a>'; ?></p>
      <a href="<?php the_permalink(); ?>" class="button">Read more</a>
    </div>
  </div>
</article>