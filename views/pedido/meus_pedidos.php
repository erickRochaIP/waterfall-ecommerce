<form>
<div class="col-md-3">
    <label for="login" class="col-sm-2 col-form-label">compras menores que: </label>
    <label class="visually-hidden" for="login">valor</label>
    <input type="text" class="form-control" name="filtro" placeholder="Usuário">
  </div>
</form>

<table>
    <?php foreach ($_REQUEST['pedidos'] as $pedido): ?>
    <div>
    <hr>
        <?php echo $pedido->get_id() ?>
        <?php echo $pedido->get_status() ?>
        
        <table>
        <?php foreach ($pedido->get_pagamentos() as $pagamento): ?>
            <tr>
                <td><?php echo $pagamento->get_codigo() ?></td>
                <td><?php echo $pagamento->get_endereco() ?></td>
                <td><?php echo $pagamento->get_tipo() ?></td>
                <td><?php echo $pagamento->get_total() ?></td>
            </tr>
        <?php endforeach; ?>
        </table>
    
    </div>
    <?php endforeach; ?>
</table>