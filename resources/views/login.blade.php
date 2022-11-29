<x-header />

@if (session("error"))
    <div class="alert alert-danger msg">{{ session("error") }}</div>
@endif

<div class="authBox">
    <img src="img/top-image-form-auth.png" alt="User" class="user">
    <h2>Login</h2>

    <form action="{{route("auth.auth")}}" method="post">
        @csrf
        <input type="hidden" name="type" value="login">

        <p>E-mail</p>
        <input type="email" name="email" id="email" placeholder="Insira seu E-mail" required>

        <p>Senha</p>
        <input type="password" name="password" id="password" placeholder="Insira sua Senha" required>

        <input type="submit" value="Entrar">
    </form>
</div>

<div class="system-acess">
    <a href="{{ url('/') }}">Voltar</a>
</div>

<style>
    .alert{
        z-index: 99;
        margin-top: 1vh
    }
</style>