<?php
// Inclui o arquivo de validação da sessão
require_once('../valida-session.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <title>PÁGINA ALTERAR EVENTO</title>
</head>

<body>


<header>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index-restrito-organizador.php">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index-restrito-organizador.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="formCadastrarEventoOrganizador.php">Eventos <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../logout.php">Sair <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>


</header>

<?php
 
require_once("../Classes/Evento.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["idEvento"])) {
    $idEvento = $_GET["idEvento"];

    // Buscar os dados do cliente no banco de dados usando o ID
    $evento = new Evento();
    $evento->setIdEvento($idEvento);

    // Obter os dados do cliente a partir do ID
    $dadosEvento = $evento->buscarPorId();

    // Verificar se o cliente foi encontrado
    if ($dadosEvento) {
        // Preencher os campos do formulário com os dados do cliente
        $descEvento = $dadosEvento["descEvento"];
        $tipoEvento = $dadosEvento["tipoEvento"];
        $idadeMinima = $dadosEvento["idadeMinima"];
        $precoCamarote = $dadosEvento["precoCamarote"];
        $precoPista = $dadosEvento["precoPista"];
        $localEvento = $dadosEvento["localEvento"];
        $dataEvento = $dadosEvento["dataEvento"];
        $horaEvento = $dadosEvento["horaEvento"];
        $horaAbertura = $dadosEvento["horaAberturaEvento"];
    } else {
        
     
        exit();
    }
}

?>

<h1>Alterar Evento</h1>

<form method="post" action="salvarAlteracaoEvento.php"  enctype="multipart/form-data">
        
        <label>Descrição Evento:</label>
        <input required type="text" name="descEvento" required value="<?php echo $descEvento ?? ''; ?>"><br><br>

        <label>Tipo de Evento:</label>
        <input required type="text" name="tipoEvento" required value="<?php echo $tipoEvento ?? ''; ?>"><br><br>

        <label>Foto do Evento:</label>
        <input type="file" required name="fotoEvento" required><br><br>

        <label>Idade Miníma:</label>
        <input required type="number" name="idadeMinima" value="<?php echo $idadeMinima ?? ''; ?>"><br><br>

        <label>Preço Camarote:</label>
        <input required type="number" name="precoCamarote" value="<?php echo $precoCamarote ?? ''; ?>"><br><br>

        <label>Preço Pista:</label>
        <input required type="number" name="precoPista" required value="<?php echo $precoPista ?? ''; ?>"><br><br>

        <label>Local do Evento:</label>
        <input required type="text" name="localEvento" required value="<?php echo $localEvento ?? ''; ?>"><br><br>

        <label>Data do Evento:</label>
        <input required type="date" name="dataEvento" required value="<?php echo $dataEvento ?? ''; ?>"><br><br>

        <label>Hora do Evento:</label>
        <input required type="time" name="horaEvento" required value="<?php echo $horaEvento ?? ''; ?>"><br><br>

        <label>Hora de Abertura do Evento:</label>
        <input required type="time" name="horaAberturaEvento" required value="<?php echo $horaAbertura ?? ''; ?>"><br><br>

        <input type="hidden" name="idEvento" value="<?php echo $idEvento ?? ''; ?>">
        <input type="submit" value="Alterar">
        <a href="formCadastrarEventoOrganizador.php">Voltar</a>
    </form>
    <?php require_once("./footer-restrito.php")?>
</body>
</html>