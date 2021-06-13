@extends('admin.dashboard')
@section('content')

    {{-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&  Show &&&&&&&&&&&&&&&&&&&&&&&&&&&&&& --}}
    <div class="card">
        <div class="card-header">
            user
            {{-- @role('admin') --}}
            <a class="btn btn-success" id="addUser" data-toggle="modal" data-target="#userModel">Add
                New</a>
            {{-- @endrole --}}
        </div>
        <div class="card-body">
            <table class="table" id="user_table">
                <thead>
                    <th>id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Phones</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr id="sid{{ $user->id }}">
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td><img src="{{ asset('images/user/' . $user->image) }}" style="border-radius: 50%"
                                    width="100" height="100"></td>
                            <td>
                                {{-- @if (!empty($user->phone))
                        <tr>
                            {{-- @foreach ($user->phones->pluck['phone'] as $phone)
                                {{ $phone }} <br>
                            @endforeach --}}
                        {{-- </tr> --}}
                    {{-- @endif --}} --}}
                    </td>
                    <td>
                        <a href="javascript:void(0)" id="editUser" class="btn btn-info" data-toggle="modal"
                            data-target="#userUpdateModel" onclick="editUser({{ $user->id }})">Edit</a>
                        <a href="javascript:void(0)" id="editUser" class="btn btn-danger" onclick="deleteUser({{$user->id}})">Delete</a>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div>
        @extends('admin.user.create')
    </div>
    <div>
        @extends('admin.user.update')
    </div>

@endsection
