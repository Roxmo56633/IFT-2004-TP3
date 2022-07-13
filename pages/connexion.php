<?php
if(isset($_POST["SeConnecter"]))
{
    $email=$_POST["email"];
    $password=$_POST["password"];
    include("DBConnexion.php");
    $stid = oci_parse($conn, "select count(Login_USAGER) from TP2_USAGER where LOGIN_USAGER = :login_user and MOT_DE_PASSE_USA=:login_password");
    oci_bind_by_name($stid, ':login_user', $email);
    oci_bind_by_name($stid, ':login_password', $password);
    oci_execute($stid);
    while (($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
        foreach ($row as $item) {
            if($item = 1){
                echo"<script>window.location.href='index.php?lien=evenement_liste'; </script>";
            }
        }
    }
}
?>
<div id="connexionStyle">
	<form id="connexionStyleForm" method="post">
		<input
			type="text"
			placeholder="Email"
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
	