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
    
    <h1>Exercice 5</h1>
       

        <?php
        // message d'information
        
            //    tableau
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
            
            ?>

            <form method="POST">
            <div class="form-group">
                <label for="message">Le message: </label>
                <textarea name="message" class="form-control border border-3" row="2"><?php $message=""; echo $message; ?></textarea>
            </div>
            <div class="mb-2">
                <label for="name" >La clé: </label>
                <input type="text" class="form-control border border-3" name="key" value="<?php $key=""; echo $key; ?>" >
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Le message codé: </label>
                <textarea name="encodeMessage" class="form-control border border-3" row="2"><?php $encodedMessage=""; echo $encodedMessage; ?></textarea>
            </div>
            </div>
            <a href="./exercice5.php" class="btn btn-primary mt-3 mn-3">Annuler</a>
            <input type="submit" class="btn btn-primary mt-3 mn-3" value="vigenèriser">
            
        </form>


            <?php
             if ($_POST){
                
                    if ($_POST["message"]){
                        $message = strip_tags($_POST["message"]);
                    }
                    if ($_POST["key"]) {
                        $key = strip_tags($_POST["key"]);
                    }
                    if ($_POST["encodedMessage"]) {
                        $encodedMessage = strip_tags($_POST["encodedMessage"]);
                    }
                }
                    
    
                    if ( $message && $key && !$encodedMessage) {
                        $encode = true; 
                    }
                    if ( !$message && $key && $encodedMessage) {
                        $decodedMessage = true; 
                    }

            // encode
            if($encode) {
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
            }


            // decoder
            if($decode){
                $encodedMessage = str_split($encodedMessage);
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
              }
            ?>
            
             <h3>Système d'encodage et de décodage de vigenère</h3>
             <p>Vous pouvez entre un messega est un clé ou la clé et le message à décoder</p>
             <?php echo $errorMessage; ?>
            <div class="alert alert-dismissible alert-primary">
               <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
               <h4 class="alert-heading">Warning!</h4>
               <p class="mb-0"><?php echo $errorMessage; ?></p>
             </div>

            

<script src="/JS/bootstrap.min.js"></script>
</body>
</html>