<?php
session_start();
if($_SESSION['logado'] == false) {
    header("location: index.php");
}
require_once("componentes/header3.php");
?>

    <main class="mainCarrinho">
        <section class="sectionCarrinho">
            <div class="containerFinalizarCompra">        
                <div class="containerVazio">
                    <p>Obrigado por comprar conosco! <i class="fa-regular fa-face-smile"></i> O produto chegará em breve em sua casa.</p><br>
                </div>         
            </div>
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