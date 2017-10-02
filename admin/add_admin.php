<?php
    session_start();
    require_once 'check_login_admin.php';
    require_once '../dbconnect.php';
    $title = 'Přidat administrátora - Administrace - Fakultní informační systém';
    include("admin_header.php"); 
?>

            <h2>Přidat administrátora</h2>
			
			<div class="formular">
				<form action="/action_page.php"><br>
					<h4>*Login:</h4>
						<input id="box" type="text" name="login">
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