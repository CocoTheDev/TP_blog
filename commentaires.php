<?php

// Connexion à la BDD
$bdd = new PDO('mysql:host=localhost;dbname=TP_blog;charset=utf8', 'root', '');

$id_billet =  (htmlspecialchars($_GET['id_billet']));
// Selection des éléments
$reponse = $bdd->query("SELECT * FROM billets WHERE id = $id_billet");
$donnees = $reponse->fetch();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
    


<br><br>
<h1>Mon Super Blog !</h1><br><br>
<h2>Derniers billets du blog</h2><br>

<a href='index.php'>Revenir à l'accueil</a> 

<?php

//-------------------- Affichage du billet -------------------- 

// On vérifie si id_billet existe
if (isset($_GET['id_billet'])) { 

    echo "
    <div class='col-8 center news-container mt-5'>
        <h3 class='title'>". htmlspecialchars($donnees['titre'])." | Le ". $donnees['date_creation'] . "</h3>
        <br>
        <div class='news'>
                <p>". nl2br(htmlspecialchars($donnees['contenu'])) . "</p>
        </div>
    </div>
    ";


// fin du if isset id_billet
}
else {echo "Aucun billet séléctionné";}  


// On ferme la bdd
$reponse->closeCursor();



//-------------------- Affichage des commentaires -------------------- 

// Connexion à la BDD
$bdd = new PDO('mysql:host=localhost;dbname=TP_blog;charset=utf8', 'root', '');

$id_billet =  (htmlspecialchars($_GET['id_billet']));
// Selection des éléments
$reponse = $bdd->query("SELECT * FROM commentaires WHERE id_billet = $id_billet ORDER BY id DESC LIMIT 5");



// On vérifie si id_billet existe
if (isset($_GET['id_billet'])) { 
    


    // Affichage des messages
    if (isset($reponse)) {
    while ($donnees = $reponse->fetch()) {
    echo "
    <div class='col-8 center coms-container mt-5'>
        <h3 class='title'>". htmlspecialchars($donnees['auteur'])." | Le ". $donnees['date_commentaire'] . "</h3>
        <br>
        <div class='coms'>
            <p>". nl2br(htmlspecialchars($donnees['commentaire'])) . "</p>
        </div>
    </div>
    ";}}
    else {echo "Pas de commentaire pour le moment";}  


// fin du if isset id_billet
}
else {echo "Aucun billet séléctionné";}  


// On ferme la bdd
$reponse->closeCursor();

?>





</body>
</html>