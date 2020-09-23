<?php session_start();
require('nav/head.php');
require('engine/core.php');
$tpv=1;
	if(isset($_SESSION["permission"])){
		if ($_SESSION["permission"]=="admin" || $_SESSION["permission"]=="user"){ //cambios en permisos?
		}
	}
		if(!isset($_SESSION["permission"])){
		echo "<script>window.location = 'authentication-login-box.php?error=1'</script>";
		die();
	}
	$_SESSION["ticketno"]=rand(10000000, 99999999);
?>

<body onload="catloader(); return false;">
<style>
.table-responsive {
position: relative;
clear: both;
width: 70%;
min-height : 400px;
margin-left: 0px;
background-color: #ffffff;
zoom: 1; 
}
.dropdown-menu {
  opacity: 0;
  visibility: hidden;
  transform-origin: top;
  animation-fill-mode: forwards; 
  transform: scale(0.9, 0.7) translateY(-20px);
  display: block; 
  transition: all 80ms ease;
}
.open > .dropdown-menu {
  transform: scale(1, 1) translateY(0);  
  opacity: 1;
  visibility: visible;
}
</style>
<script>
	var notabuy = false;
	var lasticket = 0;
	var clientsession = 999999;
	var now = new Date();
	var hour    = now.getHours();
	var clock ="";
	if(hour>=7 && hour<=12){clock ="Buenos días, ";}
	else if(hour>12 && hour<=20){clock ="Buenas tardes, ";}
	else{clock ="Buenas noches, ";}
	
	function killsession(){
		if (confirm("¿De verdad quieres cerrar sesión? \n Perderás todo lo que no se haya guardado.")) {
			window.location = 'authentication-login.php?closed=1';
		  }
	}
	function gotopanel(){
		if (confirm("¿De verdad quieres ir al panel? \n perderás todo lo que no se haya guardado.")) {
			window.location = 'index.php';
		  }
	}
	function changeclient(){
		clientsession = document.getElementById("actualclient").value;
	}
	function devuelve(tick){
		if (confirm("¿Tramitar devolución? \n El ticket se marcará como devuelto.")) {
			devolution(tick);
		  }
	}
