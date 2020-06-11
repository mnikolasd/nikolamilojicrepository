function cardReveal() {
    var regioni = document.getElementById("card1");
    var ulice = document.getElementById("card2");
    var adrese = document.getElementById("card3");
    
    if (regioni.style.display === "none") {
        ulice.style.display="none";
        adrese.style.display="none";
        regioni.style.display = "block";
    } else {
        regioni.style.display = "none";
    }
}

function cardRevea2() {
    var regioni = document.getElementById("card1");
    var ulice = document.getElementById("card2");
    var adrese = document.getElementById("card3");
    
    if (ulice.style.display === "none") {
        regioni.style.display="none";
        adrese.style.display="none";
        ulice.style.display = "block";
    } else {
        ulice.style.display = "none";
    }
} 

function cardRevea3() {
    var regioni = document.getElementById("card1");
    var ulice = document.getElementById("card2");
    var adrese = document.getElementById("card3");
    
    if (adrese.style.display === "none") {
        regioni.style.display="none";
        ulice.style.display="none";
        adrese.style.display = "block";
    } else {
        adrese.style.display = "none";
    }
}       