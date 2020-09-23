<?php session_start();
 require('nav/head.php'); ?>
<?php require('nav/topbar.php')?>
<?php require('nav/sidebar.php')?>
<?php require('engine/core.php')?>
<?php 
	if(isset($_SESSION["permission"])){
	if($_SESSION["permission"]=="admin" || $_SESSION["permission"]=="user"){
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
                        <h2 class="page-title"><h2>&ensp;<i class="fas fa-plus"></i><i class="fas fa-certificate"></i> &ensp;Nueva categoría</h2>
                    </div>
                </div>
            </div>
		<div class="col-md-6">
			<marquee><h4>
			En este pequeño apartado puedes agregar una categoría nueva con la que clasificar tus productos. Ten cuidado, porque... ¡luego no podrás eliminarla!  (Pero siempre puedes cambiar la categoría de un producto modificandolo...)
			</h4>
			</marquee>
		</div>
         <div class="container-fluid">
		 <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <form class="form-horizontal" action="engine/processing/categoryinsertion.php" method="post">
                                <div class="card-body">
                                    <h4 class="card-title">Datos de la categoría</h4></br>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nombre de categoría:&ensp;<i class="fas fa-certificate"></i></label>
                                        <div class="col-sm-9">
                                            <input type="text" maxlength="30" class="form-control" id="user" name="nombre" placeholder="Nombre de la nueva categoría" required="">
                                        </div>
                                    </div>
									</br></br>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button class="btn btn-success"><i class="fas fa-plus"></i>&ensp;Crear categoría</button>
                                    </div>
                                </div>
								<span id="passnotmatch">');if(isset($_GET['done'])){echo('<span style="color: green;"><b><h3> &ensp;<i class="fas fa-hand-holding"></i> Categoría agregada correctamente</h3></b></span>');}
								if(isset($_GET['failed'])){echo('<span style="color: red;"><b><h3> &ensp;<i class="fas fa-exclamation-triangle"></i> Existe una categoría con el mismo nombre</h3></b></span>');}echo('</span>
                            </form>
							<div class="border-top">
                                    <div class="card-body">
                                        <button type="submit "onclick=\'window.location.href="products.php"\' class="btn btn-info"><i class="fas fa-arrow-circle-left"></i>&ensp;Volver a inserción</button>
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