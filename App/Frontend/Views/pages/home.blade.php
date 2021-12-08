@extends('layout')

@section('head')
    <title>Home</title>
@endsection

@if (isset($message))
    @section('alert')
        <div>
            {{ $message }}
        </div>
    @endsection
@endif

@section('content')
    <h1>Ultimas transações</h1>

    <div class="list-group">
        <div class="list-group-item my-3">
            <div class="d-flex w-100 justify-content-between ">
                <h5 class="mb-1">Tipo de Transação: Depósito</h5>
                <small>3 days ago</small>
            </div>
            <p class="mb-1">Quantia: R$1500,00</p>
            <p class="mb-1">Quantia: R$1500,00</p>
        </div>

        <div class="list-group-item my-3">
            <div class="d-flex w-100 justify-content-between ">
                <h5 class="mb-1">Tipo de Transação: Depósito</h5>
                <small>3 days ago</small>
            </div>
            <p class="mb-1">Quantia: R$1500,00</p>
            <p class="mb-1">Quantia: R$1500,00</p>
        </div>

        <div class="list-group-item my-3">
            <div class="d-flex w-100 justify-content-between ">
                <h5 class="mb-1">Tipo de Transação: Depósito</h5>
                <small>3 days ago</small>
            </div>
            <p class="mb-1">Quantia: R$1500,00</p>
            <p class="mb-1">Quantia: R$1500,00</p>
        </div>
    </div>
@endsection
