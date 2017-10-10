<?php
    session_start();
    require_once 'check_login_teacher.php';
    require_once '../dbconnect.php';
    $title = 'Vytvořit nový projekt - Fakultní informační systém';
    include("teacher_header.php"); 
?>

<!--Obsah stranky-->          
            <h2>Vytvořit nový projekt</h2>
			<div class="formular">
				<form method="post" action="" autocomplete="off">
				<br><div class="msg"><?php echo "{$message}";?></div>
					<h4>*Název:</h4>
						<input id="box" type="text" name="nazev" value="">
					<h4>*Předmět:</h4>
						 <select id="box" name="predmet">
						  <option value=""></option>
						</select> 		
					<h4>*Maximum bodů:</h4>
						<input id="box" type="text" name="max">
					<h4>*Minimum bodů:</h4>
						<input id="box" type="text" name="min">
					<h4>*Datum přihlášení:</h4>
						<input id="box" type="text" name="date"  value="">
					<h4>*Datum odevzdání:</h4>
						<input id="box" type="text" name="deadline"  value="">
					<h4>Popis:</h4>
						<textarea name="popis" form="usrform">Zadejte popis...</textarea>
					<br><br>
						<font color="#c60614">* položky označené hvězdičkou jsou povinné</font>
					<br><br>
					
					<input type="submit" name="pridat" value="Přidat" size="30">
					<input type="reset" name="smazat" value="Smazat"><br><br>
				</form> 
		</div>	
            
        

<?php include("teacher_footer.php");?>