<?php
    session_start();
    require_once 'check_login_teacher.php';
    require_once '../dbconnect.php';
    $title = 'Moje projekty - Fakultní informační systém';
    include("teacher_header.php");
    $login = $_SESSION['login'];
    $my_id = mysqli_fetch_array(mysqli_query($conn, "SELECT id_vyucujici FROM vyucujici WHERE login = '$login'"),MYSQLI_NUM)[0];
 
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
				<?php 

			    $query = "SELECT projekt.nazev, projekt.minimum_bodu, projekt.maximum_bodu, projekt.datum_odevzdani, predmet.nazev, projekt.id_projekt FROM projekt, predmet WHERE zadavatel = $my_id AND projekt.predmet = predmet.id_predmet ORDER BY projekt.datum_odevzdani DESC";
			    $data = mysqli_query($conn, $query) or die("Cannot access database.").mysqli_error($conn);
			    while($data_array = mysqli_fetch_array($data, MYSQLI_NUM)){
				?>
                <tr> 
                  	 <td><a href="project.php?id_projekt=<?php echo $data_array[5]?>"><?php echo $data_array[0]?></a></td>
					 <td><?php echo $data_array[4]?></td>
					 <td><?php echo $data_array[1]?></td>
					 <td><?php echo $data_array[2]?></td>
					 <td><?php echo $data_array[3]?></td>
                </tr> 
				<?php
				}
				?>

             </table> 
			</div>
            
        

<?php include("teacher_footer.php");?>