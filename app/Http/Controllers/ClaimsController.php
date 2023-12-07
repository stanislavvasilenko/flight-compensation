<?php

namespace App\Http\Controllers;

use App\Models\Claim;
use Illuminate\Http\Request;

class ClaimsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        session()->forget('flight');
        return view('claims.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Claim $claim)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Claim $claim)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Claim $claim)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Claim $claim)
    {
        //
    }

    public function checkAirports(Request $request) {
        $departure_airport = $request->get('departure-airport');
        $destination = $request->get('destination');

        session()->put('flight', [
            'departure-airport' => $departure_airport,
            'destination' => $destination
        ]);

        return redirect()->route('claims.step2');
    }

    public function step2(Request $request) {
        return view('claims.step2');
    }

    public function checkFlight(Request $request) {
        $problem = $request->get('problem');
            
        session('flight', [...session()->get('flight'), 'problem' => $problem]);

        return view('claims.step3', compact('problem'));
    }

    public function checkCompensation(Request $request) {
        $time_delay = $request->get('time_delay');
        $reason = $request->get('reason');
        $what_happened = $request->get('what_happened');


        /*
            How long was the total delay after arrival
            [
                2 => "less than 3 hours"
                3 => "from 3 to 4 hours"
                4 => "from 4 and more 4 hours"
                5 => "Didn't arrive at all"
            ]

            The reason for the flight delay
            [
                1 => "Don't remeber the reason"
                2 => "Technical problems"
                3 => "Weather conditions"
            }
         */

        return $time_delay >= 4 && $reason == 3 && mb_strstr($what_happened, 'foggy')
            ? view('claims.compensation')
            : view('claims.no_compensation');
    }
}