</script>
<div class="row">
	<div style="background-color:lightgrey;" class="col-md-2"></div>
	<div style="background-color:black;" class="col-md-8">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h3 class="page-title" style="color: white;"><img src="../assets/images/logo-icon.png" width="40" height="30"></img><img src="../assets/images/logo-text.png" width="150" height="25"></img> // GESTOR DE CAJA &ensp;</h3>
						<span style="color: white; margin: auto;"><h3>//&ensp; <script> document.write (clock); </script> <?php echo $_SESSION["name"]; ?>&ensp;// &ensp;</h3></span> 
						<button type="button" class="btn btn-outline-dark" style="float: right;" onclick="gotopanel(); return false;"><span style="color: white;"><i class="mdi mdi-view-dashboard"></i></span></button>
						<button type="button" class="btn btn-outline-dark" style="float: right;" onclick="killsession(); return false;"><img src="../assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></img></button>
                    </div>
					<div class="col-md-6">
						<marquee style="color: white;"><h4>
						La cantidad de articulos en la cesta actualmente es de: <span id="headinfo">0<span> // Añade algo para comenzar
						</h4>
						</marquee>
					</div>
				<div class="container-fluid">
                   <div class="row">
						<div style="background-color:black;" class="col-md-12 col-xs-12"></div>
						<div style="background-color: #373D4A; max-height: 550px"class="col-md-1"> 
							<br/>
								<div onclick="park(<?php echo($_SESSION["ticketno"]);?>); return false;" class="card card-hover">
									<div class="box bg-primary text-center">
										<h2 class="font-light text-white" style="font-size: 17px;"><i class="fas fa-hand-paper"></i></h2><span style="font-size: 9px; color:white;"><b>Aparcar</b></span>
									</div>
								</div>
								<div onclick="bufferclean(); return false;" class="card card-hover">
									<div class="box bg-danger text-center">
										<h2 class="font-light text-white" style="font-size: 17px;"><i class="fas fa-trash-alt"></i></h2><span style="font-size: 12px; color:white;"><b>Vaciar</b></span>
									</div>
								</div>
								<div onclick="" class="card card-hover" data-toggle="modal" data-target="#modalrestaur">
									<div class="box bg-success text-center">
										<h2 class="font-light text-white" style="font-size: 17px;"><i class="fas fa-recycle"></i></h2><span style="font-size: 9px; color:white;"><b>Restaurar</b></span>
									</div>
								</div>
								
								<div class="modal fade" id="modalrestaur" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog" role="document">
									<div class="modal-content">
									  <div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Restaurar:</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
										</button>
									  </div>
									  <div id="restauration" class="modal-body" style="overflow-y: scroll;">
										<table>
										<thead>
											<tr>
												<th>Cliente</th>
												<th>&ensp;&ensp;</th>
												<th>Ticket</th>
												<th>&ensp;&ensp;</th>
												<th></th>
											</tr>
										</thread>
										<tbody id="restaurationtable">
										
										</table>
									  </div>
									  <div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
									  </div>
									</div>
								  </div>
								</div>
								
								
								
								
							<div onclick="" class="card card-hover" data-toggle="modal" data-target="#modaldevol">
									<div class="box bg-dark text-center">
										<h2 class="font-light text-white" style="font-size: 17px;"><i class="fas fa-eraser"></i></h2><span style="font-size: 8px; color:white;"><b>Devolución</b></span>
									</div>
							</div>
							
							<div class="modal fade" id="modaldevol" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog" role="document">
									<div class="modal-content">
									  <div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Tramitar devoluciones:</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
										</button>
									  </div>
									  <div class="modal-body" style="overflow-y: scroll;">
										<table>
										<thead>
											<tr>
												<th>Cliente</th>
												<th>&ensp;&ensp;</th>
												<th>Ticket</th>
												<th>&ensp;&ensp;</th>
												<th></th>
											</tr>
										</thread>
										<tbody id="devolutiontable">
										
										</table>
									  </div>
									  <div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
									  </div>
									</div>
								  </div>
								</div>
							
							
							<br/><br/>
								<div onclick="" class="card card-hover"  data-toggle="modal" data-target="#modalpay">
									<div class="box bg-warning text-center">
										<h2 class="font-light text-black" style="font-size: 30px;"><i class="fas fa-hand-holding-usd"></i></h2><span style="font-size: 9px; color:black;"><b>Completar compra</b></span>
									</div>
								</div>
								
								
								<div class="modal fade" id="modalpay" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog" role="document">
									<div class="modal-content" id="modalconpay">
									  <div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Restaurar:</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
										</button>
									  </div>
									  <div id="restauration" class="modal-body" style="overflow-y: scroll;">
										<div onclick="efectivo(<?php echo($_SESSION["ticketno"]);?>); return false;" class="card card-hover" data-dismiss="modal">
											<div class="box bg-warning text-center">
												<h2 class="font-light text-black" style="font-size: 40px;"><i class="fas fa-money-bill-wave-alt"></i></h2><span style="font-size: 30px; color:black;"><b>EFECTIVO</b></span>
											</div>
										</div>
										<div onclick="paymorph(<?php echo($_SESSION["ticketno"]);?>); return false;" class="card card-hover">
											<div class="box bg-info text-center">
												<h2 class="font-light text-black" style="font-size: 40px;"><i class="fas fa-coins"></i></h2><span style="font-size: 30px; color:black;"><b>PAYPAL</b></span>
											</div>
										</div>
									  </div>
									  <div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
									  </div>
									</div>
								  </div>
								</div>
							
							<br/>
						</div>
						<div id="buybuffer" style="background-color:lightgrey; max-height: 550px;  overflow-y: scroll;"class="col-md-4">
						<BR/>
							<h2>&ensp;//CESTA &ensp;<i class="fas fa-shopping-basket"></i></h2>
						</div>
						<div id="categories" style="background-color:white; max-height: 550px"class="col-md-4">
							<!-->CATEGORY LOADER<-->
							
						</div>
						
						<div style="background-color:dimgray;" class="col-md-3"> <br/><h2 style="color:white;"> &ensp;//CLIENTES</h2>
							<form style="color:white;">
							<select id="actualclient" onmouseover="changeclient(); return false;" onmouseout="changeclient(); return false;" onchange="changeclient(); return false;" name="cliente">
								<option value="999999">Ninguno (anonimo)</option>
								<?php
								require ('dbjoin.php');
								$put = "select * from cliente";
								$procesado = mysqli_query( $handshake, $put);
								mysqli_close($handshake);
								while ($row = mysqli_fetch_array($procesado)) {
									if (($row['rango'])=="client"){
								echo (utf8_encode('
									<option value ="'.($row['id_cliente']).'">'.($row['nombre']).'</option> '));}}
								?>
								</select>
							</form><br/><br/>
								<div onclick="" class="card card-hover" data-toggle="modal" data-target="#modalclient">
									<div style="height:60px;" class="box bg-light text-center">
										<h2 class="font-light text-black" style="font-size: 20px;"><i class="fas fa-users"></i><i class="fas fa-dollar-sign"></i></h2><span style="font-size: 12px; color:black;"><b>Administrar clientes</b></span>
									</div>
								</div>

								
								<div  class="modal fade" id="modalclient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog" role="document">
									<div style="width:1250px; height: 600px; margin-left: -400px;" class="modal-content">
									  <div style="height: 800px;" class="modal-body" id="clientmodal">
										<?php require('clientlist.php'); ?>
									  </div>
									  <div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
									  </div>
									</div>
								  </div>
								</div>
								
								
							<div id="clientspace">
							</div>
						</div>
						<div style="height: 50px; background-color:dimgray; color: white;" class="col-md-12 col-xs-12"> <b>//TOTAL DE LA CESTA:</b> <span id="total">0.0</span>€ </div>
					</div>
				</div>
				</div>
	</div>
	<div style="background-color:lightgrey;" class="col-md-2"><script id="buildnow"></script></div>
</div>


<script>
function modalchange(){
	$("#contentmodal").load("clientlist.php");    
}
var killer=0;
var abletofinish = false;
		function catloader(){
			restaurationloader();
			devolutionloader();
			var parametros = {
				 object : "none"
			 };
			 $.ajax({
			 data: parametros,
			 url: 'catfront.php',
			 type: 'post',
			 beforeSend: function () {
			 $("#categories").html("Procesando, espere por favor..."); 
			 },
			 success: function (response) {
			 $("#categories").html(response);
			 } 
			 })
			  .fail (function(response) {
			 alert( "error " );
			 });
		}
		function restaurationloader(){
			var parametros = {
				 object : "none"
			 };
			 $.ajax({
			 data: parametros,
			 url: 'restauration.php',
			 type: 'post',
			 beforeSend: function () {
			 $("#restaurationtable").html("Procesando, espere por favor..."); 
			 },
			 success: function (response) {
			 $("#restaurationtable").html(response);
			 } 
			 })
			  .fail (function(response) {
			 alert( "error " );
			 });
		}
		function devolutionloader(){
			var parametros = {
				 object : "none"
			 };
			 $.ajax({
			 data: parametros,
			 url: 'devolutionloader.php',
			 type: 'post',
			 beforeSend: function () {
			 $("#devolutiontable").html("Procesando, espere por favor..."); 
			 },
			 success: function (response) {
			 $("#devolutiontable").html(response);
			 } 
			 })
			  .fail (function(response) {
			 alert( "error " );
			 });
		}
		function bufferwrite(tick,num,can,cli){
			var parametros = {
			     "tick" : tick,
				 "num" : num,
				 "can" : can,
				 "cli" : cli,
			 };
			 $.ajax({
			 data: parametros,
			 url: 'engine/buffer.php',
			 type: 'POST'
			 })
			  .fail (function(response) {
			 alert( "error al escribir en el buffer" );
			 });
		}
		function parker(tick){
			var parametros = {
			     "tick" : tick,
			 };
			 $.ajax({
			 data: parametros,
			 url: 'engine/parker.php',
			 type: 'POST',
			 success: function (response) {
				  bufferclean();
				  location.reload();
			 }
			 })
			  .fail (function(response) {
			 alert( "error al aparcar compra" );
			 });
		}
		function devolution(tick){
			 mailerdev(tick);
			var parametros = {
			     "tick" : tick,
			 };
			 $.ajax({
			 data: parametros,
			 url: 'engine/devolution.php',
			 type: 'POST'
			 })
			  .fail (function(response) {
			 alert( "error al devolver" );
			 });
		}
		function mailer(tick,type){
			var parametros = {
			     "tick" : tick,
				 "type" : type,
			 };
			 $.ajax({
			 data: parametros,
			 url: 'engine/mailer.php',
			 type: 'POST'
			 })
			  .fail (function(response) {
			 alert( "error al enviar mail" );
			 });
		}
		function mailerdev(tick){
			var parametros = {
			     "tick" : tick,
			 };
			 $.ajax({
			 data: parametros,
			 url: 'engine/mailerdev.php',
			 type: 'POST',
			 success: function (response) {
				 devolutionloader();
			 }
			 })
			  .fail (function(response) {
			 alert( "error al enviar mail" );
			 });
		}
		function rebuild(tick){
			if (confirm("¿Cargar ticket? \n La cesta se vaciará.")) {
			var parametros = {
			     "tick" : tick,
			 };
			 $.ajax({
			 data: parametros,
			 url: 'engine/ticketloader.php',
			 type: 'POST',
			 success: function (response) {
				 bufferclean();
				 $("#buildnow").html(response); 
				  eval(document.getElementById("buildnow").innerHTML);
				  kill(tick);
				  restaurationloader();
			 }
			 })
			  .fail (function(response) {
			 alert( "error al restaurar" );
			});}
		}
		function kill(tick){
			var parametros = {
			     "tick" : tick,
			 };
			 $.ajax({
			 data: parametros,
			 url: 'engine/ticketkiller.php',
			 type: 'POST'
			 })
			  .fail (function(response) {
			 alert( "error al eliminar ticket" );
			 });
		}
		function objectloader(item){
			var parametros = {
				 "object" : item
			 };
			 $.ajax({
			 data: parametros,
			 url: 'objfront.php',
			 type: 'post',
			 beforeSend: function () {
			 $("#categories").html("Procesando, espere por favor..."); 
			 },
			 success: function (response) {
			 $("#categories").html(response);
			 } 
			 })
			  .fail (function(response) {
			 alert( "error " );
			 });
		}
		function buffer(item,number,price){
			var able=true;
				if ($('#prd'+number).length > 0){
					plusproduct(number); able=false;}
			if (able==true){
			var loader = document.getElementById("buybuffer").innerHTML;
			var newcard = "<div data-name=\""+item+"\" data-object=\""+number+"\" data-value=\""+price+"\" style=\"font-size:14px; margin-bottom:-15px; margin-top:-10px; width: 315px; height; 20px;\" id=\"prd"+number+"\" class=\"card\"><div class=\"card-body\">"+item+" "+price+"€ "+" &ensp; cantidad: <span id=\"stack"+number+"\">1<span/><span id=\"subs"+number+"\"></span><div style=\" width: 25px; height: 25px;  float: right;\"class=\"box bg-danger text-center\" onclick=\"bufferkiller("+number+"); return false;\"><h3 class=\"font-light text-white\" style=\"font-size: 10px;\"><i class=\"fa fa-trash\"></i></h3></div></div></div>";
			document.getElementById("buybuffer").innerHTML = loader+newcard;
			}
			var total = parseFloat( $('#total').text() );
			document.getElementById("total").innerHTML = total + price;
			onetobasket();
			abletofinish = true;
		}
		function bufferkiller(ident){
			var numberobjects = parseInt( $('#stack'+ident).text() );
			var money = document.getElementById("prd"+ident).getAttribute('data-value') * numberobjects;
			document.getElementById("prd"+ident).remove();
			var total = parseFloat( $('#total').text() );
			document.getElementById("total").innerHTML = total - money;
			for (i=0; i<numberobjects; i++){
				oneoutbasket();
			}
		}
		function bufferclean(){
			document.getElementById("buybuffer").innerHTML = "<br/><h2>&ensp;//CESTA &ensp;<i class=\"fas fa-shopping-basket\"></i></h2></div>"
			var total = parseFloat( $('#total').text() );
			total = 0;
			document.getElementById("total").innerHTML = total;
			var quant = parseInt( $('#headinfo').text() );
			quant=0;
			document.getElementById("headinfo").innerHTML = quant;
			abletofinish = false;
		}
		function onetobasket(){
			var quant = parseInt( $('#headinfo').text() );
			quant=quant+1;
			document.getElementById("headinfo").innerHTML = quant;
		}
		function oneoutbasket(){
			var quant = parseInt( $('#headinfo').text() );
			quant=quant-1;
			document.getElementById("headinfo").innerHTML = quant;
			if (quant == 0){abletofinish = false;}
		}
		function plusproduct(ident){
			var numberobjects = parseInt( $('#stack'+ident).text() );
			numberobjects = numberobjects + 1;
			document.getElementById("stack"+ident).innerHTML = numberobjects+" <div style=\" width: 25px; height: 25px;  float: right;\"class=\"box bg-danger text-center\" onclick=\"bufferkiller("+ident+"); return false;\"><h3 class=\"font-light text-white\" style=\"font-size: 10px;\"><i class=\"fa fa-trash\"></i></h3></div><div id=\"ammount"+ident+"\" style=\"margin-right:10px; width: 25px; height: 25px; float: right;\"class=\"box bg-danger text-center\" onclick=\"remove("+ident+"); return false;\"><h3 class=\"font-light text-white\" style=\"font-size: 10px;\"><i class=\"fas fa-minus-square\"></i></h3></div>";
		}
		function remove(ident){
			var numberobjects = parseInt( $('#stack'+ident).text() );
			numberobjects = numberobjects - 1;
			document.getElementById("stack"+ident).innerHTML = numberobjects+" <div style=\" width: 25px; height: 25px;  float: right;\"class=\"box bg-danger text-center\" onclick=\"bufferkiller("+ident+"); return false;\"><h3 class=\"font-light text-white\" style=\"font-size: 10px;\"><i class=\"fa fa-trash\"></i></h3></div><div id=\"ammount"+ident+"\" style=\"margin-right:10px; width: 25px; height: 25px; float: right;\"class=\"box bg-danger text-center\" onclick=\"remove("+ident+"); return false;\"><h3 class=\"font-light text-white\" style=\"font-size: 10px;\"><i class=\"fas fa-minus-square\"></i></h3></div>";
			var total = parseFloat( $('#total').text() );
			var money = document.getElementById("prd"+ident).getAttribute('data-value');
			document.getElementById("total").innerHTML = total - money;
			oneoutbasket();
			if(numberobjects <2){
				document.getElementById("stack"+ident).innerHTML = "";
				document.getElementById("stack"+ident).innerHTML = numberobjects+" <div style=\" width: 25px; height: 25px;  float: right;\"class=\"box bg-danger text-center\" onclick=\"bufferkiller("+ident+"); return false;\"><h3 class=\"font-light text-white\" style=\"font-size: 10px;\"><i class=\"fa fa-trash\"></i></h3></div>";
			}
		}
		function finish(turboticket){
			<?php $sessiontick = $_SESSION["ticketno"]; ?>
			if (abletofinish == true){
				var cantidadproducto = 0;
				var codigoproducto = 0;
				lasticket = <?php echo($sessiontick); ?>;
				<?php
				require ('dbjoin.php');
				$put = "select * from productos";
				$procesado = mysqli_query( $handshake, $put);
				mysqli_close($handshake);
				while ($row = mysqli_fetch_array($procesado)) {
				echo ('
					if ($(\'#prd\'+'.($row['id_producto']).').length > 0){ 
					cantidadproducto = parseInt( $(\'#stack\'+'.($row['id_producto']).').text() ); 
					nameproducto = document.getElementById("prd"+'.($row['id_producto']).').getAttribute(\'data-name\');
					codigoproducto = document.getElementById("prd"+'.($row['id_producto']).').getAttribute(\'data-object\');
					precioproducto = document.getElementById("prd"+'.($row['id_producto']).').getAttribute(\'data-value\');
					bufferwrite('.$_SESSION["ticketno"].',codigoproducto,cantidadproducto,clientsession);
					}');}
				?>
				bufferclean();
				if (notabuy == false){
					mailer(turboticket,"buy");
					alert ('Compra realizada');
					location.reload();
					}
				  }
				}
		function efectivo(turboticket){
			<?php $sessiontick = $_SESSION["ticketno"]; ?>
			if (abletofinish == true){
				var topay = parseFloat( $('#total').text() );
				var payment = false;
				  var cash = prompt("El total a pagar es de: "+topay+"€ \nIntroduce la cantidad en metálico:", "");
				  if (cash == null || cash == "") {
					alert("No has introducido una cantidad, no se va a continuar.");
				  }
				  if (cash < topay) {
					alert("No has introducido una cantidad suficiente, no se va a continuar");
				  }
				  else {
					var cambio = cash - topay;
					cambio = cambio.toFixed(2);
					alert("Cambio: "+cambio+"€ ")
					payment = true;
				  }
				  if(payment == true){
				var cantidadproducto = 0;
				var codigoproducto = 0;
				lasticket = <?php echo($sessiontick); ?>;
				<?php
				require ('dbjoin.php');
				$put = "select * from productos";
				$procesado = mysqli_query( $handshake, $put);
				mysqli_close($handshake);
				while ($row = mysqli_fetch_array($procesado)) {
				echo ('
					if ($(\'#prd\'+'.($row['id_producto']).').length > 0){ 
					cantidadproducto = parseInt( $(\'#stack\'+'.($row['id_producto']).').text() ); 
					nameproducto = document.getElementById("prd"+'.($row['id_producto']).').getAttribute(\'data-name\');
					codigoproducto = document.getElementById("prd"+'.($row['id_producto']).').getAttribute(\'data-object\');
					precioproducto = document.getElementById("prd"+'.($row['id_producto']).').getAttribute(\'data-value\');
					bufferwrite('.$_SESSION["ticketno"].',codigoproducto,cantidadproducto,clientsession);
					}');}
				?>
				bufferclean();
				if (notabuy == false){
					mailer(turboticket,"buy");
					alert ('Compra realizada');
					location.reload();
					}
				  }
				}
		}
		function paymorph(turboticket){
			if(abletofinish == true){
				var topay = parseFloat( $('#total').text() );
				var payment = "<div><img src='https://chart.googleapis.com/chart?chs=190x190&cht=qr&chl=http://paypal.me/paypal.me/regalensk22/"+topay+"'/><button onclick='paypal("+turboticket+");'>Aceptar</button>&ensp;&ensp;<button onclick='location.reload();'>Cancelar compra</button></div>";
				document.getElementById("modalconpay").innerHTML = "";
				document.getElementById("modalconpay").innerHTML = payment;
				alert('Escanea el qr para pagar y pulsa aceptar para continuar');
			}
		}
		function paypal(turboticket){
			<?php $sessiontick = $_SESSION["ticketno"]; ?>
			if (abletofinish == true){
				var cantidadproducto = 0;
				var codigoproducto = 0;
				lasticket = <?php echo($sessiontick); ?>;
				<?php
				require ('dbjoin.php');
				$put = "select * from productos";
				$procesado = mysqli_query( $handshake, $put);
				mysqli_close($handshake);
				while ($row = mysqli_fetch_array($procesado)) {
				echo ('
					if ($(\'#prd\'+'.($row['id_producto']).').length > 0){ 
					cantidadproducto = parseInt( $(\'#stack\'+'.($row['id_producto']).').text() ); 
					nameproducto = document.getElementById("prd"+'.($row['id_producto']).').getAttribute(\'data-name\');
					codigoproducto = document.getElementById("prd"+'.($row['id_producto']).').getAttribute(\'data-object\');
					precioproducto = document.getElementById("prd"+'.($row['id_producto']).').getAttribute(\'data-value\');
					bufferwrite('.$_SESSION["ticketno"].',codigoproducto,cantidadproducto,clientsession);
					}');}
				?>
				bufferclean();
				if (notabuy == false){
					mailer(turboticket,"buy");
					alert ('Compra realizada');
					location.reload();
					}
				  }
				}
		function park(turboticket){
			if (abletofinish == true){
				notabuy = true;
				finish();
				parker(turboticket);
				alert('compra aparcada');
				notabuy = false;
				location.reload();
			}
		}
		
	</script>
<?php
require('nav/footer.php');
?>
		</div>
    </div>
	</body>
</html>