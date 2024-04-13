<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Blogs</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles */
        .blog-content {
            font-size: 16px;
            /* Increase content size */
        }

        @media (max-width: 768px) {
            .img-thumbnail {
                max-width: 100px;
                /* Adjust image size for mobile */
            }
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1>All Blogs</h1>
        @if(session()->has('success'))
        <div class="alert alert-danger">
            <p>{{session()->get('success')}}</p>
        </div>
        @endif
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($blogs as $blog)
                    <tr>
                        <td style="width: 30%;"><img src="{{ $blog->image }}" style="width: 20%;"></td>
                        <td style="width: 10%;">{{ $blog->title }}</td>
                        <td style="width: 50%;" class="blog-content" style="width: 60%; white-space: normal; word-wrap: break-word;">{{ $blog->content }}</td>
                        <td style="width: 10%;">
                            <form action="" method="POST">
                                @csrf
                                <a type="button" href="{{ URL::to('blogs/'.$blog->id) }}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>