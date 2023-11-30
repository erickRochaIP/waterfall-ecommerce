<div align="center" class="centro">
        <form action="index.php" method="post">
    
            <p align="center">
            <label for="endereco">Endereço:</label>
            <input type="text" name="endereco">
            </p>
            
            <p align="center">
                <label>Forma de Pagamento: </label>
            </p>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tipo_pagamento" id="inlineRadio1" value="debito">
                <label class="form-check-label" for="inlineRadio1">DEBITO</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tipo_pagamento" id="inlineRadio2" value="credito"  checked>
                <label class="form-check-label" for="inlineRadio2">CREDITO</label>
            </div>
            <div align="center" class="container col-md-2">
                    <select class="form-select" aria-label="Default select example" name = "vezes">
                    <option value="1" selected>CREDITO 1X</option>
                    <option value="2">CREDITO 2X</option>
                    <option value="3">CREDITO 3X</option>
                    <option value="4">CREDITO 4X</option>
                    </select>
                
            </div>
            <p align="center">
            <button> Confirmar </button>
             </p>
    
    
     
        <input type="hidden" name="class" value="Pedido"/> 
        <input type="hidden" name="action" value="add_pagamento"/>
    
    </form>

</div>