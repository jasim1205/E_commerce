<?php

namespace App\Http\Controllers\backend;

use App\Models\Category;
use App\Models\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::get();
        return view('backend.category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brand= Brand::get();
        return view('backend.category.create',compact('brand'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $category = new Category;
            $category->brand_id = $request->brand_id;
            $category->categoryname = $request->categoryName;
            if($category->save())
                $this->notice::success('Data successfully Saved');
                return redirect()->route('category.index');
        }catch(Exception $e){
            //dd($e)
            $this->notice::error('Data does not saved.please try again!');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $brand = Brand::get();
        $category = Category::findOrFail('encryptor'('decrypt',$id));
        return view('backend.category.edit',compact('brand','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         try{
            $category = Category::findOrFail('encryptor'('decrypt',$id));
            $category->brand_id = $request->brand_id;
            $category->categoryname = $request->categoryName;
            if($category->save())
                $this->notice::success('Data successfully Saved');
                return redirect()->route('category.index');
        }catch(Exception $e){
            //dd($e)
            $this->notice::error('Data does not saved.please try again!');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail('encryptor'('decrypt',$id));
        if($category->delete())
            $this->notice::success('Data successfully Deleted');
            return redirect()->route('category.index');
    }
}
