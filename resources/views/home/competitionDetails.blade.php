@extends('layouts.app')

@section('content')
    <div class="container container-fluid">
        <div class="card shadow bg-light mt-4 p-4" style="border-radius: 15px;">
            <div class="mb-3">
                <h1 class="text-uppercase mx-auto">{{ $competition->name }}</h1>
            </div>
            <div class="row row-cols-auto text-left">
                <div class="col border-end border-secondary">
                    <h5 class="text-secondary text-uppercase">Date of event:</h5>
                    <h4 class="text-uppercase mx-auto">{{ date("j.m.Y", strtotime($competition->date)) }}</h4>
                </div>
                <div class="col">
                    <h5 class="text-secondary text-uppercase">Location:</h5>
                    <h4 class="text-uppercase mx-auto">{{ $competition->location }}</h4>
                </div>
                <div class="col border-start border-secondary">
                    <h5 class="text-secondary text-uppercase">Limit of participants:</h5>
                    <h4 class="text-uppercase mx-auto">{{ "LIMIT" }}</h4>
                </div>
            </div>
            <hr>
            <div class="row mt-2">
                <h5 class="text-secondary text-uppercase mx-auto">Description:</h5>
                <p>{{ $competition->description }}</p>
            </div>
            <hr>
            <div class="row mb-3">
                    <div class="row row-cols-auto">
                        @if(($competition->isregistrationactive) && !(Auth::user()->isadmin))
                        <form method="POST" action="{{ route('competition.signup', ['id' =>  $competition->competitionid ] ) }}">
                            @csrf
                            <div class="col">
                                <select class="form-select" name="distanceSelect">
                                    <option selected>Wybierz dystans</option>
                                    @foreach ($distance as $d)
                                        <option value="{{ $d->distanceid }}">{{ $d->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col mt-2">
                                <button type="submit" class="w-100 btn btn-primary">Zapisz się</button>
                            </div>
                        </form>
                        @elseif(!($competition->isregistrationactive) && !(Auth::user()->isadmin))
                            <div>
                                <h5><span class="badge bg-danger text-uppercase">Registration disabled</span></h5>
                            </div>
                        @else(Auth::user()->isadmin)
                        <div class="d-flex">
                                @if($competition->isregistrationactive)
                                    <button class="btn btn-warning rounded-pill" onclick="location.href='{{ route('registration.home', ['id' => $competition->competitionid]) }}'">
                                        <i class="fa fa-pause me-2" aria-hidden="true"></i> Close registration
                                    </button>
                                @else
                                    <button class="btn btn-info rounded-pill" onclick="location.href='{{ route('registration.home', ['id' => $competition->competitionid]) }}'">
                                        <i class="fa fa-play me-2" aria-hidden="true"></i> Open registration
                                    </button>
                                @endif
                        </div>
                        @endif
                            <div class="ms-3 mt-1">
                                <button type="button" class="btn btn-outline-secondary text-gray rounded-pill" onclick="location.href='{{ route('competition.home') }}'">Back to competitions</button>
                            </div>
                    </div>
            </div>
            <div class="container border-top">
                <table class="table table-hover">
                    <thead>
                    <th scope="col">#</th>
                    <th scope="col">Last name</th>
                    <th scope="col">First name</th>
                    <th scope="col">City</th>
                    <th scope="col">Club</th>
                    <th scope="col">Distance</th>
                    </thead>
                    <tbody>
                    @foreach($participants as $participant)
                    <tr>
                        <th scope='row'>{{ $counter++ }}</th>
                        <td>{{ $participant->lastname }}</td>
                        <td>{{ $participant->firstname }}</td>
                        <td>{{ $participant->city }}</td>
                        <td>{{ $participant->clubname }}</td>
                        <td>{{ $participant->name }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
