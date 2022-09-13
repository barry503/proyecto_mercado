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

<li class=" has-sub">
    <a class="js-arrow" href="#">
        <i class="fas  fa-code"></i>Administracion
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
                <a href="crud_permiso.php">
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
            
        </li>
    </ul>
</li>


<li class=" has-sub">
    <a class="js-arrow" href="#">
        <i class="fas  fa-refresh"></i>Procesos
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
        </li>
    </ul>
</li>