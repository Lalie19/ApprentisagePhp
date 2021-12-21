<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/bootstrap.css">
    <title>Mon site</title>
</head>
<body>
    <?php include("./partial/_navBar.php"); ?>
    <h1>Exercice 4</h1>
    <h5>1- créer une <a href="https://www.latoilescoute.net/table-de-vigenere" target="_blank">table de vigenère</a></h5>

    <?php
    // tableau
    $alpha = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $alphaTab = str_split($alpha);
    $doubleTab = array_merge($alphaTab,$alphaTab);

    $sizealpha = count($alphaTab); 

    for ($i = 0; $i < $sizealpha; $i++){
      for ($x = 0; $x < $sizealpha; $x++){
        $line = $alphaTab[$i];
        $column = $alphaTab[$x];
        $tab[$line][$column] = $doubleTab[$i + $x];
        }
    }
      // var_dump(array());

      // echo"Voici le tableau de vigenère<br><br>";
      // print_r($tab); echo"<br><br>";
      ?>
      <h5>2- encode le message "APPRENDRE PHP EST UNE CHOSE FORMIDABLE" avec la clé "BACKEND"</h5>
    // encoder
    <?php
    $message = "TWAPEEWM";
    $key = "VIGENERE";

    $messageTab = str_split($message);
    $keyTab = str_split($key);
    $keySize = count($keyTab);

    $keyCounter = 0;

       foreach ($messageTab as $letterToEncode){
       $positionKeyLetter = $keyCounter % $keySize;
       $keyLetter = $keyTab[$positionKeyLetter];
       $encodedMessage[] = $tab[$keyLetter][$letterToEncode];
       print_r("letterToEncode = ".$letterToEncode." keyLetter = ".$keyLetter. " ---- resultat = ".$tab[$keyLetter][$letterToEncode]."<br>");
       $keyCounter++;
       } 
    echo "<br>";
    $cryptedMessage = implode($encodedMessage);

    // ENCODER SIMPLE
    // $message = "BONJOUR";
    // $key = "SCOOTER";

    // // $message = "TWAPEEWM";
    // // $key = "VIGENERE";

    // $messageTab = str_split($message);
    // $keyTab = str_split($key);
    // $keySize = count($keyTab);

    // $keyCounter = 0;
    
    // foreach ($messageTab as $letterToEncode){
    // $positionKeyLetter = $keyCounter ;
    // $keyLetter = $keyTab[$positionKeyLetter];
    // $encodedMessage[] = $tab[$keyLetter][$letterToEncode];
    // print_r("letterToEncode = ".$letterToEncode." keyLetter = ".$keyLetter. " ---- resultat = ".$tab[$keyLetter][$letterToEncode]."<br>");
    // $keyCounter++;
    // } 
    // echo "<br>";
    // $cryptedMessage = implode($encodedMessage);
    // ?>
    <p>le message est : <?php echo $message; ?></p>
    <p>la clé est : <?php echo $key ?></p>
    <p>le résultat est : <?php echo $cryptedMessage; ?></p>
    <h5>3- decoder le message "TWA PEE WM TESLH WL LSLVNMRJ" avec la clé "VIGENERE"</h5>
    <?php
    // decoder
    // $encodedMessage2 = "TWA PEE WM TESLH WL LSLVNMRJ";
    // $key4decode = "VIGENERE";
    // $encodedMessage2Tab = str_split($encodedMessage2);
    // $keyTab2 = str_split($key4decode);
    // $keySize2 = count($keyTab2);
    // $keyCounter2 = 0;
    // foreach ($encodedMessage2Tab as $pointer => $letterToDecode){
    // $positionKeyLetter2 = $keyCounter2 % $keySize2;
    // $keyLetter2 = $keyTab2[$positionKeyLetter2];
    // if ($letterToDecode != " "){
    //   for ($i = 0; $i < $sizealpha;$i++){
    //     $lineDecode = $alphaTab[$i];
    //     if ($tab[$lineDecode][$keyLetter2]===$letterToDecode){
    //       $message2[] = $lineDecode;
    //     }
    //   }
    // } else {$message2[] = " ";}
    // $keyCounter2++;
    // }
    // $decodedMessage = implode($message2);
    // ?>
    <!-- // <p>le message chiffré est : <?php echo $encodedMessage2; ?></p>
    // <p>la clé est : <?php echo $key4decode ?></p>
    // <p>le résultat est : <?php echo $decodedMessage; ?></p>   -->


<script src="/JS/bootstrap.min.js"></script>
</body>
</html>