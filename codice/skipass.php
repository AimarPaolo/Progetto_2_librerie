<?php
    include("aperturaSessioni.php");
    /*se accetto è selezionato vuol dire che ho fatto l'acquisto, allora elimino tutti i dati*/
    if(isset($_REQUEST["accetto"])){
        session_unset();
        session_destroy();
        $acquisto = true;
    }
?>
<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <title>Home page artesina</title>
        <meta name="author" content="Paolo Aimar">
        <meta name="keywords" content="html">
        <meta name="description" content="Pagina di acquisto dei biglietti">
        <!--in questo caso faccio un refresh della pagina ogni 600 sec per aggiornarla, non ha senso aggiornare molte volte questa pagina in quanto
        non ci sono dati che necessitano di aggiornare parecchie volte l'utente-->
        <meta http-equiv="refresh" content="600">
        <link rel="stylesheet" href="../css/skipass.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="../javascript/controllo_validita_skipass.js"></script>
    </head>
    <body>
    <div class="navbar">
        <a href="home.php">Home</a>
        <a href="news.html">Aggiornamenti impianti</a>
        <a class="attiva" href="skipass.php">Acquisto skipass</a>
        <!--definisco un identificato per attivare il dropdown in quanto esiste già una classe dichiarata-->
        <div class="dropdown">
            <button class="dropbtn">
                Esperienze
            </button>
            <div class="dropdown-content">
                <a href="attivita_estive.html">Estive</a>
                <a href="attivita_invernali.html">Invernali</a>
            </div>
        </div> 
        <a href="carrello.php">Carrello</a>
    </div> 
    <h1>Acquista il tuo skipass</h1>
    <?php
        if(isset($acquisto) && $acquisto == true){
            echo "<p class=\"successo\">biglietti acquistati correttamente</p>";
            $acquisto = false;
        }
    ?>
    <!--in questo caso è necessario controllare che la data inserita sia superiore a quella -->
    <form action="carrello.php" method="get" name="form1" id="form1" onsubmit="return validateForm('form1');">
            <?php
            if(isset($_SESSION["calendario"])){
                $data = $_SESSION["calendario"];
                echo "<div>continua a prenotare nella seguente data: $data</div>";
            }else{
                echo "<div>
            Seleziona il giorno in cui vuoi acquistare lo skipass: 
            <input type=\"date\" id=\"calendario\" name=\"calendario\">
            </div>";
            }
            ?>
        <div>
            Selezionare quanti biglietti si vogliono acquistare:
            <input type = "button" id="decrementa1" class="contatore" value="-" onclick="decrementValue('form1', 'counter1',-59.9);">
            <input type="text" id="counter1" name="counter1" value="0" readonly>
            <input type = "button" id="incrementa1" class="contatore" value="+" onclick="incrementValue('form1', 'counter1', 59.9);">
        </div>
        <img id="vista" src="../immagini/ski_places_artesina.jpeg" alt="artesina">
        <!--aggiungo un radio button per far selezionare all'utente il tipo di skipass che desidera ed applicarli in quel modo la tariffa
        corretta. Ci sono diverse tipologie di skipass -> giornaliero, pomeridiano, settimanale oppure stagionale-->
        <div class="tipi_skipass">
            <div class="acapo">
                <input type="radio" id="giornaliero" name="skipass" value="giornaliero" checked>
            <!--aggiungo il pulsante checked per essere sicuro che almeno una delle opzioni sia selezionata, in modo da non avere poi degli errori nella CONSEGNA
            dei valori nel form. Sarà poi necessario controllare che questi valori siano settati anche dal lato server in quanto non sappiamo se questi valori
            saranno -->
            <!--provo ad inserirli dentro ad un div per poi mandarli a capo ogni volta, non so se sia il modo più pulito di procedere, provare a chiedere al docente-->

                <label for="giornaliero">
                    Skipass Giornaliero: Valido per l'intera giornata dalle 8:00 alle 17:00. Perfetto per chi vuole sfruttare al massimo 
                    una giornata di sci. -> costo: 33 €
                </label>
            </div>
            <div class="acapo">
            <input type="radio" id="pomeridiano" name="skipass" value="pomeridiano">
                <label for="pomeridiano">
                    Skipass Pomeridiano: Valido dalle 12:00 alle 17:00. Ideale per chi preferisce sciare nel pomeriggio. -> costo: 21 €
                </label>
            </div>
            <div class="acapo">
            <input type="radio" id="settimanale" name="skipass" value="settimanale">
                <label for="settimanale">
                    Skipass Settimanale: Valido per 7 giorni consecutivi. La scelta migliore per chi pianifica una 
                    vacanza prolungata. -> costo: 150 €
                </label>
            </div>
            <div class="acapo">
            <input type="radio" id="stagionale" name="skipass" value="stagionale">
            <label for="stagionale">
                Skipass Stagionale: Valido per l'intera stagione sciistica. Per gli appassionati che vogliono godere della 
                neve ogni volta che desiderano. -> costo: 800 €
            </label>
            </div>
            <?php
            if(isset($_SESSION["email"])){
                $mail = $_SESSION["email"];
                echo "<p>Stai utilizzando già la mail: $mail</p>";
            }else{
            echo "<div class=\"txt_email\">
                <!--attraverso il metodo input type=email non è necessario effettuare un 
                controllo js per verificare che la mail inserita sia corretta 
                in quanto viene già segnalato automaticamente all'utente
                -->
                Inserisci la email: <input type=\"email\" name=\"email\" id=\"email\" placeholder=\"inserisci la mail...\" required>
            </div>";
            }
            ?>
        </div>
        <div>
            <input type="submit" id="consegna" name="consegna" value="aggiungi al carrello">
        </div>
    </form>
    <!--inserito un logo che, una volta premuto, riporta alla pagina home del sito, verrà inserito in tutte le altre pagine del sito 
    in modo da dare la possibilità agli utenti di riaccedere alla pagina senza utilizzare la nav bar-->
    <a href="home.php"><img id="logo" src="../immagini/logo.jpg" alt="caricamento logo artesina"></a>
    <footer>
        <div>Contatti: </div>
        <a href="mailto:info@artesina.it"><div>Email: info@artesina.it</div></a>
        <a href="callto:+390174242000"><div>Cellulare: +39 0174 242000</div></a>
    </footer>
    </body>
<html>