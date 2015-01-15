
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="../../favicon.ico">

	<title>Jumbotron Template for Bootstrap</title>

	<!-- Bootstrap core CSS -->
	<link href="dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Realm</th>
					<th>Role</th>
					<th>Class</th>
					<th>Level</th>
					<th>iLvl</th>
					<th>Ring(Max)</th>
					<th>Heroics</th>
					<th>Head</th>
					<th>Neck</th>
					<th>Shoulder</th>
					<th>Back</th>
					<th>Chest</th>
					<th>Wrist</th>
					<th>Hands</th>
					<th>Waist</th>
					<th>Legs</th>
					<th>Feet</th>
					<th>Ring 1</th>
					<th>Ring 2</th>
					<th>Trinket 1</th>
					<th>Trinket 2</th>
					<th>Main Hand</th>
					<th>Off Hand</th>
					<th>Enchant: Weapon</th>
					<th>Enchant: Neck</th>
					<th>Enchant: Cloak</th>
					<th>Enchant: Ring 1</th>
					<th>Enchant: Ring 2</th>
					<th>Highmaul: Normal</th>
					<th>Highmaul: Heroic</th>
					<th>Highmaul: Mythinc</th>
					<th>BRF: Normal</th>
					<th>BRF: Heroic</th>
					<th>BRF: Mythic</th>
				</tr>
			</thead>
			<tbody>
	<?php
		include 'config.php';
		include 'queries.php';
		$conn = new mysqli($db_server, $db_username, $db_password, $db_name);
		if ($conn->connect_error){
			die("Connection failed: " . $conn->connect_error);
		}
		$result = $conn->query($members);
		
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo "<tr>";
				echo "<td>" . $row["id"] . "</td>";
				echo "<td>" . $row["name"] . "</td>";
				echo "<td>" . $row["realm"] . "</td>";
				echo "<td>" . $row["role"] . "</td>";
				echo "<td>" . $row["class"] . "</td>";
				echo "<td>" . $row["level"] . "</td>";
				echo "<td>" . $row["ilvl"] . "</td>";
				echo "<td>" . $row["ring_max"] . "</td>";
				echo "<td>" . $row["heroics"] . "</td>";
				echo "<td>" . $row["head"] . "</td>";
				echo "<td>" . $row["neck"] . "</td>";
				echo "<td>" . $row["shoulder"] . "</td>";
				echo "<td>" . $row["back"] . "</td>";
				echo "<td>" . $row["chest"] . "</td>";
				echo "<td>" . $row["wrist"] . "</td>";
				echo "<td>" . $row["hands"] . "</td>";
				echo "<td>" . $row["waist"] . "</td>";
				echo "<td>" . $row["legs"] . "</td>";
				echo "<td>" . $row["feet"] . "</td>";
				echo "<td>" . $row["ring1"] . "</td>";
				echo "<td>" . $row["ring2"] . "</td>";
				echo "<td>" . $row["trinket1"] . "</td>";
				echo "<td>" . $row["trinket2"] . "</td>";
				echo "<td>" . $row["mainhand"] . "</td>";
				echo "<td>" . $row["offhand"] . "</td>";
				echo "<td>" . $row["enchant_weapon"] . "</td>";
				echo "<td>" . $row["enchant_neck"] . "</td>";
				echo "<td>" . $row["enchant_cloak"] . "</td>";
				echo "<td>" . $row["enchant_ring1"] . "</td>";
				echo "<td>" . $row["enchant_ring2"] . "</td>";
				echo "<td>" . $row["highmaul_kills_normal"] . "</td>";
				echo "<td>" . $row["highmaul_kills_heroic"] . "</td>";
				echo "<td>" . $row["highmaul_kills_mythic"] . "</td>";
				echo "<td>" . $row["blackrock_kills_normal"] . "</td>";
				echo "<td>" . $row["blackrock_kills_heroic"] . "</td>";
				echo "<td>" . $row["blackrock_kills_mythic"] . "</td>";
				echo "</tr>";
			}
		}
		$conn->close();
	?>

			</tbody>
		</table>
	</div>

	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="../../dist/js/bootstrap.min.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>