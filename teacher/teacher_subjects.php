<?php
    session_start();
    require_once 'check_login_teacher.php';
    require_once '../dbconnect.php';
    $title = 'Předměty - Fakultní informační systém';
    include("teacher_header.php"); 
?>

<!--Obsah stranky-->          
            <h2>Předměty</h2>

			<div id="table-scroll"><br>		
            <table>
                <tr bgcolor="#3d9615"><font color="#FFF">
                    <td><font color="#FFF"><b>NÁZEV</b></font></td> 
					<td><font color="#FFF"><b>GARANT</b></font></td>
    			</tr>
				
                 <tr> 
                  	 <td><?php ?></td>
					 <td><?php ?></td>
                 </tr> 

             </table> 
			</div>
            
        

<?php include("teacher_footer.php");?>