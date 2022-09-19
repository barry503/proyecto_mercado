<li class="active has-sub">
    <a class="js-arrow" href="#">
        <i class="fas fa-tachometer-alt"></i>Dashboard
        <span class="arrow">
            <i class="fas fa-angle-down"></i>
        </span>
    </a>
    <ul class="list-unstyled navbar__sub-list js-sub-list" style="display: none;">
        <li>
            <a href="inicio.php">
                <i class="fas fa-home"></i>Inicio</a>
        </li>
    </ul>
</li>
<?php if ($_SESSION['idroles']==1): ?>
    
<li class=" has-sub">
    <a class="js-arrow" href="#">
        <i class="fas  fa-code"></i><?php echo fun_rol(1); ?>
        <span class="arrow">
            <i class="fas fa-angle-down"></i>
        </span>
    </a>

    <ul class="list-unstyled navbar__sub-list js-sub-list" style="display: none;">
        <li>

            <?php $menu_permiso = menu_fun(1); ?>
            <?php if (!empty($_SESSION[$menu_permiso])==1): ?>
                <a href="crud_website.php">
                <i class="fa fa-building"></i><?php echo strtr ($menu_permiso, "_", " "); ?>
                </a>
            <?php endif; ?>
            
            <?php $menu_permiso = menu_fun(9); ?>
            <?php if (!empty($_SESSION[$menu_permiso])==1): ?>
                <a href="crud_puesto.php">
                    <i class="fas fa-puzzle-piece"></i><?php echo strtr ($menu_permiso, "_", " "); ?>
                </a>
            <?php endif; ?>
            <?php $menu_permiso = menu_fun(2); ?>
            <?php if (!empty($_SESSION[$menu_permiso])==1): ?>
                <a href="crud_roles.php">
                <i class="far fa-check-square"></i><?php echo strtr ($menu_permiso, "_", " "); ?>
                </a>
            <?php endif; ?>

            <?php $menu_permiso = menu_fun(3); ?>
            <?php if (!empty($_SESSION[$menu_permiso])==1): ?>
                <a href="crud_usuario.php">
                <i class="fas fa-users"></i><?php echo strtr ($menu_permiso, "_", " "); ?>
                </a>
            <?php endif; ?>

            <?php $menu_permiso = menu_fun(7); ?>
            <?php if (!empty($_SESSION[$menu_permiso])==1): ?>
                <a href="crud_sectores.php">
                <i class="fas fa-shopping-cart"></i><?php echo strtr ($menu_permiso, "_", " "); ?>
                </a>
            <?php endif; ?>


            <?php $menu_permiso = menu_fun(10); ?>
            <?php if (!empty($_SESSION[$menu_permiso])==1): ?>
                <a href="crud_giros.php">
                <i class="fas fa fa-repeat"></i><?php echo strtr ($menu_permiso, "_", " "); ?>
                </a>
            <?php endif; ?>

            <?php $menu_permiso = menu_fun(12); ?>
            <?php if (!empty($_SESSION[$menu_permiso])==1): ?>
                <a href="crud_androide.php">
                <i class="fas fa  fa-mobile"></i><?php echo strtr ($menu_permiso, "_", " "); ?>
                </a>
            <?php endif; ?>

            <?php $menu_permiso = menu_fun(14); ?>
            <?php if (!empty($_SESSION[$menu_permiso])==1): ?>
                <a href="crud_rutas.php">
                <i class="fas fa  fa-road"></i><?php echo strtr ($menu_permiso, "_", " "); ?>
                </a>
            <?php endif; ?>

            <?php $menu_permiso = menu_fun(16); ?>
            <?php if (!empty($_SESSION[$menu_permiso])==1): ?>
                <a href="crud_rutasPuestos.php">
                <i class="fas fa  fa-road"></i><i class="fas fa-puzzle-piece"></i><?php echo strtr ($menu_permiso, "_", " "); ?>
                </a>
            <?php endif; ?>
            
        </li>
    </ul>
