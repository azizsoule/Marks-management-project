<div class="left-sidebar bg-black-300 box-shadow ">
    <div class="sidebar-content">
        <div class="user-info closed">
            <img src="http://placehold.it/90/c2c2c2?text=User" alt="Admin" class="img-circle profile-img">
            <h6 class="title">Admin</h6>
            <small class="info">Administrateur</small>
        </div>
        <!-- /.user-info -->

        <div class="sidebar-nav">
            <ul class="side-nav color-gray">
                <!--<li class="nav-header">
                                        <span class="">Menu</span>
                                    </li>-->
                <li>
                    <a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>Tableau de bord</span> </a>

                </li>

                <li class="nav-header">
                    <span class="">Menu</span>
                </li>
                <li class="has-children">
                    <a href="#"><i class="fa fa-file-text"></i> <span>Gestion des niveaux</span> <i
                                class="fa fa-angle-right arrow"></i></a>
                    <ul class="child-nav">
                        <li><a href="create-class.php"><i class="fa fa-bars"></i> <span>Ajouter un niveau</span></a></li>
                        <li><a href="manage-classes.php"><i class="fa fa fa-server"></i>
                                <span>Liste des niveaux</span></a></li>

                    </ul>
                </li>
                <li class="has-children">
                    <a href="#"><i class="fa fa-file-text"></i> <span>Gestion des UE/ECUE</span> <i
                                class="fa fa-angle-right arrow"></i></a>
                    <ul class="child-nav">
                        <li><a href="create-ue.php"><i class="fa fa-bars"></i> <span>Ajouter une UE</span></a></li>
                        <li><a href="create-ecue.php"><i class="fa fa-bars"></i> <span>Ajouter une ECUE</span></a></li>

                        <li><a href="manage-ue.php"><i class="fa fa fa-server"></i> <span>Liste des UE</span></a></li>
                        <li><a href="manage-ecue.php"><i class="fa fa fa-server"></i> <span>Liste des ECUE</span></a>
                        </li>
                    </ul>
                </li>
                <!--<li class="has-children">
                    <a href="#"><i class="fa fa-file-text"></i> <span>Subjects</span> <i class="fa fa-angle-right arrow"></i></a>
                    <ul class="child-nav">
                        <li><a href="create-subject.php"><i class="fa fa-bars"></i> <span>Create Subject</span></a></li>
                        <li><a href="manage-subjects.php"><i class="fa fa fa-server"></i> <span>Manage Subjects</span></a></li>
                        <li><a href="add-subjectcombination.php"><i class="fa fa-newspaper-o"></i> <span>Add Subject Combination </span></a></li>
                        <li><a href="manage-subjectcombination.php"><i class="fa fa-newspaper-o"></i> <span>Manage Subject Combination </span></a>
                        
                     </li>
                    </ul>
            </li>-->
                <li class="has-children">
                    <a href="#"><i class="fa fa-users"></i> <span>Gestion des étudiants</span> <i
                                class="fa fa-angle-right arrow"></i></a>
                    <ul class="child-nav">
                        <li><a href="add-students.php"><i class="fa fa-bars"></i> <span>Ajouter un étudiant</span></a></li>
                        <li><a href="manage-students.php"><i class="fa fa fa-server"></i>
                                <span>Liste des étudiants</span></a></li>

                    </ul>
                </li>
                <li class="has-children">
                    <a href="#"><i class="fa fa-info-circle"></i> <span>Gestion des notes</span> <i
                                class="fa fa-angle-right arrow"></i></a>
                    <ul class="child-nav">
                        <li><a href="add-result.php"><i class="fa fa-bars"></i> <span>Ajouter une note</span></a></li>
                        <li><a href="manage-results.php"><i class="fa fa fa-server"></i> <span>Notes</span></a>
                        </li>
                        <li><a href="manage-students.php"><i class="fa fa-file-text"></i> <span>Relévés de notes</span></a>
                        </li>
                    </ul>
                <li><a href="change-password.php"><i class="fa fa fa-server"></i>
                        <span> Admin Change Password</span></a></li>

            </ul>
        </div>
        <!-- /.sidebar-nav -->
    </div>
    <!-- /.sidebar-content -->
</div>