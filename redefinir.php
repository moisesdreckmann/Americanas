<?php
require_once("componentes/header3.php");
?>
    <main class="mainCadastros">
        <section class="sectionLogin2">
            <h1><i class="fa-regular fa-circle-user"></i> alteração de senha</h1>
            <p>digite seu e-mail para alterar sua senha</p>
            <form action="includes/logica.php" method="post" autocomplete="off" class="formLoginAlteracao" onsubmit="loading(event)">   
                <input type="email" name="emailTrocarSenha" value="" maxlength="35" spellcheck = "false" placeholder="Digite seu e-mail" required class="formLogin__input">
                <div class="c-loading"></div>
                <span class="spanMSG" id="carrega2">
                <?php   
                session_start();                           
                    if(isset($_SESSION['msg10'])) {
                        echo $_SESSION['msg10'];
                        unset($_SESSION['msg10']);
                    }
                ?>
                </span>
                <input type="hidden" name="trocarSenha" value="">
                <button type="submit" name="trocarSenha" class="redirecionaBtnlog" value="trocarSenha">enviar</button>        
            </form>
        </section>
    </main>
    <footer>
            <img src="images/loja/logo2.png" alt="" class="logoImg2">
            <p>&copy; Réplica com todos os direitos reservados.</p>
    </footer>
    <div class="fundoCinza"></div>
    <script type="text/javascript" src="javascript/ajax.js"></script>
</body>
</html>