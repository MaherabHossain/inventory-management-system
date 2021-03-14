<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\productRequest;
use App\Http\Requests\productUpdateRequest;
use Illuminate\Support\Facades\Session;

class productController extends Controller
{
    public function index()
    {
        $this->data['products']  = Product::all();

        return view('products.products',$this->data); 
    }


    public function create()
    {
        $this->data['headline']   = 'Add Product';
        $this->data['button']     = 'Add Product';
        $this->data['categories'] = Category::findProductCatagory();
        return view('products.form',$this->data);
    }


    public function store(productRequest $request)
    {

        $fromData = $request->all();
        if(Product::create($fromData)){
            Session::flash('message','Product Added Successfully!');
        }
        return redirect()->to('products');

    }

    
    public function show($id)
    {
        $this->data['product'] = Product::findOrFail($id);
        return view('products.show',$this->data);
    }

   
    public function edit($id)
    {
        $this->data['product']    = Product::findOrFail($id);
        $this->data['headline']   = 'Update Product';
        $this->data['button']     = 'Update Product';
        $this->data['categories'] = Category::findProductCatagory();

        return view('products.form',$this->data);
    }

  
    public function update(productUpdateRequest $request, $id)
    {
        $formData           = $request->all();
        $data               = Product::findOrFail($id);
        $data->tittle       = $formData['tittle'];
        $data->category_id  = $formData['category_id'];
        $data->description  = $formData['description'];
        $data->cost_price   = $formData['cost_price'];
        $data->price        = $formData['price'];

        if($data->save()){
            Session::flash('message','Product Updated Successfully!');
        }

        return redirect()->to('products');
    }

    
    public function destroy($id)
    {
        if(Product::destroy($id)){
            Session::flash('message','Product Deleted Successfully!');
        }

        return redirect()->to('products');
    }
}
