<?php

require_once("functions.php");
require_once("enviaEmail.php");
session_start();

if(isset($_POST['btnCadastraCat'])) {
    $nome = $_POST['cadastraCat'];
    $array = array($nome);
    $query = "INSERT INTO categoria (nome) VALUES (?)";
    crud($query, $array);
    header("location: ../cadastros.php");
}

if(isset($_POST['btnAlterarCat'])) {
    $codcategoria = $_POST['codeCat'];
    $nome = $_POST['alteraCat'];
    $array = array($nome, $codcategoria);
    $query = "UPDATE categoria SET nome = (?) WHERE codcategoria = (?)";
    crud($query, $array);
    header("location: ../cadastros.php");
}

if(isset($_POST['btnDeletarCat'])) {
    $codcategoria = $_POST['codeCat'];
    $array = array($codcategoria);
    $query = "DELETE FROM categoria WHERE codcategoria = (?)";
    crud($query, $array);
    header("location: ../cadastros.php");
}

if(isset($_POST['btnCadastraProd'])) {
    $nome = $_POST['nomeprod'];
    $descricao = $_POST['descprod'];
    $codcategoria = $_POST['selectprod'];

    $preco = $_POST['precoprod'];
    $novoPreco = str_replace(".","", $preco); //remove o ponto
    $novoPreco2 = str_replace(",",".", $novoPreco); //substitui virgula por ponto
    $precoFinal = (float)$novoPreco2; //converte valor para float

    require_once('valida_imagem.php');
    $imagem = $novoNomeArquivo;

    $array = array($nome, $descricao, $imagem, $precoFinal, $codcategoria);
    $query = "INSERT INTO produto (nome,descricao,nm_image, preco, codcategoria) VALUES (?, ?, ?, ?, ?)";
    crud($query, $array);
    header("location: ../cadastros.php");
}

if(isset($_POST['btnAlteraProd'])) {
    $codproduto = $_POST['alteracodprod'];
    $nome = $_POST['alteranmprod'];
    $descricao = $_POST['alteradescprod'];
    $codcategoria = $_POST['alteraselectprod'];
    $preco = $_POST['alterapreco'];

    $novoPreco = str_replace(".","",$preco);
    $novoPreco2 = str_replace(",",".", $novoPreco);
    $precoFinal = (float)$novoPreco2;

    $array = array($nome, $descricao, $codcategoria, $precoFinal, $codproduto);
    $query = "UPDATE produto SET nome = ?, descricao = ?, codcategoria = ?, preco = ? WHERE codproduto = ?";

    require_once('valida_imagem.php'); 
    if(!empty($novoNomeArquivo)) {
        $imagem = $novoNomeArquivo;
        $array2 = array($imagem, $codproduto);
        $query2 = "UPDATE produto SET nm_image = ? WHERE codproduto = ?";
        crud($query2, $array2);
    }
    
    crud($query, $array);  
    header("location: ../cadastros.php");
}

if(isset($_POST['btnDeletaProd'])) {
    $codproduto = $_POST['alteracodprod'];
    $array = array($codproduto);
    $query = "DELETE FROM produto WHERE codproduto = ?";
    crud($query, $array);
    header("location: ../cadastros.php");
}

if(isset($_POST['cadastraLog'])) {
    if(!empty($_POST['nomeLog']) and !empty($_POST['emailLog']) and !empty($_POST['passLog']) and $_POST['passLog'] === $_POST['passLog2']) {
        $nome = $_POST['nomeLog'];
        $email =$_POST['emailLog'];
        $pass = $_POST['passLog'];
        $senha = password_hash($pass, PASSWORD_DEFAULT);
        $arrayValida = array($email);
        $queryValida = "SELECT * FROM pessoas WHERE email = ?";
        $selecao = 0;
        $resultValida = listagem2($queryValida, $arrayValida, $selecao);
        if($resultValida) {
            $_SESSION['msg'] = 'Este e-mail já esta cadastrado';
        } else {
            $array = array($nome, $email, $senha);
            $query = "INSERT INTO pessoas (nome, email, senha) VALUES (?, ?, ?)";
            $valida = crud($query, $array);

            if($valida) {
                $hash = md5($email);
                $link = 'http://localhost/PROJETOFINAL/includes/validaEmail.php?h='.$hash;
                $assunto = 'Confirme seu Cadastro';
                $mensagem = 'Clique no link para confirmar seu cadastro '.$link;
                $array2 = array($email, $mensagem, $assunto);
                $result = enviaEmail($array2);
            } else {
                $_SESSION['msg'] = 'Ops. Ocorreu um problema. Tente novamente mais tarde';
            }
        }
    }

    if (isset($_SESSION['msg'])) {
        $response = array("message" => $_SESSION['msg']);
        echo json_encode($response);
        unset($_SESSION['msg']);
    } else {
        $response = array("message" => "");
        echo json_encode($response);
    }
}

