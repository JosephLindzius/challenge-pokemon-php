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


document.getElementById("submit").addEventListener("click", function(){
    let pokemon = document.getElementById("input").value;
    console.log(pokemon);
    if (pokemon === "Jeroen-Jozef") {
        document.getElementById("id").innerText = "rijksnummer 56-45-43";
        var img = document.getElementById("sprite");
        img.src = "https://avatars3.githubusercontent.com/u/53226870?s=400&v=4";
        const moves = ['walk with stick', 'sleep', 'dance', 'wiggle', 'smoke', 'grow grey beard'];
        for (let i = 0; i < moves.length; i++) {
            document.querySelectorAll(".move")[i].innerText = moves[i];
        }

        document.getElementById("evolution").innerText = "Evolved from Baby Jeroen";
    }


    let pokemonInfo = [];
    axios.get("https://pokeapi.co/api/v2/pokemon/"+ pokemon +"/")
        .then(function(response) {
            pokemonInfo = response.data;
            console.log(pokemonInfo);
            const id = pokemonInfo.id;
            console.log(id);
            document.getElementById("name").innerText = pokemonInfo.name;
            document.getElementById("id").innerText = "ID: " + id;

            const sprite = document.getElementById("sprite");
            sprite.src = pokemonInfo.sprites.front_default;
           console.log(pokemonInfo.sprites)

        });
});