    {{-- &&&&&&&&&&&&&&&&&&&&&&&&&&&& Creat &&&&&&&&&&&&&&&&&&&&&&&&&&&& --}}

    @include('alerts.createALert')
    <!-- Modal -->
    <div class="modal fade" id="userModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addUserForm" action="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name">
                            <span class="text-danger error-text name_error"></span>
                        </div>
                        <div class="form-group">
                            <label for="name">Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                            <span class="text-danger error-text password_error"></span>
                        </div>
                        <div class="form-group">
                            <label for="name">Email</label>
                            <input type="email" class="form-control" name="email" id="email">
                            <span class="text-danger error-text email_error"></span>
                        </div>
                        <div class="form-group">
                            <label for="email">Select Image</label>
                            <input type="file" class="form-control-file" name="image" id="image">
                            <span class="text-danger error-text image_error"></span>                        </div>
                        <button type="button" class="btn btn-success" id="addForm">Add</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
