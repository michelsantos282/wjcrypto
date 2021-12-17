@extends('layout')

@section('head')
    <title>Home</title>
@endsection

@section('balance')
    <span>Saldo em Conta: <strong>R${{$balance}}</strong></span>
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
        @foreach($transactions as $transaction)
            <div class="list-group-item my-3">
                <div class="d-flex w-100 justify-content-between ">
                    <h5 class="mb-1">Tipo de Transação: {{$transaction->type}}</h5>
                    <small>{{$transaction->date}}</small>
                </div>
                <p class="mb-1">Quantia: <strong>R${{$transaction->amount}} </strong> </p>
                @if($transaction->type === "Transferencia")
                    <p class="mb-1">Conta Origem:<strong>R${{$transaction->from_acc}}</strong> </p>
                    <p class="mb-1">Conta Destino:<strong>R${{$transaction->to_acc}}</strong> </p>
                @endif
            </div>
        @endforeach
    </div>
@endsection
