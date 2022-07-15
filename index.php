<!DOCTYPE html>
<html>
	<head>
		<title>IFT-2004-TP3</title>
		<style type="text/css"><?php include "./styles/connexion.css" ?></style>
	</head>
	<body>
<?php
		session_start();
            if(isset($_GET["lien"])){
                $lien=$_GET["lien"];
                switch($lien)
                {
                    case"connexion":
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
                    case "evenement":
                        include ("./pages/evenement.php");
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
