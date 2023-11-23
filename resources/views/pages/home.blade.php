@extends('layouts.app')

@section('content')
    <nav class="navbar navbar-expand-lg fixed-top bg-dark navbar-dark" id="mainNav">
        <div class="container"><img
                src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/logonaamorange2.png') }}" width="230"
                height="42"><a class="navbar-brand" href="#page-top"></a>
            <button data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                    class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarResponsive"
                    aria-expanded="false" aria-label="Toggle navigation" style="background: rgb(228,148,4);"><i
                    class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto text-uppercase">
                    <li class="nav-item"><a class="nav-link" data-bs-target="#downloadprompt" data-bs-toggle="modal">Download</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#services">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#rent">Rent</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="masthead"
            style="opacity: 1;filter: blur(0px);background: url('{{ \Illuminate\Support\Facades\Vite::asset('resources/images/OIG.sp.jpg') }}');background-size: cover;">
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in"><span style="text-shadow: -1px 1px 6px var(--bs-emphasis-color);">Welcome To BrewBot!</span>
                </div>
                <div class="intro-heading text-uppercase"><span
                        style="font-size: 54px;text-shadow: -1px 1px 7px var(--bs-emphasis-color);">YOUR ultimate tap event!</span>
                </div>
                <button class="btn btn-primary btn-xl text-uppercase" type="button"
                        style="background: #e49404;border-width: 2.8px;border-color: #e49404;"
                        data-bs-target="#downloadprompt" data-bs-toggle="modal">Download the app
                </button>
            </div>
        </div>
    </header>
    <section id="services">
        <section class="py-4 py-xl-5">
            <div class="container h-100">
                <div class="row h-100">
                    <div
                        class="col-md-10 col-xl-8 text-center d-flex d-sm-flex d-md-flex justify-content-center align-items-center mx-auto justify-content-md-start align-items-md-center justify-content-xl-center">
                        <div>
                            <h2 class="text-uppercase fw-bold mb-3">what is BREWBOT?</h2>
                            <p class="mb-4"><br>The Brewbot is a smart beer tap that automatically taps beer for you,
                                using our app.&nbsp; You only have to put down your glass and press 'tap'.&nbsp; Your
                                student&nbsp;associations can rent this for your beer activities to introduce students
                                to the new smart equipment of our generation in a fun way.<br><br></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4"><span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x text-primary"
                                                                      style="color: rgb(228,148,4);"></i><i
                            class="fa fa-money fa-stack-1x fa-inverse"></i></span>
                    <h4 class="section-heading">Budget</h4>
                    <p class="text-muted">Our Brewbot can save your student association money because fewer staff are
                        needed to tap beer for your students.&nbsp;This saved money can be used for other super fun
                        activities.</p>
                </div>
                <div class="col-md-4"><span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x text-primary"
                                                                      style="color: #e49404;border-color: #e49404;"></i><i
                            class="fa fa-mobile-phone fa-stack-1x fa-inverse"></i></span>
                    <h4 class="section-heading">Mobile App</h4>
                    <p class="text-muted">It is no problem for students to use an app. After all, they are part of the
                        mobile generation.</p>
                </div>
                <div class="col-md-4"><span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x text-primary"
                                                                      style="color: rgb(228,148,4);border-color: rgb(228,148,4);"></i><i
                            class="fa fa-beer fa-stack-1x fa-inverse"></i></span>
                    <h4 class="section-heading">Awereness</h4>
                    <p class="text-muted">Research shows that <strong>17%</strong> of students drink alcohol
                        excessively. Therefore our app helps raise awareness of their alcohol consumption&nbsp;in the
                        'drink in moderation<strong>'</strong> campaign.</p>
                </div>
            </div>
        </div>
        <section id="rent" class="py-4 py-xl-5">
            <section class="py-4 py-xl-5">
                <div class="container">
                    <div class="text-white bg-dark border rounded border-0 p-4 p-md-5">
                        <h2 class="fw-bold text-white mb-3">Rent the Brewbot now!</h2>
                        <p class="mb-4">Elevate your student activities&nbsp; and turn your student events into
                            memorable moments where good times flow effortlessly.</p>
                        <div class="my-3"><a class="btn btn-primary btn-lg me-2" role="button" href="#contact"
                                             style="background: rgb(228,148,4);border-style: none;">Rent now</a><a
                                class="btn btn-light btn-lg" role="button" href="#contact"
                                style="position: absolute;background: #291709;border-style: none;color: rgb(255,255,255);">Contact
                                us</a></div>
                    </div>
                </div>
            </section>
        </section>
        <section class="bg-light" id="portfolio">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="text-uppercase section-heading">Portfolio</h2>
                        <h3 class="text-muted section-subheading">How did we create the Brew Bot?</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-4 portfolio-item"><a class="portfolio-link" href="index.html"
                                                                     data-bs-toggle="modal" target="_blank">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"></div>
                            </div>
                            <img class="img-fluid"
                                 src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/beerimage2.jpg') }}">
                        </a>
                        <div class="portfolio-caption">
                            <h4>Design</h4>
                            <p class="text-muted">Designing our Brew Bot</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 portfolio-item"><a class="portfolio-link" href="index.html"
                                                                     data-bs-toggle="modal" target="_blank">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"></div>
                            </div>
                            <img class="img-fluid"
                                 src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/portfolio/bImg2.png') }}">
                        </a>
                        <div class="portfolio-caption">
                            <h4>Research</h4>
                            <p class="text-muted">Collecting data</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 portfolio-item"><a class="portfolio-link" href="index.html"
                                                                     data-bs-toggle="modal" target="_blank">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"></div>
                            </div>
                            <img class="img-fluid"
                                 src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/portfolio/bImg3.png') }}">
                        </a>
                        <div class="portfolio-caption">
                            <h4>Network</h4>
                            <p class="text-muted">Set up our IT-network</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 portfolio-item"><a class="portfolio-link" href="index.html"
                                                                     data-bs-toggle="modal" target="_blank">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"></div>
                            </div>
                            <img class="img-fluid"
                                 src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/portfolio/bImg4.png') }}">
                        </a>
                        <div class="portfolio-caption">
                            <h4>App</h4>
                            <p class="text-muted">Creating the app</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 portfolio-item"><a class="portfolio-link" href="index.html"
                                                                     data-bs-toggle="modal" target="_blank">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"></div>
                            </div>
                            <img class="img-fluid"
                                 src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/portfolio/bImg5.jpg') }}">
                        </a>
                        <div class="portfolio-caption">
                            <h4>Website</h4>
                            <p class="text-muted">Creating this website</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 portfolio-item"><a class="portfolio-link" href="index.html"
                                                                     data-bs-toggle="modal" target="_blank">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"></div>
                            </div>
                            <img class="img-fluid"
                                 src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/portfolio/bImg6.jpg') }}">
                        </a>
                        <div class="portfolio-caption">
                            <h4>Brew Bot</h4>
                            <p class="text-muted">Creating the Brew Bot</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <section id="contact"
             style="background-image:url('{{ \Illuminate\Support\Facades\Vite::asset('resources/images/map-image.png') }}');">
        <div class="container">
            <div class="row">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="text-uppercase section-heading">Contact Us</h2>
                        <h3 class="text-muted section-subheading">Lorem ipsum dolor sit amet consectetur.</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <form id="contactForm" name="contactForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3"><input class="form-control" type="text" id="name"
                                                                        placeholder="Your Name *" required=""><small
                                            class="form-text text-danger flex-grow-1 lead"></small></div>
                                    <div class="form-group mb-3"><input class="form-control" type="email" id="email"
                                                                        placeholder="Your Email *" required=""><small
                                            class="form-text text-danger lead"></small></div>
                                    <div class="form-group mb-3"><input class="form-control" type="tel"
                                                                        placeholder="Your Phone *" required=""><small
                                            class="form-text text-danger lead"></small></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3"><textarea class="form-control" id="message"
                                                                           placeholder="Your Message *"
                                                                           required=""></textarea><small
                                            class="form-text text-danger lead"></small></div>
                                </div>
                                <div class="w-100"></div>
                                <div class="col-lg-12 text-center">
                                    <div id="success"></div>
                                    <button class="btn btn-primary btn-xl text-uppercase" id="sendMessageButton"
                                            type="submit" style="background: #e49404;border-style: none;">Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4"><span class="copyright">Copyright&nbsp;© Brew Bot 2023</span></div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li class="list-inline-item"><a href="#"></a></li>
                        <li class="list-inline-item"><a href="#"></a></li>
                        <li class="list-inline-item"><a href="#"></a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                        <li class="list-inline-item"><a href="#">Terms of Use</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <div class="modal fade" role="dialog" tabindex="-1" id="downloadprompt">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Download the app</h4>
                    <button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Are you sure you want to download the app?</strong></p>
                    <ul class="list-unstyled">
                        <li class="d-xl-flex">Version: 4.0</li>
                        <li>Date: 15-11-2023</li>
                        <li>Platform: Android</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-primary" role="button"
                       href="{{ route('download.app') }}"
                       style="background: #291709;border-style: none;margin: 7px;"><i class="fa fa-download"></i>&nbsp
                        Download
                    </a>
                    <button class="btn btn-primary" type="button" style="background: #291709;border-style: none;"
                            data-bs-target="#qrcode" data-bs-toggle="modal"><i class="fa fa-qrcode"></i>&nbsp;QR-Code
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="qrcode">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Scan the QR-Code to Download</h4>
                    <button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p class="my-3">Scan the QR-Code using your mobile device (camera) to download the Brewbot app.</p>
                    {!! QrCode::size(200)->generate(route('download.app')); !!}
                    <p></p>
                    <button class="btn btn-primary d-xl-flex justify-content-xl-end align-items-xl-center" type="button"
                            style="background: #291709;border-style: none;margin: 7px;" data-bs-target="#downloadprompt"
                            data-bs-toggle="modal">Go Back
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
