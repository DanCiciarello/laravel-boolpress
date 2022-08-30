@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="cdRow row justify-content-center">
            <div class="col-12">
                <div class="pb-4">
                    <h1 class="cdTitle pt-3">Crea nuovo post</h1>
                </div>
                <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Titolo</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                            placeholder="Inserisci il titolo del post..." value="{{ old('title') }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Contenuto</label>
                        <textarea name="content" class="form-control @error('content') is-invalid @enderror" rows="10"
                            placeholder="Inserisci il contenuto del post..." required>{{ old('content') }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Tags</label>
                        <select type="text" name="tags[]" class="form-control @error('tags') is-invalid @enderror"
                            multiple>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">
                                    {{ $tag->name }}</option>
                            @endforeach
                        </select>
                        @error('tags')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="cover_img_file" class="form-label">Cover</label>
                        <div class="d-flex">
                            <input type="file" name="cover_img"
                                class="form-control-file @error('cover_img') is-invalid @enderror" id="cover_img_file"
                                value="{{ old('cover_img') }}">
                        </div>
                        @error('cover_img')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group pt-3">
                        <button type="submit" class="btn btn-success">
                            <i class="fa-solid fa-floppy-disk"></i> Crea post
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
