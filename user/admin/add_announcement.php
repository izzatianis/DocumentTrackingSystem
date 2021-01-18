<?php 
	
	include 'settings.php'; //include settings
    $message = isset($_POST['message']) ? $_POST['message'] : 'lol';
    echo $message;
    $query = "INSERT INTO announcement (message) VALUES ('$message')"; 

    if ($conn->query($query) === TRUE) {
	  echo " Record updated successfully. You can close this window";
	} else {
	  echo "Error updating record: " . $conn->error;
	}

	$conn->close();

?>