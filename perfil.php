<?php
session_start();
require_once('componentes/header3.php');

if($_SESSION['logado'] == false) {
    header("location: index.php");
}
?>

    <main class="mainCadastros">
        <section class="sectionLogin2">
            <h1><i class="fa-regular fa-circle-user"></i> editar seu perfil</h1>
            <p>aqui você poderá editar suas informações :&#41;</p>

            <?php
            require_once("includes/functions.php");
            $array = array($_SESSION['codpessoa']);
            $query = "SELECT * FROM pessoas WHERE codpessoa = ?";
            $selecao = 0;
            $dado = listagem2($query, $array, $selecao);
            ?>

            <form action="includes/logica.php" method="post" autocomplete="off" class="formCadastro">
                <input type="hidden" name="codpessoaPerfil" value="<?php echo $dado['codpessoa'];?>">   
                <input type="text" name="alteranome" value="<?php echo $dado['nome'];?>" maxlength="35" spellcheck = "false" placeholder="Digite seu nome" class="formLogin__input">
                <input type="email" name="alteraemail" value="<?php echo $dado['email'];?>" maxlength="35" spellcheck = "false" placeholder="Digite seu e-mail" class="formLogin__input" required>

                <a href="redefinir.php" target="_self" class="esqueceu">Alterar sua Senha</a>

                <div class="containerAlteracaoConta">
                    <button type="submit" name="alterarConta" class="redirecionaBtncad btnAlterarPerfil" value="alterarConta">alterar conta</button>
                    <button type="submit" name="deletarConta" class="redirecionaBtnlog btnDeletarPerfil" value="deletarConta">deletar conta</button>
                </div>
            </form>
        </section>
    </main>
    <footer>
            <img src="images/loja/logo2.png" alt="" class="logoImg2">
            <p>&copy; Réplica com todos os direitos reservados.</p>
    </footer>
    <script type="text/javascript" src="javascript/controleSenha.js"></script>
</body>
</html>