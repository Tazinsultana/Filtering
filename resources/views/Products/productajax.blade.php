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
        $(document).on('click','.product_add',function(e){
            e.preventDefault();
            let name=$('#name').val();
            let price=$('#price').val();
            let description=$('#description').val();
            let category_id=$('#product_category').val();
            $.ajax({
                url:"{{ route('product.create') }}",
                method:'POST',
                data:{
                    name,
                    price,
                    description,
                    category_id
                },
                success:function(res){
                    if(res.status=='success'){
                        $('#addModal').modal('hide');
                        $('#add')[0].reset();
                        $('.table').load(location.href + ' .table');

                    }

                }


            })

        })

    })
</script>
