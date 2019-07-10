<?php /* Template Name: Home */
get_header();
while ( have_posts() ) : the_post(); ?>

<?php /* Hero Section */
$title = get_field('title');
$description = get_field('short_description');
$buttonText = get_field('button_text');
$linkType = get_field('button_link');
$internalLink = get_field('button_link_internal');
$externalLink = get_field('button_link_external');
$background = get_field('background_image');
$colourScheme = get_field('colour_scheme');
?>

<section class="hero <?php echo $colourScheme; ?>" style="background: linear-gradient(rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.45)), <?php if($colourScheme == "black"){ ?> url('<?php echo get_template_directory_uri(); ?>/img/header-black.png') center center no-repeat,<?php } if($colourScheme == "blue"){ ?> url('<?php echo get_template_directory_uri(); ?>/img/header-blue.png') center center no-repeat,<?php } ?> url(' <?php echo $background['url']; ?> ') center center no-repeat; background-size: cover; "> 
  <div class="float">
    <div class="container">
      <div class="content eight columns offset-by-two">
      <h1><?php echo $title; ?></h1>
      <form>
        <select class="activity">
          <option value="" selected>Activity Type</option>
          <option value="text">Text</option>
          <option value="text">Text</option>
          <option value="text">Text</option>
          <option value="text">Text</option>
        </select>
        <select class="party">
          <option value="" selected>Your Party</option>
          <option value="text">Text</option>
          <option value="text">Text</option>
          <option value="text">Text</option>
          <option value="text">Text</option>
        </select>
        <input type="submit" value="Book Now">
      </form>
      </div>
    </div>
  </div>
</section>

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
    <blockquote class="eight columns offset-by-two">
      <p>"It was so much fun, I feel like I can climb a mountain!"</p>
      <footer>Thomas, King Edward school, Bath</footer>
    </blockquote>
  </div>
</section>

<section class="activities-list">
  <div class="container">
    <div class="six columns eight columns offset-by-two">
    <h2>Activities</h2>
    <p>We have 20 activities, ranging from archery to geocaching for you to create your own adventure!</p>
    </div>
  </div>
</section>

<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>