<?php

namespace App\Http\Controllers;

use App\Events\ProposalCreated;
use App\Models\Project;
use App\Models\Proposal;
use App\Notifications\ProposalCreatedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ProposalController extends Controller
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
        //
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
            'date' => 'required|string',
            'price' => 'required',
            'description' => 'required|string',
        ]);

        if (!$validator->fails()) {
            $proposal = new Proposal();
            $proposal->date = $request->date;
            $proposal->price = $request->price;
            $proposal->project_id = $request->project_id;
            $proposal->description = $request->description;
            $proposal->user_id = $user_id;


            $isSaved = $proposal->save();
            $project = Project::findOrFail($request->project_id);

            $project->user->notify(new ProposalCreatedNotification($proposal));

            if($request->hasFile('image')) {
                $image = $request->file('image')->store('uploads/images', 'custom');
                $proposal->image()->create([
                    'path' => $image,
                ]);
            }

            return response()->json(['message' => $isSaved ? 'Proposal succsess Created' : 'Faield']
                , $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function show(Proposal $proposal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function edit(Proposal $proposal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proposal $proposal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proposal $proposal)
    {
        //
    }
}
