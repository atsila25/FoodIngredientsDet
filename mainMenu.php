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
                        <li class="active"><a class="page-scroll" href="mainMenu.php">Home</a></li>
                        <li><a class="" href="editAcc.php">Edit Account</a></li>
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
                        <h1>We help you<br />
                            detecting <br />
                            your ingredients easily<br />
                            <p>Food Ingredients Detector.</p>
                    </div>
                    <div class="carousel-image wow zoomIn">
                        <img src="img/landing/ShBas.png" alt="basket" />
                    </div>
                </div>
                <!-- Set background for slide in css -->
                <div class="header-back one">
                <img src="img/landing/Foodheader.png" alt="header" />
                </div>
            </div>
        </div>
    </div>

    <section class="editAcc">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="navy-line"></div>
                    <h1>EDIT YOUR ACCOUNT.</h1>
                    <p>Want to streamline your meal planning? Our user-friendly account editing system makes it a breeze! </p>
                </div>
            </div>
            <div class="row features-block">
                <div class="col-lg-6 text-left m-t-n-lg wow zoomIn">
                    <img src="img/landing/Edit.png" class="img-responsive" alt="dashboard">
                </div>
                <div class="col-lg-6 features-text text-right wow fadeInRight">
                    <h2>More Detail About Editing: </h2>
                    <p>Want to streamline your meal planning? Our user-friendly account editing system makes it a breeze!
                        With a few simple clicks, you can access and manage your ingredient list.
                        Our system allows you to easily update your list,
                        ensuring you always have the right ingredients for delicious and stress-free cooking.</p>
                    <a href="editAcc.php" class="btn btn-success btn-sm demo2">Edit Your Account Here!</a>
                </div>
            </div>
        </div>
    </section>

    <section class="scanIng">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="navy-line"></div>
                    <h1>SCAN INGREDIENTS FROM PRODUCT.</h1>
                    <p>The scan ingredients feature enables users to scan photos of food items.</p>
                </div>
            </div>
            <div class="row features-block">
                <div class="col-lg-6 features-text text-left wow fadeInLeft">
                    <h2>More Detail About Scanning: </h2>
                    <p>The scan ingredients feature enables users to scan photos of food items,
                        which are then matched against their personal ingredient lists.
                        This feature generates an output indicating
                        whether the food item is safe for consumption based on the user's dietary restrictions or allergies.</p>
                    <a href="scanIng.php" class="btn btn-success btn-sm demo2">Scan Ingredients Here</a>
                </div>
                <div class="col-lg-6 text-right m-t-n-lg wow zoomIn">
                    <img src="img/landing/Scan.png" class="img-responsive" alt="dashboard">
                </div>
            </div>
        </div>
    </section>

    <section id="About Us" class="gray-section contact">
        <div class="container">
            <div class="row m-b-lg">
                <div class="col-lg-12 text-center">
                    <div class="navy-line"></div>
                    <h1>About Us</h1>
                    <p>Made by Informatics Engineering Student For Software Engineering Practicum.</p>
                </div>
            </div>
            <div class="row m-b-lg">
                <div class="col-lg-12 col-lg-offset-3">
                    <address>
                        <strong><span class="navy">Project Software Engineering Prac, Inc.</span></strong><br />
                        Laudza Atsila/220605110144<br />
                        San Francisco, CA 94107<br />
                        San Francisco, CA 94107<br />
                    </address>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <a href="https://informatika.uin-malang.ac.id/" class="btn btn-primary">Our Campus Site</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center m-t-lg m-b-lg">
                    <p><strong>Prak RPL &copy; 2024 </strong></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
    <script src="js/plugins/wow/wow.min.js"></script>


    <script>
        $(document).ready(function() {

            $('body').scrollspy({
                target: '.navbar-fixed-top',
                offset: 80
            });

            // Page scrolling feature
            $('a.page-scroll').bind('click', function(event) {
                var link = $(this);
                $('html, body').stop().animate({
                    scrollTop: $(link.attr('href')).offset().top - 50
                }, 500);
                event.preventDefault();
                $("#navbar").collapse('hide');
            });
        });

        var cbpAnimatedHeader = (function() {
            var docElem = document.documentElement,
                header = document.querySelector('.navbar-default'),
                didScroll = false,
                changeHeaderOn = 200;

            function init() {
                window.addEventListener('scroll', function(event) {
                    if (!didScroll) {
                        didScroll = true;
                        setTimeout(scrollPage, 250);
                    }
                }, false);
            }

            function scrollPage() {
                var sy = scrollY();
                if (sy >= changeHeaderOn) {
                    $(header).addClass('navbar-scroll')
                } else {
                    $(header).removeClass('navbar-scroll')
                }
                didScroll = false;
            }

            function scrollY() {
                return window.pageYOffset || docElem.scrollTop;
            }
            init();

        })();

        // Activate WOW.js plugin for animation on scrol
        new WOW().init();
    </script>

</body>

</html>