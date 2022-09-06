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
      <h1 class="h3 mb-3 fw-normal">Fale conosco</h1>
      
      <form method="POST" action="../backend/enviar-email.php">
        
        <div class="mb-3">
            <label for="nome-mensagem" class="form-label">Informe seu nome</label>
            <input type="text" class="form-control nome-mensagem" name="nome" aria-label="Username">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input type="email" class="form-control email-mensagem" name="email" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Mensagem</label>
            <textarea class="form-control conteudo-mensagem" name="mensagem" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
          
          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <input class="btn salvar" type="submit" value="enviar" name="enviar">
          </div>
        </div>

      </form>
    </div>
  </div>

</body>
</html>