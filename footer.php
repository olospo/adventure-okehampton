<?php /* Footer */ ?>
<footer class="social-links"
  <div class="container">
    <div class="copyright-links">
      <?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
      <p>&copy; <?php the_date('Y'); ?> Company Name</p>
    </div>
    
  </div>
</footer>
<footer class="accreditations">
  <div class="container">
    Accreditation images/links here.
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>