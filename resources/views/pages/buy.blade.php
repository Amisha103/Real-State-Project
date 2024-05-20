<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: black;
            background-image: url('asset/images/buy_back.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            overflow: auto;
        }

        a {
            text-decoration: none;
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
        /* --------------------buy div starts-------------------------------- */
        .buy_div {
            margin-top: 120px;
            color: white;
        }

        tr {
            cursor: pointer;
        }

        .table tr:hover {
            color: #8da6f0;
        }

        .bg-transparent {
            backdrop-filter: blur(7px);
        }

        .show_option {
            animation: fade 2s ease-in;
        }

        @keyframes fade {

            from {
                opacity: 0;
                transform: translateX(100px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }

        }

        /* --------------------buy div ends-------------------------------- */
    </style>
</head>


<body>

    <div class="container">
        @include("layouts.navbar")
        <div class="container col-md-12 col-sm-8 buy_div">
            <div class="row mb-4">
                <div class="col-md-3 bg-transparent shadow border rounded" style="height: 400px;">
                    <div class="container">
                        <table class="table table-border shadow mt-3 fs-5 text-light shadow">
                            <tbody>
                                <tr data-option="all">
                                    <td class="d-flex justify-content-between align-items-center">
                                        <span>All</span>
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </td>
                                </tr>
                                <tr data-option="available_sales">
                                    <td class="d-flex justify-content-between align-items-center">
                                        <span>Available sales</span>
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </td>
                                </tr>
                                <tr data-option="flat_for_sale">
                                    <td class="d-flex justify-content-between align-items-center">
                                        <span>Flat for sale</span>
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </td>
                                </tr>
                                <tr data-option="land_for_sale">
                                    <td class="d-flex justify-content-between align-items-center">
                                        <span>Land for sale</span>
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="container col-md-9 show_option">

                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('tr[data-option]').on('click', function() {
                var option = $(this).data('option');
                $.ajax({
                    url: "{{ route('getOption') }}",
                    type: "GET",
                    data: {
                        option: option
                    },
                    success: function(response) {
                        $('.show_option').html(response);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>

    @include("layouts.footer")