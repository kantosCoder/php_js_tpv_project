<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div id="main-wrapper">
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <a class="navbar-brand" onclick="alert('ESPERO QUE HAYAS SIDO BUENO'); killforce(); return false"href="index.php">
                        <b class="logo-icon p-l-10">
                            <img src="../assets/images/logo-icon.png" alt="homepage" class="light-logo" />
                           
                        </b>
                        <span class="logo-text">
                             <img src="../assets/images/logo-text.png" alt="homepage" class="light-logo" />
                            
                        </span>
                    </a>
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
				<div>
				</div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class=" fas fa-angle-double-left"></i><i class="fas fa-angle-double-right font-24"></i></a></li>
                    </ul>
                    <ul class="navbar-nav float-right">
                         <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="../assets/images/users/onc.jpg" alt="user" class="rounded-circle" width="31">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown" aria-labelledby="2">
                                <ul class="list-style-none">
                                    <li>
                                        <div class="">
											<?php
											if(isset($_SESSION["permission"])){
												echo '
												<script>
												//cerrar sesion
													function killforce(){
														alert("ESPERO QUE HAYAS SIDO BUENO")
															window.location = \'authentication-login.php?closed=1\';
													}
													function killsession(){
														if (confirm("ESPERO QUE HAYAS SIDO BUENO")) {
															window.location = \'authentication-login.php?closed=1\';
														  }
													}
												</script>
												';
												if($_SESSION["permission"]=="admin"){
												echo '
												<a href="" onclick="killsession();return false" class="link border-top">
													<div class="d-flex no-block align-items-center p-10">
														<span class="btn btn-primary btn-circle"><i class="fas fa-hashtag"></i></span>
														<div class="m-l-10">
															<h5 class="m-b-0">SALIR</h5> 
															<span ><i class="fas fa-hashtag"></i>&ensp;¿SALIR?</span> 
														</div>
													</div>
												</a>';
												}
												if($_SESSION["permission"]=="user"){
												echo '
												<a href="" onclick="killsession();return false" class="link border-top">
													<div class="d-flex no-block align-items-center p-10">
														<span class="btn btn-primary btn-circle"><i class="ti-user"></i></span>
														<div class="m-l-10">
															<h5 class="m-b-0">Usuario</h5> 
															<span><i class="fas fa-power-off"></i>&ensp;Desconectar</span> 
														</div>
													</div>
												</a>';;
												} 
											}?>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>