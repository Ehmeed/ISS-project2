<?php
    session_start();
    require_once 'check_login_teacher.php';
    require_once '../dbconnect.php';
    $title = 'Hodnocení projektu - Fakultní informační systém';
    include("teacher_header.php"); 
?>

<!--Obsah stranky-->     

			<h2>Hodnocení projektu</h2>   <br>
           
		    <h4><b>• Jméno řešitele:</b> <?php ?></h4>
			<h4><b>• Login řešitele:</b> <?php ?></h4>
			<h4><b>• Odevzdadné řešení:</b> <?php ?></h4><br><br>
			
			<!--Pro tým-->  
			<h4><b>• Název týmu:</b> <?php ?></h4>
			<h4><b>• Jména členů:</b> <?php ?></h4>
			<h4><b>• Loginy členů:</b> <?php ?></h4>
			<h4><b>• Odevzdadné řešení:</b> <?php ?></h4><br><br>
			
			
			<div class="formular">
				<form method="post" action="" autocomplete="off">
				<br><div class="msg"><?php echo "{$message}";?></div>
					<h4>*Počet bodů:</h4>
						<input id="box" type="text" name="pts" value="">
					<h4>Komentář:</h4>
						<textarea name="komentar" form="usrform"><?php ?></textarea>						
					<br><br>
						<font color="#c60614">* položky označené hvězdičkou jsou povinné</font>
					<br><br>
					
					<input type="submit" name="pridat" value="Ohodnotit" size="30">
					<input type="reset" name="smazat" value="Smazat"><br><br>
				</form> 
		</div>	
		
            
        

<?php include("teacher_footer.php");?>