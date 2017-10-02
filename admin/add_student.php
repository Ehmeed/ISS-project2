<?php
    session_start();
    require_once 'check_login_admin.php';
    require_once '../dbconnect.php';
    $title = 'Přidat studenta - Administrace - Fakultní informační systém';
    include("admin_header.php"); 
?>

        <h2>Přidat studenta</h2>
			
		<div class="formular">
			<form action="/action_page.php"><br>
				<h4>*Jméno:</h4>
					<input id="box" type="text" name="jmeno">
				<h4>*Příjmení:</h4>
					<input id="box" type="text" name="prijemni">
				<h4>*Login:</h4>
					<input id="box" type="text" name="login">
				<h4>*Rodné číslo:</h4>
					<input id="box" type="text" name="rodne_cislo">
				<h4>Titul:</h4>
					 <select id="box" name="titul">
					  <option value="nic"></option>
					  <option value="Bc">Bc</option>
					  <option value="Ing">Ing</option>
					  <option value="PhD">PhD</option>
					</select> 
				<h4>*Heslo:</h4>
					<input id="box" type="password" name="heslo">
				<br><br>
					<font color="#c60614">* položky označené hvězdičkou jsou povinné</font>
				<br><br>
				
				<input type="submit" value="Přidat" size="30">
				<input type="reset" name="smazat" value="Smazat"><br><br>
			</form> 
		</div>	
			

<?php include("admin_footer.php");?>