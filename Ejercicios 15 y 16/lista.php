
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Lista</title>
	<link rel="stylesheet" type="text/css" href="csstabla.css">
<link rel="stylesheet" type="text/css" href="estilos.css">
	<?php 
	//Variables que seran usadas como acumuladores dentro del HTML
	$mujeres_solteras = 0;
	$mujeres_casadas = 0;
	$total_varones = 0;
	$mujeres_20_30 = 0;
	$casada_30_40 = 0;
	$soltero_25 = 0;
	$total_casados = 0;

	//variable donde se almacena el archivo txt
	$archivo = fopen('datos.txt','r') or die ("No se pudo abrir el archivo");

	$indice = 0; // indice de líneas

	while (!feof($archivo)) { // loop hasta que se llegue al final del archivo

		$linea = fgets($archivo); // guardo toda la línea en $linea como un string

		//Condicional para evitar leer linea en blanco que se crea al eliminar el ultimo registro
		
		if (strlen($linea) > 1) {
			// divido $linea en sus celdas, separadas por el caracter | e incorporo la línea a la matriz $campo
			$campo[$indice] = explode ('|', $linea);
			
			$indice++;	
		}
	}
	?>
</head>
<body>
	<div class="table-title">
		<h3>Lista de Alumnos</h3>
	</div>
	<table class="table-fill">
		<thead>
			<tr>
				<th class="text-left">Nombre y Apellido</th>
				<th class="text-left">Edad</th>
				<th class="text-left">Estado Civil</th>
				<th class="text-left">Sexo</th>
			</tr>
		</thead>
		<tbody class="table-hover">
			<?php for ($ini=0; $ini <= $indice-1 ; $ini++){ 
				//Si es varon
				if($campo[$ini][3] == 1){
					
					$total_varones++;
					//Si es soltero
					if ($campo[$ini][2] == 1){
						//Solteros de 25
						if ($campo[$ini][1] == 25) $soltero_25++;
					}
					//Si es casado
					else{$total_casados++;}
				} 
				//Si es mujer
				else{
					//Entre 20 y 30 años
					if ($campo[$ini][1] >= 20 and $campo[$ini][1] <= 30) $mujeres_20_30++;
					//Si es Soltera
					if ($campo[$ini][2] == 1){
						$mujeres_solteras++;
					} 
					else{
						//Si es casada
						$mujeres_casadas++;
						//Casada entre 30 y 40 años
						if ($campo[$ini][1] >= 30 and $campo[$ini][1] <= 40) $casada_30_40++;
					}
				}
				
				echo
				'<tr>
				<td class="text-left">'.$campo[$ini][0].'</td>
				<td class="text-left">'.$campo[$ini][1].'</td>'	;								

				if ($campo[$ini][2] == 1) {
					echo '<td class="text-left">Soltero/a</td>';
				}
				else{
					echo '<td class="text-left">Casado/a</td>';
				}

				if ($campo[$ini][3] == 1) {
					echo '<td class="text-left">Varon</td>';
				}
				else{
					echo '<td class="text-left">Mujer</td>';
				}

				'</tr>'
				;}?>
			</tbody>
			
			<table class="table-fill">
				<tbody>
					<tr>
						<th class="text-left">Cantidad de Alumnos</th>
						<td class="text-left"><?php echo count($campo); ?></td>
					</tr>
					<tr>
						<th class="text-left">Cantidad de Varones</th>
						<td class="text-left"><?php echo $total_varones; ?></td>
					</tr>
					<tr>
						<th class="text-left">Cantidad de Varones solteros de 25 años</th>
						<td class="text-left"><?php echo $soltero_25; ?></td>
					</tr>
					<tr>
						<th class="text-left">Cantidad de Varones casados</th>
						<td class="text-left"><?php echo $total_casados; ?></td>
					</tr>
					<tr>
						<th class="text-left">Cantidad de Mujeres Solteras</th>
						<td class="text-left"><?php echo $mujeres_solteras; ?></td>
					</tr>
					<tr>
						<th class="text-left">Cantidad de Mujeres Casadas</th>
						<td class="text-left"><?php echo $mujeres_casadas; ?></td>
					</tr>
					<tr>
						<th class="text-left">Cantidad de Mujeres 20 y 30 años</th>
						<td class="text-left"><?php echo $mujeres_20_30; ?></td>
					</tr>
					<tr>
						<th class="text-left">Cantidad de Mujeres casadas entre 30 y 40 años</th>
						<td class="text-left"><?php echo $casada_30_40; ?></td>
					</tr>	
				</tbody>
			</table>
		</table>
		<section class="principal">
			<form method="post" action="procesar.php">
				<input id="submit" type="submit" name="accion" value="Inicio">
			</form>
		</section>
	</body>
</html>
	