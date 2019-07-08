<?php 
$title = get_sub_field('title');
$content = get_sub_field('content');
$buttonText = get_sub_field('button_text');
$linkType = get_sub_field('link_type');
$internalLink = get_sub_field('button_link');
$externalLink = get_sub_field('button_link_external');
$figure = get_sub_field('figure');
$figureDescription = get_sub_field('figure_description');
// Page Colour Scheme
$color = get_field('page_colour_scheme');

?>

<section class="component component--text-block <?php echo $color; ?>"> 
  <div class="container">
    <div class="content eight columns">
    <h2><?php echo $title; ?></h2>
    <?php if($content) : echo $content; endif; ?>
    
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
    <?php if($figure) : ?>
    <div class="content figures four columns">
      <div class="figure">
        <?php echo $figure; ?>
      </div>
      <div class="description">
        <?php echo $figureDescription; ?>
      </div>
    </div>
    <?php endif; ?>
  </div>
</section>