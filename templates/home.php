<?php /* Template Name: Home */
get_header();

// Vars
$title = get_field('title');
$heroType = get_field('image_video');
$image = get_field('background_image');
$videoType = get_field('upload_or_link');
$videoLink = get_field('link_video');
$videomp4 = get_field('upload_video_mp4');
$videowebm = get_field('upload_video_webm');
$videoFallback = get_field('mobile_fallback_image');

while ( have_posts() ) : the_post(); ?>

<section class="home hero <?php if ( $videoType == 'link' ): // Video Link ?>video-link<?php endif; ?>" <?php if( $heroType == 'image' ): ?> style="background: linear-gradient(rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.45)), url(' <?php echo $image['url']; ?> ') center center no-repeat; background-size: cover;"<?php endif; ?>>
  <?php if( $heroType == 'video' ): ?>
    <?php if ( $videoType == 'link' ): // Video Link ?>
    <div class="video-area" style="background: linear-gradient(rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.45)), url(' <?php echo $videoFallback['url']; ?> ') center center no-repeat; background-size: cover;">
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
    <?php if ( $videoType == 'upload' ): // Video Upload ?>
    <div class="video-upload hidden-mobile" style="background: linear-gradient(rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.45)), url(' <?php echo $videoFallback['url']; ?> ') center center no-repeat; background-size: cover;">
      <video muted autoplay preload="auto" loop>
        <source src="<?php echo $videomp4; ?>" type="video/mp4">
        <source src="<?php echo $videowebm; ?>" type="video/webm">
      </video>
    </div>
    <?php endif; ?>
  <?php endif; ?>
  <div class="float <?php if( $heroType == 'video' && $videoType == 'upload' ): ?>video<?php endif; ?>">
    <div class="container">
      <div class="content eight columns offset-by-two">
      <h1><?php echo $title; ?></h1>
      <?php echo $link = the_field('individual_button_code','options'); ?>
      <a href="<?php echo the_field('group_button_link','options'); ?>" class="button">Group Enquiry</a>
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
    <p>We have over 20 activities, ranging from archery to geocaching for you to create your own adventure!</p>
    </div>
    <div class="ten columns offset-by-one">
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