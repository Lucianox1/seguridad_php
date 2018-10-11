<?php
require_once("db/conexion.php");
error_reporting(0);
//aqui agregamos una fruta a la base de datos
if (isset($_POST['htoken'])) {
	$cone = new conexion();//creamos un nuevo objeto de la clase conexion
    $sql = "insert into frutas (f_nombre,f_color) values (:nom,:col) ";//preparamos la consulta
    $statement = $cone->prepare($sql);//preparamos la consulta
    $statement->bindParam(":nom",htmlspecialchars($_POST['txtnombre']),PDO::PARAM_STR);//asigamos parametros para nombre y color
    $statement->bindParam(":col",htmlspecialchars($_POST['txtcolor']),PDO::PARAM_STR);
    $statement->execute();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ejemplo xss</title>
</head>
<body>
	<form method="POST">
		<input type="text" placeholder="nombre" name="txtnombre"><br>
		<input type="text" placeholder="color" name="txtcolor"><br>
		<input type="hidden" name="htoken" value="1">
		<input type="submit" name="btnguardar" value="Guardar">
	</form>
	
<?php
//cargamos el nombre y el color de cada fruta en pantalla
	$cone = new conexion();
  	$sql = "SELECT * FROM frutas";
  	$statement = $cone->prepare($sql);
  	$statement->execute();
  	$resultado = $statement->fetchAll();
  	echo "<p>Nombre &nbsp Color</p>";
  	foreach ($resultado as $row) {
  		echo "<p>".$row['f_nombre']." ".$row['f_color']."<p>";//cargamos las frutas ingresadas para mostrarlas en pantalla
  	}


?>
</body>
</html>