@extends('layouts.app')

@section('content')
<div class="shadow-box mb-4 p-4" style="border-radius: 15px;">
    <form method="GET" action="{{ route('competition.getByQuery') }}" >
        @csrf
        <div class="row">
            @if (Auth::user()->isadmin)
            <div class="col-2">
                <a class="btn btn-lg btn-outline-light" href="{{ route('addCompetition.home') }}">
                    <i class="bi bi-plus me-2"></i>{{__('New event')}}
                </a>
            </div>
            @endif
            <div class="col-1">
                <button type="submit" class="btn btn-lg btn-outline-light" style="border-radius: 65px;">
                    <i class="bi bi-search me-2"></i>
                </button>
            </div>
            <div class="col">
                <input type="text" name="searchInput" placeholder="Search competition..." class="form-control form-control-lg w-100">
            </div>
        </div>
    </form>
</div>
@foreach($competitions as $competition)
<section class="card shadow bg-light mb-4" style="border-radius: 15px;">
    <div class="row py-4 px-3">
        <div class="col border-end">
            <div class="col text-center">
                <h2 style="font-size: 60px " class="mb-0 font-weight-bold">
                    {{ date('d', strtotime($competition->date)) }}
                </h2>

                <div style="font-size: 18px">
                    {{ date('F', strtotime($competition->date)) }}
                </div>
                <div style="font-size: 18px">
                    {{ date('l', strtotime($competition->date)) }}
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="text-dark" style="font-size: 28px">
                <a href="{{ route('competition.details', ['id' => $competition->competitionid]) }}" class="text-decoration-none text-dark">{{ $competition->name }}</a>
            </div>
            <div class="text-dark" style="font-size: 14px">
                <i class="bi bi-clock me-2"></i>Start time: {{date('G:i', strtotime($competition->time)) }}
            </div>
            <div class="text-dark" style="font-size: 20px">
                {{ $competition->location }}
            </div>
            <div class="row">

            </div>
        </div>

        <div class="col-2 d-flex flex-row-reverse align-self-center">
            @if($competition->isregistrationactive)
            <span class="bg-success badge badge-pill text-light w-75 align-middle text-uppercase">
                <small>Registration enabled</small>
            </span>
            @else
            <span class="bg-danger badge badge-pill text-light w-75 align-middle text-uppercase">
                <small>Registration disabled</small>
            </span>
            @endif
        </div>

        <div class="col-2 d-flex flex-row-reverse align-items-center border-end">
            <button class="btn btn-outline-danger rounded-pill mx-2" onclick="location.href='{{ route('competition.destroy', ['id' => $competition->competitionid]) }}'">
                <i class="bi bi-trash3-fill"></i>
            </button>
            <button class="btn btn-outline-info rounded-pill me-3 mx-2" onclick="location.href='{{ route('competition.edit', ['id' => $competition->competitionid]) }}'">
                <i class="bi bi-pencil-fill" aria-hidden="true"></i>
            </button>
        </div>
        <div class="col-2 d-flex flex-row-reverse align-items-center ps-4">
            <div>
                <button class="btn btn-outline-dark rounded-pill mb-3" onclick="location.href='{{ route('competition.details', ['id' => $competition->competitionid]) }}'">
                    <i class="bi bi-arrow-right me-2" aria-hidden="true"></i>
                    Go to the event
                </button>
                @if (Auth::user()->isadmin)
                <button class="btn btn-outline-dark rounded-pill mb-3" onclick="location.href='{{ route('competition.finish', ['id' => $competition->competitionid]) }}'">
                    <i class="bi bi-check-lg me-2" aria-hidden="true"></i> Move to results
                </button>
                @endif
            </div>
        </div>
    </div>
    </div>
</section>
@endforeach
@endsection