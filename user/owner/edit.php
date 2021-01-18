<?php 
	
	include 'settings.php'; //include settings
    $id = isset($_POST['save_button']) ? $_POST['save_button'] : 'lol';
    $role = isset($_POST['role_name']) ? $_POST['role_name'] : 'noob';
    echo $id . "@";
    echo $role;
    $query = "UPDATE users SET role_name = '$role' WHERE staff_id = '$id'"; 

    if ($conn->query($query) === TRUE) {
	  echo " Record updated successfully. You can close this window";
	} else {
	  echo "Error updating record: " . $conn->error;
	}

	$conn->close();


?>