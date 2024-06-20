<?php
session_start();
include "Connection.php";
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
if (!isset($_SESSION['username'])) {
    die("Anda belum login");
}
$no = 1;
$query = "SELECT * FROM choose,ingredients where choose.id_ingredients = ingredients.id_ingredients";
$dt_query = $koneksi->query($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Food Ingredients Detector - Landing Page</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
</head>

<body id="page-top" class="landing-page no-skin-config">
    <div class="navbar-wrapper">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                    </button>
                    <a class="navbar-brand" href="index.html">FID!</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="page-scroll" href="mainMenu.php">Home</a></li>
                        <li class="active"><a class="" href="editAcc.php">Edit Account</a></li>
                        <li><a class="" href="scanIng.php">Scan</a></li>
                        <li><a class="" href="logout.php">Log Out</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div id="inSlider" class="carousel carousel-fade" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Lets Start <br />
                            Customize <br />
                            your ingredients list! <br />
                            <p>Food Ingredients Detector.</p>
                    </div>
                </div>
                <!-- Set background for slide in css -->
                <div class="header-back one">
                    <img src="img/landing/Foodheader.png" alt="header" />
                </div>
            </div>
        </div>
    </div>

    <section class="addIngredients animated fadeInRight">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 text-center">
                    <div class="navy-line"></div>
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Choose ingredients to your avoid list</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form method="POST" class="form-inline" action="aksi_edit.php">
                                <div class="col-lg-6 text-center form-group">
                                    <select class="form-control m-b" name="ingredient">
                                        <?php
                                        include "Connection.php";
                                        $a = "SELECT * FROM ingredients";
                                        $aq = $koneksi->query($a);
                                        while ($data = $aq->fetch_array()) {
                                        ?>
                                            <option value="<?php echo $data['id_ingredients']; ?>"><?php echo $data['ingredients_name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <button class="btn btn-success btn-sm demo2" type="submit">Add to list</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="tableIngredients animated fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Avoid Ingredients Table</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Ingredients to Avoid</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($ingredients = $dt_query->fetch_array()) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $ingredients['ingredients_name']; ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<!-- Mainly scripts -->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>

</html>