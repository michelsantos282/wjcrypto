@extends('layout')

@section('head')
    <title>Transferência</title>
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
    <h1>Transferência</h1>

    <form action="/transferencia" method="post">
        <div class="form-group">
            <label for="">Qual o valor da transferência?</label>
            <small>Saldo disponivel em conta <strong>R${{$balance}}</strong></small>
            <input type="text" name="amount" class="form-control my-3" placeholder="Valor">
        </div>
        <div class="form-group">
            <label for="">Para quem você quer transferir?</label>
            <input type="text" name="to_acc" class="form-control my-3"  placeholder="Conta">
        </div>
        <button type="submit" class="btn btn-primary my-3">Transferir</button>
    </form>
@endsection
