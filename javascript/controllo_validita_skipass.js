/*utilizzo use strict per avere un file che viene controllato in modo molto più ristretto (meno possibilità di errore sulla dichiarazione 
    delle variabili*/
"use strict";
function validateForm(f1){
    const form1 = document.getElementById(f1);
    let contatore = document.getElementById(f1).counter1.value;
    let data_acquistata = form1.calendario.value;
    /*controllo inoltre che l'utente abbia acquistato almeno un biglietto*/
    if(contatore == "" || contatore == 0){
        window.alert("Acquistare almeno un biglietto per procedere al carrello");
        return false;
    }
    if(data_acquistata == ""){
        window.alert("Prima di acquistare devi selezionare una data");
        return false;
    }
    /*creo un array date per prendere la data odierna (mi basta prendere il giorno anno e mese, non necessariamente anche altri dati*/
    const data_odierna = new Date();
    let giorno = data_odierna.getDate();
    let mese = data_odierna.getMonth();
    let anno = data_odierna.getFullYear();
    /*mi creo un array che prende la stringa e la divide in anno, mese, giorno ---> 0, 1, 2 */
    let array = form1.calendario.value.split("-")
    /*mi stampo un attimo il giorno per controllare che effettivamente i valori scelti siano quelli corretti */
    /*console.log(anno);
    console.log(giorno); 
    console.log(array[1]);*/
    /*Ora controllo che la data selezionata sia quella corretta e non sia già passata */7
    console.log(array[0]);
    console.log(anno);
    console.log(array[1]);
    console.log(mese);
    console.log(array[2]);
    console.log(giorno);
    if(parseInt(array[0]) < parseInt(anno)){
        window.alert("L'anno inserito è già passato, seleziona una data a partire da oggi.");
        return false;
    }else if(parseInt(array[1]) < parseInt(mese+1)){
        window.alert("L'anno inserito è corretto, ma non il mese. Controlla di aver inserito il mese corretto");
    }else if(parseInt(array[2]) < parseInt(giorno)){
        window.alert("Il giorno inserito è già passato, inseriscine un altro.")
        return false;
    }else{
        return true;
    }
}
function incrementValue(f1, idCounter, valore){
    const fo1 = document.getElementById(f1);
    let counterElem = document.getElementById(idCounter);
    let counter = document.getElementById(idCounter).value;
    document.getElementById(idCounter).value = parseInt(counter) + 1;
    let increment = parseFloat(valore);   
}

function decrementValue(f1, idCounter, valore){
    /*inserisco il controllo che decremento solo se il numero è maggiore di uno, in quanto non avrebbe comprare -1 biglietti...*/ 
    if(document.getElementById(idCounter).value == 0){
        return
    }
    /*utilizzo le variabili dichiarate come let in quanto più consistenti rispetto alle var*/
    let counter = document.getElementById(idCounter).value;
    document.getElementById(idCounter).value = parseInt(counter) - 1;
}