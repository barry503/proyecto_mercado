<?php if ($_SESSION['idroles']==1): ?>
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="nav-icon fas  fa-code"></i>
            <p>
                <?php echo fun_rol(1); ?>
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">

            <?php $menu_permiso = menu_fun(1); ?>
            <?php if (!empty($_SESSION[$menu_permiso])==1): ?>
                <li class="nav-item">
                    <a href="crud_website.php" class="nav-link">
                        <i class="nav-icon fa fa-building"></i>
                        <p><?php echo strtr ($menu_permiso, "_", " "); ?></p>
                    </a>
                </li>
            <?php endif; ?>

            <?php $menu_permiso = menu_fun(9); ?>
            <?php if (!empty($_SESSION[$menu_permiso])==1): ?>
                <li class="nav-item">
                    <a href="crud_puesto.php" class="nav-link">
                        <i class="nav-icon fas fa-puzzle-piece"></i>
                        <p><?php echo strtr ($menu_permiso, "_", " "); ?></p>
                    </a>
                </li>
            <?php endif; ?>
            <?php $menu_permiso = menu_fun(2); ?>
            <?php if (!empty($_SESSION[$menu_permiso])==1): ?>
                <li class="nav-item">
                    <a href="crud_roles.php" class="nav-link">
                        <i class="nav-icon far fa-check-square"></i>
                        <p><?php echo strtr ($menu_permiso, "_", " "); ?></p>
                    </a>
                </li>
            <?php endif; ?>

            <?php $menu_permiso = menu_fun(3); ?>
            <?php if (!empty($_SESSION[$menu_permiso])==1): ?>
                <li class="nav-item">
                    <a href="crud_usuario.php" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p><?php echo strtr ($menu_permiso, "_", " "); ?></p>
                    </a>
                </li>
            <?php endif; ?>

            <?php $menu_permiso = menu_fun(7); ?>
            <?php if (!empty($_SESSION[$menu_permiso])==1): ?>
                <li class="nav-item">
                    <a href="crud_sectores.php" class="nav-link">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p><?php echo strtr ($menu_permiso, "_", " "); ?></p>
                    </a>
                </li>
            <?php endif; ?>


            <?php $menu_permiso = menu_fun(10); ?>
            <?php if (!empty($_SESSION[$menu_permiso])==1): ?>
                <li class="nav-item">
                    <a href="crud_giros.php" class="nav-link">
                        <i class="nav-icon fas fa fa-repeat"></i>
                        <p><?php echo strtr ($menu_permiso, "_", " "); ?></p>
                    </a>
                </li>
            <?php endif; ?>

            <?php $menu_permiso = menu_fun(12); ?>
            <?php if (!empty($_SESSION[$menu_permiso])==1): ?>
                <li class="nav-item">
                    <a href="crud_androide.php" class="nav-link">
                        <i class="nav-icon fas fa  fa-mobile"></i>
                        <p><?php echo strtr ($menu_permiso, "_", " "); ?></p>
                    </a>
                </li>
            <?php endif; ?>

            <?php $menu_permiso = menu_fun(14); ?>
            <?php if (!empty($_SESSION[$menu_permiso])==1): ?>
                <li class="nav-item">
                    <a href="crud_rutas.php" class="nav-link">
                        <i class="nav-icon fas fa  fa-road"></i>
                        <p><?php echo strtr ($menu_permiso, "_", " "); ?></p>
                    </a>
                </li>
            <?php endif; ?>

            <?php $menu_permiso = menu_fun(16); ?>
            <?php if (!empty($_SESSION[$menu_permiso])==1): ?>
                <li class="nav-item">
                    <a href="crud_rutasPuestos.php" class="nav-link">
                        <i class="nav-icon fas fa  fa-road"></i><i class="fas fa-puzzle-piece"></i>
                        <p><?php echo strtr ($menu_permiso, "_", " "); ?></p>
                    </a>
                </li>
            <?php endif; ?>

            <?php $menu_permiso = menu_fun(18); ?>
            <?php if (!empty($_SESSION[$menu_permiso])==1): ?>
                <li class="nav-item">
                    <a href="crud_tarifa.php" class="nav-link">
                        <i class="nav-icon fa fa-dollar"></i>
                        <p><?php echo strtr ($menu_permiso, "_", " "); ?></p>
                    </a>
                </li>
            <?php endif; ?>

            <?php $menu_permiso = menu_fun(20); ?>
            <?php if (!empty($_SESSION[$menu_permiso])==1): ?>
                <li class="nav-item">
                    <a href="crud_tarifa_dev.php" class="nav-link">
                        <i class="nav-icon fa fa-cog"></i>
                        <p><?php echo strtr ($menu_permiso, "_", " "); ?></p>
                    </a>
                </li>
            <?php endif; ?>

            <?php $menu_permiso = menu_fun(21); ?>
            <?php if (!empty($_SESSION[$menu_permiso])==1): ?>
                <li class="nav-item">
                    <a href="crud_contribuyente.php" class="nav-link">
                        <i class="nav-icon fa fa-list-alt"></i>
                        <p><?php echo strtr ($menu_permiso, "_", " "); ?></p>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </li>
