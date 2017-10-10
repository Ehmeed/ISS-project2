<?php
    session_start();
    require_once 'check_login_teacher.php';
    require_once '../dbconnect.php';
    $title = 'Moje projekty - Fakultní informační systém';
    include("teacher_header.php"); 
    $id = $_GET['id_projekt'];
	$login = $_SESSION['login'];
	if(!isset($id) or empty($id)){
		header("Location: home.php");
    exit;  
	}
	//nacteni dat projektu
	$data = mysqli_query($conn,"SELECT DISTINCT projekt.nazev, projekt.popis, projekt.maximum_bodu, projekt.minimum_bodu, projekt.datum_odevzdani, vyucujici.jmeno, predmet.nazev, projekt.datum_prihlaseni FROM projekt, predmet, vyucujici WHERE projekt.id_projekt = $id AND projekt.predmet = predmet.id_predmet AND projekt.zadavatel = vyucujici.id_vyucujici") or die("Cannot access database.").mysqli_error($conn);
	$data_array = mysqli_fetch_array($data, MYSQLI_NUM);
	if(mysqli_num_rows($data) != 1){
		header("Location: home.php");
    exit;
}
?>

<!--Obsah stranky-->          
            <h2><?php echo $data_array[0]?></h2>
			<BR>
			<h4><b>• Předmět:</b> <?php echo $data_array[6]?></h4>
			<h4><b>• Zadavatel:</b> <?php echo $data_array[5]?></h4>
			<h4><b>• Datum registrace:</b> <?php echo $data_array[7]?></h4>
			<h4><b>• Datum odevzdání:</b> <?php echo $data_array[4]?></h4>
			<h4><b>• Maximum bodů:</b> <?php echo $data_array[2]?></h4>
			<h4><b>• Minimum bodů:</b> <?php echo $data_array[3]?></h4>
			<h4><b>• Popis:</b> <?php echo $data_array[1]?></h4><br>
			<a href="create_version.php" class="link"><button class="tlacitko"><h4>VYTVOŘIT VARIANTU</h4></button></a><br><br>
			
			<h2>Varianty</h2>
			<div id="table-scroll"><br> 			
            <table>
                <tr bgcolor="#3d9615"><font color="#FFF">
                    <td><font color="#FFF"><b>VARIANTA</b></font></td> 
					<td><font color="#FFF"><b>POČET PŘIHLÁŠENÝCH</b></font></td> 
					<td><font color="#FFF"><b>KAPACITA</b></font></td>  
    			</tr>  

    			<?php 

			    $query = "SELECT DISTINCT varianta.id_varianta, varianta.maximum_resitelu FROM varianta WHERE projekt = $id";
			    $data = mysqli_query($conn, $query) or die("Cannot access database.").mysqli_error($conn);
			    while($data_array = mysqli_fetch_array($data, MYSQLI_NUM)){
			    $count_data = mysqli_query($conn, "SELECT COUNT(*) FROM prihlasena_varianta WHERE id_varianta = {$data_array[0]}");
                $count = mysqli_fetch_array($count_data, MYSQLI_NUM);
				?>

				
				<tr> 
                  	 <td><a href="version.php?id_varianta=<?php echo $data_array[0]?>"><?php echo $data_array[0]?></a></td>
					 <td><?php echo $count[0]?></td>
					 <td><?php echo $data_array[1]?></td>
					 </tr> 

                <?php
                }
                ?>
				
			</table>
			</div>

			

<?php include("teacher_footer.php");?>