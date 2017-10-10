<?php
    session_start();
    require_once 'check_login_teacher.php';
    require_once '../dbconnect.php';
    $title = 'Vytvořit novou variantu - Fakultní informační systém';
    include("teacher_header.php"); 
?>

<!--Obsah stranky-->          
            <h2>Vytvořit novou variantu</h2>
			<div class="formular">
				<form method="post" action="" autocomplete="off">
				<br><div class="msg"><?php echo "{$message}";?></div>
					<h4>*Název:</h4>
						<input id="box" type="text" name="nazev" value="">
					<h4>*Projekt:</h4>
						<input id="box" type="text" name="projekt"  value="">						
					<h4>*Maximum řešitelů:</h4>
						<input id="box" type="text" name="max">
					<h4>*Studentů v týmu:</h4>
						<input id="box" type="text" name="studentu">
					<br><br>
						<font color="#c60614">* položky označené hvězdičkou jsou povinné</font>
					<br><br>
					
					<input type="submit" name="pridat" value="Přidat" size="30">
					<input type="reset" name="smazat" value="Smazat"><br><br>
				</form> 
		</div>	
		
            
        

<?php include("teacher_footer.php");?>