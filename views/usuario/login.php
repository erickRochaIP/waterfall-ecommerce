<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
        
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #48D1CC;
        }

        .centro {
            width: 200px; /* ou o tamanho desejado */
            height: 200px; /* ou o tamanho desejado */
            background-color: #F0F8FF;
        }
        .imagem-no-canto {
            position: absolute;
            bottom: 250;
            right: 590;
            width: 50px; /* ou o tamanho desejado */
            height: 50px; /* ou o tamanho desejado */
        }
    </style>
</head>
<div align="center" class="centro">
    <img src="pictures/waterfall.png" alt="Icon waterfall" class="imagem-no-canto">
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