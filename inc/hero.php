<?php /* Hero Section */
$title = get_field('title');
$description = get_field('short_description');
$buttonText = get_field('button_text');
$linkType = get_field('button_link');
$internalLink = get_field('button_link_internal');
$externalLink = get_field('button_link_external');
$background = get_field('background_image');
$colourScheme = get_field('colour_scheme');
?>

<section class="hero <?php echo $colourScheme; ?>" style="background: linear-gradient(rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.45)), <?php if($colourScheme == "black"){ ?> url('<?php echo get_template_directory_uri(); ?>/img/header-black.png') center center no-repeat,<?php } if($colourScheme == "blue"){ ?> url('<?php echo get_template_directory_uri(); ?>/img/header-blue.png') center center no-repeat,<?php } ?> url(' <?php echo $background['url']; ?> ') center center no-repeat; background-size: cover; "> 
  <div class="float">
    <div class="container">
      <div class="content eight columns offset-by-two">
      <h1><?php echo $title; ?></h1>
      <?php if($description) : echo $description; endif; ?>
      
      <?php if($buttonText) : ?>
      
        <?php if( $linkType == 'internal' ): // Internal Link ?>
        
          <?php $post_object = get_field('button_link_internal'); if( $internalLink ): $post = $post_object; setup_postdata( $post ); ?>
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