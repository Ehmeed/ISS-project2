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


$max_size = 10000000; //~10MB
$message = '';

if(isset($_POST['nahrat'])){
	$file_name = $_FILES['file']['name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	$tmp_name = $_FILES['file']['tmp_name'];
	

	if(isset($file_name) and $file_name==$login.'.zip' and $file_size < $max_size){
		$location = 'uploads/'.$id.'/';
		if(!file_exists($location)){
			mkdir($location, 0700);
		}
		if(move_uploaded_file($tmp_name, $location.$file_name)){
			$message = 'Soubor nahrán';
		}else {
			$message = 'Upload se nezdařil. Zkuste to prosím později nebo kontaktujte administrátora';
		}
	}else{
		$message = 'Nahrajte prosím soubor s názvem ve tvaru vas_login.zip a velikostí do 10 MB';
	}
}


include("template/header.php");
?>

            <h2><?php echo $title . " varianta " . $id ?></h2><br>
            <h4><b>• Vedoucí:</b> <?php echo $vedouci ?></h4>
			<h4><b>• Studentů v týmu:</b> <?php echo $studentu_v_tymu?></h4>
			<h4><b>• Popis:</b> <?php echo $popis?></h4>		


			<?php
				$data_array = mysqli_fetch_array(mysqli_query($conn, "SELECT DISTINCT informace.* FROM informace, prihlasena_varianta, student WHERE prihlasena_varianta.id_varianta = $id AND prihlasena_varianta.info_reseni = informace.id_informace AND (prihlasena_varianta.id_resitel = student.id_resitel AND student.login = '$login') or
					'$login' IN(
						SELECT clenove_teamu.login_clena FROM clenove_teamu, prihlasena_varianta WHERE clenove_teamu.id_teamu = prihlasena_varianta.id_resitel AND prihlasena_varianta.id_varianta = $id
					)"), MYSQLI_NUM);
				if(count($data_array) > 0){
					$hodnotici = mysqli_fetch_array(mysqli_query($conn, "SELECT jmeno FROM vyucujici WHERE id_vyucujici = $data_array[4]"))[0];
				?>
				<br>
				<h3>Informace o hodnocení</h3>
				<div id="table-scroll">
				<table>
					<tr bgcolor="#3d9615"><font color="#FFF">
						<td><font color="#FFF"><b>DATUM HODNOCENÍ</b></font></td> 
        		      	<td><font color="#FFF"><b>HODNOTÍCÍ</b></font></td> 
						<td><font color="#FFF"><b>POČET BODŮ</b></font></td>
    		      	</tr>              

                    <tr> 
                       <td> <?php echo $data_array[3]?> </td>   
                       <td> <?php echo $hodnotici ?> </td>   
                       <td style="text-align: left"><font color="#3d9615"><h4> <?php echo $data_array[1]?> </h4></font></td>      
           			</tr>  
                
				</div>
				</table>
				<br><h3><font color="#000">Komentář k hodnocení:</font></h3>
				<br>
				<?php echo $data_array[2]?>
				<?php
                }else {

                ?>
                <br><h3>Nahrát soubor:</h3>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])."?id_varianta=$id"; ?>" autocomplete="off" enctype="multipart/form-data">
                <input type="file" name="file">
                <input type="submit" name="nahrat" value="Nahrát">
                </form>
                <?php
                }

                ?>
                	<div class="msg"><?php echo "{$message}";?></div>
                
<?php include("template/footer.php");?>