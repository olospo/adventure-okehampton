<?php /* Single Post */
get_header();

while ( have_posts() ) : the_post(); ?>

<section class="article hero <?php echo $color; ?>" style="background: url(' <?php the_post_thumbnail_url( 'background-img' ); ?> ') center center no-repeat; background-size: cover;"> 
  <div class="float">
    <div class="container">
      <div class="content six columns offset-by-three">
        <h1><?php the_title(); ?></h1>
        <a href="#" class="button">Individual Booking</a> <a href="#" class="button">Group Enquiry</a>
      </div>
    </div>
  </div>
</section>

<?php
$thecontent = get_the_content();
if(!empty($thecontent)) { ?>
<section class="post">
  <div class="container">
    <div class="content eight columns">
      <?php the_content(); ?>
    </div>
  </div>
</section>
<?php } ?>

<?php endwhile; // end of the loop. ?>

<?php get_template_part( 'inc/components' ); ?>

<?php get_footer(); ?>