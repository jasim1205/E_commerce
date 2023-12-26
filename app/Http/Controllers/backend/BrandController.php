<?php

namespace App\Http\Controllers\backend;

use App\Models\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brand = Brand::get();
        return view('backend.brand.index',compact('brand'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $brand = new Brand;
            $brand->name = $request->brandName;
            if($brand->save())
                $this->notice::success('Data successfully Saved');
                return redirect()->route('brand.index');
        }catch(Exception $e){
            //dd($e)
            $this->notice::error('Data does not saved.please try again!');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $brand = Brand::findOrFail(encryptor('decrypt',$id));
        return view('backend.brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $brand = Brand::findOrFail(encryptor('decrypt',$id));
            $brand->name = $request->brandName;
            if($brand->save())
                $this->notice::success('Data successfully Saved');
                return redirect()->route('brand.index');
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
        $brand = Brand::findOrFail(encryptor('decrypt',$id));
        if($brand->delete())
            $this->notice::success('Brand Successfully Deleted');
            return redirect()->route('brand.index');
    }
}
