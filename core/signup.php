<?php include 'database.php' ?>
<?php

$type=$_GET["type"];
if($type=="teacher") {
    $password = $_GET["tpassword"];
    $email = $_GET["temail"];
    $sql = "SELECT * FROM tutors where email='" . $email . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        if ($_GET["temail"] != "") {
            header("Location: ../routes/login.php?message=Email already taken");
        }
    } else {
        $user_activation_code = md5(rand());
        $varified = "not verified";
        $stmt = $conn->prepare("INSERT INTO tutors (email,tutor_password,activation_code,user_email_status) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $email, $password, $user_activation_code, $varified);
        $stmt->execute();
        $stmt->close();

        $base_url = "http://localhost/tutor/core/";
        $mail_body = "
   <p>Thanks for Registration. Your password is " . $password . ", This password will work only after your email verification.</p>
   <p>Please Open this link to verified your email address - " . $base_url . "email_verification.php?type=".$type."&activation_code=" . $user_activation_code . "
   <p>Best Regards,<br />Tutor.com</p>
   ";
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
            header("Location: ../routes/login.php?message=Register Done, Please check your mail.");
        }
    }
}
else{
    $password = $_GET["spassword"];
    $email = $_GET["semail"];
    echo $email;
    $sql = "SELECT * FROM students where email='" . $email . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        if ($_GET["semail"] != "") {
            header("Location: ../routes/login.php?message=Email already taken");
        }
    } else {
        $user_activation_code = md5(rand());
        $varified = "not verified";
        $stmt = $conn->prepare("INSERT INTO students (email,student_password,activation_code,user_email_status) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $email, $password, $user_activation_code, $varified);
        $stmt->execute();
        $stmt->close();

        $base_url = "http://localhost/tutor/core/";
        $mail_body = "
   <p>Thanks for Registration. Your password is " . $password . ", This password will work only after your email verification.</p>
   <p>Please Open this link to verified your email address - " . $base_url . "email_verification.php?type=".$type."&activation_code=" . $user_activation_code . "
   <p>Best Regards,<br />Tutor.com</p>
   ";
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
            header("Location: ../routes/login.php?message=Register Done, Please check your mail.");
        }
    }

}
?>
