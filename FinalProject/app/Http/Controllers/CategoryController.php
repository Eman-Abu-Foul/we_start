<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest('id')->paginate(10);
        return response()->view('admin.categories.index',[
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|string',
            'description' => 'required|string',
        ]);
        if (!$validator->fails()) {
            $category = new Category();
            $category->name = $request->name;
            $category->icon_name = $request->icon_name;
            $category->description = $request->description;
            $isSaved = $category->save();

            return response()->json(['message' => $isSaved ? 'Category succsess Created' : 'Faield']
                , $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories = Category::all();
        return response()->view('admin.categories.edit',[
            'category' => $category,
            'categories' => $categories,
        ]);
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
        $category = Category::findOrFail($category->id);
        $validator = Validator($request->all(), [
            'name' => 'required|string',
            'description' => 'required|string',
        ]);
        if (!$validator->fails()) {
            $category->name = $request->name;
            $category->icon_name = $request->icon_name;
            $category->description = $request->description;
            $isSaved = $category->save();

            return response()->json(['message' => $isSaved ? 'Category succsess Updated' : 'Faield']
                , $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $isDeleted = $category->delete();
        return response()->json(
            ['message' => $isDeleted ? 'Deleted Successfully' : 'Delete failed'],
            $isDeleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST,
        );
    }
}
