<?php
session_start();
if (!isset($_SESSION['logado']) || !$_SESSION['logado']) {
    header("location: login.php");
    exit; // é uma boa prática encerrar o script após o redirecionamento
}
require_once("componentes/header3.php");
?>

    <main class="mainCarrinho">
        <section class="sectionCarrinho">
          
            <?php       

            if(isset($_SESSION['carrinho'])) {
            
                foreach($_SESSION['carrinho'] as $indice => $item) {
                    
                    if(isset($item['codproduto']) and isset($item['nm_image']) and isset($item['nome']) and isset($item['quantidade']) and isset($item['preco'])) {
                    
                ?>

                <form action="includes/logica.php" method="post" autocomplete="off" enctype="multipart/form-data" class="formCarrinho">
                    <button type="submit" name="removeItemCarrinho" value="removeItemCarrinho" class="btnRemoveItemCarrinho"><i class="fa-regular fa-trash-can removeItem"></i></button>

                    <input type="hidden" name="dadosCode" value="<?php echo $item['codproduto'];?>">

                    <div>
                        <img src="images/imagesprod/<?php echo $item['nm_image'];?>" alt="" class="carrinhoImage">
                    </div>

                    <div class="carrinhoTitle">
                        <p class="postagemTitle">
                            <?php echo $item['nome'];?>
                        </p>
                    </div>
                    
                    <div class="carrinhoQt">
                        <p><?php echo $item['quantidade'];?></p>
                    </div>

                    <?php              
                    $precoFloat = $item['preco'];
                    $precoString = number_format($precoFloat,2,",",".");
                    ?>
                        
                    <div class="carrinhoPreco">
                        <p class="postagemPreco">
                            R$ <?php echo $precoString;?>
                        </p>
                    </div>
                </form>
                
            <?php
                }
                }
            }
            ?>

            <?php
                if(isset($_SESSION['carrinho']) and $_SESSION['quantidadeTotal'] > 0) {
     
            ?>
            <div class="enderecamento">
                <div class="endereco__1">
                    <label for="cep">Digite seu Cep: </label>
                    <input type="text" id="cep" maxlength="9" placeholder="Cep">
                </div>
                <div class="endereco__2">
                    <input type="text" class="validaCep" placeholder="Logradouro" disabled>
                    <input type="text" class="validaCep" placeholder="Bairro" disabled>
                    <input type="text" class="validaCep" placeholder="Localidade" disabled>
                </div>
            </div>
            <div class="containerFinalizarCompra">
                <form action="includes/logica.php" method="post" class="formFinal">
                    <div>
                       
                    </div>
                    <span class="spanTotal"><p>Total</p> </span>
                    <span class="spanPrecoFinal">R$ 
                        <?php 
                        echo $total = number_format($_SESSION['precoTotalFinal'],2,',','.');
                        ?> 
                    </span>
                    <button type="submit" name="btnFinalizarCompra" value="btnFinalizarCompra" class="btnFinalizarCompra">COMPRAR</button>
                </form>
            </div>

            <?php
            } else {
            ?>

            <div class="containerFinalizarCompra">        
                <div class="containerVazio">
                    <p>Nenhum item adicionado ao carrinho :&#40;</p>  
                </div>         
            </div>
            <?php 
            }
            ?>
        </section>
    </main>
    <footer>
            <img src="images/loja/logo2.png" alt="" class="logoImg2">
            <p>&copy; Réplica com todos os direitos reservados.</p>
    </footer>
    <div class="fundoCinza"></div>
    <script type="text/javascript" src="javascript/controleSenha.js"></script>
    <script type="text/javascript" src="javascript/viaCep.js"></script>
</body>
</html>