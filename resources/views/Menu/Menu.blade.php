<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<nav class="navbar fixed-top"  style="background-color:#84b6f4  ;">
  

</div>

    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img width="90" height="30" src="https://th.bing.com/th/id/R.d6ebd8615133da9ab2cb18f584d8449d?rik=aGC1%2bU%2bZXB6knA&riu=http%3a%2f%2ferp.dacesa.com.mx%2fimg%2flogo.png&ehk=Ovu%2fa%2bjmTbZ6Admuzsy7Qv5jlnndW61CxCjaZIWcz5I%3d&risl=&pid=ImgRaw&r=0" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Almacen</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          
            <li class="nav-item">
              <a class="nav-link" href="{{ route('asignacion') }}">Asignacion</a>
            </li>
            <li class="nav-item">
              <a class="nav-link"href="{{ route('devolucion') }}">Devolucion</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('altas_bajas') }}">Altas/Bajas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link"  href="{{ route('reportes') }}">Reportes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('Cerrarsesion') }}" >Cerrar sesion
              </a>
            </li>
          </ul>
         
        </div>
      </div>
    </div>
  </nav>
