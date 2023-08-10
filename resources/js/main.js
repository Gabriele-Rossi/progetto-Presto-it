

// Bottone Categorie SideBar

let btnLogo = document.querySelector('.btnLogo'); 
let arrow = document.querySelector ('.arrow');
let icon = document.querySelector('#icon'); 
let isRotate = false;


btnLogo.addEventListener('click', function(){

    if(!isRotate){
        arrow.style.width ='calc(100px - (7.5px)*2)'
        icon.style.transform = 'rotate(180deg)'
        icon.style.marginBottom = '7px'
        isRotate=true
    }else{
        arrow.style.width ='30px'
        icon.style.transform = 'rotate(0deg)'
        icon.style.marginBottom = '0px'
        isRotate=false
    }
    
    
});

// funzione carosello show.blade

let swiper = new Swiper(".mySwiper", {
    loop: true,
    spaceBetween: 10,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesProgress: true,
  });
  let swiper2 = new Swiper(".mySwiper2", {
    loop: true,
    spaceBetween: 10,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    thumbs: {
      swiper: swiper,
    },
  });

// Funzione sidebar

let advs = document.querySelectorAll("#adv");

advs.forEach((adv) => {
  setTimeout(function() {
    adv.style.display = "none";
  }, 3000);
});



//? ---------link navbar user e lingue-------------------------------- 

// Seleziona tutti gli elementi con la classe "user-custom"
let userCustomElements = document.querySelectorAll(".user-custom");

// Aggiungi l'evento di click a tutti gli elementi "user-custom"
userCustomElements.forEach(function(element) {
    element.addEventListener('click', function(event) {
        event.stopPropagation(); // Impedisce la propagazione dell'evento al documento
        if (this.style.background === '' || this.style.background === 'white') {
            this.style.background = '#59ab6e';
        } else {
            this.style.background = 'white';
        }
    });
});

// Aggiungi l'evento di click al documento per chiudere gli elementi quando si clicca fuori
document.addEventListener('click', function(event) {
    userCustomElements.forEach(function(element) {
        element.style.background = 'white'; 
    });
});

// Impedisci la chiusura quando si clicca all'interno degli elementi 
userCustomElements.forEach(function(element) {
    element.addEventListener('click', function(event) {
        event.stopPropagation();
    });
});

// ?---------------------------------------------------------------

