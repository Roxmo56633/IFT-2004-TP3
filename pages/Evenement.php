<?php
if(isset($_POST[" ajoutEvenement"]))
{
    $Id_evenement=$_POST["id"];
    $titre_evenement=$_POST["Titre"];
    $organisme_evenement=$_POST["Organisme"];
    $debut_evenement=$_POST["Debut"];
    $fin_evenement=$_POST["fin"];
    $cout_evenement=$_POST["cout"];
    $bandeau_evenement=$_POST["Bandeau"];
    $musique_evenement=$_POST["musique"];
    $question_evenement=$_POST["question"];
   
    include("DBConnexion.php");
    echo $conn;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Page evenement </title>
</head>
<body>

<h1>Evenement</h1>
<div id="Evenement">
  <form id="EvenementFormulaire" method="post" >
<p> Numero unique : </p> <br>
<input type=text placeholder="titre" name="titre_evenement" ><br>
<input type="" placeholder="Organisme" name="organisme_evenement"><br>
<input type= "debut"placeholder="Debut evenement" name="debut_evenement"><br>
<input type="text" placeholder="Fin evenement" name="fin_evenement"><br>
<input type="number" placeholder="coût" name="cout_evenement"><br>
<input type="text" placeholder="bandereau" name="bandereau_evenement"><br>
<input type="" placeholder="Question" name="question_evenement">
<button type="button" onclick= " ">Details</button><br> 
<button type="button" onclick= " "> Ok </button>
<button type="button" onclick= "" > Annuler</button>
</form> 
</div>
</body>
</html>


