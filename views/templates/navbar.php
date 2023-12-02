<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-dark"> 
<a class="navbar-brand" href="#" style="color: rgb(255, 255, 255);">
      <img src="pictures/waterfall.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
     <strong> Waterfall E-commerce </strong>
    </a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

        <!-- Cada link deve ser colocado dentro de um form -->
        <li class="nav-item active">
        <form action="index.php" method="post">
            <!-- Esse atributo "onclick" faz com que o formulario seja enviado ao clicar -->
            <a class="nav-link" href="" onclick="this.closest('form').submit();return false;" style="color: rgb(255, 255, 255);">
            <img src="css/shopping.png" width="30" height="30" class="d-inline-block align-top" alt="Icon logado">          
            <strong> Produtos </strong>
           </a>

            <!-- Sempre identificar a controller e a acao -->
            <input type="hidden" name="class" value="Produto"/> 
            <input type="hidden" name="action" value="get_all_produtos"/>
        </form>
        </li>

        <li class="nav-item active">
        <form action="index.php" method="post">
            <a class="nav-link" href="" onclick="this.closest('form').submit();return false;" style="color: rgb(255, 255, 255);">
            <img src="css/id-card.png" width="30" height="30" class="d-inline-block align-top" alt="Icon logado">
            <strong>About</strong></a>
            <input type="hidden" name="class" value="Usuario"/> 
            <input type="hidden" name="action" value="about"/>
        </form>
        </li>

        <?php if (isset($_SESSION['usuario']) == false): ?>

        <li class="nav-item active">
        <form action="index.php" method="post">
            <a class="nav-link" href="" onclick="this.closest('form').submit();return false;" style="color: rgb(255, 255, 255);">
            <strong>Login </strong>
            <img src="css/permission.png" width="30" height="30" class="d-inline-block align-top" alt="Icon logado">
          </a>

            <input type="hidden" name="class" value="Usuario"/>
            <input type="hidden" name="action" value="open_login"/>
        </form>
        </li>


        <li class="nav-item active">
        <form action="index.php" method="post">
            <a class="nav-link" href="" onclick="this.closest('form').submit();return false;" style="color: rgb(255, 255, 255);">
            <strong>Sign Up </strong>
         </a>

            <input type="hidden" name="class" value="Usuario"/> 
            <input type="hidden" name="action" value="open_sign_up"/>
        </form>
        </li>

        <?php endif; ?>


        <?php if (isset($_SESSION['usuario'])): ?>
        
        <li class="nav-item active">
        <form action="index.php" method="post">
            
            <a class="nav-link" href="" onclick="this.closest('form').submit();return false;" style="color: rgb(255, 255, 255);">
            <img src="css/grocery-cart.png" width="30" height="30" class="d-inline-block align-top" alt="Icon carrinho" >
            <strong>Carrinho </strong>
            </a>

            <input type="hidden" name="class" value="Pedido"/> 
            <input type="hidden" name="action" value="open_carrinho"/>
        </form>
        </li>

        <li class="nav-item active">
        <form action="index.php" method="post">
            <a class="nav-link" href="" onclick="this.closest('form').submit();return false;" style="color: rgb(255, 255, 255);">
            <img src="css/shop.png" width="30" height="30" class="d-inline-block align-top" alt="Icon pedidos">
            <strong>Pedidos </strong>
         </a>

            <input type="hidden" name="class" value="Pedido"/> 
            <input type="hidden" name="action" value="open_pedidos"/>
        </form>
        </li>

        <li class="nav-item active">
        <form action="index.php" method="post">
            <a class="nav-link" href="" onclick="this.closest('form').submit();return false;"style="color: rgb(255, 255, 255);" > 
            <img src="css/man.png" width="30" height="30" class="d-inline-block align-top" alt="Icon perfil">
            <strong>Perfil </strong></a>
           
            <input type="hidden" name="class" value="Usuario"/> 
            <input type="hidden" name="action" value="perfil"/>
        </form>
        </li>

        <li class="nav-item active">
        <form action="index.php" method="post">
            <a class="nav-link" href="" onclick="this.closest('form').submit();return false; "style="color: rgb(255, 255, 255);">
            <img src="css/check-out.png" width="30" height="30" class="d-inline-block align-top" alt="Icon logado">
            <strong>Logout</strong>
         </a>

            <input type="hidden" name="class" value="Usuario"/> 
            <input type="hidden" name="action" value="logout"/>
        </form>
        </li>
        <?php endif; ?>
    </ul>
    </div>
    <?php if (isset($_SESSION['usuario'])): ?>
        <img src="css/permission.png" width="30" height="30" class="d-inline-block align-top" alt="Icon logado">
        <span class="navbar-text" style="color: rgb(255, 255, 255);">
            Usuario logado: 
            <?php echo $_SESSION['usuario'][1] ?>
        </span>

    <?php endif; ?>
</nav>