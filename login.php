    <!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="estilo.css">
    <script defer src="app.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>
    <?php
    include __DIR__."/header.php"
    ?>
    <script>
        let menuList = document.getElementById("menuList")
        menuList.style.maxHeight = "0px";

        function toggleMenu() {
            if (menuList.style.maxHeight == "0px") {

                menuList.style.maxHeight = "300px";

            } else {
                menuList.style.maxHeight = "0px";
            }
        }
    </script>
    <script src="https://kit.fontawesome.com/f8e1a90484.js" crossorigin="anonymous"> </script>



    <main>

        <div class="container">

            <img src="IMG/Black_White_Minimalist_Modern_Aesthetic_Initials_Font_Logo__1_-removebg-preview.png" alt=""
                class="image">
            <br><br>

            <div class="navbarlog">
                <div class="loguser">
                    <input type="text" name="text" id="" placeholder="username" class="inp-login">
                    <span class="fa-solid fa-user" id="usericon"></span>
                </div>
                <br>
                <div class="loguser">
                    <input type="text" name="text" id="" placeholder="senha" class="inp-login">
                    <span class="fa-solid fa-lock" id="paswicon"></span>
             
                </div>

            </div>

            </button><br><br>

            <button class="btn-enter">
                <p>LOGIN</p>
            </button>

        </div>
    </main>

</body>

</html>