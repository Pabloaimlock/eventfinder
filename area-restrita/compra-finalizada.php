<?php

require_once("../Classes/Evento.php");
require_once("../Classes/Ingresso.php");
require_once('../valida-session.php');


// Verifique se o ID do evento foi enviado via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idEvento'])) {
    $idEvento = $_POST['idEvento'];
    $quantidade_camarote = $_POST['quantidade-camarote'];
    $quantidade_pista = $_POST['quantidade-pista'];
    $valorCamarote = $_POST['valorCamarote'] ;
    $valorPista = $_POST['valorPista'];
    $resultado = $valorCamarote + $valorPista;
    $idUsuario = $_SESSION['idUsuario'];
       // Cadastrar o ingresso 
       $ingresso = new Ingresso();
       $ingresso->setIdEvento($idEvento);
       $ingresso->setQuantidadeCamarote($quantidade_camarote);
       $ingresso->setQuantidadePista($quantidade_pista);
       $ingresso->setValorCamarote($valorCamarote);
       $ingresso->setValorPista($valorPista);
       $ingresso->setValorTotal($resultado);
       $ingresso->setDataCompra(date("Y-m-d"));
       $ingresso->setIdUsuario($idUsuario); // Define o ID do usuário

       $ingresso->cadastrarIngresso($ingresso);
     
    $evento = new Evento();
    $evento->setIdEvento($idEvento);
    $dadosEvento = $evento->buscarPorId();

    // Exibir informações do ingresso
    
   
    $dadosIngresso = $ingresso->buscarIngressoPorIdUsuario($idUsuario);


// ...

$dadosIngresso = $ingresso->buscarIngressoEvento($idUsuario, $idEvento);

if ($dadosIngresso) {
    ?>
    <h2>Compra Finalizada</h2>
    <h3>Detalhes do Ingresso</h3>
    <p><strong>Data da Compra:</strong> <?php echo $dadosIngresso['dataCompra']; ?></p>
    <p><strong>Quantidade de Ingressos - Camarote:</strong> <?php echo $dadosIngresso['quantidadeCamarote']; ?></p>
    <p><strong>Quantidade de Ingressos - Pista:</strong> <?php echo $dadosIngresso['quantidadePista']; ?></p>
    <p><strong>Valor Total:</strong> <?php echo $dadosIngresso['valorTotal']; ?></p>

    <p>Seu pedido foi finalizado com sucesso, vamos enviar um email pra você com a chave pix para pagamento,<br> e assim que o pagamento for confirmado, o prazo para o ingresso ser gerado é 3 dias úteis!</p>
    <?php
} else {
    echo "<p>Não foi possível encontrar os detalhes do ingresso.</p>";
}

// ...

} else {
    echo "<p>O ID do evento não foi enviado corretamente.</p>";
}
?>
