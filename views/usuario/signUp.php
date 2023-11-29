<div>
    <form action="index.php" method="post">
    <p align="center">
        <label for="login">Usuário:</label>
        <input type="text" name="login">
    </p>
    
    <p align="center">
        <label for="login">Nome:</label>
        <input type="text" name="nome">
    </p>
    

    <p align="center">
        <label for="password">Senha:</label>
        <input type="password" name="senha">
    </p>

    <p align="center">
        <label for="password">Senha:</label>
        <input type="password" name="senha_confirma">
    </p>
    
    <p align="center">
        <button> sign up </button>
    </p>

    <input type="hidden" name="class" value="Usuario"/> 
    <input type="hidden" name="action" value="authenticate_sign_up"/>
    
    </form>
</div>