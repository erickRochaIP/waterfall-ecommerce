<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styleindex.css">
</head>
<style>
    
</style>

<body>
        <h1>Waterfall e-commerce</h1>
        <nav class="navbar">
        <ul>
            <img src="pictures/waterfall.png" alt="Icon waterfall" class="imagem-no-canto">
            <li><a href="">Home</a></li>

            <!-- Cada link deve ser colocado dentro de um form -->
            <li>
            <form action="index.php" method="post">
                <!-- Esse atributo "onclick" faz com que o formulario seja enviado ao clicar -->
                <a href="" onclick="this.closest('form').submit();return false;">Products</a>

                <!-- Sempre identificar a controller e a acao -->
                <input type="hidden" name="class" value="Produto"/> 
                <input type="hidden" name="action" value="get_all_produtos"/>
            </form>
            </li>

            <li><a href="">Categories</a></li>

            <li>
            <form action="index.php" method="post">
                <a href="" onclick="this.closest('form').submit();return false;">Login </a>

                <input type="hidden" name="class" value="Usuario"/>
                <input type="hidden" name="action" value="openLogin"/>
            </form>
            </li>

            <li>
            <form action="index.php" method="post">
                <a href="" onclick="this.closest('form').submit();return false;">Sign Up </a>

                <input type="hidden" name="class" value="Usuario"/> 
                <input type="hidden" name="action" value="openSignUp"/>
            </form>
            </li>

            <li><a href="">About</a></li>
            
        </ul>
    </nav>
</body>
</html>
<?php 
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