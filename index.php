<!DOCTYPE html>
<html>
	<head>
		<title>IFT-2004-TP3</title>
		<style type="text/css"><?php include "./styles/connexion.css" ?></style>
	</head>
	<body>
		<?php
            if(isset($_GET["lien"])){ //prend le lien de l'app pour retourner une page qui s'appelle "login"
                $lien=$_GET["lien"];
                switch($lien)
                {
                    case"login":
                        include ("./pages/connexion.php");
                        break; 
                    case "evenement_liste":
                        include ("./pages/evenement_liste.php");
                        break;                
                }
            }
            else
            {
                include("./pages/connexion.php");
            }
            

        ?>
	</body>
</html>
