<header>
  <div class="contenedor-header">
    @yield('contenido-header', '')
    <div class="encabezado">
      <div class="contenido-encabezado">
        <div class="rutas">
          <ul>
            <li><a href="/index">Home</a></li>
            <li><a href="/faq">Faq</a></li>
            <li><a href="/listado">Productos</a></li>
            <li><a href="#">Contacto</a></li>
          </ul>
        </div>
        <div class="busqueda">
          <img src="/images/logo.png" alt="" class="logo-header">
          <form action="/listado" method="get">
              <p class="grnd"><a href="/index" class="link-nombre">Ü-bid</a></p>
              <input type="text" placeholder="busqueda..." name="s">
              <button type = "submit">Buscar</button>
          </form>
        </div>
        <div class="header-links">
          @if(Auth::check())
          <ul>
            <li><a href="/inventario" class="boton-login">{{ Auth::user()->name }} {{Auth::user()->lastname}}</a></li>
            <li><a class='inventario' href="/inventario">Mis Productos</a></li>
          </ul>
          <a href="/logout" class="boton-reg">Salir</a>
          @else
          <a href="/register" class="boton-reg">Registrarse</a>
          <a href="/login" class="boton-reg">Ingresar</a>
          @endif
          <a href="" class="icono-menu">&#9776</a>
        </div>
        <div class="desplegable-menu">
          <ul>
            <li><a href="" class="btn-ingr-desp">Ingresar</a><a href="" class="btn-reg-desp">Registrarse</a></li>
            <li><a href="">Home</a></li>
            <li><a href="">Productos</a></li>
            <li><a href="">Contacto</a></li>
            <li><a href="">Log in</a></li>
            <li><a href="">FAQ</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</header>
