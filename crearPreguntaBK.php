<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <link rel="stylesheet" type="text/css" href="CSS/estilo.css">
        </style>
        <style media="screen">
        .item{
            grid-column: col-start 3/ span 8;
            font-family: Arial;
        }
        .tabla{
            grid-column: col-start 3/ span 8;
            font-family: Arial;
        }
        .tabla{
            grid-column: col-start 3/ span 8;
            grid-row: span 3;
            font-family: Arial;
            background-color: white;
            border-radius: 20px;
            padding: 20px;
            box-sizing: border-box;
            overflow-y:auto;
        }
        </style>

        <meta charset="utf-8">
        <title></title>
        <script src="JS/jquery-3.4.1.js" charset="utf-8"></script>
        <!-- <script
  			  src="https://code.jquery.com/jquery-3.4.0.js"
  			  integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo="
  			  crossorigin="anonymous"></script> -->
    </head>
    <body>
        <div class="contenedor" id="contenedor">
            <input type="text" class="item" name="pregunta" id="pregunta" placeholder="Pregunta..."><br><br>
            <select id="dificultad" class="item" ></select>
            <br><br>
            <div class="item">

                <input type="text" id="resp" placeholder="Respuesta..." >
                <select name="correcto" id="correcto">
                    <option value="NO">NO</option>
                    <option value="SI">SI</option>
                </select>
                <input type="button" onclick='agregarTabla()' value=">>">
            </div>
            <br><br>
            <div class="tabla">
                <table style="width:100%">
                    <thead style="height:30px;">
                        <tr><th style="width:90%"> Respuesta</th><th>Correcto</th></tr>
                    </thead>
                    <tbody id='tablaRespuestas'>
                    </tbody>
                </table>
            </div>
            <input type="button" name="" class="item" value="GUARDAR" onclick='insertarDatos()'>
        </div>
    </body>
    <script>
        var tabla=new Array();
        var contadorRespuestas=0;
        var idGlobal;
        function insertarDatos(){
            var valores=[$('#pregunta').val(),$('#dificultad').find(':selected').val()];
            var camposP=['descripcionPregunta','dificultad_id']
            console.log(tabla +"Cantidad de filas" + tabla.length);
            if(tabla.length>1){
                var id=insertar(camposP,'pregunta',valores);
            }else{
                alert(' DEBE INSERTAR AL MENOS 2 RESPUESTAS PARA QUE LA PREGUNTA SEA INSERTADA')
            }
            setTimeout(function(){
                camposR=['respuesta','esCorrecto','pregunta_id'];
                for (var valores of tabla) {
                    valores.push(idGlobal);
                    console.log(valores);
                    insertar(camposR,'respuesta',valores);
                }
            },1500)

        }
        function insertar(campos,tabla,valores){
            var id=null;
            $.post("Parametros/insertarDatos.php",{campos:campos,tabla:tabla,valores:valores}, function(resultado) {
                console.log("resultado"+resultado)
                 });
                 setTimeout(function(){
                    id = obtenerID(campos,tabla,valores);
                 },1000);

        }
        function obtenerID(camposC,tabla,valores){
            var cam=['idpregunta'];
            //var id={valor:'test'};
            var id="";
            $.ajaxSetup({async:false});
            $.post("Parametros/obtenerDatos.php",{campos:cam,tabla:tabla,campoCondicion:camposC,valores:valores}, function(resultado) {
                console.log(resultado+" = resultado");
                id=JSON.parse(resultado);
             });
             console.log('id es : '+id);
             idGlobal=id[0][0];
             $.ajaxSetup({async:true});
             return id;
        }
        function cargarDificultad(){
            var camposD=['iddificultad','descripcionDificultad'];
            $.post("Parametros/obtenerDatos.php",{campos:camposD,tabla:"dificultad"}, function(resultado) {
                var res=JSON.parse(resultado);
                //console.log(res);
                for(var i=0;i<res.length;i++){
                    cargarSelect(res[i]);
                }

             });
        }
        function cargarSelect(datos){
            var resp=document.createElement('option');
            resp.value=datos[0];
            resp.innerHTML=datos[1]
            document.getElementById('dificultad').appendChild(resp);
        }
        function agregarTabla(){
            if(contadorRespuestas<3){
                var respuesta=$("#resp").val();
                var verif=$("#correcto").val();
                if(respuesta==""){
                    alert('DEBE INSERTAR RESPUESTAS');
                }else {
                tabla.push([respuesta,verif]);
                var row=document.createElement('tr');
                var respDescripcion=document.createElement('td');
                var correctoVal=document.createElement('td');
                respDescripcion.innerHTML=respuesta;
                correctoVal.innerHTML=verif;
                document.getElementById('tablaRespuestas').appendChild(row);
                row.appendChild(respDescripcion);
                row.appendChild(correctoVal);
                }
                contadorRespuestas++;
            }
            $("#resp").val("");
            $("#correcto").prop('selectedIndex',0);
        }
        cargarDificultad();
    </script>

</html>
