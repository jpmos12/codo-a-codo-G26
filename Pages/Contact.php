<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>SPARTA</title>
        <meta name="description" content="GRID ">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../Img/logo.png"/>
        <link rel="stylesheet" href="../Css/contactPage.css">
        <link rel="stylesheet" href="../Css/bootstrap.min.css" >
        <script src="../Process/JS/sendEmail.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
        <header class="header">
            <?php
                include './Menu.html';
            ?>
        </header>
        <section class="form">
            <div class="container-fluid">
                <div class="col-md-12">
                    <h2>
                        Contáctanos
                    </h2>
                    <p>
                        Somos tu mejor opción para cotizar sobre ropa deportiva, déjanos tus datos y se te contactará, además, se te enviará un PDF con nuestro catálogo.
                    </p>
                    <div class="row">
                        <div class="col-md-10">
                            <form id="formEmail">
                                <!--<form role="form" method="post" action="../Process/PHP/sendEmail.php" id="formEmail">-->
                                <div class="form-group">
                                    <label for="exampleInputName">
                                        Nombre:
                                    </label>
                                    <input type="text" class="form-control" name="txtName" id="txtName" required="">

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputLastName">
                                        Apellido:
                                    </label>
                                    <input type="text" class="form-control" name="txtLastName" id="txtLastName" required="">

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">
                                        Correo Eletrónico:
                                    </label>
                                    <input type="email" class="form-control" name="txtEmail" id="txtEmail" required="">
                                </div>
                                <div class="form-group">
                                    <label for="floatingTextarea">Mensaje:</label>
                                    <textarea class="form-control" placeholder="Déjanos saber que te interesa..." name="txtArea" id="txtArea"></textarea>

                                </div>
                                </div-->
                                <div class="d-flex justify-content-center">
                                    <div class="spinner-border" role="status" id="cargando" style="display: none">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-outline-info" id="btnSend" onclick="recibir()">
                                    Enviar
                                </button>
                            </form>
                            <div id="escribir"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="carrusel">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h2>
                            Más buscados
                        </h2>
                        <p>
                            Aquí pueden observar unas fotos de nuestros productos más buscados.
                        </p>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="carousel slide" id="carousel-101527">
                                    <ol class="carousel-indicators">
                                        <li data-slide-to="0" data-target="#carousel-101527">
                                        </li>
                                        <li data-slide-to="1" data-target="#carousel-101527" class="active">
                                        </li>
                                        <li data-slide-to="2" data-target="#carousel-101527">
                                        </li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="carousel-item">
                                            <img class="d-block w-100" alt="Carousel Bootstrap First" src="../Img/Banner/3.jpg">
                                            <div class="carousel-caption">
                                                <h4>
                                                    Ropa para mujer
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" alt="Carousel Bootstrap Second" src="../Img/Banner/6.jpg">
                                            <div class="carousel-caption">
                                                <h4>
                                                    Ropa para hombre
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" alt="Carousel Bootstrap Third" src="../Img/Banner/4.jpg">
                                            <div class="carousel-caption">
                                                <h4>
                                                    La mejor calidad del mercado
                                                </h4>
                                            </div>
                                        </div>
                                    </div> <a class="carousel-control-prev" href="#carousel-101527" data-slide="prev"><span class="carousel-control-prev-icon"></span> <span class="sr-only">Previous</span></a> <a class="carousel-control-next" href="#carousel-101527" data-slide="next"><span class="carousel-control-next-icon"></span> <span class="sr-only">Next</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
            include './FooterForm.html';
        ?>

        <script src="../JS/jquery.min.js"></script>
        <script src="../JS/bootstrap.min.js"></script>
        <script src="../JS/scripts.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    </body>
</html>

