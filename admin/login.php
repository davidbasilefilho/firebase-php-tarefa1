<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>Acesso ao sistema</title>

    <!-- Principal CSS do Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Estilos customizados para esse template -->
    <link href="../css/signin.css" rel="stylesheet">

</head>

<body class="text-center">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <form class="form-signin" method="post">
                    <img class="mb-4" src="" alt="" width="72" height="72">

                    <h1 class="h3 mb-3 font-weight-normal">Faça login</h1>

                    <label for="inputEmail" class="sr-only">Endereço de email</label>
                    <input type="email" id="inputEmail" class="form-control" placeholder="Seu email" required autofocus name="txtemail">

                    <label for="inputPassword" class="sr-only">Senha</label>
                    <input type="password" id="inputPassword" class="form-control" placeholder="Senha" required name="txtsenha">

                    <input type="submit" class="btn btn-lg btn-primary btn-block" name="btnlogar" value="Login" />
                    <p class="mt-5 mb-3 text-muted">&copy; 2023</p>
                </form>
            </div>
        </div>


        <?php
        if (filter_input(INPUT_POST, 'btnlogar')) {
            $email = filter_input(INPUT_POST, 'txtemail');
            $senha = filter_input(INPUT_POST, 'txtsenha');

            include_once '../controles/Usuario.php';
            $user = new Usuario();
            //enviados os dados para os atributos da classe
            $user->setEmail($email);
            $user->setSenha($senha);

            if ($user->consultar() > 0) {
                session_start();
                $_SESSION['acesso'] = 'b8d66a4634503dcf530ce1b3704ca5dfae3d34bb';

                header("location:index.php");
            } else {
                $_SESSION['acesso'] = '';
                echo '<div class="row">'
                    . '<div class="col-sm-12 col-md-12">'
                    . '<div class="alert alert-danger" role="alert">'
                    . 'Usuário e/ou senha incorretos!'
                    . '</div>'
                    . '</div>'
                    . '</div>'
                    . '</div>';
            }
        }
        ?>

</body>

</html>