<?php endif; ?>


    <!-- <?php if ($_SESSION['idroles']==2): ?> -->
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas  fa fa-keyboard-o"></i>
                <p>
                    <?php #echo fun_rol(2); ?>holaaa
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-list-alt"></i>
                        <p>link prueba</p>
                    </a>
                </li>

            </ul>
        </li>
    <!-- <?php endif ?> -->



    <!-- vistas----------------------------------------------------------------------------------------------------------- -->
    <?php if ($_SESSION['idroles']==1): ?>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas  fa-eye"></i>
                <p>
                    Vistas
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <?php $menu_permiso = menu_fun(4); ?>
                <?php if (!empty($_SESSION[$menu_permiso])==1): ?>

                    <li class="nav-item">
                    <a href="view_puesto.php" class="nav-link">
                        <i class="nav-icon fas fa-puzzle-piece"></i>
                        <p><?php echo strtr ($menu_permiso, "_", " "); ?></p>
                    </a>
                    </li>
                <?php endif; ?>

                <?php $menu_permiso = menu_fun(5); ?>
                <?php if (!empty($_SESSION[$menu_permiso])==1): ?>
                    <li class="nav-item">
                        <a href="view_permiso.php" class="nav-link">
                            <i class="nav-icon far fa-check-square"></i>
                            <p><?php echo strtr ($menu_permiso, "_", " "); ?></p>
                        </a>
                    </li>
                <?php endif; ?>

                <?php $menu_permiso = menu_fun(6); ?>
                <?php if (!empty($_SESSION[$menu_permiso])==1): ?>
                    <li class="nav-item">
                        <a href="view_usuario.php" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p><?php echo strtr ($menu_permiso, "_", " "); ?></p>
                        </a>
                    </li>
                <?php endif; ?>

                <?php $menu_permiso = menu_fun(8); ?>
                <?php if (!empty($_SESSION[$menu_permiso])==1): ?>
                    <li class="nav-item">
                        <a href="view_sectores.php" class="nav-link">
                            <i class="nav-icon fas fa-shopping-cart"></i>
                            <p><?php echo strtr ($menu_permiso, "_", " "); ?></p>
                        </a>
                    </li>
                <?php endif; ?>

                <?php $menu_permiso = menu_fun(11); ?>
                <?php if (!empty($_SESSION[$menu_permiso])==1): ?>
                    <li class="nav-item">
                        <a href="view_giros.php" class="nav-link">
                            <i class="nav-icon fas fa fa-repeat"></i>
                            <p><?php echo strtr ($menu_permiso, "_", " "); ?></p>
                        </a>
                    </li>
                <?php endif; ?>

                <?php $menu_permiso = menu_fun(13); ?>
                <?php if (!empty($_SESSION[$menu_permiso])==1): ?>
                    <li class="nav-item">
                        <a href="view_androide.php" class="nav-link">
                            <i class="nav-icon fas fa  fa-mobile"></i>
                            <p><?php echo strtr ($menu_permiso, "_", " "); ?></p>
                        </a>
                    </li>
                <?php endif; ?>

                <?php $menu_permiso = menu_fun(15); ?>
                <?php if (!empty($_SESSION[$menu_permiso])==1): ?>
                    <li class="nav-item">
                        <a href="view_rutas.php" class="nav-link">
                            <i class="nav-icon fas fa  fa-road"></i>
                            <p><?php echo strtr ($menu_permiso, "_", " "); ?></p>
                        </a>
                    </li>
                <?php endif; ?>

                <?php $menu_permiso = menu_fun(17); ?>
                <?php if (!empty($_SESSION[$menu_permiso])==1): ?>
                    <li class="nav-item">
                        <a href="view_rutasPuestos.php" class="nav-link">
                            <i class="nav-icon fas fa  fa-th"></i><!-- <i class="fas fa-puzzle-piece"></i> -->
                            <p><?php echo strtr ($menu_permiso, "_", " "); ?></p>
                        </a>
                    </li>
                <?php endif; ?>

                <?php $menu_permiso = menu_fun(19); ?>
                <?php if (!empty($_SESSION[$menu_permiso])==1): ?>
                    <li class="nav-item">
                        <a href="view_tarifa.php" class="nav-link">
                            <i class="nav-icon fas fa-dollar"></i>
                            <p><?php echo strtr ($menu_permiso, "_", " "); ?></p>
                        </a>
                    </li>
                    <?php endif; ?>
                
            </ul>
        </li>
    <?php endif; ?>
<!-- vistas----------------------------------------------------------------------------------------------------------- -->




