<header class="header black-bg">
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
    </div>
    <!--logo start-->
    <a href="index.html" class="logo"><b>Grupo<span>SOCA</span></b></a>
    <!--logo end-->

    <div class="top-menu">
        <ul class="nav pull-right top-menu">
            <li><a class="logout" href="../../login.html">Cerrar Sesión</a></li>
        </ul>
    </div>
</header>
<!--header end-->
<!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <p class="centered"><a href="profile.html"><img src="../assets/img/slg.png" class="img-circle" width="80"></a></p>
            <h5 class="centered">Mantenimiento</h5>
            <li class="mt">
                <a class="active" href="index.php">
                    <i class="fa fa-dashboard"></i>
                    <span>Panel de Control</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-truck"></i>
                    <span>Unidades</span>
                </a>
                <ul class="sub">
                    <li><a href="alta_unidad.php">Alta de Unidad</a></li>
                    <li><a href="listar_unidades.php">Bitacora de Unidades</a></li>

                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-gear"></i>
                    <span>Bitacora de Mantenimiento</span>
                </a>
                <ul class="sub">
                    <li><a href="bitacora_mantenimiento.php">Crear Registro</a></li>
                    <li><a href="listar_mantenimientos.php">Bitacora</a></li>

                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-tint"></i>
                    <span>Bitacora de Combustible</span>
                </a>
                <ul class="sub">
                    <li><a href="bitacora_combustible.php">Crear Registro</a></li>
                    <li><a href="listar_combustible.php">Bitacora</a></li>

                </ul>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>