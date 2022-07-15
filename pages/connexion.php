<?php
if(isset($_POST["SeConnecter"]))
{
    $email=$_POST["email"];
    $password=$_POST["password"];
    include("init.php");
    $stid = oci_parse($conn, "select TYPE_USA, LOGIN_USAGER, NOM_ORGANISME from TP2_USAGER where LOGIN_USAGER = :login_user and MOT_DE_PASSE_USA=:login_password ");
    oci_bind_by_name($stid, ':login_user', $email);
    oci_bind_by_name($stid, ':login_password', $password);
    oci_execute($stid);
    while (($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
       $_SESSION['TYPE_USA']= $row["TYPE_USA"];
        $_SESSION['LOGIN_USAGER']= $row["LOGIN_USAGER"];
        $_SESSION['NOM_ORGANISME']= $row["NOM_ORGANISME"];
        echo"<script>window.location.href='index.php?lien=evenement_liste'; </script>";
    }
}
?>
<div id="connexionStyle">
	<form id="connexionStyleForm" method="post">
		<input
			type="text"
			placeholder="Login"
			name="email"
		/>
		<input 
			type="password"
			placeholder="Mot de passe"
			name="password"
		/>
		<center> 
			
		<input 
			type="submit"
			value="Se connecter"
			name="SeConnecter"
		/>
		</center>
	</form>
</div>
	