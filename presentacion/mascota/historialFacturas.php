<?php
$cliente = new Cliente($_SESSION['id']);
$cliente->consultar();
$mascota = new Mascota("","","","","", $_SESSION["id"]);
$mascotas = $mascota ->consultarTodos();

include 'presentacion/cliente/menuCliente.php';
?>
<div class="container">
	<div class="row">
		<div class="col-11">
			<div class="card">
				<div class="card-header bg-primary text-white">Consultar Historial Facturas</div>
				<div class="card-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th scope="col">Id</th>
								<th scope="col">Estado Pagada</th>
								<th scope="col">Fecha</th>
								<th scope="col">Hora</th>
								<th scope="col">Servicios</th>
							</tr>
						</thead>
						<tbody id="resultadosAuxiliares">
						<?php
						$cantidad=0;
						foreach ($mascotas as $m){
						    $solicitud =new Solicitud("","","","","","",$m->getId());
						    $solicitudes= $solicitud -> consultarSolicitudesPendientesMascota2();
						    foreach($solicitudes as $F){
						        $s= new Factura($F -> getFactura());
						        $s -> consultar();
						        echo "<tr>";
						        echo "<td>" . $s-> getId() . "</td>";
						        echo "<td>" . "<span class='fas " . ($s-> getEstado_pagada() == 0?"fa-times-circle text-danger":"fa-check-circle text-success") . "' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='" . ($s -> getEstado_pagada() == 0?"Sin Pagar":"Pagada") . "' ></span>"."</td>";
						       echo "<td>" . $s -> getFecha(). "</td>";
						        echo "<td>" . $s -> getHora(). "</td>";
						        echo "<td>" ."<a class='fas fa-money-check-alt' href='index.php?pid=". base64_encode("presentacion/mascota/pagarFactura.php") . "&idFactura=" . $s  -> getId() . "&idSolicitud=".$F ->getId()."' data-toggle='tooltip' data-placement='left' title='Ver Factura'> </a>";
						        
						        echo "   </td>";
						        "</tr>";
						        $cantidad++;
						    }
						}
                           echo "<tr><td colspan='5'>" . $cantidad . " registros encontrados</td></tr>"?>
						</tbody>
					</table>
			
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal" id="modalAuxiliar">
	<div class="modal-dialog modal-lg" >
		<div class="modal-content" id="modalContent">
		</div>
	</div>
</div>

<script>
	$('body').on('show.bs.modal', '.modal', function (e) {
		var link = $(e.relatedTarget);
		$(this).find(".modal-content").load(link.attr("href"));
	});
</script>

<script type="text/javascript">
$(document).ready(function(){
	$("#filtrar").keyup(function(){		
	var filtroDato=$("#filtrar").val();
		<?php echo "var ruta = \"indexAjax.php?pid=" . base64_encode("presentacion/auxiliar/buscarAuxiliarAjax.php") ."&filtro=\"+filtroDato;\n"; ?>
		$("#resultadosAuxiliares").load(ruta);
	});
});
</script>