<?php /*  Main Template File */
get_header(); ?>
<section>
  <div class="container">
    <div class="twelve columns">
      <h1><?php the_title(); ?></h1>
      <div class="content">
        <?php the_content(); ?>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>