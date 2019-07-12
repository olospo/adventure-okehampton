<?php get_header(); /* Activity Post */

// Vars
$title = get_field('title');
$background = get_field('background_image');

$glance = get_field('at_a_glance'); 
$content = get_field('content');

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
      <div class="tab">
        
        <div class="tabheader">
          <h3>Lorem ipsum dolar sit</h3>
        </div>
        <div class="tabcontent">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        
        <div class="tabheader">
          <h3>Lorem ipsum dolar sit</h3>
        </div>
        <div class="tabcontent">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        
        <div class="tabheader">
          <h3>Lorem ipsum dolar sit</h3>
        </div>
        <div class="tabcontent">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <!-- Bookings -->
        <div class="bookings row">
          <div class="individual-booking six columns">
            <div class="content">
              <h3>For Individual Bookings</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <a href="#" class="button">Book Now</a>
            </div>
          </div>
          <div class="group-booking six columns">
            <div class="content">
              <h3>For Group Bookings</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <a href="#" class="button white">Group Enquiry</a>
            </div>
          </div>
        </div>
        <!-- Related Info/Documents -->
        <div class="related">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>