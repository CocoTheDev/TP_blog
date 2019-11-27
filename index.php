




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


<?php


// Connexion à la BDD
$bdd = new PDO('mysql:host=localhost;dbname=TP_blog;charset=utf8', 'root', '');


// Selection des éléments
$reponse = $bdd->query("SELECT * FROM billets ORDER BY id DESC LIMIT 5");


// Affichage des messages
/* echo "<div class='col-8'>";
if (isset($reponse)) {
while ($donnees = $reponse->fetch()) {
    echo "<p><b style='color: orange;'>" . $donnees['id'] . " : " . '</b>' . $donnees['contenu'] . '</p>';}}
echo '</div>'; */




if (isset($reponse)) {
while ($donnees = $reponse->fetch()) {
echo "
<div class='col-8 center news-container'>
    <h3 class='title'>". $donnees['titre']." | Le ". $donnees['date_creation'] . "</h3>
    <br>
    <div class='news'>
            <p>". $donnees['contenu'] . "</p>
            <a href='url'>Commentaires</a>    
    </div>
</div>
";}}

?>






</body>
</html>