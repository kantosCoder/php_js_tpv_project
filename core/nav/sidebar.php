 <aside class="left-sidebar" data-sidebarbg="skin5">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Menú principal</span></a></li>
						<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="productlist.php" aria-expanded="false"><i class="fas fa-boxes"></i><span class="hide-menu">Productos</span></a></li>
						<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="clientlist.php" aria-expanded="false"><i class="fas fa-user"></i><span class="hide-menu">Clientes</span></a></li>
					<?php 
					if($_SESSION["permission"]=="admin"){ echo(' 	
					<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="userlist.php" aria-expanded="false"><i class="fas fa-user-circle"></i><span class="hide-menu">Usuarios</span></a></li>');}?>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="payments.php" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Facturas </span></a></li>
						<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="info.php" aria-expanded="false"><i class="fas fa-info-circle"></i><span class="hide-menu">Info </span></a></li>
						<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="frontend.php" aria-expanded="false"><i class="fas fa-tablet-alt"></i><span class="hide-menu">TPV</span></a></li>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>