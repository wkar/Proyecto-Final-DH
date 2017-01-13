@extends('main')

@section('titulo')
  Registrar
@endsection


@section('css')
<link rel="stylesheet" href="css/registrar.css">
@endsection

@section('javascript')
<!--<script src='js/jsRegistrar.js'></script> -->
@endsection

@section('contenido')
<h1>Registrate</h1>

<main class="contenedor-fieldset">

<form action="/register" method="POST" class='form-reg'>
  {{ csrf_field() }}
    <fieldset class="datos">
      @foreach($errors->all() as $error)
      <span class="error">{{ $error }}</span> <br>
      @endforeach
        <label>
            Nombre
            <input type="text" name="name" value=''  class="name">
        </label>
        <label>
            Apellido
            <input type="text" name="lastname" value=''  class="apellido">
        </label>
        <label>
            Email
            <input type="email" name="email" value='' class="mail">
        </label>
        <label>
            Fecha de nacimiento
            <input type="date" name="nacimiento" value='' class="birthday">
        </label>
        <label>
            Contraseña
            <input type="password" name="password" value="" class="password">
        </label>
        <label>
            Repetir la contraseña
            <input type="password" name="password_confirmation" value="" class="passwordRepeat">
        </label>
        <section class="suscripciones">
            <div clas="susc">
                <input type="checkbox" name="avisos" value="1" class="checks">
                <div class="susc-datos">
                    <h6>Avisos</h6>
                    <p>Recibir avisos, recomendaciones y actualizaciones sobre productos, servicios, actualizaciones de Nexround y más.</p>
                </div>
            </div>
            <div class="susc">
                <input type="checkbox" name="ofertas" value="1" class="checks">
                <div class="susc-datos">
                    <h6>Ofertas de Nexround</h6>
                    <p>Recibir recomendaciones, lo más reciente, ofertas especiales y contenido exclusivo y más.</p>
                </div>
            </div>
            <div class="susc">
                <input type="checkbox" name="actualizaciones" value="1" class="checks">
                <div class="susc-datos">
                    <h6>Actualizaciones de Nexround News</h6>
                    <p>Recibe los mejores artículos y recomendaciones de Noticias de Nexround enviadas directamente a tu bandeja de entrada.</p>
                </div>
            </div>
        </section>
        <div class="clear"></div>
        <button type='submit' class="continuar-boton">Registrar</button>
    </fieldset>
  </form>
</main>

@endsection
