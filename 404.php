<?php /* 404 Page */
get_header(); ?>

<section class="hero not_found">
  <div class="container">
    <div class="twelve columns">
      <div class="content">
        <h1>Page Not Found</h1>
        <p>It seems we can't find what you're looking for. Please try the navigation menu above or go to the <a href="<?php echo get_site_url(); ?>">homepage</a>.</p>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>