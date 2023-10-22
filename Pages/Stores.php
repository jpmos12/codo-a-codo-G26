<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>SPARTA</title>
        <meta name="description" content="GRID ">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../Img/logo.png"/>
        <link rel="stylesheet" href="../Css/menu.css">
        <link rel="stylesheet" href="../Css/stores.css">
    </head>
    <body>
        <header class="header">
            <?php
            include './Menu.html';
            ?>
        </header>
        <section class="infoStore">
            <h1>Nuestras tiendas</h1>
            <p>
                ¡Buscá tu tienda más cercana!
            </p>
            <p>
            <ul>
                <li class="li">Luján 1445, B1889HYK Bosques, Provincia de Buenos Aires</li>
                <li class="li">Pablo Podestá 1602-1650, B1889HBN Bosques, Provincia de Buenos Aires</li>
                <li class="li">Av. Hipólito Yrigoyen 2563, B1618 El Talar, Provincia de Buenos Aires</li>
            </ul>
        </p>
        <p>Comprá en 12 cuotas sin interés con todas las tarjetas en nuestra Tienda Online. Conocé las prendas favoritas de la nueva colección en Sparta. <b>¡Comprá online hoy!</b></p>
    </section>

    <section class="map">
        <iframe id="iframe" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d419642.8460831864!2d-58.6016509!3d-34.7440102!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95a32848d9ab0a6f%3A0xcdf4d496eaa4d73a!2sSparta!5e0!3m2!1ses!2sar!4v1697057207078!5m2!1ses!2sar" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
    <?php
        include './FooterStore.html';
    ?>
</body>
</html>

