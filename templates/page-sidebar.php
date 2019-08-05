<?php /* Template name: Page with Sidebar */
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

<?php get_template_part( 'inc/hero' ); ?>

<section class="page">
  <div class="container">
    <aside class="four columns">
      <div class="content">
      <?php 
        $parent_post_id = wp_get_post_parent_id( $post_ID );
        $parent_post = get_post($parent_post_id);
        $parent_post_title = $parent_post->post_title;
      ?>
      <h3><?php echo $parent_post_title; ?></h3>
        <ul>
        <?php wp_list_pages(
          array(
          'child_of' => $post->post_parent,
          'title_li' => '',
          'orderby' => 'menu_order',
          'order'   => 'ASC',
          )
        )?>
        </ul>
      </div>
    </aside>
    <div class="content eight columns">
      <?php the_content(); ?>
    </div>
  </div>
</section>

<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>