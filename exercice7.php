<?php
session_start();


$message = "";
$key = "";
$encodedMessage = "";
if ($_POST) {
    if ($_POST["message"]) {
        $message = strip_tags($_POST["message"]);
    }
    if ($_POST["key"]) {
        $key = strip_tags($_POST["key"]);
    }
    if ($_POST["encodedMessage"]) {
        $encodedMessage = strip_tags($_POST["encodedMessage"]);
    }
}

$encode = $decode = false;
if ($message && $key && !$encodedMessage) {
    $encode = true;
}
if (!$message && $key && $encodedMessage) {
    $decode = true;
}

if (!$message && $key && !$encodedMessage) {
    $errorMessage = "action non définie";
}
if (($message || $encodedMessage) && !$key) {
    $errorMessage = "il nous faut une clé";
}
if ($message && $key && $encodedMessage) {
    $errorMessage = "trop d'informations";
}

if ($encode || $decode) {
    // create a vigenere tab
    $alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $alphabetTab = str_split($alphabet);
    $doubleAlphaTab = array_merge($alphabetTab, $alphabetTab);

    $sizeAlphabet = count($alphabetTab);

    for ($i = 0; $i < $sizeAlphabet; $i++) {
        for ($j = 0; $j < $sizeAlphabet; $j++) {
            $line = $alphabetTab[$i];
            $column = $alphabetTab[$j];
            $vigenere[$line][$column] = $doubleAlphaTab[$i + $j];
        }
    }

    if ($encode) {
        // encode message
        $messageTab = str_split($message);
        $keyTab = str_split($key);
        $keySize = count($keyTab);

        $keyCounter = 0;
        foreach ($messageTab as $pointer => $letterToEncode) {
            $positionKeyLetter = $keyCounter % $keySize;
            $keyLetter = $keyTab[$positionKeyLetter];
            if ($letterToEncode != " ") {
                $encodedMessageTab[] = $vigenere[$letterToEncode][$keyLetter];
            } else {
                $encodedMessageTab[] = " ";
            }
            $keyCounter++;
        }

        $encodedMessage = implode($encodedMessageTab);
    }

    if ($decode) {
        // decode message
        $key4decode = $key;
        $encodedMessageTab = str_split($encodedMessage);
        $key4decodeTab = str_split($key4decode);
        $key4decodeSize = count($key4decodeTab);

        $keyCounter = 0;
        foreach ($encodedMessageTab as $pointer => $letterToDecode) {
            $positionKeyLetter = $keyCounter % $key4decodeSize;
            $keyLetter = $key4decodeTab[$positionKeyLetter];
            if ($letterToDecode != " ") {
                for ($i = 0; $i < $sizeAlphabet; $i++) {
                    $lineToDecode = $alphabetTab[$i];
                    if ($vigenere[$lineToDecode][$keyLetter] == $letterToDecode) {
                        $decryptedMessage[] = $lineToDecode;
                    }
                }
            } else {
                $decryptedMessage[] = " ";
            }
            $keyCounter++;
        }
        $message = implode($decryptedMessage);
    }
}

?>

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

    <div class="container">

    <h1>Exercice 7</h1>
    <h3>Programme de codage et décodage suivant divers protocole de cryptage</h3>
    
    <?php if ($errorMessage ?? false) : ?>
            <div class="alert alert-dismissible alert-primary">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <h4 class="alert-heading">Attention!</h4>
                <p class="mb-0"><?php echo $errorMessage ?></p>
            </div>
        <?php endif ?>
    
        <form method="POST">
            <div class="form-group">
                <label for="message">LE MESSAGE</label>
                <textarea name="message" class="form-control border border-3" rows="2"><?php echo $message; ?></textarea>
            </div>
            <div class="form-group">
                <label class="col-form-label" for="key">LA CLE</label>
                <input type="text" class="form-control border border-3" name="key" value="<?php echo $key; ?>">
            </div>
            <div class="form-group">
            <label for="exampleSelect1" class="form-label mt-4">Action à effectuer</label>
            <select class="form-select" id="exampleSelect1">
        <option>--Choisissez l'action--</option>
        <option>encodage par Vigenère <?php $encodedMessage=""; echo $encodedMessage; ?></option>
        <option>decodage par Vigenère <?php $message=""; echo $message; ?></option>
        
        </select>
        </div>
        <a href="/exercice7.php" class="btn btn-primary mt-3 mb-3">Annuler</a>
        <input type="submit" class="btn btn-primary mt-3 mb-3" value="Envoyer">
            </form>


<script src="/JS/bootstrap.min.js"></script>
</body>
</html>