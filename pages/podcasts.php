<!DOCTYPE html>
<html>
        <head>
                <title>Podcasts - Web Music Studio</title>
                <link rel="stylesheet" type="text/css" href="../theme.css">
        </head>
        <body>
                 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
                <header>
                        <h1>WEB MUSIC STUDIO</h1>
                </header>

                <section>
                        <?php
                                include("../form/check_connexion.php");
                                include_once("../mysql.php");
                                if(check_connexion($bdd)) {
                        ?>

                        <div style="width: 800px; max-width: 100%; margin: auto; text-align: justify;">
                                <p>Bienvenue sur Web Music Studio, votre application de gestion de webradio. Vous pouvez gérer la diffusion automatique d'émission de la radio,
                                mais aussi utiliser le chat vocal pour travailler ou lancer un live sur la radio. Enfin vous pouvez aussi gérer les podcasts à diffuser
                                sur orb-replay.fr</p>
                                <p style="margin-top: 50px; text-align: center;">
                                        <h2>Gestion des podcasts de la webradio.</h2>
                                </p>
                        </div>

                        <?php
                                } else {
                                        echo "<meta http-equiv='refresh' content='0;/index.php'>Vous allez être redirigé si cela ne fonctionne pas cliquez <a href='/'>ici</a>";
                                }
                        ?>
                </section>

                <footer>
                        Ce site a été créé par Tony SCHMITT.
                </footer>

        </body>
</html>

