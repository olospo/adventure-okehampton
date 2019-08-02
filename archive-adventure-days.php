<?php /* Archive */
get_header(); 
// Vars
$title = get_field('adventure_days_title','options');
$content = get_field('adventure_days_content','options');
$bgimage = get_field('adventure_days_background_image','options');

?>

<section class="activity hero" style="background: linear-gradient(rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.45)), url(<?php echo $bgimage['url']; ?>) center center no-repeat; background-size: cover;">
  <div class="float">
    <div class="container">
      <div class="content six columns offset-by-three">
        <h1><?php echo $title; ?></h1>
      </div>
    </div>
  </div>
</section>

<section class="post archive_listing">
  <div class="container">
    <div class="twelve columns">
      <div class="intro_content">
        <div class="content ten columns offset-by-one">
          <?php echo $content; ?>
        </div>
      </div>
      <div class="main_content">
        <div class="twelve columns">
          <?php 
            query_posts(array( 
              'post_type' => 'adventure-days',
              'showposts' => -1,
              'orderby'   => 'title',
              'order'     => 'ASC',
              'post_parent' => '0'
              
            ));  
          ?>
        <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
          <?php get_template_part( 'inc/article' ); ?>
        <?php endwhile; ?>
        
        <?php numeric_posts_nav(); ?>
        </div>
        <?php else : ?>
        <!-- No posts found -->
        <?php endif; wp_reset_query(); ?>
      </div>
    </div>
  </div>
</section>

<section class="contact_cta">
  <div class="container">
    <div class="seven columns offset-by-one">
      Don’t see what you’re looking for? Make an enquiry to find out about other services we can offer
    </div>
    <div class="three columns">
      <a href="<?php echo get_site_url(); ?>/contact" class="button white">Get in touch</a>
    </div>
  </div>
</section>

<?php get_footer(); ?>