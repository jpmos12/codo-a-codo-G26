<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>SPARTA</title>
        <meta name="description" content="GRID ">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../Img/logo.png"/>
        <link rel="stylesheet" href="../Css/menu.css">
        <link rel="stylesheet" href="../Css/products.css">
    </head>
    <body>
        <header class="header">
            <?php
            include './Menu.html';
            ?>
        </header>
        <h1>Productos Más Vendidos</h1>

        <section class="product-grid">
            <div class="product" class="animated">
                <img src="../Img/productos/producto1.jpeg" alt="Producto 1" class="animated">
                <h3 class="animated">Camiseta Deportiva</h3>
                <p>Idel para esos días de ejercicio.</p>
                <p class="price">$19.99</p>
            </div>
            <div class="product" class="animated">
                <img src="../Img/productos/producto2.jpeg" alt="Producto 2" class="animated">
                <h3 class="animated">Pantalones Deportivos</h3>
                <p>Short liviano de 3" de largo con ruedo curvo y cordón de ajuste en la cintura.
                </p>
                <p class="price">$19.99</p>
            </div>
            <div class="product">
                <img src="../Img/productos/producto3.png" alt="Producto 3" class="animated">
                <h3 class="animated">Medias Deportivas</h3>
                <p>Ajuste perfecto, lo que andas buscando para rendir mejor.</p>
                <p class="price">$9.99</p>
            </div>
            <div class="product" class="animated">
                <img src="../Img/productos/producto4.png" alt="Producto 4" class="animated">
                <h3 class="animated">Camiseta Selección Argentina.</h3>
                <p>Camiseta utilizada en el mundial de Qatar 2022</p>
                <p class="price">$79.99</p>
            </div>
            <div class="product" class="animated">
                <img src="../Img/productos/producto5.avif" alt="Producto 5" class="animated">
                <h3 class="animated">Guantes Puma</h3>
                <p>Perfectos para la práctica del fútbol, excelente agarre.</p>
                <p class="price">$39.99</p>
            </div>
            <div class="product" class="animated">
                <img src="../Img/productos/producto6.png" alt="Producto 5" class="animated">
                <h3 class="animated">Tacos Adidas</h3>
                <p>Si querés lucir genial, estos tacos son ideales.</p>
                <p class="price">$59.99</p>
            </div>
            <div class="product" class="animated">
                <img src="../Img/productos/producto7.jpg" alt="Producto 5" class="animated">
                <h3 class="animated">Camiseta Costa Rica</h3>
                <p>Camiseta del país más feliz del mundo.</p>
                <p class="price">$89.99</p>
            </div>
            <div class="product" class="animated">
                <img src="../Img/productos/producto8.webp" alt="Producto 5" class="animated">
                <h3 class="animated">Balón Qatar 2022</h3>
                <p>Ya sea para usarlo o para colección, este balón es perfecto.</p>
                <p class="price">$49.99</p>
            </div>
            <!-- Agrega más productos aquí -->
        </section>   

        <footer class="footerProducts">       
            <?php
            include './FooterProducts.html';
            ?>
        </footer>

    </body>
</html>
