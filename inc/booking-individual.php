<?php 
  $text = get_field('individual_cta_text','options');
  $link = get_field('individual_button_code','options');
?>

<div class="individual-booking six columns">
  <div class="content">
    <h3>For Individual Bookings</h3>
    <img src="<?php bloginfo('template_directory'); ?>/img/single_icon.svg" />
    <?php echo $text; ?>
    <?php echo $link; ?>
  </div>
</div>