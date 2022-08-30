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
                <h1 class="pt-5 cdTitle">Registrati</h1>
                <h4 class="text-muted">Crea il tuo account admin</h4>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group row pt-4">
                        
                        <div class="col-6">
                            <label for="name" class="col-form-label">Nome</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-6">
                            <label for="email" class="col-form-label">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-6">
                            <label for="password" class="col-form-label">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="password-confirm" class="col-form-label">Conferma password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row pt-3">
                        <div class="col-12">
                            <button type="submit" class="btn cdBtnPrimary">
                                Registrati
                            </button>
                            <div class="pt-4 pb-4">
                                <span>oppure</span>
                                <a href="{{ url('/login') }}" class="text-muted text-decoration-none">
                                    <span>
                                        effettua il login
                                    </span>
                                </a>
                            </div>
                            <hr>
                            <div class="pt-4">
                                <a href="{{ url('/') }}" class="text-muted text-decoration-none">
                                    <i class="fa-solid fa-arrow-left-long"></i>
                                    <span>Torna all'area pubblica</span>
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
