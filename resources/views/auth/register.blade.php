@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-6">
        <div class="card" style="border-radius: 15px;">
            <div class="card-header">{{ __('Register') }}</div>

            <div class="card-body ms-3 me-3">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3 row">
                        <div class="col-6">
                            <label for="firstname" class="form-label">{{ __('First name') }}</label>
                            <input id='firstname' type="text" name='firstname' required class="form-control  @error('firstname') is-invalid @enderror">

                            @error('firstname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="lastname" class="form-label">{{ __('Last name') }}</label>
                            <input id="lastname" type="text" name='lastname' required class="form-control  @error('lastname') is-invalid @enderror">
                        </div>

                        @error('lastname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3 row">
                        <label for="adres" class="form-label">{{ __('Adress') }}</label>
                        <div class="col-7">
                            <input id='city' type="text" name='city' class="form-control @error('city') is-invalid @enderror" placeholder="City">
                        </div>

                        @error('city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-1">
                        <label for="clubname" class="form-label">{{ __('Club name:') }}</label>
                        <input id='clubname' type="text" name="clubname" class="form-control @error('clubname') is-invalid @enderror">

                        @error('clubname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <hr />

                    <div class="row mb-3">
                        <label for="email" class="col-md-3 col-form-label text-end me-3">{{ __('E-Mail Address:') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-3 col-form-label text-end me-3">{{ __('Password:') }}</label>

                        <div class="col-md-4">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="password-confirm" class="col-md-3 col-form-label text-end me-3">{{ __('Confirm Password:') }}</label>

                        <div class="col-md-4">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col offset-md-4">
                            <button type="submit" class="w-50 btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection