@extends('admin.dashboard')
@section('content')

    {{-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&  Show &&&&&&&&&&&&&&&&&&&&&&&&&&&&&& --}}
    <div class="card">
        <div class="card-header">
            Product
            {{-- @role('admin') --}}
            <a class="btn btn-success" data-toggle="modal" data-target="#productModel">Add
                New</a>
            {{-- @endrole --}}
        </div>
        <div class="card-body">
            <table class="table" id="product_table">
                <thead>
                    <th>id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr id="sid{{ $product->id }}">
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->descriptin }}</td>
                            <td>{{ $product->price }}</td>
                            <td id="store_image"><img src="{{ asset('images/product/' . $product->image) }}" width="120"
                                    height="120"></td>

                            <td>
                                {{-- @role('admin') --}}
                                <a href="javascript:void(0)" id="editUser" class="btn btn-info" data-toggle="modal"
                                    data-target="#categoryEditModel" onclick="editCategory({{ $product->id }})">Edit</a>
                                    <a href="javascript:void(0)"  class="btn btn-danger" onclick="deleteProduct({{ $product->id }})">Delete</a>
                                {{-- @endrole --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

     @extends('admin.product.create')

@endsection
