<?php 
session_start(); // Starting Session
    $error = ''; // Variable To Store Error Message
    if (isset($_POST['update_btn'])) {
      if (empty($_POST['doc_name'])) {
        $error = "No name entered";
      }
      else{
        include "C:\\xampp\htdocs\DTS2\includes\connect.php";
        // Define $username and $password
        $id             = $_POST['id'];
        $sender         = $_POST['sender'];
        $doc_name       = $_POST['doc_name'];
        if("" == trim($_POST['responsibility'])){
          $responsibility = $_POST['responsibility2'];
        }
        else
        {
          $responsibility = $_POST['responsibility'];
        }
        $kulliyah       = $_POST['kulliyah'];
        $description    = $_POST['description'];
        $date_receive   = $_POST['date_receive'];
        $due_date       = $_POST['due_date'];
        $location       = $_POST['location'];
        $attention      = $_POST['attention'];
        $characteristic = $_POST['characteristic'];
        $status         = $_POST['status'];

        if($status === 'Rejected' || $status === 'rejected'){
          $responsibility = "Sender";
        }
        
        $comment        = $_POST['comment'];

        /*
        echo $id;
        echo $doc_name;
        echo $sender;
        echo $responsibility;
        echo $kulliyah;
        echo $description;
        echo $date_receive;
        echo $due_date;
        echo $location;
        echo $attention;
        echo $characteristic;
        echo $status;
        echo $comment;
        */

        $pdfQuery = "SELECT pdfname from documents WHERE id='$id'";
        $pdfResult = mysqli_query($conn,$pdfQuery);

        while ($row = mysqli_fetch_array($pdfResult)) {
          $pdfname = $row['pdfname'];
        }

   
        $query = 
        "UPDATE documents 
        SET 
        doc_name           = '$doc_name', 
        doc_sender         = '$sender', 
        doc_responsibility = '$responsibility',
        doc_kulliyah       = '$kulliyah',
        doc_description    = '$description',
        doc_receive        = '$date_receive',
        doc_due            = '$due_date',
        doc_location       = '$location',
        doc_attention      = '$attention',
        doc_characteristic = '$characteristic',
        doc_status         = '$status',
        doc_comment        = '$comment'       
        WHERE id='$id'";

        if ($conn->query($query) === TRUE) {
		      echo "Record updated successfully to ";
		    } 
        else {
		      echo "Error updating record: " . $conn->error;
		    }

        $query2 = "INSERT INTO logs 
        (doc_id,doc_name,doc_sender,doc_responsibility, doc_kulliyah, doc_description, doc_receive, doc_due, doc_location, doc_attention, doc_characteristic, doc_status, doc_comment, pdfname)
        VALUES ('$id','$doc_name', '$sender', '$responsibility', '$kulliyah', '$description', '$date_receive', '$due_date', '$location', '$attention', '$characteristic', '$status', '$comment', '$pdfname')";

        //$query = "UPDATE users SET role_name='$role' WHERE name='$user'";
        if ($conn->query($query2) === TRUE) {
          echo "Updated to logs";
        } else {
          echo "Error updating record: " . $conn->error;
        }
            mysqli_close($conn); // Closing Connection
          }
        } 

    echo "<br><a href=../assistant/>Menu</a>";

?>