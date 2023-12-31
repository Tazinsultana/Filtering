<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script>
    $(document).ready(function() {

        // alert();
        // For Create & Index......
        $(document).on('click', '.product_add', function(e) {
            e.preventDefault();
            let name = $('#name').val();
            let price = $('#price').val();
            let description = $('#description').val();
            let category_id = $('#product_category').val();
            $.ajax({
                url: "{{ route('product.create') }}",
                method: 'POST',
                data: {
                    name,
                    price,
                    description,
                    category_id
                },
                success: function(res) {
                    if (res.status == 'success') {
                        $('#addModal').modal('hide');
                        $('#add')[0].reset();

                        // $('.table').load(location.href + ' .table');
                        filtering();
                        Command: toastr["success"]("Product Added Succefully!", "Success")

                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }


                    }

                }

            })

        })

        // For Delete.....

        $(document).on('click', '.delete_product', function(e) {
            e.preventDefault();
            let product_id = $(this).data('id');
            if (confirm('Are you sure to delete product??')) {

                $.ajax({
                    url: "{{ route('product.delete') }}",
                    method: 'DELETE',
                    data: {
                        product_id
                    },
                    success: function(res) {
                        if (res.status == 'success') {

                            // $('.table').load(location.href + ' .table');
                            filtering();
                            Command: toastr["success"]("Product Delete Successfully!",
                                "Success")

                            toastr.options = {
                                "closeButton": true,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": true,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "5000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            }

                        }

                    }



                })
            }
        })

        // For Edit Product......
        $(document).on('click', '.product_edit', function(e) {
            e.preventDefault();
            let product_id = $(this).data('id');
            $.ajax({
                url: "{{ route('product.edit') }}",
                method: 'GET',
                data: {
                    product_id
                },
                success: function(res) {
                    console.log(res);
                    $('#update_id').val(res.data.id);
                    $('#up_name').val(res.data.name);
                    $('#up_price').val(res.data.Price);
                    $('#up_description').val(res.data.description);
                    $('#up_product_category').val(res.data.category_id);

                }

            })
        })

        // For Update....
        $(document).on('click', '.product_update', function(e) {
            e.preventDefault();
            let product_id = $('#update_id').val();
            let name = $('#up_name').val();
            let price = $('#up_price').val();
            let description = $('#up_description').val();
            let category_id = $('#up_product_category').val();
            $.ajax({
                url: "{{ route('product.update') }}",
                method: 'PUT',
                data: {
                    product_id,
                    name,
                    price,
                    description,
                    category_id,

                },
                success: function(res) {
                    if (res.status == 'success') {
                        $('#UpdateModal').modal('hide');
                        $('#update')[0].reset();
                        filtering();
                        // $('.table').load(location.href + ' .table');
                        Command: toastr["success"]("Product Updated Successfully!",
                            "Success")

                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        // $('.table').load(location.href + ' .table');
                    }
                }

            })

        })

        // For Filtering......


        function filtering(page = 0) {

            let filtering = $('#filter').val();
            let page_view=$('#page_view').val();
            // let category=$('#product_category').val();

            let categoriesObj = $('input[name="checkbox[]"]');
            let category = [];
            // const page = $(this).data('page');

            $.each(categoriesObj, function(key, item) {
                // console.log(item);
                if ($(item).is(':checked')) {
                    const category_id = $(item).val();
                    // console.log(category_id);

                    category.push(category_id);
                }
                // console.log(category_id);
            })
            // console.log(category);

            $.ajax({
                url: "{{ route('product.filter') }}",
                method: "GET",
                data: {
                    filtering,
                    category,
                    page,
                    page_view,
                },
                success: function(res) {
                    // console.log(res);
                    const search = res.data;

                    // console.log(search);
                    let r_search = '';
                    $.each(search, function(key, item) {
                        r_search += `
            <tr>
                    <th >${key+1}</th>
                    <td>${item.name}</td>
                    <td>${item.Price}</td>
                    <td>${item.description}</td>
                    <td>${item.category.title}</td>

                    <td>
                        <a href=""class="btn btn-success product_edit" data-bs-toggle="modal"
                            data-bs-target="#UpdateModal" data-id="${item.id}">Edit</a>

                        <a href="" class="btn btn-danger delete_product" data-id="${item.id}">Delete</a>
                    </td>
                </tr>`


                    })

                    $('#tbody').html(r_search);

                    // For Pagination....

                    let pagination = '';
                    for (let page = 1; page <= res.total_page; page++) {
                        pagination += `
                        <a href="" class="btn btn-sm btn-secondary pagination_item"
                                data-page="${page-1}">${page}</a>`;
                    }
                    $('#pagination_container').html(pagination);
                    // console.log(pagination);

                }

            })
        }

        $(document).on('keyup', '#filter', function(e) {
            e.preventDefault();
            filtering();

        });


        $(document).on('change', 'input[name="checkbox[]"]', function(e) {
            e.preventDefault();
            filtering();


        });

        $(document).on('click', '.pagination_item', function(e) {
            e.preventDefault();
            const page = $(this).data('page');
            filtering(page);
        })

        $(document).on('change','#page_view',function(e){
            e.preventDefault();

            // console.log(page_view);
            filtering();
        })
    })
</script>
