<?php
//including the database connection file
require_once ('dbh.php');

//getting id of the data from url
$id = $_GET['id'];
//echo $id;
$reason = $_POST['reason'];

$start = $_POST['start'];
//echo "$reason";
$end = $_POST['end'];



    if ($end >= $start) {
      // Insert data only if end date is after or equal to start date
      $sql = "INSERT INTO `employee_leave`(`id`, `token`, `start`, `end`, `reason`, `status`) VALUES ('$id','','$start','$end','$reason','Pending')";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        echo "Leave request submitted successfully!";
      } else {
        echo "Error: An error occurred while submitting the request.";
      }
    } else {
      // Handle the case when end date is before start date
      echo "<script>alert('Error: End date cannot be before start date.');</script>";
      
    }

// $sql = "INSERT INTO `employee_leave`(`id`,`token`, `start`, `end`, `reason`, `status`) VALUES ('$id','','$start','$end','$reason','Pending')";

$result = mysqli_query($conn, $sql);

//redirecting to the display page (index.php in our case)
header("Location:..//eloginwel.php?id=$id");
?>

