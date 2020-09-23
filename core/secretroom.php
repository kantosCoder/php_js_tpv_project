<?php session_start();?>
<?php require('nav/head.php'); ?>
<?php require('nav/topbar!.php')?>
<?php require('nav/sidebar!.php');
require('engine/core.php'); ?>
<?php 
if(isset($_SESSION["permission"]) && isset($_SESSION["advanced"])){
		if ($_SESSION["permission"]=="admin" && $_SESSION["advanced"]>=6){
		echo'
		    <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div style="color: red;" class="col-12 d-flex no-block align-items-center">
                         <h2  class="page-title"><h2>&ensp;<i class="fas fa-exclamation"></i><i class="fas fa-exclamation"></i><i class="fas fa-exclamation"></i><i class="fas fa-exclamation"></i> &ensp;OPCIONES AVANZADAS
						 &ensp;<i class="fas fa-exclamation"></i><i class="fas fa-exclamation"></i><i class="fas fa-exclamation"></i><i class="fas fa-exclamation"></i></h2>
                    </div>
                </div>
            </div>
			<div  class="col-md-6">
				<marquee><h4 id="alert" style="color: red;">
				¡NO DEBERÍAS ESTAR AQUÍ! &ensp; &ensp; ¡ACTUA CON PRECAUCIÓN!&ensp;&ensp;&ensp;    
				</h4>
				</marquee>
				<br/><br/><br/>
			<div class="container-fluid">
                <div class="row">
				<div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-danger text-center">
                                <h1 class="font-light text-white"><i class="fas fa-burn"></i>&ensp;<i class="fas fa-bug"></i></h1>
                                <h6 class="text-white">Reconstruir base de datos</h6>
                            </div>
                        </div>
						</div></div></div></div></div>';
		}
	}
	else{
		echo "<script>window.location = 'authentication-login.php?error=1'</script>";
	}
?>
<?php require('nav/footer.php')?>
        </div>
    </div>
    </div>
</body>
</html>