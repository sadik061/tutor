<?php include '../Template/header.php' ?>
<?php if (isset($_SESSION["Active"])) {
} else {
    header("Location: login.php?message=Please login first");
}
?>
<body>
<?php include '../Template/navbar.php' ?>

<!--header end-->
<!-- **********************************************************************************************************************************************************
    MAIN SIDEBAR MENU
    *********************************************************************************************************************************************************** -->
<!--sidebar start-->

<!--sidebar end-->
<!-- **********************************************************************************************************************************************************
    MAIN CONTENT
    *********************************************************************************************************************************************************** -->
<!--main content start-->
<section id="main-content" style="margin-left: 0px;">
    <section class="wrapper site-min-height">
        <?php include '../core/database.php' ?>
        <?php
        $sql = "SELECT * from students where student_id=" . $_GET['id'];
        $result = $conn->query($sql);
        $row = $result->fetch_assoc(); ?>
        <div class="row mt">
            <div class="col-lg-12">
                <div class="row content-panel">
                    <div class="col-md-4 profile-text mt mb centered">
                        <div class="right-divider hidden-sm hidden-xs">
                            <h4><?php echo $row["institute"] ?></h4>
                            <h6>FOLLOWERS</h6>
                            <h4><?php echo $row["medium"] ?></h4>
                            <h6>FOLLOWING</h6>
                            <h4><?php echo $row["student_group"] ?></h4>
                            <h6>MONTHLY EARNINGS</h6>
                            <h4><?php echo $row["class"] ?></h4>
                        </div>
                    </div>
                    <!-- /col-md-4 -->
                    <div class="col-md-4 profile-text">
                        <h3><?php echo $row["student_name"] ?></h3>
                        <h6><?php echo $row["age"] ?></h6>
                        <p><?php echo $row["email"] ?></p>
                        <p><?php echo $row["phone"] ?></p>
                        <p><?php echo $row["address"] ?></p>
                        <p><?php echo $row["area_name"] ?></p>
                        <br>

                    </div>
                    <!-- /col-md-4 -->
                    <div class="col-md-4 centered">
                        <div class="profile-pic">
                            <p><img src="img/ui-sam.jpg" class="img-circle"></p>
                            <p>
                                <a href="compose.php?to=<?php echo $_GET['id']; ?>" class="btn btn-theme"><i class="fa fa-envelope"></i> Send Message
                                </a>
                            </p>
                        </div>
                    </div>
                    <!-- /col-md-4 -->
                </div>
                <!-- /row -->
            </div>
            <!-- /col-lg-12 -->
            <div class="col-lg-12 mt">
                <div class="row content-panel">
                    <div class="panel-heading">
                        <ul class="nav nav-tabs nav-justified">
                            <li class="active">
                                <a data-toggle="tab" href="#overview">Requirements</a>
                            </li>

                        </ul>
                    </div>
                    <!-- /panel-heading -->
                    <div class="panel-body">
                        <div class="tab-content">
                            <div id="overview" class="tab-pane active">
                                <table class="table table-striped table-advance table-hover">

                                    <?php
                                    $sql2 = "SELECT * from student_requirements where student_id=". $_GET['id'];
                                    $result2 = $conn->query($sql2);?>
                                    <thead>
                                    <tr>
                                        <th><i class="fa fa-bullhorn"></i> Subjects</th>
                                        <th class="hidden-phone"><i class="fa fa-question-circle"></i>
                                            Days
                                        </th>
                                        <th><i class="fa fa-bookmark"></i>Time</th>
                                        <th><i class=" fa fa-edit"></i> Duration</th>
                                        <th>Payment</th>
                                        <th>Background</th>
                                        <th>Institution</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php while($row2 = $result2->fetch_assoc()){?>
                                        <tr>
                                            <td>
                                                <a href="basic_table.html#"><?php echo $row2["subjects"] ?></a>
                                            </td>
                                            <td class="hidden-phone"><?php echo $row2["days"] ?></td>
                                            <td><?php echo $row2["tution_time"] ?></td>
                                            <td><span class="label label-info label-mini"><?php echo $row2["tution_duration"] ?></span></td>
                                            <td><?php echo $row2["payment"] ?></td>
                                            <td><?php echo $row2["tutor_background"] ?></td>
                                            <td><?php echo $row2["tutor_institute"] ?></td>
                                            <td>
                                                <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php } ?>

                                    </tbody>
                                </table>
                                <!-- /OVERVIEW -->
                            </div>
                            <!-- /tab-pane -->
                            <div id="contact" class="tab-pane">
                                <div class="row">
                                    <!-- /col-md-6 -->
                                    <div class="col-md-12 detailed">
                                        <form role="form" class="form-horizontal" action="../core/requiremts.php" method="get">
                                            <div class="col-lg-6 detailed">
                                                <h4 class="mb">Personal Information</h4>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Tution time</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Ex. 1PM" name="tution_time"
                                                               class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Duration</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Ex. 1 hour" name="tution_duration"
                                                               class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Payment</label>
                                                    <div class="col-lg-6">
                                                        <input type="number" placeholder=" " name="payment"
                                                               class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Tutor Background</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Bangla" name="tutor_background"
                                                               class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Tutor Institute</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder=" " name="tutor_institute"
                                                               class="form-control">
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="col-lg-6 detailed">
                                                <h4 class="mb">Personal Information</h4>

                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Subjects</label>
                                                    <div class="col-lg-8">
                                                        <label class="checkbox-inline">
                                                            <input type="checkbox" name="subject[]" id="subject" value="Bangla"> Bangla
                                                        </label>
                                                        <label class="checkbox-inline">
                                                            <input type="checkbox" name="subject[]" id="subject" value="English"> English
                                                        </label>
                                                        <label class="checkbox-inline">
                                                            <input type="checkbox" name="subject[]" id="subject" value="Math"> Math
                                                        </label>
                                                        <label class="checkbox-inline">
                                                            <input type="checkbox" name="subject[]" id="subject" value="Higher"> Higher math
                                                        </label>
                                                        <label class="checkbox-inline">
                                                            <input type="checkbox" name="subject[]" id="subject" value="Physics"> Physics
                                                        </label>
                                                        <label class="checkbox-inline">
                                                            <input type="checkbox" name="subject[]" id="subject" value="Chemistry"> Chemistry
                                                        </label>
                                                        <label class="checkbox-inline">
                                                            <input type="checkbox" name="subject[]" id="subject" value="Biology"> Biology
                                                        </label>
                                                        <label class="checkbox-inline">
                                                            <input type="checkbox" name="subject[]" id="subject" value="Islam"> Islam
                                                        </label>
                                                        <label class="checkbox-inline">
                                                            <input type="checkbox" name="subject[]" id="subject" value="ICT"> ICT
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Days</label>
                                                    <div class="col-lg-8">
                                                        <label class="checkbox-inline">
                                                            <input type="checkbox" name="days[]" id="days" value="Saturday"> Saturday
                                                        </label>
                                                        <label class="checkbox-inline">
                                                            <input type="checkbox" name="days[]" id="days" value="Sunday"> Sunday
                                                        </label>
                                                        <label class="checkbox-inline">
                                                            <input type="checkbox" name="days[]" id="days" value="Monday"> Monday
                                                        </label>
                                                        <label class="checkbox-inline">
                                                            <input type="checkbox" name="days[]" id="days" value="Tuesday"> Tuesday
                                                        </label>
                                                        <label class="checkbox-inline">
                                                            <input type="checkbox" name="days[]" id="days" value="Wednesday"> Wednesday
                                                        </label>
                                                        <label class="checkbox-inline">
                                                            <input type="checkbox" name="days[]" id="days" value="Thursday"> Thursday
                                                        </label>
                                                        <label class="checkbox-inline">
                                                            <input type="checkbox" name="days[]" id="days" value="Friday"> Friday
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button class="btn btn-theme" type="submit">Add</button>
                                                    </div>
                                                </div>
                                        </form>
                                    </div>
                                    </form>
                                </div>
                                <!-- /col-md-6 -->
                            </div>
                            <!-- /row -->
                        </div>
                        <!-- /tab-pane -->

                        <!-- /tab-pane -->
                    </div>
                    <!-- /tab-content -->
                </div>
                <!-- /panel-body -->
            </div>
            <!-- /col-lg-12 -->
        </div>

        <!-- /row -->
        </div>
        <?php
        $conn->close();
        ?>
        <!-- /container -->
    </section>
    <!-- /wrapper -->
</section>
<script src="lib/jquery/jquery.min.js"></script>
<script src="lib/bootstrap/js/bootstrap.min.js"></script>
<!--BACKSTRETCH-->
<!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
<script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
<script>

</script>