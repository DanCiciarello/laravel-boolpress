@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="pb-4">
                    <h1 class="cdTitle pt-3">Modifica post {{ $post->id }}</h1>
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
                <form action="{{ route('admin.posts.update', ['post' => $post->slug]) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="cover_img_file" class="form-label">Cover</label>
                        <div class="d-flex">
                            <img class="img-thumbnail" style="width: 150px" src="{{ asset('storage/' . $post->cover_img) }}">
                            <input type="file" name="cover_img"
                                class="form-control-file @error('cover_img') is-invalid @enderror" id="cover_img_file"
                                value="{{ old('cover_img') }}">
                        </div>
                        @error('cover_img')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Titolo</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                            placeholder="Inserisci il titolo del post..." value="{{ old('title', $post->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Contenuto</label>
                        <textarea name="content" class="form-control @error('content') is-invalid @enderror" rows="10"
                            placeholder="Inserisci il contenuto del post..." required>{{ old('content', $post->content) }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Tags</label>
                        <select type="text" name="tags[]" class="form-control @error('tags') is-invalid @enderror"
                            multiple>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}" {{ $post->tags->contains($tag) ? 'selected' : '' }}>
                                    {{ $tag->name }}</option>
                            @endforeach
                        </select>
                        @error('tags')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group pt-3">
                        <button type="submit" class="btn btn-success">
                            <i class="fa-solid fa-floppy-disk"></i> Aggiorna post
                        </button>
                        <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">
                            <i class="fa-solid fa-xmark"></i> Annulla
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

{{-- vpklmf --}}
