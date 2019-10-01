

<?php
$pokemon = $_POST["name"];
// Takes raw data from the request
$json = file_get_contents("https://pokeapi.co/api/v2/pokemon/$pokemon/");

// Converts it into a PHP object
$data = json_decode($json, true);

//var_dump($data);


echo "<hr>";
echo $data[id];
echo "<hr>";
echo $data[name];
echo "<hr>";
$pictureArray = $data[sprites];
$srcPic = $pictureArray[front_default];
echo "<img src=$srcPic>";
echo "<hr>";
$movements = $data[moves];

//var_dump($movements);

foreach ($movements as $item) {
    $name = $item[move];
    //echo $name;
     echo "$name[name]";
           echo "<br>";
  //  for ($i = 0; $i < 4; $i++) {

   // }
}

/*
 pokemonInfo.moves.forEach(function(move){
                moveNames.push(move.move.name);
            });
            for (var i = 0; i < 4; i++) {
                var removedMove = moveNames.splice(getRandomIndex(moveNames), 1);
                document.querySelectorAll('.move')[i].innerText = removedMove;
            }