<?php

namespace App\Http\Controllers;

use App\Models\Chalet;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    public function indexFront(){
        $chalet = Chalet::all();
        return view('front.index' ,['chalets' => $chalet]);
    }
    public function elementFront($id , Request $request){
        $chalet = Chalet::FindOrFail($id);
        return view('front.element' ,['chalet' => $chalet]);
    }


}
