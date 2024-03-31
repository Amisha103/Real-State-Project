<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toplkapi Builders-TPB</title>
    <!-- <link href="{{ asset('css/home.css') }}" rel="stylesheet"> -->
    <!-- @push('css')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    @endpush -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* ---------------intro part------------------- */
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            overflow: auto;
            background-color: black;
        }

        a {
            text-decoration: none;
        }

        #build_buy {
            font-size: 40px;
            font-weight: 400;
            width: 100%;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .img_house {
            transition: transform 0.3s ease;
            width: 60%;
        }

        .main_div {
            position: relative;
            height: 100vh;
            background-image: url('asset/images/back.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            overflow: auto;
            animation: fadeIn 2s ease;
            padding-top: 56px;
        }

        .main_div::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            z-index: -1;
        }


        .tpb {
            text-decoration: none;
            box-sizing: border-box;
            color: black;
        }

        .img_house:hover {
            transform: scale(1.1);
        }

        /* ---------------into part ends------------------ */
        /* ------------navbar edits-------------------------- */
        .text-white.dropdown-menu.bg-transparent li a:hover {
            background-color: black;
        }

        /* .custom_act {
            border-left: 1px solid red;
        } */

        ul li:hover {
            border-left: 1px solid red;
        }

        .dropdown-menu {
            backdrop-filter: blur(18px) !important;
            background-color: rgba(10, 10, 10, 0.4) !important;
        }

        .navbar {
            background-color: rgba(10, 10, 10, 0.4);
            backdrop-filter: blur(2px);
        }

        /* ------------navbar edits ends-------------------------- */
        /* ---------------about part-------------------------------- */
        .second_div {
            height: 100vh;
            background-color: black;
        }

        .right_img_div {
            background-image: url('asset/images/second_page_back.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100%;
            width: 50%;
        }

        .custom-hover:hover {
            color: black !important;
            background-color: gray !important;
            border-color: #ffc107 !important;
        }

        /* ---------------about part ends-------------------------------- */
        /* -----------------footer parts----------------------------- */

        .footer_div {
            height: 50vh;
            background-color: #23798a;
        }

        .footer_footer_div {
            height: 8vh;
            background-color: #131720;
        }

        .logos i:hover {
            color: #001c40 !important;
            transition: all 0.2s ease-in;
        }

        @media only screen and (max-width: 600px) {
            .for_small {
                font-size: 13px;
            }
        }

        /* -----------------footer parts----------------------------- */
    </style>

</head>

<body>

    <div class="main_div">
        @include("layouts.navbar")
        <div class="container col-12 mt-3 text-light">
            <div class="d-flex justify-content-between flex-column flex-md-row mb-3 align-items-center">
                <div class="blrr col-md-4 mb-5 text-center">
                    <h2 id="build_buy" class="mt-5">BUILD AND BUY YOUR PROPERTIES WITH US</h2>
                </div>

                <div class="mt-5 col-md-8 d-flex justify-content-center justify-content-md-end">
                    <img class="col-md-6 rounded img_house" src="/asset/images/house2.jpg">
                </div>
            </div>

            <div class="d-flex justify-content-center mt-5 col-12 col-md-6 mx-auto ">
                <a class="fs-4 btn btn-hover border border-warning shadow btn-outline-dark text-light col-md-4 p-3" href="#about_us">Know about us</a>
            </div>

        </div>
    </div>

    <div id="about_us" class="container-fluid second_div col-12 text-white d-flex justify-content-center row align-items-center">
        <div class="container text col-md-6 col-sm-12 about-content">
            <div class="d-flex flex-column justify-content-between h-100">
                <div>
                    <h1 class="p-3 fs-16">About Us</h1>
                    <h2 class="p-3">Lorem ipsum dolor sit amet. Lorem ipsum dolor
                        sit amet consectetur
                        adipisicing elit.
                        Deserunt, quo ex ipsam consectetur
                        maiores modi temporibus nam ratione maxime voluptas?
                    </h2>
                    <div class="container-fluid contact">
                        <a class="btn btn-outline-warning p-3 fs-5 text-white mt-3 custom-hover" href="/hire">Hire Us</a>
                    </div>

                </div>
                <div class="d-md-none">
                    <img src="asset/images/second_page_back.jpg" class="mt-5 img-fluid" />
                </div>
            </div>
        </div>
        <div class="right_img_div col-md-6 d-md-block about-image d-none">
        </div>
    </div>

    @include("layouts.footer")