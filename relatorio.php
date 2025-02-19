<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RELATÓRIO</title>
    <link rel="stylesheet" href="estilo.css">
    <script defer src="app.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>

    
    <?php
    include __DIR__ . "/header.html";
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


   
      <!-- Thigas vai fazer o listar aqui  -->
  
</body>

</html>