<?php

function conecta () {
    try {
        $conexao = new PDO("mysql: host=localhost; dbname=loja; charset = UTF-8", "root", '');
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexao;
    } catch(PDOException $e) {
        echo 'OPS! Algo deu Errado com a conexão'.$e->getMessage();
    }
}

function crud($query, $array) {
    try {
        $conexao = conecta();
        $sql = $conexao->prepare($query);
        $result = $sql->execute($array);
        return $result;
    } catch (PDOException $e) {
        echo "Ops! Algo deu errado.".$e->getMessage();
    }
}

function listagem($query, $selecao) {
    try {
        $conexao = conecta();
        $sql = $conexao->prepare($query);
        $sql->execute();
        if($selecao == 0) {
            $result = $sql->fetch();
            return $result;
        } else {
            $result = $sql->fetchAll();
            return $result;
        }
    } catch (PDOException $e) {
        echo "Ops! Algo deu errado.".$e->getMessage();
    }
}

function listagem2($query, $array, $selecao) {
    try {
        $conexao = conecta();
        $sql = $conexao->prepare($query);
        $sql->execute($array);
        if($selecao == 0) {
            $result = $sql->fetch();
            return $result;
        } else {
            $result = $sql->fetchAll();
            return $result;
        }
    } catch (PDOException $e) {
        echo "Ops! Algo deu errado.".$e->getMessage();
    }
}

function finalizarCompra($array) {
    try {
            $conexao = conecta();
            $query = $conexao->prepare("INSERT INTO notafiscal (codpessoa, codproduto, total, quantidade) VALUES (:codpessoa, :codproduto, :total, :quantidade)");
            $query->bindValue(":codpessoa", $array[0]);
            $query->bindValue(":codproduto", $array[1]);
            $query->bindValue(":total", $array[2]);
            $query->bindValue(":quantidade", $array[3]);
            $result = $query->execute();
            $linhasAfetadas = $query->rowCount();
            if($linhasAfetadas > 0) {
                return $result;
            } else {
                echo "error. Não foi possivel executar a compra";
            }

    } catch(PDOException $e) {
        echo "Ops! Algo deu errado.".$e->getMessage();
    }
}

?>