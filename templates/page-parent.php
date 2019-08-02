<?php /* Template name: Page Parent */
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

<?php get_template_part( 'inc/hero' ); ?>

<section class="post archive_listing">
  <div class="container">
    <div class="twelve columns">
      <div class="main_content">
        <?php

        $args = array(
            'post_type'      => 'page',
            'posts_per_page' => -1,
            'post_parent'    => $post->ID,
            'order'          => 'ASC',
            'orderby'        => 'menu_order'
         );

        $parent = new WP_Query( $args );

        if ( $parent->have_posts() ) : ?>

        <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>
          <?php get_template_part( 'inc/article' ); ?>
        <?php endwhile; ?>

        <?php endif; wp_reset_postdata(); ?>

    </div>
  </div>
</section>

<?php get_template_part( 'inc/components' ); ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>