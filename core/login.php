<?php
// Start the session
session_start();
?>
<?php include 'database.php' ?>
<?php
$email = $_GET["email"];
$password = $_GET["password"];
$type = $_GET["optionsRadios"];
if($type=='Student')
{
    $sql = "SELECT * FROM students where email='" . $email . "' and student_password=" . $password;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if($row["user_email_status"]!="verified"){
                header("Location: ../routes/login.php?message=Please verify your email address");
            }
            else{
                $_SESSION["id"] =$row["student_id"];
                $_SESSION["type"] = "student";
                $_SESSION["Active"] = "yes";
                header("Location: ../routes/profile.php");
            }
        }

    } else {
        header("Location: ../routes/login.php?message=Invalid User");
    }
}else{
    $sql = "SELECT * FROM tutors where email='" . $email . "' and tutor_password=" . $password;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if($row["user_email_status"]!="verified"){
                header("Location: ../routes/login.php?message=Please verify your email address");
            }
            else{
                $_SESSION["id"] =$row["tutor_id"];
                $_SESSION["type"] = "teacher";
                $_SESSION["Active"] = "yes";
                header("Location: ../routes/profile.php");
            }
        }
    } else {
        header("Location: ../routes/login.php?message=Invalid User");
    }
}

$conn->close();
?>