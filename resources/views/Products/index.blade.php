<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Product</title>
</head>

<body>

    <div class="container my-4">
        <div class="row">
            <div class="col-8">
                <h1 class="my-3">Product List</h1>

                <div style="display:flex;justify-content:end">
                    <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add</a>

                </div><br>
                <a href="{{ route('category.index') }}" class="btn btn-primary">Back</a>
                <div class="table">

                    <table class="table table-hover my-3">
                        <table class="table my-3">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key=> $product)
                                <tr>



                                    <th scope="row">{{ $key+1 }}</th>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->Price }}</td>
                                    <td>{{ $product->description }} </td>
                                    <td>{{ $product->category->title }}</td>
                                    <td>
                                        <a href="" class="btn btn-secondary">Edit</a>
                                        <a href="" class="btn btn-danger">Delete</a>
                                    </td>

                                </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </table>
                </div>


            </div>
        </div>
    </div>







    @include('Products.productmodal')
    @include('Products.updatemodal')
    @include('Products.productajax')

</body>

</html>
