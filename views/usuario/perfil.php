<div class="col-md-3">
  
    <form action="index.php" method="post"> 
        <label for="name" class="col-sm-2 col-form-label">Mudar o nome: </label>
        <input type="text" class="form-control" name="nome" placeholder="Usuário">

        <button type="submit" class="btn btn-outline-primary" style="margin-top: 10px;">confima</button>

        <input type="hidden" name="class" value="Usuario"/> 
        <input type="hidden" name="action" value="update_name"/>
    </form>

    <form action="index.php" method="post"> 
        <button type="submit" class="btn btn-outline-danger" style="margin-top: 10px;">Deletar</button>

        <input type="hidden" name="class" value="Usuario"/> 
        <input type="hidden" name="action" value="delete_user"/>
    </form>
</div>