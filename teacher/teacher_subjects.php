<?php
    session_start();
    require_once 'check_login_teacher.php';
    require_once '../dbconnect.php';
    $title = 'Předměty - Fakultní informační systém';
    include("teacher_header.php"); 
    $login = $_SESSION['login'];
    $my_id = mysqli_fetch_array(mysqli_query($conn, "SELECT id_vyucujici FROM vyucujici WHERE login = '$login'"),MYSQLI_NUM)[0];

    $query = "SELECT predmet.nazev, predmet.id_predmet, vyucujici.jmeno FROM predmet, vyucujici WHERE predmet.id_garant = vyucujici.id_vyucujici AND (predmet.id_cvicici = $my_id OR predmet.id_prednasejici = $my_id OR predmet.id_garant = $my_id)";
    $data = mysqli_query($conn, $query) or die("Cannot access database.").mysqli_error($conn);
?>

<!--Obsah stranky-->          
            <h2>Předměty</h2>

			<div id="table-scroll"><br>		
            <table>
                <tr bgcolor="#3d9615"><font color="#FFF">
                    <td><font color="#FFF"><b>NÁZEV</b></font></td> 
					<td><font color="#FFF"><b>GARANT</b></font></td>
    			</tr>
				
				<?php
                    
                	while($data_array = mysqli_fetch_array($data, MYSQLI_ASSOC)){
                ?>	
                 <tr> 
                  	 <td><?php echo $data_array['nazev']?></td>
					 <td><?php echo $data_array['jmeno']?></td>
                 </tr> 

				<?php
				}
				?>
             </table> 
			</div>
            
        

<?php include("teacher_footer.php");?>