<?php /* Single Post */
get_header();

// Vars
$title = get_field('title');
$background = get_field('background_image');

while ( have_posts() ) : the_post(); ?>

<section class="article hero hero" style="background: linear-gradient(rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.45)), url(' <?php echo $background['url']; ?> ') center center no-repeat; background-size: cover;"> 
  <div class="float">
    <div class="container">
      <div class="content six columns offset-by-three">
        <h1><?php echo $title; ?></h1>
        <p><?php the_time('d/m/y'); ?></p>
      </div>
    </div>
  </div>
</section>

<?php
$thecontent = get_the_content();
if(!empty($thecontent)) { ?>
<section class="post">
  <div class="container">
    <div class="content ten columns offset-by-one">
      <?php the_content(); ?>
    </div>
  </div>
</section>
<?php } ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>