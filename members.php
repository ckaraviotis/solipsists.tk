
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="../../favicon.ico">

	<title>Solipsists Guild Members</title>

	<!-- Bootstrap core CSS -->
	<link href="dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="dist/css/bootstrap-table.min.css">
	<link href="css/solipsists.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
   <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right">
            <div class="form-group">
              <input type="text" placeholder="Name" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
<div class="container">
	<div class="row">
	<div class="col-md-12">
		<p>Below is a list of all the members of our guild, pulled from the Armory.</p>
		<p>If the information is out of date, please click the button below to refresh the data.</p>
		<p>
		<button type="button" class="btn btn-default" value="refresh">
			<span class="glyphicon glyphicon-refresh"></span> Refresh
		</button>
		</p>
	<div class="table-responsive">
		<table data-toggle="table" class="table table-striped table-condensed">
			<thead>
				<tr>
					<th data-sortable="true">Name</th>
					<th data-sortable="true">Realm</th>
					<th data-sortable="true">Role</th>
					<th data-sortable="true">Class</th>
					<th data-sortable="true">Rank</th>
					<th data-sortable="true">Level</th>
					<th data-sortable="true">iLvl</th>
					<th data-sortable="true">Ring(Max)</th>
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
					<th data-sortable="true">Highmaul: Normal</th>
					<th data-sortable="true">Highmaul: Heroic</th>
					<th data-sortable="true">Highmaul: Mythinc</th>
					<th data-sortable="true">BRF: Normal</th>
					<th data-sortable="true">BRF: Heroic</th>
					<th data-sortable="true">BRF: Mythic</th>
				</tr>
			</thead>
			<tbody>
	<?php
		include './resources/config.php';
		include './resources/lib/queries.php';
		$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
		if ($conn->connect_error){
			die("Connection failed: " . $conn->connect_error);
		}
		$result = $conn->query(MEMBERS);
		
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo "<tr>";
				echo '<td>' . $row["name"] . '</td>';			
				echo "<td>" . $row["realm"] . "</td>";
				echo "<td>" . $row["role"] . "</td>";
				echo "<td class=\"" . $row["css_name"] . "\">"  . $row["classname"] . "</td>";
				echo "<td> nil </td>";
				echo "<td>" . $row["level"] . "</td>";

				// Style cell based on ilvl value
				if ($row["ilvl"] >= 665) {
					echo "<td class=\"legendary\">";
				}
				else if ($row["ilvl"] >= 650) {
					echo "<td class=\"epic\">";
				}
				else if ($row["ilvl"] >= 635){
					echo "<td class=\"rare\">";
				}
				else if ($row["ilvl"] >= 615) {
					echo "<td class=\"uncommon\">";
				}
				else {
					echo "<td>";
				}
				echo $row["ilvl"] . "</td>";
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
</div>
<footer>
  <p>&copy; Solipsists, 2015</p>
</footer>

	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="dist/js/bootstrap.min.js"></script>
	<script src="dist/js/bootstrap-table.min.js"></script>
	<script>
$(document).ready(function(){
    $('.btn').click(function(){
	console.log('Button clicked')
        var clickBtnValue = $(this).val();
        var ajaxurl = './resources/lib/refreshGuild.php',
        data =  {'action': clickBtnValue};
        $.post(ajaxurl, data, function (response) {
            // Response div goes here.
            alert("action performed successfully");
        });
    });

});
	</script>
</body>
</html>
