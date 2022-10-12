@extends('layouts.master')

@section('title', 'Produtos')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Podutos</h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Produtos</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content-main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap table-valign-middle">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Preço</th>
                                    <th>Ativo</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>R$ {{ number_format($product->price, 2, ',', '.') }}</td>
                                        <td>
                                            @if($product->active)
                                                <i class="fas fa-eye text-success"></i>
                                            @else
                                                <i class="fas fa-eye-slash text-danger"></i>
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            <a href="#" class="btn btn-primary">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>

                                            <button type="button"
                                                data-toggle="modal"
                                                data-target="#modal-delete"
                                                data-user-id="{{ $product->id }}"
                                                data-user-name="{{ $product->name }}"
                                                class="btn btn-danger"
                                                ><i class="far fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    @if ($products->hasPages())
                        <div class="card-footer">
                            {{ $products->links() }}
                        </div>
                    @endif
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
