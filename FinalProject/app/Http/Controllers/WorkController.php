<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $skills = Skill::all();
        return view('user.works.create',[
            'skills' => $skills,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user_id = Auth::user()->id;


        $validator = Validator($request->all(), [
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'required',
        ]);

        if (!$validator->fails()) {
            $work = new Work();
            $work->title = $request->title;
            $work->description = $request->description;
            $work->user_id = $user_id;

            $isSaved = $work->save();
            if($request->hasFile('image')) {
                $image = $request->file('image')->store('uploads/images', 'custom');
                $work->image()->create([
                    'path' => $image,
                ]);
            }


            if($request->has('ids')) {
                $ids = $request->ids;
                $ids = explode(",",$ids);
                foreach((array) $ids as $id) {
                    $work->tag()->create([
                        'user_id' => $user_id,
                        'skill_id' => $id,
                    ]);
                }
            }


            return response()->json(['message' => $isSaved ? 'Worked succsess Created' : 'Faield']
                , $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function show(Work $work)
    {

        return view('user.works.show',[
            'work' => $work,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function edit(Work $work)
    {
        $skills = Skill::all();
        return response()->view('user.works.edit',
            [
                'work' => $work,
                'skills' => $skills,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Work $work)
    {
        $user_id = Auth::user()->id;


        $validator = Validator($request->all(), [
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'required',
        ]);

        if (!$validator->fails()) {
            $work->title = $request->title;
            $work->description = $request->description;
            $work->user_id = $user_id;

            $isSaved = $work->save();
            if($request->hasFile('image')) {
                $image = $request->file('image')->store('uploads/images', 'custom');
                $work->image()->update([
                    'path' => $image,
                ]);
            }


            if($request->has('ids')) {
                $ids = $request->ids;
                $ids = explode(",",$ids);
                $work->tag()->delete([

                    'skill_id' => $ids,
                ]);
                foreach((array) $ids as $id) {
                    $work->tag()->updateOrCreate([
                        'user_id' => $user_id,
                        'skill_id' => $id,
                    ]);
                }
            }


            return response()->json(['message' => $isSaved ? 'Worked succsess Updated' : 'Faield']
                , $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work $work)
    {
        //
    }
}
