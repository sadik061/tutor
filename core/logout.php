<?php
// Start the session
session_start();
session_unset(); 
session_destroy(); 
 header("Location: ../routes/login.php?message=Logged Out");
?>