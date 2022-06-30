<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <?php
            $dif=$_GET['dificultad'];

         ?>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="CSS/estilo.css">
        </style>
        <style media="screen">


            .item{
                grid-column: col-start 3/ span 8;
                font-family: Arial;
            }
            .respuestaBoton{
                border-radius: 100px;
                border-color: grey;
                background-color: white;
                -moz-box-shadow: 14px 12px 4px -3px #000000;
                -webkit-box-shadow: 14px 12px 4px -3px #000000;
                box-shadow: 14px 12px 4px -3px #000000;
                font-size: 3rem;
            }
            .respuestaBoton:hover{
                -moz-box-shadow: 7px 9px 4px -3px #000000;
                -webkit-box-shadow: 7px 9px 4px -3px #000000;
                box-shadow: 7px 9px 4px -3px #000000;
                cursor: pointer;
                background-color: #cacbca;
            }
            #pregunta{
                text-align: center;
                font-size: 3rem;
                background-color: transparent;
                border: none;
                color: white;
            }
        </style>
        <!-- <script
  			  src="https://code.jquery.com/jquery-3.4.0.js"
  			  integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo="
  			  crossorigin="anonymous"></script> -->
        <script src="JS/jquery-3.4.1.js" charset="utf-8"></script>
    </head>
    <body>
        <div class="contenedor" id="respuestas">
            <input type="hidden" class="item" name="dificultad" id="dificultad" value=<?php echo "'$dif'"?>>
            <input type="hidden"  name="ID" id="ID" >
            <textarea name="pregunta" class="item" id="pregunta" readonly></textarea>
        </div>
    </body>
    <script>
    var contP=0;
    var idPreguntas;
    var idConsultados;
    var cantGlobal;
    var correctos;
    var dificultad;
    var corr;
    var verif=false;
    var respID;
    var timer;
    var contVec=0;
    function inicializar(){
        dificultad=$("#dificultad").val();
        var cant;
        switch (dificultad){
            case 1:
                cant=10;
                break;
            case 2:
                cant=10;
                break;
            case 3:
                cant=10;
                break;
            default:
            cant=10;
        }
        cantGlobal=cant;
        idConsultados=new Array(cant);
        correctos=new Array(cant);
        inicializarPreguntas();
    }
    function inicializarPreguntas(){

        var camposP=['idpregunta'];
        var camposCondicion=['dificultad_id'];
        var valorCondicion=[dificultad];
        $.ajaxSetup({async:false});
        var res;
        $.post("Parametros/obtenerDatos.php",{campos:camposP,tabla:"pregunta",campoCondicion:camposCondicion,valores:valorCondicion}, function(resultado) {
            console.log(resultado);
            res=JSON.parse(resultado);
         });
         idPreguntas=res;
         $.ajaxSetup({async:true});
    }
    function siguientePregunta(){
        console.log("test");
        var cantP=idPreguntas.length;
        var idSeleccionado=contVec;
        var repetido=true;
        var c=0;

        /*do {
            c++;
            idSeleccionado=Math.floor(Math.random()*cantP);

            for (val of idConsultados) {
                if(val!=idPreguntas[idSeleccionado]){
                    repetido=false;
                }
            }
        } while (repetido || c==100);*/
        if(contVec==cantGlobal){
            terminar();
        }else{
            console.log("preg="+idPreguntas[idSeleccionado]+" c ->"+c);
            consultar(idPreguntas[idSeleccionado]);
            contVec++;
        }
    }

    function consultar(idP){
        //inicializar timer para termino de tiempo
        verif=false;
        console.log("idPregunta "+idP);
        var camposP=['descripcionPregunta','Explicacion'], camposR=['idrespuesta','respuesta','esCorrecto'];
        var idPregunta=parseInt(idP);
        //var idPregunta=59;
        idConsultados[contP]=idPregunta;
//        idPreguntas[contP]=idPregunta;
        $("#ID").val(idPregunta);
        $.post("Parametros/obtenerDatos.php",{campos:camposP,tabla:"pregunta",campoCondicion:'idPregunta',valores:idPregunta}, function(resultado) {
            console.log(resultado);
            var res=JSON.parse(resultado);
            $("#pregunta").val(res[0].slice(0, -1));
         });
         if(document.getElementsByClassName("respuestaBoton").length>0){
             document.getElementById('respuestas').removeChild(document.getElementById(respID[0]))
             document.getElementById('respuestas').removeChild(document.getElementById(respID[1]))
             document.getElementById('respuestas').removeChild(document.getElementById(respID[2]))
         }
         respID=new Array();
         $.post("Parametros/obtenerDatos.php",{campos:camposR,tabla:"respuesta",campoCondicion:'pregunta_id',valores:idPregunta}, function(resultado) {
            // console.log(resultado);
            var res=JSON.parse(resultado);
            for(var i=0;i<3;i++ ){
                crearRespuestas(res[i]);
            }
        });
        timer=setTimeout(function(){verificarRespuesta(0)},10000);
    }
    function crearRespuestas(datos){
        respID.push(datos[0]);
        var resp=document.createElement('input');
        resp.type='Button';
        resp.id=datos[0];
        resp.className="item respuestaBoton";
        resp.value=datos[1];
        resp.addEventListener( 'click', function(){verificarRespuesta(datos[0]);});
        document.getElementById('respuestas').appendChild(resp);
        if(datos[2]!="NO"){
            corr=datos[0];
        }
    }
    function verificarRespuesta(id){
        if(verif==false){
            for (var respuestas of document.getElementsByClassName('respuestaBoton')) {
                //console.log(respuestas);
                respuestas.style.backgroundColor='red';
                respuestas.style.color='white';
            }
            desactivar();
            if(id==corr){
                correctos[contP]=1;
            }else{
                correctos[contP]=0;
            }
            document.getElementById(corr).style.backgroundColor='green';
            //document.getElementById(corr).value+='(CORRECTO)';
            contP++;
            clearTimeout(timer);
            setTimeout(siguientePregunta,1000);
        }

    }
    function terminar(){
        var sum=0;
        for (valor of correctos) {
            sum+=valor;
        }
        console.log(sum);
        console.log(dificultad);
        //alert("terminar")
        window.location="form.php?score="+sum+"&dif="+dificultad;
    }
    function desactivar(){
        verif=true;
    }
    inicializar();
    //consultar();
    siguientePregunta();
    </script>
</html>
