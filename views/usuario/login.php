<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css">
</head>
<style>
    
</style>
     <body>
        <h1>Waterfall e-commerce</h1>
        <nav class="navbar">
        <ul>
            <img src="pictures/waterfall.png" alt="Icon waterfall" class="imagem-no-canto">
            <li><a href="">Home</a></li>
            <li><a href="">Products</a></li>
            <li><a href="">Categories</a></li>
            <li><a href="">About</a></li>
            
        </ul>
    </nav>
        
        
<div align="center" class="centro">
    <form action="index.php" method="post">
    
        <p align="center">
            <label for="login">Usuário:</label>
            <input type="text" name="login">
        </p>
        <p align="center">
            <label for="password">Senha:</label>
            <input type="password" name="senha">
        </p>
        
        <p align="center">
            <button> login </button>
        </p>
    
    
     
        <input type="hidden" name="class" value="Usuario"/> 
        <input type="hidden" name="action" value="authenticate"/>
    
    </form>

    <form action="index.php" method="post">
     <p align="center">
            <button> sign up </button>

            <input type="hidden" name="class" value="Usuario"/> 
            <input type="hidden" name="action" value="openSignUp"/>
        </p>
    </form>
</div>
    </body>
</html>