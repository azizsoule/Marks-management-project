<?php

require './includes/propel_imports.php';

$niveaux = NiveauQuery::create()->find();

if (isset($_GET["ue"]) && isset($_GET["op"]) && $_GET["op"]=="u") {

    $ue = UeQuery::create()->findPk($_GET["ue"]);

    if (isset($_POST["libelle"]) && isset($_POST["level"]) && isset($_POST["hasecue"]) && isset($_POST["credit"])) {

        $ue->setLibelle($_POST["libelle"]);
        $ue->setIdniveau($_POST["level"]);

        if (!$ue->getHasecue() && $_POST["hasecue"]==1) {
            EcueQuery::create()->filterByIdue($ue->getId())->delete();
        }

        if ($ue->getHasecue() && $_POST["hasecue"]==0) {
            EcueQuery::create()->filterByIdue($ue->getId())->delete();

            $ecue = new Ecue();

            $ecue->setLibelle($ue->getLibelle());
            $ecue->setCredits($_POST["credit"]);

            $ue->addEcue($ecue);
        }

        $ue->setHasecue($_POST["hasecue"]);

        $ue->save();

        header("Location: manage-ue.php");

    }

}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Update UE</title>
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
    <!-----End Top bar-->
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
                            <h2 class="title">Update UE</h2>
                        </div>

                    </div>
                    <!-- /.row -->
                    <div class="row breadcrumb-div">
                        <div class="col-md-6">
                            <ul class="breadcrumb">
                                <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                <li><a href="#">UE</a></li>
                                <li class="active">Modifier UE</li>
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
                                            <h5>Modifier une UE</h5>
                                        </div>
                                    </div>

                                    <div class="panel-body">

                                        <form action="?ue=<?php if (isset($ue)) echo $ue->getId(); ?>" method="post">
                                            <div class="form-group has-success">
                                                <label for="success" class="control-label">Libelle de l'UE</label>
                                                <div class="">
                                                    <input value="<?php if (isset($ue)) echo $ue->getLibelle(); ?>" type="text" name="libelle" class="form-control"
                                                           required="required" id="success">
                                                    <span class="help-block">Ex- Topologie, Séries et intégrales géneralisées</span>
                                                </div>
                                            </div>


                                            <div class="form-group has-success">
                                                <label for="success" class="control-label">Niveau</label>
                                                <div class="">
                                                    <select required="required" id="success" class="form-control"
                                                            name="level">
                                                        <option selected disabled value=""></option>

                                                        <?php

                                                        foreach ($niveaux as $niveau) {

                                                            if (isset($ue) && $niveau->getId()==$ue->getNiveau()->getId()) {
                                                                echo '<option selected value="'.$niveau->getId().'">'.$niveau->getLibelle().'</option>';
                                                            } else {
                                                                echo '<option value="'.$niveau->getId().'">'.$niveau->getLibelle().'</option>';
                                                            }

                                                        }

                                                        ?>

                                                    </select>
                                                    <span class="help-block">Ex- Licence 1, Licence 2</span>
                                                </div>
                                            </div>

                                            <div class="form-group has-success">
                                                <label for="success" class="control-label">Cette UE possede t'elle des
                                                    ECUE ?</label>
                                                <div class="">
                                                    <select onchange="onSelectValueChange(this.value)" class="form-control" name="hasecue" required="required"
                                                            id="success">
                                                        <option disabled value=""></option>
                                                        <option <?php if (isset($ue) && $ue->getHasecue()) echo "selected"; ?> value="1">Oui</option>
                                                        <option <?php if (isset($ue) && !$ue->getHasecue()) echo "selected"; ?> value="0">Non</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group has-success">
                                                <label for="success" class="control-label">Veuillez entrer les crédits
                                                    de l'UE dans le cas ou elle n'a pas d'ECUE</label>
                                                <div class="">
                                                    <input <?php if (isset($ue) && !$ue->getHasecue()) echo "required"; ?> id="cred" value="<?php if (isset($ue) && !$ue->getHasecue()) echo $ue->getEcues()->getFirst()->getCredits(); ?>" type="number" min="1" name="credit" class="form-control" id="success">
                                                    <span class="help-block">Ex- 1,2,3,4,5,6</span>
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

<script>
    function onSelectValueChange(value) {
        if(value == 1) document.getElementById("cred").required = false;

        if (value == 0) document.getElementById("cred").required = true;
    }
</script>

<!-- ========== PAGE JS FILES ========== -->
<script src="js/prism/prism.js"></script>

<!-- ========== THEME JS ========== -->
<script src="js/main.js"></script>


<!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
</body>
</html>
