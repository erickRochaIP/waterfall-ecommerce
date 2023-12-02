<body>
<div class="row" align="center">

    <form action="index.php" method="post"> 
        
        <label for="name"  style="margin-top: 10px; width: 300px; min-width: 300px;"><strong>Escreva o nome do usuário: </strong></label>
        
        <input type="text" class="form-control" name="nome" placeholder="Nome" style="margin-top: 10px; width: 300px; min-width: 300px;" aria-describedby="perfilHelp">
        <div id="perfilHelp" class="form-text">Esse será o novo nome do usuário.</div>
        
        <button type="submit" class="btn btn-outline-primary" style="margin-top: 10px;">Confimar</button>

        <input type="hidden" name="class" value="Usuario"/> 
        <input type="hidden" name="action" value="update_name"/>
    </form>
    
    <form action="index.php" method="post"> 
      
      
      <label class="form-control"style="margin-top: 50px; width: 300px; min-width: 300px;"><strong>Para deleter o usuário: </strong></label>
      
      
      <button type="button" class="btn btn-outline-danger" style="margin-top: 20px;width: 100px; min-width: 100px;"data-bs-toggle="modal" data-bs-target="#exampleModal">Deletar</button>

       
<!-- Estrutura do modal -->
<div class="modal" id="exampleModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgb(0, 0, 0);">
        <h5 class="modal-title" style="color: rgb(255, 255, 255);"><strong>Deleção de Usuário</strong></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Tem certeza de que gostaria de deletar o Usuário? </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Não</button>
        <form action="index.php" method="post">
        <button type="submit" class="btn btn-outline-primary">Sim</button>
        <input type="hidden" name="class" value="Usuario"/> 
        <input type="hidden" name="action" value="delete_user"/>
       </form>
      </div>
    </div>
  </div>
</div>
      
       
    </form>
   
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>