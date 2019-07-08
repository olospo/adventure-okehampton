<?php 
// Page Colour Scheme
$color = get_field('page_colour_scheme');
// Component Fields
$galleryType = get_sub_field('gallery_type');
?>
<section class="component component--gallery <?php echo $color; ?>"> 
  <div class="container">
    <?php $images = get_sub_field('gallery'); if( $images ): ?>
    
      <?php if( $galleryType == 'popup' ): // Pop-up display ?>
        <?php $count = count(get_sub_field('gallery')); ?>
        <?php foreach( $images as $image ): ?>
        <div class="popup-item <?php if( $count == '1' ): ?>eight columns offset-by-two<?php endif; if( $count == '2' ): ?>six columns<?php endif; if( $count > '2' ): ?>one-third column<?php endif; ?>">
          <a data-fancybox="gallery" href="<?php echo $image['url']; ?>">
            <img src="<?php echo $image['sizes']['featured-img']; ?>" alt="<?php echo $image['alt']; ?>" />
          </a>
        </div>
        <?php endforeach; ?>
      <?php endif; ?>
      
      <?php if( $galleryType == 'slideshow' ): // Slider display ?>
        <?php $count = count(get_sub_field('gallery')); ?>
        <div class="slick-slider">
        <?php foreach( $images as $image ): ?>
          <div class="slick-slide">
            <img src="<?php echo $image['sizes']['featured-img']; ?>" alt="<?php echo $image['alt']; ?>" />
          </div>
        <?php endforeach; ?>
        </div>
      <?php endif; ?>
    
    <?php endif; ?>
  
  </div>
</section>