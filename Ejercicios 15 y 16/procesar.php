<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" type="text/css" href="estilos.css">
	<!--Script para la funcion Busqueda -->
	<script language="JavaScript"> 
		function enviar(){
			document.forms["form"].submit();
		}
	</script> 
</head>
<body>

	<?php
	switch($_REQUEST['accion']){
		case 'Inicio':
			header ("Location: index.html");
		break;
		case 'Volver':
			header ("Location: buscar_alumno.php");
		break;
		case 'guardar':
			guardar();
					//header ("Location: index.html");
			header('Refresh: 2; URL=index.html');
			echo '<div class="centrado-porcentual"><h1 class="mensaje">Datos Guardados...</h1></div>';
		break;
		case 'busqueda':
			$matriz_archivo = cargar_matriz();
			echo '<form action="mostrar_alumno.php" method="POST" id="form" onsubmit="enviar();">';
			for ($i=0; $i <= count($matriz_archivo)-1; $i++) { 
				if ($matriz_archivo[$i][0] == $_REQUEST['buscar']) {
					$variable = $matriz_archivo[$i];
					$variable[4]=$i;
					echo '<input type="hidden" name="matriz" value="'.implode("-",$variable).'">';
					echo '<script language="JavaScript">
					this.form.submit();
					</script>' ;
				}
			}
			header('Refresh: 2; URL=index.html');
			echo '<div class="centrado-porcentual"><h1 class="mensaje">¡¡¡No existe!!!</h1></div>';
			echo '</form>';
		break;
		case 'Modificar':
			$matriz_archivo = cargar_matriz();
			$key = $_REQUEST['key']; //Indice de posicion en la matriz
			//Cargando en la matriz los nuevos datos 
			$matriz_archivo[$key][0] = $_REQUEST['nombre'];
			$matriz_archivo[$key][1] = $_REQUEST['edad'];
			$matriz_archivo[$key][2] = $_REQUEST['soltero/casado'];
			$matriz_archivo[$key][3] = $_REQUEST['hombre/mujer']."\n";
    		//Abro el archivo nuevamente
			$archivo = fopen('datos.txt','w') or die ("No se pudo abrir el archivo");
    		//Sobreescribo el archivo con los datos actualizados de la matriz
			for ($i=0; $i < count($matriz_archivo) ; $i++) { 
				fputs($archivo, implode("|",$matriz_archivo[$i]));
			}   
			fclose($archivo);
			header('Refresh: 2; URL=index.html');
			echo '<div class="centrado-porcentual"><h1 class="mensaje">Datos Guardados...</h1></div>';
		break;
		case 'Eliminar':
			$key = $_REQUEST['key'];

			// Obtener cada línea en un array:
			$aLineas = file("datos.txt");

			// Borrar el elemento del array definido por el inice obtenido de $key
			array_splice($aLineas, $key, 1);

			// Abrir el archivo:
			$archivo = fopen("datos.txt", "w+b");

			// Guardar los cambios en el archivo:
			foreach( $aLineas as $linea ){
					fwrite($archivo, $linea);
			}
			// Cerrar el archivo:
			fclose($archivo);

			header('Refresh: 2; URL=index.html');
			echo '<div class="centrado-porcentual"><h1 class="mensaje">Registro eliminado...</h1></div>';
			break;
		}

		function grabar($archivo){
			fputs($archivo, $_REQUEST['nombre']);
			fputs($archivo, "|");
			fputs($archivo, $_REQUEST['edad']);
			fputs($archivo, "|");
			fputs($archivo, $_REQUEST['soltero/casado']);
			fputs($archivo, "|");
			fputs($archivo, $_REQUEST['hombre/mujer']);
			fclose($archivo);
		}

		function guardar(){
			if (file_exists("datos.txt")) {
				$archivo = fopen("datos.txt", "a") or die("No se pudo crear el archivo");
				fputs($archivo, "\n");
				grabar($archivo);
			}
			else{
				$archivo = fopen("datos.txt", "a") or die("No se pudo crear el archivo");
				grabar($archivo);
			}
		}

		function cargar_matriz(){
			//------------GENERO UNA MATRIZ CON LOS DATOS DENTRO DEL ARCHIVO 

			//variable donde se almacena el archivo txt
			$archivo = fopen('datos.txt','r') or die ("No se pudo abrir el archivo");
			$indice = 0; // indice de líneas
			while (!feof($archivo)) { // loop hasta que se llegue al final del archivo
				$linea = fgets($archivo); // guardo toda la línea en $linea como un string
				// divido $linea en sus celdas, separadas por el caracter | e incorpoo la línea a la matriz $campo
				$campo[$indice] = explode ('|', $linea);
				$indice++;
			}
			fclose($archivo);
			return $campo;
		}
?>
</body>
</html>








