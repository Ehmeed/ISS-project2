<?php
    session_start();
    require_once 'check_login_teacher.php';
    require_once '../dbconnect.php';
    $title = 'Hodnocení projektu - Fakultní informační systém';
    include("teacher_header.php"); 
    $id_varianta = $_GET['id_varianta'];
    $id_resitel = $_GET['id_resitel'];
	$login = $_SESSION['login'];
	if(!isset($id_varianta) or empty($id_varianta) or !isset($id_resitel) or empty($id_resitel) or mysqli_num_rows(mysqli_query($conn, "SELECT * FROM prihlasena_varianta WHERE id_varianta = $id_varianta AND id_resitel = $id_resitel")) < 1){		
		header("Location: home.php");
	    exit;
	}
	$my_id = mysqli_fetch_array(mysqli_query($conn, "SELECT id_vyucujici FROM vyucujici WHERE login = '$login'"),MYSQLI_NUM)[0];

	//teamovy nebo solo projekt

	if(mysqli_num_rows(mysqli_query($conn, "SELECT id_resitel FROM tym WHERE id_resitel = $id_resitel")) > 0){
		$team = true;
	}else {
		$team = false;
	}

	$message = '';
	$komentar = '';
	$pts = '';
	$ptsError = '';
	$login_resitel = '';
	$download = false;



	if(isset($_POST['pridat'])){
		$pts = htmlspecialchars(strip_tags(trim($_POST['pts'])));
    	$komentar = htmlspecialchars(strip_tags(trim($_POST['komentar'])));

    	$data_array = mysqli_fetch_array(mysqli_query($conn, "SELECT projekt.maximum_bodu FROM projekt, varianta WHERE varianta.id_varianta = $id_varianta AND projekt.id_projekt = varianta.projekt"), MYSQLI_NUM);

    	if(empty($pts) or !is_numeric($pts) or $pts > $data_array[0] or $pts < 0){
    		$ptsError = 'Zadejte celé číslo v rozsahu od 0 do '.$data_array[0];
    	}else {
    		if(mysqli_query($conn, "INSERT INTO informace(pocet_bodu, reseni, datum_hodnoceni, hodnotici) VALUES($pts, '$komentar', CURRENT_TIMESTAMP, $my_id)")){
    			$id_info = mysqli_insert_id($conn);
    			if(mysqli_query($conn, "UPDATE prihlasena_varianta SET info_reseni = $id_info WHERE id_resitel = $id_resitel AND id_varianta = $id_varianta")){
    					$message = 'Hodnocení uloženo';    				
	    		}else {
	    			$message = 'Hodnocení se nepodařio uložit';
	    		}
	    	}
    		else{
    			$message = 'Hodnocení se nepodařio uložit';
    		}
    	}
	}

?>

<!--Obsah stranky-->     

			<h2>Hodnocení projektu</h2>   <br>  <a href="<?php echo 'version.php?id_varianta='.$id_varianta?>">Zpět na seznam studentů</a>
           	<?php if(!$team){
           	$data_array = mysqli_fetch_array(mysqli_query($conn, "SELECT jmeno, prijmeni, login FROM student WHERE id_resitel = $id_resitel"), MYSQLI_NUM);	
           	$login_resitel = $data_array[2];

           	?>
		    <h4><b>• Jméno řešitele:</b> <?php echo $data_array[0]. " ". $data_array[1]?></h4>
			<h4><b>• Login řešitele:</b> <?php echo $data_array[2]?></h4>
			<?php } else{
				 	$data_array = mysqli_fetch_array(mysqli_query($conn, "SELECT tym.nazev_tymu, tym.login_vedouciho FROM tym WHERE tym.id_resitel = $id_resitel"), MYSQLI_NUM);	
				 	$login_resitel = $data_array[1];
			?>
			<!--Pro tým-->  
			<h4><b>• Název týmu:</b> <?php echo $data_array[0]?></h4>
			<h4><b>• Vedoucí:</b> <?php echo $data_array[1]?></h4>
			<h4><b>• Loginy členů:</b> 
			<?php
			$data = mysqli_query($conn, "SELECT login_clena FROM clenove_teamu WHERE id_teamu = $id_resitel");
			while($data_array = mysqli_fetch_array($data, MYSQLI_NUM)){
			
				 echo $data_array[0].' ';
			
				}
			}
			?>
			</h4>
			<h4><b>• Odevzdadné řešení:</b> <?php 
			$location = "../uploads/$id_varianta/$login_resitel.zip";
			if(file_exists($location)){
				echo '<a href="grade_project.php?id_resitel='.$id_resitel.'&id_varianta='.$id_varianta.'&dw=true'.'">'.$login_resitel.'.zip</a>';
			}

			?></h4><br><br>
			
			
			<div class="formular">
				<form id="usrform" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']).'?id_resitel='.$id_resitel.'&id_varianta='.$id_varianta; ?>" autocomplete="off">
				<br><div class="msg"><?php echo "{$message}";?></div>
					<h4>*Počet bodů:</h4>
						<input id="box" type="text" name="pts" value="">
							<br><span class="text-danger"><?php echo $ptsError; ?></span>
					<h4>Komentář:</h4>
						<textarea name="komentar" form="usrform"><?php ?></textarea>						
					<br><br>
						<font color="#c60614">* položky označené hvězdičkou jsou povinné</font>
					<br><br>
					
					<input type="submit" name="pridat" value="Ohodnotit" size="30">
					<input type="reset" name="smazat" value="Smazat"><br><br>
				</form> 
		</div>	
		
<?php
	if(isset($_GET['dw'])){
		$download = true;
	}
	if($download){
		$download = false;
		header('Content-Description: File Transfer');
	    header('Content-Type: application/octet-stream');
	    header('Content-Disposition: attachment; filename="'.basename($location).'"');
	    header('Expires: 0');
	    header('Cache-Control: must-revalidate');
	    header('Pragma: public');
	    header('Content-Length: ' . filesize($location));
	    readfile($location);
	    exit;
	}


?>            
        

<?php include("teacher_footer.php");?>