<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = FaqCategory::with('items')->get();
        return view('admin.faq.index',['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated =$request->validate(['name' => ['required','string','max:255']]);
        FaqCategory::create($validated);
        return redirect()->route('admin.faq-categories.index')->with('status','Categorie aangemaakt!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FaqCategory $faqCategory)
    {
        return view('admin.faq.edit', ['category' => $faqCategory]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FaqCategory $faqCategory)
    {
        $validated = $request->validate(['name' => ['required', 'string', 'max:255']]);
        $faqCategory->update($validated);
        return redirect()->route('admin.faq-categories.index')->with('status' , 'Categorie bijgewerkt!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FaqCategory $faqCategory)
    {
        $faqCategory->delete();
        return redirect()->route('admin.faq-categories.index')->with('status', 'Categorie verwijderd!');
    }
}
