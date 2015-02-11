<?php
	require_once (__DIR__.'/../config.php');
	require_once 'queries.php';
	$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

	if ($conn->connect_error){
	        die("Connection failed: " . $conn->connect_error);
	}

	$result = $conn->query(CURR_ENCHANT_IDS);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			
			//if ($row["enchant"] != "") {
				$url = 'http://armorylite.com/api/enchant/'.$row["enchantID"];
				$charJSON = file_get_contents($url, FILE_TEXT);
				$ench = json_decode($charJSON);

				$enchantID = $row["enchantID"];
				$enchant = $ench->{"Enchants"}->{"name"};

			    $stmt = $conn->prepare("UPDATE wow_enchants SET enchant = ? WHERE enchantID = ?");
			    $stmt->bind_param("si", $enchant, $enchantID);


			    if( ! $stmt->execute() ) {
			      die("Could not update enchant name: " . $conn->error);
			    }
			    
			    $stmt->close();
			//}			
		}
	}

	$conn->close();
