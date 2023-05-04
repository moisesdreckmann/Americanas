<?php
session_start();
require_once("componentes/header3.php");
?>

    <main class="mainCadastros">
        <section class="sectionLogin2">
            <h1><i class="fa-regular fa-circle-user"></i> login do cliente</h1>
            <p>veja seus pedidos de forma fácil, compre mais rápido e tenha uma experiência personalizada :&#41;</p>
            <form action="includes/logica.php" method="post" autocomplete="off" class="formLogin">   
                <input type="email" name="emailLogin" value="" maxlength="35" spellcheck = "false" placeholder="Digite seu e-mail" required class="formLogin__input">
                <div class="containerEyePass">
                    <input type="password" name="passLogin" value="" maxlength="10" spellcheck = "false" placeholder="Digite sua senha" required class="inputEyePass">
                    <i class="fa-solid fa-eye-slash"></i>
                </div>
                <a href="redefinir.php" target="_self" class="esqueceu">Esqueceu sua Senha?</a>
                <span class="spanMSG">
                <?php                              
                    if(isset($_SESSION['msg'])) {
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                ?>
                </span>

                <button type="submit" name="logar" class="redirecionaBtnlog" value="logar">logar</button>        
            </form>
            <span class="spanCadastro">Não tem conta? <a href="loginCadastro.php" class="spanCadastro2"><ins>Cadastre-se</ins></a></span>
            <div class="containerGoogleLogin">
                <p>ou</p>
                <div id="buttonDiv"></div> 
            </div>
        </section>
    </main>
    <footer>
            <img src="images/loja/logo2.png" alt="" class="logoImg2">
            <p>&copy; Réplica com todos os direitos reservados.</p>
    </footer>
    <script type="text/javascript" src="javascript/controleSenha.js"></script>
    <!--Google login js-->
    <script type="text/javascript" src="javascript/googleAPI.js"></script>
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <script src="https://unpkg.com/jwt-decode/build/jwt-decode.js"></script>
</body>
</html>