<?php session_start();?>
<?php include 'database.php' ?>
<?php
$mark = "No";
$stmt = $conn->prepare("INSERT INTO message (student_id, tutor_id, subject, message, mark) VALUES (?, ?, ?, ?, ?)");
if ($_SESSION["type"] == "student")
{
    $stmt->bind_param("sssss",  $_SESSION['id'],$_POST['to'], $_POST['subject'], $_POST['message'], $mark);
    echo "Student- ".$_SESSION['id']." ".$_POST['to'];
}else {
    $stmt->bind_param("sssss", $_POST['to'], $_SESSION['id'], $_POST['subject'], $_POST['message'], $mark);
    echo "Teacher- ".$_SESSION['id']." ".$_POST['to'];
}
$stmt->execute();
$stmt->close();
$conn->close();

?>