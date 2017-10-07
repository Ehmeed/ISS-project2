<?php
session_start();
require_once 'check_login.php';
require_once 'dbconnect.php';
$title = 'Vytvořit tým - Fakultní informační systém';
include("template/header.php");
?>

     	<h2>Vytvořit tým</h2><br>	
		
			<div class="formular">
				<form method="post">
				<div class="msg"><?php echo "{$message}";?></div>
					<h4>*Název</h4>
						<input id="box" type="text" name="jmeno" value="">
						<br><span class="text-danger"><?php echo $nameError; ?></span>					
						
					<br><br>
						<font color="#c60614">* položky označené hvězdičkou jsou povinné</font>
					<br><br>
					
					<input type="submit" name="pridat" value="Vytvořit" size="30"><br><br>
				</form> 
		</div>	


<?php include("template/footer.php");?>