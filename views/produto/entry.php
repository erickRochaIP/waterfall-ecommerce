<table>
    <?php foreach ($_REQUEST['produtos'] as $produto): ?>
    <div>
    <hr>
        <?php echo $produto->get_idproduto() ?>
        <?php echo $produto->get_nome() ?>
        <?php echo $produto->get_descricao() ?>
        <?php echo $produto->get_nome_categoria() ?>
        <?php echo $produto->get_preco() ?>
        <?php if ($produto->possui_informacoes()): ?>
            <table>
            <?php foreach ($produto->get_informacoes() as $informacao): ?>
                <tr>
                    <td><?php echo $informacao->get_titulo() ?></td>
                    <td><?php echo $informacao->get_corpo() ?></td>
                </tr>
            <?php endforeach; ?>
            </table>
        <?php endif; ?>
        <button> adicionar no carrinho </button>
    
    </div>
    <?php endforeach; ?>
</table>