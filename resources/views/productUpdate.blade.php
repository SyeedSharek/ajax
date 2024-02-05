<!-- Modal -->

<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">

    <form action="" method="POST" id="updateProductForm">
        @csrf
        <input type="hidden" id="up_id">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body my-2">

                    <div class="errMsgContainer mb-3">

                    </div>

                    <div class="form-group">
                        <label for="">Product Name</label>
                        <input type="text" class="form-control" name="name" id="up_name">
                    </div>

                    <div class="form-group">
                        <label for="">Product Price</label>
                        <input type="text" class="form-control" name="price" id="up_price">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary update_product">Update Product</button>
                </div>
            </div>
        </div>
    </form>
</div>
