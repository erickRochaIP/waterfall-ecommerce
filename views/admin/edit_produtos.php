<form action="index.php" method="post">
      <div class="col-md-6">
        <button type="submit" class="btn btn-outline-primary" style="margin-top: 10px;">Adicionar Produto</button>
      </div>
      <input type="hidden" name="class" value="Produto" />
      <input type="hidden" name="action" value="create_produto" />
    </form>

<table>
    <?php foreach ($_REQUEST['produtos'] as $produto): ?>
        <hr>
        <div class="row">
            
                <div class="col-md-8">
                    <?php echo $produto->get_id_produto() ?>
                    <?php echo $produto->get_nome() ?>
                    <?php echo $produto->get_nome_categoria() ?>
                    <?php echo $produto->get_preco() ?>
                </div>
                
                <div class="col-md-3">
                    <form action="index.php" method="post">
                        <div class="row">
                            <div class="col-md-8">              
                                <!-- <label for="preco" class="col-sm-2 col-form-label">Preço:</label> -->
                                <input type="text" class="form-control" name="preco" placeholder=<?php echo $produto->get_preco() ?>>
                            </div>

                            <div class="col-md-4"> 
                                <button type="submit" class="btn btn-outline-primary" style="margin-top: 10px;">Editar</button>
                                <input type="hidden" name="class" value="produto" />
                                <input type="hidden" name="action" value="edit_produto" />
                                <input type="hidden" name="id_produto" value= <?php echo $produto->get_id_produto() ?> />
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-1">
                    <form action="index.php" method="post">
                        <button type="submit" class="btn btn-outline-danger" style="margin-top: 10px;">Deletar</button>
                        <input type="hidden" name="class" value="Produto"/>
                        <input type="hidden" name="action" value="delete_produto"/>
                    </form>
                </div>
        </div>
    <?php endforeach; ?>
</table>
