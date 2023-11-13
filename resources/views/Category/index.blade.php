<!dOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
     <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <title>Category</title>
</head>

<body>

    <div class="container my-4">
        <div class="row">
            <div class="col-8">
                <h1 class="my-3">Category List</h1>

                <div style="display:flex;justify-content:end">
                    <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add</a>

                </div><br>
                <a href="{{ route('product.index') }}" class="btn btn-primary">Product</a>




                <table class="table my-3">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Is Active</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $key => $category)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $category->title }}</td>
                                <td>
                                    @if ($category->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">InActive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="" class="btn btn-secondary edit_category" data-bs-toggle="modal"
                                        data-bs-target="#updateModal" data-id="{{ $category->id }}">Edit</a>
                                    <a href="" class="btn btn-danger delete_category"
                                        data-id="{{ $category->id }}">Delete</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>




            </div>
        </div>
    </div>



    @include('Category.addModal')
    @include('Category.updatemodal')
    @include('Category.CategoryAjax')
    {!! Toastr::message() !!}
</body>

</html>
