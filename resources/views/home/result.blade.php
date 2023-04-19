@extends('layouts.app')

@section('content')
    <div class="shadow-box mb-4 p-4" style="border-radius: 15px;">
        <div class="row">
            <div class="col-1">
                <a class="btn btn-lg btn-outline-light" style="border-radius: 65px;">
                    <i class="bi bi-search me-2"></i>
                </a>
            </div>
            <div class="col">
                <input type="text" id="searchInput" placeholder="Search competition..." class="form-control form-control-lg w-100">
            </div>
        </div>
    </div>
    @foreach($competitions as $competition)
        <section class="card shadow bg-light border-0 mb-4 container-fluid" style="border-radius: 15px;">
            <div class="row py-4 px-3">
                <div class="col-2 border-end">
                    <div class="text-center">
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

                <div class="col-7">
                   <div class="text-dark" style="font-size: 28px">
                      <a href="{{ route('result.details', ['id' => $competition->competitionid]) }}" class="text-decoration-none text-dark">{{ $competition->name }}</a>
                   </div>

                    <div class="text-dark" style="font-size: 20px">
                       {{ $competition->location }}
                    </div>

                    <div class="align-items-center mt-2">
                        <span class="badge badge-pill bg-dark text-light px-3">100</span>
                    </div>
                </div>

                <div class="col-3 d-flex flex-row-reverse align-items-center pe-5">
                    <button class="btn btn-outline-dark rounded-pill " onclick="location.href='{{ route('result.details', ['id' => $competition->competitionid]) }}'">
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        Go to results
                    </button>
                </div>
            </div>
        </section>
    @endforeach
@endsection
