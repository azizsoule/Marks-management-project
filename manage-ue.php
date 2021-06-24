<?php

require './includes/propel_imports.php';

if (isset($_GET["ue"]) && isset($_GET["op"]) && $_GET["op"]=='d') {

    UeQuery::create()->findPk($_GET["ue"])->delete();

    header("Location: manage-ue.php");

}

$ues = UeQuery::create()->find();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Gestion UE</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
    <link rel="stylesheet" href="css/prism/prism.css" media="screen"> <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
    <link rel="stylesheet" type="text/css" href="js/DataTables/datatables.min.css"/>
    <link rel="stylesheet" href="css/main.css" media="screen">
    <script src="js/modernizr/modernizr.min.js"></script>
    <style>
        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }

        .succWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #5cb85c;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }
    </style>
</head>

<body class="top-navbar-fixed">
<div class="main-wrapper">

    <!-- ========== TOP NAVBAR ========== -->
    <?php include('includes/topbar.php'); ?>
    <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
    <div class="content-wrapper">
        <div class="content-container">
            <?php include('includes/leftbar.php'); ?>

            <div class="main-page">
                <div class="container-fluid">
                    <div class="row page-title-div">
                        <div class="col-md-6">
                            <h2 class="title">Liste des UE</h2>

                        </div>

                        <!-- /.col-md-6 text-right -->
                    </div>
                    <!-- /.row -->
                    <div class="row breadcrumb-div">
                        <div class="col-md-6">
                            <ul class="breadcrumb">
                                <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                <li> UE</li>
                                <li class="active">Liste des UE</li>
                            </ul>
                        </div>

                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->

                <section class="section">
                    <div class="container-fluid">


                        <div class="row">
                            <div class="col-md-12">

                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <h5>Liste des UE </h5>
                                        </div>
                                    </div>

                                    <!-- <div class="alert alert-success left-icon-alert" role="alert">
                                        <strong>Well done!</strong>
                                    </div>
                                    <div class="alert alert-danger left-icon-alert" role="alert">
                                        <strong>Oh snap!</strong>
                                    </div> -->

                                    <div class="panel-body p-20">

                                        <table id="example" class="display table table-striped table-bordered"
                                               cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Libelle</th>
                                                <th>Crédits</th>
                                                <th>ECUE</th>
                                                <th>Niveau</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Libelle</th>
                                                <th>Crédits</th>
                                                <th>ECUE</th>
                                                <th>Niveau</th>
                                                <th>Action</th>
                                            </tr>
                                            </tfoot>
                                            <tbody>

                                            <?php

                                            $i=1;

                                            foreach ($ues as $ue) {

                                                ?>

                                                <tr>
                                                    <td> <?php echo $i; ?> </td>
                                                    <td> <?php echo $ue->getLibelle(); ?> </td>
                                                    <td>
                                                        <?php

                                                        $ecues = $ue->getEcues();

                                                        if ($ue->getHasecue()) {

                                                            $cred = 0;

                                                            foreach ($ecues as $ecue) {
                                                                $cred += $ecue->getCredits();
                                                            }

                                                            echo $cred;

                                                        } else {

                                                            echo $ecues->getFirst()->getCredits();

                                                        }

                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php

                                                        if (!$ue->getHasecue()) {

                                                            echo "UE sans ECUE";

                                                        } else {

                                                            foreach ($ue->getEcues() as $ecue) {
                                                                echo $ecue->getLibelle()." ( ".$ecue->getCredits()." ), ";
                                                            }

                                                        }

                                                        ?>
                                                    </td>
                                                    <td> <?php echo $ue->getNiveau()->getLibelle(); ?> </td>
                                                    <td>
                                                        <!-- <a href="edit-ue.php?ue=<?php echo $ue->getId(); ?>&op=u"><i class="fa fa-edit"
                                                                                       title="Editer"></i> </a> -->

                                                        <a href="?ue=<?php echo $ue->getId(); ?>&op=d"><i class="fa fa-trash"
                                                                                       title="Supprimer"></i> </a>

                                                    </td>
                                                </tr>

                                                <?php

                                                $i++;

                                            }

                                            ?>


                                            </tbody>
                                        </table>


                                        <!-- /.col-md-12 -->
                                    </div>
                                </div>
                            </div>
                            <!-- /.col-md-6 -->


                        </div>
                        <!-- /.col-md-12 -->
                    </div>
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-md-6 -->

    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->
</section>
<!-- /.section -->

</div>
<!-- /.main-page -->


</div>
<!-- /.content-container -->
</div>
<!-- /.content-wrapper -->

</div>
<!-- /.main-wrapper -->

<!-- ========== COMMON JS FILES ========== -->
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<script src="js/bootstrap/bootstrap.min.js"></script>
<script src="js/pace/pace.min.js"></script>
<script src="js/lobipanel/lobipanel.min.js"></script>
<script src="js/iscroll/iscroll.js"></script>

<!-- ========== PAGE JS FILES ========== -->
<script src="js/prism/prism.js"></script>
<script src="js/DataTables/datatables.min.js"></script>

<!-- ========== THEME JS ========== -->
<script src="js/main.js"></script>
<script>
    $(function ($) {
        $('#example').DataTable();

        $('#example2').DataTable({
            "scrollY": "300px",
            "scrollCollapse": true,
            "paging": false
        });

        $('#example3').DataTable();
    });
</script>
</body>

</html>
