<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Codebot blog, a gamedev IDE on the cloud">
    <meta name="author" content="Fernando Bevilacqua">
    <link rel="icon" href="<?php echo App::config('site.base_url'); ?>/favicon.ico">

    <title><?php echo App::get('title'); ?> | Codebot blog</title>

    <!-- Huge amount of social/open graph/scheme stuff. Thats the world we live in... -->
    <html itemscope itemtype="http://schema.org/WebApplication">

    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Codebot">
    <meta itemprop="description" content="<?php echo App::get('title'); ?> | Codebot blog">
    <meta itemprop="image" content="<?php echo App::config('site.base_url'); ?>/img/facebook-social-img.jpg">
    <meta itemprop="screenshot" content="<?php echo App::config('site.base_url'); ?>/img/codebot-app.png">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="<?php echo App::config('site.base_url'); ?>">
    <meta name="twitter:title" content="<?php echo App::get('title'); ?> | Codebot blog">
    <meta name="twitter:description" content="Gamedev IDE on the cloud">
    <meta name="twitter:creator" content="@As3GameGears">
    <!-- Twitter summary card with large image must be at least 280x150px -->
    <meta name="twitter:image:src" content="<?php echo App::config('site.base_url'); ?>/img/facebook-social-img.jpg">

    <!-- Open Graph data -->
    <meta property="og:title" content="<?php echo App::get('title'); ?> | Codebot blog" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo App::config('site.base_url'); ?>" />
    <meta property="og:image" content="<?php echo App::config('site.base_url'); ?>/img/facebook-social-img.jpg" />
    <meta property="og:description" content="Gamedev IDE on the cloud" />
    <meta property="og:site_name" content="Codebot blog" />

    <!-- Bootstrap core CSS -->
    <link href="<?php echo App::config('site.base_url'); ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="<?php echo App::config('site.base_url'); ?>/css/style.css?20189715" rel="stylesheet">
  </head>
