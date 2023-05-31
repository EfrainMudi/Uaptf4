<!DOCTYPE html>
<html>
  <head>
    <title>Forms</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
      }
  
      h2 {
        text-align: center;
      }
  
      header {
        background-color: #60866d;
      color: #fff;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0px;
      }
  
      .logo img {
        height: 110px;
      }
      .logo-imagen {
      position: relative;
      top: 25px;
      right: -25px;
    }
    .kuako-imagen {
      width: 110vw;
      max-width: 110px;
      min-width: 30px;
      margin: auto;
      top: -285px;
      right: -370px;
    }
  
      nav ul {
        list-style: none;
        margin: 0;
        padding: 0;
      }
  
      nav li {
        display: inline-block;
        margin-right: 20px;
      }
  
      nav li:last-child {
        margin-right: 0;
      }
  
      nav a {
        color: #fff;
        text-decoration: none;
        font-size: 25px;
      text-shadow: -1px -1px 1px #1d1d1d, 0px 0px 0px rgba(93, 91, 91, 0.5);
    
      }
  
      nav a:hover {
        text-decoration: underline;
      }
  
      .container {
        max-width: 960px;
        margin: 0 auto;
        padding: 40px 20px;
      }
  
      .create-form {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        text-shadow: 0px 0px 0px #505050, 0px 0px 1px rgba(0, 0, 0, 0.5);
      }
  
      .create-form h2 {
        margin-top: 0;
      }
  
      .create-form form {
        display: flex;
        align-items: center;
      }
  
      .create-form label {
        margin-right: 10px;
      }
  
      .logo-image-text {
        position: relative;
      bottom: 10px;
      left: 150px;
      top: -60px;
      color: rgb(255, 255, 255);
      font-weight: bold;
      font-size: 50px;
      font-family: 'Arial';
      text-shadow: 2px 1px 1px #3d3b3b, 1px 4px 10px rgba(0, 0, 0, 0.5), 1px 6px 5px rgba(0, 0, 0, 0.7),
        0px 0px 100px rgba(0, 0, 0, 0.4);
      }
  
      #crea-btn {
        width: 100%;
        background: #1C3D14;
        border: none;
        padding: 12px;
        color: white;
        margin: 16px 0;
        font-size: 16px;
        cursor: pointer;
        text-shadow: 2px 1px 1px #3d3b3b, 1px 4px 10px rgba(0, 0, 0, 0.5), 1px 6px 5px rgba(0, 0, 0, 0.7),
        0px 0px 100px rgba(0, 0, 0, 0.4);
      }
  
      #crea-btn:hover {
        background-color: #306822;
      }
  
      #crea-btn:active {
        background-color: #1C3D14;
      }
  
      .carrusel-container {
        width: 100%;
        max-width: 600px;
        height: 300px;
        overflow: hidden;
        position: relative;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin: 0 auto;
      }
  
      .carrusel-slide {
        width: 100%;
        height: 100%;
        display: flex;
        position: absolute;
        transition: transform 0.5s ease-in-out;
      }
  
      .carrusel-slide a {
        flex: 1 0 100%;
        text-align: center;
        text-decoration: none;
        font-size: 24px;
        color: white;
        background-color: #333;
        display: flex;
        align-items: center;
        justify-content: center;
      }
  
      .carrusel-navigation {
        display: flex;
        justify-content: center;
        margin-top: 10px;
      }
  
      .carrusel-navigation button {
        background-color: #333;
        color: white;
        border: none;
        padding: 8px 16px;
        margin: 0 5px;
        cursor: pointer;
        border-radius: 5px;
      }
  
      /* Responsive Styles */
      @media (max-width: 600px) {
        header {
          flex-direction: column;
          align-items: center;
        }
  
        .logo img {
          margin-bottom: 10px;
        }
  
        nav ul {
          margin-top: 10px;
        }
  
        .container {
          padding: 20px;
        }
  
        .carrusel-container {
          height: 200px;
        }
  
        .carrusel-slide a {
          font-size: 18px;
        }
      }
        </style>
  </head>
  <body>
    <header>
      <div class="logo">

        <img class="logo-imagen" src="logo ua.png" alt="Imagen UAPT">
        <div class="logo-image-text">UAPTForm </div>
      </div>
      <nav>
        <ul>
          @auth CUENTA= {{Auth::user()->name }} @endauth
          <li><a href="#">Formularios</a></li>
          <li><a href="#">Respuestas</a></li>
          <li><a href="#">Configuración</a></li>
        </ul>
      </nav>
    </header>
    <main>
      <div class="container">
        <div class="create-form">
          <h2>Crear formulario</h2>
          <form action="{{route('nuevoform')}}" method="get">

            <button type="submit" id="crea-btn" >Crear</button>
          </form>
        </div>
        <div class="form-list">
          <h2>Tus formularios</h2>
          <ul>

            <div class="carrusel-container">
                <div class="carrusel-slide">
                  @foreach($formularios as $formulario)

                    <a href="{{ Route('contestaform', $formulario) }}"> {{ $formulario->nombref }}</a>
                  @endforeach
                </div>
            </div>

            <div class="carrusel-navigation">
              <button id="prevBtn">Anterior</button>
              <button id="nextBtn">Siguiente</button>
            </div>

            <script>
              // Carrusel automático
              var carrusel = document.querySelector('.carrusel-slide');
              var enlaces = carrusel.querySelectorAll('a');
              var prevBtn = document.getElementById('prevBtn');
              var nextBtn = document.getElementById('nextBtn');

              var currentIndex = 0;

              function showSlide(index) {
                carrusel.style.transform = `translateX(-${index * 100}%)`;
              }

              function nextSlide() {
                currentIndex = (currentIndex + 1) % enlaces.length;
                showSlide(currentIndex);
              }

              function prevSlide() {
                currentIndex = (currentIndex - 1 + enlaces.length) % enlaces.length;
                showSlide(currentIndex);
              }

              nextBtn.addEventListener('click', nextSlide);
              prevBtn.addEventListener('click', prevSlide);

              // Iniciar el carrusel
              showSlide(currentIndex);
            </script>
          </ul>
        </div>
      </div>
    </main>
    <div class="kuako">
      <img class="kuako-imagen" src="kuako.png" alt="Imagen kuako">
    </div>
  </body>
</html>
