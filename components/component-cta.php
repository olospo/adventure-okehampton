<?php 
$title = get_sub_field('title');
$content = get_sub_field('content');
$buttonText = get_sub_field('button_text');
$linkType = get_sub_field('link_type');
$internalLink = get_sub_field('button_link');
$externalLink = get_sub_field('button_link_external');
$background = get_sub_field('background_image');
$colourScheme = get_sub_field('colour_scheme');
?>

<section class="component--cta <?php echo $colourScheme; ?>" style="background: <?php if($colourScheme == "black"){ ?> url('<?php echo get_template_directory_uri(); ?>/img/header-black.png') center center no-repeat,<?php } if($colourScheme == "blue"){ ?> url('<?php echo get_template_directory_uri(); ?>/img/header-blue.png') center center no-repeat,<?php } ?> url(' <?php echo $background['url']; ?> ') center center no-repeat; background-size: cover;"> 
  <div class="float">
    <div class="container">
      <div class="content six columns">
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
    </div>
  </div>
</section>