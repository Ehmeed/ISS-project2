<?php
session_start();
require_once 'check_login.php';
require_once 'dbconnect.php';

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

$title = $data_array[1];
$studentu_v_tymu = $data_array[2];
$vedouci = $data_array[3];
$popis = $data_array[4];


include("template/header.php");
?>

            <h2><?php echo $title . " varianta " . $id ?></h2><br>
            <h4><b>• Vedoucí: <?php echo $vedouci ?></b></h4>
			<h4><b>• Studentů v týmu: <?php echo $studentu_v_tymu?></b></h4>
			<h4><b>• Popis: <?php echo $popis?></b></h4>		


			<?php
				$data_array = mysqli_fetch_array(mysqli_query($conn, "SELECT DISTINCT informace.* FROM informace, prihlasena_varianta, student WHERE prihlasena_varianta.id_varianta = $id AND prihlasena_varianta.info_reseni = informace.id_informace AND (prihlasena_varianta.id_resitel = student.id_resitel AND student.login = '$login') or
					'$login' IN(
						SELECT clenove_teamu.login_clena FROM clenove_teamu, prihlasena_varianta WHERE clenove_teamu.id_teamu = prihlasena_varianta.id_resitel AND prihlasena_varianta.id_varianta = $id
					)"), MYSQLI_NUM);
				if(count($data_array) > 0){

			?> <br>
				<h3>Informace o hodnocení</h3>
				<div id="table-scroll">
				<table>
					<tr bgcolor="#3d9615"><font color="#FFF">
						<td><font color="#FFF"><b>DATUM HODNOCENÍ</b></font></td> 
        		      	<td><font color="#FFF"><b>HODNOTÍCÍ</b></font></td>        			
        		      	<td><font color="#FFF"><b>ŘEŠENÍ</b></font></td>
						<td><font color="#FFF"><b>POČET BODŮ</b></font></td>
    		      	</tr>              

                    <tr> 
                       <td> <?php ?> </td>   
                       <td> <?php ?> </td>   
                       <td> <?php ?> </td>     
                       <td style="text-align: center"><font color="#3d9615"><h4> <?php ?> </h4></font></td>      
           			</tr>  
                 
                    <?php
                }

                ?>
                </form>
				</div>

                
<?php include("template/footer.php");?>