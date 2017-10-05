<?php
session_start();
require_once 'check_login.php';
require_once 'dbconnect.php';
$title = 'Předchozí projekty - Fakultní informační systém';
include("template/header.php");
?>

            <h2>Předchozí projekty</h2>
                
			<div id="table-scroll">	<br>		
            <table>
                <tr bgcolor="#3d9615"><font color="#FFF">
                    <td><font color="#FFF"><b>PROJEKT</b></font></td>
                    <td><font color="#FFF"><b>TEAM</b></font></td> 
					<td><font color="#FFF"><b>PŘEDMĚT</b></font></td> 
					<td><font color="#FFF"><b>HODNOTÍCÍ</b></font></td> 
					<td><font color="#FFF"><b>BODŮ</b></font></td> 
					<td><font color="#FFF"><b>MAX. BODŮ</b></font></td> 
					<td><font color="#FFF"><b>DEADLINE</b></font></td> 
    			</tr>
				
				<?php
                //$date = date("Y-m-d h:i:s");
                $login = $_SESSION['login'];
                $query = "SELECT DISTINCT projekt.nazev, informace.pocet_bodu, projekt.maximum_bodu, vyucujici.jmeno, predmet.nazev, projekt.datum_odevzdani FROM student, projekt, varianta, prihlasena_varianta, informace, vyucujici, predmet WHERE student.login = '$login' AND student.id_resitel = prihlasena_varianta.id_resitel AND prihlasena_varianta.id_varianta = varianta.id_varianta AND projekt.id_projekt = varianta.projekt AND prihlasena_varianta.info_reseni = informace.id_informace AND informace.hodnotici = vyucujici.id_vyucujici AND projekt.predmet = predmet.id_predmet AND projekt.datum_odevzdani < now()
                	ORDER BY projekt.datum_odevzdani DESC
                ";?>
                
				<!--  JEDNOTLIVCI -->
				<tr bgcolor="#656665">
						<td colspan="7"><font color="#FFF"><b>SAMOSTATNÉ</b></font></td> 
					</tr>    
				<tr>
				
				<?php $data = mysqli_query($conn, $query) or die("Cannot access database.").mysqli_error($conn);

                while($data_array = mysqli_fetch_array($data, MYSQLI_NUM)){ ?>
	
				    <td><?php echo "{$data_array[0]} ";?></td> 
				    <td><?php echo "";?></td> 
                    <td><?php echo "{$data_array[4]} ";?></td>
                    <td><?php echo "{$data_array[3]} ";?></td>
                    <td><?php echo "{$data_array[1]} ";?></td>
					<td><?php echo "{$data_array[2]} ";?></td>
					<td><?php echo "{$data_array[5]} ";?></td>
			   </tr>
				<?php } 
					//teamy
					$query = "SELECT DISTINCT projekt.nazev, tym.nazev_tymu, informace.pocet_bodu, projekt.maximum_bodu, vyucujici.jmeno, predmet.nazev, projekt.datum_odevzdani FROM student, projekt, varianta, prihlasena_varianta, informace, vyucujici, predmet, tym, clenove_teamu WHERE 
						student.login = '$login' AND
						student.login = clenove_teamu.login_clena AND
						clenove_teamu.id_teamu = tym.id_resitel AND
						tym.id_resitel = prihlasena_varianta.id_resitel AND
						prihlasena_varianta.id_varianta = varianta.id_varianta AND
						projekt.id_projekt = varianta.projekt AND
						prihlasena_varianta.info_reseni = informace.id_informace AND
						informace.hodnotici = vyucujici.id_vyucujici AND
						projekt.predmet = predmet.id_predmet AND
						projekt.datum_odevzdani < now()
						ORDER BY projekt.datum_odevzdani DESC
				";?>
				
				<!--  TÝMY -->
				<tr bgcolor="#656665">
						<td colspan="7"><font color="#FFF"><b>TÝMOVÉ</b></font></td> 
				</tr>  

				<?php $data = mysqli_query($conn, $query) or die("Cannot access database.").mysqli_error($conn);

                while($data_array = mysqli_fetch_array($data, MYSQLI_NUM)){ ?>
	
				    <td><?php echo "{$data_array[0]} ";?></td> 
				    <td><?php echo "{$data_array[1]} ";?></td> 
                    <td><?php echo "{$data_array[5]} ";?></td>
                    <td><?php echo "{$data_array[4]} ";?></td>
                    <td><?php echo "{$data_array[2]} ";?></td>
					<td><?php echo "{$data_array[3]} ";?></td>
					<td><?php echo "{$data_array[6]} ";?></td>
			   </tr>
				<?php } ?>  
				
             </table> 
			</div>	


<?php include("template/footer.php");?>