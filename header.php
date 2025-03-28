<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Own Your Space">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

  <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-touch-icon.png">
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon-96x96.png"
    sizes="96x96">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

  <meta name="theme-color" content="#ffffff">

  <!-- header scripts -->
  <?php
  $header_scripts = get_field('header_scripts', 'option');
  if ($header_scripts) {
    echo $header_scripts;
  }
  ?>

  <!-- conversion tracking -->
  <?php
  $additional_scripts = get_field('additional_scripts');
  if ($additional_scripts) {
    echo $additional_scripts;
  }
  ?>

  <?php wp_head(); ?>
</head>

<body <?php body_class('overflow-x-hidden'); ?> id="site-body">

  <?php
  $body_scripts = get_field('body_scripts', 'option');
  if ($body_scripts) {
    echo $body_scripts;
  }
  ?>



  <div class="main-header w-full z-[999] fixed top-0 left-0 transform ease-in-out duration-150">

    <?php if (have_rows('usps', 'option')): ?>
      <div class="marquee-text">
        <?php while (have_rows('usps', 'option')):
          the_row(); ?>
          <h4 class="text">
            <?php the_sub_field('text'); ?>
          </h4>
        <?php endwhile; ?>
      </div>
    <?php else: ?>
      <?php // no rows found ?>
    <?php endif; ?>

    <?php get_template_part('resources/views/components/layout/header'); ?>

  </div>

  <div class="layout-wrapper">