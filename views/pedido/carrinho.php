<table>
    <?php foreach ($_REQUEST['itens_pedido'] as $item_pedido): ?>
    <div>
        <hr>
            <?php echo $item_pedido->get_id_pedido() ?>
            <?php echo $item_pedido->get_produto()->get_id_produto() ?>
            <?php echo $item_pedido->get_quantidade() ?>
            <?php echo $item_pedido->get_produto()->get_nome()?>
        
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