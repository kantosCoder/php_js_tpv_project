<?php session_start();?>
<?php require('nav/head.php'); ?>
<?php require('nav/topbar.php')?>
<?php require('nav/sidebar.php')?>
<?php 
if(isset($_SESSION["permission"]) && isset($_GET["cat"])){
		if ($_SESSION["permission"]=="admin" || $_SESSION["permission"]=="user"){
			$cat=$_GET["cat"];
			require ('dbjoin.php');
			$ask = "SELECT * from productos p, categoria c, categoria_producto k where c.id_categoria = k.id_categoria and p.id_producto = k.id_producto and c.nombre_cat='$cat';";
			$procesado = mysqli_query( $handshake, $ask);
			mysqli_close($handshake);
		echo('
		    <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h2 class="page-title"><h2>&ensp;<i class="fas fa-boxes"></i> &ensp;Productos //<b>'.$cat.'</b> <a href="productlist.php"> &ensp;<i class="far fa-arrow-alt-circle-left"></i></a></h2>
                    </div>
                </div>
            </div>
		<div class="col-md-6">
			<marquee><h4>
			Aquí se muestra una lista de productos actualmente almacenados en el sistema, dentro de la categoría <b>'.$cat.'.</b>&ensp;&ensp;&ensp;             
			</h4>
			</marquee>
		</div>
         <div class="container-fluid">
		 <div class="row">
			<div class="col-12">
                    <div class="card">
                            <div class="card-body">
                                
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
										<tr style="color: olive; font-size: 17px;">
											<th><b>Nombre</b></th>
											<th><b>Precio (unidad)</b></th>
											<th><b>Precio (PVP)</b></th>
											<th><b>IVA</b></th>
											<th><b>Stock actual</b></th>
											<th style="text-align: center;"><b>-Opciones-</b></th>
										</tr>
                                        </thead>
										<tbody>');
								while ($row = mysqli_fetch_array($procesado)) {
								echo('
                                    <tr>
                                        <td>'.($row['nombre']).'</td>
										<td>'.($row['precio_unidad']).'€</td>
										<td>'.($row['PVP']).'€</td>
										<td>'.($row['IVA']).'%</td>
										<td>'.($row['stock']).'</td>
										<td style="text-align: center;">
										&ensp;&ensp;
										<button onclick="window.location.href=\'productmodify.php?mod='.($row['id_producto']).'\'" class="btn btn-outline-success"><i class=""></i>&ensp;Modificar producto</button>
										&ensp;&ensp;&ensp;
										<button onclick="window.location.href=\'engine/processing/productkill.php?mod='.($row['id_producto']).'\'" class="btn btn-outline-danger"><i class=""></i>&ensp;Eliminar producto</button></td>
                                    </tr> 
								');}
								echo('
                                        </tbody>
                                    </table>
                                </div>
                            </div>
							<div class="border-top">
                                    <div class="card-body">
                                        <button onclick=\'window.location.href="products.php"\' class="btn btn-warning"><i class="fas fa-plus"></i>&ensp;Almacenar un nuevo producto</button>
                                    </div>
                            </div>
                        </div>
					 </div>
				  </div>
			</div>
	');}
}
if(!isset($_SESSION["permission"])){
		echo "<script>window.location = 'authentication-login.php?error=1'</script>";
	}
?>
<?php require('nav/footer.php')?>
        </div>
    </div>
	<?php require('engine/tablefuel.php')?>
    </div>
</body>
</html>