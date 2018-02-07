if (navigator.userAgent.toLowerCase().indexOf('firefox') === -1) {
    window.onscroll = function () { movesearchbar(); };
}

var searchbar = document.getElementById("searchbar");

var gap = document.getElementById("gap");

function movesearchbar () {
    if (window.pageYOffset >= 90) {
        searchbar.style.position = "fixed";
        searchbar.style.left = "88px";
        gap.style.display = "block";
    } else {
        searchbar.style.position = "relative";
        searchbar.style.left = "0";
        gap.style.display = "none";
    }
}