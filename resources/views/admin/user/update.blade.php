    {{-- &&&&&&&&&&&&&&&&&&&&&&&&&&&& Update &&&&&&&&&&&&&&&&&&&&&&&&&&&& --}}

    <div class="modal fade" id="userUpdateModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update user</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="userEditForm" enctype="multipart/form-data" action="put">
                        @csrf
                        <input type="hidden" name="idUser" id="idUser">
                        <div class="form-group">
                            <label for="nameUser">Name</label>
                            <input type="text" class="form-control" name="nameUser" id="nameUser">
                            <span class="text-danger error-text name_error"></span>
                        </div>
                        <div class="form-group">
                            <label for="emailUser">Email</label>
                            <input type="email" class="form-control" name="emailUser" id="emailUser">
                            <span class="text-danger error-text email_error"></span>
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control-file" name="imageUser" id="imageUser"
                                style="opacity: 0; height:1px; display:none">
                            <a href="javascript:void(0)" class="btn btn-outline-warning " style="width:200px;"
                                id="change_picture_btn"><b>Change
                                    Picture</b></a>
                            <span id="store_image" style="width:100px ;height:100px; margin-left:100px"></span>
                        </div>
                        <span class="text-danger error-text image_error"></span>
                        <button type="submit" class="btn btn-success" id="updateUserBtn">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>