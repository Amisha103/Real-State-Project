<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TPB-Admin</title>
</head>
<style>
    body {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        background-color: black;
    }

    a {
        text-decoration: none;
        color: black;
    }

    /* ------------navbar edits-------------------------- */
    .text-white.dropdown-menu.bg-transparent li a:hover {
        background-color: black;
    }

    .custom-active-link.active {
        background-color: #6e0505;
    }

    .dropdown-menu {
        backdrop-filter: blur(18px) !important;
        background-color: rgba(10, 10, 10, 0.4) !important;
    }

    ul li:hover {
        border-left: 1px solid red;
        transition: all 0.15s ease-in;
    }

    .navbar {
        background-color: rgba(10, 10, 10, 0.4);
        backdrop-filter: blur(2px);
    }

    .blur-background {
        background-color: rgba(5, 5, 5, 0.1);
        backdrop-filter: blur(5px);
    }

    /* ------------navbar edits ends-------------------------- */
    /* -----------------footer parts----------------------------- */

    .footer_div {
        animation: fade_bottom 1s ease backwards;
        height: 50vh;
        background-color: #23798a;
    }

    @keyframes fade_bottom {
        from {
            opacity: 0;
            transform: translateY(100px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
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

    /* -----------------footer part ends----------------------------- */
    /* -----------------admin_home_div part starts-------------------------- */

    .admin_home_div {
        padding-top: 86px;
    }

    .card {
        animation: fadein 2s ease forwards
    }

    @keyframes fadein {
        30% {
            opacity: 0;
            transform: translateX(300px);
        }

        60% {
            opacity: .5;
            transform: translateX(200);
        }

        100% {
            opacity: 1;
            transform: translateX(0);
        }

    }

    /* -----------------admin_home_div part ends---------------------------- */
</style>

<body>
    <div class="admin_home_div container">
        @include('layouts.navbar')
        <h1 class="text-center mt-3 text-white">Modify what you need!</h1>
        <div class="mt-3 mb-5 row row-cols-1 row-cols-md-2 row-cols-lg-2 g-4">
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><a href="/contacts">Contact Request</a></h5>
                        <p class="card-text">Requests from potential clients to contact</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><a href="/blogs">Blogs</a></h5>
                        <p class="card-text">Articles and posts related to real estate</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><a href="/all-property-admin">All Sales</a></h5>
                        <p class="card-text">All properties currently listed for sale</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><a href="/available-sale-admin">Available Sales</a></h5>
                        <p class="card-text">Properties currently available for purchase</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><a href="/flat-sale-admin">Flat for Sale</a></h5>
                        <p class="card-text">Flats or apartments currently listed for sale</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><a href="/land-sale-admin">Land for Sale</a></h5>
                        <p class="card-text">Land parcels currently listed for sale</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><a href="/purchase-details-admin">Purchase Details</a></h5>
                        <p class="card-text">See who have purchased and contact with them.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><a href="/location-admin-home">Location Update</a></h5>
                        <p class="card-text">From here you can update your current office address</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
