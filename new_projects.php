<?php
session_start();
require_once 'check_login.php';
require_once 'dbconnect.php';
$title = 'Nové projekty - Fakultní informační systém';
include("template/header.php");
?>

            <h2>Nové projekty</h2>
			
			<div id="table-scroll">		<br>		
            <table>
                <tr bgcolor="#3d9615"><font color="#FFF">
                    <td><font color="#FFF"><b>PROJEKT</b></font></td> 
					<td><font color="#FFF"><b>PŘEDMĚT</b></font></td> 
					<td><font color="#FFF"><b>MIN. BODŮ</b></font></td> 
					<td><font color="#FFF"><b>MAX. BODŮ</b></font></td> 
					<td><font color="#FFF"><b>DATUM REGISTRACE</b></font></td> 
    			</tr>

    			<?php
                //$date = date("Y-m-d h:i:s");
                $login = $_SESSION['login'];
                $query = "SELECT DISTINCT projekt.nazev, projekt.maximum_bodu, predmet.nazev, projekt.datum_odevzdani, projekt.minimum_bodu, projekt.maximum_bodu, projekt.id_projekt 
                			FROM projekt, predmet, zapsany_predmet WHERE projekt.predmet = predmet.id_predmet AND projekt.datum_odevzdani >= now() AND
                			predmet.id_predmet = zapsany_predmet.id_predmet AND zapsany_predmet.login = '$login' AND
							projekt.id_projekt NOT IN (
    							SELECT DISTINCT projekt.id_projekt FROM student, projekt, varianta, prihlasena_varianta, predmet WHERE student.login = '$login' 
    							AND student.id_resitel = prihlasena_varianta.id_resitel AND prihlasena_varianta.id_varianta = varianta.id_varianta AND
    							projekt.id_projekt = varianta.projekt AND projekt.predmet = predmet.id_predmet AND projekt.datum_odevzdani >= now()
							)
							AND projekt.id_projekt NOT IN(
								SELECT DISTINCT projekt.id_projekt  FROM student, projekt, varianta, prihlasena_varianta, informace, vyucujici, predmet, tym, clenove_teamu WHERE 
										student.login = '$login' AND
										student.login = clenove_teamu.login_clena AND
										clenove_teamu.id_teamu = tym.id_resitel AND
										tym.id_resitel = prihlasena_varianta.id_resitel AND
										prihlasena_varianta.id_varianta = varianta.id_varianta AND
										projekt.id_projekt = varianta.projekt AND
										projekt.predmet = predmet.id_predmet AND
										projekt.datum_odevzdani >= now()

							)
               			 	ORDER BY projekt.datum_odevzdani DESC
                ";?>
				
				<?php $data = mysqli_query($conn, $query) or die("Cannot access database.").mysqli_error($conn);
                $link = "project.php?id_projekt=";
                while($data_array = mysqli_fetch_array($data, MYSQLI_NUM)){ ?>
                        
						
                 <tr> 
                  	<td><a href="<?php echo $link.$data_array[6]?>"><?php echo "{$data_array[0]} ";?></a></td> 
                    <td><?php echo "{$data_array[2]} ";?></td>
                    <td style="text-align: center"><?php echo "{$data_array[4]} ";?></td>
                    <td style="text-align: center"><?php echo "{$data_array[5]} ";?></td>
					<td><?php echo "{$data_array[3]} ";?></td>			 
                 </tr> 

                 <?php } ?>
                
             </table> 
			</div>			 

<?php include("template/footer.php");?>