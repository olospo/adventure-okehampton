<?php /* Archive */
get_header(); ?>

<section class="activity hero" style="background: linear-gradient(rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.45)), url(' <?php bloginfo('template_directory'); ?>/img/stockphoto.jpg ') center center no-repeat; background-size: cover;">
  <div class="float">
    <div class="container">
      <div class="content six columns offset-by-three">
        <h1>Groups</h1>
      </div>
    </div>
  </div>
</section>

<section class="post archive_listing">
  <div class="container">
    <div class="twelve columns">
      <div class="intro_content">
        <div class="content twelve columns">
<!--           <h1>Activities</h1> -->
        </div>
      </div>
      <div class="main_content">
        <div class="twelve columns">
          <?php 
            query_posts(array( 
              'post_type' => 'groups',
              'showposts' => -1,
              'orderby'   => 'title',
              'order'     => 'ASC',
            ));  
          ?>
        <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
          <article class="one-third column">
            <div class="image">
            <a href="<?php the_permalink(); ?>">
            <?php if( have_rows('overlay') ): ?>
            <div class="overlay">
              <ul>
            <?php while( have_rows('overlay') ): the_row(); 

        		// vars
        		$overlayText = get_sub_field('overlay_text');
      
        		?>
  
            <li><?php echo $overlayText; ?></li>
        	  <?php endwhile; ?>
              </ul>
            </div>
            <?php endif; ?> 

            <img src="<?php the_post_thumbnail_url( 'background-img' ); ?>" />
            </div>
            <div class="content">
              <h3><?php the_title(); ?></h3></a>
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