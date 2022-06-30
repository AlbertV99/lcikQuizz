<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <link rel="stylesheet" type="text/css" href="CSS/estilo.css">
        <style media="screen">
            .contenedor{
                height: 100vh;
                display: grid;
                grid-template-columns: repeat(12, [col-start] 1fr);
                grid-auto-rows: 50px;
                grid-gap: 10px;
            }
            #boton1{
                grid-column: col-start 3/ span 8;
                grid-row: 2/5

            }
            #boton2{
                grid-column: col-start 3/ span 8;
                grid-row: 6/9

            }
        </style>
        <script src="JS/jquery-3.4.1.js" charset="utf-8"></script>
        <!-- <script
  			  src="https://code.jquery.com/jquery-3.4.0.js"
  			  integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo="
  			  crossorigin="anonymous"></script> -->
        <meta charset="utf-8">
        <title></title>
    </head>
    <body >
        <div class="contenedor">
            <button type="button" class="boton" name="button" id='boton1' onclick="redireccionar('dificultad.php')">INICIAR</button>
            <button type="button" class="boton" name="button" id='boton2' onclick="redireccionar('Instrucciones.php')">INSTRUCCIONES</button>
        </div>
    </body>
    <script type="text/javascript">
        function redireccionar(url){
            window.location=url;
        }
    </script>
</html>
