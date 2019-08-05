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
<!-- OG WhatsApp -->    
<meta property="og:image" itemprop="image" content="https://www.adventureokehampton.com/wp-content/uploads/2019/08/share.jpg" />
<meta property="og:image:url" itemprop="image" content="https://www.adventureokehampton.com/wp-content/uploads/2019/08/share.jpg" />
<meta property="og:image:type" content="image/jpg" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Adventure Okehampton" />
<meta property="og:description" content="Get ready for your next adventure" />

<!-- Twitter card -->
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="@AdventureOke" />
<meta name="twitter:title" content="Adventure Okehampton" />
<meta name="twitter:description" content="Get ready for your next adventure" />
<?php
$post_id = get_the_ID();
if (has_post_thumbnail( $post_id ) ):
  $image = get_the_post_thumbnail_url( $post_id, 'full' ); ?>
  <meta name="twitter:image" content="<?php echo $image; ?>" />
<?php else : ?>
  <meta name="twitter:image" content="https://www.adventureokehampton.com/wp-content/uploads/2019/08/twitter.jpg" />
<?php endif; ?>

<!-- Facebook + OG -->
<meta property="og:url" content="<?php the_permalink(); ?>" />
<meta property="og:site_name" content="Adventure Okehampton">
<meta property="og:locale" content="en_gb" />
<meta property="fb:admins" content="">

<meta name="Keywords" content="okehampton, Devon, adventure, activity, groups, bookings, activities, YHA, youth hostel, accommodation, Dartmoor, explore, exploring, explorers, schools, camp, youth groups, adult groups, international, residential, NCS, team building, leadership skills, stag, hen, stag and hen, ten tors, scouts, guides, scouts and guides, tours, schools and colleges, Duke of Edinburgh, sports teams, cadets, boys brigade, archery, abseil, bushcraft, canoeing, climbing, cycling, gorge scrambling, guided walks, high ropes, kayaking, low ropes, moorland expedition, moorland, mountain biking, mountain boarding, navigation, orienteering, pony trekking, raft building, team building, tyrolean traverse, weaselling">
<meta name="description" content="Get ready for your next adventure">
</head>
<body <?php body_class(); ?>>
<div class="fixed_header">
<header>
  <div class="container"> 
    <div class="logo two columns">  
      <?php if ( is_front_page() ) { echo '<h1 class="site-title">'; } else { echo '<p class="site-title">'; } ?>
      <a href="<?php echo get_site_url(); ?>">
        <img src="<?php bloginfo('template_directory'); ?>/img/logo.svg" alt="Logo" class="logo">
      </a>
      <?php if ( is_front_page() ) { echo '</h1>'; } else { echo '</p>'; } ?>
    </div>
    <!-- Mobile Menu Trigger -->
    <a href="#" class="menu-toggle mobile_menu" aria-controls="primary-menu">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </a>
    <!-- Main Menu -->
    <nav class="primary ten columns">
      <?php wp_nav_menu( array( 'theme_location' => 'main' ) ); ?>
    </nav>
  </div>
</header>
</div>
<!-- Mobile Menu -->
<nav class="mobile">
  <?php wp_nav_menu( array( 'theme_location' => 'mobile_main' ) ); ?>
</nav>