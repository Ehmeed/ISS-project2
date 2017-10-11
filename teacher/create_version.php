<?php
    session_start();
    require_once 'check_login_teacher.php';
    require_once '../dbconnect.php';
    $title = 'Vytvořit novou variantu - Fakultní informační systém';
    include("teacher_header.php"); 
    $id = $_GET['id_projekt'];
	$login = $_SESSION['login'];
	if(!isset($id) or empty($id)){
		header("Location: home.php");
    exit;  
	}
	$my_id = mysqli_fetch_array(mysqli_query($conn, "SELECT id_vyucujici FROM vyucujici WHERE login = '$login'"),MYSQLI_NUM)[0];

    $message = '';
    $nazev = '';
    $studentu_v_teamu = '1';
    $max = '';
    $popis = '';
    $nazevError = '';
    $studentu_v_teamuError = '';
    $maxError = ''; 
    $popisError = '';
    $error = false;

    if(isset($_POST['pridat'])){
    	$nazev = htmlspecialchars(strip_tags(trim($_POST['nazev'])));
    	$studentu_v_teamu = htmlspecialchars(strip_tags(trim($_POST['studentu'])));
    	$max = htmlspecialchars(strip_tags(trim($_POST['max'])));    	
    	$popis = htmlspecialchars(strip_tags(trim($_POST['popis'])));

    	if(empty($nazev)){
    		$nazevError = 'Zadejte název';
    		$error = true;
    	}
    	if(!is_numeric($studentu_v_teamu) or $studentu_v_teamu < 1){
    		$studentu_v_teamuError = 'Zadejte počet studentů v teamu';
    		$error = true;
    	}
    	if(!is_numeric($max) or $max < 1){
    		$maxError = 'Zadejte počet studentů pro tuto variantu';
    		$error = true;
    	}

    	if(!$error){
    		if(mysqli_query($conn, "INSERT INTO varianta(nazev, maximum_resitelu, popis, studentu_v_tymu, vedouci, projekt) VALUES('$nazev', $max, '$popis', $studentu_v_teamu, $my_id, $id)")){
    			$message = 'Varianta vytvořena';
    			$nazev = '';
			    $predmet = '';
			    $min = '';
			    $max = '';
			    $datum_prihlaseni = '';
			    $datum_odevzdani = '';
			    $popis = '';
			    header("Location: project.php?id_projekt=$id");
    		}else {
    			$message = 'Variantu se nepodařilo vytvořit'; 
    		}
    	}
    }
?>

<!--Obsah stranky-->          
            <h2>Vytvořit novou variantu</h2>
			<div class="formular">
				<form id ="usrform" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])."?id_projekt=$id"; ?>" autocomplete="off">
				<br><div class="msg"><?php echo "{$message}";?></div>
					<h4>*Název:</h4>
						<input id="box" type="text" name="nazev" value="<?php echo $nazev ?>">	
							<br><span class="text-danger"><?php echo $nazevError; ?></span>				
					<h4>*Maximum řešitelů:</h4>
						<input id="box" type="text" name="max" value="<?php echo $max ?>">
							<br><span class="text-danger"><?php echo $maxError; ?></span>
					<h4>*Studentů v týmu:</h4>
						<input id="box" type="text" name="studentu" value="<?php echo $studentu_v_teamu ?>">
							<br><span class="text-danger"><?php echo $studentu_v_teamuError; ?></span>
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