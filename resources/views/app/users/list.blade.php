@extends('layouts.master')

@section('title', 'Usuários')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                @if (auth()->user()->role === 'Administrador')
                <h1>Usuários</h1>
                @elseif (auth()->user()->role === 'Vendedor')
                    <h1>Clientes</h1>
                @endif
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    @if (auth()->user()->role === 'Administrador')
                        <li class="breadcrumb-item active">Usuários</li>
                    @elseif (auth()->user()->role === 'Vendedor')
                        <li class="breadcrumb-item active">Clientes</li>
                    @endif
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content-main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mb-3">
                <a href="{{ route('app.users.create') }}" class="btn btn-primary">Cadastrar</a>
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
                                @foreach($users as $user)
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
                                        <td>{{ $user->role }}</td>
                                        <td class="text-right">
                                            <a href="{{ route('app.users.edit', $user->id) }}" class="btn btn-primary">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>

                                            @if(auth()->user()->id !== $user->id && has_role('Administrador'))
                                                <button type="button"
                                                    data-toggle="modal"
                                                    data-target="#modal-delete"
                                                    data-user-id="{{ $user->id }}"
                                                    data-user-name="{{ $user->name }}"
                                                    class="btn btn-danger"
                                                    ><i class="far fa-trash-alt"></i></button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    @if ($users->hasPages())
                        <div class="card-footer">
                            {{ $users->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content-outside')
    <div class="modal fade" id="modal-delete">
        <div class="modal-dialog">
            <form method="post" action="{{ route('app.users.destroy', 0) }}">
                @csrf
                @method('delete')

                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Excluir usuário</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <p>Tem certeza que deseja excluir essae usuário?</p>
                        <p id="modal-user-name" class="mb-0 text-danger"></p>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('style-link')
@endpush

@push('style-code')
@endpush

@push('script-link')
@endpush

@push('script-code')
    <script>
        $(document).ready(function() {
            $('#modal-delete').on('show.bs.modal', function (event) {
                let button = $(event.relatedTarget)
                let userId = button.data('user-id')
                let userName = button.data('user-name')
                let modal = $(this)
                let form = modal.find('form')
                let actionUrl = form.attr('action')

                actionUrl = actionUrl.substring(0, actionUrl.length - 1)
                actionUrl = `${actionUrl}${userId}`

                form.attr('action', actionUrl)
                modal.find('#modal-user-name').text(userName)
            })
        })
    </script>
@endpush
