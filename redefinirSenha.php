<?php
require_once("includes/functions.php");
session_start();

if(isset($_GET['c']) and isset($_GET['d'])) {
    $codpessoa = $_GET['c'];
    $hash = $_GET['d'];
    $array = array($codpessoa);
    $query = "SELECT * FROM novasenha WHERE codpessoa = ?";
    $selecao = 0;
    $result = listagem2($query, $array, $selecao);
    if($codpessoa == $result['codpessoa']) {
        $array2 = array($result['codpessoa']);
        $query2 = "DELETE FROM novasenha WHERE codpessoa = ?";
        crud($query2, $array2); 
        require_once("componentes/header3.php");
?>

    <main class="mainCadastros">
        <section class="sectionLogin2">
            <h1><i class="fa-regular fa-circle-user"></i> alteração de senha</h1>
            <p>digite sua nova senha :&#41;</p>
            <form action="includes/logica.php" method="post" autocomplete="off" class="formLoginAlteracao">
                <input type="hidden" name="codeTemp" value="<?php echo $result['codpessoa'];?>">
                <div class="containerEyePass">
                    <input type="password" name="senhaNova" value="" maxlength="10" spellcheck = "false" placeholder="Digite sua senha" required class="inputEyePass">
                    <i class="fa-solid fa-eye-slash"></i>
                </div>
                <button type="submit" name="senhaAtualizada" class="redirecionaBtnlog" value="senhaAtualizada">alterar</button>        
            </form>
        </section>
    </main>
    <footer>
            <img src="images/loja/logo2.png" alt="" class="logoImg2">
            <p>&copy; Réplica com todos os direitos reservados.</p>
    </footer>
    <div class="fundoCinza"></div>
    <script type="text/javascript" src="javascript/controleSenha.js"></script>
</body>
</html>

<?php       
    }  else {
        $array2 = array($result['codpessoa']);
        $query2 = "DELETE FROM novasenha WHERE codpessoa = ?";
        crud($query2, $array2); 
        header("location: index.php");
    }
}
?>