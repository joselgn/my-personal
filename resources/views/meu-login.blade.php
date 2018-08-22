@extends('templateown.layout')
@section('title_txt', 'Laravel - Personal Login')

@section('content')
    <div class="links">
        Login:<br>
        <input id="username" name="username" value="" type="text"/><br><br>

        Senha:<br>
        <input id="username" name="username" value="" type="password"/><br><br>

        <input id="btnSubmit" name="btnSubmit" value="Entrar" type="submit" />
    </div>
@endsection
