<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoryRequest $request)
    {
        $count =10;
        if($request->has($count)){
            $count = $request->count;

        }
        $categories = Category::latest('id')->paginate($count);

        if($request->has('search')){
            $categories = Category::where('name','like' , '%'. $request->search .'%')->latest('id')->paginate(10);
        }

        return view('admin.categories.index',
            [
                'categories' => $categories
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $categories = Category::select(['id', 'name'])->get();
        $categories = Category::all();
        return view('admin.categories.create',
            [
                'categories' => $categories
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $validated = $request->validated();
        if (!$validated->fails()) {
            $image = $request->file('image')->store('uploads/categories', 'custom');

            $name = [
                'en' => $request->en_name,
                'ar' => $request->ar_name
            ];

            $name = json_encode($name, JSON_UNESCAPED_UNICODE);


            $category = Category::create([
                'name' => $name,
                'slug' => Str::slug($request->en_name),
                'parent_id' => $request->parent_id,
            ]);

            $category->image()->create([
                'path' => $image,
                'feature' => 1
            ]);

            return redirect()->route('admin.categories.index')->with('msg', 'Category created successfullly')->with('type', 'success');

        }else{
            return redirect()->back()
                ->withErrors($validated)
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
