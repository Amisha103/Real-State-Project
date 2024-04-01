<!-- resources/views/all.blade.php

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Data</title>
</head>

<body>
    <h1>All Data</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Image</th>
                <th>Details</th>
                <th>Address</th>
                <th>Mobile Number</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allData as $data)
            <tr>
                <td><img src="{{ $data->image }}" alt="Image"></td>
                <td>{{ $data->details }}</td>
                <td>{{ $data->address }}</td>
                <td>{{ $data->mobile_number }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html> -->


<!-- resources/views/all.blade.php -->

<!-- resources/views/all.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Properties</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
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
        /* --------------------main action----------------------------------- */

        .card {
            margin-bottom: 20px;
        }

        .quantity {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .quantity input {
            width: 40px;
            text-align: center;
        }

        .details {
            height: 150px;
            overflow: auto;
        }
        /* --------------------main action----------------------------------- */
    </style>
</head>

<body>
    <div class="all_main_div">
        <h1 class="mb-4 text-center mt-3">Lands & Flats</h1>
        <div class="row text-dark">
            @foreach ($allData as $data)
            <div class="col-md-6">
                <div class="card">
                    <img src="{{ $data->image }}" class="card-img-top">
                    <div class="card-body">
                        <div class="details">
                            <h5 class="card-title">{{ $data->details }}</h5>
                        </div>
                        <p class="card-text">Address: {{ $data->address }}</p>
                        <p class="card-text">Mobile : {{ $data->mobile_number }}</p>
                        <div class="quantity mt-3">
                            <button class="btn btn-primary btn-sm mr-2 decrement" data-id="{{ $data->id }}">-</button>
                            <input type="text" class="form-control quantity-input" value="1" readonly>
                            <button class="btn btn-primary btn-sm ml-2 increment" data-id="{{ $data->id }}">+</button>
                        </div>
                        <button class="btn btn-success btn-block mt-3 col-md-12 add-to-cart" data-id="{{ $data->id }}">Add to Cart</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.increment').on('click', function() {
                var input = $(this).prev();
                var newValue = parseInt(input.val()) + 1;
                if (newValue <= 3)
                    input.val(newValue);
            });

            $('.decrement').on('click', function() {
                var input = $(this).next();
                var newValue = parseInt(input.val()) - 1;
                if (newValue >= 1) {
                    input.val(newValue);
                }
            });

            $('.add-to-cart').on('click', function() {
                var id = $(this).data('id');
                var quantity = $(this).parent().find('.quantity-input').val();
                console.log("Product ID:", id, "Quantity:", quantity);
                // Here you can perform an AJAX request to add the product to the cart
            });
        });
    </script>
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
</body>

</html>