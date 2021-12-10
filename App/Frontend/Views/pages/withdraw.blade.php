@extends('layout')

@section('head')
    <title>Saque</title>
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
    <h1>Saque</h1>

    <form action="saque" method="post">
        <div class="form-group">
            <label for="">Qual o valor deseja sacar??</label>
            <small>Saldo disponivel em conta <strong>R$800,00</strong></small>
            <input type="text" name="amount" class="form-control my-3" placeholder="Valor">
        </div>
        <button type="submit" class="btn btn-primary my-3">Depositar</button>
    </form>
@endsection
