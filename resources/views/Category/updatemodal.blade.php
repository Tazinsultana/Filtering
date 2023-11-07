<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action=" " method="put" id="update">
            @csrf
            <input type="hidden" id="up_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Category title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="exampleInputName" class="form-label">Title</label>
                            <input type="text" class="form-control" id="up_title" name="up_title">
                        </div>

                        <div class="mb-3 form-check">
                            <label class="form-check-label" for="is_active">Check me out</label>
                            <input type="checkbox" class="form-check-input" id="up_is_active" name="up_is_active">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary up_cat">Update</button>
                </div>
            </div>

        </form>
    </div>
</div>
