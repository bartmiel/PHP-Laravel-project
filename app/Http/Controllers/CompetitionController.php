<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompetition;
use App\Http\Requests\UpsertCompetitionRequest;
use App\Models\Competition;
use App\Http\Controllers\Controller;
use App\Models\Distance;
use App\Models\UserDistance;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $competitions = Competition::with('distance')->where('isactive', '=', true)->where('isfinished', '=', false)->get();
        return view('home.competition', ['competitions' => $competitions]);
    }

    /**
     * Display the specified resource.
     *
     * @param  integer
     * @return View
     */
    public function details($competitionid)
    {
        $counter = 1;
        $competition = Competition::with('distance')->find($competitionid);
        $participants = DB::table('user_distances')
            ->leftjoin('distances', 'user_distances.distanceid', '=', 'distances.distanceid')
            ->leftjoin('users', 'user_distances.userid', '=', 'users.userid')
            ->select('users.lastname', 'users.firstname', 'users.city', 'users.clubname', 'distances.name')
            ->where('distances.competitionid', '=', $competitionid)
            ->orderby('users.lastname')->get();

        return view('home.competitionDetails', 
            ['distance' => $competition->distance,'competition' => $competition, 'participants' => $participants, 'counter' => $counter]);
    }

    public function signup(Request $request, $id)
    {
        $userDistance = new UserDistance();
        $userDistance->distanceid = $request->get('distanceSelect');
        $userDistance->userid = Auth::id();
        $userDistance->save();

        return redirect()->route('competition.details', ['id' => $id]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('home.addCompetition');
    }

    /**
     * Display the specified resource.
     *
     * @param  integer
     * @return RedirectResponse
     */
    public function destroy($competitionid): RedirectResponse
    {
        $competition = Competition::find($competitionid);
        $competition->isactive = false;
        $competition->save();
        return redirect('competition');
    }

    public function finish($competitionid): RedirectResponse
    {
        $competition = Competition::find($competitionid);
        $competition->isfinished = true;
        $competition->isregistrationactive = false;
        $competition->save();
        return redirect('competition');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, $this->competitionRules());
        $competition = new Competition();
        $competition->name = $request->input('name');
        $competition->location = $request->input('location');
        $competition->date = $request->input('date');
        $competition->time = $request->input('time');
        $competition->description = $request->input('description');
        $competition->save();

        $distances = $request->input('distances');
        foreach ($distances as $d) {
            $distance = new Distance();
            $distance->name = $d['name'];
            $distance->distancelimit = $d['distancelimit'];
            $competition->distance()->save($distance);
        }
        return redirect('competition');
    }

    public function registration($competitionid)
    {
        $competition = Competition::find($competitionid);
        if ($competition->isregistrationactive) {
            $competition->isregistrationactive = false;
        } else {
            $competition->isregistrationactive = true;
        }
        $competition->save();
        return redirect()->route('competition.details', ['id' => $competitionid]);
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
    public function edit($competitionid)
    {
        $competition = Competition::with('distance')->find($competitionid);
        return view('home.editCompetition', ['competition' => $competition]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, $this->competitionRules());
        $competition = Competition::with('distance')->find($id);
        $competition->name = $request->input('name');
        $competition->location = $request->input('location');
        $competition->date = $request->input('date');
        $competition->time = $request->input('time');
        $competition->description = $request->input('description');
        $competition->save();

        return redirect('competition');
    }
    
    public function getByQuery(Request $request)
    {
        $competitions = Competition::with('distance')
        ->where('isactive', '=', true)
        ->where('isfinished', '=', false)
        ->getQuery()
        ->where('name', 'LIKE', '%'.$request->searchInput.'%')
        ->get();
        
        return view('home.competition', ['competitions' => $competitions]);
    }

    private function competitionRules()
    {
        return [
            'name' => 'required|max:150',
            'location' => 'required|max:100',
            'date' => 'required|date|after:tomorrow',
            'time' => 'required',
            'description' => 'required|max:1500'
        ];
    }
}
