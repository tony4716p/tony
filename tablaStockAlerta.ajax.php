<?php
require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

class tablaStockAlerta{
	
	public function tablaMostrarTablaStcokAlerta()
	{
		
	  	//$item = null;
	  	//$valor = null;

	  	//$productos = ControladorProductos::ctrMostrarProductos($item, $valor);

		$productos = ControladorProductos::ctrMostrarProductosConAlertaDeStock();

	  	$datosJson = '{

		 

	 		"data": [ ';

	 			for ($i=0; $i < count($productos); $i++) { 

	 				$disponibles = "<button class='btn btn-warning'>".$productos[$i]["disponibilidad"]."</button>";
	 				
	 				$acciones = "<button class='btn btn-warning btngestorStockAlerta' data-toggle='modal' data-target='#ModalgestorStockAlerta' idProducto=".$productos[$i]["id"]."><i class='fa fa-pencil'><i></button>";

					$datosJson	 .= '[

			      		"'.($i+1).'",

			      		"'.$productos[$i]["titulo"].'",

			      		"'.$productos[$i]["descripcion"].'",	

			      		"'.$disponibles.'"
			      		
			      	],';



	 			}

				$datosJson = substr($datosJson, 0, -1);



			$datosJson.=  ']

		  

		}'; 
	//mostrar mensaje o contenido guardado 
  	echo $datosJson;
	}
}

$objeto = new tablaStockAlerta();
$objeto -> tablaMostrarTablaStcokAlerta();