<?php session_start();?>
<?php include 'database.php' ?>
<?php
$sql = "UPDATE students SET student_name='" . $_GET["name"] . "', area_name='" . $_GET["area"] . "', address='" . $_GET["address"] . "', age=" . $_GET["age"] . ", class='" . $_GET["class"] . "', student_group='".$_GET["student_group"]."', medium='".$_GET["medium"]."', institute='".$_GET["institute"]."', phone=".$_GET["phone"].", student_password='".$_GET["student_password"]."' WHERE student_id=".$_SESSION['id'];
echo $sql;
mysqli_query($conn, $sql);
mysqli_close($conn);
header("Location: ../routes/profile.php");
?>