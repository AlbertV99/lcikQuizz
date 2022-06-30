<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
	<div id="container">
		<h1>PERDISTE</h1>
		<fieldset>
			<form method="POST">
				<label for="username">Usuario</label>
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
		$con=mysqli_connect("localhost","root","","BreakoutOviedo");
		if(!$con){
			exit("error de conexion".mysqli_connect_error());
		}
		//echo "INSERT INTO puntajes (usuario,puntaje)VALUES('$user','$score')";
		mysqli_query($con,"INSERT INTO puntajes (usuario,puntaje)VALUES('$user','$score')" );
		echo "<script> setTimeout(function (){window.location='index.html'},1000)</script>";
	}

?>
</html>
