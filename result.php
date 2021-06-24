<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Result Management System</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
    <link rel="stylesheet" href="css/prism/prism.css" media="screen">
    <link rel="stylesheet" href="css/main.css" media="screen">
    <script src="js/modernizr/modernizr.min.js"></script>
</head>
<body>
<div class="main-wrapper">
    <div class="content-wrapper">
        <div class="content-container">


            <!-- /.left-sidebar -->

            <div class="main-page">
                <div class="container-fluid">
                    <div class="row page-title-div">
                        <div class="col-md-12">
                            <h2 class="title" align="center">Result Management System</h2>
                        </div>
                    </div>
                    <!-- /.row -->

                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->

                <section class="section" id="exampl">
                    <div class="container-fluid">

                        <div class="row">


                            <div class="col-md-8 col-md-offset-2">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <h3 align="center">Student Result Details</h3>
                                            <hr/>

                                            <p><b>Student Name :</b></p>
                                            <p><b>Student Roll Id :</b>
                                            <p><b>Student Class:</b></div>
                                        <div class="panel-body p-20">


                                            <table class="table table-hover table-bordered" border="1" width="100%">
                                                <thead>
                                                <tr style="text-align: center">
                                                    <th style="text-align: center">#</th>
                                                    <th style="text-align: center"> Subject</th>
                                                    <th style="text-align: center">Marks</th>
                                                </tr>
                                                </thead>


                                                <tbody>
                                                <tr>
                                                    <th scope="row" style="text-align: center"></th>
                                                    <td style="text-align: center"></td>
                                                    <td style="text-align: center"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" colspan="2" style="text-align: center">Total Marks
                                                    </th>
                                                    <td style="text-align: center"><b></b> out of <b></b></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" colspan="2" style="text-align: center">Percntage
                                                    </th>
                                                    <td style="text-align: center"><b> %</b></td>
                                                </tr>

                                                <tr>

                                                    <td colspan="3" align="center"><i class="fa fa-print fa-2x"
                                                                                      aria-hidden="true"
                                                                                      style="cursor:pointer"
                                                                                      OnClick="CallPrint(this.value)"></i>
                                                    </td>
                                                </tr>


                                                <div class="alert alert-warning left-icon-alert" role="alert">
                                                    <strong>Notice!</strong> Your result not declare yet

                                                </div>


                                                <div class="alert alert-danger left-icon-alert" role="alert">
                                                    strong>Oh snap!</strong>

                                                </div>


                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                    <!-- /.panel -->
                                </div>
                                <!-- /.col-md-6 -->

                                <div class="form-group">

                                    <div class="col-sm-6">
                                        <a href="index.php">Back to Home</a>
                                    </div>
                                </div>

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

<!-- ========== THEME JS ========== -->
<script src="js/main.js"></script>
<script>
    $(function ($) {

    });


    function CallPrint(strid) {
        var prtContent = document.getElementById("exampl");
        var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write(prtContent.innerHTML);
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();
        WinPrint.close();
    }
</script>

</script>

<!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->

</body>
</html>
