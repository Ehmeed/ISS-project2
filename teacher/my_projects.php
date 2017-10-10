<?php
    session_start();
    require_once 'check_login_teacher.php';
    require_once '../dbconnect.php';
    $title = 'Moje projekty - Fakultní informační systém';
    include("teacher_header.php"); 
?>

<!--Obsah stranky-->          
            <h2>Moje projekty</h2>

			<div id="table-scroll"><br>		
            <table>
                <tr bgcolor="#3d9615"><font color="#FFF">
                    <td><font color="#FFF"><b>PROJEKT</b></font></td>  
					<td><font color="#FFF"><b>PŘEDMĚT</b></font></td> 
					<td><font color="#FFF"><b>MIN. BODŮ</b></font></td> 
					<td><font color="#FFF"><b>MAX. BODŮ</b></font></td> 
					<td><font color="#FFF"><b>DATUM ODEVZDÁNÍ</b></font></td> 
    			</tr>
				
				 <!--  JEDNOTLIVCI -->
				<tr bgcolor="#656665">
						<td colspan="7"><font color="#FFF"><b>SAMOSTATNÉ</b></font></td> 
					</tr> 
					
                <tr> 
                  	 <td><?php ?></td>
					 <td><?php ?></td>
					 <td><?php ?></td>
					 <td><?php ?></td>
					 <td><?php ?></td>
                </tr> 
				
				<!--  TÝMOVÉ -->
				<tr bgcolor="#656665">
						<td colspan="7"><font color="#FFF"><b>TÝMOVÉ</b></font></td> 
					</tr> 
					
                <tr> 
                  	 <td><?php ?></td>
					 <td><?php ?></td>
					 <td><?php ?></td>
					 <td><?php ?></td>
					 <td><?php ?></td>
                </tr> 

             </table> 
			</div>
            
        

<?php include("teacher_footer.php");?>