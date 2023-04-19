<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $competitions = Competition::where('isactive', '=', true)->where('isfinished', '=', true)->get();
        return view('home.result', ['competitions' => $competitions ]);
    }

    public function details($competitionid): View
    {
        $counter = 1;
        $competition = Competition::find($competitionid);
        $participants = DB::table('finishparticipants')
            ->leftjoin('distances', 'finishparticipants.distanceid', '=', 'distances.distanceid')
            ->leftjoin('users', 'finishparticipants.userid', '=', 'users.userid')
            ->select('users.lastname', 'users.firstname', 'users.city', 'users.clubname', 'finishparticipants.result')
            ->where('distances.competitionid', '=', $competitionid)
            ->where('finishparticipants.distanceid', '=', '1')
            ->orderby('finishparticipants.result')->get();
        return view('home.resultDetails', ['competition' => $competition, 'participants' => $participants, 'counter' => $counter],);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function show(Competition $competition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function edit(Competition $competition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Competition $competition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Competition $competition)
    {
        //
    }
}
