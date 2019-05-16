<?php 
	require 'fpdf/fpdf.php'; // uso de la libreria fpdf

	$pdf = new FPDF();
	class myPDF extends FPDF{
		function headertable(){//encabezado de la tabla
			$this -> SetFont('Times', 'B', 14);
			$this -> Cell(40, 10, 'Codigo', 1, 0, C);
			$this -> Cell(40, 10, 'Nombre', 1, 0, C);
			$this -> Cell(40, 10, 'Marca', 1, 0, C);
			$this -> Cell(30, 10, 'Precio', 1, 0, C);
			$this -> Cell(30, 10, 'Cantidad', 1, 0, C);
			$this -> Ln();
		}
		function listartabla($BD){//Lista de elementos
			$this -> SetFont('Times', '', 12);
			$conexion=mysqli_connect('localhost', 'root', '12345678', 'bdunad22');
			$sql="SELECT * FROM tabla22";
	 		$result=mysqli_query($conexion, $sql);
	 		while ($listar=mysqli_fetch_array($result)){ 
				$this -> SetFont('Times', 'B', 12);
				$this -> Cell(40, 10, $listar['codigo'], 1, 0, L);
				$this -> Cell(40, 10, $listar['nombre'], 1, 0, L);
				$this -> Cell(40, 10, $listar['marca'], 1, 0, L);
				$this -> Cell(30, 10, $listar['precio'], 1, 0, R);
				$this -> Cell(30, 10, $listar['cantidad'], 1, 0, R);
				$this -> Ln();
			}

		}
	}

	$pdf = new myPDF();
	$pdf -> AliasNbPages();
	$pdf -> AddPage();
	$pdf -> SetFont('Arial','B',14);
	$pdf -> Cell(50);
	$pdf -> Cell(100,10,'Listado de Componentes',0,1,'C');
	$pdf -> SetY(60);
	$pdf -> headertable();
	$pdf -> listartabla($BD);
	$pdf -> Output();

 ?>



	$pdf = new myPDF();
	$pdf -> AliasNbPages();
	$pdf -> AddPage();
	$pdf -> SetFont('Arial','B',14);
	$pdf -> Cell(50);
	$pdf -> Cell(100,10,'Listado de Componentes',0,1,'C');
	$pdf -> SetY(60);
	$pdf -> headertable();
	$pdf -> listartabla($BD);
	$pdf -> Output();

 ?>