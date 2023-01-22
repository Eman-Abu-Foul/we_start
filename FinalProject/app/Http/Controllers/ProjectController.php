<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use App\Models\Proposal;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $projects = Project::where('user_id',$user_id)->latest('id')->paginate(10);
        return response()->view('user.projects.index',[
            'projects' => $projects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $skills = Skill::all();
        $categories = Category::all();
        return view('user.projects.create',[
            'categories' => $categories,
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
            'date' => 'required',
            'min' => 'required',
            'max' => 'required',
        ]);

        if (!$validator->fails()) {
            $project = new Project();
            $project->title = $request->title;
            $project->category_id = $request->category_id;
            $project->min = $request->min;
            $project->max = $request->max;
            $project->date = $request->date;
            $project->description = $request->description;
            $project->user_id = $user_id;

            $isSaved = $project->save();
            if($request->hasFile('image')) {
                $image = $request->file('image')->store('uploads/images', 'custom');
                $project->image()->create([
                    'path' => $image,
                ]);
            }


            if($request->has('ids')) {
                $ids = $request->ids;
                $ids = explode(",",$ids);
                foreach((array) $ids as $id) {
                    $project->tag()->create([
                        'user_id' => $user_id,
                        'skill_id' => $id,
                    ]);
                }
            }


            return response()->json(['message' => $isSaved ? 'Project succsess Created' : 'Faield']
                , $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::all();
        $project = Project::findOrFail($id);;
        $proposals = Proposal::where('project_id', $id)->get();
        return response()->view('user.projects.show',[
            'proposals' => $proposals,
            'project' => $project,
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $skills = Skill::all();
        $categories = Category::all();
        return response()->view('user.projects.edit',
            [
                'project' => $project,
                'skills' => $skills,
                'categories' => $categories,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $user_id = Auth::user()->id;


        $validator = Validator($request->all(), [
            'title' => 'required|string',
            'description' => 'required|string',
            'date' => 'required',
            'min' => 'required',
            'max' => 'required',
        ]);

        if (!$validator->fails()) {
            $project->title = $request->title;
            $project->category_id = $request->category_id;
            $project->min = $request->min;
            $project->max = $request->max;
            $project->date = $request->date;
            $project->description = $request->description;
            $project->user_id = $user_id;

            $isSaved = $project->save();
            if($request->hasFile('image')) {
                $image = $request->file('image')->store('uploads/images', 'custom');
                $project->image()->create([
                    'path' => $image,
                ]);
            }

//            DB::table('companies_fields')->where('company_id', '=', $company->id)
//                ->delete();

            if($request->has('ids')) {
                $ids = $request->ids;
                $ids = explode(",",$ids);
                $project->tag()->delete([

                    'skill_id' => $ids,
                ]);
                foreach((array) $ids as $id) {

                    $project->tag()->create([
                        'user_id' => $user_id,
                        'skill_id' => $id,
                    ]);
                }
            }


            return response()->json(['message' => $isSaved ? 'Project succsess Updated' : 'Faield']
                , $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Project $project)
    {
        $isDeleted = $project->delete();
        if ($isDeleted){
            $project->tag()->delete();
        }
        return response()->json(
            ['message' => $isDeleted ? 'Deleted successfully' : 'Delete failed!'],
            $isDeleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
    }
}
