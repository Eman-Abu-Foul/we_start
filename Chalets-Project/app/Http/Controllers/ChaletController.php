<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChaletRequest;
use App\Models\Chalet;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChaletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $count =10;
        if($request->has($count)){
            $count = $request->count;

        }
        $chalet = Chalet::latest('id')->paginate($count);

        if($request->has('search')){
            $chalet = Chalet::where('name','like' , '%'. $request->search .'%')->latest('id')->paginate(10);
        }

        return view('admin.chalets.index',
            [
                'chalets' => $chalet
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
        return view('admin.chalets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChaletRequest $request)
    {
        $path = $request->file('image')->store('/', 'custom');
        $chalet = new Chalet();
        $chalet->name = $request->name;
        $chalet->slug = Str::slug($request->name);
        $chalet->desc = $request->desc;
        $chalet->address = $request->address;
        $chalet->price = $request->price;
        $chalet->price_special = $request->price_special;
        $issaved = $chalet->save();
        if($issaved){
            Image::create([
                'path' => $path,
                'imageable_id' => $chalet->id,
                'imageable_type' => Chalet::class
            ]);
            return redirect()->route('admin.chalets.index')->with('success','Created Chalet successfully');

        }else {
            return redirect()->back()
                ->withErrors($request)
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chalet  $chalet
     * @return \Illuminate\Http\Response
     */
    public function show(Chalet $chalet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chalet  $chalet
     * @return \Illuminate\Http\Response
     */
    public function edit(Chalet $chalet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chalet  $chalet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chalet $chalet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chalet  $chalet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chalet $chalet)
    {
        //
    }
}