if(isset($_POST['logar'])) {
    $email = $_POST['emailLogin'];
    $senha = $_POST['passLogin'];
    $array = array($email);
    $query = "SELECT * FROM pessoas WHERE email = ? AND status = true";
    $selecao = 0;
    $pessoa = listagem2($query, $array, $selecao);

    if($pessoa) {
        if(password_verify($senha, $pessoa['senha'])) {
            $_SESSION['codpessoa'] = $pessoa['codpessoa'];
            $_SESSION['nome'] = $pessoa['nome'];
            $_SESSION['email'] = $pessoa['email'];
            $_SESSION['senha'] = $pessoa['senha'];
            $_SESSION['logado'] = true;

            if($pessoa['codpessoa'] == 1) {
                header("location: ../cadastros.php");
            } else {
                header("location: ../index.php");
            }

        } else {
            $_SESSION['msg'] = 'senha incorreta';
            header("location: ../login.php");
        }
    } else { 
        $_SESSION['msg'] = 'usuário não encontrado';
        header("location: ../login.php");
    }

}

if(isset($_POST['logout'])) {
    session_destroy();
    $_SESSION['logado'] = false;
    header("location: ../index.php");
}

if(isset($_POST['alterarConta'])) {
    $codpessoa = $_POST['codpessoaPerfil'];
    $nome = $_POST['alteranome'];
    $email = $_POST['alteraemail'];
    $array = array($nome, $email, $codpessoa);
    $query = "UPDATE pessoas SET nome = ?, email = ? WHERE codpessoa = ?";
    crud($query, $array);
    header("location: ../perfil.php");
}

if(isset($_POST['deletarConta'])) {
    $codpessoa = $_POST['codpessoaPerfil'];
    $array = array($codpessoa);
    $query = "DELETE FROM pessoas WHERE codpessoa = ?";
    crud($query, $array);
    $_SESSION['logado'] = false;
    session_destroy();
    header("location: ../index.php");
}

if(isset($_POST['btncompra'])) {
    if($_SESSION['logado']) {
        $code = $_POST['dadosCode'];
        $image = $_POST['dadosImage'];
        $nome = $_POST['dadosNome'];
        $preco = $_POST['dadosPreco'];
        $quantidade = 1;
        
        $array = array("codproduto" => $code, "nm_image" => $image, "nome" => $nome, "preco" => $preco, "quantidade" => $quantidade);
         
        if(!isset($_SESSION['carrinho'])) {
            $_SESSION['carrinho'][] = array();
        } 
            
        $produtoAdicionado = false;

        foreach($_SESSION['carrinho'] as $produto) {
            if(isset($produto['codproduto'])) {
                if($produto['codproduto'] == $code) {
                    $produtoAdicionado = true;
                    break;
                } 
            }
        }

        if($produtoAdicionado) {
            foreach($_SESSION['carrinho'] as &$produto2) {
                if(isset($produto2['codproduto'])) {
                    if($produto2['codproduto'] == $code) {
                        $produto2['quantidade']++;
                        $produto2['preco'] = $preco * $produto2['quantidade'];
                        break;
                    }
                }
            }
        } else {
            $_SESSION['carrinho'][] = $array;
        }
  
        if(isset($_SESSION['carrinho'])) {
            $_SESSION['quantidadeTotal'] = 0;
            $_SESSION['precoTotalFinal'] = 0;
            foreach($_SESSION['carrinho'] as &$produto) {
                if(isset($produto['quantidade']) and isset($produto['preco'])) {
                    $_SESSION['quantidadeTotal'] += $produto['quantidade'];
                    $_SESSION['precoTotalFinal'] += $produto['preco'];
                    if ($_SESSION['precoTotalFinal'] < 0) {
                        $_SESSION['precoTotalFinal'] = 0;
                    }
                }
            }
        } 
        echo json_encode($_SESSION['quantidadeTotal']);

    } else { 
        header("location: ../login.php");  
    }
}

if(isset($_POST['removeItemCarrinho'])) {
    $code = $_POST['dadosCode'];
    $array = array($code);
    $query = "SELECT preco FROM produto WHERE codproduto = ?";
    $selecao = 0;
    $verificador = listagem2($query, $array, $selecao);

    foreach($_SESSION['carrinho'] as $indice => &$produto) {
        if(isset($produto['codproduto'])) {
            if($produto['codproduto'] == $code) {
                $produto['quantidade']--;
                if($produto['quantidade'] > 0) {           
                    $produto['preco'] = $verificador['preco'] * $produto['quantidade'];
                    break;
                } else {
                    unset($_SESSION['carrinho'][$indice]);
                }
            }
        }
    }

    if(isset($_SESSION['carrinho'])) {
        $_SESSION['quantidadeTotal'] = 0;
        foreach($_SESSION['carrinho'] as &$produto) {
            $_SESSION['quantidadeTotal'] += $produto['quantidade'];
        }
    }

    $_SESSION['precoTotalFinal'] -= $verificador['preco'];
    if ($_SESSION['precoTotalFinal'] < 0) {
        $_SESSION['precoTotalFinal'] = 0;
    }
    
    header("location: ../carrinho.php");
}

