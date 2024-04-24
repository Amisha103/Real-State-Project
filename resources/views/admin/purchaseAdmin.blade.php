<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container justify-content-center col-12">
        <h1 class="mt-5 mb-5 text-center">Purchase Details</h1>
        @if($purchaseData -> isNotEmpty())

        @if(session() -> has('success'))
        <div class="alert alert-success">
            <p>{{session() -> get('success')}}</p>
        </div>
        @endif
        
        <table class="table table-hover text-dark">
            <thead>
                <tr>
                    <th class="text-center">Name</th>
                    <th class="text-center">Order Email</th>
                    <th class="text-center">Product ID</th>
                    <th class="text-center">Customer ID</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Confirmed at</th>
                    <th class="text-center"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($purchaseData as $purchase)

                @php
                $user = \App\Models\User::find($purchase->customerId);
                @endphp

                <tr>
                    <td class="text-center">{{ $user->fullname }}</td>
                    <td class="text-center">{{ $user->email }}</td>
                    <td class="text-center">{{ $purchase->productId }}</td>
                    <td class="text-center">{{ $purchase->customerId }}</td>
                    <td class="text-center">{{ $purchase->quantity }}</td>
                    <td class="text-center">{{ $purchase->created_at }}</td>
                    <td class="text-center"><a type="button" href="{{ URL::to('deleted-purchase-from-admin/' . $purchase->id) }}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</body>

</html>