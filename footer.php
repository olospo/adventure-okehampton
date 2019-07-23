<?php /* Footer */ ?>
<section class="quick-links">
  <div class="container">
    <?php if( have_rows('quick_link_one','options') ): ?>
    <div class="quick slide_one one-third column">
    	<?php while( have_rows('quick_link_one','options') ): the_row(); 
    		// vars
    		$imageOne = get_sub_field('image_one','options');
    		$title = get_sub_field('title','options');
    		$content = get_sub_field('description','options');
    		$link = get_sub_field('button_link','options');
    		$linkText = get_sub_field('button_text','options');
    		
    		// thumbnail
      	$size = 'featured-img';
      	$thumb = $imageOne['sizes'][ $size ];
      	$width = $imageOne['sizes'][ $size . '-width' ];
      	$height = $imageOne['sizes'][ $size . '-height' ];
    
    		?>
    		<article class="blue">
          <img src="<?php echo $thumb; ?>" />
          <div class="content">
            <h3><?php echo $title; ?></h3>
            <p><?php echo $content; ?></p>
            <a href="<?php echo $link; ?>" class="button"><?php echo $linkText; ?></a>
          </div>
        </article>
    	<?php endwhile; ?>
    </div>
    <?php endif; wp_reset_postdata(); ?>
    
    <?php if( have_rows('quick_link_two','options') ): ?>
    <div class="quick slide_two one-third column">
    	<?php while( have_rows('quick_link_two','options') ): the_row(); 
    		// vars
    		$imageTwo = get_sub_field('image_two','options');
    		$title = get_sub_field('title','options');
    		$content = get_sub_field('description','options');
    		$link = get_sub_field('button_link','options');
    		$linkText = get_sub_field('button_text','options');
    		
    		// thumbnail
      	$size = 'featured-img';
      	$thumb = $imageTwo['sizes'][ $size ];
      	$width = $imageTwo['sizes'][ $size . '-width' ];
      	$height = $imageTwo['sizes'][ $size . '-height' ];
    
    		?>
    		<article class="red">
          <img src="<?php echo $thumb;  ?>" />
          <div class="content">
            <h3><?php echo $title; ?></h3>
            <p><?php echo $content; ?></p>
            <a href="<?php echo $link; ?>" class="button"><?php echo $linkText; ?></a>
          </div>
        </article>
    	<?php endwhile; ?>
    </div>
    <?php endif; wp_reset_postdata(); ?>
    
    <?php if( have_rows('quick_link_three','options') ): ?>
    <div class="quick slide_three one-third column">
    	<?php while( have_rows('quick_link_three','options') ): the_row(); 
    		// vars
    		$imageThree = get_sub_field('image_three','options');
    		$title = get_sub_field('title','options');
    		$content = get_sub_field('description','options');
    		$link = get_sub_field('button_link','options');
    		$linkText = get_sub_field('button_text','options');
    		
        // thumbnail
      	$size = 'featured-img';
      	$thumb = $imageThree['sizes'][ $size ];
      	$width = $imageThree['sizes'][ $size . '-width' ];
      	$height = $imageThree['sizes'][ $size . '-height' ];
    
    		?>
    		<article class="green">
          <img src="<?php echo $thumb; ?>" />
          <div class="content">
            <h3><?php echo $title; ?></h3>
            <p><?php echo $content; ?></p>
            <a href="<?php echo $link; ?>" class="button"><?php echo $linkText; ?></a>
          </div>
        </article>
    	<?php endwhile; ?>
    </div>
    <?php endif; wp_reset_postdata(); ?>

  </div>
</section>
<section class="social">
  <div class="container">
    <h3>Get Social</h3>
    <div class="row">
      <div class="six columns">
        Instagram Photos
      </div>
      <div class="six columns">
        <h4>Facebook Feed</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
    </div>
  </div>
</section>
<section class="newsletter">
  <div class="container">
    <h3>Sign up to our newsletter</h3>
  </div>
</section>

<footer class="links">
  <div class="container">
    <div class="one-third column">
      About Us
    </div>
    <div class="one-third column">
      Follow us
    </div>
    <div class="one-third column">
      How to find us
    </div>
    <div class="copyright-links">
<!--
      <?php // wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
      <p>&copy; <?php the_date('Y'); ?> Company Name</p>
-->
    </div>
  </div>
</footer>
<footer class="accreditations">
  <div class="container">
    Accreditation images/links here.
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>