<?php get_header(); /* Activity Post */

// Vars
$title = get_field('title');
$background = get_field('background_image');

$glance = get_field('at_a_glance'); 
$content = get_field('content');

$individual = get_field('individual_bookings');
$group = get_field('group_bookings');

?>

<section class="activity hero" style="background: linear-gradient(rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.45)), url(' <?php echo $background['url']; ?> ') center center no-repeat; background-size: cover;">
  <div class="float">
    <div class="container">
      <div class="content six columns offset-by-three">
        <h1><?php the_title(); ?></h1>
        <a href="#" class="button white">Individual Booking</a> <a href="#" class="button">Group Enquiry</a>
      </div>
    </div>
  </div>
</section>
<section class="post">
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
      		<div class="tabheader">
            <h3><?php echo $tabHeader; ?></h3>
          </div>
          <div class="tabcontent">
            <?php // check if the flexible content field has rows of data
            if( have_rows('tab_content') ):
              while ( have_rows('tab_content') ) : the_row();
            
                if( get_row_layout() == 'content' ):
            
                  the_sub_field('content');
            
                  elseif( get_row_layout() == 'slider' ): 
            
                  the_sub_field('slider');
            
                  endif;
            
              endwhile;
          
            else :
              // no layouts found
            endif; ?>
          </div>

      	  <?php endwhile; ?>
        </div>
        <?php endif; ?>
           
        <!-- Bookings -->
        <div class="bookings row">
          <?php if ($individual) { ?>
          <div class="individual-booking six columns">
            <div class="content">
              <h3>For Individual Bookings</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <a href="#" class="button">Book Now</a>
            </div>
          </div>
          <?php } ?>
          <?php if ($group) { ?>
          <div class="group-booking six columns">
            <div class="content">
              <h3>For Group Bookings</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <a href="#" class="button white">Group Enquiry</a>
            </div>
          </div>
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
      
      		?>
      		<li>
          <?php if( $url ): ?>
            <a href="<?php echo $url; ?>" target="_blank">
          <?php endif; ?>
          
          <?php if( $upload ): ?>
            <a href="<?php echo $upload; ?>">
          <?php endif; ?>
          
          <?php echo $title; ?>

				  </a>
          </li>

      	  <?php endwhile; ?>
      	  </ul>
        </div>
        <?php endif; ?> 
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>