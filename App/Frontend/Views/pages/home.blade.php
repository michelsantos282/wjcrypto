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
            @foreach($transactions as $transaction)
                <div class="list-group-item my-3">
                    <div class="d-flex w-100 justify-content-between ">
                        <h5 class="mb-1">Tipo de Transação: {{$transaction->type}}</h5>
                        <small>{{$transaction->date}}</small>
                    </div>
                    <p class="mb-1">Quantia: R${{$transaction->amount}}</p>
                   @if($transaction->type === "Transfer")
                        <p class="mb-1">Conta Origem: R${{$transaction->from_acc}}</p>
                        <p class="mb-1">Conta Destino: R${{$transaction->to_acc}}</p>
                   @endif
                </div>
            @endforeach
        </div>
@endsection
