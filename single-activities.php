<?php get_header(); /* Activity Post */

// Hero
$title = get_field('title');
$background = get_field('background_image');
// Content
$glance = get_field('at_a_glance'); 
$content = get_field('content');
// Booking
$individual = get_field('individual_bookings');
$group = get_field('group_bookings');
// Individual Button 
$link = get_field('individual_button_code','options');
$customLink = get_field('add_custom_code');
$customCode = get_field('custom_code');

?>

<section class="activity hero" style="background: linear-gradient(rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.45)), url(' <?php echo $background['url']; ?> ') center center no-repeat; background-size: cover;">
  <div class="float">
    <div class="container">
      <div class="content eight columns offset-by-two">
        <h1><?php the_title(); ?></h1>
        <?php if ($individual) { ?>
          <?php if($customLink) { echo $customCode; } else { echo $link; } ?>
        <?php } if ($group) { ?>
          <a href="<?php echo the_field('group_button_link','options'); ?>" class="button">Group Enquiry</a>
        <?php } ?>
      </div>
    </div>
  </div>
</section>

<section class="post">
  <?php if( have_rows('slider') ): ?>
  <div class="container">
    <div class="activity-slider twelve columns">
    <?php while( have_rows('slider') ): the_row(); 
    
      // vars
      $slideImage = get_sub_field('slide_image');
      
      // thumbnail
      $size = 'featured-img';
      $featured = $slideImage['sizes'][ $size ];
      $width = $slideImage['sizes'][ $size . '-width' ];
      $height = $slideImage['sizes'][ $size . '-height' ];
    
    ?>
    <div class="slide">
      <img src="<?php echo $featured; ?>">
    </div>
    <?php endwhile; ?>
    
    </div>
  </div>
  <?php endif; ?>
  <div class="container">
    
    <aside class="all-activities four columns">
      <div class="content">
        <h3>All Activities</h3>
        
        <?php $current_post = $post->ID;        

            query_posts(array( 
              'post_type' => 'activities',
              'showposts' => -1,
              'orderby'   => 'title',
              'order'     => 'ASC',
              
            ));  
          ?>
        <ul>
        <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
          <li <?php if( $current_post == $post->ID ) { echo ' class="current"'; } ?>><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        <?php endwhile; ?>
        </ul>
        <?php else : endif; wp_reset_query(); ?>
      </div>
    </aside>
    <div class="content eight columns">
      <!-- At a Glance -->
      <?php if ($glance) { ?>
      <div class="glance">
        <div class="content">
          <h2>At a Glance</h2>
          <?php echo $glance; ?>
        </div>
      </div>
      <?php } ?>
      <!-- Lead -->
      <div class="lead">
        <?php echo $content; ?>
      </div>
      <!-- Tabs -->
      <?php if( have_rows('tab') ): ?>
        <div class="tab">
          <?php while( have_rows('tab') ): the_row(); 

      		// vars
      		$tabHeader = get_sub_field('tab_header');
      		$tabContent = get_sub_field('tab_content');
      
      		?>
      		<div class="accordionItem close">
            <h3 class="accordionItemHeading"><?php echo $tabHeader; ?></h3>
            <div class="accordionItemContent">
              <?php // check if the flexible content field has rows of data
              if( have_rows('tab_content') ):
                while ( have_rows('tab_content') ) : the_row();
              
                  if( get_row_layout() == 'content' ):
              
                    the_sub_field('content');
              
                  elseif( get_row_layout() == 'image' ):
                    
                    // display a sub field value
                    $image = get_sub_field('image'); 
                        
                    // thumbnail
                    $size = 'featured-img';
                    $thumb = $image['sizes'][ $size ];
                    $width = $image['sizes'][ $size . '-width' ];
                    $height = $image['sizes'][ $size . '-height' ];
                    ?>
                            
                    <img src="<?php echo $thumb; ?>" />
                        
                  <?php

                    endif;
              
                endwhile;
            
              else :
                // no layouts found
              endif; ?>
            </div>
          </div>

      	  <?php endwhile; ?>
        </div>
        <?php endif; ?>
           
        <!-- Bookings -->
        <div class="bookings row">
          <?php if ($individual) { ?>
            <?php get_template_part('inc/booking-individual'); ?>
          
          <?php } ?>
          <?php if ($group) { ?>
            <?php get_template_part('inc/booking-group'); ?>
          <?php } ?>
        </div>
        <!-- Related Info/Documents -->
        <?php if( have_rows('related_info_documents') ): ?>
        <div class="related">
          <h3>Related Info/Documents</h3>
          <ul>
          <?php while( have_rows('related_info_documents') ): the_row(); 

      		// vars
      		$title = get_sub_field('title');
      		$url = get_sub_field('url');
      		$upload = get_sub_field('upload');
      		
      		$ext = pathinfo($upload, PATHINFO_EXTENSION);
      
      		?>
      		
      		<?php if( $url ): ?>
          <li class="link">
            <a href="<?php echo $url; ?>" target="_blank">
              <?php echo $title; ?>
				    </a>
          </li>
          <?php endif; ?>
          
          <?php if( $upload ): ?>
          <li class="<?php echo $ext; ?>">
            <a href="<?php echo $upload; ?>">
              <?php echo $title; ?>
				    </a>
          </li>
          <?php endif; ?>

      	  <?php endwhile; ?>
      	  </ul>
        </div>
        <?php endif; ?> 
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>