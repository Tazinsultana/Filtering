<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
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
                        // $('#addModal').modal('hide');
                        // $('#add')[0].reset();
                        // $('.table').load(location.href + ' .table');
                        $('#addModal').modal('hide');
                        $('#add')[0].reset();
                        $('.table').load(location.href + ' .table');

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
                            $('.table').load(location.href + ' .table');

                        }
                    }


                })
            }
        })

        // For Edit Product......
        $(document).on('click','.product_edit',function(e){
            e.preventDefault();
            let product_id=$(this).data('id');
            $.ajax({
                url:"{{ route('product.edit') }}",
                method:'GET',
                data:{product_id},
                success:function(res){
                    console.log(res);
                    $('#update_id').val(res.data.id);
                    $('#up_name').val(res.data.name);
                    $('#up_price').val(res.data.Price);
                    $('#up_description').val(res.data.description);
                    $('#up_product_category').val(res.data.category_id);
                }
            })
        })

    })
</script>
