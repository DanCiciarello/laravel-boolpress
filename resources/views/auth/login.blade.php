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
                <h1 class="pt-5 cdTitle">Effettua l'accesso</h1>
                <h4 class="text-muted">Accedi con il tuo account admin</h4>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group row pt-4">
                        
                        <div class="col-6">
                            <label for="email" class="col-form-label">E-Mail</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Inserisci la tua e-mail...">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-6">
                            <label for="password" class="col-form-label">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Inserisci la tua password...">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    Ricorda dati di accesso
                                </label>
                            </div>
                        </div>
                        <div class="col-6">
                            @if (Route::has('password.request'))
                                <a class="btn-link p-0" href="{{ route('password.request') }}">
                                    Password dimenticata?
                                </a>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row pt-3">
                        <div class="col-12">
                            <button type="submit" class="btn cdBtnPrimary">
                                Accedi
                            </button>
                            <div class="pt-4 pb-4">
                                <span>oppure</span>
                                <a href="{{ url('/register') }}" class="text-muted text-decoration-none">
                                    <span>
                                        registra un nuovo account
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
