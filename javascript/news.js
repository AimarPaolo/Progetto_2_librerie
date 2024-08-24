// var slideIndex = 1;
// showDivs(slideIndex);

// function plusDivs(n) {
// //ogni volta che premo il pulsante > mi aggiunge 1 all'indice altrimenti -1 nel caso in cui io abbia premuto <
//   showDivs(slideIndex += n);
//   //questa funzione mi permette di prendere il valore del bottone e cambiare quindi l'indice dell'immagine
// }

// function showDivs(n) {
//   let i;
//   let x = document.getElementsByClassName("mySlides");
//   if (n > x.length) {slideIndex = 1}
//   if (n < 1) {slideIndex = x.length}
//   for (i = 0; i < x.length; i++) {
//     x[i].style.display = "none";  
//   }
//   x[slideIndex-1].style.display = "block";  
// }