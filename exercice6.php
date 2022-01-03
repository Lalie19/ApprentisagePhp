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
    <h1>Exercice 6</h1>
    <?php
    $code = hexdec("223a");
    $result = "tous les gagnants ont joué, essayez";
    $response = "";
    if (!empty($_POST)) {
        if ($_POST["try"]) {
        $try = strip_tags($_POST["try"]);
        }
        if ($try) {
            if ($try < $code) {
            $result = "  Non, le code est plus grand $try ";
            } elseif ($code == $try) {
                $result = "bien joué, le code est: $try";
            } else {
                $result = "Non, le code est plus petit $try";
            }

        }
    }
       // TO DO with while
        $test = 0;
        $continue = true;
        $noInfinitLoop =10000;
        while ($continue) {
        if ($test == $code) {
        $continue = false;
        $response = strval($test);
        } else {
        $test++;
        } 

        if ($noInfinitLoop < 0) {
        $continue = false;
        $response = "boucle infinie";
        }
       $noInfinitLoop--; //on ne peut plus faire de boucle infinie
    }

    ?>
    <p>le code à trouver est compris entre 0 et 10 000, tentez votre chance ou faites en sorte que la machine vous aide à trouver la bonne réponse</p>
       <!-- <?php //if ($response) : ?>
           <p>la réponse est : <?php //echo $response; ?></p>
    <?php// endif ?> -->
    <form method="post">
        <div class="form-group">
            <label class="col-form-label" for="try">trouver le code</label>
            <input type="text" class="form-control border border-3" name="try">
        </div>
        <a href="./exercice6.php" class="btn btn-primary mt-3 mb-3">Annuler</a>
        <input type="submit" class="btn btn-primary mt-3 mb-3" value="essayer">
    </form>
    <p><?php echo $result; ?></p>
    

<script src="/JS/bootstrap.min.js"></script>
</body>
</html>