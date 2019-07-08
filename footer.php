<?php /* Footer */ ?>
<footer>
  <div class="container">
    <div class="copyright-links">
      <p>&copy; <?php the_date('Y'); ?> Company Name</p>
      <?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>