if(isset($_POST['btnFinalizarCompra'])) {
    if(isset($_SESSION['carrinho'])) {
        $codpessoa = $_SESSION['codpessoa'];

        foreach($_SESSION['carrinho'] as $item) {
            if(!isset($item['codproduto']) || empty($item['codproduto'])) {
                continue;
            }
            $codproduto = $item['codproduto'];
            $quantidade = $item['quantidade'];
            $total = $item['preco'];
            $array = array($codpessoa, $codproduto, $total, $quantidade);
            finalizarCompra($array);
        }     
    }
    unset($_SESSION['carrinho']);
    unset($_SESSION['quantidadeTotal']);
    unset($_SESSION['precoTotalFinal']);

    header("location: ../compraFinalizada.php");
}

if(isset($_POST['trocarSenha'])) {
    if(!empty($_POST['emailTrocarSenha'])) {
        $email = $_POST['emailTrocarSenha'];
        $array = array($email);
        $query = "SELECT * FROM pessoas WHERE email = ?";
        $selecao = 0;
        $result = listagem2($query, $array, $selecao);
        if($result) {
            $codpessoa = $result['codpessoa'];
            $hash = uniqid(mt_rand());
            $array2 = array($hash, $codpessoa);
            $query2 = "INSERT INTO novasenha (uniqid, codpessoa) VALUES (? ,? )";
            crud($query2, $array2);
            $link = 'http://localhost/PROJETOFINAL/redefinirSenha.php?c='.$codpessoa.'&d='.$hash;
            $mensagem = 'Clique aqui para redefinir sua senha: '.$link;
            $assunto = 'Redefinição de Senha';
            $array3 = array($email, $mensagem, $assunto);
            enviaEmail($array3);
            $_SESSION['msg10'] = "acesse seu email para continuar :)";
        } else {
            $_SESSION['msg10'] = "email não encontrado";
        }
    }
    if (isset($_SESSION['msg10'])) {
        $response = array("message" => $_SESSION['msg10']);
        echo json_encode($response);
        unset($_SESSION['msg10']);
        unset($_SESSION['msg']);
    } else {
        $response = array("message" => "");
        echo json_encode($response);
    }
}

if(isset($_POST['senhaAtualizada'])) {
    $senha = password_hash($_POST['senhaNova'], PASSWORD_DEFAULT);
    $codpessoa = $_POST['codeTemp'];
    $array = array($codpessoa);
    $query = "SELECT * FROM pessoas WHERE codpessoa = ?";
    $selecao = 0;
    $result = listagem2($query, $array, $selecao);
    if($result) {
        $array2 = array($senha, $codpessoa);
        $query2 = "UPDATE pessoas SET senha = ? WHERE codpessoa = ?";
        $result2 = crud($query2, $array2); 
        header("location: ../login.php");      
    } else {
        header("location: ../index.php");
    }
}

if(isset($_POST['perguntasProduto']) and !empty($_POST['comentario'])) {
    $codpessoa = $_POST['perguntasCodpessoa'];
    $code = $_POST['perguntasCodProduto'];
    $comentario = $_POST['comentario'];
    $array = array($code, $comentario, $codpessoa);
    $query = "INSERT INTO comentarios (codproduto, comentario, codcliente) VALUES (?, ?, ?)";
    $result = crud($query, $array);

    if($result) {
        $queryPerguntas = "SELECT comentarios.comentario, DATE_FORMAT(comentarios.reg_date, '%d/%m/%Y') AS 'data', pessoas.nome AS 'nome' 
        FROM comentarios 
        JOIN pessoas ON comentarios.codcliente = pessoas.codpessoa 
        WHERE comentarios.codproduto = ? 
        ORDER BY comentarios.reg_date DESC";
        $arrayPerguntas = array($code);
        $selecao = 1;
        $perguntas = listagem2($queryPerguntas, $arrayPerguntas, $selecao);

        foreach($perguntas as $pergunta) {
?>
        <div class="containerTable__table2">
            <p class="pDateProduto"><?php echo $pergunta['nome'].' - '?><?php echo $pergunta['data'];?></p>
            <p><?php echo $pergunta['comentario'];?></p>  
        </div>
<?php
        }
    } 
}
    
?>