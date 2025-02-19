<nav>

    <div class="logo">
        <a href="" class="logo"><img src="IMG/logo.svg" alt="" class="logo"></a>
    </div>
    <?php
    if (!isset($logado)){
        $logado = false;
    }
    ?>
    <?php if($logado != true) { ?>
    <ul id="menuList">

        <div class="btn-login">
            <a href="" class="login-btn"><button>LOGIN</button></a>
            <a href="" class="enter-btn"><button>ENTRAR</button></a>
        </div>

    </ul>
    <?php }else{ ?>
    <ul id="menuList">
        <li><a href="">Home</a></li>
        <li><a href="">Registro dos résiduos</a></li>
        <li><a href="">Relatório</a></li>
    </ul>
    <?php } ?>
    <div class="menu-icon">
        <i class="fa-solid fa-bars" onclick="toggleMenu()"></i>
    </div>

</nav>