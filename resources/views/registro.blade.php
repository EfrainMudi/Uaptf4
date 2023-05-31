<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario Registro</title>
    <style>
        body {
            background: white;
        }

        .form-register-container {
            display: flex;
            justify-content: center;
        }

        .form-register {
            width: 400px;
            background: #60866d;
            padding: 30px;
            margin-top: 100px;
            border-radius: 4px;
            font-family: 'calibri';
            color: white;
            box-shadow: 7px 13px 37px #000;
        }

        .form-register h4 {
            font-size: 22px;
            margin-bottom: 20px;
        }

        .controls {
            width: 100%;
            background: #ffffff;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 16px;
            border: 1px solid #265035;
            font-family: 'calibri';
            font-size: 18px;
            color: rgb(0, 0, 0);
        }

        .form-register p {
            height: 40px;
            text-align: center;
            font-size: 18px;
            line-height: 40px;
        }

        .form-register a {
            color: white;
            text-decoration: none;
        }

        .form-register a:hover {
            color: white;
            text-decoration: underline;
        }

        .form-register .botons {
            width: 100%;
            background: #1C3D14;
            border: none;
            padding: 12px;
            color: white;
            margin: 16px 0;
            font-size: 16px;
        }

        #registro-btn {
            width: 100%;
            background: #1C3D14;
            border: none;
            padding: 12px;
            color: white;
            margin: 16px 0;
            font-size: 16px;
            cursor: pointer;
        }

        #registro-btn:hover {
            background-color: #289625;
        }

        #registro-btn:active {
            background-color: #aadd1d;
        }

        .form-image-container {
            width: 20%;
            position: relative;
            margin-top: 120px;
            margin-right: 200px;
        }

        .form-image {
            position: relative;
            bottom: 0;
            left: 0;
            width: 100%;
            height: auto;
        }

        .form-image-text {
            position: relative;
            bottom: 10px;
            left: -70px;
            top: 50px;
            color: rgb(5, 5, 5);
            font-weight: bold;
            font-size: 100px;
            font-family: 'Arial';
        }
        .form-register-container {
            display: flex;
            justify-content: center;
            opacity: 0; 
            transition: opacity 3.5s ease; 
        }

        
        .form-register-container.show {
            opacity: 2;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .form-register-container {
                flex-direction: column;
                align-items: center;
            }

            .form-register {
                width: 90%;
                margin-top: 50px;
                margin-bottom: 50px;
            }

            .form-image-container {
                width: 50%;
                margin-right: 0;
                margin-bottom: 30px;
            }

            .form-image-text {
                font-size: 60px;
                left: -50px;
                top: 20px;
            }
        }
    </style>
</head>
<body>
    <form method= "POST" action="{{ route('validar-registro') }}">
        @csrf
    <div class="form-register-container">
        <div class="form-image-container">
            <img src="{{ asset('logo ua.png') }}" alt="Imagen UAPT" width= "320px" height= "300px" >
            <div class="form-image-text">UAPTForm </div>

        </div>
        <section class="form-register">
            <h4>Formulario Registro</h4>
            <input class="controls" type="text" name="name" id="name" placeholder="Ingrese su Nombre">
            <input class="controls" type="email" name="email" id="email" placeholder="Ingrese su Correo">
            <input class="controls" type="password" name="password" id="password" placeholder="Ingrese su Contraseña">
        <p>Estoy de acuerdo con <a href="#">Terminos y Condiciones</a></p>
        <button type="submit" id="registro-btn">Registro</button>

        <p><a href="{{route('ingreso')}}">¿Ya tengo Cuenta?</a></p>
    </section>
    </form>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
     @endif
     <script>
       
        window.addEventListener('load', function() {
            var formContainer = document.querySelector('.form-register-container');
            formContainer.classList.add('show');
        });
    </script>
</body>

</html>
