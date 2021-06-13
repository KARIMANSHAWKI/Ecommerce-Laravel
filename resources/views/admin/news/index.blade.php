@extends('admin.dashboard')
@section('content')
    {{-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&  Show &&&&&&&&&&&&&&&&&&&&&&&&&&&&&& --}}
    <div class="card">
        <div class="card-header">
            News
            {{-- @role('admin') --}}
            <a class="btn btn-success" href="{{ route('news.create') }}">Add
                New</a>
            {{-- @endrole --}}
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                    {{ $message }}
            </div>
        @endif
        <div class="card-body">
            <table class="table" id="category_table">
                <thead>
                    <th>id</th>
                    <th>Title : Ar</th>
                    <th>Titile : En</th>
                    <th>Description</th>
                    <th>Image</th>

                </thead>
                <tbody>
                    @foreach ($news as $bitOfNews)
                        <tr>
                            <td>{{ $bitOfNews->id }}</td>
                            <td>{{ $bitOfNews->title_ar }}</td>
                            <td>{{ $bitOfNews->title_en }}</td>
                            <td>{{ $bitOfNews->description }}</td>
                            <td><img src="{{ asset('images/news/' . $bitOfNews->image) }}" width="150" height="150"
                                    style="border-radius: 50%"></td>
                            <td>
                                {{-- @role('admin') --}}
                                <form action=" {{ route('news.destroy', $bitOfNews->id) }}" method="post">
                                    <a href="{{ route('news.edit', $bitOfNews->id) }}" class="btn btn-primary">Edit</a>
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <input type="submit" value="Delete" class="btn btn-danger">

                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
