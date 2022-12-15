<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class InvitationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invitations = Invitation::latest('id')->paginate(10);
        return view('admin.invitations.index',['invitations' => $invitations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.invitations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());name,date,address,image,url
        $date = Carbon::parse($request->date);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'url' => 'nullable',
            'date' => 'required',
            'address' => 'required',
            'image' => 'required',
        ]);

        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        $image = $request->file('image')->store('uploads/images', 'custom');
//        $qrcode = store('uploads/images/qrcode.svg', 'custom');
//        $url = $request->input('url');
//        $url = QrCode::size(300)->generate($url, public_path('images/qrcode.svg'));
        Invitation::create([
            'name' => $request->input('name'),
            'url' => $request->input('url'),
            'date' => $date,
            'address' => $request->input('address'),
            'image' =>$image,
        ]);

        return redirect()->route('admin.invitations.index')->with('status', 'Coupon created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function show(Invitation $invitation)
    {
        return view('admin.invitations.show',['invitation'=>$invitation]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function edit(Invitation $invitation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invitation $invitation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invitation $invitation)
    {
        //
    }
}
