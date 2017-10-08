<?php
session_start();
require_once 'check_login.php';
require_once 'dbconnect.php';
$title = 'Vytvořit tým - Fakultní informační systém';
include("template/header.php");

$login = $_SESSION['login'];
$message = '';
$name = '';
$nameError = '';

if(isset($_POST['pridat'])){
	$jmeno = htmlspecialchars(strip_tags(trim($_POST['jmeno'])));

	if(empty($jmeno) or strlen($jmeno) >= 30){
		$nameError = 'Název teamu musí mít 1-30 znaků';
	} else {
		if(mysqli_query($conn, "INSERT into RESITEL() VALUES()")){
			$id = mysqli_insert_id($conn);
			if(mysqli_query($conn, "INSERT into tym(id_resitel, nazev_tymu, login_vedouciho) values($id, '$jmeno', '$login')")){
				
				if(mysqli_query($conn, "INSERT into clenove_teamu(id_teamu, login_clena) VALUES($id, '$login')")){
					$message = 'Tým vytvořen!';
				}else {
					$message = 'Upss, tým se nepodařilo vytvořit';
					mysqli_query($conn, "DELETE from tym WHERE id_resitel = $id");
					mysqli_query($conn, "DELETE from resitel WHERE id_resitel = $id");
				}
			}else {
				$message = 'Upss, tým se nepodařilo vytvořit';				
				mysqli_query($conn, "DELETE from tym WHERE id_resitel = $id");
			}
		}else {
			$message = 'Upss, tým se nepodařilo vytvořit';
		}
	}

}
?>

     	<h2>Vytvořit tým</h2><br>	
		
			<div class="formular">
				<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off"><br> 
				<div class="msg"><?php echo "{$message}";?></div>
					<h4>*Název</h4>
						<input id="box" type="text" name="jmeno" value="">
						<br><span class="text-danger"><?php echo $nameError; ?></span>					
						
					<br><br>
						<font color="#c60614">* položky označené hvězdičkou jsou povinné</font>
					<br><br>
					
					<input type="submit" name="pridat" value="Vytvořit" size="30"><br><br>
				</form> 
		</div>	


<?php include("template/footer.php");?>