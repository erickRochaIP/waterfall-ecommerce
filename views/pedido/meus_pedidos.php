<form class="row g-3" action="index.php" method="post">
<div class="row g-3">
    <label for="login" class="col-sm-2 col-form-label">Compras maiores que: </label>
    <label class="visually-hidden" for="login">valor</label>
    <input type="text" class="form-control" name="filtro" placeholder="Filtro">
  </div>


  <div class="col-md-6">
    <button type="submit" class="btn btn-outline-primary" style="margin-top: 10px;">Filtrar</button>
  </div>
    <input type="hidden" name="class" value="Pedido"/> 
    <input type="hidden" name="action" value="open_pedidos"/>

</form>

<table>
    <?php foreach ($_REQUEST['pedidos'] as $pedido): ?>
    <div>
    <hr>
        <div class="row">
            <div class="col-md-2">
                ID pedido: <?php echo $pedido->get_id() ?>
            </div>
        </div>
        
        <?php foreach ($pedido->get_pagamentos() as $pagamento): ?>
            <div class="row">
                <div class="col-md-1">
                    <?php echo $pagamento->get_tipo() ?>
                </div>
                <div class="col-md-1">
                    <?php echo $pagamento->get_total() ?>
                </div>
                <div class="col-md-2">
                    <?php echo $pagamento->get_endereco() ?>
                </div>
            </div>
        <?php endforeach; ?>
        </table>
    
    </div>
    <?php endforeach; ?>
</table>