<?php session_start();
 require('nav/head.php'); ?>
<?php require('nav/topbar.php')?>
<?php require('nav/sidebar.php')?>
<?php require('engine/core.php')?>
<?php 
	if(isset($_SESSION["permission"])){
	if($_SESSION["permission"]=="admin" || $_SESSION["permission"]=="user"){
		$id=$_GET['mod'];
		require ('dbjoin.php');
		$counter="0";
		$ask = "SELECT * from productos where id_producto = '$id';";
		$procesado = mysqli_query( $handshake, $ask);
		mysqli_close($handshake);
		while ($row = mysqli_fetch_array($procesado)) {
				$name=($row['nombre']);
				$price=($row['precio_unidad']);
				$sell=($row['PVP']);
				$code=($row['codigo_barras']);
				$iva=($row['IVA']);
				$stock=($row['stock']);
		}
		echo ('
		<script>
			//sistema de control de length numero
			function maxkill (){

				if(document.getElementById("telf").value.length > 5){
					document.getElementById("telf").value=document.getElementById("telf").value.substring(0, 9)
				}
			}
		</script>
		    <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h2 class="page-title"><h2>&ensp;<i class="fas fa-edit"></i><i class="fas fa-boxes"></i> &ensp;Editar producto</h2>
                    </div>
                </div>
            </div>
		<div class="col-md-6">
			<marquee><h4>
			Estas editando el producto "'.$name.'".  Si deseas descartar los cambios, pulsa volver o simplemente abandona esta página.
			</h4>
			</marquee>
		</div>
         <div class="container-fluid">
		 <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <form class="form-horizontal" action="engine/processing/productupdate.php?mod='.$id.'" method="post">
                                <div class="card-body">
                                    <h4 class="card-title">Datos del producto</h4></br>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Producto&ensp;<i class="fas fa-box-open"></i></label>
                                        <div class="col-sm-9">
                                            <input value="'.$name.'" type="text" maxlength="30" class="form-control" id="user" name="nombre" placeholder="Nombre del producto" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Precio/unidad &ensp;<i class="fas fa-euro-sign"></i></label>
                                        <div class="col-sm-9">
                                            <input value="'.$price.'" type="number" onclick="maxkill(); return false" onmouseout="maxkill(); return false" class="form-control" id="price" name="price" placeholder="Precio original, con coma" required="">
                                        </div>
                                    </div>
									 <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Precio de venta &ensp;<i class="fas fa-donate"></i></label>
                                        <div class="col-sm-9">
                                            <input value="'.$sell.'" type="number" onclick="maxkill(); return false" onmouseout="maxkill(); return false" class="form-control" id="pvp" name="pvp" placeholder="Precio de venta al publico" required="">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Código&ensp;<i class="fas fa-barcode"></i></label>
                                        <div class="col-sm-9">
                                            <input value="'.$code.'" type="text" maxlength="30" class="form-control" id="codigo" name="codigo" placeholder="Código de barras (ean13)">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">IVA agregado &ensp;<i class="fas fa-university"></i></label>
                                        <div class="col-sm-9">
                                            <input value="'.$iva.'" type="number" onclick="maxkill(); return false" onmouseout="maxkill(); return false" class="form-control" id="IVA" name="IVA" placeholder="IVA a agregar al PVP" required="">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Stock &ensp;<i class="fas fa-boxes"></i></label>
                                        <div class="col-sm-9">
                                            <input value="'.$stock.'" type="number" onclick="maxkill(); return false" onmouseout="maxkill(); return false" class="form-control" id="stock" name="stock" placeholder="Stock" required="">
                                        </div>
                                    </div>
									</br></br>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-warning"><i class="fas fa-plus"></i>&ensp;Guardar cambios</button>
                                    </div>
                                </div>
								<span id="passnotmatch">');if(isset($_GET['done'])){echo('<span style="color: green;"><b><h3> &ensp;<i class="fas fa-hand-holding"></i> Producto editado correctamente</h3></b></span>');}
								if(isset($_GET['failed'])){echo('<span style="color: red;"><b><h3> &ensp;<i class="fas fa-exclamation-triangle"></i> Error al eliminar</h3></b></span>');}echo('</span>
                            </form>
							<div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" onclick=\'window.location.href="productlist.php"\' class="btn btn-info"><i class="fas fa-arrow-circle-left"></i>&ensp;Volver y descartar cambios</button>
                                    </div>
                                </div>
							
                        </div>');
	}
}
if(!isset($_SESSION["permission"])){
		echo "<script>window.location = 'authentication-login.php?error=1'</script>";
	}
?>
<?php require('nav/footer.php')?>
        </div>
    </div>
</body>
</html>