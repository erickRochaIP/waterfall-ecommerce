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
        }

        .centro {
            width: 200px; /* ou o tamanho desejado */
            height: 200px; /* ou o tamanho desejado */
            background-color: #ccc;
        }
    </style>
</head>
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