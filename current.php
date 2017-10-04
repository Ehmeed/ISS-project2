<?php
session_start();
require_once 'check_login.php';
require_once 'dbconnect.php';
$title = 'Aktualní projekty - Fakultní informační systém';
include("template/header.php");
?>

            <h2>Aktuální projekty</h2>
			
			<div id="table-scroll">			
            <table>
                <tr bgcolor="#3d9615"><font color="#FFF">
                    <td><font color="#FFF"><b>PROJEKT</b></font></td> 
					<td><font color="#FFF"><b>PŘEDMĚT</b></font></td> 
					<td><font color="#FFF"><b>MIN. BODŮ</b></font></td> 
					<td><font color="#FFF"><b>MAX. BODŮ</b></font></td> 
					<td><font color="#FFF"><b>DATUM ODEVZDÁNÍ</b></font></td> 
    			</tr>
                        
						
                 <tr> 
                  	 <td>x</td>
					 <td>x</td>
					 <td>x</td>
					 <td>x</td>
					 <td>x</td>					 
                 </tr> 

                
             </table> 
			</div>			 

<?php include("template/footer.php");?>