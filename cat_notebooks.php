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
        <h1 class="h1Notes">notebooks</h1>
        <p class="paragrafoNotes">Procurando notebook para trabalhar, estudar ou para jogar seus games favoritos? Esses modelos são uma ótima pedida para quem quer mobilidade e praticidade no dia-a-dia. Aqui na americanas você encontra uma variedade de notebooks, notebook gamer, macbook, notebook 2 em 1, notebooks em promoção e muito mais. E ainda pode buscar por notebook Samsung, Dell, Acer, HP e outras marcas com destaque no mercado. Tudo com entrega rápida e as melhores promoções. Vem ver!
        </p>
        <h1 class="h1Notes2">encontre o notebook ideal para você</h1>
        <section class="promoNotesContainer">
            <img src="images/notebooks/1.webp" alt="foto sobre notebooks" class="promoNoteimg1">
            <img src="images/notebooks/2.webp" alt="foto sobre notebooks" class="promoNoteimg2">
            <img src="images/notebooks/3.webp" alt="foto sobre notebooks" class="promoNoteimg3">
            <img src="images/notebooks/4.webp" alt="foto sobre notebooks" class="promoNoteimg4">
            <img src="images/notebooks/5.webp" alt="foto sobre notebooks" class="promoNoteimg5">
        </section>

        <h1 class="h1Notes">navegue por marcas de notebook</h1>
        <section class="containerListaMarcasNotes">
            <img src="images/notebooks/marcas/marca1.webp" alt="logomarca">
            <img src="images/notebooks/marcas/marca2.webp" alt="logomarca">
            <img src="images/notebooks/marcas/marca3.webp" alt="logomarca">
            <img src="images/notebooks/marcas/marca4.webp" alt="logomarca">
            <img src="images/notebooks/marcas/marca5.webp" alt="logomarca">
            <img src="images/notebooks/marcas/marca6.webp" alt="logomarca">
        </section>

        <section class="filtrosProdutos2">
            <div>
                <select name="" id="">
                    <option value="" disabled selected>processadores</option>
                    <option value="">Intelcore i3</option>
                    <option value="">Intelcore i5</option>
                    <option value="">Intelcore i7</option>
                    <option value="">Rizen Force 5</option>
                </select>
            </div>
            <div>
                <select name="" id="">
                    <option value="" disabled selected>marca</option>
                    <option value="">dell</option>
                    <option value="">sansung</option>
                    <option value="">acer</option>
                    <option value="">lenovo</option>
                </select>
            </div>
            <div>
                <select name="" id="">
                    <option value="" disabled selected>memoria ram</option>
                    <option value="">4g</option>
                    <option value="">8g</option>
                    <option value="">16g</option>
                    <option value="">32g</option>
                </select>
            </div>
            <div>
                <select name="" id="">
                    <option value="" disabled selected>preço</option>
                    <option value="">R$500 a R$1500</option>
                    <option value="">R$1500 a R$2500</option>
                    <option value="">R$2500 a R$3500</option>
                    <option value="">R$3500 a R$4500</option>
                </select>
            </div>
            <div>
                <select name="" id="">
                    <option value="" disabled selected>tipo do produto</option>
                    <option value="">notebook</option>
                    <option value="">macbook</option>
                    <option value="">ssd</option>
                    <option value="">computador</option>
                </select>
            </div>
        </section>

        <section class="containerPaginaProduto">
            <aside class="filtrosProdutos1">
                <div>
                    <h3>processadores</h3>
                    <label for="check1"><input type="checkbox" id="check1">Intelcore i3</label>
                    <label for="check2"><input type="checkbox" id="check2">Intelcore i5</label>
                    <label for="check3"><input type="checkbox" id="check3">Intelcore i7</label>
                    <label for="check4"><input type="checkbox" id="check4">Rizen Force 5</label>
                    <p>ver todos</p>
                </div>
                <div>
                    <h3>marca</h3>
                    <label for="check5"><input type="checkbox" id="check5">dell</label>
                    <label for="check6"><input type="checkbox" id="check6">sansung</label>
                    <label for="check7"><input type="checkbox" id="check7">acer</label>
                    <label for="check8"><input type="checkbox" id="check8">lenovo</label>
                    <p>ver todos</p>
                </div>
                <div>
                    <h3>memoria ram</h3>
                    <label for="check9"><input type="checkbox" id="check9">4g</label>
                    <label for="check10"><input type="checkbox" id="check10">8g</label>
                    <label for="check11"><input type="checkbox" id="check11">16g</label>
                    <label for="check12"><input type="checkbox" id="check12">32g</label>
                    <p>ver todos</p>
                </div>
                <div>
                    <h3>preço</h3>
                    <label for="check13"><input type="checkbox" id="check13">R$500 a R$1500</label>
                    <label for="check14"><input type="checkbox" id="check14">R$1500 a R$2500</label>
                    <label for="check15"><input type="checkbox" id="check15">R$2500 a R$3500</label>
                    <label for="check16"><input type="checkbox" id="check16">R$3500 a R$4500</label>
                    <p>ver todos</p>
                </div>
                <div>
                    <h3>tipo do produto</h3>
                    <label for="check17"><input type="checkbox" id="check17">notebook</label>
                    <label for="check18"><input type="checkbox" id="check18">macbook</label>
                    <label for="check19"><input type="checkbox" id="check19">ssd</label>
                    <label for="check20"><input type="checkbox" id="check20">computador</label>
                    <p>ver todos</p>
                </div>    
            </aside>

            <div class="listagemProdutos">
            <?php
                $query = "SELECT produto.codproduto, produto.nome, produto.descricao, produto.nm_image, produto.preco, produto.codcategoria FROM produto JOIN categoria USING(codcategoria) WHERE categoria.nome = 'Notebooks'";
                $selecao = 1;
                $dadosprod = listagem($query, $selecao);

                foreach( $dadosprod as $dado) {
            
            ?>
                <div class="containerProdListagem">
                    <form action="#" method="post" autocomplete="off" enctype="multipart/form-data" onclick="carregaProduto(event)">
                        <input type="hidden" name="dadosCode" value="<?php echo $dado['codproduto'];?>" class="pegarCode">

                        <input type="hidden" name="dadosImage" value="<?php echo $dado['nm_image'];?>">
                        <img src="images/imagesprod/<?php echo $dado['nm_image'];?>" alt="" class="prodArquivoClientecat1">

                        <input type="hidden" name="dadosNome" value="<?php echo $dado['nome'];?>"  class="pegarNome">
                        <div class="postagemContainer1cat1">
                            <p class="postagemTitlecat1">
                                <?php echo $dado['nome'];?>
                            </p>
                        </div>


                        <div class="postagemContainer2cat1">
                            <p class="postagemDesc">
                                <?php echo $dado['descricao'];?>
                            </p>
                        </div>

                        <?php
                            $precoFloat = $dado['preco'];
                            $precoString = number_format($precoFloat,2,",",".");
                        ?>
                        <input type="hidden" name="dadosPreco" value="<?php echo $dado['preco'];?>">
                        <div class="postagemContainer3cat1">
                            <p class="postagemPrecocat1">
                                R$ <?php echo $precoString;?>
                            </p>
                        </div>
                        <input type="hidden" name="alteracodprod" value="<?php echo $dado['codcategoria'];?>" class="pegarCategoria">
                    </form>
                </div>
                
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
    <script type="text/javascript" src="javascript/menu.js"></script>
    <script type="text/javascript" src="javascript/pagProduto.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>