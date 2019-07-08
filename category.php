<?php /* Category */
get_header(); ?>

<?php get_template_part( 'inc/breadcrumbs' ); ?>

<section class="news">
  <div class="container">
    <div class="twelve columns">
      <div class="title six columns">
        <h1><?php single_cat_title(); ?></h1>
        <?php the_content(); ?>
      </div>
      <div class="content">
        <?php if ( have_posts() ) : while (have_posts()) : the_post(); if( $wp_query->current_post == 0 ) : // If First Post ?>
        <article class="featured sixteen columns">
          <div class="item_image six columns">
            <a href="<?php the_permalink(); ?>">
              <img src="<?php echo get_template_directory_uri(); ?>/img/thumbnail-pattern.png" style="background: url(<?php the_post_thumbnail_url( 'featured-img' ); ?>) center center black; background-size: cover;" >
            </a>
          </div>
          <div class="item_content six columns">
            <div class="content">
              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <?php the_excerpt(); ?>
              <p class="date"><?php the_time('d/m/y'); ?></p>
              <a href="<?php the_permalink(); ?>" class="button">Read more</a>
            </div>
          </div>
        </article>
      </div>
      <div class="content">
      <?php else : ?>
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
              <p class="date"><?php the_time('d/m/y'); ?></p>
              <a href="<?php the_permalink(); ?>" class="button">Read more</a>
            </div>
          </div>
        </article>
      <?php endif; ?>
      <?php endwhile; ?>
      </div>
      <div class="content">
        <div class="sixteen columns">
          <?php numeric_posts_nav(); ?>
        </div>
      </div>
        <?php else : ?>
        <!-- No posts found -->
        <?php endif; wp_reset_query(); ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>