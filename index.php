<!DOCTYPE html>
<html>
	<head>
		<title>IFT-2004-TP3</title>
		<style type="text/css"><?php include "./styles/connexion.css" ?></style>
	</head>
	<body>
	
<?php

		session_start();
 while(!isset($_SESSION['LOGIN_USA']))
{
    echo "<a href='index.php?lien=login' title='Vers page connexion'> Connexion </a>";
    
}
if(isset($_SESSION['LOGIN_USA']))
{
    
    echo "Bienvenue < '" .$_SESSION['PRENOM_USA']."' '".$_SESSION['NOM_USA']."'><br>";
    echo "<a href='index.php?lien=login' title='Vers page connexion'> Deconnecter </a>";
    
} 


          if(isset($_GET["lien"])){
                $lien=$_GET["lien"];
                switch($lien)
                {
                    case"login":
                        include ("./pages/connexion.php");
                        break;
                    case "evenement_rechercher":
                        include ("./pages/evenement_rechercher.php");
                        break;
                    case "question":
                        include ("./pages/question.php");
                        break;
                    case "evenement_liste":
                        include ("./pages/evenement_liste.php");
                        break;                
                }
            }
            else
            {
                include("./pages/evenement_liste.php");
            }
            

        ?>
	</body>
</html>
