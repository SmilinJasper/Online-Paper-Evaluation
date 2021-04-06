<?php 
//Connect to MySQL database
$conn = mysqli_connect("sql111.epizy.com", "epiz_28308908", "tq4nOlJirw", "epiz_28308908_student_database"); 
          
// Check connection 
if($conn === false){ 
    die("ERROR: Could not connect. " 
        . mysqli_connect_error()); 
} 

//Get total no.of uploaded papers
$result = mysqli_query($conn, "SELECT count(1) FROM student_exam_results");
$row = mysqli_fetch_array($result);

$total = $row[0];

//Get no.of checked papers
$result = mysqli_query($conn, "SELECT count(*) from student_exam_results where is_checked='Yes'");
$row = mysqli_fetch_array($result);

$checked = $row[0];

mysqli_close($conn);

//Get no.of remaining papers
$remaining = $total - $checked;
?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>Staff Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script src="js/update_page.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

<div class="nav-bar">
<ul>
  <li><a href="admin_login.html">Admin Login</a></li>
  <li><a class="active" href="index.html">Staff Login</a></li>
</ul>
</div>

<img class="wave" src="img/wave.png">

<main class="page-wrapper">
<header class="downloads-header">
<h1 >DASHBOARD</h1>
</header>
    <div class="paper-info-container">
    <header><h1>COMPUTER SCIENCE</h1></header>
    <div class="course-info-container">

        <div class="course-info">
    <label>
  Course:
</label>
<input type="text" name="dummy1" value="B.Sc" readonly/>
</div>

<div class="course-info">
<label>
  Specialization:
</label>
<input type="text" name="dummy2" value="-" readonly/>
</div>

    </div>
    <div class="paper-count-container">
        <div class="uploaded-paper-count"><p>Uploaded</p>
        <p><?php echo $total; ?></p></div>
        <div class="checked-paper-count"><p>Checked</p>
        <p><?php echo $checked; ?></p></div>
        <div class="remaining-paper-count"><p>Remaining</p>
        <p><?php echo $remaining; ?></p></div>
    </div>

    <div class="check-papers-button">
        <a href="staff_dashboard_2.php" class="button">Check Papers</a>
    </div>
    </div>
    </main>

</body>

</html>