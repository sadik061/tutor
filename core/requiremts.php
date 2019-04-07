<?php session_start();?>
<?php include 'database.php' ?>
<?php
$d="";
$s="";
$day = $_GET['days'];
foreach ($day as $days){
    $d = $d.$days." ";
}
$sub = $_GET['subject'];
foreach ($sub as $subject){
    $s = $s.$subject." ";
}

$stmt = $conn->prepare("INSERT INTO student_requirements (student_id, subjects, days, tution_time, tution_duration, payment, tutor_background, tutor_institute) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssss", $_SESSION['id'], $s, $d,$_GET['tution_time'],$_GET['tution_duration'],$_GET['payment'],$_GET['tutor_background'],$_GET['tutor_institute']);
$stmt->execute();

echo "New records created successfully";

$stmt->close();
$conn->close();
header("Location: ../routes/profile.php");
?>