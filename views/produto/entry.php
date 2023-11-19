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
        

        <select>
            <option value="Select">0</option>
            <option value="Select">1</option>
            <option value="Select">2</option>
            <option value="Select">3</option>
            <option value="Select">4</option>
            <option value="Select">5</option>
            <option value="Select">6</option>
            <option value="Select">7</option>
            <option value="Select">8</option>
            <option value="Select">9</option>
            <option value="Select">10</option>
        </select>
        
        <button> adicionar ao carrinho </button>
    
    </div>
    <?php endforeach; ?>
</table>