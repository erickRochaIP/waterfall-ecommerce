<div align="center" class="centro">
        <form action="index.php" method="post">
    
            <p align="center">
            <label for="endereco">Endereço:</label>
            <input type="text" name="endereco">
            </p>
            <p align="center">
            <label for="cep">CEP:</label>
            <input type="text" name="cep">
            </p>
            <p align="center">
            <label for="cidade">Cidade:</label>
            <input type="text" name="cidade">
            </p>
            <p align="center">
            <label for="rua">Rua:</label>
            <input type="text" name="rua">
            </p>
            <p align="center">
            <label for="numero">Número:</label>
            <input type="text" name="numero">
            </p>
            <p align="center">
            <label for="complemento">Complemento:</label>
            <input type="text" name="complemento">
            </p>
            
            <p align="center">
                <label>Forma de Pagamento: </label>
            </p>
            <p align="center">
                <input type="radio" id="credito" name="TipoPagamento" value="credito">
                <label for="credito">CREDITO</label><br>
                <input type="radio" id="debito" name="TipoPagamento" value="debito">
                <label for="debito">DEBITO</label>
            </p>
            <p align="center">
            <button> Confirmar </button>
             </p>
    
    
     
        <input type="hidden" name="class" value="Pedido"/> 
        <input type="hidden" name="action" value="add_pagamento"/>
    
    </form>

</div>