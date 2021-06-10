@extends('admin.dashboard')
@section('content')

    {{-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&  Show &&&&&&&&&&&&&&&&&&&&&&&&&&&&&& --}}
    <div class="card">
        <div class="card-header">
            Category
            {{-- @role('admin') --}}
            <a class="btn btn-success" data-toggle="modal" data-target="#categoryModel">Add
                New</a>
            {{-- @endrole --}}
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
                            <td id="store_image"><img src="{{ asset('images/category/' . $category->image) }}" width="120"
                                    height="120"></td>

                            <td>
                                {{-- @role('admin') --}}
                                <a href="javascript:void(0)" id="editUser" class="btn btn-info" data-toggle="modal"
                                    data-target="#categoryEditModel" onclick="editCategory({{ $category->id }})">Edit</a>
                                    <a href="javascript:void(0)"  class="btn btn-danger" onclick="deleteCategory({{ $category->id }})">Delete</a>
                                {{-- @endrole --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

     @extends('admin.category.create')
     @extends('admin.category.update')

@endsection
