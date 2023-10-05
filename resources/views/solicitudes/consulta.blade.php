<x-layouts.app>
<br>
<br>
<!DOCTYPE html>
<html>
<head>
    <title>Consulta de Solicitud</title>
    <style>
        /* Estilos específicos para el formulario */
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        #formulario {
            margin: 50px auto;
            width: 300px;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
        #resultado {
            margin-top: 20px;
            background-color: #f0f0f0;
            padding: 10px;
            border-radius: 5px;
        }

       
    </style>
</head>
<body>
    <h1>Ingrese su número de radicado</h1>
    <div id="formulario">
        <form action="{{ route('solicitudes.consulta') }}" method="GET">
            @csrf
            <input type="text" name="numeroRadicado" id="numeroRadicado" placeholder="Número de radicado">
            <br>
            <input type="submit" value="Consultar">
        </form>
    </div>
    <div id="resultado">
        @if (isset($mensaje))
            <p>{{ $mensaje }}</p>
        @endif
    </div>
</body>
</html>



</x-layouts.app>
