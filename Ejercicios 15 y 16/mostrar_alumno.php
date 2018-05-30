<!DOCTYPE html>
<html>
<head>
	<title>Alumno</title>
	<link rel="stylesheet" type="text/css" href="estilos.css">
	<?php 	$valor = explode("-",$_POST['matriz']) ; ?>
</head>
<body>
<header class="principal">
		<h1>Alumno</h1>
	</header>
	<section class="principal">
		<form method="post" action="procesar.php">
			<label for="nombre">Nombre y apellido:</label>
			<input id="nombre" type="" name="nombre" placeholder="Nombre y apellido" value="<?php echo $valor[0]; ?>">
			<label for="edad">Edad:</label>
			<input id="edad" type="" name="edad" placeholder="Edad" value="<?php echo $valor[1]; ?>">

			<label for="estado civil">Estado civil</label>
			<label class="container">Soltero/a
				
			<input type="radio" name="soltero/casado" value="1" <?php if ($valor[2]==1) {?> checked="checked" <?php } ?>
			 >
				<span class="checkmark"></span>
			</label>
			<label class="container">Casado/a
				<input type="radio" name="soltero/casado" value="2" <?php if ($valor[2]==2) {?> checked="checked" <?php } ?>>
				<span class="checkmark"></span>
			</label>

			<label for="sexo">Sexo</label>

			<label class="container">Hombre
				<input type="radio" name="hombre/mujer" value="1" <?php if ($valor[3]==1) {?> checked="checked" <?php } ?>>
				<span class="checkmark"></span>
			</label>
			<label class="container">Mujer
				<input type="radio" name="hombre/mujer" value="2" <?php if ($valor[3]==2) {?> checked="checked" <?php } ?>>
				<span class="checkmark"></span>
			</label>
			<input type="hidden" name="key" value="<?php echo $valor[4]; ?>">
			<input id="submit" type="submit" name="accion" value="Inicio">
			<input id="submit" type="submit" name="accion" value="Modificar">
			<input id="submit" type="submit" name="accion" value="Eliminar">
			<input id="submit" type="submit" name="accion" value="Volver">
		</form>
	</section>

</body>
</html>