<?php include '../Template/header.php' ?>

<body>
<?php include '../Template/navbar.php' ?>
<div style="    margin-top: 5%;margin-left: 50%; position: fixed;" class="col-sm-6">
    <section class="panel">
        <header class="panel-heading wht-bg">

        </header>
        <div class="panel-body">

            <div class="compose-mail">
                <form role="form-horizontal" action="../core/message.php" method="post">
                    <div class="form-group">
                        <label for="to" class="">To:</label>
                        <input type="text" tabindex="1" id="to" name="to" class="form-control" value="<?php echo $_GET['to'];?>">

                    </div>
                    <div class="form-group">
                        <label for="subject" class="">Subject:</label>
                        <input type="text" tabindex="1" id="subject" name="subject" class="form-control">
                    </div>
                    <div class="compose-editor">
                        <textarea class="wysihtml5 form-control" rows="9" name="message"></textarea>

                    </div>
                    <div class="compose-btn">
                        <button class="btn btn-theme btn-sm"><i class="fa fa-check"></i> Send</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

    <div  style="    margin-top: 5%;" class="col-sm-6">
        <section class="panel">
            <header class="panel-heading wht-bg">
                <h4 class="gen-case">
                    Previous messqage

                </h4>
            </header>
            <?php include '../core/database.php' ?>
            <?php
            $sql = "SELECT * FROM (message INNER JOIN students ON students.student_id = message.student_id) INNER JOIN tutors ON tutors.tutor_id=message.tutor_id WHERE students.student_id=".$_GET['to']." and tutors.tutor_id=".$_SESSION["id"];
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()){?>
            <div class="panel-body ">
                <div class="mail-header row">
                    <div class="col-md-8">
                        <h4 class="pull-left">Subject : <?php echo $row["subject"] ?> </h4>
                    </div>

                </div>

                <div class="view-mail">
                    Message :
                    <p><?php echo $row["message"] ?></p>
                </div>


            </div>
            <?php } ?>

        </section>

    </div>



    <!-- js placed at the end of the document so the pages load faster -->
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
    <script src="lib/jquery.scrollTo.min.js"></script>
    <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
    <!--common script for all pages-->
    <script src="lib/common-scripts.js"></script>
    <!--script for this page-->
    <script type="text/javascript" src="lib/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
    <script type="text/javascript" src="lib/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>

    <script type="text/javascript">
        //wysihtml5 start

        $('.wysihtml5').wysihtml5();

        //wysihtml5 end
    </script>
</body>

</html>
