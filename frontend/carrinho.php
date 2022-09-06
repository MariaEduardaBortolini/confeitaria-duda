<?php
include '../backend/Carrinho.class.php';
include '../backend/Item.class.php';
include '../backend/Cadastro.class.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carrinho</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link href="style.css" rel="stylesheet">
</head>

<body>

  <!-- HEADER -->

  <?php
  include_once 'header.php';
  ?>

  <!-- CARRINHO -->

  <section class="ftco-section">
    <div class="container shadow p-3 mb-5 bg-body rounded cont-item">
      <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-4">
          <h2 class="heading-section">Meu carrinho</h2>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="table-wrap">
            <table class="table">
              <thead class="thead-primary">
                <tr>
                  <th>&nbsp;</th>
                  <th>Produto</th>
                  <th>Preço</th>
                  <th>Quantidade</th>
                  <th>&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $carrinho = new Carrinho();
                $itens_carrinho = $carrinho->list();
                foreach ($itens_carrinho as $item_carrinho) {
                  $item = new Item();
                  $item = $item->get_by_id($item_carrinho['item_id'])[0];
                ?>
                  <form method="POST" action="../backend/atualizar-carrinho.php">
                    <tr role="alert">
                      <td>
                        <img class="img" src='<?php echo $item['foto']; ?>' width=150 height=150>
                      </td>
                      <td>
                        <div class="produto">
                          <p>
                            <?php echo $item['nome']; ?>
                          </p>
                          <p>
                            <?php echo $item['descr']; ?>
                          </p>
                        </div>
                      </td>
                      <td>
                        <div class="preco">
                          <?php echo $item['prec']; ?>
                        </div>
                      </td>
                      <td class="quantidade">
                        <div class="input-group">
                          <input type="hidden" name="id" value='<?php echo $item_carrinho['id']; ?>'>
                          <input type="number" name="quantidade" class="quantidade form-control input-number" value='<?php echo $item_carrinho['quantidade']; ?>' min="1" max="100">
                        </div>
                      </td>
                      <td>
                        <input class="btn delete-item" type="submit" value="Deletar Item" name="delete">
                        <input class="btn salvar-cardapio" type="submit" value="Atualizar Carrinho" name="update">
                      </td>
                    </tr>
                  </form>
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ENVIAR PEDIDO -->

  <form method="POST" action="../backend/enviar-pedido.php">
    <div class="container total" style="background: -moz-linear-gradient(top, rgb(255, 247, 248), rgb(255, 239, 242));">

      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="nome">Nome</label>
          <input type="text" class="form-control" name="nome" id="nome">
          <div class="invalid-feedback">
            É obrigatório inserir um nome válido.
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <label for="sobrenome">Sobrenome</label>
          <input type="text" class="form-control"  name="sobrenome" id="sobrenome">
          <div class="invalid-feedback">
            É obrigatório inserir um sobre nome válido.
          </div>
        </div>
      </div>

      <div class="mb-3">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" placeholder="name@exemple.com" name="email">
        <div class="invalid-feedback">
          Por favor, insira um endereço de e-mail válido, para atualizações de entrega.
        </div>
      </div>

      <div class="mb-3">
        <label for="endereco">Endereço</label>
        <input type="text" class="form-control" id="endereco" placeholder="Rua das Orquideas, nº 859" name="endereco">
        <div class="invalid-feedback">
          Por favor, insira seu endereço de entrega.
        </div>
      </div>

      <h4 class="mb-3">Pagamento somente na entrega</h4>
      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0 total-ul">
        <li>
          <p class="total-text">
          </p>
        </li>
        <li>
          <input type="hidden" name="itens" value='<?php echo $carrinho->list(); ?>'>
          <input type="submit" class="btn total-botao" value="Enviar pedido" name="enviar">
        </li>
      </ul>
    </div>
  </form>
  <br />
  <br />
</body>

</html>