<?php session_start(); 
?>
<?php require('nav/head.php'); ?>
<?php require('nav/topbar.php')?>
<?php require('nav/sidebar.php');
	if(isset($_SESSION["permission"])){
		if ($_SESSION["permission"]=="admin" || $_SESSION["permission"]=="user"){
		if (isset($_GET["s"])){
			if(!isset($_SESSION["advanced"])){
				$_SESSION["advanced"]=0;
			}
				$_SESSION["advanced"]++;
		}
		echo '
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h2 class="page-title"><h2>&ensp;<i class="fas fa-keyboard"></i>&ensp;<a href="info.php?s=1"><i class="fas fa-info"></i></a> 
						&ensp;Información y manuales //<b>Manual de inicio rápido</b><a href="info.php"> &ensp;<i class="far fa-arrow-alt-circle-left"></i></a></h2></h2>
                    </div>
                </div>
            </div>
		<div class="col-md-6">
			<marquee><h4>
			Este es el manual de inicio rápido del sistema Regalens.&ensp;&ensp;&ensp;             
			</h4>
			</marquee>
		</div>
         <div class="container-fluid">
		 <div class="row">
			<div class="col-12">
                        <div class="card card-body printableArea">
                           <object data="engine/speedman.pdf" type="application/pdf" width="100%" height="800px"> 
						  <p>Si no visualizas el contenido, <a href="speedman.pdf">pulsa aquí para descargar este documento</a></p>  
						</object>
                    </div>
                </div>
		</div>';}
	}
	if(!isset($_SESSION["permission"])){
		echo "<script>window.location = 'authentication-login.php?error=1'</script>";
	}
			?>
<?php require('nav/footer.php')?>
        </div>
    </div>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../assets/extra-libs/sparkline/sparkline.js"></script>
    <script src="../dist/js/waves.js"></script>
    <script src="../dist/js/sidebarmenu.js"></script>
    <script src="../dist/js/custom.min.js"></script>
</body>

</html>