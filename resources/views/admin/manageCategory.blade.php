@extends('admin.dashboard')
@section('content')

    {{-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&  Show &&&&&&&&&&&&&&&&&&&&&&&&&&&&&& --}}
    <div class="card">
        <div class="card-header">
            Category
            @role('admin')
            <a class="btn btn-success" data-toggle="modal" data-target="#categoryModel">Add
                New</a>
            @endrole
        </div>
        <div class="card-body">
            <table class="table" id="category_table">
                <thead>
                    <th>id</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr id="sid{{ $category->id }}">
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->image }}</td>
                            <td class="uploaded_image"></td>
                            <td>
                                @role('admin')
                                <a href="javascript:void(0)" class="btn btn-info" data-toggle="modal"
                                    data-target="#categoryEditForm" onclick="editCategory({{ $category->id }})">Edit</a>
                                @endrole
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- &&&&&&&&&&&&&&&&&&&&&&&&&&&& Creat &&&&&&&&&&&&&&&&&&&&&&&&&&&& --}}

    <!-- Modal -->
    <div class="modal fade" id="categoryModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="category" action="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Select Image</label>
                            <input type="file" class="form-control-file" name="image" id="image">
                        </div>
                        <button type="button" class="btn btn-success" id="create">Add</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- &&&&&&&&&&&&&&&&&&&&&&&&&&&& Update &&&&&&&&&&&&&&&&&&&&&&&&&&&& --}}

    <!-- Modal -->
    <div class="modal fade" id="categoryEditForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="categoryEditForm">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name2">
                        </div>
                        <div class="form-group">
                            <label for="email">Image</label>
                            <input type="file" class="form-control-file" name="image" id="image2">
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



