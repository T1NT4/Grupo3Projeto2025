<nav>

    <div class="logo">
        <a href="index.php" class="logo"><img src="IMG/logo.svg" alt="" class="logo"></a>
    </div>
    <?php
    if (!isset($logado)){
        $logado = isset($_COOKIE['id_user']);
    }
    ?>
    <?php if($logado != true) { ?>
    <ul id="menuList">

        <div class="btn-login">
            <a href="login.php" class="login-btn"><button>LOGIN</button></a>
            <a href="register.php" class="enter-btn"><button>ENTRAR</button></a>
        </div>

    </ul>
    <?php }else{ ?>
    <ul id="menuList">
        <li><a href="index.php">Home</a></li>
        <li><a href="registerResiduos.php">Registro dos résiduos</a></li>
        <li><a href="relatorio.php">Relatório</a></li>
        <li><a href="user.php">Página do Usuário</a></li>
    </ul>
    <?php } ?>
    <div class="menu-icon">
        <i id="hamburger" class="fa-solid fa-bars" onclick="toggleMenu()"> <p>X</p></i>
    </div>

</nav>