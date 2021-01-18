<?php 
	session_start(); // Starting Session

    if (isset($_POST['doc_submit'])) {
        include "C:\xampp\htdocs\DTS2\includes\connect.php";

        // Get all data from form
        $doc_name = $_POST['doc_name'];
        $sender = $_POST['sender'];
        $responsibility = $_POST['responsibility'];
        $kulliyah = $_POST['kuliyyah'];
        $doc_desc = $_POST['doc_desc'];
        $receive_date = $_POST['receive_date'];
        $due_date = $_POST['due_date'];
        $doc_location = $_POST['doc_location'];
        $doc_attention = $_POST['doc_attention'];
        $doc_characteristic = $_POST['doc_characteristic'];
        $doc_status = $_POST['doc_status'];
        $doc_comment = $_POST['doc_comment'];

        //file handling
		$pdfname = $doc_name.".pdf";  
        $temp_name  = $_FILES['file']['tmp_name'];
        echo $pdfname;

        if(isset($pdfname) and !empty($pdfname)){
            $location = "C:\xampp\htdocs\DTS2\pdf\\";      
            if(move_uploaded_file($temp_name, $location.$pdfname)){
                echo 'File uploaded successfully';
            }
        } else {
            echo 'You should select a file to upload !!';
        }

        //echo $doc_name." ".$sender." ".$responsibility." ".$kuliyyah." ".$doc_desc." ".$receive_date . " " . $due_date;
        //echo $doc_location." ".$doc_attention." ".$doc_characteristic." ".$doc_status." ".$doc_comment;


        // SQL query to fetch information of registerd users and finds user match.
        $query = "INSERT INTO documents 
        (doc_name,doc_sender,doc_responsibility, doc_kulliyah, doc_description, doc_receive, doc_due, doc_location, doc_attention, doc_characteristic, doc_status, doc_comment, pdfname)
        VALUES ('$doc_name', '$sender', '$responsibility', '$kulliyah', '$doc_desc', '$receive_date', '$due_date', '$doc_location', '$doc_attention', '$doc_characteristic', '$doc_status', '$doc_comment', '$pdfname')";
        //$query = "UPDATE users SET role_name='$role' WHERE name='$user'";
        if ($conn->query($query) === TRUE) {
		  	echo "Record updated successfully";
		} else {
		  echo "Error updating record: " . $conn->error;
		}

		//update to logs
				$query2 = "INSERT INTO logs 
        (doc_id,doc_name,doc_sender,doc_responsibility, doc_kulliyah, doc_description, doc_receive, doc_due, doc_location, doc_attention, doc_characteristic, doc_status, doc_comment, pdfname)
        VALUES (LAST_INSERT_ID(),'$doc_name', '$sender', '$responsibility', '$kulliyah', '$doc_desc', '$receive_date', '$due_date', '$doc_location', '$doc_attention', '$doc_characteristic', '$doc_status', '$doc_comment', '$pdfname')";
        //$query = "UPDATE users SET role_name='$role' WHERE name='$user'";
        if ($conn->query($query2) === TRUE) {
		  echo "Updated to logs";
		} else {
		  echo "Error updating record: " . $conn->error;
		}
     	mysqli_close($conn); // Closing Connection
    } 

    echo "<br><a href=../assistant/>Menu</a>";

?>