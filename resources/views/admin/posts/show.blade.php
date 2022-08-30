@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="pb-4">
                    <h1 class="cdTitle pt-3">Visualizzazione post {{ $post->id }}</h1>
                </div>
                <dl>
                    <dt>Cover:</dt>
                    <img src="{{ asset('storage/' . $post->cover_img) }}" alt="{{ 'Image of ' . $post->title }}" class="pb-4">
                    <dt>Titolo:</dt>
                    <dd class="pb-3">{{ $post->title }}</dd>
                    <dt>Slug:</dt>
                    <dd class="pb-3">{{ $post->slug }}</dd>
                    <dt>Autore:</dt>
                    <dd class="pb-3">{{ $post->user->name }}</dd>
                    <dt>Tags:</dt>
                    <dd class="pb-3">{{ $post->tags->implode('name', ' - ') }}</dd>
                    <dt>Contenuto:</dt>
                    <dd class="pb-3">{{ $post->content }}</dd>

                </dl>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">
                    <i class="fa-solid fa-arrow-left"></i> Torna indietro
                </a>
                <a href="{{ route('admin.posts.edit', ['post' => $post->slug]) }}" class="btn cdBtnEdit">
                    <i class="fa-solid fa-pen-to-square"></i> Modifica
                </a>
                <form class="d-inline-block form-delete" action="{{ route('admin.posts.destroy', ['post' => $post->slug]) }}"
                    method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn cdBtnDelete">
                        <i class="fa-solid fa-trash-can"></i> Elimina
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
