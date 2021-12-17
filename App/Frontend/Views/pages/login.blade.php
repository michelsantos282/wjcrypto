@extends('layout')

@section('head')
    <title>Login</title>
@endsection

@if (isset($message))
    @section('alert')
        <div>
            {{ $message }}
        </div>
    @endsection
@endif

@section('content')
    <h1>Login</h1>

    <form action="login" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Número da Conta</label>
            <input type="text" class="form-control my-3" name="acc_number" placeholder="Número da Conta">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Senha</label>
            <input type="password" class="form-control my-3" name="password" placeholder="Senha">
        </div>
        <button type="submit" class="btn btn-primary my-3">Entrar</button>
    </form>
    <small class="form-text text-muted">Não possui uma conta ainda? clique <a href="/cadastro">AQUI</a> para se cadastrar</small>
@endsection
