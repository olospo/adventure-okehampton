<?php /* Template Name: Home */
get_header();
while ( have_posts() ) : the_post(); ?>

<?php get_template_part( 'inc/hero' ); ?>

<?php
$thecontent = get_the_content();
if(!empty($thecontent)) { ?>
<section class="page">
  <div class="container">
    <div class="content twelve">
      <?php the_content(); ?>
    </div>
  </div>
</section>
<?php } ?>

<section class="testimonial">
  <div class="container">
    <blockquote>
      <p>"It was so much fun, I feel like I can climb a mountain!"</p>
      <footer>Thomas, King Edward school, Bath</footer>
    </blockquote>
  </div>
</section>

<section class="activities-list">
  <div class="container">
    <h2>Activities</h2>
    <p>We have 20 activities, ranging from archery to geocaching for you to create your own adventure!</p>
  </div>
</section>

<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>