<?php

require './includes/propel_imports.php';

$levels = NiveauQuery::create()->find();

$genders = GenreQuery::create()->find();

if (isset($_POST["lastname"]) && isset($_POST["firstname"]) && isset($_POST["date_naiss"]) && isset($_POST["email"]) && isset($_POST["contact"]) && isset($_POST["level"]) && isset($_POST["genre"])) {

    $etudiant = new Etudiant();

    $etudiant->setNom($_POST["lastname"]);
    $etudiant->setPrenoms($_POST["firstname"]);
    $etudiant->setDatenaissance($_POST["date_naiss"]);
    $etudiant->setEmail($_POST["email"]);
    $etudiant->setContact($_POST["contact"]);
    $etudiant->setIdniveau($_POST["level"]);
    $etudiant->setIdgenre($_POST["genre"]);

    $success = $etudiant->save();

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin| Ajout étudiant< </title>
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
                            <h2 class="title">Ajout étudiant</h2>

                        </div>

                        <!-- /.col-md-6 text-right -->
                    </div>
                    <!-- /.row -->
                    <div class="row breadcrumb-div">
                        <div class="col-md-6">
                            <ul class="breadcrumb">
                                <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                <li class="active">Etudiant</li>
                                <li class="active">Ajouter un étudiant</li>
                            </ul>
                        </div>

                    </div>
                    <!-- /.row -->
                </div>
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h5>Renseignez les informations de l'étudiant</h5>
                                    </div>
                                </div>
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

                                    <form class="form-horizontal" method="post">

                                        <div class="form-group">
                                            <label for="default" class="col-sm-2 control-label">Nom</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="lastname" class="form-control" id="fullanme"
                                                       required="required" autocomplete="off">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="default" class="col-sm-2 control-label">Prénoms</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="firstname" class="form-control" id="fullanme"
                                                       required="required" autocomplete="off">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="default" class="col-sm-2 control-label">Date de naissance</label>
                                            <div class="col-sm-10">
                                                <input type="date" name="date_naiss" class="form-control" id="rollid"
                                                       maxlength="5" required="required" autocomplete="off">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="default" class="col-sm-2 control-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" name="email" class="form-control" id="email"
                                                       required="required" autocomplete="off">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="default" class="col-sm-2 control-label">Genre</label>
                                            <div class="col-sm-10">

                                                <?php

                                                foreach ($genders as $gender) {

                                                    echo '<input checked="" type="radio" name="genre" value="'.$gender->getId().'" required="required"> '.$gender->getLibelle().' ';

                                                }

                                                ?>

                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="default" class="col-sm-2 control-label">Niveau</label>
                                            <div class="col-sm-10">
                                                <select name="level" class="form-control" id="default" required="required">
                                                    <option selected disabled value=""></option>
                                                    <?php

                                                    foreach ($levels as $level) {

                                                        echo '<option value="'.$level->getId().'">'.$level->getLibelle().'</option>';

                                                    }

                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="date" class="col-sm-2 control-label">Contact</label>
                                            <div class="col-sm-10">
                                                <input required type="tel" name="contact" class="form-control" id="date">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" name="submit" class="btn btn-primary">Ajouter étudiant</button>
                                            </div>
                                        </div>
                                    </form>

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
