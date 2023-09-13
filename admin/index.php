<?php
//trava de login
date_default_timezone_set('America/Sao_Paulo');
(!isset($_SESSION) ? session_start() : "");

if ($_SESSION['acesso'] != 'b8d66a4634503dcf530ce1b3704ca5dfae3d34bb') {
    header('location:logout.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include_once 'cabecalho.php'; ?>
</head>

<body>
    <?php include_once 'navbar.php'; ?>
    <div class="container p-4">
        <!-- $pagina = filter_input(INPUT_GET, 'p'); -->

        <!-- if (isset($pagina) && !empty($pagina)) { -->
        <!-- include_once $pagina . '.php'; -->
        <!-- } else { -->
        <!-- include_once 'home.php'; -->
        <!-- } -->

        <?php
        $routes = [
            '/2dsams/admin/' => 'home',
            '/2dsams/admin/login' => 'login',
            '/2dsams/admin/logout' => 'logout',
            '/2dsams/admin/categoria/consultar' => 'categoria/consultar',
            '/2dsams/admin/categoria/salvar' => 'categoria/salvar',
            '/2dsams/admin/funcionario/consultar' => 'funcionario/consultar',
            '/2dsams/admin/funcionario/salvar' => 'funcionario/salvar',
        ];

        $url = $_SERVER['REQUEST_URI'];

        foreach ($routes as $route => $controller) {
            if (preg_match("~^$route$~", $url, $matches)) {
                include_once($controller . '.php');
                // You can access matched parameters in $matches array
                break; // Exit the loop when a match is found
            }
        }
        ?>
    </div>
    <?php include_once 'plugins.php'; ?>
</body>

</html>