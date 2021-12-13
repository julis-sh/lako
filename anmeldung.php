<?php
$pdo = new PDO('mysql:host=192.168.1.113;dbname=mitglieder', 'mitglieder', '}t2+%ESatAQ4:)pV');

$statement = $pdo->prepare("SELECT * FROM mitglieder WHERE mitgliedsnummer = :mitgliedsnummer");
$result = $statement->execute(array('mitgliedsnummer' => $_POST['mnr']));
$Mitglied = $statement->fetch();

$siteSuccess = false;



if(isset($_GET['send'])) {

    $vorname = $_POST['vorname'];
    $nachname = $_POST['nachname'];
    $adresse = $_POST['adresse'];
    $email = $_POST['email'];
    $telefon = $_POST['telefon'];
    $mobil = $_POST['mobil'];
    $geburtstag = $_POST['geburtstag'];
    $mitgliedschaft = $_POST['mitgliedschaft'];
    $kreisverband = $_POST['kreisverband'];
    $bezahlung = $_POST['bezahlung'];
    $essen = $_POST['essen'];
    $datenschutz = $_POST['datenschutz'];

    $statement = $pdo->prepare("INSERT INTO lakoTest (vorname, nachname, adresse, email, telefon, mobil, geburtstag, mitgliedschaft, kreisverband, bezahlung, essen, datenschutz) VALUES (:vorname, :nachname, :adresse, :email, :telefon, :mobil, :geburtstag, :mitgliedschaft, :kreisverband, :bezahlung, :essen, :datenschutz)");
    $statement->execute(array('vorname' => $vorname, 'nachname' => $nachname, 'adresse' => $adresse, 'email' => $email, 'telefon' => $telefon, 'mobil' => $mobil, 'geburtstag' => $geburtstag, 'mitgliedschaft' => $mitgliedschaft, 'bezahlung' => $bezahlung, 'essen' => $essen, 'kreisverband' => $kreisverband, 'datenschutz' => $datenschutz));

    $sql = $pdo->prepare("SELECT * FROM lakoTest");
    $sql->setFetchMode(PDO::FETCH_ASSOC);
    $sql->execute();

    $last_id = $sql->fetchColumn();

    include('qr/qrlib.php'); 

    $Name = 'Name: '. $vorname .' '. $nachname;
    $Sitzplatz = 'Sitzplatz: '. $last_id;
    $Zahlart = 'Bezahlung: '. $bezahlung;

    $QR = $Name .'

    '. $Sitzplatz .'

    '. $Zahlart;

    $betreff = 'Deine Anmeldung für den Landeskongress 2021-IV';
    $empfaenger = $email;
    include 'assets/mail/mailtemplate.php';
    $absender = "JuLis SH Office <noreply@julis-sh.org>";
    $header[] = 'MIME-Version: 1.0';
    $header[] = 'Content-type: text/html; charset=utf-8';
    $header[] = 'From:'.''.$absender.'';
    $header[] = 'X-Mailer: PHP/' . phpversion();

    mail($empfaenger, $betreff, $mailtext, implode("\r\n", $header));

    $siteSuccess = true;
    $siteMessage = 'Vielen Dank! Deine Anmeldung ist bei uns eingegangen. Du solltest in wenigen Minuten eine Anmeldebestätigung bekommen.';
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
                            <?php
                            if($siteSuccess == true) { ?>
                            <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">Erfolg</h4>
                            <p class="mb-0">
                            <?php echo $siteMessage; ?>
                            </p>
                            </div>
                            <?php }
                            ?>
                        </div>
                    </div>
                    <div class="card text-center h-100 mt-4 animation-2 reveal-3 anti-animation-blur">
                        <div class="p-5">
                            <form role="form" method="post" action="?send">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="vorname" id="vorname" placeholder="Vorname" value="" required="">
                                    <label for="vorname">Vorname (*)</label>
                                </div>
                                <div class="form-floating mt-3">
                                    <input type="text" class="form-control" name="nachname" id="nachname" placeholder="Nachname" value="" required="">
                                    <label for="nachname">Nachname (*)</label>
                                </div>
                                <div class="form-floating mt-3">
                                    <input type="adresse" class="form-control" name="adresse" id="adresse" placeholder="Straße Hausnummer, PLZ Ort" required="">
                                    <label for="adresse">Anschrift (*)</label>
                                </div>
                                <div class="form-floating mt-3">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="E-Mail Adresse" value="" required="">
                                    <label for="email">E-Mail Adresse (*)</label>
                                </div>
                                <div class="form-floating mt-3">
                                    <input type="text" class="form-control" name="telefon" id="telefon" placeholder="Telefonnummer" value="">
                                    <label for="telefon">Telefonnummer</label>
                                </div>
                                <div class="form-floating mt-3">
                                    <input type="text" class="form-control" name="mobil" id="mobil" placeholder="Mobilfunknummer" value="">
                                    <label for="mobil">Mobilfunknummer</label>
                                </div>
                                <div class="form-floating mt-3">
                                    <input type="text" class="form-control" name="geburtstag" id="geburtstag" placeholder="Geburtstag" value="" required="">
                                    <label for="geburtstag">Geburtstag (TT.MM.JJJJ) (*)</label>
                                </div>
                                <div class="form-floating mt-3">
                                    <select class="form-control" name="mitgliedschaft" id="mitgliedschaft" placeholder="Anmelden als" value="" required="">
                                        <option value="Gast">Gast</option>
                                        <option value="Mitglied">Mitglied</option>
                                    </select>
                                    <label for="mitgliedschaft">Anmelden als (*)</label>
                                </div>
                                <div class="form-floating mt-3">
                                    <select class="form-control" name="kreisverband" id="kreisverband" placeholder="Wähle deinen Kreisverband aus" value="" required="">
                                        <option value="kein-Kreis">keinen Kreis zugeordnet</option>
                                        <option value="Dithmarschen">Dithmarschen</option>
                                        <option value="Flensburg">Flensburg</option>
                                        <option value="Herzogtum-Lauenburg">Herzogtum-Lauenburg</option>
                                        <option value="Kiel">Kiel</option>
                                        <option value="Lübeck">Lübeck</option>
                                        <option value="Neumünster">Neumünster</option>
                                        <option value="Nordfriesland">Nordfriesland</option>
                                        <option value="Ostholstein">Ostholstein</option>
                                        <option value="Pinneberg">Pinneberg</option>
                                        <option value="Plön">Plön</option>
                                        <option value="Rendsburg-Eckernförde">Rendsburg-Eckernförde</option>
                                        <option value="Schleswig-Flensburg">Schleswig-Flensburg</option>
                                        <option value="Segeberg">Segeberg</option>
                                        <option value="Steinburg">Steinburg</option>
                                        <option value="Stormarn">Stormarn</option>
                                    </select>
                                    <label for="kreisverband">Kreisverband auswählen (*)</label>
                                </div>
                                <div class="form-floating  mt-3">
                                    <select class="form-control" name="bezahlung" id="bezahlung" placeholder="Ich bezahle ..." value="" required="">
                                        <option value="vor-Ort">vor Ort</option>
                                        <option value="lastschrift">als Lastschrift</option>
                                    </select>
                                    <label for="bezahlung">Ich bezahle ... (*)</label>
                                </div>
                                <div class="form-floating mt-3">
                                    <select class="form-control" name="essen" id="essen" placeholder="Ich esse ..." value="" required="">
                                        <option value="kein">kein Essen</option>
                                        <option value="currywurst">Currywurst</option>
                                        <option value="ofenkartoffel">Ofenkartoffel</option>
                                        <option value="ofenkartoffel-veggie">Ofenkartoffel vegetarisch</option>
                                    </select>
                                    <label for="essen">Ich esse ...(*)</label>
                                </div>
                                <div class="form-floating mt-3 ml-auto">
                                    <input type="hidden" name="datenschutz" value="Nein">
                                    <input type="checkbox" name="datenschutz" value="Ja" require>
                                    <span class="">Ich habe die <a href="https://www.julis-sh.de/datenschutz">Datenschutzhinweise</a> gelesen und bin damit einverstanden. (*)</label>
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
                                    Anmelden
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