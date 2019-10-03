function playAnimation () {
    var searchWrapper = document.getElementById("searchWrapper");
    var nameBox = document.getElementById("pokemonWrapper");
    var deEvolvedBox = document.getElementById("deEWrapper");
    nameBox.animate([
        { opacity: '.9' },
        { opacity: '1' },
        { opacity: '.9' }
    ], {
        duration: 2000,
        iterations: Infinity
    });
    deEvolvedBox.animate([
        { opacity: '.9' },
        { opacity: '1' },
        { opacity: '.9' }
    ], {
        duration: 2000,
        iterations: Infinity
    });
    searchWrapper.animate([
        { opacity: '.9' },
        { opacity: '1' },
        { opacity: '.9' }
    ], {
        duration: 2000,
        iterations: Infinity
    });

}
playAnimation();

