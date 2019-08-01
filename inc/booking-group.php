<?php 
  $text = get_field('group_cta_text','options');
  $link = get_field('group_button_link','options');
?>

<div class="group-booking six columns">
  <div class="content">
    <h3>For Group Bookings</h3>
    <img src="<?php bloginfo('template_directory'); ?>/img/group_icon.svg" />
    <?php echo $text; ?>
    <a href="<?php echo $link; ?>" class="button white">Group Enquiry</a>
  </div>
</div>