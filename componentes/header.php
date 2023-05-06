<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/loja/favicon.ico" type="image/x-icon">
    <link rel="preload" as="style" href="estilo/estilo.css" media="all">
    <link rel="stylesheet" href="estilo/estilo.css" media="all">
    <link rel="stylesheet" href="fonts/css/all.css">
    <link rel="stylesheet" href="estilo/estilo930.css" media="screen and (max-width: 930px)">
    <link rel="stylesheet" href="estilo/estilo800.css" media="screen and (max-width: 800px)">
    <link rel="stylesheet" href="estilo/estilo600.css" media="screen and (max-width: 600px)">
    <link rel="stylesheet" href="estilo/estilo480.css" media="screen and (max-width: 480px)">
    <title>Americanas</title>
</head>
<body class="bodyindex">
    <header class="header">
        <div class="containerLogoImg">
            <a href="index.php"><img src="images/loja/logo1.png" alt="" class="logoImg"></a>
        </div>

        <div class="boxBuscador">
            <form action="index.php" method="post" autocomplete="off">
                <div class="containerBuscador">
                    <input type="text" value="<?php if(isset($_POST['btnBuscador'])) echo $_POST['buscador'];?>" name="buscador" placeholder="busque aqui seu produto" class="buscador" spellcheck="false" onkeyup="buscar(event)">
                    <label for="btnbusca"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></label>
                    <button type="submit" name="btnBuscador" value="btnBuscador" id="btnbusca"></button>
                </div>
            </form>
        </div>
        <div class="divLogin">
           <div class="divTextoLogin">
                <i class="fa-regular fa-circle-user"></i>
                <span>Olá, faça seu login ou cadastre-se <i class="fa-solid fa-angle-down"></i></span>
                <div class="divSub-login">
                    <p>pra ver seus pedidos e ter uma experiência personalizada, acesse sua conta :&#41;</p>
                    <a href="login.php" target="_self">
                        <button type="click" name="redirecionaLog" class="redirecionaBtnlog" value="redirecionaLog">entrar</button>
                    </a>
                    <a href="loginCadastro.php" target="_self">
                        <button type="click" name="redirecionaCad" class="redirecionaBtncad" value="redirecionaCad">cadastrar</button>
                    </a>
                </div>
           </div>
        </div>
        <div class="divShop"> 
            <a href="carrinho.php"><i class="fa-sharp fa-solid fa-cart-shopping">
            <span class="quantidadeItens" id="carrega3">
                <?php if(isset($_SESSION['quantidadeTotal'])) {
                    echo $_SESSION['quantidadeTotal'];
                } else {
                    echo $_SESSION['quantidadeTotal'] = 0;
                }
                ?>
            </span></i></a>
        </div>
    </header>
    
    <nav class="navigator">
        <div class="navHamburguer">
            <span><i class="fa-solid fa-bars"></i></span>
            <span>menu</span>
            <span><i class="fa-solid fa-chevron-down spanSeta"></i></span>
        </div>       
        <ul type="none" class="menu">
            <li class="menuli">celulares
                <ul type="none" class="submenu">
                    <li><img src="images/menu/celulares.webp" alt="imagem de celular" class="imageMenu"></li>
                    <li><a href="#">smartphones</a></li>
                    <li><a href="#">iphones</a></li>
                    <li><a href="#">tecnologia 5g</a></li>
                    <li><a href="#">acessórios pra celular</a></li>
                    <li><a href="#">peças pra celular</a></li>
                </ul>
            </li>
            <li class="menuli">eletrodomésticos
                <ul type="none" class="submenu">
                    <li><img src="images/menu/eletro.webp" alt="imagem de eletrodomestico" class="imageMenu"></li>
                    <li><a href="#">aquecedores</a></li>
                    <li><a href="#">geladeira</a></li>
                    <li><a href="#">máquina de lavar</a></li>
                    <li><a href="#">fogão</a></li>
                    <li><a href="#">microondas</a></li>
                </ul type="none">
            </li>
            <li class="menuli">informática
                <ul type="none" class="submenu">
                    <li><img src="images/menu/informatica.webp" alt="imagem de informatica" class="imageMenu"></li>
                    <li><a href="cat_notebooks.php" target="_self">notebook</a></li>
                    <li><a href="#">notebook gamer</a></li>
                    <li><a href="#">computador</a></li>
                    <li><a href="#">computador gamer</a></li>
                </ul>
            </li>
            <li class="menuli">smart tv
                <ul type="none" class="submenu">
                    <li><img src="images/menu/tv.webp" alt="imagem de televisao" class="imageMenu"></li>
                    <li><a href="#">smart tv</a></li>
                    <li><a href="#">home theater</a></li>
                    <li><a href="#">acessórios pra tv</a></li>
                </ul>
            </li>
            <li class="menuli">movéis
                <ul type="none" class="submenu submenu5">
                    <li><img src="images/menu/moveis.webp" alt="imagem de móvel" class="imageMenu"></li>
                    <li><a href="#">armário</a></li>
                    <li><a href="#">sofá</a></li>
                    <li><a href="#">cama</a></li>
                    <li><a href="#">cadeira de escritório</a></li>
                    <li><a href="#">mesa</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <nav class="navigator2">
        <div class="navHamburguer2">
            <span><i class="fa-solid fa-bars"></i></span>
            <span>menu</span>
            <span><i class="fa-solid fa-chevron-down spanSeta"></i></span>
        </div>       
        <ul type="none" class="menu2">
            <li class="menuli2"><p>celulares</p>
                <ul type="none" class="submenu2">
                    <li><a href="#">smartphones</a></li>
                    <li><a href="#">iphones</a></li>
                    <li><a href="#">tecnologia 5g</a></li>
                    <li><a href="#">acessórios pra celular</a></li>
                    <li><a href="#">peças pra celular</a></li>
                </ul>
            </li>
            <li class="menuli2"><p>eletrodomésticos</p>
                <ul type="none" class="submenu2">
                    <li><a href="#">aquecedores</a></li>
                    <li><a href="#">geladeira</a></li>
                    <li><a href="#">máquina de lavar</a></li>
                    <li><a href="#">fogão</a></li>
                    <li><a href="#">microondas</a></li>
                </ul type="none">
            </li>
            <li class="menuli2"><p>informática</p>
                <ul type="none" class="submenu2">
                    <li><a href="cat_notebooks.php" target="_self">notebook</a></li>
                    <li><a href="#">notebook gamer</a></li>
                    <li><a href="#">computador</a></li>
                    <li><a href="#">computador gamer</a></li>
                </ul>
            </li>
            <li class="menuli2"><p>smart tv</p>
                <ul type="none" class="submenu2">
                    <li><a href="#">smart tv</a></li>
                    <li><a href="#">home theater</a></li>
                    <li><a href="#">acessórios pra tv</a></li>
                </ul>
            </li>
            <li class="menuli2"><p>movéis</p>
                <ul type="none" class="submenu2">
                    <li><a href="#">armário</a></li>
                    <li><a href="#">sofá</a></li>
                    <li><a href="#">cama</a></li>
                    <li><a href="#">cadeira de escritório</a></li>
                    <li><a href="#">mesa</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <div class="banner">
        <picture>
            <source media="(max-width: 480px)" srcset="images/carousel/banner2.png" type="image/png" class="bannerImgPequeno">
            <source media="(max-width: 700px)" srcset="images/carousel/banner3.png" type="image/png" class="bannerImgMedio">
            <img src="images/carousel/banner.webp" alt="banner de compras" class="bannerImgGrande">         
        </picture>
    </div>

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/carousel/carousel2.webp" class="d-block w-100" alt="">
            </div>
            <div class="carousel-item">
                <img src="images/carousel/carousel3.webp" class="d-block w-100" alt="">
            </div>
            <div class="carousel-item">
                <img src="images/carousel/carousel1.webp" class="d-block w-100" alt="">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>