<?php
    session_start();
    require_once '../check_login.php';
    require_once '../dbconnect.php';
    $title = 'Přidat předmět - Administrace - Fakultní informační systém';
    include("admin_header.php"); 
?>

            <h2>Přidat předmět</h2>
			
			<div class="formular">
				<form action="/action_page.php"><br>
					<h4>*Název:</h4>
						<input id="box" type="text" name="nazev">
					<h4>*Garant:</h4>
						<input id="box" type="text" name="garant">
					<h4>*Přednášející:</h4>
						<input id="box" type="text" name="prednasejici">
					<h4>*Cvičící:</h4>
						<input id="box" type="text" name="cvicici">
					<h4>*Kapacita:</h4>
						<input id="box" type="text" name="kapacita">
					<br><br>
						<font color="#c60614">* položky označené hvězdičkou jsou povinné</font>
					<br><br>
					
					<input type="submit" value="Přidat" size="30">
					<input type="reset" name="smazat" value="Smazat"><br><br>
				</form> 
			</div>	
			

<?php include("admin_footer.php");?>