<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqItem;
use Illuminate\Http\Request;

class FaqItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $validated = $request->validate([
            'faq_category_id' => ['required', 'exists:faq_categories,id'],
            'question' => ['required', 'string' ,'max:255'],
            'answer' => ['required', 'string']
        ]);
        FaqItem::create($validated);
        return redirect()->route('admin.faq-categories.edit',$validated ['faq_category_id'])->with('status','Vraag toegevoegd!');
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
    public function edit(FaqItem $faqItem)
    {
        return view('admin.faq-items.edit', ['item' => $faqItem]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FaqItem $faqItem)
    {
        $validated = $request->validate([
            'question' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'string'],
        ]);

        $faqItem->update($validated);

        return redirect()->route('admin.faq-categories.edit', $faqItem->faq_category_id)
            ->with('status', 'Vraag bijgewerkt!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FaqItem $faqItem)
    {
        $faqItem->delete();

        return redirect()->route('admin.faq-categories.edit',$faqItem->faq_category_id)->with('status','Vraag verwijderd!');
    }
}
