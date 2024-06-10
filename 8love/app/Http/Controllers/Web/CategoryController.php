<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('web.Category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('web.Category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name', // Assuming 'categories' is your table name
            'description' => 'required',
            'image' => 'required'
        ]);

        $imageName = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('category'), $imageName);

        $product = new Category();
        $product->image = $imageName;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();
        return redirect()->route('category.index')->with('success','Category saved successfully');
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
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('web.Category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'status' => 'required|string|in:active,block',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048', // Make image upload optional
        ]);

        $category = Category::findOrFail($id);

        if ($request->hasFile('image')) {
            // Delete the old image
            if ($category->image && file_exists(public_path('category/' . $category->image))) {
                unlink(public_path('category/' . $category->image));
            }

            // Upload the new image
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('category'), $imageName);
            $category->image = $imageName;
        }

        $category->name = $request->name;
        $category->description = $request->description;
        $category->status = $request->status;

        $category->save();

        return redirect()->route('category.index')->with('success','Category Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('category.index')->with('success','Category Delete successfully');
    }

    public function block($id){
        $user = Category::findOrFail($id);
        $user->status = 'block';
        $user->save();
        return redirect()->back()->with('success','Category has been successfully Block');
    }
    public function unblock($id){
        $user = Category::findOrFail($id);
        $user->status = 'active';
        $user->save();
        return redirect()->back()->with('success','Category has been successfully Active');
    }
}
