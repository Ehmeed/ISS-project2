<?php
    session_start();
    require_once 'check_login_admin.php';
    require_once '../dbconnect.php';
    $title = 'Přidat vyučujícího - Administrace - Fakultní informační systém';
    include("admin_header.php"); 

    $error = false;
    $nameError = '';
    $surnameError = '';
    $hesloError = '';
    $kontaktError = '';

    $jmeno = '';
    $prijmeni  = '';
    $kontakt  = '';
    $titul  = '';

    $message = '';
    
    if( isset($_POST['pridat']) ) {
    	$jmeno = htmlspecialchars(strip_tags(trim($_POST['jmeno'])));
    	$prijmeni = htmlspecialchars(strip_tags(trim($_POST['prijmeni'])));
    	$heslo = htmlspecialchars(strip_tags(trim($_POST['heslo'])));
    	$kontakt = htmlspecialchars(strip_tags(trim($_POST['kontakt'])));
    	$titul = htmlspecialchars(strip_tags(trim($_POST['titul'])));

    	//kontrola vsech vstupu
    	if(empty($jmeno) or strlen($jmeno) > 25){
    		$nameError = "Jmeno musi mit alespon 1 a mene nez 25 znaku";
    		$error = true;
    	}
    	if(empty($prijmeni) or strlen($prijmeni) > 25){
    		$surnameError = "Prijmeni musi mit alespon 1 a mene nez 25 znaku";
    		$error = true;
    	}
    	if(empty($heslo)){
    		$hesloError = "Zadejte heslo";
    		$error = true;
    	}
    	if(strlen($heslo) < 5){
    		$hesloError = "Heslo musi mit alespon 5 znaku";
    		$error = true;
    	}
    	if(!empty($kontakt)){
	    	if(!is_numeric($kontakt)){
	    		$kontaktError = "Kontakt musi obsahovat pouze cisla";
	    		$error = true;
	    	}
    	}

    	if(!$error){
    		//vybrat login
    		//pridat vyucujiciho do databaze
    		$login = 'y';
    		if(strlen($prijmeni) >= 5){
    			$login = $login . substr($prijmeni, 0, 5);
    		}else {
    			$login = $login . $prijmeni;
    		}
    		if(strlen($login) < 6){
    			$login = $login . substr($jmeno, 0, 6 - strlen($login));
    		}
    		if(strlen($login) < 6){
    			$login = $login . str_repeat("0", 6 - strlen($login));
    		}
    		$login = strtolower($login);
    		//6 mistny login, konrola v db zda jiz neexistuje a prirazeni koncoveho cisla
    		
    		$data = mysqli_query($conn, "SELECT login FROM vyucujici WHERE login LIKE '$login%'") or die("Cannot access database.").mysqli_error($conn);

        	$data_array = mysqli_fetch_array($data, MYSQLI_ASSOC);

    		if($data_array == null){
    			$poradi = 00;
    			
    		}else {
    			$poradi = mysqli_num_rows($data) + 1;
    		}
    		if(strlen($poradi) == 1){
    			$poradi = "0" . $poradi;
    		}
    		
    		$login = $login . $poradi;
    		$cele_jmeno = $jmeno . " " . $prijmeni;
    		$heslo = md5($heslo);
    		//hotovy login, muzeme ulozit zaznam do db
    		if(empty($kontakt)){
    			$query = "INSERT INTO vyucujici(jmeno,titul, password, login) VALUES('$cele_jmeno', '$titul', '$heslo', '$login')";
    		}else{
    			$query = "INSERT INTO vyucujici(jmeno,titul,kontakt, password, login) VALUES('$cele_jmeno', '$titul', $kontakt, '$heslo', '$login')";
    		}
    		if( mysqli_query($conn, "$query")){
	    		$message = "Uživatel $login přidán";
	    		$jmeno = '';
			    $prijmeni  = '';
			    $kontakt  = '';
			    $titul  = '';
			}else {
				$message = 'Ups, uživatele se nepodařilo přidat';
			}
    	}
    }  
?>

            <h2>Přidat vyučujícího</h2>
			
			<div class="formular">
				<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
				<br><div class="msg"><?php echo "{$message}";?></div>
					<h4>*Jméno</h4>
						<input id="box" type="text" name="jmeno" value="<?php echo $jmeno; ?>">
						<br><span class="text-danger"><?php echo $nameError; ?></span>
					<h4>*Příjmení:</h4>
						<input id="box" type="text" name="prijmeni" value="<?php echo $prijmeni; ?>">	
						<br><span class="text-danger"><?php echo $surnameError; ?></span>			
					<h4>*Heslo:</h4>
						<input id="box" type="password" name="heslo">
						<br><span class="text-danger"><?php echo $hesloError; ?></span>
					<h4>Kontakt:</h4>
						<input id="box" type="text" name="kontakt"  value="<?php echo $kontakt; ?>">&nbsp(tel. číslo)
						<br><span class="text-danger"><?php echo $kontaktError; ?></span>
					<h4>Titul:</h4>
						 <select id="box" name="titul">
						  <option value=""></option>
						  <option value="Bc"  <?php if($titul == "Bc") echo "selected"?>>Bc</option> 
						  <option value="Ing" <?php if($titul == "Ing") echo "selected"?>>Ing</option>
						  <option value="PhD" <?php if($titul == "PhD") echo "selected"?>>PhD</option>
						  <option value="doc" <?php if($titul == "doc") echo "selected"?>>doc</option>
						  <option value="prof" <?php if($titul == "prof") echo "selected"?>>prof</option>
						  <option value="CSc" <?php if($titul == "CSc") echo "selected"?>>CSc</option>
						</select> 
					<br><br>
						<font color="#c60614">* položky označené hvězdičkou jsou povinné</font>
					<br><br>
					
					<input type="submit" name="pridat" value="Přidat" size="30">
					<input type="reset" name="smazat" value="Smazat"><br><br>
				</form> 
		</div>	
			

<?php include("admin_footer.php");?>