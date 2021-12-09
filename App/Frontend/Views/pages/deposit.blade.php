@extends('layout')

@section('head')
    <title>Depósito</title>
@endsection

@if (isset($message))
@section('alert')
    <div>
        {{ $message }}
    </div>
@endsection
@endif

@section('content')
    <h1>Depósito</h1>

    <form>
        <div class="form-group">
            <label for="">Qual o valor deseja depositar??</label>
            <input type="text" name="amount" class="form-control my-3" placeholder="Valor">
        </div>
        <button type="submit" class="btn btn-primary my-3">Depositar</button>
    </form>
@endsection
