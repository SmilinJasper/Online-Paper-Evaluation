<?php 

//Connect to MySQL database
$conn = mysqli_connect("sql111.epizy.com", "epiz_28308908", "tq4nOlJirw", "epiz_28308908_student_database"); 
          
// Check connection 
if($conn === false){ 
    die("ERROR: Could not connect. " 
        . mysqli_connect_error()); 
} 

//Send marks to row with paper's id
$id = $_POST['id'];

     $totalMarks = $_REQUEST['total-marks'];
     $sql = "UPDATE student_exam_results SET marks =  $totalMarks,
     is_checked ='Yes' WHERE id = $id";

    //Close connection
    mysqli_close($conn);

     //Redirect to mark updated message
     if (mysqli_query($conn, $sql)) {
      header("Location: mark_updated.html");
     }    

?>;
