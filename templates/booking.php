<?php /* Template name: Booking */
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

<?php get_template_part( 'inc/hero' ); ?>

<section class="page">
  <div class="container">
    <aside class="all-activities four columns">
      <div class="content">
        <h3>All Groups</h3>
        <?php
        // Get the top page in the current tree
        $ancestors = $post->ancestors;
        // If this page isn't the top one in the tree
        if($ancestors) {
            // The last ancestor is highest in the tree
            $topParentID = end($ancestors);
        } else {
            $topParentID = $post->ID;
        }
        echo '<ul>';
        wp_list_pages(array(
            'post_type' => 'groups',
            'title_li' => '',
            'post_status' => 'publish',
            'orderby'   => 'title',
            'order'     => 'ASC',
            'walker' => new childNav)
        );
        echo '</ul></li>';
        ?>
        <ul class="extra">
        <li class="page_item current_page_item"><a href="<?php echo get_site_url(); ?>/group-booking">Group booking Enquiries</a></li>
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