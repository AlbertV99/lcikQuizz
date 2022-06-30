<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <link rel="stylesheet" type="text/css" href="CSS/estilo.css">
        </style>
        <style media="screen">

            #boton1{
                grid-column: col-start 3/ span 8;
                grid-row: 3/5
            }
            .boton{
                grid-column: col-start 3/ span 8;

            }
        </style>
        <!-- <script
  			  src="https://code.jquery.com/jquery-3.4.0.js"
  			  integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo="
  			  crossorigin="anonymous"></script> -->
        <script src="JS/jquery-3.4.1.js" charset="utf-8"></script>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <div class="contenedor" id="contenedor">
            <div ></div>
        </div>
    </body>
    <script>
    function redireccionar(url){
        window.location=url;
    }
    function cargarDificultad(){
        var camposD=['iddificultad','descripcionDificultad'];
        $.post("Parametros/obtenerDatos.php",{campos:camposD,tabla:"dificultad"}, function(resultado) {
            var res=JSON.parse(resultado);
            //console.log(res);
            for(var i=0;i<4;i++){
                crearBoton(res[i]);
            }

         });
    }
    function crearBoton(datos){
        var resp=document.createElement('button');
        resp.value=datos[1];
        resp.className="boton";
        resp.innerHTML=datos[1];
        resp.addEventListener("click",function(){ redireccionar("formularioPreguntas.php?dificultad="+datos[0])})
        document.getElementById('contenedor').appendChild(resp);
    }
    cargarDificultad();
    </script>
</html>
