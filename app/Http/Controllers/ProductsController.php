<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\sections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = sections::all();
        $products = Products::all();
        return view('products.products',compact('sections','products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Product_name' => 'required|max:255',
        ], [
            'Product_name.required' => 'يرجي ادخال اسم المنتج',
        ]);

        Products::create([
            'Product_name' => $request->Product_name,
            'section_id' => $request->section_id,
            'description' => $request->description,
        ]);
        session()->flash('Add', 'تم اضافة المنتج بنجاح ');
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = sections::where('section_name', $request->section_name)->first()->id; // بقوله لو كولوم السكشن النيم الي ف تيبل السيكشن يساوي قيمه السيكشن النيم ال في الفيوو في فورم التعديل هاتلي ال الاي دي بتاعه

        $Products = Products::findOrFail($request->pro_id); // البرو اي دي انا جايبه من صفحه الفيو الي هي جابته من الداتابيز
 
        $Products->update([
        'Product_name' => $request->Product_name,
        'description' => $request->description,
        'section_id' => $id,
        ]);
 
        session()->flash('Edit', 'تم تعديل المنتج بنجاح');
        return redirect('/products');      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
         $Products = Products::findOrFail($request->pro_id);
         $Products->delete();
         session()->flash('delete', 'تم حذف المنتج بنجاح');
         return back();
    }
}
