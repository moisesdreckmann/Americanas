<?php
session_start();
if(!isset($_SESSION['logado'])) {
    require_once('componentes/header.php');  
} else {
    require_once('componentes/header2.php'); 
}
require_once('includes/functions.php');
?>
    <main class="mainClientes">
        <section class="container2" id="carrega">

        <?php
        
        if(isset($_POST['btnBuscador'])) {
            $busca = '%'.$_POST['buscador'].'%';
            $array = array($busca);
            $query = "SELECT * FROM produto WHERE nome LIKE ?";
            $selecao = 1;
            $dadosBusca = listagem2($query, $array, $selecao);
            
            foreach($dadosBusca as $dado) {
        
        ?>

            <div class="containerProd containerAjax">
                <form action="includes/logica.php" method="post" autocomplete="off" enctype="multipart/form-data" onsubmit="addCarrinho(event)">
                    <input type="hidden" name="dadosCode" value="<?php echo $dado['codproduto'];?>" class="pegarCode2">

                    <input type="hidden" name="dadosImage" value="<?php echo $dado['nm_image'];?>">
                    <img src="images/imagesprod/<?php echo $dado['nm_image'];?>" alt="" class="prodArquivoCliente" onclick="carregaProduto3(event)">

                    <input type="hidden" name="dadosNome" value="<?php echo $dado['nome'];?>" class="pegarNome2">
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
                    <input type="hidden" name="alteracodprod" value="<?php echo $dado['codcategoria'];?>" class="pegarCategoria2">
                    <div class="postagemButton">
                        <input type="hidden" name="btncompra" value="">
                        <button type="submit" name="btncompra" value="btncompra" class="btncompra btn" onsubmit="addCarrinho(event)">COMPRAR</button> 
                    </div>
                </form>
            </div>
        <?php
            }
        } else {
            $query = "SELECT * FROM produto ORDER BY codproduto";
            $selecao = 1;
            $dadosprod = listagem($query, $selecao);

            foreach( $dadosprod as $dado) {
        ?>
            <div class="containerProd">
                <form action="includes/logica.php" method="post" autocomplete="off" enctype="multipart/form-data" onsubmit="addCarrinho(event)">
                    <input type="hidden" name="dadosCode" value="<?php echo $dado['codproduto'];?>" class="pegarCode">

                    <input type="hidden" name="dadosImage" value="<?php echo $dado['nm_image'];?>">
                    <img src="images/imagesprod/<?php echo $dado['nm_image'];?>" alt="" class="prodArquivoCliente" onclick="carregaProduto2(event)">

                    <input type="hidden" name="dadosNome" value="<?php echo $dado['nome'];?>" class="pegarNome">
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
                    <input type="hidden" name="alteracodprod" value="<?php echo $dado['codcategoria'];?>" class="pegarCategoria">
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
        </section>
    </main>
    
    <footer>
            <img src="images/loja/logo2.png" alt="" class="logoImg2">
            <p>&copy; Réplica com todos os direitos reservados.</p>
    </footer>
    <div class="fundoCinza"></div>
    <div class="fundoCinza2"></div>
    <script type="text/javascript" src="javascript/manipulaçãoPag.js"></script>
    <script type="text/javascript" src="javascript/menu.js"></script>
    <script type="text/javascript" src="javascript/ajax.js"></script>
    <script type="text/javascript" src="javascript/pagProduto.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>