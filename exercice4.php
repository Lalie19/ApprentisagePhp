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
    $alphabetTab2 = array_merge($alphabetTab, $alphabetTab); 
    
    $alphabetTab3 = count($alphabetTab);

    for($i = 0; $i < $alphabetTab3; $i++){
        for($a = 0; $a < $alphabetTab3; $a++){
            $line = $alphabetTab[$i];
            $column = $alphabetTab[$a];
            $vigenere[$line][$column] = $alphabetTab2[$i + $a];
        }
    }

    

    ?>
    <h5>2- encode le message "APPRENDRE PHP EST UNE CHOSE FORMIDABLE" avec la clé "BACKEND"</h5>
    <?php
    $message = "APPRENDRE PHP EST UNE CHOSE FORMIDABLE";
    $key = "BACKEND";
    // TO DO
     $messagetab = str_split($message);
     $keyTab = str_split($key);
     $keylgth = count($keyTab);
    
    $keyCounter = 0;

    foreach($messagetab as  $pointer =>  $letterToEncode){
     $positionKeyLetter =  $keyCounter %  $keylgth;
     $keyLetter =  $keyTab[$positionKeyLetter];
     if($letterToEncode != " "){
     $encodedMessage[] =  $vigenere[$letterToEncode][$keyLetter];
     } else{
      $encodedMessage[] = " ";
     }
  $counter++;
}

 $cryptedMessage=implode($encodedMessage);
//     $cryptedMessage = $message;
    /**
    * astuce pour la rotation de la clé BACKEND
    * 14 / 7 -> 2
    * 15 / 7 -> 2 reste 1
    * pour récuperer le "reste 1" il faut faire un modulo
    * 15 % 7 -> 1
    * 176 % 7 -> 1 (25 x 7 et reste 1)
    */
    ?>
    <p>le message est: <?php echo $message; ?></p>
    <p>la clé est: <?php echo $key ?></p>
    <p>le résultat est: <?php echo $cryptedMessage; ?></p>
    <h5>3- decoder le message "TWA PEE WM TESLH WL LSLVNMRJ" avec la clé "VIGENERE"</h5>
    <?php
    $encodedMessage = "TWA PEE WM TESLH WL LSLVNMRJ";
    $key4decode = "VIGENERE";
    // TO DO
    $decodedMessage = $encodedMessage;
    ?>
    <p>le message chiffré est: <?php echo $encodedMessage; ?></p>
    <p>la clé est: <?php echo $key4decode ?></p>
    <p>le résultat est: <?php echo $decodedMessage; ?></p>
    

<script src="/JS/bootstrap.min.js"></script>
</body>
</html>