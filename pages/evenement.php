<body>

<h1>Evenement</h1>
<div id="Evenement">
 	<form id="EvenementFormulaire" method="post" >
 <?php
 if(isset($_GET["cree"]))
 {
     echo "<input type='text' name='titre_evenement' ><br>";
     echo "<input type='text'  placeholder='Organisme' name='organisme_evenement'><br>";
     echo "<input type= 'date' placeholder='Debut evenement' name='debut_evenement'><br>";
     echo "<input type='date'  placeholder='Fin evenement' name='fin_evenement'><br>";
     echo "<input type='number' placeholder='coût' name='cout_evenement'><br>";
     echo "<input type='text' placeholder='bandereau' name='bandereau_evenement'><br>";
     echo "<button type='submit' name='okCree'> Ok </button>";
 }
 if(isset($_POST["okCree"]))
 {
     include("init.php");
     $stid = oci_parse($conn, "insert into TP2_EVENEMENT(
            ID_EVENEMENT,
            TITRE_EVE,
            DATE_HEURE_DEBUT_EVE,
            DATE_HEURE_FIN_EVE,
            BANDEAU_PC_EVE, 
            MNT_PRIX_EVE,
            LOGO_EVE,
            BANDEAU_MOBILE_EVE,
            NOM_ORGANISME
            ) values
           (ID_EVENEMENT_SEQ.nextval,:titre,:debut,:fin,:bandeu,:cout,'Ok',:bandeu,:org)");
     
     oci_bind_by_name($stid, ':titre', $_POST["titre_evenement"]);
     oci_bind_by_name($stid, ':debut', $_POST["debut_evenement"]);
     oci_bind_by_name($stid, ':fin', $_POST["fin_evenement"]);
     oci_bind_by_name($stid, ':bandeu', $_POST["bandereau_evenement"]);
     oci_bind_by_name($stid, ':cout', $_POST["cout_evenement"]);
     oci_bind_by_name($stid, ':org', $_POST["organisme_evenement"]);
     oci_execute($stid);
 }
 if(isset($_POST["ok"]))
 {
     include("init.php");
     $stid = oci_parse($conn, "update TP2_EVENEMENT set
            TITRE_EVE=:titre,
            DATE_HEURE_DEBUT_EVE=:debut,
            DATE_HEURE_FIN_EVE=:fin,
            BANDEAU_PC_EVE=:bandeu,
            MNT_PRIX_EVE=:cout
            where ID_EVENEMENT=:id");
     
     oci_bind_by_name($stid, ':id', $_GET["evenID"]);
     oci_bind_by_name($stid, ':titre', $_POST["titre_evenement"]);
     oci_bind_by_name($stid, ':debut', $_POST["debut_evenement"]);
     oci_bind_by_name($stid, ':fin', $_POST["fin_evenement"]);
     oci_bind_by_name($stid, ':bandeu', $_POST["bandereau_evenement"]);
     oci_bind_by_name($stid, ':cout', $_POST["cout_evenement"]);
     oci_execute($stid);
 }
 if(isset($_POST["annuler"]))
 {
     echo"<script>window.location.href='index.php'; </script>";
 }
 if(isset($_POST["details"]) && isset($_POST["question"])){
     echo "<script>window.location.href='index.php?lien=question&question=".$_POST["question"]."'; </script>";;
 }
if(isset($_GET["evenID"]))
{
    
    include("init.php");
    $stid = oci_parse($conn, "select * from TP2_EVENEMENT where ID_EVENEMENT=:id");
    
    oci_bind_by_name($stid, ':id', $_GET["evenID"]);
    oci_execute($stid);
    while (($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
        echo "<p> Numero unique : ".$row["ID_EVENEMENT"]."</p> <br>";
        echo "<input type='text' value='".$row["TITRE_EVE"]."' name='titre_evenement' ><br>";
        echo "<input type='text' value='".$row["NOM_ORGANISME"]."' placeholder='Organisme' name='organisme_evenement'><br>";
        echo "<input type= 'date'value='".$row["DATE_HEURE_DEBUT_EVE"]."' placeholder='Debut evenement' name='debut_evenement'><br>";
        echo "<input type='date' value='".$row["DATE_HEURE_FIN_EVE"]."' placeholder='Fin evenement' name='fin_evenement'><br>";
        echo "<input type='number' value='".$row["MNT_PRIX_EVE"]."' placeholder='coût' name='cout_evenement'><br>";
        echo "<input type='text' value='".$row["BANDEAU_PC_EVE"]."' placeholder='bandereau' name='bandereau_evenement'><br>";
        $stid2 = oci_parse($conn, "select * from TP2_EVENEMENT_MUSIQUE where ID_EVENEMENT=:id");
        oci_bind_by_name($stid2, ':id', $_GET["evenID"]);
        oci_execute($stid2);
        echo "<select size='5'>";
        while (($row2 = oci_fetch_array($stid2, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
            echo "<option>".$row2["NOM_FICHIER_MUS"]."</option>";
        }
        echo "</select></br>";
        $stid3 = oci_parse($conn, "select * from TP2_QUESTION where ID_EVENEMENT=:idq");
        oci_bind_by_name($stid3, ':idq', $_GET["evenID"]);
        oci_execute($stid3);
        echo "<select size='10' name='question'>";
        while (($row3 = oci_fetch_array($stid3, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
            echo "<option value='".$row3["ID_QUESTION"]."'>".$row3["TEXTE_QUE"]."</option>";
        }
        echo "</select>";
        echo "<button type='submit' name='ok'> Ok </button>";
        echo "<button type='submit' name='details'>Details</button><br> ";
    } 
}
?>
		<button type='submit' name="annuler"> Annuler</button>
	</form> 
</div>