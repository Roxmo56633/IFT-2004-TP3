<?php
if(isset($_POST["SeConnecter"]))
{
    $email=$_POST["email"];
    $password=$_POST["password"];
    include("DBConnexion.php");
    echo $conn;
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
	