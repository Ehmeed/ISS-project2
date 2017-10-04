<?php
    session_start();
    require_once 'check_login_admin.php';
    require_once '../dbconnect.php';
    $title = 'Přidat předmět - Administrace - Fakultní informační systém';
    include("admin_header.php"); 

    $error = false;
   
    $nazevError = '';
    $kapacitaError = '';
    $garantError = '';

    $nazev = '';
    $kapacita  = '';
    $garant = '';
    $prednasejici = '';
    $cvicici = '';

    $message = '';

    if( isset($_POST['pridat']) ) {
    	$nazev = htmlspecialchars(strip_tags(trim($_POST['nazev'])));
    	$kapacita = htmlspecialchars(strip_tags(trim($_POST['kapacita'])));
    	$garant = $_POST['garant'];
    	$prednasejici = $_POST['prednasejici'];
    	$cvicici = $_POST['cvicici'];

    	if(empty($garant)){
    		$garantError = 'Předmět musí mít garanta';
    		$error = true;
    	}
    	if(!is_numeric($kapacita)){
    		$kapacitaError = 'Zadejte pouze celé číslo';
    		$error = true;
    	}
    	if(empty($kapacita) or $kapacita < 0){
    		$kapacitaError = 'Zvolte kapacitu předmetu';
    		$error = true;
    	}
    	if(empty($nazev)){
    		$nazevError = 'Zadejte název předmětu';
    		$error = true;
    	}
    	if(strlen($nazev) > 49){
    		$nazevError = 'Název předmětu může mít maximálně 50 znaků';
    		$error = true;
    	}

    	if(!$error){
    		$query = "INSERT into predmet(nazev, id_garant, kapacita";
    		if(!empty($cvicici)){
    			$query = $query . ", id_cvicici";
    		}
    		if(!empty($prednasejici)){
    			$query = $query . ", id_prednasejici";	
    		}
    		$query = $query . ") VALUES('$nazev', $garant, $kapacita";
    		if(!empty($cvicici)){
    			$query = $query . ", $cvicici";
    		}
    		if(!empty($prednasejici)){
    			$query = $query . ", $prednasejici";	
    		}
    		$query = $query . ")";

    		if(mysqli_query($conn, "$query")){
    			$message = "Předmět přidán";
    			$nazev = '';
			    $kapacita  = '';
			    $garant = '';
			    $prednasejici = '';
			    $cvicici = '';
    		}else {
    			$message = "Ups, předmět se nepodařilo přidat";
    		}
    	}

    }



?>
	
	

            <h2>Přidat předmět</h2>
			
			<div class="formular">
				<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off"><br>

				<div class="msg"><?php echo "{$message}";?></div>
				
					<h4>*Název:</h4>
						<input id="box" type="text" name="nazev"  value="<?php echo $nazev; ?>">
						<br><span class="text-danger"><?php echo $nazevError; ?></span>
					<h4>*Garant:</h4>
						 <select id="box" name="garant">
						  <option value=""></option>
						  	<?php
								$query = "SELECT id_vyucujici, jmeno FROM vyucujici";
						  		$data = mysqli_query($conn, $query) or die("Cannot access database.").mysqli_error($conn);
						  		while($data_array = mysqli_fetch_array($data, MYSQLI_ASSOC)){
						  			?>
						  			<option value="<?php echo $data_array['id_vyucujici']?>" <?php if($garant == $data_array['id_vyucujici']) echo "selected"?>> <?php echo $data_array['jmeno']?> </option>
						  			<?php
						  		}  		
					  		?>
						</select> 
						<br><span class="text-danger"><?php echo $garantError; ?></span>
					<h4>Přednášející:</h4>
						 <select id="box" name="prednasejici">
						  <option value=""></option>
						  <?php
								$query = "SELECT id_vyucujici, jmeno FROM vyucujici";
						  		$data = mysqli_query($conn, $query) or die("Cannot access database.").mysqli_error($conn);
						  		while($data_array = mysqli_fetch_array($data, MYSQLI_ASSOC)){
						  			?>
						  			<option value="<?php echo $data_array['id_vyucujici']?>" <?php if($prednasejici == $data_array['id_vyucujici']) echo "selected"?>> <?php echo $data_array['jmeno']?> </option>
						  			<?php
						  		}  		
					  		?>
						</select> 
					<h4>Cvičící:</h4>
						 <select id="box" name="cvicici">
						  <option value=""></option>
						  <?php
								$query = "SELECT id_vyucujici, jmeno FROM vyucujici";
						  		$data = mysqli_query($conn, $query) or die("Cannot access database.").mysqli_error($conn);
						  		while($data_array = mysqli_fetch_array($data, MYSQLI_ASSOC)){
						  			?>
						  			<option value="<?php echo $data_array['id_vyucujici']?>" <?php if($cvicici == $data_array['id_vyucujici']) echo "selected"?>> <?php echo $data_array['jmeno']?> </option>
						  			<?php
						  		}  		
					  		?>
						</select> 
					<h4>*Kapacita:</h4>
						<input id="box" type="text" name="kapacita" value="<?php echo $kapacita; ?>">
						<br><span class="text-danger"><?php echo $kapacitaError; ?></span>
					<br><br>
						<font color="#c60614">* položky označené hvězdičkou jsou povinné</font>
					<br><br>
					
					<input type="submit" value="Přidat" name="pridat" size="30">
					<input type="reset" name="smazat" value="Smazat"><br><br>
				</form> 
			</div>	
			

<?php include("admin_footer.php");?>