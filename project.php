<?php
session_start();
require_once 'check_login.php';
require_once 'dbconnect.php';
$title = 'Zapsané předměty - Fakultní informační systém';
include("template/header.php");
?>

            <h2>"název projektu"</h2><br>
            <h4><b>• Předmět:</b></h4>
			<h4><b>• Zadavatel:</b></h4>
			<h4><b>• Datum odevzdání:</b></h4>
			<h4><b>• Maximum bodů:</b></h4>
			<h4><b>• Minimum bodů:</b></h4>
			<h4><b>• Popis:</b></h4>
			
			<h2>Varianty</h2>
			<br><div id="table-scroll">			
            <table>
                <tr bgcolor="#3d9615"><font color="#FFF">
                    <td><font color="#FFF"><b>VARIANTA</b></font></td> 
					<td><font color="#FFF"><b>POČET PŘIHLÁŠENÝCH</b></font></td> 
					<td><font color="#FFF"><b>KAPACITA</b></font></td> 
					<td><font color="#FFF"><b>PŘIHLÁSIT</b></font></td> 
    			</tr>  

				
				<tr> 
                  	 <td><?php ?></td>
					 <td><?php ?></td>
					 <td><?php ?></td>
					 <td><input type="submit" value="PŘIHLÁSIT"></td>
                 </tr> 
             </table> 
			</div>			 
                
<?php include("template/footer.php");?>