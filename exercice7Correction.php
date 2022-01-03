<?php
session_start();
include("./script/function.php");
include("./script/cryptage.php");

if ($_POST){
    $text = security($_POST["text"]);
    $key = security($_POST["key"]);
    $action = security($_POST["action"]);

    if (!$key || !$text || !$action) {
        $errorMessage = "Il fau renseigner tout les champs";
    } else {
        switch ($action) {
            case "encodeVigenere" : 
                $result = encodeVigenere($text, $key);
                break;
            case "decodageVigenere" :
                $result = decodeVigenere($text, $key);
                break;
            default:
            $result = "";
    
        }
    }

    
    // var_dump($text, $key, $action);
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
    <?php if ($errorMessage ?? false) : ?>
            <div class="alert alert-dismissible alert-primary">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <h4 class="alert-heading">Attention!</h4>
                <p class="mb-0"><?php echo $errorMessage ?></p>
            </div>
        <?php endif ?>
<h1>Exercice 7</h1>

        <h3>programme de codage et décodage suivant divers protocole de cryptage</h3>

        <form method="post">
            <div class="form-group">
                <label for="text">le texte</label>
                <textarea name="text" class="form-control border border-3" rows="2"></textarea>
            </div>
            <div class="form-group">
                <label class="col-form-label" for="key">la clé</label>
                <input type="text" class="form-control border border-3" name="key">
            </div>
            <div class="form-group">
                <label for="method" class="form-label mt-4">Action à effectuer</label>
                <select class="form-select border border-3" name="action">
                    <option value="">-- choisissez l'action --</option>
                    <option value="encodeVigenere">encodage par Vigenère</option>
                    <option value="decodageVigenere">decodage par vigenère</option>
                </select>
            </div>
            <a href="/exo7bis.php" class="btn btn-primary mt-3 mb-3">Annuler</a>
            <input type="submit" class="btn btn-primary mt-3 mb-3" value="Envoyer">
        </form>

        <p>========================================</p>

        <?php if ($result) : ?>
            <p>le texte : <?php echo $text; ?> <br>
                avec la clé: <?php echo $key; ?> <br>
                renvoie le résultat: <?php echo $result; ?></p>
        <?php endif ?>

        <script src="/JS/bootstrap.min.js"></script>
</body>
</html>