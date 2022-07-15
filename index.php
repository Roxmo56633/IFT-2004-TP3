<!DOCTYPE html>
<html>
	<head>
		<title>IFT-2004-TP3</title>
		<style type="text/css"><?php include "./styles/connexion.css" ?></style>
	</head>
	<body>
<?php
		session_start();
		if(isset($_POST["btn"])){
		    unset($_SESSION['TYPE_USA']);
		    unset($_SESSION['LOGIN_USAGER']);
		    unset($_SESSION['NOM_ORGANISME']);
		    unset($_SESSION['NOM_USA']);
		    unset($_SESSION['PRENOM_USA']);
		}
		if(!isset($_SESSION['LOGIN_USAGER']))
		{
		    echo "<a href='index.php?lien=connexion' title='Vers page connexion'> Connexion </a>";
		    
		}else{
		    echo "Bienvenue < '" .$_SESSION['PRENOM_USA']."' '".$_SESSION['NOM_USA']."'><br>";
		    echo "
                    <form method='post'>
                    <button name='btn'><a href='index.php?lien=connexion' title='Vers page connexion'> Deconnecter </a></button>
                    </form>
                ";
		} 
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
                if(!isset($_SESSION['LOGIN_USAGER'])){
                    include ("./pages/connexion.php");
                }
                else{
                   include("./pages/evenement_liste.php"); 
                }
                
            }
            include("./pages/pied_de_page.php"); 
        ?>
	</body>
</html>
