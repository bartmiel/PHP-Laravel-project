@extends('layouts.app')

@section('content')
    <div class="container container-fluid">
        <div class="card shadow bg-light mt-4 p-4" style="border-radius: 15px;">
            <div class="mb-3">
                <h1 class="text-uppercase mx-auto">
                    {{ $competition->name }}
                </h1>
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
            </div>
            <hr>
            <div class="row mt-2">
                <form method="POST" name="form" class="row col-auto px-2 pb-3">
                    <div class="col-4">
                        <select class="form-select" name="distanceSelect" onchange='this.form.submit()'>
                            <option selected disabled>{{'distanceSelectedName'}} </option>
                            {{'distances'}}
                        </select>
                    </div>
                    <div class="col-4">
                        <input type="text" id="searchInput" placeholder="Find a participant..." class="form-control ">
                    </div>
                    <div class="col-4">
                        <button type="button" class="btn btn-secondary text-light rounded-pill" onclick="location.href='{{ route('result.home') }}'">Back to results</button>
                    </div>
                </form>
            </div>
            <div class="row">
                <table class="table table-hover">
                    <thead>
                    <th scope="col">#</th>
                    <th scope="col">Last name</th>
                    <th scope="col">First name</th>
                    <th scope="col">City</th>
                    <th scope="col">Club</th>
                    <th scope="col">Result</th>
                    </thead>
                    <tbody>
                    @foreach($participants as $participant)
                        <tr>
                            <th scope='row'>{{ $counter++ }}</th>
                            <td>{{ $participant->lastname }}</td>
                            <td>{{ $participant->firstname }}</td>
                            <td>{{ $participant->city }}</td>
                            <td>{{ $participant->clubname }}</td>
                            <td>{{ $participant->result }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
