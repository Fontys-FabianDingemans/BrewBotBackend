@extends('layouts.app')

@section('content')
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="check2" viewBox="0 0 16 16">
            <path
                d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
        </symbol>
        <symbol id="circle-half" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
        </symbol>
        <symbol id="moon-stars-fill" viewBox="0 0 16 16">
            <path
                d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
            <path
                d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
        </symbol>
        <symbol id="sun-fill" viewBox="0 0 16 16">
            <path
                d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
        </symbol>
    </svg>

    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
        <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center"
                id="bd-theme"
                type="button"
                aria-expanded="false"
                data-bs-toggle="dropdown"
                aria-label="Toggle theme (auto)">
            <svg class="bi my-1 theme-icon-active" width="1em" height="1em">
                <use href="#circle-half"></use>
            </svg>
            <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light"
                        aria-pressed="false">
                    <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                        <use href="#sun-fill"></use>
                    </svg>
                    Light
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark"
                        aria-pressed="false">
                    <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                        <use href="#moon-stars-fill"></use>
                    </svg>
                    Dark
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto"
                        aria-pressed="true">
                    <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                        <use href="#circle-half"></use>
                    </svg>
                    Auto
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
        </ul>
    </div>

    <nav class="navbar navbar-expand-md bg-dark sticky-top border-bottom" data-bs-theme="dark">
        <div class="container">
            <div class="dropdown mt-3">
                <button class="btn btn-secondary dropdown-toggle navbar-toggler" type="button" data-bs-toggle="dropdown"
                        data-bs-target="#offcanvas"
                        aria-controls="#offcanvas" aria-label="Toggle navigation"><i class="fa fa-bars"></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="./">Home</a></li>
                    <li><a class="dropdown-item" href="">Download</a></li>
                    <li><a class="dropdown-item" href="#">Rent</a></li>
                    <li><a class="dropdown-item" href="#">Information</a></li>
                    <li><a class="dropdown-item" href="#">Support</a></li>
                </ul>
            </div>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="#offcanvas" aria-labelledby="#offcanvasLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="#offcanvasLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav flex-grow-1 justify-content-between">
                        <li class="nav-item"><a class="nav-link" href="./">
                                <img class="bi" width="24" height="24" src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/logo_round.png') }}" alt="Logo BrewBot">
                            </a></li>
                        <li class="nav-item"><a class="nav-link" href="./download">Download</a></li>
                        <li class="nav-item"><a class="nav-link" href="./rent">Rent</a></li>
                        <li class="nav-item"><a class="nav-link" href="./info">Information</a></li>
                        <li class="nav-item"><a class="nav-link" href=./support>Support</a></li>
                        </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <main>
        <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-body-tertiary">
            <div class="col-md-6 p-lg-5 mx-auto my-5">
                <h1 class="display-3 fw-bold">Download Now</h1>
                <h3 class="fw-normal text-muted mb-3">Download our official Brew Bot app now!</h3>
            </div>
            <div class="product-device shadow-sm d-none d-md-block"><img class="bi" width="50" height="50" src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/logoBrewbot.png')}}" alt="BrewBot"></div>
            <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
        </div>

        <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
            <div class="bg-body-tertiary me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                <div class="my-3 p-3">
                    <h2 class="display-5">Download the App</h2>
                    <p class="lead">Download the app to use the Brew Bot.</p>
                </div>
                <div class="bg-body shadow-sm mx-auto" style="width: 40%; height: 300px; border-radius: 21px 21px 0 0; float: left;
      display: flex; justify-content: center; align-items: center;"><img
                        src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/qrcode1.png') }}"
                        style="width:100%;"></div>
                <div class="bg-body shadow-sm mx-auto" style="width: 40%; height: 300px; border-radius: 21px 21px 0 0; float: right;
      display: flex; justify-content: center; align-items: center;"><img
                        src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/download_android.png') }}"
                        style="width:100%;"></div>
            </div>
            <div class="bg-body-tertiary me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                <div class="my-3 py-3">
                    <h2 class="display-5">Requirements</h2>
                    <p class="lead">View the requirements for your device</p>
                </div>
                <div class="bg-body shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;
        display:grid; align-items: center; justify-content: center;">
                    <p class="lead" style="margin-left: auto; margin-right: auto; width: auto;">Minimum Requirements</p>
                    <ul style="margin-left: auto; margin-right: auto; width: auto;">
                        <li><b>OS:</b> Android 13 or higher.</li>
                        <li><b>Storage:</b> 0,5 GB available.</li>
                        <li><b>Access:</b> Camera access.</li>
                        <li><b>Internet</b> is necessary. </li>
                    </ul>
                    <p style="margin-left: auto; margin-right: auto; width: auto;">To learn more about these
                        requirements,<br> visit the Help Center</p></div>
            </div>
        </div>
    </main>

    <footer class="container py-5">
        <div class="row">
            <div class="col-12 col-md">
                <small class="d-block mb-3 text-body-secondary">&copy; Brew Bot 2023</small>
            </div>
            <div class="col-6 col-md">
                <h5>Download</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="link-secondary text-decoration-none" href="#">App Download</a></li>
                    <li><a class="link-secondary text-decoration-none" href="#">Requirements</a></li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>Rent</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="link-secondary text-decoration-none" href="#">Rent Brew Bot</a></li>
                    <li><a class="link-secondary text-decoration-none" href="#">Terms of Service</a></li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>Information</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="link-secondary text-decoration-none" href="#">General</a></li>
                    <li><a class="link-secondary text-decoration-none" href="#">How it works</a></li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>Support</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="link-secondary text-decoration-none" href="#">Contact Us</a></li>
                    <li><a class="link-secondary text-decoration-none" href="#">Use our form</a></li>
                </ul>
            </div>
        </div>
    </footer>
@endsection
