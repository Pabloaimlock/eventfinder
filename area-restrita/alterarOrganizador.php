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
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap"
        rel="stylesheet">
    <title>PÁGINA ALTERAR DADOS</title>
</head>

<body>


<header>
<nav>
    <a class="logo" href="index-restrito-organizador.php">EventFinder</a>
    <form class="form-inline my-2 my-lg-0" method="POST" action="resultados-pesquisa-organizador.php">
        <input class="caixa" type="search" placeholder="Search" aria-label="Search" name="pesquisa">
        <button class="btn" type="submit">Search</button>
    </form>
      <ul class="nav">
        <a class ="at" href="formCadastrarEventoOrganizador.php">Eventos</a>
        <a class ="at" href="../logout.php">Sair</a>
      </ul>
      
    </div>
  </nav>
</header>


</header>
<?php
require_once('../Classes/Organizador.php');

// Cria uma instância da classe Organizador
$organizador = new Organizador();

// Recupera o ID do organizador da variável de sessão
$idOrganizador = $_SESSION['idOrganizador'];

// Busca os dados completos do organizador
$dadosOrganizador = $organizador->buscarOrganizadorPorId($idOrganizador);
?>
<div class = "box">
<h1>Alterar Dados</h1>

<form class="ecAU" method="post" action="salvarAlteracaoOrganizador.php">
        
        <label>Nome:</label>
        <input class="b" required type="text" name="nomeOrganizador" required value=<?php echo $dadosOrganizador['nomeOrganizador']; ?>><br><br>

        <label>Documento:</label>
        <input class="b" required type="number" name="docOrganizador" required value=<?php echo $dadosOrganizador['docOrganizador']; ?>><br><br>

        <label>Data de Nascimento:</label>
        <input class="b" type="date" required name="dataNasc" required value=<?php echo $dadosOrganizador['dataNasc']; ?>><br><br>

        <label>Sexo:</label>
        <select class="b id="sexo" name="sexoOrganizador" required>
        <option value="M">Masculino</option>
        <option value="F">Feminino</option>
        <option value="Outro">Outro</option>
        </select><br><br>
        <label>Celular:</label>
        <input class="b required type="number" name="celOrganizador" required value=<?php echo $dadosOrganizador['celOrganizador']; ?>><br><br>

        <label>Email:</label>
        <input class="b" required type="email" name="emailOrganizador" required value=<?php echo $dadosOrganizador['emailOrganizador']; ?>><br><br>
        <input class="b" type="hidden" name="idOrganizador" value="<?php echo $idOrganizador ?>">
        
        <div class= "box">
        <input class="btn" type="submit" value="Alterar">
        <a href="index-restrito-organizador.php">Voltar</a>
        </div>
    </form>
    <?php require_once("./footer-restrito.php")?>
</body>
</html>