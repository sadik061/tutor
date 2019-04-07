<?php include '../Template/header.php'?>
<body>
<?php include '../Template/navbar.php'?>
<div class="panel-body minimal">
    <div class="mail-option">
        <div class="chk-all">
            <div class="pull-left mail-checkbox">
                <input type="checkbox" class="">
            </div>
            <div class="btn-group">
                <a data-toggle="dropdown" href="#" class="btn mini all">
                    All
                    <i class="fa fa-angle-down "></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="#"> None</a></li>
                    <li><a href="#"> Read</a></li>
                    <li><a href="#"> Unread</a></li>
                </ul>
            </div>
        </div>
        <div class="btn-group">
            <a data-original-title="Refresh" data-placement="top" data-toggle="dropdown" href="#" class="btn mini tooltips">
                <i class=" fa fa-refresh"></i>
            </a>
        </div>
        <div class="btn-group hidden-phone">
            <a data-toggle="dropdown" href="#" class="btn mini blue">
                More
                <i class="fa fa-angle-down "></i>
            </a>
            <ul class="dropdown-menu">
                <li><a href="#"><i class="fa fa-pencil"></i> Mark as Read</a></li>
                <li><a href="#"><i class="fa fa-ban"></i> Spam</a></li>
                <li class="divider"></li>
                <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
            </ul>
        </div>
        <div class="btn-group">
            <a data-toggle="dropdown" href="#" class="btn mini blue">
                Move to
                <i class="fa fa-angle-down "></i>
            </a>
            <ul class="dropdown-menu">
                <li><a href="#"><i class="fa fa-pencil"></i> Mark as Read</a></li>
                <li><a href="#"><i class="fa fa-ban"></i> Spam</a></li>
                <li class="divider"></li>
                <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
            </ul>
        </div>
        <ul class="unstyled inbox-pagination">
            <li><span>1-50 of 99</span></li>
            <li>
                <a class="np-btn" href="#"><i class="fa fa-angle-left  pagination-left"></i></a>
            </li>
            <li>
                <a class="np-btn" href="#"><i class="fa fa-angle-right pagination-right"></i></a>
            </li>
        </ul>
    </div>
    <div class="table-inbox-wrap ">
        <table class="table table-inbox table-hover">
            <thead>
                <td>Name</td>
                <td style="text-align: center">Class</td>
                <td style="text-align: center">Area</td>
                <td style="text-align: center">Time</td>
                <td style="text-align: center">Duration</td>
                <td style="text-align: center">Payment</td>
                <td>Subject</td>
                <td>Day</td>
                <td>Tutor background</td>
                <td style="text-align: center">Tutor Institute</td>
            </thead>
            <tbody>
            <?php include '../core/database.php' ?>
            <?php
            $sql = "SELECT * from student_requirements NATURAL JOIN  students";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            while($row = $result->fetch_assoc()){ ?>
            <tr class="unread">
                <td class="view-message " style="width: 16%;"><a href="user.php?id=<?php echo $row["student_id"]?>"><?php echo $row["student_name"]?></a></td>
                <td class="view-message " style="text-align: center"><?php echo $row["class"]?></td>
                <td class="view-message " style="text-align: center"><?php echo $row["area_name"]?></td>
                <td class="view-message " style="text-align: center"><?php echo $row["tution_time"]?></td>
                <td class="view-message "style="text-align: center"><?php echo $row["tution_duration"]?></td>
                <td class="view-message " style="text-align: center"><?php echo $row["payment"]?></td>
                <td class="inbox-small-cells"><?php echo $row["subjects"]?></td>
                <td class="view-message "><?php echo $row["days"]?></td>
                <td class="view-message  inbox-small-cells"><?php echo $row["tutor_background"]?></td>
                <td class="view-message  text-right" style="text-align: center"><?php echo $row["tutor_institute"]?></td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
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