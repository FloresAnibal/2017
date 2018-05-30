<?php 

//variable donde se almacena el archivo txt
$archivo = fopen('datos.txt','r') or die ("No se pudo abrir el archivo");

$indice = 0; // indice de líneas

while (!feof($archivo)) { // loop hasta que se llegue al final del archivo

	$indice++;

	$linea = fgets($archivo); // guardo toda la línea en $linea como un string

	// divido $linea en sus celdas, separadas por el caracter | e incorpoo la línea a la matriz $campo

	$campo[$indice] = explode ('|', $linea);
	


/*echo '
	 <div>
	  <div>Nombre: '.$campo[$indice][0].'</div>

	  <div>Edad: '.$campo[$indice][1].'</div>

	  <div>Sexo: '.$campo[$indice][2].'</div>

	  <div>Estado civil: '.$campo[$indice][3].'</div>

	  <div>+++++++++++++++</div>

	 </div>';*/
}
for ($ini=1;$ini<=$indice; $ini++){
	echo '
	 <div>
	  <div>Nombre: '.$campo[$ini][0].'</div>

	  <div>Edad: '.$campo[$ini][1].'</div>

	  <div>Sexo: '.$campo[$ini][2].'</div>

	  <div>Estado civil: '.$campo[$ini][3].'</div>

	  <div>+++++++++++++++</div>

	 </div>';}
 ?>