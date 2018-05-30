<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Busqueda</title>
	<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
	<header class="principal">
		<h1>Buscar Alumno</h1>
	</header>
	<section class="principal">
		<form method="post" action="procesar.php">
		<label for="">Nombre</label>
		<input type="text" name="buscar">
		<input type="hidden" name="accion" value="busqueda">
		<input id="submit" type="submit" name="submit" value="Buscar">
	</form>
	</section>
	
</body>
</html>