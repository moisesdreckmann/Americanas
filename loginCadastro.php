<?php
session_start();
require_once("componentes/header3.php");
?>

    <main class="mainCadastros">
        <section class="sectionLogin">
            <h1><i class="fa-regular fa-circle-user"></i> criar seu cadastro</h1>
            <p>veja seus pedidos de forma fácil, compre mais rápido e tenha uma experiência personalizada :&#41;</p>
            <form action="includes/logica.php" method="post" autocomplete="off" class="formCadastro" id="formCadastro" onsubmit="loading(event)">   
                <input type="text" name="nomeLog" value="" maxlength="35" spellcheck = "false" placeholder="Digite seu nome" class="formLogin__input" id="validaNome">
                <input type="email" name="emailLog" value="" maxlength="35" spellcheck = "false" placeholder="Digite seu e-mail" class="formLogin__input validaCampo">
                <div class="containerEyePass" id="validaEmail">
                    <input type="password" name="passLog" value="" maxlength="10" spellcheck = "false" placeholder="Digite sua senha" class="inputEyePass" id="senha1">
                    <i class="fa-solid fa-eye-slash"></i>
                </div>
                <div class="containerEyePass">
                    <input type="password" name="passLog2" value="" maxlength="10" spellcheck = "false" placeholder="Digite novamente sua senha" class="inputEyePass" id="senha2"> 
                </div>
                <div class="c-loading"></div>
                <span class="spanMSG" id="carrega2">
                <?php                            
                    if(isset($_SESSION['msg'])) {
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                ?>
                </span>
                <span class="spanMSG2"></span>
                <span class="spanMSG3"></span>
                <input type="hidden" name="cadastraLog" value="">
                <button type="submit" name="cadastraLog" class="redirecionaBtnlog" value="cadastraLog">cadastrar</button>
            </form>
        </section>
    </main>
    <footer>
            <img src="images/loja/logo2.png" alt="" class="logoImg2">
            <p>&copy; Réplica com todos os direitos reservados.</p>
    </footer>
    <script type="text/javascript" src="javascript/controleSenha.js"></script>
    <script type="text/javascript" src="javascript/validaForm.js"></script>
    <script type="text/javascript" src="javascript/ajax.js"></script>
</body>
</html>
