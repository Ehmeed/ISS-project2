<?php
    session_start();
    require_once 'check_login_teacher.php';
    require_once '../dbconnect.php';
    $title = 'Varianta - Fakultní informační systém';
    include("teacher_header.php"); 
?>

<!--Obsah stranky-->          
            <h2><?php ?></h2><br>
            <h4><b>• Vedoucí:</b> <?php ?></h4>
			<h4><b>• Studentů v týmu:</b> <?php ?></h4>
			<h4><b>• Popis:</b> <?php ?></h4>	

			
			<h2>Seznam přihlášených studentů</h2>
				<div id="table-scroll"><br> 			
				<table>
					<tr bgcolor="#3d9615"><font color="#FFF">
						<td><font color="#FFF"><b>JMÉNO</b></font></td> 
						<td><font color="#FFF"><b>PŘÍJMENÍ</b></font></td> 
						<td><font color="#FFF"><b>LOGIN</b></font></td>  
					</tr>  
					
					<tr> 
						 <td><?php ?></td>
						 <td><?php ?></td>
						 <td><?php ?></td>
					</tr> 
					
				</table>
				</div>			
		
            
        

<?php include("teacher_footer.php");?>