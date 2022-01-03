<?php 
session_start();
$starttime = date_create("now");
include("./script/function.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/bootstrap.css">
    <title>Test</title>
</head>
<body>
    <?php include("./partial/_navBar.php"); ?>
    <div class="container">
        <h1>Page de tst Php</h1>
        <pre>
        Résultats php
        =======================================

            <?php 
            // fonctions
                // clarifier le code

                // faciliter la maintenabilité du code

                // factorisation

                // float, array, object, int, string, bool, void

                // function afficher($text){
                //     echo $text;
                // }
                // afficher("coucou");

                // function afficher($text){
                //         echo $text;
                //     }
                // function plus(float $value, float $value2): void
                // {
                //     $value += 50;
                //     $result = $value + $value2;
                //     // return $result;
                //     echo "$result";
                // }

                // $value = 4;
                // $value2 = 10;


                // $add =plus(3, 4);
                // // echo $add;
                // var_dump($value);

                // function maFonction(){
                //     echo "coucou, je viens de la fonction maFonction";
                // }

                // function addition(int $nombre1, int $nombre2): int
                // {
                //     return $nombre1 + $nombre2;
                // }

                // echo "je suis le programme";
                // maFonction();

                // $nombre1 = 10;
                // $nombre2 = 13;

                // $resultat = addition($nombre1, $nombre2);

                // echo "le résultat du calcul $nombre1 + $nombre2 = $resultat";

                // echo "<br>";

                // echo "voici la valeur du nombre 1: $nombre1";

                // echo "<br>";
                // =============================================
                // sotkage

            
            //     $tab = [
            //         "data1" => "data to save",
            //         "data2" => "next data",
            //         "data3" => "next data",
            //     ];
            // $jsonTab = json_encode($tab);
                //     // json_encode permet d'avoir un résultat json
                //     var_dump($jsonTab);
    
                //     $result = file_put_contents("./data/essai", $jsonTab);
                 // $result = file_get_contents("./data/essai");

            // //     $data = json_decode($jsonTab, true);

            //    
            //     

            //     var_dump($result);
                

            //  echo "<br>";
            ?>
         =======================================
        </pre>

        
        
    </div>
    

<script src="/JS/bootstrap.min.js"></script>
</body>
</html>