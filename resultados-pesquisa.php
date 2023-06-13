<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="area-restrita/css/Style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <title>PÁGINA INICIAL</title>
</head>

<body>
<header>
<nav>
    <a class="logo" href="index.php"><img src="area-restrita/images/logo/logo.png" class="logo-img"></a>
    <form class="form-inline my-2 my-lg-0" method="POST" action="resultados-pesquisa.php">
    <input class="caixa" type="search" placeholder="Search" aria-label="Search" name="pesquisa">
    <button class="btn" type="submit">Search</button>
    </form>
    <ul class="nav">
        <a class ="at" href="escolhaCadastro.php">Cadastre-se</a>
        <a class ="at" href="formLogin.php">Login</a>
    </ul>
    </div>
    </nav>
</header>


<?php
require_once("Classes/Evento.php");
if (isset($_POST['pesquisa'])) {
    $termoPesquisa = $_POST['pesquisa'];
    $evento = new Evento();
    $resultados = $evento->pesquisarEventos($termoPesquisa);
?>
<?php foreach ($resultados as $resultado) { ?>
    <div class="container">
        <div class="card" style="width: 18rem;">
            <img src="area-restrita/<?php echo $resultado['fotoEvento'] ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo $resultado['descEvento'] ?></h5>
                <p class="card-text">Tipo: <?php echo $resultado['tipoEvento'] ?></p>
                <p class="card-text">Local: <?php echo $resultado['localEvento'] ?></p>
                <form method="" action="formLogin.php">
                    <input type="hidden" name="idEvento" value="<?php echo $resultado['idEvento']; ?>">
                    <button type="submit" class="btn btn-primary">Clique para mais informações</button>
                </form>
            </div>
        </div>
    </div>
<?php } ?>
<?php } ?>
<?php require_once("footer.php")?>
<!--libras-->
<div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
      <div class="vw-plugin-top-wrapper"></div>
    </div>
  </div>
  <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
  <script>
    new window.VLibras.Widget('https://vlibras.gov.br/app');
  </script>
  
  <!--end libras-->
</body>
</html>
