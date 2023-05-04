<?php
session_start();
require_once('componentes/header4.php');

if($_SESSION['logado'] == false) {
    header("location: index.php");
}
?>

    <main class="mainCadastros">
        <section class="container">
            <div class="containerBox">
                <div class="containerTitle">
                    <p>CADASTRAR CATEGORIAS</p>
                </div>
                
                <form action="includes/logica.php" method="post" autocomplete="off" class="formColor">
                    <div class="containerBody">
                        <div>
                            <span>Nome da Categoria: </span>
                            <input type="text" name="cadastraCat" value="" class="largeInput" spellcheck = "false" maxlength="35">
                        </div>
                        <div>
                            <button type="submit" name="btnCadastraCat" class="btnPurple btn" value="btnCadastraCat">CADASTRAR</button> 
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <section class="container">
            <div class="containerBox">
                <div class="containerTitle">
                    <p>ALTERAR CATEGORIAS</p>
                </div>

                <?php
                require_once('includes/functions.php');
                $query = "SELECT * FROM categoria ORDER BY codcategoria";
                $selecao = 1;
                $dados = listagem($query, $selecao);
                
                foreach( $dados as $dado) {
                    
                ?>

                <form action="includes/logica.php" method="post" autocomplete="off" class="formColor">
                    <div class="containerBody">
                        <input type="hidden" name="codeCat" value="<?php echo $dado['codcategoria'];?>">
                        <div>
                            <span>Categoria ID: <?php echo $dado['codcategoria'];?></span>
                            <input type="text" name="alteraCat" value="<?php echo $dado['nome'];?>" class="largeInput" spellcheck = "false" maxlength="35">
                        </div>
                        <div>
                            <button type="submit" name="btnAlterarCat" class="btnPurple btn" value="btnAlterarCat">ALTERAR</button> 
                            <button type="submit" name="btnDeletarCat" value="btnDeletarCat" class="btn">DELETAR</button>
                        </div>
                    </div>
                </form>
            
                <?php
                }
                ?>
            </div>
        </section>

        <section class="container">
            <div class="containerBox">
                <div class="containerTitle">
                    <p>CADASTRAR PRODUTOS</p>
                </div>
                    
                <form action="includes/logica.php" method="post" autocomplete="off" enctype="multipart/form-data" class="formColor">
                    <div class="containerBody">
                        <div class="prodWrapper">
                            <label for="" class="prodlabel"><img src="images/loja/foto.png" alt="" class="prodArquivo"><input type="file" name="prodImage" accept="image/*" class="inputProd"></label>
                        </div>
                        <div>
                            <span>Nome: </span>
                            <input type="text" name="nomeprod" value="" class="largeInput" maxlength="35" spellcheck = "false">
                        </div>
                        <div>
                            <span>Preço: </span>
                            <input type="text" name="precoprod" value="" maxlength="9" spellcheck = "false">
                        </div>
                    </div>

                    <div class="containerBody containerBodyEstendido">

                        <textarea name="descprod" cols="30" rows="10" placeholder="Descreva o Produto.." maxlength="100" spellcheck = "false"></textarea>

                        <div class="wrapperBody">
                            <div>
                                <span>Categoria: </span>
                                <select name="selectprod">
                                    <option value="" disabled selected></option>
                                        
                                    <?php
                                    $query = "SELECT * FROM categoria ORDER BY codcategoria";
                                    $selecao = 1;
                                    $select = listagem($query, $selecao);

                                    foreach( $select as $option) {

                                    ?>
                                                
                                    <option value="<?php echo $option['codcategoria'];?>"><?php echo $option['nome'];?></option>
                                            
                                    <?php
                                    }
                                    ?> 
                                </select>
                            </div>

                            <div>
                            <button type="submit" name="btnCadastraProd" class="btnPurple btn" value="btnCadastraProd">CADASTRAR</button> 
                            </div>
                        </div> 
                    </div>
                </form>
            </div>
            
        </section>

        <section class="container">
            <div class="containerBox">
            <div class="containerTitle">
                <p>ALTERAR PRODUTOS</p>
            </div>

            <?php
            $query = "SELECT * FROM produto ORDER BY codproduto";
            $selecao = 1;
            $dadosprod = listagem($query, $selecao);

            foreach( $dadosprod as $dado) {

            ?>
                 
            <form action="includes/logica.php" method="post" autocomplete="off" enctype="multipart/form-data" class="formColor">
                <div class="containerBody">
                    <input type="hidden" name="alteracodprod" value="<?php echo $dado['codproduto'];?>">
                    <div class="prodWrapper">
                        <label for="" class="prodlabel"><img src="images/imagesprod/<?php echo $dado['nm_image'];?>" alt="" class="prodArquivo"><input type="file" name="prodImage" accept="image/*" class="inputProd"></label>
                    </div>
                    <div>
                        <span>Nome: </span>
                        <input type="text" name="alteranmprod" value="<?php echo $dado['nome'];?>" class="largeInput" maxlength="35" spellcheck = "false">
                    </div>
                    <div>
                        <?php
                        $precoFloat = $dado['preco'];
                        $precoString = number_format($precoFloat,2,",",".");
                        ?>
                        <span>Preço: </span>
                        <input type="text" name="alterapreco" value="<?php echo $precoString;?>" maxlength="9" spellcheck = "false">
                    </div>
                </div>

                <div class="containerBody containerBodyEstendido">

                    <textarea name="alteradescprod" cols="30" rows="10" placeholder="Descreva o Produto.." maxlength="100" spellcheck = "false"><?php echo $dado['descricao'];?></textarea>

                    <div class="wrapperBody">
                        <div>
                            <span>Categoria: </span>
                            <select name="alteraselectprod" required>                    
                                <?php
                                $query = "SELECT * FROM categoria ORDER BY codcategoria";
                                $selecao = 1;
                                $select = listagem($query, $selecao);

                                foreach( $select as $option) {

                                ?>
                                            
                                <option value="<?php echo $option['codcategoria'];?>" <?php if($dado['codcategoria'] == $option['codcategoria']) echo 'selected';?> ><?php echo $option['nome'];?></option>
                                        
                                
                                <?php
                                }
                                ?> 
                            </select>
                        </div>

                        <div>
                        <button type="submit" name="btnAlteraProd" class="btnPurple btn" value="btnAlteraProd">ALTERAR</button> 
                        <button type="submit" name="btnDeletaProd" class="btn" value="btnDeletaProd">DELETAR</button> 
                        </div>
                    </div> 
                </div>
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
    <script type="text/javascript" src="javascript/controleCadastroProd.js"></script>
</body>
</html>