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

<header>
<nav>
    <a class="logo" href="index-restrito-usuario.php"><img src="images/logo/logo.png" class="logo-img"></a>
    <form class="form-inline my-2 my-lg-0" method="POST" action="resultados-pesquisa-restrito-usuario.php">
        <input class="caixa" type="search" placeholder="Search" aria-label="Search" name="pesquisa">
        <button class="btn" type="submit">Search</button>
    </form>
      <ul class="nav">
        
        <a class="at" href="historico-pedidos.php">Histórico</a>

        <a class="at" href="perfilUsuario.php">Perfil</a>
        <a class ="at" href="../logout.php">Sair</a>
      </ul>
      
    </div>
  </nav>
</header>


</header>
<?php
require_once('../Classes/Usuario.php');

// Cria uma instância da classe Organizador
$usuario = new Usuario();

// Recupera o ID do organizador da variável de sessão
$idUsuario = $_SESSION['idUsuario'];

// Busca os dados completos do organizador
$dadosUsuario= $usuario->buscarUsuarioPorId($idUsuario);
?>
<div class = "box">
<h1>Alterar Dados</h1>
<form class= "ecAU" method="post" action="salvarAlteracaoUsuario.php">
        
        <label>Nome:</label>
        <input class="b" required type="text" name="nomeUsuario" required value=<?php echo $dadosUsuario['nomeUsuario']; ?>><br><br>

        <label>Documento:</label>
        <input class="b" required type="number" name="cpfUsuario" required value=<?php echo $dadosUsuario['cpfUsuario']; ?>><br><br>

        <label>Data de Nascimento:</label>
        <input class="b" type="date" required name="dataNasc" required value=<?php echo $dadosUsuario['dataNasc']; ?>><br><br>

        <label>Sexo:</label>
        <select class="b" id="sexo" name="sexoUsuario" required>
        <option value="M">Masculino</option>
        <option value="F">Feminino</option>
        <option value="Outro">Outro</option>
        </select><br><br>
        <label>Celular:</label>
        <input class = "b" required type="number" name="celUsuario" required value=<?php echo $dadosUsuario['celUsuario']; ?>><br><br>

        <label>Email:</label>
        <input class = "b" required type="email" name="emailUsuario" required value=<?php echo $dadosUsuario['emailUsuario']; ?>><br><br>
        <div class = "box">
        <input class = "b" type="hidden" name="idUsuario" value="<?php echo $idUsuario ?>">
        <input class = "btn" type="submit" value="Alterar">
        <a href="index-restrito-usuario.php">Voltar</a>
        </div>
    </form>
    <?php require_once("./footer-restrito.php")?>
</body>
</html>