<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TPB-Blog Post</title>
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
    /* -----------------post div part starts-------------------------- */
    .pots_div {
        padding-top: 86px;
    }

    /* -----------------post div part ends---------------------------- */
</style>

<body>

    <div class="pots_div text-white container">
        @include("layouts.navbar")
        <h1 class="text-center mt-3">Post Your Experience </h1>
        @if(session()->has('success'))
        <div class="alert alert-success">
            <p>{{session()->get('success')}}</p>
        </div>
        @elseif(session()->has('fail'))
        <div class="alert alert-danger">
            <p>{{session()->get('fail')}}</p>
        </div>
        @endif
        <div class="form_div container mb-4">
            <form action="{{URL::to('PostBlog')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="text-white bg-dark form-control mb-4" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" class="form-control-file mb-4" id="image" name="image" required>
                </div>
                <div class="form-group">
                    <label for="content">Content:</label>
                    <textarea class="bg-dark text-white form-control" id="content" name="content" rows="6" required></textarea>
                </div>
                <button type="submit" name="PostBlog" class="btn btn-primary mt-3 fs-5">Post</button>
            </form>
        </div>
    </div>
    @include("layouts.footer")