</li>
<?php endif ?>


<?php if ($_SESSION['idroles']==2): ?>
    
<li class=" has-sub">
    <a class="js-arrow" href="#">
        <i class="fas  fa fa-keyboard-o"></i><?php echo fun_rol(2); ?>
        <span class="arrow">
            <i class="fas fa-angle-down"></i>
        </span>
    </a>

    <ul class="list-unstyled navbar__sub-list js-sub-list" style="display: none;">
        <li>
            <a href="#">
            <i class="fa fa-circle"></i>Enlace prueba
            </a>
        </li>
    </ul>
</li>

<?php endif ?>







<!-- vistas----------------------------------------------------------------------------------------------------------- -->

<li class=" has-sub">
    <a class="js-arrow" href="#">
        <!-- <i class="fas  fa-refresh"></i> --><i class="fas  fa-eye"></i>Vistas
        <span class="arrow">
            <i class="fas fa-angle-down"></i>
        </span>
    </a>

    <ul class="list-unstyled navbar__sub-list js-sub-list" style="display: none;">
        <li>
            <?php $menu_permiso = menu_fun(4); ?>
            <?php if (!empty($_SESSION[$menu_permiso])==1): ?>
                <a href="view_puesto.php">
                    <i class="fas fa-puzzle-piece"></i><?php echo strtr ($menu_permiso, "_", " "); ?>
                </a>
            <?php endif; ?>
            <?php $menu_permiso = menu_fun(5); ?>
            <?php if (!empty($_SESSION[$menu_permiso])==1): ?>
                <a href="view_permiso.php">
                <i class="far fa-check-square"></i><?php echo strtr ($menu_permiso, "_", " "); ?>
                </a>
            <?php endif; ?>

            <?php $menu_permiso = menu_fun(6); ?>
            <?php if (!empty($_SESSION[$menu_permiso])==1): ?>
                <a href="view_usuario.php">
                <i class="fas fa-users"></i><?php echo strtr ($menu_permiso, "_", " "); ?>
                </a>
            <?php endif; ?>

            <?php $menu_permiso = menu_fun(8); ?>
            <?php if (!empty($_SESSION[$menu_permiso])==1): ?>
                <a href="view_sectores.php">
                <i class="fas fa-shopping-cart"></i><?php echo strtr ($menu_permiso, "_", " "); ?>
                </a>
            <?php endif; ?>

            <?php $menu_permiso = menu_fun(11); ?>
            <?php if (!empty($_SESSION[$menu_permiso])==1): ?>
                <a href="view_giros.php">
                <i class="fas fa fa-repeat"></i><?php echo strtr ($menu_permiso, "_", " "); ?>
                </a>
            <?php endif; ?>

            <?php $menu_permiso = menu_fun(13); ?>
            <?php if (!empty($_SESSION[$menu_permiso])==1): ?>
                <a href="view_androide.php">
                <i class="fas fa  fa-mobile"></i><?php echo strtr ($menu_permiso, "_", " "); ?>
                </a>
            <?php endif; ?>

            <?php $menu_permiso = menu_fun(15); ?>
            <?php if (!empty($_SESSION[$menu_permiso])==1): ?>
                <a href="view_rutas.php">
                <i class="fas fa  fa-road"></i><?php echo strtr ($menu_permiso, "_", " "); ?>
                </a>
            <?php endif; ?>

            <?php $menu_permiso = menu_fun(17); ?>
            <?php if (!empty($_SESSION[$menu_permiso])==1): ?>
                <a href="view_rutasPuestos.php">
                <i class="fas fa  fa-th"></i><!-- <i class="fas fa-puzzle-piece"></i> --><?php echo strtr ($menu_permiso, "_", " "); ?>
                </a>
            <?php endif; ?>

        </li>
    </ul>
</li>
<!-- vistas----------------------------------------------------------------------------------------------------------- -->