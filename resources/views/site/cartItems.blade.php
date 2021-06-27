<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
    @include('site.includes.style')

</head>

<body>

    @include('site.includes.header')
   
    <div class="card">
        <div class="card-header">
            My Cart
        </div>
        <div class="card-body">
            <table class="table" id="category_table">
                <thead>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($cardDB as $cart)
                        <tr id="sid{{ $cart->id }}">
                            <td>{{ $cart->quantity }}</td>
                            {{-- <td>{{ $cart->price }}</td> --}}
                            {{-- <td id="store_image"><img src="{{ asset('images/category/' . $category->image) }}" width="120"
                                    height="120"></td>
                            <td> --}}
                                <a href="javascript:void(0)" id="editUser" class="btn btn-info" data-toggle="modal"
                                    data-target="#categoryEditModel" onclick="editCategory({{ $cart->id }})">Edit</a>
                                    <a href="javascript:void(0)"  class="btn btn-danger" onclick="deleteCategory({{ $cart->id }})">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            
        </div>
    </div>

    @include('site.includes.script')

</body>

</html>
