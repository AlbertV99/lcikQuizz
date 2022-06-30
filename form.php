<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
	<div id="container">
		<h1>¡ENHORABUENA!</h1>
		<fieldset>
			<form method="POST">
				<label for="username">Usuario</label>
				<input type="hidden" name="dif" value=<?php echo $_GET['dif']?>>
				<input type="text" name="username" id="username" maxlength="20" /><br />
				<input type="text" name="score" value=<?php echo $_GET['score']?> readonly>
				<input type="submit" value="GUARDAR " id="submit">
			</form>
		</fieldset>
	</div>
</body>
<?php
	if(isset($_POST['username'])&& $_POST['username']!=""){
		$user=$_POST['username'];
		$score=$_POST['score'];
		$dif=$_POST['dif'];
		$con=mysqli_connect("localhost","root","4Lberto123!","lcikQuizz");
		if(!$con){
			exit("error de conexion".mysqli_connect_error());
		}
		echo "INSERT INTO usuario (usuario,puntaje,iddificultad)VALUES('$user','$score','$dif')";
		mysqli_query($con,"INSERT INTO usuario (nombre,puntaje,iddificultad)VALUES('$user','$score','$dif')" );
		echo "<script> setTimeout(function (){window.location='indexQuizz.php'},1000)</script>";
	}

?>
</html>
