<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Location</title>
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Location</h1>
        @if (session()->has('success'))
            <div class="alert alert-success">
                <p>{{ session()->get('success') }}</p>
            </div>
        @elseif(session()->has('fail'))
            <div class="alert alert-danger">
                <p>{{ session()->get('fail') }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">Admin ID</th>
                    <th class="text-center">Latitude</th>
                    <th class="text-center">Longitude</th>
                    <th class="text-center">Update time</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($locations as $location)
                    <tr>
                        <td class="text-center">{{ $location->admin_id }}</td>
                        <td class="text-center">{{ $location->latitude }}</td>
                        <td class="text-center">{{ $location->longitude }}</td>
                        <td class="text-center">{{ $location->updated_at }}</td>
                        <td class="text-center">
                            <a type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#updateModal{{ $location->id }}">
                                Update
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="updateModal{{ $location->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Location Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="{{ route('locations.update', $location->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="latitude{{ $location->id }}">Latitude:</label>
                            <input type="text" class="text-dark form-control mb-4" id="latitude{{ $location->id }}"
                                name="latitude" value="{{ $location->latitude }}" required>
                        </div>
                        <div class="form-group">
                            <label for="longitude{{ $location->id }}">Longitude:</label>
                            <input type="text" class="text-dark form-control mb-4" id="longitude{{ $location->id }}"
                                name="longitude" value="{{ $location->longitude }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3 fs-5">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
