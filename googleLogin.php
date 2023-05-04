<?php
session_start();
require_once("includes/functions.php");

if (isset($_GET['userData'])) {
    // Decodifica o objeto JSON recebido e converte para array
    $userData = json_decode(urldecode($_GET['userData']), true);

    // Verifica se existem dados válidos do Google
    if ($userData && isset($userData['sub']) && $userData['email_verified'] == true) {
        $nome = $userData['name'];
        $email = $userData['email'];
        $senha = '';
        $status = true;
        $array = array($email);
        $selecao = 0;
        $query = "SELECT * FROM pessoas WHERE email = ?";
        $result = listagem2($query, $array, $selecao);

        if ($result) {
            $_SESSION['logado'] = true;
            $_SESSION['nome'] = $nome;
            $_SESSION['email'] = $email;
            $_SESSION['codpessoa'] = $result['codpessoa'];
            $response = true;
            header("Location: index.php");
            exit();
        } else {
            $array = array($nome, $email, $senha, $status);
            $query2 = "INSERT INTO pessoas (nome, email, senha, status) VALUES (?, ?, ?, ?)";
            $result2 = crud($query2, $array);
            if ($result2) {
                $_SESSION['logado'] = true;
                $_SESSION['nome'] = $nome;
                $_SESSION['email'] = $email;
                $response = true;
                header("Location: index.php");
                exit();
            } else {
                $response = false;
                echo "Erro ao cadastrar no banco de dados.";
            }
        }
    }
    // Adicione este cabeçalho para indicar que a resposta é um JSON
    header('Content-Type: application/json'); 
    echo json_encode($response); 
}
?>
