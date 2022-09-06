<?php
    include '../backend/Item.class.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cardápio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
</head>

<body>

    <!-- HEADER -->
    <?php
	    include_once 'header.php';
	?>

    <!-- MENU DE OPÇOES -->
    <div class="container menu">
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0 menu2">
            <li><a href=<?php echo "".explode("?",$_SERVER['REQUEST_URI'])[0].""; ?> class="nav-link link-dark btn doce">Todos</a></li>
            <li><a href=<?php echo "".explode("?",$_SERVER['REQUEST_URI'])[0]."?doces"; ?> class="nav-link link-dark btn doce">Doce</a></li>
            <li><a href=<?php echo "".explode("?",$_SERVER['REQUEST_URI'])[0]."?salgados"; ?> class="nav-link link-dark btn salgado">Salgado</a></li>
            <li><a href=<?php echo "".explode("?",$_SERVER['REQUEST_URI'])[0]."?tortas"; ?> class="nav-link link-dark btn torta">Torta</a></li>
        </ul>
    </div>

    <!-- CARDAPIO -->
    <section class="ftco-section">
        <div class="container shadow p-3 mb-5 bg-body rounded cont-item">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-4">
                    <h2 class="heading-section">Produtos</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h3 class="h5 mb-4 text-center">Conheça nossos produtos e faça seu pedido aqui.</h3>
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
                                    $explodedUrl = explode("?",$_SERVER['REQUEST_URI']);
                                    $filter = null;
                                    if (count($explodedUrl) > 1) $filter = $explodedUrl[1];
                                    $item = new Item();
                                    $itens = $item->list($filter);
                                    foreach($itens as $item) {
                                ?>
                                <form method="POST" action="../backend/adicionar-item.php"'>

                                    <tr>
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
                                                <input type="number" name="quantidade"
                                                class="quantidade form-control input-number" value="1" min="1"
                                                max="100">
                                            </div>
                                        </td>
                                        <td>
                                            <input type="hidden" name="item_id" value='<?php echo $item['id']; ?>'>
                                            <input type="hidden" name="cadastro_id" value='1'>
                                            <input class="btn salvar-cardapio" type="submit" value="Salvar" name="salvar">
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
</body>

</html>