<?php /* Search */
get_header(); ?>

<section class="search">
  <div class="container">
    <div class="ten columns offset-by-one">
      <div class="content">
        <?php get_template_part( 'inc/breadcrumbs' ); ?>
        <h1><?php printf( __( 'Search Results for: %s', 'twentytwelve' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
        <?php if ( have_posts() ) : // Show search results ?>
          <?php while ( have_posts() ) : the_post(); ?>
            <article class="search_item <?php if( get_post_type() == 'post' ) { ?>post<?php } else { ?>page<?php } ?>">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php if( get_post_type() == 'post' ) { ?><p class="date">News - <?php the_time('jS F Y'); ?></p><?php } ?>
            <?php the_excerpt(); ?>
            <?php the_tags( '<ul class="tag_list"><li class="tag">', '</li><li class="tag">', '</li></ul>' ); ?>
            <?php the_category() ?>
            </article>
          <?php endwhile; ?>
          <?php numeric_posts_nav(); ?>
          </div>
          <?php else : // No search results found ?>
          <article class="search_item">
            <h2>No Results Found</h1>
            <p>Sorry, but nothing matched your search criteria. Please try again with some different keywords and/or search criteria.</p>
          </article>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>