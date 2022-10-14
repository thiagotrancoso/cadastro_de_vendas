@extends('layouts.master')

@section('title', 'Cadastrar produto')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Cadastrar produto</h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('app.products.list') }}">Produtos</a></li>
                    <li class="breadcrumb-item active">Cadastrar</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content-main')
    <div class="container-fluid">
        <form method="post" action="{{ route('app.products.store') }}" autocomplete="off">
            @csrf

            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="title" class="d-block">Ativo</label>
                        <input type="checkbox" name="active" id="active"
                            checked
                            data-bootstrap-switch
                            data-on-color="success"
                            data-on-text="Sim"
                            data-off-color="danger"
                            data-off-text="Não">
                    </div>

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
                        <label for="price">Preço:</label>
                        <div class="input-group">
                            <input type="string" id="price" name="price" value="{{ old('price') }}"
                                class="form-control @error('price') is-invalid @enderror"
                                aria-describedby="price-validation-feedback">

                            @error('price')
                                <div id="price-validation-feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Descrição:</label>
                        <div class="input-group">
                            <textarea
                                name="description"
                                id="description"
                                rows="10"
                                class="form-control @error('description') is-invalid @enderror"
                                aria-describedby="description-validation-feedback"
                            >{{ old('description') }}</textarea>

                            @error('description')
                                <div id="description-validation-feedback" class="invalid-feedback">
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
    <!-- Bootstrap Switch -->
    <script src="{{ asset('assets/app/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
@endpush

@push('script-code')
    <script>
        $('#active').bootstrapSwitch()
    </script>
@endpush
