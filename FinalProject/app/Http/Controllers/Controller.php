<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Project;
use App\Models\Proposal;
use App\Models\User;
use App\Models\Work;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function home_page()
    {
        $categories = Category::limit(8)->get();
        $projects = Project::latest('id')->paginate(10);
        $freelancers = User::where('type', '=' , 'freelancer')->latest('id')->paginate(10);
        return view('index',[
            'categories' => $categories,
            'freelancers' => $freelancers,
            'projects' => $projects,
        ]);
    }
    public function dashboard()
    {
        return view('dashboard');
    }
    public function account()
    {
        $user_id = Auth::user()->id;

        $works = Work::where('user_id',$user_id)->get();
        return view('user.account',[
            'works' => $works
        ]);
    }
    public function edit_account()
    {

        $user = Auth::user()->id;
        return response()->view('user.edit',[
            'user' => $user,
        ]);
    }
    public function update_account(Request $request)
    {
        $user = Auth::user();
        $validator = Validator($request->all(), [
            'fname' => "required|string|min:3",
            'lname' => "required|string|min:3",
            'phone' => "required",
        ]);

        if (!$validator->fails()) {

            $user->fname = $request->fname;
            $user->lname = $request->lname;
            $user->phone = $request->phone;
            $isSaved = $user->save();

            if($request->hasFile('image')) {
                $image = $request->file('image')->store('uploads/images', 'custom');
                $user->image()->updateOrCreate([
                    'path' => $image,
                ]);
            }



            return response()->json(['message' => $isSaved ? 'Updated succsessfully' : 'Faield']
                , $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }
    public function all_project()
    {
        $projects = Project::latest('id')->paginate(10);
        return view('front.allproject',[
            'projects' => $projects
        ]);
    }
    public function show_project($id){

        $proposal = Proposal::where('project_id' , '=' , $id)->exists();
        $project = Project::where('id',$id)->first();
        return view('front.showproject',[
            'project' => $project,
            'proposal' => $proposal,
        ]);
    }
    public function all_freelancer()
    {
        $freelancers = User::where('type', '=' , 'freelancer')->latest('id')->paginate(10);
        return view('front.allfreelancers',[
            'freelancers' => $freelancers
        ]);
    }
    public function show_freelancer($id){


        $freelancer = User::where('id',$id)->first();

        return view('front.showfreelancer',[
            'freelancer' => $freelancer,

        ]);
    }
    public function show_category($id){
        $projects = Project::where('category_id',$id)->get();
        return view('front.allproject',[
            'projects' => $projects,
        ]);

    }


}
