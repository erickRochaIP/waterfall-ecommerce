<table>
    <?php foreach ($_REQUEST['pagamentos'] as $pagamento): ?>
        <hr>
        <div class="row">
            
                <div class="col-md-8">
                    <?php echo $pagamento->get_codigo() ?>
                    <?php echo $pagamento->get_endereco() ?>
                    <?php echo $pagamento->get_id_pedido() ?>
                    <?php echo $pagamento->get_tipo() ?>
                    <?php echo $pagamento->get_total() ?>
                </div>
                
                <div class="col-md-3">
                    <form action="index.php" method="post">
                        <div class="row">
                            <div class="col-md-8">              
                                <!-- <label for="preco" class="col-sm-2 col-form-label">Preço:</label> -->
                                <input type="text" class="form-control" name="endereco" placeholder="<?php echo $pagamento->get_endereco() ?>">
                            </div>

                            <div class="col-md-4"> 
                                <button type="submit" class="btn btn-outline-primary" style="margin-top: 10px;">Editar</button>
                                <input type="hidden" name="class" value="Pedido"/> 
                                <input type="hidden" name="action" value="edit_pagamento" />
                                <input type="hidden" name="codigo" value= "<?php echo $pagamento->get_codigo() ?>" />
                                </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-1">
                    <form action="index.php" method="post">
                        <button type="submit" class="btn btn-outline-danger" style="margin-top: 10px;">Deletar</button>
                        <input type="hidden" name="class" value="Pedido"/>
                        <input type="hidden" name="action" value="delete_pagamento"/>
                        <input type="hidden" name="codigo" value= "<?php echo $pagamento->get_codigo() ?>" />
                    </form>
                </div>
        </div>
    <?php endforeach; ?>
</table>