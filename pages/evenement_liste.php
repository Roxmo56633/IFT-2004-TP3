<?php 
include 'init.php';
//$_SESSION['TYPE']= 'tous'; //session en recherche
//$_SESSION['TYPE_USA']='Client'; //client
//$_SESSION['LOGIN_USAGER'] ='4u2SEE'; //client
//$_SESSION['NOM_ORGANISME']='4U2C'; //client

/*
* $_SESSION['TYPE_USA']='Administrateur'; //admin
* $_SESSION['LOGIN_USAGER'] = 'SuffraAdmin'; //admin
* $_SESSION['NOM_ORGANISME'] = '';//admin
*/

$client = 'Client';
$admin = 'Administrateur';
$tous = 'tous';
$test = 'test';

//fonctionnement des boutons
if(isset ($_POST['archive'])){ 
    //archiver les donnees avec TP3_SP_ARCHIVER_EVENEMENT (PI_DATE in date, PI_LOGIN_USAGER in varchar)
    $stid = oci_parse($conn, "execute TP3_SP_ARCHIVER_EVENEMENT('Archivage', '".$_SESSION['LOGIN_USAGER']."'");
    //oci_execute($stid);
}

    
    if (isset($_POST['Creer']) ){
        echo"<script>window.location.href='index.php?lien=evenement';</script>";
        //mode ajout
    }
    
    if (isset($_POST['MAJ'])){
        $_SESSION ['ID_EVENEMENT'] = $row['ID_EVENEMENT'];
        echo"<script>window.location.href='index.php?lien=evenement';</script>";
        //mode modifier
        //page pas encore incluse
    }
    
    if(isset($_POST['recherche'])) {
        echo"<script>window.location.href='index.php?lien=evenement_rechercher';</script>";
        //aller vers evenement_rechercher
    }
    
    if(isset($_POST['Tous'])) {
        echo"<script>window.location.href='index.php?lien=evement_liste';</script>";
        //supprimer le array du cookie - a voir-
    }
    


if($_SESSION['TYPE_USA'] == $admin)
{
    $stid = oci_parse($conn, "select ID_EVENEMENT, TITRE_EVE, DATE_HEURE_DEBUT_EVE 
                                from TP2_EVENEMENT
                                order by DATE_HEURE_DEBUT_EVE desc ");
    
    oci_execute($stid);
    echo "<center><select size=20 name = 'AdminVue>";
    while (($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) != false)
    {
        echo "<option value = '{$row ['ID_EVENEMENT']}'>{$row['TITRE_EVE']} {$row['DATE_HEURE_DEBUT_EVE']} </option>";        
    }
   echo "</select></center>";
   
    echo
    "<form id='formArchivage' method='post'>
    <center>    
    <input
       type = 'text'
        placeholder='Date pour archivage'
        name='dateArchive'
    />
    
    <input
        type='submit'
        value='Archiver'
        name='archive'
    />
    </center>
    </form>

    <form id='formMAJ' method = 'post'>
    <center>
    <input
        type = 'submit'
        value= 'Mettre a jour'
        name = 'MAJ'
    />
    </center>
    </form>";

    if(isset($_SESSION['TOUS']))
    {
        echo 
        " <form id = 'tousbouton' method = 'post'>
            <center>
            <input
                type='submit'
                value='Tous'
                name='tous'
            />
            </center>
            </form> " ;
    }


    else
    { echo
    "<form id = 'Rechercher' method = 'post'>
    <center>
    <input
        type = 'submit'
        value = 'Rechercher'
        name = 'recherche'
    />
    </center>
    </form>";
    }


}// fermeture de if $_SESSION admin




if($_SESSION['TYPE_USA'] == $client){
    
    
 $stid = oci_parse($conn, "select ID_EVENEMENT, TITRE_EVE, DATE_HEURE_DEBUT_EVE 
                                from TP2_EVENEMENT
                                where NOM_ORGANISME = '".$_SESSION['NOM_ORGANISME']."'
                                and ID_EVENEMENT not in (select ID_EVENEMENT from TP2_EVENEMENT_ARCHIVE)
                                order by DATE_HEURE_DEBUT_EVE  ");
 oci_execute($stid);
  
 if (($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) != false)
 { 
     echo "<center><select size=\"20\">";
     while (($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) != false)
     {
         
         echo "<option>".$row["ID_EVENEMENT"] .$row["TITRE_EVE"] .$row["DATE_HEURE_DEBUT_EVE"] ."</option>";
         
     }
     echo "</select> </center>";     
     
 echo "<form id='formMAJ' method = 'post'>
        <center>
        <input
            type = 'submit'
            value= 'Mettre a jour'
            name = 'MAJ'
        />
        </center>
        </form>";
                 
 if(isset($_SESSION['TOUS']))
 {
     echo
     " <form id = 'tousbouton' method = 'post'>
            <center>
            <input
                type='submit'
                value='Tous'
                name='tous'
            />
            </center>
            </form> " ;
 }
 
 
 else
 { echo
 "<form id = 'Rechercher' method = 'post'>
    <center>
    <input
        type = 'submit'
        value = 'Rechercher'
        name = 'recherche'
    />
    </center>
    </form>";
 }
 
     }//fermeture if s'il y a des events

     //if (($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) == false)  
else 
{
    echo "<center>Aucun evenement n'est accessible</center>"; 
     }


}// fermeture if $_session client





echo "    
    <form id='Creer' method = 'post'>
    <center>
    <input
        type = 'submit'
        value = 'Creer'
        name = 'creer'
    />
    </center>
    </form>";

?>
