@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-4 cdLoginBackground">
            <img src="{{asset('img/logo-boolpress.png')}}" alt="Logo Boolpress" width="180" class="pt-5">
        </div>
        <div class="col-8 d-flex justify-content-center align-items-center">
            <div class="cdLoginWrapper">
                {{-- <img src="{{asset('img/logo-boolpress-dark.png')}}" alt="Logo Boolpress" width="200"> --}}
                <h1 class="pt-5 cdTitle">Resetta la password</h1>
                <h4 class="text-muted pb-4">Inserisci la mail associata al tuo account</h4>
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-6">
                                <label for="email" class="col-form-label">E-Mail</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-6">
                                <button type="submit" class="btn cdBtnPrimary">
                                    Invia reset password
                                </button>
                                <div class="pt-4">
                                    <a href="{{ url('/login') }}" class="text-muted text-decoration-none">
                                        <i class="fa-solid fa-arrow-left-long"></i>
                                        <span>Torna al login</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>


@endsection
