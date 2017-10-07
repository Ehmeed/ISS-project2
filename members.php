<?php
session_start();
require_once 'check_login.php';
require_once 'dbconnect.php';
$title = 'Vytvořit tým - Fakultní informační systém';
include("template/header.php");
?>

     	<h2>Členové týmu</h2><br>	
		
		<div id="table-scroll">	            
            <table>

                <tr bgcolor="#3d9615"><font color="#FFF">
                    <td><font color="#FFF"><b>ČLENOVÉ</b></font></td> 
    			</tr>
                   
                    <?php ?>
                    
                <tr>
                     <td> <?php ?> </td>                
                </tr>    
    
	
            </table>

		<br>	
		<h3><font color="#000">Přidat do týmu</h3>
			<div class="formular">
				<form method="post">
				<div class="msg"><?php echo "{$message}";?></div>
					<h4>*Login studenta</h4>
						<input id="box" type="text" name="jmeno" value="">
						<br><span class="text-danger"><?php echo $nameError; ?></span></font>			
						
					<br><br>
						<font color="#c60614">* položky označené hvězdičkou jsou povinné</font>
					<br><br>
					
					<input type="submit" name="pridat" value="Přidat člena" size="30"><br><br>
				</form> 
		</div>
</div>			


<?php include("template/footer.php");?>