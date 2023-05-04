<?php
require_once("includes/functions.php");

if(isset($_GET['p'])) {
    $busca = '%'.$_GET['p'].'%';
    $array = array($busca);
    $query = "SELECT * FROM produto WHERE nome LIKE ?";
    $selecao = 1;
    $dadosBusca = listagem2($query, $array, $selecao);
    
    foreach($dadosBusca as $dado) {
?>
    <div class="containerProd">
        <form action="includes/logica.php" method="post" autocomplete="off" enctype="multipart/form-data" onsubmit="addCarrinho(event)">
            <input type="hidden" name="dadosCode" value="<?php echo $dado['codproduto'];?>">

            <input type="hidden" name="dadosImage" value="<?php echo $dado['nm_image'];?>">
            <img src="images/imagesprod/<?php echo $dado['nm_image'];?>" alt="" class="prodArquivoCliente">

            <input type="hidden" name="dadosNome" value="<?php echo $dado['nome'];?>">
            <div class="postagemContainer1">
                <p class="postagemTitle">
                    <?php echo $dado['nome'];?>
                </p>
            </div>

            <div class="postagemContainer2">
                <p class="postagemDesc">
                    <?php echo $dado['descricao'];?>
                </p>
            </div>


            <?php
                $precoFloat = $dado['preco'];
                $precoString = number_format($precoFloat,2,",",".");
            ?>
            <input type="hidden" name="dadosPreco" value="<?php echo $dado['preco'];?>">
            <div class="postagemContainer3">
                <p class="postagemPreco">
                    R$ <?php echo $precoString;?>
                </p>
            </div>
            <input type="hidden" name="alteracodprod" value="<?php echo $dado['codcategoria'];?>">
            <div class="postagemButton">
                <input type="hidden" name="btncompra" value="">
                <button type="submit" name="btncompra" value="btncompra" class="btncompra btn">COMPRAR</button> 
            </div>
        </form>
    </div>
<?php
    }
} 
?>
    <script type="text/javascript" src="javascript/ajax.js"></script>