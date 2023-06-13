<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="area-restrita/css/Style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <title>PÁGINA INICIAL</title>
    <script src="area-restrita/js/validar-forms-organizador.js"></script>
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
        </nav>
    </header>
    
    <div class="box">
    <form method="POST" class="escolha" action="./area-restrita/cadastroOrganizador.php" onsubmit="return validarFormularioOrganizador();">
    <table width="600px" border="0" align="center">
        <h2>Cadastro de Organizador</h2>
        <label for="nome">Nome:</label>
        <input class="b" type="text" id="nome" name="nome" required placeholder="Digite seu nome ou nome fantasia"><br><br>
        
        <label for="documento">Documento:</label>
        <input class="b" type="text" id="documento" name="documento" required placeholder="Digite seu CPF ou CNPJ"><br>
        <span id="documentoError" class="error-message"></span><br>
        
        <label for="dataNascimento">Data de Nascimento:</label>
        <input class="b" type="date" id="dataNascimento" name="dataNascimento" placeholder="YYYY-MM-DD"><br>
        <span id="dataNascimentoError" class="error-message"></span><br>
        
        <label for="sexo">Sexo :</label>
        <select class="b" id="sexo" name="sexo">
            <option value="Outro"></option>
            <option value="M">Masculino</option>
            <option value="F">Feminino</option>
            <option value="Outro">Outro</option>
        </select><br><br>
        
        <label for="celular">Celular:</label>
        <input class="b" type="text" id="celular" name="celular" required placeholder="(99) 99999-9999"><br>
        <span id="celularError" class="error-message"></span><br>
        
        <label for="email">Email:</label>
        <input class="b" type="email" id="email" name="email" required placeholder="exemplo@dominio.com"><br>
        <span id="emailError" class="error-message"></span><br>
        
        <label for="senha">Senha:</label>
        <input class="b" type="password" id="senha" name="senha" required placeholder="Digite sua senha"><br>
        <span id="senhaError" class="error-message"></span><br>
         
        <input class="b" type="submit" value="Cadastrar">
    </table>
</form>
    </div>
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
