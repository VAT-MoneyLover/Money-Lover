<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Money Lover</title>

  <!-- CSS -->
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
  <?php 
  echo $this->HTML->css(array(
    'bootstrap/css/bootstrap.min.css',
    'font-awesome/css/font-awesome.min.css',
    'css/style.css'
    ));
    ?>
  </head>

  <body>

    <!-- content -->
    <div class="">
      <?php 
      echo $this->fetch('content');
      ?>
    </div>
    <!-- Javascript -->

    <?php
    echo $this->HTML->script(array(
     'jquery-1.11.1.min.js',
     'bootstrap.min.js',
     'jquery.backstretch.min.js',
     ));

     ?>
     <script>
      $(".message").delay(3200).fadeOut(1000);
    </script>

  </body>

  </html>