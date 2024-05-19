<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TPB-Your Blogs</title>
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
        @if($blogs -> isNotEmpty())
        <h1 class="text-center mt-3">Your Blog Posts</h1>
        <table class="table text-white">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Content</th>
                </tr>
            </thead>
            <tbody>
                @foreach($blogs as $blog)
                <tr>
                    <td style="width: 30%;"><img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" style="max-width: 150px;"></td>
                    <td style="width: 10%;" class="py-4">{{ $blog->title }}</td>
                    <td style="width: 60%;" class="py-4">{{ $blog->content }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p class="fs-2 text-center mb-5 mt-5 text-danger border border-danger">No Blog Found</p>
        @endif

    </div>
    @include("layouts.footer")