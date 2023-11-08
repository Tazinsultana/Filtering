<!-- Modal -->
<div class="modal fade" id="UpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="" method="put" id="update">
            @csrf
            <input type="hidden" id="update_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="up_name" name="up_name">
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="up_price" name="up_price">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="up_description" name="up_description">
                    </div>


                    <div class="mb-3">
                        <label for="product_cat" class="form-label">Select Category</label>
                        <select name=" " class="form-control" id='up_product_category'>
                            @foreach ($categories as $key => $category)
                                <option value="{{ $key }}">{{ $category }}</option>
                            @endforeach
                        </select>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary product_update">Update</button>
                </div>
            </div>

        </form>
    </div>
</div>
