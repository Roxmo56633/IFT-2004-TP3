<!DOCTYPE html>
<html>
	<head>
		<title>IFT-2004-TP3</title>
		<style type="text/css"><?php include "./styles/connexion.css" ?></style>
	</head>
	<body>
		<?php
<<<<<<< HEAD
		session_start();
            if(isset($_GET["lien"])){
=======
            if(isset($_GET["lien"])){ //prend le lien de l'app pour retourner une page qui s'appelle "login"
>>>>>>> 513187f8fa8b2bdf4a92bf5a779e3f137a1cf9e1
                $lien=$_GET["lien"];
                switch($lien)
                {
                    case"login":
                        include ("./pages/connexion.php");
<<<<<<< HEAD
                        break;
                    case "evenement_rechercher":
                        include ("./pages/evenement_rechercher.php");
                        break;
                    case "question":
                        include ("./pages/question.php");
                        break;
=======
                        break; 
                    case "evenement_liste":
                        include ("./pages/evenement_liste.php");
                        break;                
>>>>>>> 513187f8fa8b2bdf4a92bf5a779e3f137a1cf9e1
                }
            }
            else
            {
                include("./pages/connexion.php");
            }
            

        ?>
	</body>
</html>
