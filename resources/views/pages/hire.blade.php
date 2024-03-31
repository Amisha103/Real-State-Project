<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Hire Us</title>
    <style>
        /* ------------navbar edits-------------------------- */
        .text-white.dropdown-menu.bg-transparent li a:hover {
            background-color: black;
        }

        .dropdown-menu {
            backdrop-filter: blur(18px) !important;
            background-color: rgba(10, 10, 10, 0.4) !important;
        }

        /* .custom_act {
            border-left: 1px solid red;
        } */

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
        /* -------------------form div----------------------------- */
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: black;
        }

        a {
            text-decoration: none;
        }

        .form_div {
            position: relative;
            height: 100vh;
            width: 100%;
            background-image: url("asset/images/hire_back1.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            overflow: auto;
            animation: fadeIn 2s ease;
            padding-top: 86px;
        }

        .submit_button {
            margin-top: 6px !important;
            padding-top: 16px;
            font-size: 18px;
            padding-bottom: 16px;
            padding-right: 16px;
            padding-left: 16px;
            background-color: transparent;
            color: white;
        }

        .submit_button:hover {
            border-radius: 8px;
            background-color: white;
            color: black;
        }

        /* Animation for form_div */
        .form_div {
            animation: fadeInUp 1.5s ease forwards;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(-200px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .forms input,
        .forms textarea,
        .forms .submit_button {
            transition: all 0.3s ease-in;
        }

        .forms input:focus,
        .forms textarea:focus,
        .forms .submit_button:hover {
            border-color: #ffc107;
            box-shadow: 0 0 10px rgba(255, 193, 7, 0.5);
        }

        .forms {
            animation: fade_right 1.5s ease backwards;
        }

        @keyframes fade_right {
            from {
                opacity: 0;
                transform: translateX(200px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .forms .form-text {
            transition: opacity 0.3s ease;
        }

        .forms textarea:focus+.form-text {
            opacity: 1;
        }

        /* -------------------form div ends----------------------------- */
    </style>
</head>

<body>
    <div class="form_div">

        @include("layouts.navbar")

        <div class="container-fluid">
            <div>
                <p class="fs-1 col-12 text-white d-flex justify-content-center">Get In Touch</p>
            </div>
            <div>
                <p class="fs-6 col-12 text-white d-flex justify-content-center">[Leave a message, we will contact you.]</p>
            </div>
        </div>

        <div class="container forms">
            <form>
                <div class="mb-3 col-md-12">
                    <label for="name" class="form-label text-light">Your Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter your name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label text-light">Your Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label text-light">Message (Maximum 100 words)</label>
                    <textarea class="form-control" id="message" rows="5" maxlength="250" placeholder="Enter your message" required></textarea>
                    <small class="form-text text-muted">Words left: <span id="wordCount">100</span></small>
                </div>
            </form>
            <div class="submit_button_div d-flex justify-content-center">
                <a class="border border-warning submit_button col-3 text-center">Submit</a>
            </div>
        </div>
    </div>

    @include("layouts.footer")