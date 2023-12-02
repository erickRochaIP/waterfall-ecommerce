<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-primary">
    <a class="navbar-brand" href="">
        <img src="pictures/waterfall.png" width="30" height="30" class="d-inline-block align-top" alt="Icon waterfall">
            Waterfall e-commerce
    </a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

        <!-- Cada link deve ser colocado dentro de um form -->
        <li class="nav-item active">
        <form action="index.php" method="post">
            <!-- Esse atributo "onclick" faz com que o formulario seja enviado ao clicar -->
            <a class="nav-link" href="" onclick="this.closest('form').submit();return false;">Ver Produtos</a>

            <!-- Sempre identificar a controller e a acao -->
            <input type="hidden" name="class" value="Produto"/> 
            <input type="hidden" name="action" value="get_all_produtos"/>
        </form>
        </li>     
        
        <li class="nav-item active">
        <form action="index.php" method="post">
            <a class="nav-link" href="" onclick="this.closest('form').submit();return false;">Informação</a>

            <input type="hidden" name="class" value="Produto"/> 
            <input type="hidden" name="action" value="get_all_informacoes_admin"/>
        </form>
        </li>

        <li class="nav-item active">
        <form action="index.php" method="post">
            <a class="nav-link" href="" onclick="this.closest('form').submit();return false;">Categoria</a>

            <input type="hidden" name="class" value="Categoria"/> 
            <input type="hidden" name="action" value="get_all_categorias"/>
        </form>
        </li>

        <li class="nav-item active">
        <form action="index.php" method="post">
            <a class="nav-link" href="" onclick="this.closest('form').submit();return false;">Pagamento</a>

            <input type="hidden" name="class" value="Pedido"/> 
            <input type="hidden" name="action" value="get_all_pagamentos_admin"/>
        </form>
        </li>

        <li class="nav-item active">
        <form action="index.php" method="post">
            <a class="nav-link" href="" onclick="this.closest('form').submit();return false;">Produto</a>

            <input type="hidden" name="class" value="Produto"/> 
            <input type="hidden" name="action" value="get_all_produtos_admin"/>
        </form>
        </li>

        <?php if (isset($_SESSION['usuario'])): ?>

        <li class="nav-item active">
        <form action="index.php" method="post">
            <a class="nav-link" href="" onclick="this.closest('form').submit();return false;">Logout</a>

            <input type="hidden" name="class" value="Usuario"/> 
            <input type="hidden" name="action" value="logout"/>
        </form>
        </li>

        <?php endif; ?> 

    </ul>
    </div>
    <?php if (isset($_SESSION['usuario'])): ?>

        <span class="navbar-text">
            Usuario logado: 
            <?php echo $_SESSION['usuario'][1] ?>
        </span>

    <?php endif; ?>
</nav>