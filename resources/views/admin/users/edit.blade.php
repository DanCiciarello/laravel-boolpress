@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="pb-4">
                <h1 class="cdTitle pt-3">Modifica utente {{ $user->id }}</h1>
            </div>
            <div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
            <form action="{{ route('admin.users.update', $user->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Inserisci il nome dell'utente..." value="{{ old('name', $user->name) }}" required>
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>E-Mail</label>
                    <input name="email" class="form-control @error('email') is-invalid @enderror" rows="10" placeholder="Inserisci l'email dell'utente..." value="{{ old('email', $user->email) }}" required>
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Indirizzo</label>
                    <input name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Inserisci l'indirizzo dell'utente..." value="{{ old('address', $user->details ? $user->details->address : '') }}" required>
                    @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Città</label>
                    <input name="city" class="form-control @error('city') is-invalid @enderror" rows="10" placeholder="Inserisci la città dell'utente..." value="{{ old('city', $user->details ? $user->details->city : '') }}" required>
                    @error('city')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Provincia</label>
                    <input name="province" class="form-control @error('province') is-invalid @enderror" rows="10" placeholder="Inserisci la provincia dell'utente..." value="{{ old('city', $user->details ? $user->details->province : '') }}" required>
                    @error('province')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Telefono</label>
                    <input name="phone" class="form-control @error('phone') is-invalid @enderror" rows="10" placeholder="Inserisci il numero dell'utente..." value="{{ old('city', $user->details ? $user->details->phone : '') }}" required>
                    @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group pt-3">
                    <button type="submit" class="btn btn-success">
                        <i class="fa-solid fa-floppy-disk"></i> Salva utente
                    </button>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                        <i class="fa-solid fa-xmark"></i> Annulla
                    </a>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection