<?php include 'database.php' ?>
<?php

$type = $_GET["optionsRadios"];
$email = $_GET["femail"];
if ($type == "Teacher") {
    $sql = "SELECT * FROM tutors where email='" . $email . "'";
} else {
    $sql = "SELECT * FROM students where email='" . $email . "'";
}
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    if ($email != "") {
        $base_url = "http://localhost/tutor/core/";

            while($row = $result->fetch_assoc()) {
                if ($type == "Teacher") {
                    $mail_body = "<p>Your password is " . $row["tutor_password"] . "</p>";
                }else{
                    $mail_body = "<p>Your password is " . $row["student_password"] . "</p>";
                }
            }

        require 'class/class.phpmailer.php';
        $mail = new PHPMailer;
        $mail->IsSMTP();        //Sets Mailer to send message using SMTP
        $mail->Host = 'smtp.gmail.com';  //Sets the SMTP hosts of your Email hosting, this for Godaddy
        $mail->Port = '465';        //Sets the default SMTP server port
        $mail->SMTPAuth = true;       //Sets SMTP authentication. Utilizes the Username and Password variables
        $mail->Username = 'ayanuiu174@gmail.com';     //Sets SMTP username
        $mail->Password = 'mariogotze1132014';
        $mail->SMTPKeepAlive = true;        //Sets SMTP password
        $mail->SMTPSecure = 'ssl';       //Sets connection prefix. Options are "", "ssl" or "tls"
        $mail->From = 'ayanuiu174@gmail.com';   //Sets the From email address for the message
        $mail->FromName = 'Tutor.com';     //Sets the From name of the message
        $mail->AddAddress($email, $email);  //Adds a "To" address
        $mail->WordWrap = 50;       //Sets word wrapping on the body of the message to a given number of characters
        $mail->IsHTML(true);       //Sets message type to HTML
        $mail->Subject = 'Email Verification';   //Sets the Subject of the message
        $mail->Body = $mail_body;       //An HTML or plain text message body
        if ($mail->Send())        //Send an Email. Return true on success or false on error
        {
            header("Location: ../routes/login.php?message=Please check your mail.");
        }


    }
}
?>
