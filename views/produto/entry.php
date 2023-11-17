<table>
    <?php foreach ($_REQUEST['produtos'] as $produto): ?>
    <div>
    <hr>
        <?php echo $produto->get_idproduto() ?>
        <?php echo $produto->get_nome() ?>
        <?php echo $produto->get_descricao() ?>
        <?php echo $produto->get_nome_categoria() ?>
        <?php echo $produto->get_preco() ?>
        <button> adicionar no carrinho </button>
    
    </div>
    <?php endforeach; ?>
</table>