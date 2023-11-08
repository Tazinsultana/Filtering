<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="" method="post" id="add">
            @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Price</label>
                        <input type="text" class="form-control" id="price" name="price">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description">
                    </div>
                    {{-- <div class="mb-3">
                        <label for="exampleInputName" class="form-label">category</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div> --}}

                    <div class="mb-3">
                        <label for="product_cat" class="form-label">Select Category</label>
                        <select name=" " class="form-control" id='product_category'>
                          @foreach ($categories as $key=>$category)
                            <option value="{{ $key }}">{{ $category }}</option>

                            @endforeach
                        </select>
                        {{-- <label for="product_cat" class="form-label">Product Category</label>
                        <input type="text" class="form-control" id="product_cat" name="product_cat"> --}}
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary product_add">Save</button>
            </div>
        </div>

    </form>
    </div>
</div>
