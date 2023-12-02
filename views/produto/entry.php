<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
</head>

<body>
    <?php foreach ($_REQUEST['produtos'] as $produto): ?>
        <div class="container">
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div>
                        <label for="login" class="col-sm-2 col-form-label"><strong> Id Produto </strong></label>
                        <?php echo $produto->get_id_produto() ?>
                    </div>
                    <div>
                        <label for="login" class="col-sm-2 col-form-label"><strong>Nome</strong></label>
                        <?php echo $produto->get_nome() ?>
                    </div>
                    <div>
                        <label for="login" class="col-sm-2 col-form-label"><strong>Preço</strong></label>
                        <?php echo $produto->get_preco() ?>
                    </div>
                    <div>
                        <label for="login" class="col-sm-2 col-form-label"> <strong>Categoria</strong></label>
                        <?php echo $produto->get_nome_categoria() ?>
                    </div>

                    <?php if ($produto->possui_informacoes()): ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Título</th>
                                    <th>Corpo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($produto->get_informacoes() as $informacao): ?>
                                    <tr>
                                        <td><?php echo $informacao->get_titulo() ?></td>
                                        <td><?php echo $informacao->get_corpo() ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>

                <div class="col-md-6">
                 <?php $id_imagem =  $produto->get_id_produto();?>
                    <img src="pictures\<?php echo $id_imagem;?>.png" class="img-fluid" alt="Imagem do Produto" style="max-width: 350px;">
                    <form action="index.php" method="post">
                        <input type="number" name="quantidade" min="0" max="10">
                        <button type="submit" class="btn btn-outline-success" style="margin-top: 10px;">Adicionar ao Carrinho</button>
                        <input type="hidden" name="class" value="Pedido"/>
                        <input type="hidden" name="action" value="add"/>
                        <input type="hidden" name="idProduto" value="<?php echo $produto->get_id_produto() ?>" />
                    </form>
                </div>
            </div>

            <div class="accordion accordion-flush" style="max-width: 300px;">
        <div class="accordion-item">
            <?php $id_accordion =  "id".$produto->get_id_produto();?>
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $id_accordion;?>" aria-expanded="false" aria-controls="<?php echo $id_accordion;?>">
                    Descrição
                </button>
            </h2>
            
            <div id="<?php echo $id_accordion;?>" class="accordion-collapse collapse" data-bs-parent=".accordion-flush">
                <div class="accordion-body"> <strong> <?php echo $produto->get_descricao() ?> </strong> </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

</body>
