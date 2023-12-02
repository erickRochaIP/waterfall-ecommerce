<form action="index.php" method="post">
        <div class="row">
            <div class="col-md-1">
                <input type="text" class="form-control" name="id_produto" placeholder="ID">
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" name="titulo" placeholder="Titulo">
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="corpo" placeholder="Corpo">
            </div>
           
            <div class="col-md-2">
                <button type="submit" class="btn btn-outline-primary" style="margin-top: 10px;">Adicionar Informação</button>
            </div>
        </div>
        
        <input type="hidden" name="class" value="Produto" />
        <input type="hidden" name="action" value="create_informacao" />
    </form>

<table>
    <div class="row">
        <div class="col-md-1">
            ID produto
        </div>
        <div class="col-md-3">
            Titulo
        </div>
        <div class="col-md-6">
            Corpo
        </div>
        <div class="col-md-2"></div>
    </div>
    <?php foreach ($_REQUEST['informacoes'] as $informacao): ?>
        <hr>
        <div class="row">

            <div class="col-md-1">
                <?php echo $informacao->get_id_produto() ?>
            </div>
            <div class="col-md-3">
                <?php echo $informacao->get_titulo() ?>
            </div>
            <div class="col-md-4">
                <?php echo $informacao->get_corpo() ?>
            </div>
                
            <div class="col-md-3">
                <form action="index.php" method="post">
                    <div class="row">
                        <div class="col-md-8">              
                            <!-- <label for="preco" class="col-sm-2 col-form-label">Preço:</label> -->
                            <input type="text" class="form-control" name="corpo" placeholder="<?php echo $informacao->get_corpo() ?>">
                        </div>

                        <div class="col-md-4"> 
                            <button type="submit" class="btn btn-outline-primary" style="margin-top: 10px;">Editar</button>
                            <input type="hidden" name="class" value="Produto"/> 
                            <input type="hidden" name="action" value="edit_informacao" />
                            <input type="hidden" name="id_produto" value= "<?php echo $informacao->get_id_produto() ?>" />
                            <input type="hidden" name="titulo" value= "<?php echo $informacao->get_titulo() ?>" />
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-1">
                <form action="index.php" method="post">
                    <button type="submit" class="btn btn-outline-danger" style="margin-top: 10px;">Deletar</button>
                    <input type="hidden" name="class" value="Produto"/>
                    <input type="hidden" name="action" value="delete_informacao"/>
                    <input type="hidden" name="id_produto" value= "<?php echo $informacao->get_id_produto() ?>" />
                    <input type="hidden" name="titulo" value= "<?php echo $informacao->get_titulo() ?>"/>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
</table>
