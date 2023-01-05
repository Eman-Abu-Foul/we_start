<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = Skill::latest('id')->paginate(10);
        return response()->view('admin.skills.index',[
            'skills' => $skills
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.skills.create');
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
        ]);
        if (!$validator->fails()) {
            $skill = new Skill();
            $skill->name = $request->name;
            $isSaved = $skill->save();

            return response()->json(['message' => $isSaved ? 'Skill succsess Created' : 'Faield']
                , $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit(Skill $skill)
    {
        return response()->view('admin.skills.edit',[
            'skill' => $skill,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skill $skill)
    {
        $skill = Skill::findOrFail($skill->id);
        $validator = Validator($request->all(), [
            'name' => 'required|string',
        ]);
        if (!$validator->fails()) {
            $skill->name = $request->name;
            $isSaved = $skill->save();

            return response()->json(['message' => $isSaved ? 'Skill succsess Updated' : 'Faield']
                , $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
        $isDeleted = $skill->delete();
        return response()->json(
            ['message' => $isDeleted ? 'Deleted Successfully' : 'Delete failed'],
            $isDeleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST,
        );
    }
}
