@extends('layout')

@section('head')
    <title>Transferência</title>
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

    <form>
        <div class="form-group">
            <label for="">Qual o valor da transferência?</label>
            <small>Saldo disponivel em conta <strong>R$800,00</strong></small>
            <input type="text" name="amount" class="form-control my-3" placeholder="Valor">
        </div>
        <div class="form-group">
            <label for="">Para quem você quer transferir?</label>
            <input type="text" class="form-control my-3"  placeholder="Conta">
        </div>
        <button type="submit" class="btn btn-primary my-3">Transferir</button>
    </form>
@endsection
