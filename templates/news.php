<?php /* Template name: News */
get_header(); ?>

<section class="news">
  <div class="container">
    <div class="twelve columns">
      <?php while ( have_posts() ) : the_post(); ?>
      <div class="title twelve columns">
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
      </div>
      <?php endwhile; // end of the loop. ?>
      <div class="content">
      <?php 
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array('post_type' => 'post', 'order' => 'DESC', 'post_status' => 'publish', 'paged'=> $paged ); query_posts($args);
        if ( have_posts() ) : while (have_posts()) : the_post(); ?>
        <?php get_template_part( 'inc/post' ); ?>
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