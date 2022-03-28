<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {

        $categories = Category::all();
        return view('categories.index',['categories'=>$categories]);
    }

    public function indexSub($slug)
    {
        $main_category = Category::where('slug' , $slug)->first();
        if(!$main_category OR $main_category->parent_id)
        {
            abort(404);
        }
        $categories = Category::where('parent_id', $main_category->id)->get();
        return view('categories.sub_categories_index',['categories'=>$categories, 'main_category' => $main_category]);
    }
    public function store(Request $request)
    {
        $validatedData = $this->validate($request, [
            'name'      => 'required|min:3|max:255|string',
            'parent_id' => 'sometimes|nullable|numeric'
        ]);
        $validatedData['slug'] = Str::slug($validatedData['name'], '-');

        Category::create($validatedData);

        return redirect()->route('categories')->withSuccess('You have successfully created a Category!');
    }

    public function update(Request $request, $category)
    {
        $validatedData = $this->validate($request, [
            'name'  => 'required|min:3|max:255|string'
        ]);
        $validatedData['slug'] = Str::slug($validatedData['name'], '-');
        $category = Category::find($category);
        $category->update($validatedData);

        return redirect()->route('categories')->withSuccess('You have successfully updated a Category!');
    }

    public function destroy($category)
    {
        $category = Category::find($category);
        $category->delete();

        return redirect()->route('categories')->withSuccess('You have successfully deleted a Category!');
    }
}
