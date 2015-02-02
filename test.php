<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/ekko-lightbox.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/solipsists.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Inconsolata' rel='stylesheet' type='text/css'>
</head>

<?php
	require_once 'resources/lib/Parsedown.php';
	$parsedown = new Parsedown();

	if ($_POST["markdown"]) {
		$md = $_POST["markdown"];
	} else {
		$md = '';
	}
?>

<body>
<div class="container">
	<h1>Create New Post</h1>
	<div class="row">
		<div class="col-md-6">
			<h3>Post</h3>
			<form action="test.php" method="POST">
				<textarea class="form-control markdown" name="markdown" rows="20">
<?php echo $md; ?>
				</textarea>
				<input type="text" class="form-control" name="poster" placeholder="Username">
				<button class="btn btn-default" type="submit" name="post">Post</button>
				<button class="btn btn-default" type="submit" name="preview">Preview</button>
			</form>
		</div>
		<div class="col-md-6">
			<h3>Preview</h3>
			<div id="parsedown-output">
				<?php echo $parsedown->text($md); ?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<pre>
<div class="row">
	<div class="col-md-3 col-md-offset-3">
		<a data-toggle="lightbox" href="img/lm_config_1.png">
			<img src="img/lm_config_1.png" class="img-responsive">
		</a>
	</div>
</div>	
			</pre>
		</div>
	</div>
</div>

</body>
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/ekko-lightbox.js"></script>
    <script type="text/javascript">
        $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
          event.preventDefault();
          $(this).ekkoLightbox();
        });
    </script>
</html>
