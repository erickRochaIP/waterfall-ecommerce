<table>
    <div class="row">
        <div class="col-md-6">
            Produto
        </div>
        <div class="col-md-2">
            Quantidade
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-2"></div>
    </div>
    <?php foreach ($_REQUEST['itens_pedido'] as $item_pedido): ?>
    <div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <?php echo $item_pedido->get_produto()->get_nome()?>
            </div>
            <div class="col-md-2">
                <?php echo $item_pedido->get_quantidade() ?>
            </div>
            
            <div class="col-md-3">
                <form action="index.php" method="post">
                    <div class="row">
                        <div class="col-md-8">              
                            <input type="number" name="quantidade" min="0" max="10">
                        </div>

                        <div class="col-md-4"> 
                            <button type="submit" class="btn btn-outline-primary" style="margin-top: 10px;">Editar</button>
                            <input type="hidden" name="class" value="Pedido"/> 
                            <input type="hidden" name="action" value="edit_item_pedido" />
                            <input type="hidden" name="id_pedido" value= "<?php echo $item_pedido->get_id_pedido() ?>" />
                            <input type="hidden" name="id_produto" value= "<?php echo $item_pedido->get_produto()->get_id_produto() ?>" />
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-1">
                <form action="index.php" method="post">
                    <button type="submit" class="btn btn-outline-danger" style="margin-top: 10px;">Deletar</button>
                    <input type="hidden" name="class" value="Pedido"/>
                    <input type="hidden" name="action" value="delete_item_pedido"/>
                    <input type="hidden" name="id_pedido" value= "<?php echo $item_pedido->get_id_pedido() ?>" />
                    <input type="hidden" name="id_produto" value= "<?php echo $item_pedido->get_produto()->get_id_produto() ?>" />
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

    <form action="index.php" method="post">
        <button> comprar </button>

        <input type="hidden" name="class" value="Pedido"/> 
        <input type="hidden" name ="action" value="new_compra"/>
    </form>

    <form action="index.php" method="post">
        <button> excluir carrinho </button>

        <input type="hidden" name="class" value="Pedido"/> 
        <input type="hidden" name ="action" value="exclude_carrinho"/>
    </form>
</table>