<?php
session_start();
    require_once("../../../db/connection.php"); 
    $db = new Database();
    $con = $db->conectar();
?>

<form method="POST">
    <tr>
        <td colspan='1'></td>
    </tr>

    <input type="submit" value="Cerrar sesion" name="btncerrar" >
</tr>
</form>

<?php 

if(isset($_POST['btncerrar']))
{
    session_destroy();

   
    header('location: ../../../index.html');
}
    
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Interfaz Administrador</title>
    <link rel="stylesheet" type="text/css" href="../css/adminis.css">
</head>
<body>
       
        <section class="container">
            <h1>Bienvenido/a Administrador </h1>

	<div class="btn__group">
        <a href="licencia/index_li.php" class="btn btn__primary">Licencias</a>
        <a href="empresa/index_emp.php" class="btn btn__primary">Empresas</a>
    </div>

		<div class="all-products">
			<div class="product">
				<img src="https://images.contentstack.io/v3/assets/bltc313e6b1723c2280/blt7287182f9f5057a6/62b3992303b23c505f842b69/Blog11EC-_Cuerpo_3.jpeg">
				<div class="product-info">
					<h4 class="product-title">Usuarios</h4>
					<a class="product-btn" href="usuarios/index_usu.php">Ingresar</a>
				</div>
			</div>
            <div class="product">
				<img src="https://c8.alamy.com/compes/f98kha/grupo-de-personal-medico-en-el-hospital-doctor-guapo-delante-de-equipo-grupo-de-personas-reunidas-en-segundo-plano-f98kha.jpg">
				<div class="product-info">
					<h4 class="product-title">Tipo de Usuario
					</h4>
					<a class="product-btn" href="tipo_usuario/index_tip_usu.php">Ingresar</a>
				</div>
			</div>
			<div class="product">
				<img src="https://www.elpais.com.co/resizer/tcxxno_qpewNfEH8IoqPStgdkTA=/1280x720/smart/filters:format(jpg):quality(80)/cloudfront-us-east-1.images.arcpublishing.com/semana/4LID3CTAJ5EKLH2LKQPRNZYS2Y.png">
				<div class="product-info">
					<h4 class="product-title">Tipo de Documento
					</h4>
					<a class="product-btn" href="tipo_documento/index_docu.php">Ingresar</a>
				</div>
			</div>
            <div class="product">
				<img src="https://qph.cf2.quoracdn.net/main-qimg-fdac3c33ad97570d0ab046bb2ef83450-pjlq">
				<div class="product-info">
					<h4 class="product-title">Tipos de Medicamentos
					</h4>
					<a class="product-btn" href="tipo_medicamento/index_medicam.php">Ingresar</a>
				</div>
			</div>
			<div class="product">
				<img src="https://statics-diariomedico.uecdn.es/cms/2022-06/principal.jpg">
				<div class="product-info">
					<h4 class="product-title">Medicamentos
					</h4>
					<a class="product-btn" href="medicamentos/index_medicame.php">Ingresar</a>
				</div>
			</div>
			<div class="product">
				<img src="https://www.formulamedica.com.co/wp-content/uploads/2020/12/Medicos-Formula-Medica.jpg">
				<div class="product-info">
					<h4 class="product-title">Medicos
						</h4>
					<a class="product-btn" href="medicos/index_medico.php">Ingresar</a>
				</div>
			</div>
			<div class="product">
				<img src="https://plustatic.com/8800/conversions/especialidades-medicas-mejor-pagadas-default.jpg">
				<div class="product-info">
					<h4 class="product-title">Especializaciones
					</h4>
					<a class="product-btn" href="especializacion/index_esp.php">Ingresar</a>
				</div>
			</div>
			<div class="product">
				<img src="https://www.formulamedica.com.co/wp-content/uploads/2019/02/Cambio-de-EPS-Formula-Medica.jpg">
				<div class="product-info">
					<h4 class="product-title">EPS
					</h4>
					<a class="product-btn" href="eps/index_eps.php">Ingresar</a>
				</div>
			</div>
			<div class="product">
				<img src="https://www.donarsangre.org/media/upload/cache/grupos_sanguineos_1_1653838178.png">
				<div class="product-info">
					<h4 class="product-title">Tipo de Sangre
					</h4>
					<a class="product-btn" href="rh/index_rh.php">Ingresar</a>
				</div>
			</div>
			<div class="product">
				<img src="https://kalstein.com.mx/wp-content/uploads/2023/09/science-technician-in-ppe-suit-using-micropipette-2022-03-07-16-22-38-utc-scaled-1280x720.jpg">
				<div class="product-info">
					<h4 class="product-title">Laboratorio de Medicamentos
					</h4>
					<a class="product-btn" href="laboratorio/index_lab.php">Ingresar</a>
				</div>
			</div>
			<div class="product">
				<img src="https://bogota.gov.co/sites/default/files/2022-08/bta.jpg">
				<div class="product-info">
					<h4 class="product-title">Ciudad
					</h4>
					<a class="product-btn" href="ciudad/index_ciu.php">Ingresar</a>
				</div>
			</div>
			<div class="product">
				<img src="https://coachfarmacia.com/wp-content/uploads/2014/06/experiencia-en-la-farmacia-coach-farmacia-1.jpg">
				<div class="product-info">
					<h4 class="product-title">Estados
					</h4>
					<a class="product-btn" href="estados/index_est.php">Ingresar</a>
				</div>
			</div>
		</div>
		
	</section>
</body>
</html>