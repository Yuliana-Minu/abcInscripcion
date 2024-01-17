<!DOCTYPE html>
<html lang="en">

<head>
	<?php 
		include('prncpal/hd.php');
		$url=$seccion_url; 	
	?>
	<link rel="stylesheet" href="DataTables/datatables.min.css" />
    <script src="DataTables/datatables.min.js"></script>
</head>

<body>
<style>
.modal-body {
    max-height: calc(100vh - 210px);
    overflow-y: auto;
}
</style>
	<!-- *************** Inicio de page container ************************************************ -->
	<div class="page-container" style='padding:0; margin:0;'>

		<div  class="container-fluid">
			<div class="row">
				<div class="col-sm-3">
					<?php include('prncpal/mnu.php') ?>
				</div>
				<div class="col-sm-9 container-principal">
					<div class="row">
						<div class="col-sm-12 modal-header"><h1>Ni&ntilde;os</h1></div>
					</div>
					
					<div class="row">
						<div class="col-sm-12" style="padding-top: 10px; text-align: right; ">
							<button type="button" style="width: 180px" class="btn btn-danger btn-sm" onClick="agregar();" title="Nuevo Niño"><i class="fas fa-plus"></i> Nuevo Ni&ntilde;os </button>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12" id="Ninio" style="padding-top: 10px; overflow: auto;">
							<?php include('grlla/dta/prsna/nnios.php'); ?>
						</div>
					</div>					
		   		</div>
			</div>
		</div>

		<!-- **********************          Inicio Modal Forma    *********************************** -->
	
		<div class="modal fade" tabindex="-1" id="frmModal" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					Cargando...
				</div>
			</div>
		</div>
		<!-- **********************          Fin Modal Forma       *********************************** -->

	</div>
	<script>
		function agregar(){
			var seccion=1;
			$('#frmModal').modal({
				keyboard: true
			});
			$.ajax({
				url:"formninios",
				type:"POST",
				data:"seccion="+seccion,
				async:true,

				success: function(message){
					$(".modal-content").empty().append(message);
				}
			});
		}
	</script>

</body>

</html>
