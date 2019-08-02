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
      <div class="instagram six columns">
        <?php echo do_shortcode('[instagram-feed]'); ?>
      </div>
      <div class="facebook six columns">
        <h4>Facebook Feed</h4>
        <div class="feed">
        <?php echo do_shortcode('[custom-facebook-feed]'); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="newsletter">
  <div class="container">
    <h3>Sign up to our newsletter</h3>
    <!-- Begin Mailchimp Signup Form -->
    <div id="mc_embed_signup">
    <form action="https://adventureokehampton.us3.list-manage.com/subscribe/post?u=77a2f94a6858eaf8a9b1e3cad&amp;id=6a2dfb80d9" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
      <div id="mc_embed_signup_scroll">
    	<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
      <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
      <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_77a2f94a6858eaf8a9b1e3cad_6a2dfb80d9" tabindex="-1" value=""></div>
      <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
      </div>
    </form>
    </div>
    
    <!--End mc_embed_signup-->
  </div>
</section>

<footer class="links">
  <div class="container">
    <div class="about three columns">
      <img src="<?php bloginfo('template_directory'); ?>/img/logo_full.png" />
      <ul class="social-icons">
        <li><a href="<?php the_field('facebook_link','options'); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/facebook_icon.svg" /></a></li>
        <li><a href="<?php the_field('twitter_link','options'); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/twitter_icon.svg" /></a></li>
        <li><a href="<?php the_field('instagram_link','options'); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/instagram_icon.svg" /></a></li>
        <li><a href="<?php the_field('linkedin_link','options'); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/linkedin_icon.svg" /></a></li>
        <li><a href="<?php the_field('tripadvisor_link','options'); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/tripadvisor_icon.svg" /></a></li>
      </ul>
      <?php get_search_form(); ?>
      <?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
    </div>
    <div class="follow four-half columns">
      <h4>Follow us</h4>
      <?php echo do_shortcode('[custom-twitter-feeds]'); ?>
    </div>
    <div class="find four-half columns">
      <h4>How to find us</h4>
      <img src="<?php bloginfo('template_directory'); ?>/img/map.jpg" />
      <?php echo the_field('map_text','options'); ?>
    </div>
    <div class="copyright-links twelve columns ">
      <?php wp_nav_menu( array( 'theme_location' => 'extra_footer' ) ); ?> &copy; <?php the_time('Y'); ?> Adventure Okehampton all rights reserved
      <ul class="contact_details"><li><?php the_field('address','options'); ?></li><li>E: <a href="mailto:<?php the_field('email','options'); ?>"><?php the_field('email','options'); ?></a></li><li>T: <a href="tel:<?php the_field('phone_number','options'); ?>"><?php the_field('phone_number','options'); ?></a></li></ul>
    </div>
  </div>
</footer>
<?php if( have_rows('accreditations','options') ): ?>
<footer class="accreditations">
  <div class="container">
    <?php while( have_rows('accreditations','options') ): the_row(); 
    // vars
    $image = get_sub_field('accreditation_image','options');
    ?>
    <div class="accreditation">
      <img src="<?php echo $image['url']; ?>" />
    </div>
    <?php endwhile; ?>
  </div>
</footer>
<?php endif; wp_reset_postdata(); ?>
<a href="#" class="back_to_top">Back to Top</a>
<?php wp_footer(); ?>
</body>
</html>