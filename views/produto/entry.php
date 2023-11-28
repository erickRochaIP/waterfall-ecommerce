<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        
    </style>
<body>

</body>
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
        
        <form action="index.php" method="post">
            <input type="number" name="quantidade" min="0" max="10">
            <button> adicionar ao carrinho </button>
            
            
            <input type="hidden" name="class" value="Pedido"/> 
            <input type="hidden" name ="action" value="add"/>
            <input type="hidden" name="idProduto" value= <?php echo $produto->get_idproduto() ?> />
            </form>
    
    </div>
    <?php endforeach; ?>
</table>