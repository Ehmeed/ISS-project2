<?php
    session_start();
    require_once 'check_login_admin.php';
    require_once '../dbconnect.php';
    $title = 'Přidat vyučujícího - Administrace - Fakultní informační systém';
    include("admin_header.php"); 

    $error = false;
    
    if( isset($_POST['pridat']) ) {
    	$jmeno = htmlspecialchars(strip_tags(trim($_POST['jmeno'])));
    	$prijmeni = htmlspecialchars(strip_tags(trim($_POST['prijmeni'])));
    	$rc = htmlspecialchars(strip_tags(trim($_POST['rodne_cislo'])));
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
    	if(strlen($rc) > 10 or strlen($rc) < 9){
    		$rcError = "Rodne cislo musi mit 9-10 znaku";
    		$error = true;
    	}
    	if(!is_numeric($rc)){
    		$rcError = "Rodne cislo musi obsahovat pouze cisla";
    		$error = true;
    	}
    	if(empty($heslo)){
    		$hesloError = "Zadejte heslo";
    		$error = true;
    	}
    	if(!is_numeric($kontakt)){
    		$kontaktError = "Kontakt musi obsahovat pouze cisla";
    		$error = true;
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

    		//6 mistny login, konrola v db zda jiz neexistuje a prirazeni koncoveho cisla
    	}
    }  
?>

            <h2>Přidat vyučujícího</h2>
			
			<div class="formular">
				<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off"><br>
					<h4>*Jméno</h4>
						<input id="box" type="text" name="jmeno">
					<h4>*Příjmení:</h4>
						<input id="box" type="text" name="prijmeni">
					<h4>*Rodné číslo:</h4>
						<input id="box" type="text" name="rodne_cislo">
					<h4>*Heslo:</h4>
						<input id="box" type="password" name="heslo">
					<h4>Kontakt:</h4>
						<input id="box" type="text" name="kontakt">
					<h4>Titul:</h4>
						 <select id="box" name="titul">
						  <option value="nic"></option>
						  <option value="Bc">Bc</option>
						  <option value="Ing">Ing</option>
						  <option value="PhD">PhD</option>
						  <option value="doc">doc</option>
						  <option value="prof">prof</option>
						  <option value="CSc">CSc</option>
						</select> 
					<br><br>
						<font color="#c60614">* položky označené hvězdičkou jsou povinné</font>
					<br><br>
					
					<input type="submit" name="pridat" value="Přidat" size="30">
					<input type="reset" name="smazat" value="Smazat"><br><br>
				</form> 
		</div>	
			

<?php include("admin_footer.php");?>