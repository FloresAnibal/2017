<!DOCTYPE html>
<html>
<head>
	<title>Alumnos</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
	<header class="principal">
		<h1>Nuevo Alumno</h1>
	</header>
	<section class="principal">
		<form method="post" action="procesar.php">
			<label for="nombre">Nombre y apellido:</label>
			<input id="nombre" type="" name="nombre" placeholder="Nombre y apellido">
			<label for="edad">Edad:</label>
			<input id="edad" type="" name="edad" placeholder="Edad">

			<label for="estado civil">Estado civil</label>
			<label class="container">Soltero/a
				<input type="radio" name="soltero/casado" value="1" checked="checked">
				<span class="checkmark"></span>
			</label>
			<label class="container">Casado/a
				<input type="radio" name="soltero/casado" value="2">
				<span class="checkmark"></span>
			</label>

			<label for="sexo">Sexo</label>
			<label class="container">Hombre
				<input type="radio" name="hombre/mujer" value="1" checked="checked">
				<span class="checkmark"></span>
			</label>
			<label class="container">Mujer
				<input type="radio" name="hombre/mujer"  value="2">
				<span class="checkmark"></span>
			</label>
			<input id="submit" type="submit" name="submit" value="Guardar">
			<input type="hidden" name="accion" value="guardar">
		</form>
	</section>
</body>
</html>