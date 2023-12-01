
<div class="conteiner-text-center">
    <form class="row g-3 justify-content-center" action="index.php" method="post">
    <div class="row" style="margin-top: 10px;">
        <div class="col-md-3">
        <label for="login">Usuário:</label>
        <input type="text" class="form-control" name="login">
        </div>
    </div>
    
    <div class="row" style="margin-top: 10px;">
      <div class="col-md-3">
        <label for="login">Nome:</label>
        <input type="text" class="form-control" name="nome">
      </div>
    </div>
    

    <div class="row" style="margin-top: 10px;">
      <div class="col-md-3">
        <label for="password">Senha:</label>
        <input type="password" class="form-control" name="senha">
      </div>
    </div>


    <div class="row" style="margin-top: 10px;">
      <div class="col-md-3">
        <label for="password">Senha:</label>
        <input type="password" class="form-control" name="senha_confirma" aria-describedby="passwordHelpBlock">
        <div class="col-auto">
         <span id="passwordHelpInline" class="form-text">
             Deve conter 4-20 caracteres.
         </span>
        </div>
      </div>
    </div>
    
    <div class="row" style="margin-top: 10px;">
      <div class="col-md-3">
        <button type="submit" class="btn btn-outline-primary" style="margin-top: 10px;"> sign up </button>
      </div>
    </div>

    <input type="hidden" name="class" value="Usuario"/> 
    <input type="hidden" name="action" value="authenticate_sign_up"/>
    
    </form>
</div>