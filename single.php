<?php /* Single Post */
get_header();

while ( have_posts() ) : the_post(); ?>

<section class="article hero <?php echo $color; ?>" style="background: url(' <?php the_post_thumbnail_url( 'background-img' ); ?> ') center center no-repeat; background-size: cover;"> 
  <div class="float">
    <div class="container">
      <div class="content six columns">
      <h1><?php the_title(); ?></h1>
      <p class="date"><?php the_time('d/m/y'); ?></p>
      <?php
      $post_object = get_field('author');
      
      if( $post_object ): 
      	// override $post
      	$post = $post_object;
      	setup_postdata( $post ); 
      	$profileImg = get_field('photo');
      	$size = 'thumbnail';
      	$thumb = $profileImg['sizes'][ $size ];
      	?>
          <div class="profile">
          	<img src="<?php echo $thumb; ?>" class="photo" alt="Photo of <?php the_title(); ?>">
          	<h3><?php the_title(); ?></h3>
          	<?php the_field('job_title'); ?>
          </div>
          <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
      <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<?php
$thecontent = get_the_content();
if(!empty($thecontent)) { ?>
<section class="post">
  <div class="container">
    <div class="content eight columns">
      <?php the_content(); ?>
    </div>
  </div>
</section>
<?php } ?>

<?php endwhile; // end of the loop. ?>

<?php get_template_part( 'inc/components' ); ?>

<?php get_footer(); ?>