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
      include '../backend/Cadastro.class.php';

      session_start();
      if (!$_SESSION['user_id']) return header("location: http://localhost/confeitaria-duda/frontend/form-user-login.php");
      
      $cadastro = new Cadastro();
      $usuarioLogado = $cadastro->get_cadastro_by_id($_SESSION['user_id']);
      if (!$usuarioLogado['admin']) return header("location: http://localhost/confeitaria-duda/frontend/form-user-login.php");
	?>

    <!-- FORM -->

  <div class="container shadow-sm p-3 mb-5 bg-body rounded cont-item">
    <div class="container">
      <h1 class="h3 mb-3 fw-normal">Cadastrar produto</h1>
      
      <form method="POST" action="../backend/salvar-item.php">
        
        <div class="input-group mb-3">
          <input type="text" class="form-control nome-produto" name="nome" placeholder="Nome do produto" aria-label="Username">
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1 item_descr">Descrição do produto</label>
            <textarea class="form-control" name="descr" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

        <br/>
        <div class="input-group mb-3 item_descr">
          <span class="input-group-text">$</span>
          <input type="number" class="form-control" name="prec">
          <span class="input-group-text">.00</span>
        </div>

        <div class="form-group item_cate">
          <label for="categoria">Categoria do produto</label>
          <select class="form-control" name="cate" id="exampleFormControlSelect1">
            <option value="doces">Doces</option>
            <option value="salgados">Salgados</option>
            <option value="tortas">Tortas</option>
          </select>
          
          <div class="item_foto">
            <label for="inputGroupFile02">Link para a foto do produto</label>
            <input type="text" class="form-control" name="foto" id="inputGroupFile02">
          </div>
          
          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <input class="btn salvar" type="submit" value="Salvar">
          </div>
        </div>

      </form>
    </div>
  </div>

</body>
</html>