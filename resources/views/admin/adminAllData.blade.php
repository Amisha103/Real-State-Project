<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Data</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>All Data</h1>
        @if(session()->has('success'))
        <div class="alert alert-success">
            <p>{{session()->get('success')}}</p>
        </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Owner Name</th>
                    <th>Type</th>
                    <th>Details</th>
                    <th>Address</th>
                    <th>Mobile Number</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($allData as $data)
                <!-- <tr>
                    <td><img src="{{ $data->image }}" style="width: 15%;" alt=""></td>
                    <td>{{ $data->owner_name }}</td>
                    <td>{{ $data->type }}</td>
                    <td>{{ $data->details }}</td>
                    <td>{{ $data->address }}</td>
                    <td>{{ $data->mobile_number }}</td>
                    <td>
                        <a href="" class="btn btn-primary">Edit</a>
                        <form action="" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr> -->
                <tr>
                    <td style="width: 20%;"><img src="{{ $data->image }}" style="width: 45%;" alt=""></td>
                    <td style="width: 9%;">{{ $data->owner_name }}</td>
                    <td style="width: 5%;">{{ $data->type }}</td>
                    <td style="width: 10%;">{{ $data->details }}</td>
                    <td style="width: 25%;">{{ $data->address }}</td>
                    <td style="width: 10%;">{{ $data->mobile_number }}</td>
                    <td style="width: 10%;">
                        <a href="" class="btn btn-primary">Edit</a>
                        <form method="POST">
                            @csrf
                            <a type="button" href="{{ URL::to('delete/'.$data->id) }}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                        </form>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
        <a href="" class="btn btn-success">Add Data</a>
    </div>
</body>

</html>