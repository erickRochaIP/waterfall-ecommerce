<table>
    <?php foreach ($_REQUEST['pedidos'] as $pedido): ?>
    <div>
        <hr>
            <?php echo $pedido->getIdpedido() ?>
            <?php echo $pedido->getProduto()->get_idProduto() ?>
            <?php echo $pedido->getQuantidade() ?>
            <?php echo $pedido->getProduto()->get_nome()?>
        
    </div>
    <?php endforeach; ?>

    <form action="index.php" method="post">
        <button> comprar </button>

        <input type="hidden" name="class" value="Pedido"/> 
        <input type="hidden" name ="action" value="newCompra"/>
    </form>
</table>