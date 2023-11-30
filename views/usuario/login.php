<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" type="text/css" href="css/stylelogin.css"> -->
</head>
<style>
    
</style>
     <body>  
    <div align="center" class="centro">
        <form action="index.php" method="post" >

             
            <!-- <p align="center"> -->
            <div class="row mb-3">
            <label for="login" class="col-sm-2 col-form-label">Login</label>
            <div class="col-sm-3">
                   <label class="visually-hidden" for="login">Usuário</label>
                   <input type="text" class="form-control" name="login" placeholder="Usuário">
             </div> 
             </div> 
             <div class="row mb-3">
                   <label for="password" class="col-sm-2 col-form-label">Senha</label>
                    <div class="col-sm-3">
                   <label class="visually-hidden" for="password">Senha</label>
                   <input type="text" class="form-control" name="senha" placeholder="Senha"> 
                   </div>
             </div> 
            <!-- <label for="login">Usuário:</label> -->
            <!-- <input type="text" name="login"> -->
            <!-- </div> -->
            <!-- </p> -->
            <!-- <p align="center"> -->
            <!-- <div class="mb-3"> -->
            <!-- <label for="password">Senha:</label> -->
            <!-- <input type="password" name="senha"> -->
            <!-- </p> -->
            </div>

            
            
            <div class="row mb-3">
                 <button class="btn btn-primary"> login </button>
            </div>
           
             
    
     
        <input type="hidden" name="class" value="Usuario"/> 
        <input type="hidden" name="action" value="authenticate"/>
    
    </form>

    <form action="index.php" method="post">
     <!-- <p align="center"> -->
            <div class="row mb-3">
            <button class="btn btn-primary"> sign up </button>
            </div>
            <input type="hidden" name="class" value="Usuario"/> 
            <input type="hidden" name="action" value="open_sign_up"/>
        <!-- </p> -->
    </form>
</div>
    </body>
</html>