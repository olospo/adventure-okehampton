<?php /* Template name: Page with Sidebar */
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

<?php get_template_part( 'inc/hero' ); 
  
  // Vars
  $glance = get_field('at_a_glance'); 
  $content = get_field('content');
?>

<section class="page">
  <div class="container">
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
    <aside class="four columns">
      <div class="content">
      <?php 
        $parent_post_id = wp_get_post_parent_id( $post_ID );
        $parent_post = get_post($parent_post_id);
        $parent_post_title = $parent_post->post_title;
      ?>
      <h3><?php echo $parent_post_title; ?></h3>
        <ul>
        <?php wp_list_pages(
          array(
          'child_of' => $post->post_parent,
          'title_li' => '',
          'orderby' => 'menu_order',
          'order'   => 'ASC',
          )
        )?>
        </ul>
      </div>
    </aside>
    
    <?php $thecontent = get_the_content();
      if(!empty($thecontent)) { ?>
    <div class="content eight columns">
      <?php the_content(); ?>
    </div>
    <?php } ?>
    
    <?php if ($glance || $content ) { ?>
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
      
      <?php if( have_rows('tab') ): ?>
      <!-- Tabs -->
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
           
        <?php if ($individual || $group) { ?>
        <!-- Bookings -->
        <div class="bookings row">
          <?php if ($individual) { ?>
            <?php get_template_part('inc/booking-individual'); ?>
          
          <?php } ?>
          <?php if ($group) { ?>
            <?php get_template_part('inc/booking-group'); ?>
          <?php } ?>
        </div>
        <?php } ?>
        
        <?php if( have_rows('related_info_documents') ): ?>
        <!-- Related Info/Documents -->
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
    <?php } ?>
  </div>
</section>



  
  

<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>