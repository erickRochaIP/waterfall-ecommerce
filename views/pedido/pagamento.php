<body>
<div align="center" class="centro">
    <form action="index.php" method="post">
    <div class="mb-3">
        <label for="endereco" class="form-label"><strong>Endereço</strong></label>
        <input type="text" class="form-control" name="endereco"  aria-describedby="enderecoHelp" style="width: 300px; min-width: 300px;">
        <div id="emailHelp" class="form-text">Escreva o endereço correto.</div>
    </div>
    <div class="mb-3">
        <label for="pagamento" class="form-label"><strong>Forma de Pagamento</strong></label>
        <div class="mb-3">
             <div class="form-check form-check-inline"  style="margin-top: 10px;">
                <input class="form-check-input" type="radio" name="tipo_pagamento" id="inlineRadio1" value="debito">
                <label class="form-check-label" for="inlineRadio1">DEBITO</label>
            </div>
        </div>
        <div class="mb-3">
            <div class="form-check form-check-inline" style="margin-top: 10px;">
                <input class="form-check-input" type="radio" name="tipo_pagamento" id="inlineRadio2" value="credito"  checked>
                <label class="form-check-label" for="inlineRadio2">CREDITO</label>
            </div>
        </div>
    </div>
    <div class="mb-3">
            <div class="container col-md-2">
                    <select class="form-select" aria-label="Default select example" name = "vezes">
                    <option value="1" selected>CREDITO 1X</option>
                    <option value="2">CREDITO 2X</option>
                    <option value="3">CREDITO 3X</option>
                    <option value="4">CREDITO 4X</option>
                    </select>
                </div>
    </div>
    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Pagar
</button>

<!-- Estrutura do modal -->
<div class="modal" id="exampleModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgb(0, 0, 0);">
        <h5 class="modal-title" style="color: rgb(255, 255, 255);"><strong>Confirmação de Pagamento </strong></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Confirme seu pagamento</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
        <form action="index.php" method="post">
        <button type="submit" class="btn btn-outline-primary">Confirma</button>
        <input type="hidden" name="class" value="Pedido"/> 
        <input type="hidden" name="action" value="add_pagamento"/>
       </form>
      </div>
    </div>
  </div>
</div>
   
    </form>
   
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>