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
    <div class="card mb-3" style="max-width: 740px;">
        <div class="row no-gutters">
            <div class="col-md-6" >
                <img src="{{asset('images/product/'.$product->image)}}" class="card-img" alt="...">
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <h2 class="card-title">{{$product->name}}</h2>
                    <p class="card-text">{{$product->descriptin}}</p>
                    <h2 class="card-title">price : {{$product->price}} $</h2>
                    <form action="" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$product->id}}">
                        Quntity : <input type="number" name="quantity" id="quantity">
                        <button type="submit" class="btn btn-primary" style="display: block; margin-top:20px">Add To Cart</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('site.includes.script')

</body>

</html>
