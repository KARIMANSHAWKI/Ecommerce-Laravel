    {{-- &&&&&&&&&&&&&&&&&&&&&&&&&&&& Creat &&&&&&&&&&&&&&&&&&&&&&&&&&&& --}}

    <div class="modal fade" id="productModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addProductForm" action="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name">
                            <span class="text-danger error-text name_error"></span>
                        </div>
                        <div class="form-group">
                            <label for="desc">Description</label>
                            <input type="text" class="form-control" name="desc" id="desc">
                            <span class="text-danger error-text descrption_error"></span>

                        </div>
                        <div class="form-group">
                            <label for="pceri">Price</label>
                            <input type="price" class="form-control" name="price" id="price">
                            <span class="text-danger error-text pricr_error"></span>
                        </div>
                        <div class="form-group">
                            <label for="category">Categiry Id</label>
                            <input type="text" class="form-control" name="category" id="category">
                            <span class="text-danger error-text category_id_error"></span>

                        </div>
                        <div class="form-group">
                            <label for="image">Select Image</label>
                            <input type="file" class="form-control-file" name="image" id="image">
                            <span class="text-danger error-text image_error"></span>
                        </div>
                        <button type="button" class="btn btn-success" id="createForm">Add</button>

                    </form>
                </div>
            </div>
        </div>
    </div>