<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'Customer Dashboard')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon & CSS assets -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/icons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/icons/favicon-16x16.png') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/icons/favicon.ico') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendor/line-awesome/line-awesome/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/magnific-popup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/jquery.countdown.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/skins/skin-demo-13.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/demos/demo-13.css') }}">

    @stack('styles')
</head>
<body>
    <div class="page-wrapper">
        <header class="header header-10 header-intro-clearance">
            <!-- your header content remains here -->
            <div class="header-top">
                <div class="container">
                    <div class="header-left">
                        <a href="tel:#"><i class="icon-phone"></i> Call: +0123 456 789</a>
                    </div>
                    <div class="header-right">
                        <ul class="top-menu">
                            <li>
                                <a href="#">Links</a>
                                <ul>
                                    <li>
                                        <div class="header-dropdown">
                                            <a href="#">USD</a>
                                            <div class="header-menu">
                                                <ul>
                                                    <li><a href="#">Eur</a></li>
                                                    <li><a href="#">Usd</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="header-dropdown">
                                            <a href="#">English</a>
                                            <div class="header-menu">
                                                <ul>
                                                    <li><a href="#">English</a></li>
                                                    <li><a href="#">French</a></li>
                                                    <li><a href="#">Spanish</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="header-dropdown">
                                            <a href="#">{{ Auth::guard('customer')->user()->name }}</a>
                                            <div class="header-menu">
                                                <ul>
                                                    <li><a href="{{ route('customer_panel.dashboard') }}">Dashboard</a></li>
                                                    <li>
                                                        <form method="POST" action="{{ route('customer.logout') }}">
                                                            @csrf
                                                            <button type="submit" class="dropdown-item">Logout</button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="header-middle">
                <div class="container">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>
                        <a href="{{ url('/') }}" class="logo">
                            <img src="{{ asset('assets/images/demos/demo-13/logo.png') }}"
                                 alt="Logo" width="105" height="25">
                        </a>
                    </div>
                    <div class="header-center">
                        <div class="header-search header-search-extended header-search-visible header-search-no-radius d-none d-lg-block">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                            <form action="#" method="get">
                                <div class="header-search-wrapper search-wrapper-wide">
                                    <label for="q" class="sr-only">Search</label>
                                    <input type="search" class="form-control" name="q" id="q" placeholder="Search product ..." required>
                                    <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="header-right">
                        <div class="header-dropdown-link">
                            <div class="dropdown compare-dropdown">
                                <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-random"></i>
                                    <span class="compare-txt">Compare</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="compare-products">
                                        <li class="compare-product">
                                            <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                        </li>
                                        <li class="compare-product">
                                            <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="compare-actions">
                                        <a href="#" class="action-link">Clear All</a>
                                        <a href="#" class="btn btn-outline-primary-2">
                                            <span>Compare</span><i class="icon-long-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="header-bottom sticky-header">
                <div class="container">
                    <nav class="main-nav">
                        <ul class="menu sf-arrows">
                            <li class="megamenu-container active">
                                <a href="{{ url('/') }}" class="nav-item nav-link active">Home</a>
                            </li>
                            <li>
                                <a href="{{ route('customer_panel.order.index') }}" class="nav-item nav-link">Orders</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

        </header>

        <main class="main">
            @yield('content')
        </main>

        {{-- Footer section, overrideable --}}
        @section('footer')
        <footer class="site-footer">
            <div class="footer-middle border-0">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="widget widget-about">
                                <img src="{{ asset('assets/images/demos/demo-13/logo-footer.png') }}"
                                     class="footer-logo" alt="Footer Logo" width="105" height="25">
                                <p>Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat.</p>
                                <div class="widget-about-info">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-4">
                                            <span class="widget-about-title">Got Question? Call us 24/7</span>
                                            <a href="tel:123456789">+0123 456 789</a>
                                        </div>
                                        <div class="col-sm-6 col-md-8">
                                            <span class="widget-about-title">Payment Method</span>
                                            <figure class="footer-payments">
                                                <img src="{{ asset('assets/images/payments.png') }}"
                                                     alt="Payment methods" width="272" height="20">
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- col -->
                        <div class="col-sm-4 col-lg-2">
                            <div class="widget">
                                <h4 class="widget-title">Information</h4>
                                <ul class="widget-list">
                                    <li><a href="about.html">About Molla</a></li>
                                    <li><a href="#">How to shop on Molla</a></li>
                                    <li><a href="faq.html">FAQ</a></li>
                                    <li><a href="contact.html">Contact us</a></li>
                                    <li><a href="login.html">Log in</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-4 col-lg-2">
                            <div class="widget">
                                <h4 class="widget-title">Customer Service</h4>
                                <ul class="widget-list">
                                    <li><a href="#">Payment Methods</a></li>
                                    <li><a href="#">Money-back guarantee!</a></li>
                                    <li><a href="#">Returns</a></li>
                                    <li><a href="#">Shipping</a></li>
                                    <li><a href="#">Terms & Conditions</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-4 col-lg-2">
                            <div class="widget">
                                <h4 class="widget-title">My Account</h4>
                                <ul class="widget-list">
                                    <li><a href="#">Sign In</a></li>
                                    <li><a href="cart.html">View Cart</a></li>
                                    <li><a href="#">My Wishlist</a></li>
                                    <li><a href="#">Track My Order</a></li>
                                    <li><a href="#">Help</a></li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- row -->
                </div><!-- container -->
            </div><!-- footer-middle -->
            <div class="footer-bottom">
                <div class="container">
                    <p class="footer-copyright">Copyright © {{ date('Y') }} Molla Store. All Rights Reserved.</p>
                    <ul class="footer-menu">
                        <li><a href="#">Terms Of Use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                    <div class="social-icons social-icons-color">
                        <span class="social-label">Social Media</span>
                        <a href="#" class="social-icon social-facebook" title="Facebook"><i class="icon-facebook-f"></i></a>
                        <a href="#" class="social-icon social-twitter" title="Twitter"><i class="icon-twitter"></i></a>
                        <a href="#" class="social-icon social-instagram" title="Instagram"><i class="icon-instagram"></i></a>
                        <a href="#" class="social-icon social-youtube" title="YouTube"><i class="icon-youtube"></i></a>
                        <a href="#" class="social-icon social-pinterest" title="Pinterest"><i class="icon-pinterest"></i></a>
                    </div>
                </div>
            </div><!-- footer-bottom -->
        </footer>
        @show

    </div><!-- .page-wrapper -->

    @stack('scripts')
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
