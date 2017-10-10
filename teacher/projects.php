<?php
    session_start();
    require_once 'check_login_teacher.php';
    require_once '../dbconnect.php';
    $title = 'Moje projekty - Fakultní informační systém';
    include("teacher_header.php"); 
?>

<!--Obsah stranky-->          
            <h2>Moje projekty</h2>
			<BR>
			<h4><b>• Předmět:</b> <?php ?></h4>
			<h4><b>• Zadavatel:</b> <?php ?></h4>
			<h4><b>• Datum registrace:</b> <?php ?></h4>
			<h4><b>• Datum odevzdání:</b> <?php ?></h4>
			<h4><b>• Maximum bodů:</b> <?php ?></h4>
			<h4><b>• Minimum bodů:</b> <?php ?></h4>
			<h4><b>• Popis:</b> <?php ?></h4><br>
			<a href="create_version.php" class="link"><button class="tlacitko"><h4>VYTVOŘIT VARIANTU</h4></button></a><br><br>
			
			<h2>Varianty</h2>
			<div id="table-scroll"><br> 			
            <table>
                <tr bgcolor="#3d9615"><font color="#FFF">
                    <td><font color="#FFF"><b>VARIANTA</b></font></td> 
					<td><font color="#FFF"><b>POČET PŘIHLÁŠENÝCH</b></font></td> 
					<td><font color="#FFF"><b>KAPACITA</b></font></td>  
    			</tr>  
				
				<tr> 
                  	 <td><?php ?></td>
					 <td><?php ?></td>
					 <td><?php ?></td>
                </tr> 
				
			</table>
			</div>

			

<?php include("teacher_footer.php");?>