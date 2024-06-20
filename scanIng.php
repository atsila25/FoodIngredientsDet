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
$user = $_SESSION['username'];
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

    <!-- Preview container -->
    <style>
        .preview-container {
            margin-top: 20px;
        }

        .preview-container img {
            max-width: 100%;
            height: auto;
        }
    </style>

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

    <!-- OCR -->
    <script src="https://cdn.jsdelivr.net/npm/tesseract.js@v2.1.4/dist/tesseract.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
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
                        <li><a class="" href="editAcc.php">Edit Account</a></li>
                        <li class="active"><a class="" href="scanIng.php">Scan</a></li>
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
                            Scan <br />
                            your ingredients product! <br />
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
                <div class="col-lg-10">
                    <div class="navy-line"></div>
                    <!-- Scanner -->
                    <div class="ibox float-e-margins">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h5>Scan Ingredients</h5>
                                        <?php
                                        $sql = "SELECT ingredients_name FROM choose, ingredients WHERE choose.username = '$user' AND ingredients.id_ingredients = choose.id_ingredients";
                                        $result = $koneksi->query($sql);
                                        if ($result->num_rows > 0) {
                                            $row = $result->fetch_assoc();
                                            $avoidIngredients = $row['ingredients_name'];
                                        }
                                        // Encode the array to JSON and pass it to JavaScript
                                        $avoidIngredientsJson = json_encode($avoidIngredients);
                                        ?>
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
                                        <form class="m-t" action="aksi_user.php?action=scan" method="POST">
                                            <input type="hidden" name="userProfile" value="<?php echo $profileID; ?>">
                                            <div class="preview-container" id="previewContainer">
                                                <!-- Preview image will be displayed here -->
                                            </div>
                                            <label>Nutrition File</label>
                                            <input type="file" id="fileInput" class="form-control" name="scFile" accept=".jpg, .jpeg, .png">
                                            <div id="output"></div>
                                            <div>
                                                <input type="text" class="form-control" onclick="compareText()" id="comparisonResult" placeholder="Comparison Result" name="result" readonly>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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


<!-- Image Prev -->
<script>
    document.getElementById('fileInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const previewContainer = document.getElementById('previewContainer');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                // Clear any existing content
                previewContainer.innerHTML = '';

                // Create an image element
                const img = document.createElement('img');
                img.src = e.target.result;

                // Append the image to the container
                previewContainer.appendChild(img);
            };

            // Read the file as a data URL
            reader.readAsDataURL(file);
        } else {
            // Clear the preview container if no file is selected
            previewContainer.innerHTML = '';
        }
    });
</script>
<!-- OCR -->
<script>
    let ocrOutput = '';

    document.getElementById('fileInput').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function() {
                const img = new Image();
                img.src = reader.result;
                img.onload = function() {
                    Tesseract.recognize(img, 'eng', {
                        logger: m => console.log(m)
                    }).then(({
                        data: {
                            text
                        }
                    }) => {
                        ocrOutput = text;
                        document.getElementById('output').textContent = text;
                        compareText();
                    });
                };
            };
            reader.readAsDataURL(file);
        }
    });

    function compareText() {
        const avoidIngredients = <?php echo $avoidIngredientsJson; ?>;
        if (ocrOutput.includes(avoidIngredients)) {
            document.getElementById('comparisonResult').value = 'Produk tidak aman dikonsumsi';
        } else {
            document.getElementById('comparisonResult').value = 'Produk aman dikonsumsi';
        }
    }
</script>

</html>