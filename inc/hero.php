<?php // Hero
  $title = get_field('title');
  $background = get_field('background_image'); 
?>

<section class="activity hero" style="background: linear-gradient(rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.45)), url(' <?php echo $background['url']; ?> ') center center no-repeat; background-size: cover;">
  <div class="float">
    <div class="container">
      <div class="content six columns offset-by-three">
        <h1><?php echo $title; ?></h1>
      </div>
    </div>
  </div>
</section>