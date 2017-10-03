<?php
    session_start();
    require_once 'check_login_admin.php';
    require_once '../dbconnect.php';
    $title = 'Přidat administrátora - Administrace - Fakultní informační systém';
    include("admin_header.php"); 

    $error = false;
    $loginError = '';
    $hesloError = '';

    $login = '';

    $message = '';

    if( isset($_POST['pridat']) ) {
    	$login = htmlspecialchars(strip_tags(trim($_POST['login'])));
    	$heslo = htmlspecialchars(strip_tags(trim($_POST['heslo'])));

    	if(strlen($heslo) < 5){
    		$hesloError = "Heslo musi mit alespon 5 znaku";
    		$error = true;
    	}

    	if(empty($login)){
    		$loginError = 'Zadejte login';
    		$error = true;
    	}

    	if(!$error){
    		$heslo = md5($heslo);

    		if(mysqli_query($conn, "INSERT into admin(login, password) VALUES('$login', '$heslo')")){
    			$message = 'Administrátor $login vytvořen.';
    		} else {
    			$message = 'Administrátora se nepodařilo vytvořit. Jméno je již používané nebo databáze je nedostupná.';
    		}
    	}
    }
?>

            <h2>Přidat administrátora</h2>
			
			<div class="formular">
				<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off"><br>
					<h4>*Login:</h4>
						<input id="box" type="text" name="login" value="<?php echo $login; ?>">
						<br><span class="text-danger"><?php echo $loginError; ?></span>
					<h4>*Heslo:</h4>
						<input id="box" type="password" name="heslo">
						<br><span class="text-danger"><?php echo $hesloError; ?></span>
					<br><br>
						<font color="#c60614">* položky označené hvězdičkou jsou povinné</font>
					<br><br>
					
					<input type="submit" value="Přidat" name="pridat" size="30">
					<input type="reset" name="smazat" value="Smazat"><br><br>
				</form> 
			</div>	
			

<?php include("admin_footer.php");?>