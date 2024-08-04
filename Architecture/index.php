<?php
    require_once('loader.php');
    $eleveLogic = new EleveLogic();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listing élèves</title>
</head>
<body>
    <h1>Liste des élèves :</h1>
    <ul>
        <?php
            $eleves = $eleveLogic->getAllEleves();
            foreach($eleves as $eleve){
                echo "<li>$eleve->nom ($eleve->dateDeNaissance)</li>";
            }

        ?>
    </ul>
</body>
</html>