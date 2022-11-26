<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Chalet;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events[] = [];
        $appointments = Appointment::all();
        foreach ($appointments as $appointment) {
            $events[] = [
                'id' => $appointment->id,
                'title' => $appointment->chalet->name.'- price:$'. $appointment->price_total,
                'start' => $appointment->date,
                'color' => sprintf('#%06X', mt_rand(0xFF9999, 0xFFFF00)),
                'allDay'=>true
            ];
        }
        return view('admin.appointments.index', ['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = Carbon::parse($request->date);
        $chalet_id = $request->chalet_id;

        $conflict = Appointment::where('chalet_id',$chalet_id )
        ->whereDate('date', '=', $date)
            ->exists();

        if (!$conflict) {
            $chalet = Chalet::findOrFail($chalet_id);
            $price = $chalet->price;
            $day = $date->format('l');
                if ($day == "Thursday" || $day == "Friday") {
                    $price += $chalet->price_special;
            }
            $appointment = new Appointment();
            $appointment->chalet_id = $chalet_id;
            $appointment->user_name = $request->user_name;
            $appointment->user_email = $request->user_email;
            $appointment->user_phone = $request->user_phone;
            $appointment->date = $date;
            $appointment->price_total = $price;
            $issaved = $appointment->save();
            if($issaved){
                return redirect()->route('elementFront',$request->chalet_id)->with('success','Created Appointment successfully');
            }
        }
            return redirect()->route('elementFront',$request->chalet_id)
                ->with('error', "Sorry , Chalet is Booked by someone , Choose other Day !!!");


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
