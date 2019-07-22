<?php /* Template Name: Home */
get_header();

// Vars
$title = get_field('title');
$heroType = get_field('image_video');
$image = get_field('background_image');
$video = get_field('video');

while ( have_posts() ) : the_post(); ?>

<section class="hero" <?php if( $heroType == 'image' ): ?> style="background: linear-gradient(rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.45)), url(' <?php echo $image['url']; ?> ') center center no-repeat; background-size: cover;"<?php endif; ?>>
  <?php if( $heroType == 'video' ): ?>
  <style>
  .video-area {
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
    pointer-events: none;
    overflow: hidden;
  }
  .video-area iframe {
    width: 100vw;
    height: 56.25vw; /* Given a 16:9 aspect ratio, 9/16*100 = 56.25 */
    min-height: 100vh;
    min-width: 177.77vh; /* Given a 16:9 aspect ratio, 16/9*100 = 177.77 */
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }
  </style>
  <div class="video-area">
    <?php
    // get iframe HTML
    $iframe = get_field('video');
    
    // use preg_match to find iframe src
    preg_match('/src="(.+?)"/', $iframe, $matches);
    $src = $matches[1];
    
    // add extra params to iframe src
    $params = array(
      'controls'    => 0,
      'hd'          => 1,
      'autohide'    => 1,
      'autoplay'    => 1,
      'showinfo'    => 0,
      'loop'        => 1
    );
    
    $new_src = add_query_arg($params, $src);
    $iframe = str_replace($src, $new_src, $iframe);
    
    
    // add extra attributes to iframe html
    $attributes = 'frameborder="0"';
    $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
    
    // echo $iframe
    echo $iframe; ?>

  </div>
  <?php endif; ?>
  <div class="float <?php if($video) : ?>video<?php endif; ?>">
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
	<?php while( have_rows('quick_links') ): the_row(); 
    $post_object = get_sub_field('link'); if( $post_object ): 
    	// override $post
    	$post = $post_object;
    	setup_postdata( $post ); 
    
      get_template_part( 'inc/article' );
    
    wp_reset_postdata(); ?>
    <?php endif; ?>
	<?php endwhile; ?>

	</div>
</section>

<?php endif; ?>

<section class="testimonial">
  <div class="container">
    <?php if( have_rows('testimonials') ): ?>
    	<div class="testimonials eight columns offset-by-two">
    	<?php while( have_rows('testimonials') ): the_row(); 
    		// vars
    		$quote = get_sub_field('quote');
    		$attribution = get_sub_field('quote_attribution');
    		?>
    		   
    		<blockquote>
    			<p><?php echo $quote; ?></p>
          <footer><?php echo $attribution; ?></footer>
    		</blockquote> 
    		   
    	<?php endwhile; ?>
    	</div>
    <?php endif; ?>
    </div>
  </div>
</section>

<section class="activities-list">
  <div class="container">
    <div class="eight columns offset-by-two">
    <h2>Activities</h2>
    <p>We have 20 activities, ranging from archery to geocaching for you to create your own adventure!</p>
    </div>
    <div class="twelve columns">
      <?php $current_post = $post->ID;        
      query_posts(array( 
        'post_type' => 'activities',
        'showposts' => -1,
        'orderby'   => 'rand',
        'order'     => 'ASC',
              
      ));  
      ?>
        <div class="activity-scroll">
        <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
          <?php $icon = get_field('activity_icon'); ?>
          <a href="<?php the_permalink(); ?>">
            <div class="circle">
              <img src="<?php echo $icon['url']; ?>">
            </div>
            <?php the_title(); ?>
          </a>
        <?php endwhile; ?>
        </div>
        <?php else : endif; wp_reset_query(); ?>
    <a href="<?php echo get_site_url(); ?>/activities" class="button">View All</a>
    </div>
  </div>
</section>

<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>