@extends('layouts.master')

@section('title', "Dashboard")

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dashboard</h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Dashboard</li>
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
                    <div class="card-header">
                        <h3 class="card-title">Título</h3>
                    </div>

                    <div class="card-body">
                        Conteúdo
                    </div>

                    <div class="card-footer">
                        Rodapé
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
