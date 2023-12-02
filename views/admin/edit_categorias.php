<form action="index.php" method="post">
    <div class="row">
        <div class="col-md-10">
            <input type="text" class="form-control" name="categoria" placeholder="Categoria">
        </div>
        
        <div class="col-md-2">
            <button type="submit" class="btn btn-outline-primary" style="margin-top: 10px;">Adicionar Categoria</button>
        </div>
    </div>
        
    <input type="hidden" name="class" value="Categoria" />
    <input type="hidden" name="action" value="create_categoria" />
</form>

<table>
    <div class="row">
        <div class="col-md-6">
            Categoria
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-2"></div>
        <div class="col-md-2"></div>
    </div>
    <?php foreach ($_REQUEST['categorias'] as $categoria): ?>
    <div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <?php echo $categoria ?>
            </div>
            <div class="col-md-5">
                <form action="index.php" method="post">
                    <div class="row">
                        <div class="col-md-10">              
                            <!-- <label for="preco" class="col-sm-2 col-form-label">Preço:</label> -->
                            <input type="text" class="form-control" name="categoria" placeholder="<?php echo $categoria ?>">
                        </div>

                        <div class="col-md-2"> 
                            <button type="submit" class="btn btn-outline-primary" style="margin-top: 10px;">Editar</button>
                            <input type="hidden" name="class" value="Categoria"/> 
                            <input type="hidden" name="action" value="edit_categoria" />
                            <input type="hidden" name="old_categoria" value= "<?php echo $categoria?>" />
                            </div>
                    </div>
                </form>
            </div>
            <div class="col-md-1">
                <form action="index.php" method="post">
                    <button type="submit" class="btn btn-outline-danger" style="margin-top: 10px;">Deletar</button>
                    <input type="hidden" name="class" value="Categoria"/>
                    <input type="hidden" name="action" value="delete_categoria"/>
                    <input type="hidden" name="categoria" value= "<?php echo $categoria ?>" />
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</table>

