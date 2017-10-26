<?php
    session_start();
    require_once 'check_login_teacher.php';
    require_once '../dbconnect.php';
    $title = 'Vytvořit nový projekt - Fakultní informační systém';
    include("teacher_header.php"); 
    $login = $_SESSION['login'];
    $result = $conn->query("SELECT id_vyucujici FROM vyucujici WHERE login = '$login'"); 
    $my_id_arr = $result->fetch_array(MYSQLI_NUM);
    $my_id = $my_id_arr[0];

    $message = '';
    $nazev = '';
    $predmet = '';
    $min = '';
    $max = '';
    $datum_prihlaseni = '';
    $datum_odevzdani = '';
    $popis = '';
    $nazevError = '';
    $predmetError = '';
    $minError = '';
    $maxError = '';
    $datum_prihlaseniError = '';
    $datum_odevzdaniError = '';
    $popisError = '';
    $error = false;
    if(isset($_POST['pridat'])){
    	$nazev = htmlspecialchars(strip_tags(trim($_POST['nazev'])));
    	$predmet = htmlspecialchars(strip_tags(trim($_POST['predmet'])));
    	$min = htmlspecialchars(strip_tags(trim($_POST['min'])));
    	$max = htmlspecialchars(strip_tags(trim($_POST['max'])));
    	$datum_odevzdani = htmlspecialchars(strip_tags(trim($_POST['datum_odevzdani'])));
    	$datum_prihlaseni = htmlspecialchars(strip_tags(trim($_POST['datum_prihlaseni'])));
    	$popis = htmlspecialchars(strip_tags(trim($_POST['popis'])));

    	//prevest format data
    	$datum_odevzdani = substr($datum_odevzdani, 0, 10) . " " . substr($datum_odevzdani, 11, 5). ":00"; 
    	$datum_prihlaseni = substr($datum_prihlaseni, 0, 10) . " " . substr($datum_prihlaseni, 11, 5). ":00"; 
    	if($datum_odevzdani < $datum_prihlaseni){
    		$datum_odevzdaniError = 'Deadline musí být později než datum registrace';
    		$error = true;
    	}
    	if(!isset($nazev) or empty($nazev) or strlen($nazev) > 49){
    		$nazevError = 'Zadejte název projektu o maximálně 50 znacích';
    		$error = true;
    	}
    	if(empty($predmet)){
    		$predmetError = 'Vyberte předmět';
    		$error = true;
    	}
    	if(!isset($min) or empty($min) or !is_numeric($min)){
    		$minError = 'Zadejte minimální počet bodů celým číslem';
    		$error = true;
    	}    	
    	if(!isset($max) or empty($max) or !is_numeric($max)){
    		$maxError = 'Zadejte maximální počet bodů celým číslem';
    		$error = true;
    	}
    	if($max < $min){
    		$minError = 'Minimum musí být menší mež maximum';
    		$error = true;
    	}
    	if(strlen($datum_prihlaseni) < 15){
    		$datum_prihlaseniError = 'Zadejte datum';
    		$error = true;
    	}
    	if(strlen($datum_odevzdani < 15)){
    		$datum_odevzdaniError = 'Zadejte datum';
    		$error = true;
    	}

    	if(!$error){
    		if(mysqli_query($conn, "INSERT INTO projekt(nazev, popis, maximum_bodu, minimum_bodu, zadavatel, predmet, datum_odevzdani, datum_prihlaseni) VALUES('$nazev', '$popis', $max, $min, $my_id, $predmet, '$datum_odevzdani', '$datum_prihlaseni')")){
    			$message = 'Projekt vytvořen';
    			$nazev = '';
			    $predmet = '';
			    $min = '';
			    $max = '';
			    $datum_prihlaseni = '';
			    $datum_odevzdani = '';
			    $popis = '';
    		}else {
    			$message = 'Projekt se nepodařilo vytvořit'; 
    		}
    	}

    }
?>

<!--Obsah stranky-->          
            <h2>Vytvořit nový projekt</h2>
			<div class="formular">
				<form id ="usrform" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
				<br><div class="msg"><?php echo "{$message}";?></div>
					<h4>*Název:</h4>
						<input id="box" type="text" name="nazev" value="<?php echo $nazev ?>">
						<br><span class="text-danger"><?php echo $nazevError; ?></span>
					<h4>*Předmět:</h4>
						 <select id="box" name="predmet">
						  <option value=""></option>
						    <?php
								$query = "SELECT id_predmet, nazev FROM predmet WHERE id_cvicici = $my_id or id_garant = $my_id or id_prednasejici = $my_id";
						  		$data = mysqli_query($conn, $query) or die("Cannot access database.").mysqli_error($conn);
						  		while($data_array = mysqli_fetch_array($data, MYSQLI_ASSOC)){
						  			?>
						  			<option value="<?php echo $data_array['id_predmet']?>" <?php if($predmet == $data_array['id_predmet']) echo "selected"?>> <?php echo $data_array['nazev']?> </option>
						  			<?php
						  		}  		
					  		?>
						</select> 	
					<br><span class="text-danger"><?php echo $predmetError; ?></span>	
					<h4>*Maximum bodů:</h4>
						<input id="box" type="text" name="max" value="<?php echo $max?>">
					<br><span class="text-danger"><?php echo $maxError; ?></span>
					<h4>*Minimum bodů:</h4>
						<input id="box" type="text" name="min" value="<?php echo $min ?>">
					<br><span class="text-danger"><?php echo $minError; ?></span>
					<h4>*Datum přihlášení:</h4>
						<input id="box" type="datetime-local" name="datum_prihlaseni"  value="">
						<br><span class="text-danger"><?php echo $datum_prihlaseniError; ?></span>
					<h4>*Datum odevzdání:</h4>
						<input id="box" type="datetime-local" name="datum_odevzdani"  value="">
					<br><span class="text-danger"><?php echo $datum_odevzdaniError; ?></span>
					<h4>Popis:</h4>
						<textarea name="popis" form="usrform"><?php echo $popis ?></textarea>
					<br><br>
						<font color="#c60614">* položky označené hvězdičkou jsou povinné</font>
					<br><br>
					
					<input type="submit" name="pridat" value="Přidat" size="30">
					<input type="reset" name="smazat" value="Smazat"><br><br>
				</form> 
		</div>	
            
        

<?php include("teacher_footer.php");?>