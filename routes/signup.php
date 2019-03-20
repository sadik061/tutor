<?php include '../Template/header.php' ?>
<body>
<?php include '../Template/navbar.php' ?>
<div id="login-page">
    <div class="container">
        <div class="form-login">
        <h2 class="form-login-heading">sign Up now</h2>
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#student">As a Student</a></li>
            <li><a data-toggle="tab" href="#teacher">As a Teacher</a></li>
        </ul>
        <div class="tab-content">
            <div id="student" class="tab-pane fade in active">
                <form action="../core/signup.php" method="get">
                    <div class="login-wrap">
                        <input type="text" class="form-control" name="semail" placeholder="Email" autofocus>
                        <br>
                        <input type="password" class="form-control" name="spassword" placeholder="Password">
                        <input style="display: none;" type="text" class="form-control" name="type" value="student">

                        <br>
                        <button class="btn btn-theme btn-block" href="index.html" type="submit"><i
                                    class="fa fa-lock"></i> SIGN
                            UP
                        </button>
                        <hr>

                        <div class="registration">
                            Already have an account?<br/>
                            <a class="" href="login.php">
                                Log in
                            </a>
                        </div>
                    </div>

                </form>
            </div>
            <div id="teacher" class="tab-pane fade">
                <form action="../core/signup.php" method="get">
                    <div class="login-wrap">
                        <input type="text" name="temail" class="form-control" placeholder="Email" autofocus>
                        <br>
                        <input type="password" name="tpassword" class="form-control" placeholder="Password">
                        <input style="display: none;" type="text" class="form-control" name="type" value="teacher">

                        <br>
                        <button class="btn btn-theme btn-block" href="index.html" type="submit"><i
                                    class="fa fa-lock"></i> SIGN
                            UP
                        </button>
                        <hr>

                        <div class="registration">
                            Already have an account?<br/>
                            <a class="" href="login.php">
                                Log in
                            </a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>


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