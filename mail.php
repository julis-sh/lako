<?php

if(isset($_GET['send'])) {
    //Prepare
    $pdo = new PDO('mysql:host=192.168.1.113;dbname=mitglieder', 'mitglieder', '}t2+%ESatAQ4:)pV');

    $statement = $pdo->prepare("SELECT * FROM mitglieder WHERE email = :email");
    $result = $statement->execute(array('email' => $_POST['mail']));
    $Mitglied = $statement->fetch();

    //Mail
    $betreff = 'Deinen Einmal-Anmelde-Link für den Landeskongress 2021-IV der Jungen Liberalen Schleswig-Holstein e. V.';
    $empfaenger = $Mitglied['email'];
    include 'assets/mail/einmallinktemplate.php';
    $absender = "JuLis SH Office <noreply@julis-sh.de>";
    $header[] = 'MIME-Version: 1.0';
    $header[] = 'Content-type: text/html; charset=utf-8';
    $header[] = 'From:'.''.$absender.'';
    $header[] = 'X-Mailer: PHP/' . phpversion();
    mail($empfaenger, $betreff, $mailtext, implode("\r\n", $header));

    //LastID
    $sql = $pdo->prepare("SELECT * FROM mitglieder");
    $sql->setFetchMode(PDO::FETCH_ASSOC);
    $sql->execute();

    $last_id = $sql->fetchColumn();
}
?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset=utf-8>
        <meta name=viewport content="width=device-width, initial-scale=1.0">
        <title>Anmeldung - Landeskongress 2021-IV am 19. Dezember 2021 - Junge Liberale Schleswig-Holstein e. V.</title>
        <meta name=description content="Die Seite zum Landeskongress 2021-IV der JuLis SH" />
        <meta property=og:locale content="de_DE" />
        <meta property=og:image content="">
        <meta property=og:type content="website" />
        <meta property=og:title content="Die Seite zum Landeskongress 2021-IV der JuLis SH" />
        <meta property=og:description content="Die Seite zum Landeskongress 2021-IV der JuLis SH" />
        <meta property=og:url content="https://lako.julis-sh.de" />
        <meta property="og:site_name" content="Junge Liberale Schleswig-Holstein e. V." />
        <meta property="article:publisher" content="https://www.facebook.com/jungeliberalesh/" />
        <meta name=robots content="index, follow" />
        <meta name=googlebot content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
        <meta name=bingbot content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
        <meta name=twitter:card content=" summary_large_image" />
        <meta name=twitter:creator content="@JuLis_SH" />
        <meta name=twitter:site content="@JuLis_SH" />
        <meta name=twitter:image:src content= />
        <meta name=twitter:image:width content=1200 />
        <meta name=twitter:image:height content=630 />
        <link rel=canonical href="https://lako.julis-sh.de" />
        <link rel=stylesheet href="assets/css/style.css?v=1033322223">
        <link rel="apple-touch-icon" sizes="57x57" href="https://julis-sh.de/wp-content/themes/medienreaktor-wp-juli-1d09a92f4075/images/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="https://julis-sh.de/wp-content/themes/medienreaktor-wp-juli-1d09a92f4075/images/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="https://julis-sh.de/wp-content/themes/medienreaktor-wp-juli-1d09a92f4075/images/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="https://julis-sh.de/wp-content/themes/medienreaktor-wp-juli-1d09a92f4075/images/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="https://julis-sh.de/wp-content/themes/medienreaktor-wp-juli-1d09a92f4075/images/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="https://julis-sh.de/wp-content/themes/medienreaktor-wp-juli-1d09a92f4075/images/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="https://julis-sh.de/wp-content/themes/medienreaktor-wp-juli-1d09a92f4075/images/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="https://julis-sh.de/wp-content/themes/medienreaktor-wp-juli-1d09a92f4075/images/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="https://julis-sh.de/wp-content/themes/medienreaktor-wp-juli-1d09a92f4075/images/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="https://julis-sh.de/wp-content/themes/medienreaktor-wp-juli-1d09a92f4075/images/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="https://julis-sh.de/wp-content/themes/medienreaktor-wp-juli-1d09a92f4075/images/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="https://julis-sh.de/wp-content/themes/medienreaktor-wp-juli-1d09a92f4075/images/favicon-16x16.png">
    </head>
    <body class="bg-primary">
        <header>
            <div id="particles-js-prepare" class="slim">
                <div style="height:250px;" class="position-absolute container-fluid text-center d-flex justify-content-center align-items-center">
                    <a href="index.html" class="animation-1 reveal-1 anti-animation-blur">
                        <img class="back-click clickable-image" src="assets/img/arrow-back.svg" height="40">
                    </a>
                    <h2 class="d-block text-white text-uppercase text-center animation-1 reveal-1 anti-animation-blur text-break">
                        Anmeldung
                    </h2>
                </div>
            </div>
        </header>
        <main>
            <div class="container pb-5" style="margin-top:-8rem">
                <div class="col-12 col-md-8 offset-md-2">
                    <div class="card text-center h-100 animation-1 reveal-1 anti-animation-blur">
                        <div class="p-5">
                        <p>
                            Hier kannst du dich für den Landeskongress 2021-IV anmelden.<br>
                            Fülle dazu einfach das nachfolgende Formular aus.
                            Mit <b>(*)</b> markierte Felder sind Pflichtfelder.<br>
                            <br>
                            <b>Bitte beachte, dass dies eine 2G-Veranstaltung ist. Bitte bring unbedingt ein Impf- oder Genesennachweis mit zur Veranstaltung.</b>
                        </p>
                        </div>
                    </div>
                    <div class="card text-center h-100 mt-4 animation-2 reveal-3 anti-animation-blur">
                        <div class="p-5">
                            <form method="post" action="mail.php?send">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="mail" id="mail" placeholder="E-Mail Adresse" value="" required="">
                                    <label for="mail">E-Mail Adresse</label>
                                </div>
                            </div>
                        </div>
                        <div class="row p-3 animation-2 reveal-3 anti-animation-blur">
                            <div class="col-5 col-md-4">
                                <a href="index.html" class="btn w-100 btn-lg btn-light btn-skew btn-whitecyan btn-block shadow-lg zoomonhover-skew text-uppercase mt-4">
                                    Zurück
                                </a>
                            </div>
                            <div class="col-7 col-md-8">
                                <button type="submit" class="btn w-100 btn-lg btn-light btn-skew btn-whitecyan btn-block shadow-lg zoomonhover-skew text-uppercase mt-4">
                                    Absenden
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </main>
        <script type="text/javascript" src="/assets/js/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="/assets/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="/assets/js/lako.js"></script>
        <script type="module">
            import { defineCustomElements } from 'https://unpkg.com/@julis/web-ui@1.0.0/loader/index.js';
            defineCustomElements();
        </script>
    </body>
</html>