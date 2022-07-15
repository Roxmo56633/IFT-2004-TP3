
<form method="post">
	<input
		type="text"
		placeholder=" titre d’un événement"
		name="evenement"
	/>
	<input 
		type="text"
		placeholder="l’organisme"
		name="organisme"
	/>
	<input 
		type="date" 
		placeholder="date"
		name="date"
		/>
	<input 
		type="submit" 
		value="ok"
		id="birthday" 
		name="rechercher"
	/>
	<input 
		type="submit" 
		value="Annulee"
		id="birthday" 
		name="annule"
	/>

<?php
/*
 * //</form>
//<table>
//<td>ID_EVENEMENT</td>
//<td>TITRE_EVE</td>
//<td>NOM_ORGANISME</td>
//<td>DATE_HEURE_FIN_EVE</td>
//<td>DATE_HEURE_DEBUT_EVE</td>
//if(isset($_POST["annule"]))
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
//</style>
*/
{
    echo"<script>window.location.href='index.php'; </script>";
}
if(isset($_POST["rechercher"]))
{
    $evenement=$_POST["evenement"];
    $organisme=$_POST["organisme"];
    $date=$_POST["date"];
    include("init.php");
    if($organisme == NULL){$organisme =  ".";}
    if($evenement == NULL){$evenement =  ".";}
    if($date == NULL){$date =  ".";}
    $stid = oci_parse($conn, "select * from TP2_EVENEMENT where
                                    TITRE_EVE like '%'||:titre||'%' or
                                    NOM_ORGANISME like '%'||:organisme||'%'or
                                    DATE_HEURE_FIN_EVE like '%'||:dateDebut||'%' or
                                    DATE_HEURE_DEBUT_EVE like '%'||:dateFin||'%'");
    
    oci_bind_by_name($stid, ':titre', $evenement);
    oci_bind_by_name($stid, ':organisme', $organisme);
    oci_bind_by_name($stid, ':dateDebut', $date);
    oci_bind_by_name($stid, ':dateFin', $date);
    oci_execute($stid);
  
    while(($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) != false)
    { $_SESSION["ID_EVENEMENT"]=$row["ID_EVENEMENT"];
    $_SESSION["TOUS"]="tous";
    echo"<script>window.location.href='index.php?lien=evenement_liste'; </script>";
    }
  
  //  while (($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
    //    echo "<tr>";
      //  echo "<td>".$row["ID_EVENEMENT"]."</td>";
        //echo "<td>".$row["TITRE_EVE"]."</td>";
       // echo "<td>".$row["NOM_ORGANISME"]."</td>";
       // echo "<td>".$row["DATE_HEURE_FIN_EVE"]."</td>";
        //echo "<td>".$row["DATE_HEURE_DEBUT_EVE"]."</td>";
       // echo "</tr>";
    //} 
    if($_SESSION['TYPE_USA'] == "Administrateur"){
        $stid = oci_parse($conn, "select * from TP2_EVENEMENT_ARCHIVE where
                                    TITRE_EVE like '%'||:titre||'%' or
                                    NOM_ORGANISME like '%'||:organisme||'%'or
                                    DATE_HEURE_FIN_EVE like '%'||:dateDebut||'%' or
                                    DATE_HEURE_DEBUT_EVE like '%'||:dateFin||'%'");
        
        oci_bind_by_name($stid, ':titre', $evenement);
        oci_bind_by_name($stid, ':organisme', $organisme);
        oci_bind_by_name($stid, ':dateDebut', $date);
        oci_bind_by_name($stid, ':dateFin', $date);
        oci_execute($stid);
        
        while(($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) != false)
        { $_SESSION["ID_EVENEMENT"]=$row["ID_EVENEMENT"];
        $_SESSION["TOUS"]="tous";
        echo"<script>window.location.href='index.php?lien=evenement_liste'; </script>";
        }
        
        //while (($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
          //  echo "<tr>";
            //echo "<td>".$row["ID_EVENEMENT"]."</td>";
            //echo "<td>".$row["TITRE_EVE"]."</td>";
            //echo "<td>".$row["NOM_ORGANISME"]."</td>";
            //echo "<td>".$row["DATE_HEURE_FIN_EVE"]."</td>";
            //echo "<td>".$row["DATE_HEURE_DEBUT_EVE"]."</td>";
            //echo "</tr>";
        }
    }
?>
</table>