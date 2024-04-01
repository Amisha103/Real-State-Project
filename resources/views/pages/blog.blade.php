<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User's Blogs</title>
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
    /* ------------------blog div start------------------------- */

    .main_blog_class {
        position: relative;
        width: 100%;
        background-image: url('asset/images/blog_back.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        overflow: auto;
        padding-top: 9rem;
    }

    .blog_class {
        text-align: center;
        color: white;
    }

    .card_div {
        height: 2 rem;
        width: 2 rem;
    }

    .card_content_div {
        background-color: rgba(20, 20, 20, 0.6);
        border: 1px solid #909692;
        border-radius: 4px;
        backdrop-filter: blur(1px);
    }

    .card_anim {
        animation: fadecome 2s ease-in-out;
    }

    @keyframes fadecome {

        from {
            opacity: 0;
            transform: translateX(400px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }

    }


    /* ------------------blog div ends------------------------- */
</style>

<body>

    <div class="container-fluid main_blog_class">

        @include("layouts.navbar")

        <!-- <div class="container-fluid">
            <h1 class="text-center text-light">Users Blogs</h1>
            <div class="container blog_class">
                <div class="row">
                    @foreach($blogs as $blog)
                    <div class="col-md-6 mb-4">
                        <div class="card card_div bg-transparent mt-5" style="margin:auto; width: 600px; height: 300px; overflow: auto;">

                            <div style="display: flex; justify-content: center; align-items: center;">
                                <img src="{{$blog->image}}" style="width: 90%; height: 90%;" class="card-img-top">
                            </div>
                            <div class="card-body bg-warning m-1 rounded border border-1-danger">
                                <h5 class="card-title">{{ $blog->title }}</h5>
                                <p class="card-text col-8 m-auto">{{ $blog->content }}</p>
                                @if ($blog->created_at)
                                <p class="card-text"><small class="text-muted">Posted on {{ $blog->created_at->format('F j, Y \a\t h:i A') }}</small></p>
                                @else
                                <p class="card-text"><small class="text-muted">No creation date available</small></p>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div> -->
        <h1 class="text-center text-light">User's Blogs</h1>
        <div class="container blog_class">
            <div class="row">
                @foreach($blogs as $blog)
                <div class="container card_anim card_content_div col-md-6 mb-4">
                    <div class="card card_div bg-transparent mt-5">
                        <div style="display: flex; justify-content: center; align-items: center;">
                            <img src="{{$blog->image}}" style="width: 70%; height: 70%;" class="card-img-top">
                        </div>
                        <div class="card-body card_content_div m-1">
                            <h5 class="card-title fs-3">{{ $blog->title }}</h5>
                            <p class="card-text fs-5">{{ $blog->content }}</p>
                            @if ($blog->created_at)
                            <p class="card-text text-dark"><small>Posted on {{ $blog->created_at->format('F j, Y \a\t h:i A') }}</small></p>
                            @else
                            <p class="card-text"><small>No creation date available</small></p>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>


    </div>

    @include("layouts.footer")