<?php 

//fonctionnement des boutons
if(isset ($_POST['Archivage'])){
    //archiver les donnees avec TP3_SP_ARCHIVER_EVENEMENT (PI_DATE in date, PI_LOGIN_USAGER in varchar)
    $stid = oci_parse($conn, "execute TP3_SP_ARCHIVER_EVENEMENT('Archivage', LOGIN_USAGER");

    
    if (isset($_POST['Creer']) ){
        echo"<script>window.location.href='index.php?lien=evenement';</script>";
        //mode ajout
    }
    
    if (isset($_POST['Mettre a jour'])){
        echo"<script>window.location.href='index.php?lien=evenement';</script>";
        //mode modifier
    }
    
    if(isset($_POST['Rechercher'])) {
        echo"<script>window.location.href='index.php?lien=evenement_rechercher';</script>";
        //aller vers evenement_rechercher
    }
    
    if(isset($_POST['Tous'])) {
        echo"<script>window.location.href='index.php?lien=evement_liste';</script>";
        //supprimer le array du cookie - a voir-
    }
    

if($_SESSION['usager'] == 'Administrateur')
{
    $stid = oci_parse($conn, "select ID_EVENEMENT, |' '|, TITRE_EVE, |' '|, DATE_HEURE_DEBUT_EVE 
                                from TP2_EVENEMENT EVE
                                order by DATE_HEURE_DEBUT_EVE ");
    
    $boutons = "<form method =\"post\"><p>";
   
    echo"<label for \"Archivage\"> Archiver evenements, inscrire la date: </label>
	<input type =\"text\" id=\"Archivage\" name = \"Archivage\"><br><br>";
    echo "<input type = \"button\" value = \"Mettre a jour\"><br>";
    echo "<input type = \"button\" value = \"Rechercher\"> <br>";
    
    $boutons .= "</p> </form>";
    
    
    oci_execute($stid);
}


if($_SESSION['usager'] == 'client'){
    
    $stid = oci_parse($conn, "select ID_EVENEMENT, |' '|, TITRE_EVE, |' '|, DATE_HEURE_DEBUT_EVE 
                                from TP2_EVENEMENT EVE 
                                where NOM_ORGANISME = '$_SESSION['NOM_ORGANISME']' 
                                and ID_EVENEMENT not in TP2_EVENEMENT_ARCHIVE
                                order by DATE_HEURE_DEBUT_EVE  ");
    

    
    oci_execute($stid);
    
}

$listeEvenement = "<select size=\"20\">";

if (($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) == false)
{$erreur = "Aucun evenement n'est accessible"; }

else  { 
    while (($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) != false)
{
    $listeEvenement .= "<option values = \"{$row["ID_EVENEMENT"]} {$row["TITRE_EVE"]} {$row["DATE_HEURE_DEBUT_EVE"]} </option>";
    
}
$boutons =  "<form method =\"post\"><p>";
echo "<input type = \"button\" value = \"Mettre a jour\"><br>";
echo "<input type = \"button\" value = \"Rechercher\"> <br>";
$boutons .= "</p></form>";

}
$listeEvenement .= "</select>";


//creer : afficher page evenement.php en mode ajout
//metre a jour: afficher page evenement.php en mode modif, passe ID_EVENEMENT EN PARAMETRE
//Rechercher affiche page evenement_rechercher.php
//Tous : afficher si une recherche est en cours, rafraichit la page
//archiver evenement: juste Administrateur avec la date saisie



//$_COOKIE ['ID_EVENEMENT']

    
 
}

?>
<form method = "post"
<input type = "button" value = "Creer"><br> 
<input type = "button" value = "Tous"><br>

