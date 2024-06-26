<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Green Peace Tent House and Digital Sound System - Best Tent House and Digital Sound System in Koshi, Morang.</title>

  <?php
  $site_information = get_posts(array(
    'post_type' => 'site_information', // Replace with your custom post type name
    'posts_per_page' => 1,
  ));

  if ($site_information) {
    $favicon = get_field('favicon', $site_information[0]->ID);

    if ($favicon) {
      echo '<link rel="icon" type="image/png" sizes="32x32" href="' . esc_url($favicon['url']) . '">';
    }
  }
  ?>





  <?php wp_head(); ?>
</head>

<body>
  <!--header section start-->
  <header class="header header-1">
    <div class="container">
      <div class="header__wrapper">
        <div class="header__logo">
          <a href="#hero">

            <?php
            $site_information = get_posts(array(
              'post_type' => 'site_information',
              'posts_per_page' => 1,
            ));

            if ($site_information) {
              $site_logo = get_field('site_logo', $site_information[0]->ID);

              if ($site_logo) {
                echo '<img src="' . esc_url($site_logo['url']) . '" alt="logo" height="60px">';
              }
            }
            ?>

          </a>
        </div>
        <div class="header__nav">
          <ul class="header__nav-primary">
            <li><a href="<?php echo site_url('') ?>"><i class="fad fa-home-alt"></i></a></li>
            <li><a href="<?php echo site_url('') ?>">Home</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#fancy_gallery">Gallery</a></li>
            <li><a href="#pricing">Package</a></li>
            <li><a href="#video">Video</a></li>
            <li><a href="#team">Team</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
          <span><i class="fas fa-times"></i></span>
        </div>
        <div class="header__bars">
          <div class="header__bars-bar header__bars-bar-1"></div>
          <div class="header__bars-bar header__bars-bar-2"></div>
          <div class="header__bars-bar header__bars-bar-3"></div>
        </div>
      </div>
    </div>
  </header>
  <!--header section end-->