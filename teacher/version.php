<?php
    session_start();
    require_once 'check_login_teacher.php';
    require_once '../dbconnect.php';
    $title = 'Varianta - Fakultní informační systém';
    include("teacher_header.php"); 
    $id = $_GET['id_varianta'];
	$login = $_SESSION['login'];
	if(!isset($id) or empty($id)){
		header("Location: home.php");
	    exit;
	}

	//nacteni dat projektu
	$data = mysqli_query($conn,"SELECT DISTINCT varianta.id_varianta, projekt.nazev, varianta.studentu_v_tymu, vyucujici.jmeno, varianta.popis FROM varianta, projekt, vyucujici WHERE projekt.id_projekt = varianta.projekt AND varianta.id_varianta = $id AND varianta.vedouci = vyucujici.id_vyucujici") or die("Cannot access database.").mysqli_error($conn);
	$data_array = mysqli_fetch_array($data, MYSQLI_NUM);
	if(mysqli_num_rows($data) != 1){
		header("Location: home.php");
    	exit;
    }
?>

<!--Obsah stranky-->          
            <h2><?php ?></h2><br>
            <h4><b>• Vedoucí:</b> <?php echo $data_array[3]?></h4>
			<h4><b>• Studentů v týmu:</b> <?php echo $data_array[2]?></h4>
			<h4><b>• Popis:</b> <?php echo $data_array[4]?></h4>	

			
			<h2>Seznam přihlášených studentů</h2>
				<div id="table-scroll"><br> 			
				<table>
					<tr bgcolor="#3d9615"><font color="#FFF">
						<td><font color="#FFF"><b>JMÉNO</b></font></td> 
						<td><font color="#FFF"><b>LOGIN</b></font></td>  
						<td><font color="#FFF"><b>SOUBORY</b></font></td>  
					</tr>  
					
					<?php 

				    $query = "SELECT student.jmeno, student.prijmeni, student.id_resitel, student.login FROM student, prihlasena_varianta WHERE student.id_resitel = prihlasena_varianta.id_resitel AND prihlasena_varianta.id_varianta = $id";
				    $data = mysqli_query($conn, $query) or die("Cannot access database.").mysqli_error($conn);
				    while($data_array = mysqli_fetch_array($data, MYSQLI_NUM)){
					?>
					<tr> 
						 <td><?php echo $data_array[0]. " ".$data_array[1]?></td>
						 <td><?php echo $data_array[3]?></td>
						 <td><a href="TODO">Řešení</a></td>
					</tr> 
					
					<?php
					}
					?>

					<?php 

				    $query = "SELECT tym.nazev_tymu, tym.login_vedouciho, tym.id_resitel FROM tym, prihlasena_varianta WHERE tym.id_resitel = prihlasena_varianta.id_resitel AND prihlasena_varianta.id_varianta = $id";
				    $data = mysqli_query($conn, $query) or die("Cannot access database.").mysqli_error($conn);
				    while($data_array = mysqli_fetch_array($data, MYSQLI_NUM)){
					?>
					<tr> 
						 <td><?php echo $data_array[0]?></td>
						 <td><?php echo $data_array[1]?></td>
						 <td><a href="TODO">Řešení</a></td>
					</tr> 
					
					<?php
					}
					?>
				</table>
				</div>			
		
            
        

<?php include("teacher_footer.php");?>