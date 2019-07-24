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
        <?php if ($individual) { ?><script bt='Individual Booking' og='4cea9403-4c1a-4bfe-9387-255f61e242fe' fs='https://booking.bookinghound.com/fe/' id='tngbh-script-196155256' type='text/javascript' src='https://booking.bookinghound.com/fe/scripts/bh-popup.js' uniqueId='' mode=''></script><?php } if ($group) { ?><a href="<?php echo get_site_url(); ?>/group-booking" class="button">Group Enquiry</a><?php } ?>
      </div>
    </div>
  </div>
</section>

<section class="post">
  <div class="container">
    <aside class="all-activities four columns">
      <div class="content">
        <h3>All Adventure Days</h3>
        <?php
        // Get the top page in the current tree
        $ancestors = $post->ancestors;
        // If this page isn't the top one in the tree
        if($ancestors) {
            // The last ancestor is highest in the tree
            $topParentID = end($ancestors);
        } else {
            $topParentID = $post->ID;
        }
        echo '<ul>';
        wp_list_pages(array(
            'post_type' => 'adventure-days',
            'title_li' => '',
            'post_status' => 'publish',
            'orderby'   => 'title',
            'order'     => 'ASC',
            'walker' => new childNav)
        );
        echo '</ul></li>';
        ?>
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
              
                    elseif( get_row_layout() == 'slider' ): 
              
                    the_sub_field('slider');
              
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
          <div class="individual-booking six columns">
            <div class="content">
              <h3>For Individual Bookings</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <script bt='Book Now' og='4cea9403-4c1a-4bfe-9387-255f61e242fe' fs='https://booking.bookinghound.com/fe/' id='tngbh-script-196155256' type='text/javascript' src='https://booking.bookinghound.com/fe/scripts/bh-popup.js' uniqueId='' mode=''></script>
            </div>
          </div>
          <?php } ?>
          <?php if ($group) { ?>
          <div class="group-booking six columns">
            <div class="content">
              <h3>For Group Bookings</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <a href="<?php echo get_site_url(); ?>/group-booking" class="button white">Group Enquiry</a>
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