<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
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
                <input type="text" name="filter" id="filter" class="mb-3 my-3 form-control"
                    placeholder="Search Here..">


                <div class="form-check my-4">
                    {{-- @foreach ($categories as $category)  --}}
                    @foreach ($categories as $key => $category)
                        <label class="form-check-label" for="flexCheckIndeterminate">
                            <input class="form-check-input" type="checkbox" name="checkbox[]"
                                value="{{ $key }}">{{ $category }}
                        </label><br>
                    @endforeach
                </div>

                {{-- <div style="justify-content:end"> --}}
                <div style="display:flex; justify-content:flex-end;">
                    <select id="page_view" class="form-select" style="width:100px;">
                        <option selected value="">Page</option>
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                    </select>
                </div>



                <div class="table-data">


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
                        <tbody id="tbody">
                            @foreach ($products as $key => $product)
                                <tr>

                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->Price }}</td>
                                    <td>{{ $product->description }} </td>
                                    <td>{{ $product->category->title }}</td>
                                    <td>
                                        <a href="" class="btn btn-secondary product_edit" data-bs-toggle="modal"
                                            data-bs-target="#UpdateModal" data-id="{{ $product->id }}">Edit</a>
                                        <a href="" class="btn btn-danger delete_product"
                                            data-id="{{ $product->id }}">Delete</a>
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                    <div id="pagination_container" class="d-flex gap-1">
                        @for ($page = 1; $page <= $total_page; $page++)
                            <a href="" class="btn btn-sm btn-secondary pagination_item"
                                data-page="{{ $page - 1 }}">{{ $page }}</a>
                        @endfor

                    </div>

                </div>


            </div>
        </div>
    </div>

    @include('Products.productmodal')
    @include('Products.updatemodal')
    @include('Products.productajax')
    {!! Toastr::message() !!}
</body>

</html>
