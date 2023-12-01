<form class="row g-3" action="index.php" method="post">
<div class="row g-3">
    <label for="login" class="col-sm-2 col-form-label">compras maiores que: </label>
    <label class="visually-hidden" for="login">valor</label>
    <input type="text" class="form-control" name="filtro" placeholder="Filtro">
  </div>


  <div class="col-md-6">
    <button type="submit" class="btn btn-outline-primary" style="margin-top: 10px;">select</button>
  </div>
    <input type="hidden" name="class" value="Pedido"/> 
    <input type="hidden" name="action" value="open_pedidos"/>

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