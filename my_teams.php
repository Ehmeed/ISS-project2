<?php
session_start();
require_once 'check_login.php';
require_once 'dbconnect.php';
$title = 'Moje týmy - Fakultní informační systém';
include("template/header.php");
?>

     	<h2>Moje týmy</h2><br>	
		
			<div id="table-scroll">	            
            <table>

                <tr bgcolor="#3d9615"><font color="#FFF">
                    <td><font color="#FFF"><b>NÁZEV TÝMU</b></font></td> 
        			<td><font color="#FFF"><b>VEDOUCÍ</b></font></td>
    			</tr>
                   
                    <?php ?>
                    
                <tr>
                     <td> <?php ?> </td>                
                     <td> <?php ?> </td>  
                </tr>    
    
	
            </table>
            </div>


<?php include("template/footer.php");?>