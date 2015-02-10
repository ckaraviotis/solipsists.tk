<!DOCTYPE html>
<head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/ekko-lightbox.min.css" rel="stylesheet">
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/ekko-lightbox.js"></script>
    <script type="text/javascript">
        $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
          event.preventDefault();
          $(this).ekkoLightbox();
        });
    </script>
</head>

<?php 
    require_once 'resources/lib/getLatestNews.php';
?>
