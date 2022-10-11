@extends('layouts.master')

@section('title', 'Editar usuário')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                @if (auth()->user()->role === 'Administrador')
                    <h1>Editar usuário</h1>
                @elseif (auth()->user()->role === 'Vendedor')
                    <h1>Editar cliente</h1>
                @endif
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    @if (auth()->user()->role === 'Administrador')
                        <li class="breadcrumb-item"><a href="{{ route('app.users.list') }}">Usuários</a></li>
                    @elseif (auth()->user()->role === 'Vendedor')
                        <li class="breadcrumb-item"><a href="{{ route('app.users.list') }}">Clientes</a></li>
                    @endif
                    <li class="breadcrumb-item active">Editar</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content-main')
    <div class="container-fluid">
        <form method="post" action="{{ route('app.users.update', $userEdit->id) }}" autocomplete="off">
            @csrf
            @method('put')

            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="title" class="d-block">Ativo</label>
                        <input type="checkbox" name="active" id="active"
                            {{ $userEdit->active ? 'checked' : '' }}
                            data-bootstrap-switch
                            data-on-color="success"
                            data-on-text="Sim"
                            data-off-color="danger"
                            data-off-text="Não">
                    </div>

                    <div class="form-group">
                        <label for="name">Nome:</label>
                        <div class="input-group mb-3">
                            <input type="text" id="name" name="name" value="{{ old('name') ?? $userEdit->name }}"
                                class="form-control @error('name') is-invalid @enderror"
                                aria-describedby="name_validation">

                            @error('name')
                                <div id="name_validation" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <div class="input-group mb-3">
                            <input type="text" id="email" name="email" value="{{ old('email') ?? $userEdit->email }}"
                                class="form-control @error('email') is-invalid @enderror"
                                aria-describedby="email_validation">

                            @error('email')
                                <div id="email_validation" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    @if ($user->role === 'Administrador')
                        <div class="form-group">
                            <label for="role">Perfil:</label>
                            <select name="role" id="role" class="form-control @error('role') is-invalid @enderror"
                                aria-describedby="role-validation-feedback">
                                <option value=""></option>
                                @foreach($roles as $role)
                                    <option value="{{ $role }}" {{ option_selected('role', $role, $userEdit->role) }}>
                                        {{ $role }}
                                    </option>
                                @endforeach
                            </select>

                            @error('role')
                                <div id="role-validation-feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    @endif

                    @if ($user->role === 'Administrador' || $user->id === $userEdit->id)
                        <div class="form-group">
                            <label for="current_password">Senha atual:</label>
                            <div class="input-group mb-3">
                                <input type="password" id="current_password" name="current_password"
                                    class="form-control @error('current_password') is-invalid @enderror @error('password') is-invalid @enderror"
                                    aria-describedby="current_password_validation">

                                @error('current_password')
                                    <div id="current_password_validation" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-0">
                            <label for="password">Nova senha:</label>
                            <div class="input-group">
                                <input type="password" id="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror @error('current_password') is-invalid @enderror"
                                    aria-describedby="password_validation">

                                @error('password')
                                    <div id="password_validation" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    @endif
                </div>

                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-success">Salvar</button>

                    @if (has_role('Administrador'))
                        <button type="button"
                            data-toggle="modal"
                            data-target="#modal-delete"
                            class="btn btn-danger">Excluir</button>
                    @endif
                </div>
            </div>
        </form>
    </div>
@endsection

@section('content-outside')
    <div class="modal fade" id="modal-delete">
        <div class="modal-dialog">
            <form method="post" action="{{ route('app.users.destroy', $userEdit->id) }}">
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
                        <p class="mb-0 text-danger">{{ $userEdit->name }}</p>
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
    <!-- Bootstrap Switch -->
    <script src="{{ asset('assets/app/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
@endpush

@push('script-code')
    <script>
        $('#active').bootstrapSwitch()
    </script>
@endpush
