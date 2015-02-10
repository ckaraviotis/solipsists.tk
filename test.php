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

if ($_POST["poster"]) {
  $poster = $_POST["poster"];
} else {
  $poster = '';
}

if ($_POST["imgUrl"]) {
  $imgUrl = $_POST["imgUrl"];
} else {
  $imgUrl = '';
}

  // Post results to MySQL
  if ($_POST["submit"] == "post") {
    include './resources/config.php';
    include './resources/lib/queries.php';
    $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if ($conn->connect_error){
      die("Connection failed: " . $conn->connect_error);
    }

    if (!$insert = $conn->query("
      INSERT INTO posts(thumbnail, postContent, postDate, postUser) 
      VALUES ('{$imgUrl}', '{$md}', NOW(), '{$poster}')
      ")) {
        die("Error inserting rows: " . $conn->error);
      }
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
<?php echo $md; ?></textarea>
<input type="text" class="form-control" name="poster" placeholder="Username" value="<?php echo $poster; ?>">
<input type="text" class="form-control" name="imgUrl" placeholder="Image path" value="<?php echo $imgUrl; ?>">
				<button class="btn btn-default" type="submit" name="submit" value="post">Post</button>
				<button class="btn btn-default" type="submit" name="submit" value="preview">Preview</button>
			</form>
		</div>
		<div class="col-md-6">
			<h3>Preview</h3>
			<div id="parsedown-output">
				<?php echo $parsedown->text($md); ?>
			</div>
		</div>
	</div>

<hr>

  <div class="row">
    <div class="col-md-12">
    Below is the code needed to create a lightbox image in Markdown.
			<pre>
&lt;div class="row"&gt;
	&lt;div class="col-md-3 col-md-offset-3"&gt;
		&lt;a data-toggle="lightbox" href="img/lm_config_1.png"&gt;
			&lt;img src="img/lm_config_1.png" class="img-responsive"&gt;
		&lt;/a&gt;
	&lt;/div&gt;
&lt;/div&gt;	
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
