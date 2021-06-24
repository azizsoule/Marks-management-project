<?php

require './includes/propel_imports.php';

if (isset($_POST["etudiant"]) && isset($_POST["ecue"]) && isset($_POST["base"]) && isset($_POST["note"])) {

    $note = new Note();

    $note->setIdetudiant($_POST["etudiant"]);
    $note->setIdecue($_POST["ecue"]);
    $note->setIdbase($_POST["base"]);
    $note->setNote($_POST["note"]);

    $success = $note->save();

}

if(isset($_POST["niveau"])) {

    header("Location: add-result.php?niveau=".$_POST["niveau"]."");

} elseif (isset($_GET["niveau"])) {

    $etudiants = EtudiantQuery::create()->orderByNom()->findByIdniveau($_GET["niveau"]);

    $ue_ecues = EcueQuery::create()->useUeQuery()->filterByIdniveau($_GET["niveau"])->endUse()->orderByLibelle()->find();

    $bases = BaseQuery::create()->find();

} else {

    $niveaux = NiveauQuery::create()->find();

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Ajout de notes </title>
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
    <link rel="stylesheet" href="css/prism/prism.css" media="screen">
    <link rel="stylesheet" href="css/select2/select2.min.css">
    <link rel="stylesheet" href="css/main.css" media="screen">
    <script src="js/modernizr/modernizr.min.js"></script>


</head>
<body class="top-navbar-fixed">
<div class="main-wrapper">

    <!-- ========== TOP NAVBAR ========== -->
    <?php include('includes/topbar.php'); ?>
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
                            <h2 class="title">Ajout de notes</h2>

                        </div>

                        <!-- /.col-md-6 text-right -->
                    </div>
                    <!-- /.row -->
                    <div class="row breadcrumb-div">
                        <div class="col-md-6">
                            <ul class="breadcrumb">
                                <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                <li class="active">Notes</li>
                                <li class="active">Notes étudiants</li>
                            </ul>
                        </div>

                    </div>
                    <!-- /.row -->
                </div>
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">

                                <div class="panel-body">

                                    <?php

                                    if (isset($success) && $success > 0) {

                                        ?>

                                        <div class="alert alert-success left-icon-alert" role="alert">
                                            <strong>Ajout éffectué avec succès !</strong>
                                        </div>

                                        <?php

                                    }

                                    if (isset($success) && $success <= 0) {

                                        ?>

                                        <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Une erreur est survenue !</strong>
                                        </div>

                                        <?php

                                    }

                                    ?>

                                    <?php

                                    if (!isset($_GET["niveau"])) {

                                        ?>

                                        <form action="" class="form-horizontal" method="post">

                                            <div class="form-group" >
                                                <label for="default" class="col-sm-2 control-label">Niveau</label>
                                                <div class="col-sm-10">
                                                    <select name="niveau" class="form-control clid" id="classid"
                                                            onChange="getStudent(this.value);" required="required">
                                                        <option selected disabled value=""></option>

                                                        <?php

                                                        foreach ($niveaux as $niveau) {

                                                            ?>

                                                            <option value="<?php echo $niveau->getId(); ?>"><?php echo $niveau->getLibelle(); ?></option>

                                                            <?php

                                                        }

                                                        ?>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" name="submit" id="submit" class="btn btn-primary">
                                                        Valider
                                                    </button>
                                                </div>
                                            </div>

                                        </form>

                                        <?php

                                    } else {

                                        ?>

                                        <form action="?niveau=<?php echo $_GET["niveau"]; ?>" class="form-horizontal" method="post">

                                            <div class="form-group">
                                                <label for="date" class="col-sm-2 control-label ">Etudiant</label>
                                                <div class="col-sm-10">
                                                    <select name="etudiant" class="form-control stid" id="studentid"
                                                            required="required" onChange="getresult(this.value);">
                                                        <option selected disabled value=""></option>

                                                        <?php

                                                        foreach ($etudiants as $etudiant) {

                                                            ?>

                                                            <option value="<?php echo $etudiant->getId(); ?>"><?php echo $etudiant->getNom()." ".$etudiant->getPrenoms()." (".$etudiant->getNiveau()->getLibelle().")"; ?></option>

                                                            <?php

                                                        }

                                                        ?>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="date" class="col-sm-2 control-label">UE/ECUE</label>
                                                <div class="col-sm-10">
                                                    <select name="ecue" class="form-control stid" id="studentid"
                                                            required="required" onChange="getresult(this.value);">
                                                        <option selected disabled value=""></option>

                                                        <?php

                                                        foreach ($ue_ecues as $ue_ecue) {

                                                            ?>

                                                            <option value="<?php echo $ue_ecue->getId(); ?>"><?php echo $ue_ecue->getLibelle(); ?></option>

                                                            <?php

                                                        }

                                                        ?>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="date" class="col-sm-2 control-label">Base de la note</label>
                                                <div class="col-sm-10">
                                                    <select name="base" class="form-control stid" id="studentid"
                                                            required="required" onChange="getresult(this.value);">
                                                        <option selected disabled value=""></option>

                                                        <?php

                                                        foreach ($bases as $base) {

                                                            ?>

                                                            <option value="<?php echo $base->getId(); ?>"><?php echo $base->getLibelle(); ?></option>

                                                            <?php

                                                        }

                                                        ?>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="date" class="col-sm-2 control-label">Note</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="number" min="0" max="20" required  name="note">
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" name="submit" id="submit" class="btn btn-primary">
                                                        Ajouter la note
                                                    </button>
                                                </div>
                                            </div>
                                        </form>

                                        <?php

                                    }

                                    ?>

                                </div>
                            </div>
                        </div>
                        <!-- /.col-md-12 -->
                    </div>
                </div>
            </div>
            <!-- /.content-container -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- /.main-wrapper -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/pace/pace.min.js"></script>
    <script src="js/lobipanel/lobipanel.min.js"></script>
    <script src="js/iscroll/iscroll.js"></script>
    <script src="js/prism/prism.js"></script>
    <script src="js/select2/select2.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        $(function ($) {
            $(".js-states").select2();
            $(".js-states-limit").select2({
                maximumSelectionLength: 2
            });
            $(".js-states-hide").select2({
                minimumResultsForSearch: Infinity
            });
        });
    </script>
</body>
</html>
