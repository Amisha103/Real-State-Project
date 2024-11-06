<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SL-Cart</title>
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
    /* --------------------cart div starts--------------------------- */
    .cart_class {
        padding-top: 86px;
        width: 100%;
    }

    /* --------------------cart div ends----------------------------- */
</style>

<body>
    <div class="cart_class text-white">
        @include('layouts.navbar')
        <div class="container">
            <h1 class="text-center mb-4 mt-4">Cart Items</h1>
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @elseif(session()->has('fail'))
                <div class="alert alert-danger">
                    {{ session()->get('fail') }}
                </div>
            @endif
            @if ($allCartItems->isNotEmpty())
                <div class="table-responsive card bg-dark p-2 rounded border mb-4 border-warning">
                    <table class="table text-white">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Details</th>
                                <th>Type</th>
                                <th>Mobile Number</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allCartItems as $item)
                                <tr>
                                    <td><img src="{{ $item->image }}" alt="" style="max-width: 200px;"></td>
                                    <td class="py-4">{{ $item->details }}</td>
                                    <td class="py-4">{{ $item->type }}</td>
                                    <td class="py-4">{{ $item->mobile_number }}</td>
                                    <td class="py-4">
                                        <!-- <div class="input-group">
                                    <input type="number" class="form-control bg-dark text-white quantity-input" value="{{ $item->quantity }}" min="1" max="3" data-id="{{ $item->id }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary update-quantity" data-id="{{ $item->id }}">Update</button>
                                    </div>
                                </div> -->
                                        <form action="{{ route('updateQuantity') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="itemId" value="{{ $item->id }}">
                                            <input type="number" name="newQuantity"
                                                class="form-control bg-dark text-white quantity-input"
                                                value="{{ $item->quantity }}" min="1" max="3">
                                            <button type="submit" class="btn btn-primary mt-2">Update</button>
                                        </form>
                                    </td>
                                    <td class="py-4">
                                        <a type="button" href="{{ URL::to('deleteCartItem/' . $item->id) }}"
                                            class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="conntainer row m-auto col-12 mb-4 justify-content-center">

                    <a href="{{ route('buy') }}"
                        class="btn btn-hover btn-primary border border-light col-3 col-sm-2 m-2">Continue Shopping</a>
                    @if (session()->has('id'))
                        <a type="button" class="btn btn-hover btn-success border border-light col-3 col-sm-2 m-2"
                            data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Confirm purchase
                        </a>
                        <a href="{{ route('clear.cart') }}"
                            class="btn btn-hover btn-danger border border-light col-3 col-sm-2 m-2">Clear All</a>
                    @endif
                </div>
            @else
                <p class="fs-2 text-center mb-5 mt-5 text-danger border border-danger ">Empty Cart</p>
            @endif
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Confirm Purchase</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to <span class="text-decoration-underline"><strong>Confirm The
                            Purchase</strong></span> ?
                </div>
                <div>
                    <a href="{{ URL::to('purchase/' . session('id')) }}"
                        class="btn btn-hover btn-success border border-light col-3 col-sm-2 m-2">Confirm</a>
                </div>
            </div>
        </div>
    </div>


    @include('layouts.footer')
