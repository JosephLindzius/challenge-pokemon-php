<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function getData () {
    $pokemon = $_GET["name"];
    $json = file_get_contents("https://pokeapi.co/api/v2/pokemon/$pokemon/");
    $data = json_decode($json, true);
    return $data;
}

function getName () {
    $data = getData();
    return $data["name"];
}

function getID () {
    $data = getData();
    return $data["id"];
}

function getPictureURL () {
    $data = getData();
    $pictureArray = $data["sprites"];
    $srcPic = $pictureArray["front_default"];
    return $srcPic;
}

function getMoves () {
    $data = getData();
    $allMoves = [];
    $movements = $data["moves"];
    foreach ($movements as $item) {
        $name = $item["move"];
        $allMoves[] = $name["name"];
    }
    return $allMoves[array_rand($allMoves)];
}

function showMoves () {
    if (empty($_GET["name"])) {
        for ($i = 0; $i < 4; $i++) {
            echo "<div class='move'></div>";
        }

    } else {
        for ($i = 0; $i < 4; $i++) {
            echo "<div class='move'>";
            echo getMoves();
            echo "</div>";
        }
    }


}

function getPrevious () {
    $data = getData();
    $species = $data["species"];
    $speciesURL = $species["url"];
    $json1 = file_get_contents("$speciesURL");
    $data1 = json_decode($json1, true);
    $generationChecker = $data1["evolves_from_species"];
    return $generationChecker;
}

function showPreviousEvolution($_generationChecker) {
    if ($_generationChecker === null) {
        echo "<div id='evolution'>I'm a baby!</div>";
    } else {
        $devolve = $_generationChecker["name"];
        $json2 = file_get_contents("https://pokeapi.co/api/v2/pokemon/$devolve/");
        $data2 = json_decode($json2, true);
        $sprite = $data2["sprites"];
        $devolvePictureSource = $sprite["front_default"];
        echo "<div id='evolution'>$data2[name]</div>";
        echo "<img src='$devolvePictureSource' alt='picture of $data2[name]' id='de-evolved'>";
    }
}

 if (!empty($_GET["name"])) {
     $name = getName();
     $id = getID();
     $srcPic = getPictureURL();
     $generationChecker = getPrevious();
 } else {
     $name = "Pokedex 1.1";
     $id = '';
     $srcPic = "./assets/img/pokeball.png";
     $devolvePictureSource = "./assets/img/pokeball.png";
 }

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pokedex</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
<header id="header">
    <h1>Pokedex</h1>
</header>
<div id="masterWrapper">
    <div id="leftWrapper">
        <div id="lens2"></div>
        <div id="lens3"></div>
        <div id="lens4"></div>
        <div id="lens">
            <div id="lensFlare">
            </div>
        </div>
        <div id="left">
            <div id="searchWrapper">
                <form action='index.php' method='get'>
                    <input type='text' id='input' name='name'><input type='submit' id='submit' value='Search'>
                </form>
            </div>
            <div id="pictureRotate">
                <div class="rotateButton"></div>
                <div id="pokemonWrapper">

                    <div id="name"><?php echo $name ?></div>
                    <img src="<?php echo $srcPic ?>" alt="picture of <?php echo $name ?>" id="sprite">

                </div>
                <div class="rotateButton"></div>
            </div>
            <div id="extraWrapper">
                <div id="id"><?php echo $id ?></div>
            </div>
        </div>
    </div>
    <div id="rightWrapper">
        <div id="right">
            <div id="masterHinge">
                <div id="hinge">
                    <div id="topHinge"></div>
                    <div id="bottomHinge"></div>
                </div>
            </div>
            <div id="move-wrapper"><?php showMoves(); ?></div>
            <div id="deEWrapper" class="displayScreen">
                <?php
                   if ($name == "Pokedex 1.1") {
                             echo "<div style='text-align: center' class='evolution'></div>
                                   <img src='$devolvePictureSource' alt='pokeball' id='de-evolved'>";
                   } else {
                      showPreviousEvolution($generationChecker);
                   }
                ?>
            </div>
        </div>
    </div>
</div>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="./assets/js/animation.js"></script>
<script src="./assets/js/script.js"></script>
</body>
</html>
