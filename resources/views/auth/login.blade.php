@extends('main')

@section('titulo')
  Ingresar
@endsection


@section('css')
<link rel="stylesheet" href="css/login.css">
@endsection

@section('javascript')
<script src='js/jsLogin.js'></script>
@endsection


@section('contenido')
<h1>Inicio de sesion</h1>

<main class="contenedor-fieldset">
  <form action="/login" class="form-login" method="POST">
    {{ csrf_field() }}
    <fieldset class="datos">
      @if(count($errors) != 0)
      <span class="error">Cuenta/usuario incorrecto</span> <br>
      @endif
        <label>
            Email
            <input type="email" name="email" value="" placeholder="" class="email">
        </label>
        <label>
            Contraseña
            <input type="password" name="password" value="" placeholder="" class="password">
        </label>
        <label class="mantener">
          <input type="checkbox" name="remember">
          Mantener el inicio de sesion
        </label>
        <button type="submit" class="continuar-boton">Continuar</button>
        <p class="link-registrar">Aun no tienes cuenta? <a href="registrar">REGISTRATE</a></p>
        <div>
          <div class="logeo-redes">
            <p>Logueate tambien con:</p>
            <img src="images/gp.png" alt="">
            <img src="images/fb.jpg" alt="">
          </div>
        </div>
    </fieldset>
  </form>
</main>

@endsection
