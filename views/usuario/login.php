<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" type="text/css" href="css/stylelogin.css"> -->
</head>



<form class="row g-3" action="index.php" method="post">
  <div align="center" class="centro">

    <div class="col-md-3">
      <label for="login" class="col-sm-2 col-form-label">Login</label>
      <label class="visually-hidden" for="login">Usuário</label>
      <input type="text" class="form-control" name="login" placeholder="Usuário">
    </div>
    <div class="col-md-3">
      <label for="password" class="col-sm-2 col-form-label">Senha</label>
      <label class="visually-hidden" for="password">Senha</label>
      <input type="password" class="form-control" name="senha" placeholder="Senha">
    </div>
    <form action="index.php" method="post">
      <div class="col-md-6">
        <button type="submit" class="btn btn-outline-primary" style="margin-top: 10px;">login</button>
      </div>
      <input type="hidden" name="class" value="Usuario" />
      <input type="hidden" name="action" value="authenticate" />
    </form>

    <form action="index.php" method="post">
      <div class="col-md-6">
        <button type="submit" class="btn btn-outline-primary" style="margin-top: 10px;">sign Up</button>
      </div>
      <input type="hidden" name="class" value="Usuario" />
      <input type="hidden" name="action" value="open_sign_up" />
    </form>
  </div>
</form>