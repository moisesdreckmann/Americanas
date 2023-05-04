<?php

if(isset($_FILES['prodImage']['name']) and isset($_FILES['prodImage']['type']) and isset($_FILES['prodImage']['size'])) {

    $nomeArquivo = $_FILES['prodImage']['name'];
    $tamanhoArquivo = $_FILES['prodImage']['size'];
    $tipoArquivo = $_FILES['prodImage']['type'];
    $tmpArquivo = $_FILES['prodImage']['tmp_name'];

    $tamanhoMax = '2097152';
    $extensoesValidas = array(".jpg", ".JPG", ".jpeg", ".JPEG", ".png", ".PNG", ".webp", ".WEBP");
    $extensao = strrchr($nomeArquivo, '.');

    if(!empty($nomeArquivo)) {

        if($tamanhoArquivo > $tamanhoMax) {
            die("Tamanho da imagem no maximo 2M");
        }

        if(!in_array($extensao, $extensoesValidas)) {
            die("Extensão do arquivo invalida");
        }

        $novoNomeArquivo = random_int(00000000,100000000).$extensao;
        $caminhoProd = '../images/imagesprod/'.$novoNomeArquivo;

        if(file_exists($caminhoProd)) {
            die("Imagem não pôde ser enviada. Tente novamente mais tarde");
        }

        if(move_uploaded_file($tmpArquivo,$caminhoProd)) {
            echo "imagem cadastrada com sucesso";
            return $novoNomeArquivo;
        } else{
            echo "Falha no envio da imagem";
        }

    } else {
            echo "Imagem não definida";
        }
}
?>