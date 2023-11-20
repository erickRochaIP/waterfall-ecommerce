<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" type="text/css" href="css/styleindex.css"> -->
</head>
<style>
    body {
        padding-top: 75px;
    }
    @media (max-width: 979px) {
    body {
        padding-top: 0px;
    }
}
</style>

<body>

<?php 
session_start();

if(isset($_POST['class']) && isset($_POST['action'])){
    $class = $_POST['class'].'Controller';
    $action = $_POST['action'];

    require_once __DIR__ .'/controllers/'.$class.'.php';

    $controller = new $class();
    $controller->$action($_POST);
} else   {
    require_once __DIR__.'/views/usuario/login.php';
}

?>

<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-primary">
    <a class="navbar-brand" href="">
        <img src="pictures/waterfall.png" width="30" height="30" class="d-inline-block align-top" alt="Icon waterfall">
            Waterfall e-commerce
    </a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

        <!-- Cada link deve ser colocado dentro de um form -->
        <li class="nav-item active">
        <form action="index.php" method="post">
            <!-- Esse atributo "onclick" faz com que o formulario seja enviado ao clicar -->
            <a class="nav-link" href="" onclick="this.closest('form').submit();return false;">Products</a>

            <!-- Sempre identificar a controller e a acao -->
            <input type="hidden" name="class" value="Produto"/> 
            <input type="hidden" name="action" value="get_all_produtos"/>
        </form>
        </li>


        <li class="nav-item active">
            <a class="nav-link" href="">Categories</a>
        </li>

        <?php if (isset($_SESSION['usuario']) == false): ?>

        <li class="nav-item active">
        <form action="index.php" method="post">
            <a class="nav-link" href="" onclick="this.closest('form').submit();return false;">Login </a>

            <input type="hidden" name="class" value="Usuario"/>
            <input type="hidden" name="action" value="openLogin"/>
        </form>
        </li>


        <li class="nav-item active">
        <form action="index.php" method="post">
            <a class="nav-link" href="" onclick="this.closest('form').submit();return false;">Sign Up </a>

            <input type="hidden" name="class" value="Usuario"/> 
            <input type="hidden" name="action" value="openSignUp"/>
        </form>
        </li>

        <?php endif; ?>

        <li class="nav-item active">
            <a class="nav-link" href="">About</a>
        </li>


        <?php if (isset($_SESSION['usuario'])): ?>

        <li class="nav-item active">
        <form action="index.php" method="post">
            <a class="nav-link" href="" onclick="this.closest('form').submit();return false;">Logout</a>

            <input type="hidden" name="class" value="Session"/> 
            <input type="hidden" name="action" value="logout"/>
        </form>
        </li>

        <?php endif; ?>

    </ul>
    <?php if (isset($_SESSION['usuario'])): ?>

        <span class="navbar-text">
            Usuario logado: 
            <?php echo $_SESSION['usuario'][1] ?>
        </span>

    <?php endif; ?>
  </div>
</nav>

</body>
</html>