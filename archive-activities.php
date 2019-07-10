<?php /* Archive */
get_header(); ?>

<section class="post archive_listing">
  <div class="container">
    <div class="twelve columns">
      <div class="intro_content">
        <div class="content twelve columns">
          <h1>Activities</h1>
        </div>
      </div>
      <div class="main_content">
        <div class="twelve columns">
        <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
          <article class="red one-third column">
            <img src="https://via.placeholder.com/400x200" />
            <div class="content">
              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            </div>
          </article>
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

<?php get_footer(); ?>