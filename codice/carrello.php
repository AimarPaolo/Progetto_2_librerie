<?php
    include("aperturaSessioni.php");
    /*in questo caso utilizzo le variabili di sessione per variare dal progetto 1. Per la mail utilizzo l'ultima inserita dall'utente.
    Il carrello funzionerà e manterrà in memoria gli acquisti fino a quando non viene chiuso il browser. Può creare problemi in caso
    di erronea chiusura del browser (bisogna riselezionare tutti i biglietti) ma è sicuramente uno strumento più sicuro dei cookie
    in quanto non può essere modificato direttamente lato client*/  
    if(!isset($_SESSION["giornaliero"])){
        $_SESSION["giornaliero"] = 0;
    }
    if(!isset($_SESSION["pomeridiano"])){
        $_SESSION["pomeridiano"] = 0;
    }
    if(!isset($_SESSION["settimanale"])){
        $_SESSION["settimanale"] = 0;
    }
    if(!isset($_SESSION["stagionale"])){
        $_SESSION["stagionale"] = 0;
    }
    ?>
    <!DOCTYPE html>
    <html lang=it>
        <head>
            <meta charset="UTF-8">
            <title>Home page artesina</title>
            <meta name="author" content="Paolo Aimar">
            <meta name="keywords" content="html">
            <meta name="description" content="Pagina di acquisto dei biglietti">
            <!--in questo caso faccio un refresh della pagina ogni 600 sec per aggiornarla, non ha senso aggiornare molte volte questa pagina in quanto
            non ci sono dati che necessitano di aggiornare parecchie volte l'utente-->
            <meta http-equiv="refresh" content="600">
    <!--continuo ad utilizzare il css di skipass per non doverne creare un altro-->
            <link rel="stylesheet" href="../css/skipass.css">
            <script src="../javascript/news.js"></script>
        </head>
        <body>
            <div class="navbar">
                <a href="home.php">Home</a>
                <a href="news.html">Aggiornamenti impianti</a>
                <a href="skipass.php">Acquisto skipass</a>
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
                <a class="attiva" href="carrello.php">Carrello</a>
            </div> 
    <?php
    if (isset($_REQUEST['skipass']) && isset($_REQUEST['counter1'])) {
        if(!isset($_REQUEST['calendario'])){
            if(isset($_SESSION["calendario"])){
                if(isset($_SESSION["email"])){
                    $email = $_SESSION["email"];
                }elseif(isset($_REQUEST["email"])){
                    $_SESSION["email"] = trim($_REQUEST["email"]);
                    $email = $_SESSION["email"];
                }else{
                    echo "<p>Errore nell'email</p>";
                }
                $skipass = $_REQUEST['skipass'];
                $counter1 = intval($_REQUEST['counter1']); 
                if($skipass == "giornaliero"){
                    $_SESSION["giornaliero"] += $counter1;
                }elseif($skipass == "pomeridiano"){
                    $_SESSION["pomeridiano"] += $counter1;
                }elseif($skipass == "settimanale"){
                    $_SESSION["settimanale"] += $counter1;
                }elseif($skipass == "stagionale"){
                    $_SESSION["stagionale"] += $counter1;
                }
            }else{
                echo "<p>Alcuni parametri sono mancanti.</p>"; 
            }
        }else{
            if(isset($_SESSION["email"])){
                $email = $_SESSION["email"];
            }elseif(isset($_REQUEST["email"])){
                $_SESSION["email"] = trim($_REQUEST["email"]);
                $email = $_SESSION["email"];
            }else{
                echo "<p>Errore nell'email</p>";
            }
            $skipass = $_REQUEST['skipass'];
                $counter1 = intval($_REQUEST['counter1']); 
                $calendario = $_REQUEST['calendario'];

                if($skipass == "giornaliero"){
                    $_SESSION["giornaliero"] += $counter1;
                }elseif($skipass == "pomeridiano"){
                    $_SESSION["pomeridiano"] += $counter1;
                }elseif($skipass == "settimanale"){
                    $_SESSION["settimanale"] += $counter1;
                }elseif($skipass == "stagionale"){
                    $_SESSION["stagionale"] += $counter1;
                }
                //in questo caso setto il giorno del calendario ed impedisco all'utente di prenotare altri giorni fino a quando non preme sul 
                //pulsante prenota per un'altra data o chiude il browser e ritorna 
                $_SESSION["calendario"] = $calendario;
        }
                }
                $costo_giornaliero = $_SESSION["giornaliero"] * 33;
                $costo_pomeridiano = $_SESSION["pomeridiano"] * 21;
                $costo_settimanale = $_SESSION["settimanale"] * 150;
                $costo_stagionale = $_SESSION["stagionale"] * 800;
                echo "<div class=\"skipp\">";
                echo "<h3>Skipass acquistati al momento:</h3>";
                echo "<p>Giornaliero x " . $_SESSION["giornaliero"] . " = $costo_giornaliero €</p>";
                echo "<p>Pomeridiano x " . $_SESSION["pomeridiano"] . " = $costo_pomeridiano €</p>";
                echo "<p>Settimanale x " . $_SESSION["settimanale"] . " = $costo_settimanale €</p>";
                echo "<p>Stagionale x " . $_SESSION["stagionale"] . " = $costo_stagionale €</p>";
                echo "<div id=\"bold\">costo totale: ".($costo_giornaliero+$costo_pomeridiano+$costo_settimanale+$costo_stagionale)."€</div>";
                echo "</div>";
                
                if (isset($_SESSION["calendario"])) {
                    echo "<p>Data selezionata (che indica l'inizio di validità dello skipass): " . $_SESSION["calendario"] . "</p>";
                }
                if(isset($_SESSION["email"])){
                    $email = $_SESSION["email"];
                    echo "<p>Stai utilizzando l'email: $email</p>";
                }
                //non è necessario aggiungere un pulsante che riporti all'acquisto dello skipass in quanto esiste già presente 
                //nel navbar
            ?>
            <form action="skipass.php" method="get" name="form2" id="form2">
                <div>Accetto i termini e le condizioni <input type="checkbox" name="accetto" id="accetto" required></div>
                <input type="submit" name="acquista" id="acquista" value="acquista">
            </form>
        <footer>
            <div>Contatti: </div>
            <a href="mailto:info@artesina.it"><div>Email: info@artesina.it</div></a>
            <a href="callto:+390174242000"><div>Cellulare: +39 0174 242000</div></a>
        </footer>       
        </body>
    </html>
    
