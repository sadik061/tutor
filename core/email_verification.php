<?php

include('database.php');

$message = '';

if (isset($_GET['activation_code'])) {
    if ($_GET['type'] == "teacher") {
        $sql = "SELECT * FROM tutors where activation_code='" . $_GET['activation_code'] . "'";
    } else {
        $sql = "SELECT * FROM students where activation_code='" . $_GET['activation_code'] . "'";
    }
}
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($row['user_email_status'] == 'not verified') {
            if ($_GET['type'] == "teacher") {
                $sql = "UPDATE tutors SET user_email_status='verified' WHERE email='" . $row['email'] . "'";
            } else {
                $sql = "UPDATE students SET user_email_status='verified' WHERE email='" . $row['email'] . "'";
            }
            if (mysqli_query($conn, $sql)) {
                $message = '<label class="text-success">Your Email Address Successfully Verified <br />You can login here - <a href="../routes/login.php">Login</a></label>';
            }
        } else {
            $message = '<label class="text-info">Your Email Address Already Verified</label>';
        }
    }
} else {
    $message = '<label class="text-danger">Invalid Link</label>';
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP Register Login Script with Email Verification</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h1 align="center">PHP Register Login Script with Email Verification</h1>

    <h3><?php echo $message; ?></h3>

</div>

</body>

</html>