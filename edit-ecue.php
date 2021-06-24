<?php

require './includes/propel_imports.php';

if (isset($_GET["ecue"]) && isset($_GET["op"]) && $_GET["op"]=="u") {

    $ecue = EcueQuery::create()->findPk($_GET["ecue"]);

    if (isset($_POST["libelle"]) && isset($_POST["credit"]) && isset($_POST["ue"])) {

        $ecue->setLibelle($_POST["libelle"]);
        $ecue->setCredits($_POST["credit"]);
        $ecue->setIdue($_POST["ue"]);

        $ecue->save();

        header("Location: manage-ecue.php");

    }

}

$ues = UeQuery::create()->findByHasecue(true);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Update ECUE</title>
    <link rel="stylesheet" href="css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
    <link rel="stylesheet" href="css/prism/prism.css" media="screen"> <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
    <link rel="stylesheet" href="css/main.css" media="screen">
    <script src="js/modernizr/modernizr.min.js"></script>
</head>
<body class="top-navbar-fixed">
<div class="main-wrapper">

    <!-- ========== TOP NAVBAR ========== -->
    <?php include('includes/topbar.php'); ?>
    <!-----End Top bar -->
    <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
    <div class="content-wrapper">
        <div class="content-container">

            <!-- ========== LEFT SIDEBAR ========== -->
            <?php include('includes/leftbar.php'); ?>
            <!-- /.left-sidebar -->

            <div class="main-page">
                <div class="container-fluid">
                    <div class="row page-title-div">
                        <div class="col-md-6">
                            <h2 class="title">Modifier ECUE</h2>
                        </div>

                    </div>
                    <!-- /.row -->
                    <div class="row breadcrumb-div">
                        <div class="col-md-6">
                            <ul class="breadcrumb">
                                <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                <li><a href="#">ECUE</a></li>
                                <li class="active">Modifier ECUE</li>
                            </ul>
                        </div>

                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->

                <section class="section">
                    <div class="container-fluid">


                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <h5>Modification d'une ECUE</h5>
                                        </div>
                                    </div>

                                    <div class="panel-body">

                                        <form action="?ecue=<?php if (isset($ecue)) echo $ecue->getId(); ?>&op=u" method="post">
                                            <div class="form-group has-success">
                                                <label for="success" class="control-label">Libelle de l'ECUE</label>
                                                <div class="">
                                                    <input value="<?php if (isset($ecue)) echo $ecue->getLibelle(); ?>" type="text" name="libelle" class="form-control"
                                                           required="required" id="success">
                                                    <span class="help-block">Ex- Séries, intégrales géneralisées, RSA</span>
                                                </div>
                                            </div>

                                            <div class="form-group has-success">
                                                <label for="success" class="control-label">Credit de l'ECUE</label>
                                                <div class="">
                                                    <input value="<?php if (isset($ecue)) echo $ecue->getCredits(); ?>" type="number" min="1" name="credit" class="form-control"
                                                           required="required" id="success">
                                                    <span class="help-block">Ex- Séries, intégrales géneralisées, RSA</span>
                                                </div>
                                            </div>


                                            <div class="form-group has-success">
                                                <label for="success" class="control-label">UE</label>
                                                <div class="">
                                                    <select required="required" id="success" class="form-control"
                                                            name="ue">
                                                        <option selected disabled value=""></option>
                                                        <?php

                                                        foreach ($ues as $ue) {

                                                            if (isset($ecue) && $ecue->getUe()->getId()==$ue->getId()) {
                                                                echo '<option selected value="'.$ue->getId().'">'.$ue->getLibelle().' ('.$ue->getNiveau()->getLibelle().')'.'</option>';
                                                            } else {
                                                                echo '<option value="'.$ue->getId().'">'.$ue->getLibelle().' ('.$ue->getNiveau()->getLibelle().')'.'</option>';
                                                            }

                                                        }

                                                        ?>
                                                    </select>
                                                    <span class="help-block">Ex- Topologie, Séries et intégrales géneralisées</span>
                                                </div>
                                            </div>

                                            <div class="form-group has-success">

                                                <div class="">
                                                    <button type="submit" name="submit"
                                                            class="btn btn-success btn-labeled">Valider<span
                                                                class="btn-label btn-label-right"><i
                                                                    class="fa fa-check"></i></span></button>
                                                </div>


                                        </form>


                                    </div>
                                </div>
                            </div>
                            <!-- /.col-md-8 col-md-offset-2 -->
                        </div>
                        <!-- /.row -->


                    </div>
                    <!-- /.container-fluid -->
                </section>
            <!-- /.container-fluid -->
            </section>
            <!-- /.section -->

        </div>
        <!-- /.main-page -->


        <!-- /.right-sidebar -->

    </div>
    <!-- /.content-container -->
</div>
<!-- /.content-wrapper -->

</div>
<!-- /.main-wrapper -->

<!-- ========== COMMON JS FILES ========== -->
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<script src="js/jquery-ui/jquery-ui.min.js"></script>
<script src="js/bootstrap/bootstrap.min.js"></script>
<script src="js/pace/pace.min.js"></script>
<script src="js/lobipanel/lobipanel.min.js"></script>
<script src="js/iscroll/iscroll.js"></script>

<!-- ========== PAGE JS FILES ========== -->
<script src="js/prism/prism.js"></script>

<!-- ========== THEME JS ========== -->
<script src="js/main.js"></script>


<!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
</body>
</html>
