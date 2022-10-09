@extends('layouts.master')

@section('title', 'Cadastrar usuário')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Cadastrar usuário</h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('app.users.list') }}">Usuários</a></li>
                    <li class="breadcrumb-item active">Cadastrar</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content-main')
    <div class="container-fluid">
        <form method="post" action="{{ route('app.users.store') }}" autocomplete="off">
            @csrf

            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nome:</label>
                        <div class="input-group">
                            <input type="text" name="name" id="name" value="{{ old('name') }}"
                                class="form-control @error('name') is-invalid @enderror"
                                aria-describedby="name-validation-feedback">

                            @error('name')
                                <div id="name-validation-feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <div class="input-group">
                            <input type="text" id="email" name="email" value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror"
                                aria-describedby="email-validation-feedback">

                            @error('email')
                                <div id="email-validation-feedback" class="invalid-feedback">
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
                                    <option value="{{ $role }}">
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

                    <div class="form-group mb-0">
                        <label for="password">Senha:</label>
                        <div class="input-group">
                            <input type="password" id="password" name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                aria-describedby="password-validation-feedback">

                            @error('password')
                                <div id="password-validation-feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </div>
        </form>
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
