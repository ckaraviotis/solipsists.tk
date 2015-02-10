<?php
#
# Update guild information in the database
#
require_once (__DIR__.'/../config.php');
require_once 'queries.php';
require_once 'Parsedown.php';


$parsedown = new Parsedown();

$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query(LATEST_POSTS);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) { ?>
		<div class="row">
			<div class="col-md-2">
				<div class="thumbnail">
					<img src="<?php echo $row["thumbnail"];?>">
				</div>
			</div>
			<div class="col-md-10">
				<?php echo $parsedown->text($row["postContent"]); ?>
				
				<p class="pull-right">
					Posted on
					<span class="date"><?php echo $row["postDate"]; ?></span>
					by
					<span class="poster"><?php echo $row["postUser"]; ?></span>
				</p>
			</div>
		</div>
		<hr>
<?php
	}
}

$conn->close();
