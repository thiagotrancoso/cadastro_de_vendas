@extends('layouts.master')

@section('title', 'Usuários')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Usuários</h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Usuários</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content-main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mb-3">
                <a href="" class="btn btn-primary">Cadastrar</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap table-valign-middle">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Ativo</th>
                                    <th>Perfil</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>Thiago Trancoso</td>
                                    <td>thiagostrn@gmail.com</td>
                                    <td>
                                        <i class="fas fa-user-check text-success"></i>
                                    </td>
                                    <td>Administrador</td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-primary">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>

                                        <a href="" class="btn btn-sm btn-danger">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>

                                {{-- @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if($user->active)
                                                <i class="fas fa-user-check text-success"></i>
                                            @else
                                                <i class="fas fa-user-times text-danger"></i>
                                            @endif
                                        </td>
                                        <td>{{ $user->getRoleNames()[0] }}</td>
                                        <td>
                                            <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>

                                            @if(auth()->user()->id !== $user->id)
                                                <a href="{{ route('admin.user.delete', $user->id) }}" class="btn btn-sm btn-danger">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>

                    {{-- @if ($users->hasPages())
                        <div class="card-footer">
                            {{ $users->links() }}
                        </div>
                    @endif --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content-outside')
@endsection

@push('style-link')
@endpush

@push('style-code')
@endpush

@push('script-link')
@endpush

@push('script-code')
@endpush
