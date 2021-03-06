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
    // TO DO
    $alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $alphabetTab = str_split($alphabet);
    $alphTab = array_merge($alphabetTab,$alphabetTab);

    $sizeAlphabet = count($alphabetTab);

    

    for($i = 0; $i < $sizeAlphabet; $i++){
      for($j = 0; $j < $sizeAlphabet; $j++){
        $line =$alphabetTab[$i];
        $column = $alphabetTab[$j];
        $vigenere[$line][$column] = $alphTab[$i + $j];
      }
    }

    // var_dump($vigenere);
    // var_dump($line);
    // var_dump($column);
    // var_dump($alphTab);
    ?>
    <h5>2- encode le message "APPRENDRE PHP EST UNE CHOSE FORMIDABLE" avec la clé "BACKEND"</h5>
    <?php
    $message = "APPRENDRE PHP EST UNE CHOSE FORMIDABLE";
    $key = "BACKEND";
    // TO DO
    $msgtab = str_split($message);
    $keyTab = str_split($key);
    $key1 = count($keyTab);
    
    $counter = 0;
    
    foreach($msgtab as $arrow => $value){
     $positionKey = $counter % $key1;
     $keyLetter = $keyTab[$positionKey];
         if($value != " "){
         $encodedMessage[] = $vigenere[$value][$keyLetter];
         } else{
         $encodedMessage[] = " ";
         }
     $counter++;
    }

    $cryptedMessage=implode($encodedMessage);
    ?>
   
    <!-- /**
    * astuce pour la rotation de la clé BACKEND
    * 14 / 7 -> 2
    * 15 / 7 -> 2 reste 1
    * pour récuperer le "reste 1" il faut faire un modulo
    * 15 % 7 -> 1
    * 176 % 7 -> 1 (25 x 7 et reste 1)
    */ -->

    <p>le message est: <?php echo $message; ?></p>
    <p>la clé est: <?php echo $key ?></p>
    <p>le résultat est: <?php echo $cryptedMessage; ?></p>
    
    <h5>3- decoder le message "TWA PEE WM TESLH WL LSLVNMRJ" avec la clé "VIGENERE"</h5>
    <?php
    $encodedMessage = "TWA PEE WM TESLH WL LSLVNMRJ";
    $key4decode = "VIGENERE";
    // TO DO
    $encodedMessageTab = str_split($encodedMessage);
    $key4decodeTab = str_split($key4decode);
    $key4decode1 = count($key4decodeTab);

    $counter = 0;

    foreach($encodedMessageTab as $arrow => $value){
      $positionKey =$counter % $key4decode1;
      $keyLetter = $key4decodeTab[$positionKey];
        if($value != " "){
         for ($i = 0; $i < $sizeAlphabet; $i++){
         $lineCode = $alphabetTab[$i];
          if($vigenere[$lineCode][$keyLetter] == $value) {
          $decryptedMessage[] = $lineCode;
          }
         }
        } else{
        $decryptedMessage[] = " ";
        }
      $counter++;
    }
    $decodedMessage = implode ($decryptedMessage);

  

    ?>
    <p>le message chiffré est: <?php echo $encodedMessage; ?></p>
    <p>la clé est: <?php echo $key4decode ?></p>
    <p>le résultat est: <?php echo $decodedMessage; ?></p>
    

<script src="/JS/bootstrap.min.js"></script>
</body>
</html>