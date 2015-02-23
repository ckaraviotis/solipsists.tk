<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../../favicon.ico">

  <title>Home - Solipsists.tk</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/ekko-lightbox.min.css" rel="stylesheet">

  <!-- Fonts -->
  <link href="http://fonts.googleapis.com/css?family=Goudy+Bookletter+1911" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Raleway:100" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
  <link href="css/solipsists.css" rel="stylesheet">


  <!-- Random banner -->
  <?php
    $bg = array('banner_1.png', 'banner_2.png', 'banner_3.png', 'banner_4.png', 'banner_5.png', 'banner_6.png', 'banner_7.png', 'banner_8.png');
    $i = rand(0, count($bg)-1);
    $backgroundImage = "$bg[$i]";
  ?>
  <style type="text/css">
    <!--
      #jumbo-banner {
        background-image: url(img/<?php echo $backgroundImage; ?>);
      }
    -->
  </style>
</head>

<body>
  <?php include 'navbar.php'; ?>
  
  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron" id="jumbo-banner">
    <div class="container" id="container-banner">
      <h1>Solipsists</h1>
      <p>Casual raiding on Bloodhoof &amp; Khadgar EU.</p>
    </div>
  </div>

<div class="container">
<?php include 'progression.php'; ?>

  <hr>

  <?php include 'news.php'; ?>

  <footer>
    <p>&copy; Spaceface, 2014</p>
  </footer>
</div>
<!-- /container -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/ekko-lightbox.js"></script>
<script type="text/javascript">
  $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
  }); 
</script>
</body>
</html>

