<?php 
// Page Colour Scheme
$color = get_field('page_colour_scheme');
?>
<section class="component component--promotions <?php echo $color; ?>"> 
  <div class="container">
    
  <?php $count = count(get_sub_field('promotion')); ?>
  <?php if( have_rows('promotion') ): while( have_rows('promotion') ): the_row(); 

    $title = get_sub_field('promotion_title'); 
    $contentType = get_sub_field('content_type');
    $text = get_sub_field('text');
    $image = get_sub_field("image"); 
    $figure = get_sub_field('figure');
    $figureDescription = get_sub_field('figure_description');
    $buttonText = get_sub_field('button_text');
    $linkType = get_sub_field('link_type');
    $internalLink = get_sub_field('button_link');
    $externalLink = get_sub_field('button_link_external');
    
  ?>
    
    <div class="promotion <?php if( $count == '1' ): ?>eight columns offset-by-two<?php endif; ?><?php if( $count == '2' ): ?>six columns<?php endif; ?><?php if( $count == '3' ): ?>one-third column<?php endif; ?><?php if( $count == '4' ): ?>three columns<?php endif; ?>">
      
      <?php if( $contentType == 'content' ): // Content?>
        <?php if($image) : // Title ?>
        <div class="image">
          <img src="<?php echo get_template_directory_uri(); ?>/img/thumbnail-pattern.png" style="background: url(<?php echo $image['url']; ?>) center center black; background-size: cover;" >
      	</div>
      	<?php endif; ?>
      	<?php if($title) : // Title ?>
          <h3><?php echo $title; ?></h3>
        <?php endif; ?>
        <?php if($text) : // Title ?>
        <div class="text">
      	  <?php echo $text; ?>
        </div>
        <?php endif; ?>
      <?php endif; ?>

      <?php if( $contentType == 'figure' ): // Figure content?>
        <?php if($title) : // Title ?>
          <h3><?php echo $title; ?></h3>
        <?php endif; ?>
        <div class="figure">
          <?php echo $figure; ?>
        </div>
        <div class="description">
          <?php echo $figureDescription; ?>
        </div>
      <?php endif; ?>
      
      <?php if($buttonText) : // Which button to display ?>
      
        <?php if( $linkType == 'internal' ): // Internal Link ?>
          <?php $post_object = get_sub_field('button_link'); if( $internalLink ): $post = $post_object; setup_postdata( $post ); ?>
            <a href="<?php the_permalink(); ?>" class="button"><?php echo $buttonText; ?></a>
          <?php wp_reset_postdata(); ?>
          <?php endif; ?>
        <?php endif; ?>
          
        <?php if( $linkType == 'external' ): // External Link?>
          <a href="<?php echo $externalLink; ?>" class="button" target="_blank"><?php echo $buttonText; ?></a>
        <?php endif; ?>
        
      <?php endif; ?>
    </div>
  <?php endwhile; endif; ?>
  </div>
</section>