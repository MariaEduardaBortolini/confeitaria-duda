<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulário de Itens</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link href="style.css" rel="stylesheet">


</head>
<body>
  <!-- HEADER -->

  <?php
	    include_once 'header.php';
	?>

    <!-- FORM -->

  <div class="container shadow-sm p-3 mb-5 bg-body rounded cont-item">
    <div class="container">
      <h1 class="h3 mb-3 fw-normal">Fazer login</h1>
      
      <form method="POST" action="../backend/verificador-login.php">
        
        <div class="mb-3">
            <label for="email-usuario" class="form-label">Informe seu email</label>
            <input type="email" class="form-control" name="email" id="email-usuario">
        </div>
        <div class="mb-3">
            <label for="senha-usuario" class="form-label">Informe sua senha</label>
            <input type="password" class="form-control" name="senha" id="senha-usuario">
        </div>
        
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <input class="btn salvar" type="submit" value="Salvar">
          </div>
    </form>

    </div>
  </div>

</body>
</html>