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

<section class="contact_cta">
  <div class="container">
    <div class="seven columns offset-by-one">
      Don’t see what you’re looking for? Make an enquiry to find out about other services we can offer
    </div>
    <div class="three columns">
      <a href="<?php echo get_site_url(); ?>/contact" class="button white">Get in touch</a>
    </div>
  </div>
</section>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>