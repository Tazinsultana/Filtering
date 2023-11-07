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

        // For Create......
        $(document).on('click', '.add_cat', function(e) {
            e.preventDefault();
            let title = $('#title').val();
            let is_active = $('#is_active').is(":checked");

            $.ajax({
                data:"{{ route('category.insert') }}",
                method:'POST',
                data: {
                    title,
                    is_active,
                    // _token:'{{ csrf_token() }}',
                },
                success: function(res) {

                    if(res.status=='successs'){
                        $('#addmodal').modal('hide');
                        $('#add')[0].reset();
                        $('.table').load(location.href + ' .table');

                    }
                }


            })




        })

    })
</script>
