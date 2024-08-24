<?php
    $session = true;

    if(session_status()===PHP_SESSION_DISABLED){
        $session = false;        
    } elseif(session_status() !== PHP_SESSION_ACTIVE){
        session_start();
    }

    // Controllo che la lingua sia inserita, altrimenti mi setta utomaticamente la lingua in italiano
    if(isset($_REQUEST['lang']) && ($_REQUEST['lang']=='it' || $_REQUEST['lang']=='en')){
        $lang = $_SESSION['lang'] = $_REQUEST['lang'];
    } elseif( isset($_SESSION['lang'])){
        $lang = $_SESSION['lang'];
    } else {
        $lang = $_SESSION['lang'] = 'it';
    }

?>
<!DOCTYPE html>
<!--in questo caso inserisco una variabile di sessione per indicare se la pagina che sto visualizzando in questo momento è in italiano 
oppure in inglese-->
<html lang="<?php echo $lang?>">
    <head>
        <meta charset="UTF-8">
        <title>attività estive programmate</title>
        <meta name="author" content="Paolo Aimar">
        <!--in questo caso inserisco il php per dichiarare la lingua del documento-->
        <meta name="keywords" content="html">
        <meta name="description" content="Pagina di acquisto dei biglietti">
        <!--in questo caso faccio un refresh della pagina ogni 600 sec per aggiornarla, non ha senso aggiornare molte volte questa pagina in quanto
        non ci sono dati che necessitano di aggiornare parecchie volte l'utente-->
        <meta http-equiv="refresh" content="600">
        <link rel="stylesheet" href="../css/Home_ESP2.css">
    </head>
    <body>
    <?php
            if(!$session)
            {
                echo "<p>SESSIONI DISABILITATE, impossibile proseguire</p>";
            }
            else
            {
                if($lang == "it"){

        ?> 
        <div class="navbar">
            <!--In questo caso dichiaro una classe attiva in modo da cambiare ogni volta il colore e far capire in modo più chiaro all'utente
            in quale pagina si trova-->
            <!--utilizzo un menù per collegare le pagine, volendo si potevano anche utilizzare altri bottoni ma l'utente potrebbe rimanere 
            leggermente confuso. Meglio utilizzare oggetti più intuitivi che aiutino il cliente a capire come spostarsi-->
            <a  class="attiva"href="home.php">Home</a>
            <a href="news.html">Aggiornamenti impianti</a>
            <a href="skipass.php">Acquisto skipass</a>
            <div class="dropdown">
                <button class="dropbtn">Esperienze
                </button>
                <div class="dropdown-content">
                    <a href="attivita_estive.html">Estive</a>
                    <a href="attivita_invernali.html">Invernali</a>
                </div>
        </div>
        <a href="carrello.php">Carrello</a>
        <?php
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                <div>
                    <input type="submit" name="lang" value="it" id="lang">
                    <input type="submit" name="lang" value="en" id="lang">
                </div>
            </form>
    </div> 
    <h1>Home page Artesina</h1>
    <!--divido in paragrafi la pagina assegnando a quelli più particolari un capitoletto per aiutare e guidare l'utente nella lettura del sito-->
    <p id="introduzione">
    Artesina è una rinomata stazione sciistica situata nelle Alpi Marittime, nella regione del Piemonte, Italia. 
    Parte del comprensorio sciistico Mondolè Ski, che include anche Prato Nevoso e Frabosa Soprana, Artesina offre una vasta 
    gamma di attività sia per gli amanti degli sport invernali che per coloro che cercano altre forme di svago e divertimento in montagna. 
    Questa località incantevole è una meta ideale per famiglie, gruppi di amici e sportivi, grazie alla varietà di esperienze che può 
    offrire durante tutto l'anno.
    </p>
    <div class="immagine">
        <img id="forest_home" src="../immagini/forest_home.jpeg" alt="caricamento immagine bosco">
    </div>
    <h2>Sci e Snowboard</h2>
    <p>
    Artesina è particolarmente apprezzata dagli sciatori e snowboarder di tutti i livelli grazie alle sue piste ben curate e ai 
    moderni impianti di risalita. Il comprensorio Mondolè Ski offre oltre 130 chilometri di piste, di cui una parte significativa è
    situata ad Artesina. Le piste variano da quelle adatte ai principianti, con dolci pendii e ampie curve, a quelle più impegnative 
    per gli sciatori esperti, garantendo così divertimento e sfide per tutti. Le condizioni della neve sono generalmente ottime, 
    grazie anche all'efficace sistema di innevamento artificiale.
    </p>
    <h2>Servizi e Accolienza</h2>
    <p>
        Artesina offre anche una gamma completa di servizi per rendere il soggiorno confortevole e piacevole:
        <a class="link" href="https://www.booking.com/searchresults.it.html?ss=artesina&ssne=Sella+della+Turra&ssne_untouched=Sella+della+Turra&highlighted_hotels=9055831&efdco=1&label=New_Italian_IT_IT_21439071025-UNZN0NGydu*b2jBBcXOAlgS640938613103%3Apl%3Ata%3Ap1%3Ap2%3Aac%3Aap%3Aneg&sid=939ffecf1ef7632c3a6caa8bc5ec1b88&aid=318615&lang=it&sb=1&src_elem=sb&src=searchresults&dest_id=9055831&dest_type=hotel&ac_position=0&ac_click_type=b&ac_langcode=it&ac_suggestion_list_length=5&search_selected=true&search_pageview_id=28166932482600a9&ac_meta=GhAyODE2NjkzMjQ4MjYwMGE5IAAoATICaXQ6CGFydGVzaW5hQABKAFAA&group_adults=2&no_rooms=1&group_children=0">Hotel e appartamenti</a>: Diverse opzioni di alloggio, dagli hotel accoglienti agli appartamenti per famiglie.
        Ristoranti e rifugi: Ampia scelta di locali dove gustare la cucina tipica piemontese e piatti internazionali.
        Negozi di noleggio attrezzature: Tutto il necessario per sci e snowboard, oltre a attrezzature per altre attività sportive.
        Scuole di sci: Lezioni per tutte le età e livelli, con maestri qualificati.
    </p>
    <h2>Intrattenimento</h2>
    <p>
    Artesina organizza durante tutto l'anno una serie di eventi e manifestazioni che arricchiscono l'esperienza dei visitatori, 
    rendendo la località non solo un luogo per praticare sport, ma anche un centro di divertimento e socializzazione. 
    Gli eventi sono progettati per attrarre un pubblico variegato, dai più piccoli agli adulti, e includono attività culturali, 
    sportive e di intrattenimento che creano un'atmosfera vivace e coinvolgente.
    Durante la stagione invernale, Artesina si anima con numerosi appuntamenti che arricchiscono l'offerta sportiva. 
    Le competizioni sportive, sia per dilettanti che per professionisti, attirano partecipanti e spettatori da tutta la regione 
    e oltre.
    Le festività natalizie portano le strade e le piazze della località a riempirsi di luci e decorazioni, creando un’atmosfera 
    magica e festosa. Fiaccolate sugli sci, con suggestive discese notturne in cui i partecipanti sciano con torce accese, creano 
    un effetto visivo spettacolare lungo le piste innevate. Questi eventi sono spesso accompagnati da musica e fuochi d’artificio, 
    aggiungendo un tocco di meraviglia alle serate invernali.
    Durante l'estate, Artesina continua a essere un centro di attività grazie a una serie di eventi che valorizzano le bellezze naturali 
    e culturali della zona. Festival dedicati alla montagna includono escursioni guidate, workshop di fotografia naturalistica, laboratori 
    di botanica e incontri con esperti di fauna selvatica. Questi festival sono un’opportunità per scoprire la biodiversità locale e 
    apprendere tecniche di sopravvivenza in montagna. Gare di mountain bike, aperte a ciclisti amatoriali e professionisti, mettono alla 
    prova abilità e resistenza su percorsi che attraversano boschi e sentieri montani. Eventi gastronomici, come fiere e sagre, celebrano 
    i prodotti tipici del Piemonte, offrendo ai visitatori la possibilità di degustare specialità culinarie, assistere a showcooking 
    e partecipare a laboratori di cucina. Concerti e spettacoli all’aperto, organizzati in scenari naturali suggestivi, come i prati alpini
    o le rive dei laghi, offrono momenti di relax e divertimento sotto le stelle.
    Artesina pone grande attenzione alle famiglie, con una serie di attività dedicate ai bambini. 
    Club per bambini e animazione, attivi durante le vacanze scolastiche, organizzano attività giornaliere che includono giochi all’aperto, 
    laboratori creativi e cacce al tesoro. Animatori esperti intrattengono i più piccoli, permettendo ai genitori di godere di un po’ di 
    tempo libero. Spettacoli di magia e burattini incantano i bambini, offrendo spettacoli di intrattenimento che stimolano la loro 
    immaginazione e creatività. Laboratori educativi insegnano ai bambini nozioni sulla natura, l’ecologia e la sostenibilità attraverso 
    giochi e esperimenti pratici.
    </p>
    <!--inserito un logo che, una volta premuto, riporta alla pagina home del sito, verrà inserito in tutte le altre pagine del sito 
    in modo da dare la possibilità agli utenti di riaccedere alla pagina senza utilizzare la nav bar-->
    <a href="home.php"><img id="logo" src="../immagini/logo.jpg" alt="caricamento logo artesina"></a>
    <!--inserisco un footer per contattare la reception di artesina per avere informazioni-->
    <footer>
            <div>Contatti: </div>
            <a href="mailto:info@artesina.it"><div>email: info@artesina.it</div></a>
            <a href="callto:+390174242000"><div>telefono: +39 0174 242000</div></a>
    </footer>
    <?php
        }elseif ($lang == "en") {        
    ?>
        
    <div class="navbar">
        <!-- In this case, I declare an active class to change the color each time and make it clearer to the user
        on which page they are -->
        <!-- I use a menu to link the pages, other buttons could be used, but the user might get
        slightly confused. Better to use more intuitive objects that help the customer understand how to move -->
        <a  class="attiva" href="home.php">Home</a>
        <a href="news.html">Updates</a>
        <a href="skipass.php">Purchase Lift Tickets</a>
        <div class="dropdown">
            <button class="dropbtn">Experiences
            </button>
            <div class="dropdown-content">
                <a href="attivita_estive.html">Summer</a>
                <a href="attivita_invernali.html">Winter</a>
            </div>
        </div>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
            <div>
                <input type="submit" name="lang" value="it" id="lang">
                <input type="submit" name="lang" value="en" id="lang">
            </div>
        </form>
    </div> 
    <h1>Artesina Home Page</h1>
    <p>
    Artesina is a renowned ski resort located in the Maritime Alps, in the Piedmont region, Italy. 
    Part of the Mondolè Ski area, which also includes Prato Nevoso and Frabosa Soprana, Artesina offers a wide 
    range of activities for both winter sports enthusiasts and those seeking other forms of leisure and fun in the mountains. 
    This charming location is an ideal destination for families, groups of friends, and sports enthusiasts, thanks to the variety of experiences it can offer throughout the year.
    </p>
    <div class="immagine">
        <img id="forest_home" src="../immagini/forest_home.jpeg" alt="forest image loading">
    </div>
    <h2>Skiing and Snowboarding</h2>
    <p>
    Artesina is particularly popular with skiers and snowboarders of all levels thanks to its well-groomed slopes and 
    modern ski lifts. The Mondolè Ski area offers over 130 kilometers of slopes, a significant part of which is located 
    in Artesina. The slopes range from those suitable for beginners, with gentle slopes and wide curves, to more challenging 
    ones for experienced skiers, thus ensuring fun and challenges for everyone. The snow conditions are generally excellent, 
    thanks also to the efficient artificial snowmaking system.
    </p>
    <h2>Services and Hospitality</h2>
    <p>
        Artesina also offers a complete range of services to make your stay comfortable and enjoyable:
        <a class="link" href="https://www.booking.com/searchresults.it.html?ss=artesina&ssne=Sella+della+Turra&ssne_untouched=Sella+della+Turra&highlighted_hotels=9055831&efdco=1&label=New_Italian_IT_IT_21439071025-UNZN0NGydu*b2jBBcXOAlgS640938613103%3Apl%3Ata%3Ap1%3Ap2%3Aac%3Aap%3Aneg&sid=939ffecf1ef7632c3a6caa8bc5ec1b88&aid=318615&lang=it&sb=1&src_elem=sb&src=searchresults&dest_id=9055831&dest_type=hotel&ac_position=0&ac_click_type=b&ac_langcode=it&ac_suggestion_list_length=5&search_selected=true&search_pageview_id=28166932482600a9&ac_meta=GhAyODE2NjkzMjQ4MjYwMGE5IAAoATICaXQ6CGFydGVzaW5hQABKAFAA&group_adults=2&no_rooms=1&group_children=0">Hotels and Apartments</a>: Various accommodation options, from cozy hotels to family apartments.
        Restaurants and Refuges: A wide selection of places to enjoy typical Piedmontese cuisine and international dishes.
        Equipment Rental Shops: Everything you need for skiing and snowboarding, as well as equipment for other sports.
        Ski Schools: Lessons for all ages and levels, with qualified instructors.
    </p>
    <h2>Entertainment</h2>
    <p>
    Artesina organizes a series of events and shows throughout the year that enrich the visitors' experience, making the 
    resort not only a place for practicing sports but also a center for entertainment and socializing. 
    The events are designed to attract a diverse audience, from children to adults, and include cultural, sports, and entertainment activities that create a lively and engaging atmosphere.
    During the winter season, Artesina comes alive with numerous events that enhance the sports offer. 
    Sporting competitions, for both amateurs and professionals, attract participants and spectators from all over the region and beyond.
    The Christmas festivities fill the streets and squares of the resort with lights and decorations, creating a magical and festive atmosphere. 
    Torchlight ski descents, with participants skiing down illuminated slopes, create a spectacular visual effect along the snowy slopes. 
    These events are often accompanied by music and fireworks, adding a touch of wonder to winter evenings.
    During the summer, Artesina continues to be a hub of activity thanks to a series of events that showcase the natural and cultural beauties of the area. 
    Festivals dedicated to the mountains include guided hikes, nature photography workshops, botany labs, and encounters with wildlife experts. 
    These festivals are an opportunity to discover local biodiversity and learn survival techniques in the mountains. 
    Mountain bike races, open to both amateur and professional cyclists, test skills and endurance on paths that traverse forests and mountain trails. 
    Gastronomic events, such as fairs and festivals, celebrate Piedmontese specialties, offering visitors the chance to taste culinary delights, 
    attend cooking shows, and participate in cooking workshops. Outdoor concerts and performances, organized in picturesque natural settings such as alpine meadows or lake shores, 
    provide moments of relaxation and entertainment under the stars.
    Artesina pays great attention to families, with a range of activities dedicated to children. 
    Children's clubs and entertainment, active during school holidays, organize daily activities including outdoor games, creative workshops, 
    and treasure hunts. Experienced animators entertain the little ones, allowing parents to enjoy some free time. Magic shows and puppetry enchant children, 
    offering entertainment performances that stimulate their imagination and creativity. Educational workshops teach children about nature, ecology, and sustainability through games and practical experiments.
    </p>
    <a href="home.php"><img id="logo" src="../immagini/logo.jpg" alt="loading artesina logo"></a>
    <footer>
        <div>Contact: </div>
        <a href="mailto:info@artesina.it"><div>Email: info@artesina.it</div></a>
        <a href="callto:+390174242000"><div>Phone: +39 0174 242000</div></a>
    </footer>
        <?php
            }
    ?>
    <?php
            }
    ?>
    </body>
</html>

