<?php /* Header */  ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<title><?php bloginfo('name'); ?><?php wp_title( '|', true, 'left' ); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=3.0, minimal-ui" />
<?php wp_head(); ?>
<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_directory'); ?>/img/apple-touch-icon.png"/>
<link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_directory'); ?>/img/favicon-32x32.png"/>
<link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_directory'); ?>/img/favicon-16x16.png"/>
<?php if( get_field('google_analytics', 'options') ): // Google Analytics Code ?>
  <?php the_field('google_analytics', 'options'); ?>
<?php endif; ?>
</head>
<?php $color = get_field('page_colour_scheme'); ?>
<body <?php body_class($color); ?>>
<header class="fixed_header">
  <div class="container"> 
    <div class="logo three columns">  
      <?php if ( is_front_page() ) { echo '<h1 class="site-title">'; } else { echo '<p class="site-title">'; } ?>
      <a href="<?php echo get_site_url(); ?>">
        <img src="<?php bloginfo('template_directory'); ?>/img/logo.svg" alt="Logo" class="logo">
      </a>
      <?php if ( is_front_page() ) { echo '</h1>'; } else { echo '</p>'; } ?>
    </div>
    <!-- Mobile Menu Trigger -->
    <div class="mobile_menu"></div>
    <!-- Main Menu -->
    <nav class="primary nine columns">
      <?php wp_nav_menu( array( 'theme_location' => 'main' ) ); ?>
    </nav>
  </div>
</header>
<!-- Mobile Menu -->
<nav class="mobile seven columns">
  <?php wp_nav_menu( array( 'theme_location' => 'mobile_main' ) ); ?>
</nav>