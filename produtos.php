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
        <section class="container2">

       <?php
            if(isset($_GET['amcd']) and isset($_GET['produto'])) {
                $code = $_GET['amcd'];
                $query = "SELECT * FROM produto WHERE codproduto = ?";
                $array = array($code);
                $selecao = 0;
                $dado = listagem2($query, $array, $selecao);
        ?>
            <div class="containerProdUnico">
                <form action="includes/logica.php" method="post" autocomplete="off" enctype="multipart/form-data" onsubmit="addCarrinho(event)">
                    <input type="hidden" name="dadosCode" value="<?php echo $dado['codproduto'];?>">

                    <input type="hidden" name="dadosImage" value="<?php echo $dado['nm_image'];?>">
                    <img src="images/imagesprod/<?php echo $dado['nm_image'];?>" alt="" class="prodImgUnico">

                    <input type="hidden" name="dadosNome" value="<?php echo $dado['nome'];?>">
                    <div class="postagemContainerUnico">
                        <p class="postagemTitleUnico">
                            <?php echo $dado['nome'];?>
                        </p>
                    </div>


                    <div class="postagemContainer2Unico">
                        <p class="postagemDescUnico">
                            <?php echo $dado['descricao'];?>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias earum aliquid nemo ducimus eveniet voluptate, molestiae optio tenetur cum? Quia cum esse ab voluptas, qui minus cupiditate eum veritatis animi.
                        </p>
                    </div>

                    <?php
                        $precoFloat = $dado['preco'];
                        $precoString = number_format($precoFloat,2,",",".");
                    ?>
                    <input type="hidden" name="dadosPreco" value="<?php echo $dado['preco'];?>">
                    <div class="postagemContainer3Unico">
                        <p class="postagemPrecoUnico">
                            R$ <?php echo $precoString;?>
                        </p>
                        <p class="postagemPrecoUnico2">
                            <?php
                                $parcela =($dado['preco'] /8);
                                $parcela2 = number_format($parcela,2,",",".");
                            ?>
                            <i class="fa-regular fa-credit-card"></i> até 8x de R$ <?php echo $parcela2;?>
                        </p>
                    </div>
                    <input type="hidden" name="alteracodprod" value="<?php echo $dado['codcategoria'];?>">
                    <div class="postagemButtonUnico">
                        <input type="hidden" name="btncompra" value="">
                        <button type="submit" name="btncompra" value="btncompra" class="btncompraUnico btn"><i class="fa-sharp fa-solid fa-bag-shopping"></i> COMPRAR</button> 
                    </div>
                </form>
            </div>
            <?php
            }
            ?>
            <div class="containerTable">
                <div class="containerTable__title">
                    <h1>informações do produto</h1>
                    <span><i class="fa-solid fa-chevron-down icon2"></i></span>
                </div>
                <div class="containerTable__table">
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatibus quas, sunt ad pariatur quis deserunt inventore enim amet laudantium explicabo, rem quidem in tempore necessitatibus est! Cumque qui hic pariatur! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Alias aperiam ab unde beatae, reiciendis voluptatem necessitatibus. Enim itaque iusto optio illum maxime. Doloremque assumenda nisi ipsa quia nostrum quisquam ullam.
                    </p>
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus, voluptatum, quas alias dolore esse pariatur quisquam obcaecati fugiat neque, doloremque iure enim distinctio aspernatur non autem! Eius natus ad eos. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Totam culpa consequatur, eaque est rem sequi libero cupiditate asperiores nam error! Assumenda ab aliquam error doloribus natus aperiam ut, tempora ex.
                    </p>
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Atque dolores fugit corrupti voluptas temporibus minus molestiae, incidunt dignissimos officiis, animi sapiente quod architecto reprehenderit repellat maiores ipsum? Deleniti, incidunt veritatis!
                    </p>
                </div>
            </div>

            <div class="containerTable">
                <div class="containerTable__title">
                    <h1>ficha tecnica</h1>
                    <span><i class="fa-solid fa-chevron-down icon2"></i></span>
                </div>
                <div class="containerTable__table">
                    <table>
                        <tbody>
                            <tr>
                                <td>loren loren</td>
                                <td>Lorem ipsum dolor sit amet</td>
                            </tr>
                            <tr>
                                <td>loren loren</td>
                                <td>Lorem ipsum dolor sit amet</td>
                            </tr>
                            <tr>
                                <td>loren loren</td>
                                <td>Lorem ipsum dolor sit amet</td>
                            </tr>
                            <tr>
                                <td>loren loren</td>
                                <td>Lorem ipsum dolor sit amet</td>
                            </tr>
                            <tr>
                                <td>loren loren</td>
                                <td>Lorem ipsum dolor sit amet</td>
                            </tr>
                            <tr>
                                <td>loren loren</td>
                                <td>Lorem ipsum dolor sit amet</td>
                            </tr>
                            <tr>
                                <td>loren loren</td>
                                <td>Lorem ipsum dolor sit amet</td>
                            </tr>
                            <tr>
                                <td>loren loren</td>
                                <td>Lorem ipsum dolor sit amet</td>
                            </tr>
                            <tr>
                                <td>loren loren</td>
                                <td>Lorem ipsum dolor sit amet</td>
                            </tr>
                            <tr>
                                <td>loren loren</td>
                                <td>Lorem ipsum dolor sit amet</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="containerBannersCategorias">
                <img src="images/bannersCategorias/01.webp" alt="categorias">
                <img src="images/bannersCategorias/02.webp" alt="categorias">
                <img src="images/bannersCategorias/03.webp" alt="categorias">
                <img src="images/bannersCategorias/04.webp" alt="categorias">
                <img src="images/bannersCategorias/05.webp" alt="categorias">
                <img src="images/bannersCategorias/06.webp" alt="categorias">
                <img src="images/bannersCategorias/07.webp" alt="categorias">
            </div>
            <div class="sugeridos">
                <h1 class="h1Notes tittleSugeridos">produtos que você também poderia gostar</h1>
                <div class="containerSugeridos">
                <?php
                if(isset($_GET['amcat'])) {
                    $code = $_GET['amcd'];
                    $categoria = $_GET['amcat'];
                    $array = array($categoria, $code);
                    $query = "SELECT * FROM produto WHERE codcategoria = ? AND codproduto <> ?";
                    $selecao = 1;
                    $dadoRecomendados = listagem2($query, $array, $selecao);

                    $limitedRows = array_slice($dadoRecomendados, 0, 8);

                    foreach( $limitedRows as $dadoRecomendado) {
                        ?>
                        <div class="containerProd">
                            <form action="includes/logica.php" method="post" autocomplete="off" enctype="multipart/form-data" onsubmit="addCarrinho(event)">
                                <input type="hidden" name="dadosCode" value="<?php echo $dadoRecomendado['codproduto'];?>" class="pegarCode">
            
                                <input type="hidden" name="dadosImage" value="<?php echo $dadoRecomendado['nm_image'];?>">
                                <img src="images/imagesprod/<?php echo $dadoRecomendado['nm_image'];?>" alt="" class="prodArquivoCliente" onclick="carregaProduto2(event)">
            
                                <input type="hidden" name="dadosNome" value="<?php echo $dadoRecomendado['nome'];?>" class="pegarNome">
                                <div class="postagemContainer1">
                                    <p class="postagemTitleSugeridos">
                                        <?php echo $dadoRecomendado['nome'];?>
                                    </p>
                                </div>
            
                                <div class="postagemContainer2">
                                    <p class="postagemDesc">
                                        <?php echo $dadoRecomendado['descricao'];?>
                                    </p>
                                </div>
            
                                <?php
                                    $precoFloat = $dadoRecomendado['preco'];
                                    $precoString = number_format($precoFloat,2,",",".");
                                ?>
                                <input type="hidden" name="dadosPreco" value="<?php echo $dado['preco'];?>">
                                <div class="postagemContainer3">
                                    <p class="postagemPreco centralizaPrecoSugeridos">
                                        R$ <?php echo $precoString;?>
                                    </p>
                                </div>
                                <input type="hidden" name="alteracodprod" value="<?php echo $dadoRecomendado['codcategoria'];?>" class="pegarCategoria">
                            </form>
                        </div>
                        
                    <?php  
                    }
                    }
                    ?>
                    </div>
                </div>
                <div class="containerTable">
                    <div class="containerTable__title">
                        <h1>faça uma pergunta sobre o produto</h1>
                    </div>
                    <div class="containerTable__perguntas" id="carregaPerguntas">
                        <?php 
                            $codePerguntas = $_GET['amcd'];
                            $arrayPerguntas = array($codePerguntas);
                            $queryPerguntas = "SELECT comentarios.comentario, DATE_FORMAT(comentarios.reg_date, '%d/%m/%Y') AS 'data', pessoas.nome AS 'nome' 
                            FROM comentarios 
                            JOIN pessoas ON comentarios.codcliente = pessoas.codpessoa 
                            WHERE comentarios.codproduto = ? 
                            ORDER BY comentarios.reg_date DESC";
                            $selecao = 1;
                            $perguntas = listagem2($queryPerguntas, $arrayPerguntas, $selecao);
                            foreach ($perguntas as $pergunta) {
                        ?>
                        <div class="containerTable__table2">
                            <p class="pDateProduto"><?php echo $pergunta['nome'].' - '?><?php echo $pergunta['data'];?></p>
                            <p><?php echo $pergunta['comentario'];?></p>  
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                    <?php
                    if(isset($_SESSION['logado']) and $_SESSION['logado'] == true) {
                    ?>
                        <form action="includes/logica.php" class="containerTable__table3" method="post" onsubmit="perguntas(event)">
                            <input type="hidden" name="perguntasCodpessoa" value="<?php echo $_SESSION['codpessoa'];?>">
                            <input type="hidden" name="perguntasCodProduto" value="<?php echo $dado['codproduto'];?>">
                            <textarea name="comentario" cols="30" rows="10" id="comentario"></textarea>
                            <input type="hidden" name="perguntasProduto" value="">
                            <button type="submit" name="perguntasProduto" value="perguntasProduto" class="btn">ENVIAR</button>
                        </form>
                    <?php
                    }
                    ?>
                </div>
        </section>
    </main>
    
    <footer>
            <img src="images/loja/logo2.png" alt="" class="logoImg2">
            <p>&copy; Réplica com todos os direitos reservados.</p>
    </footer>
    <div class="fundoCinza"></div>
    <div class="fundoCinza2"></div>
    <script type="text/javascript" src="javascript/manipulaçãoPag.js"></script>
    <script type="text/javascript" src="javascript/fichaTecnica.js"></script>
    <script type="text/javascript" src="javascript/ajax.js"></script>
    <script type="text/javascript" src="javascript/menu.js"></script>
    <script type="text/javascript" src="javascript/pagProduto.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>