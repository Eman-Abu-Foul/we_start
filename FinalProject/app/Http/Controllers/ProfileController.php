<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $user_id = Auth::user()->id;

        $prof = Profile::where('user_id' , '=' , $user_id)->exists();
        $profile = Profile::where('user_id' , '=' , $user_id)->first();

//        if ($profile == 'true'){
//            $p = 'true';
//            return $p;
//        }
//        else{
//            $p = 'false';
//            return $p;
//        }

        return view('user.profiles.index',[
            'user' => $user,
            'prof' => $prof,
            'profile' => $profile,
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
        return view('user.profiles.create',
        [
            'skills' => $skills
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
        //specialization nationality introduction user_id
        $user_id = Auth::user()->id;


        $validator = Validator($request->all(), [
            'title' => 'required|string',
            'location' => 'required|string',
            'description' => 'required|string',
            'image' => 'required',
        ]);

        if (!$validator->fails()) {
            $profile = new Profile();
            $profile->specialization = $request->title;
            $profile->nationality = $request->location;
            $profile->introduction = $request->description;
            $profile->user_id = $user_id;

            $isSaved = $profile->save();
            if($request->hasFile('image')) {
                $image = $request->file('image')->store('uploads/images', 'custom');
                $profile->image()->create([
                    'path' => $image,
                ]);
            }


            if($request->has('ids')) {
                $ids = $request->ids;
                $ids = explode(",",$ids);
                foreach((array) $ids as $id) {
                    $profile->tag()->create([
                        'user_id' => $user_id,
                        'skill_id' => $id,
                    ]);
                }
            }


            return response()->json(['message' => $isSaved ? 'Profile succsess Created' : 'Faield']
                , $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        $skills = Skill::all();
        return response()->view('user.profiles.edit',
            [
                'profile' => $profile,
                'skills' => $skills,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $user_id = Auth::user()->id;
        $validator = Validator($request->all(), [
            'title' => 'required|string',
            'location' => 'required|string',
            'description' => 'required|string',
            'image' => 'required',
        ]);

        if (!$validator->fails()) {
            $profile->specialization = $request->title;
            $profile->nationality = $request->location;
            $profile->introduction = $request->description;
            $profile->user_id = $user_id;

            $isSaved = $profile->save();
            if($request->hasFile('image')) {
                $image = $request->file('image')->store('uploads/images', 'custom');
                $profile->image()->update([
                    'path' => $image,
                ]);
            }


            if($request->has('ids')) {
                $ids = $request->ids;
                $ids = explode(",",$ids);
                $profile->tag()->delete([

                    'skill_id' => $ids,
                ]);
                foreach((array) $ids as $id) {
                    $profile->tag()->updateOrCreate([
                        'user_id' => $user_id,
                        'skill_id' => $id,
                    ]);
                }
            }


            return response()->json(['message' => $isSaved ? 'Profile succsess Created' : 'Faield']
                , $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
