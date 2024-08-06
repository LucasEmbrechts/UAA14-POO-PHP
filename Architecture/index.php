<?php
require_once ('loader.php');
$eleveLogic = new EleveLogic();

if (isset($_POST["nom"]) && isset($_POST["dateNaissance"])) {
    $eleve = new Eleve(null, $_POST["nom"], $_POST["dateNaissance"]);
    $eleveLogic->addEleve($eleve);
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listing élèves</title>
</head>

<body>
    <?php
    if (isset($_GET["delete"])) {
        try {
            $eleveLogic->deleteEleve($_GET["delete"]);
        } catch (EleveInexistantException $e) {
            echo $e->getMessage();
        }
    }
    ?>
    <h1>Liste des élèves :</h1>
    <ul>
        <?php
        $eleves = $eleveLogic->getAllEleves();
        foreach ($eleves as $eleve) {
            echo "<li onclick='suppEleve($eleve->id)'>$eleve->nom ($eleve->dateDeNaissance)</li>";
        }
        ?>
    </ul>

    <form action="index.php" method="post">
        <input type="text" name="nom" id="" placeholder="nom">
        <input type="date" name="dateNaissance" id="" placeholder="date de naissance">
        <input type="submit" value="Ajouter">
    </form>
    <script>
        function suppEleve(id) {
            location.href = "index.php?delete=" + id;
        }
    </script>
</body>

</html>