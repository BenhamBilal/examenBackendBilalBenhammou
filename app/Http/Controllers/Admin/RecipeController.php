<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recipes = Recipe::all();
        return view('admin.recipes.index',['recipes' => $recipes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.recipes.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
           'title' => ["required",'string','max:255'],
           'ingredients' => ['required', 'string'],
           'content' => ['required', 'string'],
            'cooking_time' => ['nullable', 'integer', 'min:1'],
            'image' => ['nullable' , 'image' , 'max:2048']
        ]);

        if($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('recipes','public');
        }

        $validated['user_id'] = auth()->id();
        Recipe::create($validated);

        return redirect()->route('admin.recipes.index')->with('status', 'Recept aangemaakt !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Recipe $recipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe)
    {
        return view('admin.recipes.edit',['recipe' => $recipe]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Recipe $recipe)
    {
        $validated = $request->validate([
            'title' => ["required",'string','max:255'],
            'ingredients' => ['required', 'string'],
            'content' => ['required', 'string'],
            'cooking_time' => ['nullable', 'integer', 'min:1'],
            'image' => ['nullable' , 'image' , 'max:2048']
        ]);

        if($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('recipes','public');
        }

        $recipe->update($validated);

        return redirect()->route('admin.recipes.index')->with('status','Recept bijgewerkt');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {
        $recipe->delete();

        return redirect()->route('admin.recipes.index')->with('status', 'Recept vewijderd');
    }
}
