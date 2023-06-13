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

    <link rel="stylesheet" href="css/Style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <title>PÁGINA INICIAL RESTRITA ORGANIZADOR</title>
    <script>
      // Função para exibir o modal de confirmação
      function exibirModalExclusao(form) {
        // Mostra o modal de confirmação
        if (confirm("Tem certeza que deseja excluir o evento?")) {
          // Se o usuário confirmar, envia o formulário para excluir o evento
          form.submit();
        }
      }
    </script>
    
  </head>

  <body>
    <div id="wrapper">
    <header>
      <nav>
        <a class="logo" href="index-restrito-organizador.php"><img src="images/logo/logo.png" class="logo-img"></a>
        <form class="form-inline my-2 my-lg-0" method="POST" action="../resultados-pesquisa.php">
          <input class="caixa" type="search" placeholder="Search" aria-label="Search" name="pesquisa">
          <button class="btn" type="submit">Search</button>
        </form>
        <ul class="nav">
          <a class="at" href="formCadastrarEventoOrganizador.php">Eventos</a>
          <a class="at" href="perfilOrganizador.php">Perfil</a>
          <a class="at" href="../logout.php">Sair</a>
        </ul>

        </div>
      </nav>
    </header> 

    <div class="box">
      <h2>Cadastro de Evento</h2>
      <form class="FormF" method="post" action="cadastroEventoOrganizador.php" enctype="multipart/form-data" >

        <label>Descrição Evento:</label>
        <input required class="b" type="text" name="descEvento" required><br><br>

        <label>Tipo de Evento:</label>
        <input required class="b" type="text" name="tipoEvento" required><br><br>

        <label>Foto do Evento:</label>
        <input type="file" required name="fotoEvento" required><br><br>

        <label>Idade Miníma:</label>
        <input type="number" required class="b" name="idadeMinima" required><br><br>

        <label>Preço Camarote:</label>
        <input required type="number" class="b" name="precoCamarote"><br><br>

        <label>Preço Pista:</label>
        <input required type="number" class="b" name="precoPista" required><br><br>

        <label>Local do Evento:</label>
        <input required type="text" class="b" name="localEvento" required><br><br>

        <label>Data do Evento:</label>
        <input required type="date" class="b" name="dataEvento" required><br><br>

        <label>Hora do Evento:</label>
        <input required type="time" class="b" name="horaEvento" required><br><br>

        <label>Hora de Abertura do Evento:</label>
        <input required type="time" class="b" name="horaAberturaEvento" required><br><br>
        <?php  $idOrganizador = $_SESSION['idOrganizador']; ?>
        <input type="hidden" name="idOrganizador" value="<?php echo $idOrganizador; ?>">
        
        <input type="submit" class="b" value="Cadastrar">
      </form>
      <tbody>
      <?php
      require_once("../Classes/Evento.php");
      $evento = new Evento();
      $evento->setIdOrganizador($idOrganizador); // Defina o ID do organizador
      $listaEvento = $evento->listar();
      ?>


          <div class ="tudo">
    <div class="all">
        <?php foreach ($listaEvento as $evento) { ?>
            <div class="container">
                <div class="card" style="width: 18rem;">
                    <img src="<?php echo $evento['fotoEvento'] ?>" class="card" alt="...">
                    <div class="cardB">
                      <h5 class="title"><?php echo $evento['descEvento'] ?></h5>
                      <p class="data">Tipo: <?php echo $evento['tipoEvento'] ?></p>
                      <p class="data">Idade Miníma: <?php echo $evento['idadeMinima'] ?></p>
                      <p class="data">Camarote: <?php echo $evento['precoCamarote'] ?></p>
                      <p class="data">Pista: <?php echo $evento['precoPista'] ?></p>
                      <p class="card-text">Local: <?php echo $evento['localEvento'] ?></p>
                        <p class="data">Data: <?php echo $evento['dataEvento'] ?></p>
                        <form method="POST" action="excluirEventoOrganizador.php" onsubmit="exibirModalExclusao(this); return false;">
                  <input type="hidden" name="idEvento" value="<?php echo $evento['idEvento']; ?>">
                      <button type="submit" class="btn">Excluir</button>
                          </form>
                  <form method="GET" action="alterarEventoOrganizador.php">
                    <input type="hidden" name="idEvento" value="<?php echo $evento['idEvento']; ?>">
                    <button type="submit" class="btn">Alterar </button>
                  </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?php require_once("./footer-restrito.php")?>
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

