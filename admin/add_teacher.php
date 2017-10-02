<?php
    session_start();
    require_once '../check_login.php';
    require_once '../dbconnect.php';
    $title = 'Přidat vyučujícího - Administrace - Fakultní informační systém';
    include("admin_header.php"); 
?>

            <h2>Přidat vyučujícího</h2>
			
			<div class="formular">
				<form action="/action_page.php"><br>
					<h4>*Jméno a příjmení:</h4>
						<input id="box" type="text" name="jmeno">
					<h4>*Login:</h4>
						<input id="box" type="text" name="login">
					<h4>*Rodné číslo:</h4>
						<input id="box" type="text" name="rodne_cislo">
					<h4>*Heslo:</h4>
						<input id="box" type="text" name="heslo">
					<h4>Kontakt:</h4>
						<input id="box" type="text" name="kontakt" value="+420">
					<h4>Titul:</h4>
						 <select id="box" name="titul">
						  <option value="nic"></option>
						  <option value="Bc">Bc</option>
						  <option value="Ing">Ing</option>
						  <option value="PhD">PhD</option>
						  <option value="doc">doc</option>
						  <option value="prof">prof</option>
						  <option value="CSc">CSc</option>
						</select> 
					<br><br>
						<font color="#c60614">* položky označené hvězdičkou jsou povinné</font>
					<br><br>
					
					<input type="submit" value="Přidat" size="30">
					<input type="reset" name="smazat" value="Smazat"><br><br>
				</form> 
		</div>	
			

<?php include("admin_footer.php");?>