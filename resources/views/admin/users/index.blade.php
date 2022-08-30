@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div>
                    <h1 class="cdTitle pb-4 pt-3">Tutti gli utenti</h1>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>E-Mail</th>
                            <th class="cdTextRight">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <div class="d-flex justify-content-end">
                                        @if(Auth::user()->role === "admin")
                                        {{-- <a class="btn cdBtnView btn-sm d-flex align-items-center justify-content-center"
                                            href="{{ route('admin.posts.show', ['post' => $post->slug]) }}">
                                            <i class="fa-regular fa-eye"></i>
                                        </a> --}}
                                        <a class="btn cdBtnEdit btn-sm d-flex align-items-center justify-content-center"
                                            href="{{ route('admin.users.edit', $user->id) }}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        {{-- <form class="d-inline-block form-delete"
                                            action="{{ route('admin.posts.destroy', ['post' => $post->slug]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn cdBtnDelete btn-sm d-flex align-items-center justify-content-center">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </form> --}}
                                        @endif    
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
