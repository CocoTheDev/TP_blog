
<?php


// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=TP_blog;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


// Selection des éléments
$reponse = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 0, 5');


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





<?php
if (isset($reponse)) {
while ($data = $reponse->fetch()) {
echo "
    <div class='col-8 center news-container mt-5'>
    <h3 class='title'>". $data['titre']." | Le ". $data['date_creation_fr'] . "</h3>
    <br>
    <div class='news'>
        <p>". $data['contenu'] . "</p>

        <form methode='post' action='commentaires.php'>
        <input type='hidden' name='id_billet' value=".$data['id'].">
        <input type='submit' value='Commentaires'>
        </form>
        
    </div>
</div>
";}}

// On ferme la bdd
$reponse->closeCursor();

?>



</body>
</html>