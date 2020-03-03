<?php
require_once('core/helpers/dashboard_template.php');
loginTemplate::loginHead('Dashboard');
?>

<header>
    <nav class="navbar fixed-top navbar-light bg-light">
        <a class="navbar-brand" href="#">Fixed top</a>
    </nav>
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar" class="active">
            <ul class="list-unstyled components mb-5 ">
                <li class="active">
                    <a href="#">
                        <object data="resources/img/dashboard.svg" type="image/svg+xml" class="menu__svg"></object>
                        <p>Dashboard</p></a>
                </li>
                <li>
                    <a href="#">
                        <object data="resources/img/ordenes.svg" type="image/svg+xml" class="menu__svg"></object>
                        <p>Ordenes</p></a>
                </li>
                <li>
                    <a href="#">
                        <object data="resources/img/alquileres.svg" type="image/svg+xml" class="menu__svg"></object>
                        <p>Alquileres</p></a>
                </li>
                <li>
                    <a href="#">
                        <object data="resources/img/sucursales.svg" type="image/svg+xml" class="menu__svg"></object>
                        <p>Sucursales</p></a>
                </li>
                <li>
                    <a href="#">
                        <object data="resources/img/categorias.svg" type="image/svg+xml" class="menu__svg"></object>
                        <p>Categorías</p></a>
                </li>
                <li>
                    <a href="#">
                        <object data="resources/img/productos.svg" type="image/svg+xml" class="menu__svg"></object>
                        <p>Productos</p></a>
                </li>
                <li>
                    <a href="#">
                        <object data="resources/img/clientes.svg" type="image/svg+xml" class="menu__svg"></object>
                        <p>Clientes</p></a>
                </li>
                <li>
                    <a href="#">
                        <object data="resources/img/usuarios.svg" type="image/svg+xml" class="menu__svg"></object>
                        <p>Usuarios</p></a>
                </li>
                <li>
                    <a href="#">
                        <object data="resources/img/ajustes.svg" type="image/svg+xml" class="menu__svg"></object>
                        <p>Ajustes</p></a>
                </li>
            </ul>

            <div class="footer">
                <a href="#">
                    <object data="resources/img/logout.svg" type="image/svg+xml" class="menu__svg"></object>
                    <p>Cerrar Sesión</p></a>
            </div>
        </nav>
</header>
<main>

</main>

<?php
loginTemplate::loginEnd();
?>
