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

        // For Create......
        $(document).on('click', '.add_cat', function(e) {
            e.preventDefault();
            let title = $('#title').val();
            let is_active = $('#is_active').is(":checked");

            $.ajax({
                url: "{{ route('category.insert') }}",
                method: 'POST',
                data: {
                    title,
                    is_active,
                    // _token:'{{ csrf_token() }}',
                },

                success: function(res) {

                    if (res.status == 'success') {
                        $('#add')[0].reset();
                        // $('.table').load(location.href + ' .table');
                        $('.table').load(location.href + ' .table');
                        Command: toastr["success"]("Category Added Successfully!",
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
                        // $('#addModal').modal('hide');


                    }
                }


            })

        })

        // For Delete......
        $(document).on('click', '.delete_category', function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            if (confirm('Are you sure to delte list??')) {

                $.ajax({
                    url: "{{ route('category.delete') }}",
                    method: 'DELETE',
                    data: {
                        id
                    },
                    success: function(res) {
                        if (res.status == 'success') {
                            $('.table').load(location.href + ' .table');
                            Command: toastr["success"]("Category Deleted Successfully!",
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

        // for edit.....
        $(document).on('click', '.edit_category', function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            $.ajax({
                url: "{{ route('category.edit') }}",
                method: 'GET',
                data: {
                    id
                },
                success: function(res) {
                    console.log(res);
                    $('#up_id').val(res.data.id);
                    $('#up_title').val(res.data.title);
                    if (res.data.is_active) {
                        $('#up_is_active').prop('checked', true);
                    } else {
                        $('#up_is_active').prop('checked', false);
                    }



                }

            })
        })

        // For Update.....
        $(document).on('click', '.up_cat', function(e) {
            e.preventDefault();
            let id = $('#up_id').val();
            let title = $('#up_title').val();
            let is_active = $('#up_is_active').is(":checked");
            $.ajax({
                url: "{{ route('category.update') }}",
                method: 'PUT',
                data: {
                    id,
                    title,
                    is_active
                },
                success: function(res) {
                    if (res.status == 'success') {
                        $('#updateModal').modal('hide');
                        $('#update')[0].reset();
                        $('.table').load(location.href + ' .table');
                        Command: toastr["success"]("Category Updated Successfully!",
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

        })




    })
</script>
