@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div>
                    <h1 class="cdTitle pt-3">Tutti i post</h1>
                </div>
                <div class="d-flex justify-content-end pt-4 pb-4">
                    <a href="{{ route('admin.posts.create') }}" class="btn cdBtnPrimary">
                        Crea nuovo post
                    </a>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titolo</th>
                            <th>Slug</th>
                            <th>Autore</th>
                            <th>Tags</th>
                            <th class="cdTextRight">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->slug }}</td>
                                <td>{{ $post->user->name }}</td>
                                <td><div>{{ $post->tags->implode('name', ' - ') }}</div></td>
                                <td>
                                    <div class="d-flex justify-content-end">
                                        <a class="btn cdBtnView btn-sm d-flex align-items-center justify-content-center"
                                            href="{{ route('admin.posts.show', ['post' => $post->slug]) }}">
                                            <i class="fa-regular fa-eye"></i>
                                        </a>
                                        <a class="btn cdBtnEdit btn-sm d-flex align-items-center justify-content-center"
                                            href="{{ route('admin.posts.edit', ['post' => $post->slug]) }}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <form class="d-inline-block form-delete"
                                            action="{{ route('admin.posts.destroy', ['post' => $post->slug]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn cdBtnDelete btn-sm d-flex align-items-center justify-content-center">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$posts->links()}}
            </div>
        </div>
    </div>
@endsection
