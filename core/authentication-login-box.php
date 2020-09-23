<!DOCTYPE html>
<?php session_start(); ?>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>REGALENS LOGIN SCREEN</title>
    <link href="../dist/css/style.min.css" rel="stylesheet">
</head>

<body>
    <div class="main-wrapper">
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
            <div class="auth-box bg-dark border-top border-secondary">
                <div id="loginform">
                    <div class="text-center p-t-20 p-b-20">
                        <span class="db"><img src="../assets/images/logo-box.png" alt="logo" /></span>
                    </div>
                    <form class="form-horizontal m-t-20" id="loginform" action="engine/processing/loginvalidation-box.php" method="POST">
                        <div class="row p-b-30">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" placeholder="Usuario" name="nombre" id="nombre" aria-label="username" aria-describedby="basic-addon1" required="">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="password" class="form-control form-control-lg" placeholder="Contrase&ntilde;a" name="pass" id="pass" aria-label="Password" aria-describedby="basic-addon1" required="">
                                </div>
                            </div>
                        </div>
                        <div class="row border-top border-secondary">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="p-t-20">
										<a href="frontend.php"><button class="btn btn-info" type="button"><i class="far fa-arrow-alt-circle-left m-r-5"></i> Volver al TPV</button></a><a href="authentication-login.php">&ensp;<button class="btn btn-warning" type="button"><i class="mdi mdi-view-dashboard m-r-5"></i><b>Cambiar a panel</b></button></a>
                                        <button class="btn btn-success float-right" type="submit">Login</button>
                                    </div>
									<?php
									if (isset($_GET["failed"])){
										echo ('<br/><span style="color: red;"><b><h4> &ensp;<i class="fas fa-exclamation-triangle"></i> El usuario o la contraseña no coinciden</h4></b></span>');
									}
									if (isset($_GET["error"])){
										echo ('<br/><span style="color: red;"><b><h4> &ensp;<i class="fas fa-exclamation-triangle"></i> No has iniciado sesión</h4></b></span>');
									}
									if (isset($_GET["closed"])){
										echo ('<br/><span style="color: green;"><b><h3> &ensp;<i class="fas fa-exclamation-triangle"></i> Se ha cerrado la sesión</h3></b></span>');
										require('destroy.php');
									}
									?>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>

    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    $('#to-login').click(function(){
        
        $("#recoverform").hide();
        $("#loginform").fadeIn();
    });
    </script>
</body>
</html>