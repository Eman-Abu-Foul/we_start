<!-- /*
* Template Name: Tour
* Template Author: Untree.co
* Tempalte URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="{{ asset('front/favicon.png') }}">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Source+Serif+Pro:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
<style>
    .imgtour{
        height: 700px;
        max-width: 550px;
        margin: 0 auto;
    }
</style>
    <title>Tour Free Bootstrap Template for Travel Agency by Untree.co</title>
</head>

<body>


<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
            <span class="icofont-close js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>

<nav class="site-nav">
    <div class="container">
        <div class="site-navigation">
            <a href="" class="logo m-0">Tour <span class="text-primary">.</span></a>

            <ul class="js-clone-nav d-none d-lg-inline-block text-left site-menu float-right">
                <li class="active"><a href="">Home</a></li>
                <li class="has-children">
                    <a href="#">Dropdown</a>
                    <ul class="dropdown">
                        <li class="active"><a href="">Elements</a></li>
                        <li><a href="#">Menu One</a></li>
                        <li class="has-children">
                            <a href="#">Menu Two</a>
                            <ul class="dropdown">
                                <li><a href="#">Sub Menu One</a></li>
                                <li><a href="#">Sub Menu Two</a></li>
                                <li><a href="#">Sub Menu Three</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Menu Three</a></li>
                    </ul>
                </li>
                <li><a href="">Services</a></li>
                <li><a href="">About</a></li>
                <li><a href="">Contact Us</a></li>
            </ul>

            <a href="#" class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block d-lg-none light" data-toggle="collapse" data-target="#main-navbar">
                <span></span>
            </a>

        </div>
    </div>
</nav>


<div class="hero hero-inner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mx-auto text-center">
                <div class="intro-wrap">
                    <h1 class="mb-0">Elements</h1>
                    <p class="text-white">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="untree_co-section">
    <div class="container my-5">
        <div class="mb-5">
            <div class="owl-single dots-absolute owl-carousel">
                <img width="1000" height="700px" src="{{ asset('uploads/'.$chalet->image->path) }}" alt="Free HTML Template by Untree.co" class="imgtour img-fluid">
                </div>
        </div>
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success')}}
            </div>
        @endif
        @if(Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error')}}
            </div>
        @endif
{{--        src="{{ asset('uploads/'.$chalet->image->path) }}--}}
        <div class="row justify-content-center">

            <div class="col-lg-4">
                <div class="custom-block" data-aos="fade-up">
                    <div class="media-1">
                            <span class="d-flex align-items-center loc mb-2">
							<span class="icon-room mr-3"></span>
							<span>{{ $chalet->address }}</span>
						</span>
                            <div class="d-flex align-items-center">
                                <div>
                                    <h3><a>{{ $chalet->name }}</a></h3>
                                    <div class="price ml-auto">
                                        <span>Price : ${{ $chalet->price }}</span>

                                    </div>
                                </div>

                            </div>

                        </div>


                </div> <!-- END .custom-block -->
                <div class="custom-block" data-aos="fade-up">
                    <h2 class="section-title">Gallery</h2>
                    <div class="row gutter-v2 gallery">
                        <div class="col-4">
                            <a href="" class="gal-item" data-fancybox="gal"><img src="{{ asset('front/images/gal_1.jpg') }}" alt="Image" class="img-fluid"></a>
                        </div>
                        <div class="col-4">
                            <a href="" class="gal-item" data-fancybox="gal"><img src="{{ asset('front/images/gal_2.jpg') }}" alt="Image" class="img-fluid"></a>
                        </div>
                        <div class="col-4">
                            <a href="" class="gal-item" data-fancybox="gal"><img src="{{ asset('front/images/gal_3.jpg') }}" alt="Image" class="img-fluid"></a>
                        </div>
                        <div class="col-4">
                            <a href="" class="gal-item" data-fancybox="gal"><img src="{{ asset('front/images/gal_4.jpg') }}" alt="Image" class="img-fluid"></a>
                        </div>
                        <div class="col-4">
                            <a href="" class="gal-item" data-fancybox="gal"><img src="{{ asset('front/images/gal_5.jpg') }}" alt="Image" class="img-fluid"></a>
                        </div>
                        <div class="col-4">
                            <a href="" class="gal-item" data-fancybox="gal"><img src="{{ asset('front/images/gal_6.jpg') }}" alt="Image" class="img-fluid"></a>
                        </div>
                    </div>
                </div> <!-- END .custom-block -->

                <div class="custom-block" data-aos="fade-up">
                    <h2 class="section-title">Video</h2>

                    <a href="https://vimeo.com/342333493" data-fancybox class="video-wrap">
                        <span class="play-wrap"><span class="icon-play"></span></span>
                        <img src="{{ asset('front/images/bg_1.jpg') }}" alt="Image" class="img-fluid rounded">
                    </a>
                </div> <!-- END .custom-block -->
            </div>
            <div class="col-lg-4">
                <div class="custom-block" data-aos="fade-up" data-aos-delay="100">
                    <h2 class="section-title">Form</h2>
                    <form class="contact-form bg-white" action="{{ route('admin.appointments.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="price_total" value="{{ $chalet->price }}">
                        <input type="hidden" value="{{ $chalet->id }}" class="form-control" name="chalet_id">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="text-black" for="user_name">User Name</label>
                                    <input type="text" class="form-control" id="user_name" name="user_name">
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="text-black" for="user_email">Email address</label>
                            <input type="email" class="form-control" name="user_email" id="user_email" aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label class="text-black" for="user_phone">Phone</label>
                            <input type="text" class="form-control" id="user_phone" name="user_phone">
                        </div>
                        <div class="form-group">
                            <label class="text-black" for="date">Date Appointment</label>
                            <input type="date" class="form-control" id="date" name="date">
                        </div>
                        <button class="btn btn-primary"  type="submit">Book now</button>
                    </form>
                </div>

                <div class="custom-block" data-aos="fade-up">
                    <h2 class="section-title">Social Icons</h2>
                    <ul class="list-unstyled social-icons light">
                        <li><a href="#"><span class="icon-facebook"></span></a></li>
                        <li><a href="#"><span class="icon-twitter"></span></a></li>
                        <li><a href="#"><span class="icon-linkedin"></span></a></li>
                        <li><a href="#"><span class="icon-google"></span></a></li>
                        <li><a href="#"><span class="icon-play"></span></a></li>
                    </ul>
                </div> <!-- END .custom-block -->

                <div class="custom-block" data-aos="fade-up" data-aos-delay="100">
                    <div class="text-center">
                        <h2 class="section-title text-center">Slider</h2>
                    </div>
                    <div class="owl-single owl-carousel no-nav">
                        <div class="testimonial mx-auto">
                            <figure class="img-wrap">
                                <img src="{{ asset('front/images/person_2.jpg') }}" alt="Image" class="img-fluid">
                            </figure>
                            <h3 class="name">Adam Aderson</h3>
                            <blockquote>
                                <p>&ldquo;There live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
                            </blockquote>
                        </div>

                        <div class="testimonial mx-auto">
                            <figure class="img-wrap">
                                <img src="{{ asset('front/images/person_3.jpg') }}" alt="Image" class="img-fluid">
                            </figure>
                            <h3 class="name">Lukas Devlin</h3>
                            <blockquote>
                                <p>&ldquo;There live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
                            </blockquote>
                        </div>

                        <div class="testimonial mx-auto">
                            <figure class="img-wrap">
                                <img src="{{ asset('front/images/person_4.jpg') }}" alt="Image" class="img-fluid">
                            </figure>
                            <h3 class="name">Kayla Bryant</h3>
                            <blockquote>
                                <p>&ldquo;There live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
                            </blockquote>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <div class="row justify-content-center mt-5 section">

            <div class="col-lg-10">
                <div class="row mb-5">
                    <div class="col text-center">
                        <h2 class="section-title text-center">Our Team</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 mb-4">
                        <div class="team">
                            <img src="{{ asset('front/images/person_1.jpg') }}" alt="Image" class="img-fluid mb-4">
                            <div class="px-3">
                                <h3 class="mb-0">James Watson</h3>
                                <p>Co-Founder &amp; CEO</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 mb-4">
                        <div class="team">
                            <img src="{{ asset('front/images/person_2.jpg') }}" alt="Image" class="img-fluid mb-4">
                            <div class="px-3">
                                <h3 class="mb-0">Carl Anderson</h3>
                                <p>Co-Founder &amp; CEO</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 mb-4">
                        <div class="team">
                            <img src="{{ asset('front/images/person_4.jpg') }}" alt="Image" class="img-fluid mb-4">
                            <div class="px-3">
                                <h3 class="mb-0">Michelle Allison</h3>
                                <p>Co-Founder &amp; CEO</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 mb-4">
                        <div class="team">
                            <img src="{{ asset('front/images/person_3.jpg') }}" alt="Image" class="img-fluid mb-4">
                            <div class="px-3">
                                <h3 class="mb-0">Drew Wood</h3>
                                <p>Co-Founder &amp; CEO</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<div class="py-5 cta-section">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <h2 class="mb-2 text-white">Lets you Explore the Best. Contact Us Now</h2>
                <p class="mb-4 lead text-white text-white-opacity">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, fugit?</p>
                <p class="mb-0"><a href="" class="btn btn-outline-white text-white btn-md font-weight-bold">Get in touch</a></p>
            </div>
        </div>
    </div>
</div>

<div class="site-footer">
    <div class="inner first">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="widget">
                        <h3 class="heading">About Tour</h3>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    </div>
                    <div class="widget">
                        <ul class="list-unstyled social">
                            <li><a href="#"><span class="icon-twitter"></span></a></li>
                            <li><a href="#"><span class="icon-instagram"></span></a></li>
                            <li><a href="#"><span class="icon-facebook"></span></a></li>
                            <li><a href="#"><span class="icon-linkedin"></span></a></li>
                            <li><a href="#"><span class="icon-dribbble"></span></a></li>
                            <li><a href="#"><span class="icon-pinterest"></span></a></li>
                            <li><a href="#"><span class="icon-apple"></span></a></li>
                            <li><a href="#"><span class="icon-google"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2 pl-lg-5">
                    <div class="widget">
                        <h3 class="heading">Pages</h3>
                        <ul class="links list-unstyled">
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2">
                    <div class="widget">
                        <h3 class="heading">Resources</h3>
                        <ul class="links list-unstyled">
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="widget">
                        <h3 class="heading">Contact</h3>
                        <ul class="list-unstyled quick-info links">
                            <li class="email"><a href="#">mail@example.com</a></li>
                            <li class="phone"><a href="#">+1 222 212 3819</a></li>
                            <li class="address"><a href="#">43 Raymouth Rd. Baltemoer, London 3910</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="inner dark">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-8 mb-3 mb-md-0 mx-auto">
                    <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with love by <a href="https://untree.co" class="link-highlight">Untree.co</a> <!-- License information: https://untree.co/license/ -->Distributed By <a href="https://themewagon.com" target="_blank" >ThemeWagon</a>
                    </p>
                </div>

            </div>
        </div>
    </div>
</div>

<div id="overlayer"></div>
<div class="loader">
    <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>

<script src="{{ asset('front/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('front/js/popper.min.js') }}"></script>
<script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('front/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('front/js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ asset('front/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('front/js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('front/js/aos.js') }}"></script>
<script src="{{ asset('front/js/moment.min.js') }}"></script>
<script src="{{ asset('front/js/daterangepicker.js') }}"></script>

<script src="{{ asset('front/js/typed.js') }}"></script>

<script src="{{ asset('front/js/custom.js') }}"></script>

</body>

</html>

