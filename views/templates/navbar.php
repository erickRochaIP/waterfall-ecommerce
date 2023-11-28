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
            <a class="nav-link" href="" onclick="this.closest('form').submit();return false;">Products</a>

            <!-- Sempre identificar a controller e a acao -->
            <input type="hidden" name="class" value="Produto"/> 
            <input type="hidden" name="action" value="get_all_produtos"/>
        </form>
        </li>


        <li class="nav-item active">
            <a class="nav-link" href="">Categories</a>
        </li>

        <?php if (isset($_SESSION['usuario']) == false): ?>

        <li class="nav-item active">
        <form action="index.php" method="post">
            <a class="nav-link" href="" onclick="this.closest('form').submit();return false;">Login </a>

            <input type="hidden" name="class" value="Usuario"/>
            <input type="hidden" name="action" value="openLogin"/>
        </form>
        </li>


        <li class="nav-item active">
        <form action="index.php" method="post">
            <a class="nav-link" href="" onclick="this.closest('form').submit();return false;">Sign Up </a>

            <input type="hidden" name="class" value="Usuario"/> 
            <input type="hidden" name="action" value="openSignUp"/>
        </form>
        </li>

        <?php endif; ?>

        <li class="nav-item active">
            <a class="nav-link" href="">About</a>
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
        
        <li class="nav-item active">
        <form action="index.php" method="post">
            <a class="nav-link" href="" onclick="this.closest('form').submit();return false;">Carrinho </a>

            <input type="hidden" name="class" value="Pedido"/> 
            <input type="hidden" name="action" value="open_carrinho"/>
        </form>
        </li>

    </ul>
    <?php if (isset($_SESSION['usuario'])): ?>

        <span class="navbar-text">
            Usuario logado: 
            <?php echo $_SESSION['usuario'][1] ?>
        </span>

    <?php endif; ?>

    
  </div>
</nav>