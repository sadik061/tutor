<?php include '../Template/header.php'?>
    <body>
<?php include '../Template/navbar.php'?>
    <div id="login-page">
        <div class="container">
            <form class="form-login" action="../core/login.php" method="get">
                <h2 class="form-login-heading">Log in now</h2>
                <div class="login-wrap">
                    <?php if (isset($_GET['message']))
                    {
                        echo '<div class="alert alert-danger"><b>Warning! </b>'.$_GET['message'].'</div>';
                    }
                    ?>
                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="Student" checked="">
                            I am a Student
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="Teacher">
                            I am a Teacher
                        </label>
                    </div>
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <br>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <label class="checkbox">

                        <span class="pull-right">
            <a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>
            </span>
                    </label>
                    <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> LOG IN</button>
                    <hr>

                    <div class="registration">
                        Don't have an account yet?<br/>
                        <a class="" href="signup.php">
                            Create an account
                        </a>
                    </div>
                </div>
            </form>
                <!-- Modal -->
                <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                    <div class="modal-dialog">
                        <form class="form-login" action="../core/forget.php" method="get">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Forgot Password ?</h4>
                            </div>

                            <div class="modal-body">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="Student" checked="">
                                        I am a Student
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="Teacher">
                                        I am a Teacher
                                    </label>
                                </div>
                                <p>Enter your e-mail address below to reset your password.</p>
                                <input type="text" name="femail" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
                            </div>
                            <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                                <button class="btn btn-theme" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal -->
            </form>
        </div>
    </div>
<script src="lib/jquery/jquery.min.js"></script>
<script src="lib/bootstrap/js/bootstrap.min.js"></script>
<!--BACKSTRETCH-->
<!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
<script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
<script>
    $.backstretch("img/login-bg.jpg", {
        speed: 500
    });
</script>