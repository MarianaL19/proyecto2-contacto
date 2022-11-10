<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{ asset('css/contactoStyle.css') }}">
    <title>Contacto</title>
</head>

<body>
    <div class="nav">
        <a href="landingpage">Enlace a Index</a>
        <a href="contacto">Enlace a formulario</a>
    </div>

    <div id="contenedorPrincipal">
        <div class="contenedor">
            <text id="titulo">CONTÁCTAME</text>

            <!-- Lista con todos los errores -->
            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <section class="cont-formulario">
                <form action="/recibe-form-contacto" method="post">
                    @csrf

                    @error('nombre')
                        <i>{{ $message }} </i><br>
                    @enderror
                    <label for="nombre">Nombre: <input type="text" name="nombre" value={{ $nombre ?? old('nombre') }}></label><br>
                    
                    @error('correo')
                        <i>{{ $message }} </i><br>
                    @enderror
                    <label for="correo">Correo: <input type="text" name="correo" value={{ $correo ?? old('correo') }}></label><br>
                    
                    @error('comentario')
                        <i>{{ $message }} </i><br>
                    @enderror
                    <label for="comentario">Comentario:</label><textarea name="comentario" id="comentario" rows="" cols="">{{ $comentario ?? old('comentario') }}</textarea>
                    <br>
                
                    <button type="submit" class="boton-enviar">Enviar</button>
                </form>
            </section>

        </div>
    </div>
</body>

</html>