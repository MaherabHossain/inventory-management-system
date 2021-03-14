<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\categoriesRequest;
use App\Http\Requests\updateCategoryRequest;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['categories']      = Category::all();
        return view('categories.categories',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['headline']        = 'Add Categories'; 
        $this->data['button']          = 'Create Categories'; 
        return view('categories.form',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(updateCategoryRequest $request)
    {
        $formData            = $request->all();
        
        if(Category::create($formData)){
            Session::flash('message','Category Added Successfully!');
        }
        return redirect()->to('categories');

        //$formData         = $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['categories']      = Category::findOrFail($id);
        $this->data['headline']        = 'Update Categories'; 
        $this->data['button']          = 'Update Categories';
        
        return view('categories.form',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( updateCategoryRequest $request,$id )
    {
        $formData      = $request->all();
        $data          = Category::findOrFail($id);
        $data->tittle  = $formData['tittle'] ;

        if($data->save()){

                    Session::flash('message','Category Updated Successfully!');
         }
        return redirect()->to('categories');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Category::findOrFail($id)->delete()){
            Session::flash('message','Category Deleted Successfully!');
        }
        return redirect()->to('categories');
    }
}
