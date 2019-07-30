<?php /* Page */
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

<?php get_template_part( 'inc/hero' ); ?>

<section class="page">
  <div class="container">
    <div class="content ten columns offset-by-one">
      <?php the_content(); ?>
    </div>
  </div>
</section>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>