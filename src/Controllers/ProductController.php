<?php

namespace Irish\Ecom\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Irish\Ecom\Models\Product;


class ProductController 
{
    //
    public function index()
    {
        $products = Product::latest()->paginate(5);
    
        return view('post::index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create() {
       
       return view('post::create');
       
    }

    public function store(Request $request) {


        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ]);
        
        $input = $request->all();
        
        if ($image = $request->file('image')) {
            // Store the image in the package's images directory
            $destinationPath = 'vendor/ecom/products';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $input['image'] = "$destinationPath/$postImage"; // Save the relative path in the database
        }
       
        Product::create($input);
        
        return redirect()->route('post')
            ->with('success', 'Product created successfully.');
       
    }

    public function edit($id)
    {
        $product=Product::find($id);
        return view('post::edit',compact('product'));
    }

    public function update(Request $request)
    {

        $product_id = $request->id;

        $product = Product::find($product_id);

        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
  

        $input = $request->all();

         
        if ($image = $request->file('image')) {
            // Store the image in the package's images directory
            $destinationPath = 'vendor/ecom/products';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $input['image'] = "$destinationPath/$postImage"; // Save the relative path in the database
        }else{

            unset($input['image']);
        }
          
        $product->update($input);
    
        return redirect()->route('post')
                        ->with('success','Product updated successfully');
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();
     
        return redirect()->route('post')
                        ->with('success','Product deleted successfully');
    }


}