@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <form method="GET" action="{{ route('competition.update', ['id' => $competition->competitionid]) }}" name="form" class="card bg-light shadow col-7 p-4 mt-5" style="border-radius:15px;">
        @csrf

        <div class="mb-3 row">
            <div class="col-12">
                <label for="name" class="form-label">Event name:</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $competition->name }}">

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="mb-3 row">
            <div class="col-lg-6">
                <label for="location" class="form-label">Location:</label>
                <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" value="{{ $competition->location }}">

                @error('location')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="col-lg-3">
                <label for="date" class="form-label">Date:</label>
                <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" value="{{ $competition->date }}">

                @error('date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="col-lg-3">
                <label for="time" class="form-label">Start time:</label>
                <input type="time" name="time" class="form-control @error('time') is-invalid @enderror" value="{{ $competition->time }}">

                @error('time')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="mb-3 row">
            <div class="col-12">
                <label for="description" class="form-label">Description:</label>
                <textarea name="description" rows="6" maxlength="500" class="form-control @error('description') is-invalid @enderror">{{ $competition->description }}</textarea>

                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="mb-3 row" id="distances">
            @foreach($competition->distance as $key => $value)
            <div class="row mt-2">
                <div class="col-9">
                    @if($key == 0)<label for="name" class="form-label">Distance name:</label>@endif
                    <input type="text" name="distances[{{$key}}][name]" class="form-control" value="{{ $value->name }}" disabled>
                </div>

                <div class="col-3">
                    @if($key == 0)<label for="distancelimit" class="form-label">Participant limit(m):</label>@endif
                    <input type="number" name="distances[{{$key}}][distancelimit]" class="form-control" value="{{ $value->distancelimit }}" disabled>
                </div>
            </div>
            @endforeach
        </div>
        <div class="mb-3 row">
        <div class="col-6">
                <a type="button" class="w-100 btn btn-secondary mb-2 mt-3" onclick="location.href='{{ route('competition.home') }}'">Back to competitions</a>
            </div>
            <div class="col-6">
                <button type="submit" class="w-100 btn btn-primary mb-2 mt-3">Save changes</button>
            </div>
        </div>
    </form>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="/js/addCompetition.js"></script>
@endsection