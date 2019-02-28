<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Design System for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>SOOCHOOL</title>
    <!-- Favicon -->
    <link href="{{ asset('assets/argon/img/brand/favicon.png') }}" rel="icon" type="image/png">
    <!-- Fonts -->
    {{--<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">--}}
    <!-- Icons -->
    <link href="{{ asset('assets/argon/vendor/nucleo/css/nucleo.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/argon/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="{{ asset('assets/argon/css/argon.css') }}?v=1.0.1" rel="stylesheet">
    <!-- Docs CSS -->
    <link type="text/css" href="{{ asset('assets/argon/css/docs.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>



<header class="header-global">
    <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light headroom">
        <div class="container">
            <a class="navbar-brand mr-lg-5" href="../index.html">
                <img src="{{ asset('assets/argon/img/brand/white.png') }}">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbar_global">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="../index.html">
                                <img src="{{ asset('assets/argon/img/brand/blue.png') }}">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" data-toggle="dropdown" href="#" role="button">
                            <i class="ni ni-ui-04 d-lg-none"></i>
                            <span class="nav-link-inner--text">Espaces</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-xl">
                            <div class="dropdown-menu-inner">
                                <a href="https://demos.creative-tim.com/argon-design-system/docs/getting-started/overview.html" class="media d-flex align-items-center">
                                    <div class="icon icon-shape bg-gradient-primary rounded-circle text-white">
                                        <i class="ni ni-spaceship"></i>
                                    </div>
                                    <div class="media-body ml-3">
                                        <h6 class="heading text-primary mb-md-1">Getting started</h6>
                                        <p class="description d-none d-md-inline-block mb-0">Learn how to use Argon compiling Scss, change brand colors and more.</p>
                                    </div>
                                </a>
                                <a href="https://demos.creative-tim.com/argon-design-system/docs/foundation/colors.html" class="media d-flex align-items-center">
                                    <div class="icon icon-shape bg-gradient-success rounded-circle text-white">
                                        <i class="ni ni-palette"></i>
                                    </div>
                                    <div class="media-body ml-3">
                                        <h6 class="heading text-primary mb-md-1">Foundation</h6>
                                        <p class="description d-none d-md-inline-block mb-0">Learn more about colors, typography, icons and the grid system we used for Argon.</p>
                                    </div>
                                </a>
                                <a href="https://demos.creative-tim.com/argon-design-system/docs/components/alerts.html" class="media d-flex align-items-center">
                                    <div class="icon icon-shape bg-gradient-warning rounded-circle text-white">
                                        <i class="ni ni-ui-04"></i>
                                    </div>
                                    <div class="media-body ml-3">
                                        <h5 class="heading text-warning mb-md-1">Components</h5>
                                        <p class="description d-none d-md-inline-block mb-0">Browse our 50 beautiful handcrafted components offered in the Free version.</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" data-toggle="dropdown" href="#" role="button">
                            <i class="ni ni-collection d-lg-none"></i>
                            <span class="nav-link-inner--text">Menu</span>
                        </a>
                        <div class="dropdown-menu">
                            <a href="../examples/landing.html" class="dropdown-item">Nouveautés</a>
                            <a href="../examples/profile.html" class="dropdown-item">Tarifs</a>
                            <a href="../examples/login.html" class="dropdown-item">Démo</a>
                            <a href="../examples/register.html" class="dropdown-item">Assistant-Tutoriel</a>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav align-items-lg-center ml-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="https://www.facebook.com/creativetim" target="_blank" data-toggle="tooltip" title="Like us on Facebook">
                            <i class="fa fa-facebook-square"></i>
                            <span class="nav-link-inner--text d-lg-none">Facebook</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="https://www.instagram.com/creativetimofficial" target="_blank" data-toggle="tooltip" title="Follow us on Instagram">
                            <i class="fa fa-instagram"></i>
                            <span class="nav-link-inner--text d-lg-none">Instagram</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="https://twitter.com/creativetim" target="_blank" data-toggle="tooltip" title="Follow us on Twitter">
                            <i class="fa fa-twitter-square"></i>
                            <span class="nav-link-inner--text d-lg-none">Twitter</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="https://github.com/creativetimofficial/argon-design-system" target="_blank" data-toggle="tooltip" title="Star us on Github">
                            <i class="fa fa-github"></i>
                            <span class="nav-link-inner--text d-lg-none">Github</span>
                        </a>
                    </li>
                    <li class="nav-item d-none d-lg-block ml-lg-4">
                        <a href="https://www.creative-tim.com/product/argon-design-system" target="_blank" class="btn btn-neutral btn-icon">
                <span class="btn-inner--icon">
                  <i class="fa fa-cloud-download mr-2"></i>
                </span>
                            <span class="nav-link-inner--text">Contactez-nous</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<main>
    @yield("main")
</main>

<footer class="footer has-cards">
    @yield("footer")
    <div class="container">
        <div class="row row-grid align-items-center my-md">
            <div class="col-lg-6">
                <h3 class="text-primary font-weight-light mb-2">Merci pour votre soutient </h3>
                <h4 class="mb-0 font-weight-light">Suivez nous sur les réseaux sociaux.</h4>
            </div>
            <div class="col-lg-6 text-lg-center btn-wrapper">
                <a target="_blank" href="https://twitter.com/creativetim" class="btn btn-neutral btn-icon-only btn-twitter btn-round btn-lg" data-toggle="tooltip" data-original-title="Follow us">
                    <i class="fa fa-twitter"></i>
                </a>
                <a target="_blank" href="https://www.facebook.com/creativetim" class="btn btn-neutral btn-icon-only btn-facebook btn-round btn-lg" data-toggle="tooltip" data-original-title="Like us">
                    <i class="fa fa-facebook-square"></i>
                </a>
                <a target="_blank" href="https://dribbble.com/creativetim" class="btn btn-neutral btn-icon-only btn-dribbble btn-lg btn-round" data-toggle="tooltip" data-original-title="Follow us">
                    <i class="fa fa-dribbble"></i>
                </a>
                <a target="_blank" href="https://github.com/creativetimofficial" class="btn btn-neutral btn-icon-only btn-github btn-round btn-lg" data-toggle="tooltip" data-original-title="Star on Github">
                    <i class="fa fa-github"></i>
                </a>
            </div>
        </div>
        <hr>
        <div class="row align-items-center justify-content-md-between">
            <div class="col-md-6">
                <div class="copyright">
                    &copy; 2019
                    <a href="https://www.creative-tim.com" target="_blank">SAFARTECH Product</a>.
                </div>
            </div>
            <div class="col-md-6">
                <ul class="nav nav-footer justify-content-end">
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Safartech</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://github.com/creativetimofficial/argon-design-system/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>



<!-- Core -->
<script src="{{ asset('assets/argon/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/argon/vendor/popper/popper.min.js') }}"></script>
<script src="{{ asset('assets/argon/vendor/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/argon/vendor/headroom/headroom.min.js') }}"></script>
<!-- Optional JS -->
<script src="{{ asset('assets/argon/vendor/onscreen/onscreen.min.js') }}"></script>
<script src="{{ asset('assets/argon/vendor/nouislider/js/nouislider.min.js') }}"></script>
<script src="{{ asset('assets/argon/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<!-- Argon JS -->
<script src="{{ asset('assets/argon/js/argon.js') }}?v=1.0.1"></script>

<script>
    $('.carousel').carousel({
        interval: 4000
    })
</script>
</body>
</html>