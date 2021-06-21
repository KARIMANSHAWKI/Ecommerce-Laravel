<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->get();
        return view('admin.product.index', compact('products'));
    }

    public function store(Request $request)
    {
        $rules = $this->getRules();
        $messages = $this->getMessage();

        $validator = Validator::make($request->all(), $rules, $messages);

        if (!$validator->passes()) {
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }else{
            $product = new Product();
            $product->name = $request->name;
            $image = $request->file('image');
            $new_name = rand().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/product'), $new_name);
            $product->image = $new_name;
            $product->descriptin = $request->desc;
            $product->price = $request->price;
            $product->category_id = $request->category;
            $product->save();

            return response()->json(['data'=> $product, 'status' =>1]);
        }
    }


    public function destroy($id){
        $product = Product::find($id);
        $product->delete();
        $path = public_path('images/category'. $product->image);
        if(File::exists($path)) {
            File::delete($path);
        }

        return response()->json(['success' =>'Product Deleted Successfully']);
}

    // this for list rules when create new Product
    protected function getRules()
    {
        return $rules = [
                  'name' => 'required|min:5',
                  'descriptin' => 'min:15',
                  'price' => 'required| min:1',
                  'image' => 'required',
                //   'category_id' => 'required'
              ];
    }

    protected function getMessage()
    {
        return $messages = [
              'required' => 'this field Is Required',
              'descriptin.min' => 'Name Must Be At Least 15 Char',
              'price.min' => 'Invalid Number',
              'name.min' => 'Name must be at least 5 Char',
          ];
    }
}
