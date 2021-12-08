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

    <form>
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control my-3" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Senha</label>
            <input type="password" class="form-control my-3" id="exampleInputPassword1" placeholder="Senha">
        </div>
        <button type="submit" class="btn btn-primary my-3">Entrar</button>
    </form>
    <small id="emailHelp" class="form-text text-muted">Não possui uma conta ainda? clique <a href="">AQUI</a> para se cadastrar</small>
@endsection
