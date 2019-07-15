<?php /* Template Name: Home */
get_header();

// Vars
$title = get_field('title');
$background = get_field('background_image');

// Quick Links


while ( have_posts() ) : the_post(); ?>

<section class="hero" style="background: linear-gradient(rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.45)), url(' <?php echo $background['url']; ?> ') center center no-repeat; background-size: cover;"> 
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

<?php if( have_rows('quick_links') ): ?>

<section class="quick_links">
  <div class="container">

	<?php while( have_rows('quick_links') ): the_row(); ?>

    <?php $post_object = get_sub_field('link'); if( $post_object ): 
    	// override $post
    	$post = $post_object;
    	setup_postdata( $post ); 
    ?>

		<article class="one-third column">
      <div class="image">
        <a href="<?php the_permalink(); ?>">
        <?php if( have_rows('overlay') ): ?>
        <div class="overlay">
          <ul>
          <?php while( have_rows('overlay') ): the_row(); 

        		// vars
        		$overlayText = get_sub_field('overlay_text');
        		
          ?>
          <li><?php echo $overlayText; ?></li>
          <?php endwhile; ?>
            </ul>
          </div>
          <?php endif; ?> 
        <img src="<?php the_post_thumbnail_url( 'background-img' ); ?>" />
      </div>
      <div class="content">
      <h3><?php the_title(); ?></h3></a>
      </div>
    </article>
    <?php wp_reset_postdata(); ?>
    <?php endif; ?>
	<?php endwhile; ?>

	</div>
</section>

<?php endif; ?>

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
    <a href="<?php echo get_site_url(); ?>/activities" class="button">View All</a>
    </div>
  </div>
</section>

<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>