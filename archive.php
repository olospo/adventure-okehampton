<?php /* Archive */
get_header(); ?>

<section class="post archive_listing">
  <div class="container">
    <div class="twelve columns">
      <div class="intro_content">
        <div class="content twelve columns">
          <h1><?php single_cat_title(); ?></h1>
        </div>
      </div>
      <div class="main_content">
        <div class="twelve columns">
        <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
          <?php get_template_part( 'inc/post' ); ?>
        <?php endwhile; ?>
        
        <?php numeric_posts_nav(); ?>
        </div>
        <?php else : ?>
        <!-- No posts found -->
        <?php endif; wp_reset_query(); ?>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>