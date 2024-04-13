<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        color: white;
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

    /* .container {
        margin-top: 50px;
    } */

    .table {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }

    .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #dee2e6;
    }

    .table tbody+tbody {
        border-top: 2px solid #dee2e6;
    }

    /* -----------------admin_home_div part ends---------------------------- */
</style>

<body>

    <div class="admin_home_div text-white container">
        @include("layouts.navbar")
        <h1 class="text-center mt-3">Modify what you need !</h1>
        <div class="container text-white">
            <table class="table text-white">
                <thead>
                    <tr>
                        <th scope="col">Option</th>
                        <th scope="col">Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><a href="/contacts">Contact Request</a></td>
                        <td>Requests from potential clients to contact</td>
                    </tr>
                    <tr>
                        <td> <a href="/blogs">Blogs</a></td>
                        <td>Articles and posts related to real estate</td>
                    </tr>
                    <tr>
                        <td> <a href="/all-property-admin">All Sales</a></td>
                        <td>All properties currently listed for sale</td>
                    </tr>
                    <tr>
                        <td>Available Sales</td>
                        <td>Properties currently available for purchase</td>
                    </tr>
                    <tr>
                        <td>Flat for Sale</td>
                        <td>Flats or apartments currently listed for sale</td>
                    </tr>
                    <tr>
                        <td>Land for Sale</td>
                        <td>Land parcels currently listed for sale</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
    @include("layouts.footer")