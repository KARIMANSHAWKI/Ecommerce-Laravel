<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Features Items</h2>
    @foreach ($products as $product)
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{asset('images/product/'.$product->image)}}" alt="" />
                        <h2>{{$product->price}} $</h2>
                        <p>Easy Polo Black Edition</p>

                        <a href="{{ Route("cart.index", $product->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content">
                            <h2>{{$product->price}} $</h2>
                            <p>Easy Polo Black Edition</p>
                            <a href="{{ URL::to("cart/{$product->id}") }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                    </div>
            </div>
         
        </div>
    </div>
    @endforeach
  

</div>
    
