    {{-- &&&&&&&&&&&&&&&&&&&&&&&&&&&& Creat &&&&&&&&&&&&&&&&&&&&&&&&&&&& --}}
    {{-- @if ($errors = Session::get('error')) --}}

    {{-- @endif --}}

    {{-- @if ($message)
    <div class="alert alert-danger">
        <ul>
            @foreach ($message as $ms)
                <li>
                    {{$ms}}
                </li>
            @endforeach
        </ul>
    </div>
@endif --}}

    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    </head>

    <body>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    Add News
                </div>
               
                <div class="card-body">
                    <h5 class="card-title">Fill form :)</h5>
                    <form id="addUserForm" method="post" enctype="multipart/form-data"
                        action="{{ route('news.createModel') }}">
                        @csrf
                        <div class="form-group">
                            <label for="title_ar">Title : Ar</label>
                            <input type="text" class="form-control" name="title_ar" id="title_ar">
                            @error('title_ar') <p class="alert alert-danger">{{$message}}</p>@enderror
                        </div>
                        <div class="form-group">
                            <label for="title_en">Title : En</label>
                            <input type="text" class="form-control" name="title_en" id="title_en">
                            @error('title_en') <p class="alert alert-danger">{{$message}}</p>@enderror

                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" name="description" id="description">
                            @error('description') <p class="alert alert-danger">{{$message}}</p>@enderror

                        </div>
                        <div class="form-group">
                            <label for="image">Select Image</label>
                            <input type="file" class="form-control-file" name="image" id="image">
                            @error('image') <p class="alert alert-danger">{{$message}}</p>@enderror

                        </div>

                        <button type="submit" class="btn btn-success" id="newsForm">Add</button>

                    </form>
                </div>
            </div>
        </div>


    </body>

    </html>
