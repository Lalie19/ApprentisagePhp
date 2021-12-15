<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/bootstrap.css">
    <title>Exercices</title>
</head>
<body>
<?php include("./partial/_navBar.php"); ?>

<h1>Correction Exercice 2</h1>
        <h3>Décoder des messages</h3>
        <p>les messages à décoder</p>
        <?php
        $message1 = "0@sn9sirppa@#?ia'jgtvryko1";
        $message2 = "q8e?wsellecif@#?sel@#?setuotpazdsy0*b9+mw@x1vj";
        $message3 = "aopi?sgnirts@#?sedhtg+p9l!";
        ?>
        <ul>
            <li>message 1 : <?php echo $message1; ?></li>
            <li>message 2 : <?php echo $message2; ?></li>
            <li>message 3 : <?php echo $message3; ?></li>
        </ul>
        <p>comment proceder?</p>
        <ol>
            <li>Calculer la longueur de la chaîne et la diviser par 2, tu obtiendras ainsi le "chiffre-clé".</li>
            <li>Récupère ensuite la <a href="https://www.php.net/manual/fr/function.substr.php">sous-chaîne</a> de la longueur du chiffre-clé en commençant à partir du 6ème caractère.</li>
            <li>Remplace les chaînes '@#?' par un espace.</li>
            <li>Pour finir, inverse la chaîne de caractères.</li>
        </ol>
        <?php
        /**
         * pour la division, un code à tester:
         * $number = 50;
         * $result = 50 / 2;
         * echo $result;
         */
        // TO DO
        // we search for the key 
        $key = strlen($message1) / 2;
        // var_dump($key);

        // we look after the sub string with key
        $subString = substr($message1, 5, $key);
        // var_dump($subString);

        // we replace @#? by some spaces  
        $messageWithSpaces = str_replace("@#?", " " , $subString);
        // var_dump($messageWithSpaces);

        // // we reverse the string
        $decodedMessage1 = strrev($messageWithSpaces) ;

        // TO DO 
        $key = strlen($message2) / 2;
        $subString = substr($message2, 5, $key);  
        $messageWithSpaces = str_replace("@#?", " " , $subString);
        $decodedMessage2 = strrev($messageWithSpaces) ;

        // TO DO  
        $key = strlen($message3) / 2;
        $subString = substr($message3, 5, $key); 
        $messageWithSpaces = str_replace("@#?", " " , $subString);
        $decodedMessage3 = strrev($messageWithSpaces) ;
        
        ?>
        <p>résultats:</p>
        <p>message1: <?php echo $decodedMessage1 ?><br>
            message2: <?php echo $decodedMessage2 ?><br>
            message3: <?php echo $decodedMessage3 ?><br>
        </p>


    

<script src="/JS/bootstrap.min.js"></script>
</body>
</html>