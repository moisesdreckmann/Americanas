<?php

require_once("functions.php");
session_start();

if(isset($_GET['h'])) {
    $email = $_GET['h'];
    $array = array($email);
    $query = "SELECT * FROM pessoas WHERE md5(email) = ?";
    $selecao = 0;
    $dados = listagem2($query, $array, $selecao);
    $_SESSION['codpessoa'] = $dados['codpessoa'];
    $_SESSION['nome'] = $dados['nome'];
    $_SESSION['email'] = $dados['email'];
    $_SESSION['logado'] = true;

    if($dados) {
        $codpessoa = $dados['codpessoa'];
        $array2 = array($codpessoa);
        $query2 = "UPDATE pessoas SET status = true WHERE codpessoa = ?";
        $dados = crud($query2, $array2);  
        header("location: ../index.php"); 
    }
}

?>




        