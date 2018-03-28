<form method="post" action="form_auth_main.php">
<?php 
if(isset($_SESSION["id"])){
	echo "<input type='submit' name='deconnecte' value='Se deconnecter'/>";
}else {
	echo "<label>Login : </label><input type='text' name='login' required/><br>
			<label>Mot de passe : </label><input type='password' name='mdp' required/><br>
			<input type='submit' name='connecte' value='Se connecter'/><br>";
}
	?>
	</form>
	<form method="post" action="form_auth_main.php">
	<label>Login : </label><input type="text" name="txtlogin" required/><br>
	<label>Mot de passe : </label><input type="password" name="txtmdp" required/><br>
	<label>Mail : </label><input type="text" name="txtmail" required/><br>
	<label>Type de compte : </label>
	<select name="lstCompte">
		<option value="1">Agents commerciaux</option>
		<option value="2">Modérateurs</option>
		<option value="3">Contributeurs</option>
		<option value="4">Clients</option>
	</select><br>
	<input type="submit" name="inscrire" value="S'inscrire"/>
</form>
