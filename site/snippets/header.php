<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>
  <meta name="description" content="<?php echo $site->description()->html() ?>">
  <meta name="keywords" content="<?php echo $site->keywords()->html() ?>">


  <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Montserrat:400,700' rel='stylesheet' type='text/css'>


  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

  
  <?php echo css('assets/css/foundation.css') ?>
  <?php echo css('assets/js/vendor/modernizr.js') ?>
  
  <?php echo css('assets/css/style.css') ?>
    
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <?php echo css('assets/js/isotope.js') ?>
  


  

</head>
<body class="ondasproyecto">

  <header>
    <ul>
      <li class="logohead">
        <a href="<?php echo url() ?>">
          <img src="<?php echo url('assets/images/logo.svg') ?>" alt="<?php echo $site->title()->html() ?>" />
        </a>
      </li>
    </ul>
    
    <?php snippet('menu') ?>
  </header>