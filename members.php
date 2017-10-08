<?php
session_start();
require_once 'check_login.php';
require_once 'dbconnect.php';
$title = 'Vytvořit tým - Fakultní informační systém';
include("template/header.php");

if(!isset($_GET['id_teamu'])){
	header("Location: home.php");
	exit;
}
$id = $_GET['id_teamu'];
if(1 != mysqli_num_rows(mysqli_query($conn, "SELECT DISTINCT * FROM tym WHERE id_resitel = $id"))){
	header("Location: home.php");
	exit;
}

$login = $_SESSION['login'];

$data_array = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tym, clenove_teamu WHERE tym.id_resitel =$id AND tym.id_resitel = clenove_teamu.id_teamu"));
$vedouci_login = $data_array['login_vedouciho']; 
if( $vedouci_login == $login){
	$vedouci = true; 
}else{
	$vedouci = false;
}
$nazev_teamu = $data_array['nazev_tymu'];

$nameError = '';
$nameError_remove = '';
$message = '';
$message_remove = '';

if(isset($_POST['pridat']) and $vedouci){
	$jmeno = htmlspecialchars(strip_tags(trim($_POST['jmeno'])));

	if(empty($jmeno) or strlen($jmeno) >= 9){
		$nameError = 'Zadejte platný login';
	} else {
		if(1 == mysqli_num_rows(mysqli_query($conn, "SELECT DISTINCT id_resitel FROM student WHERE 
			login = '$jmeno'")) and 
		   0 == mysqli_num_rows(mysqli_query($conn, "SELECT DISTINCT * FROM clenove_teamu WHERE 
		   	login_clena = '$jmeno' AND id_teamu = $id"))){

				if(mysqli_query($conn, "INSERT into clenove_teamu(id_teamu, login_clena) VALUES($id, '$jmeno')")){
					$message = 'Člen přidán!';
				}else {
					$message = 'Člena se nepodařilo přidat';
				}
		}else {
			$message = 'Člena se nepodařilo přidat';
		}
	}
}
if(isset($_POST['odebrat']) and $vedouci){
	$jmeno_remove = htmlspecialchars(strip_tags(trim($_POST['jmeno_remove'])));
	if($jmeno_remove != $login){

		if(empty($jmeno_remove) or strlen($jmeno_remove) >= 9){
			$nameError_remove = 'Zadejte platný login';
		}else {
			if(1 == mysqli_num_rows(mysqli_query($conn, "SELECT DISTINCT * FROM clenove_teamu WHERE 
			   	login_clena = '$jmeno_remove' AND id_teamu = $id"))){
				if(mysqli_query($conn, "DELETE FROM clenove_teamu WHERE id_teamu = $id AND login_clena = '$jmeno_remove'")){
					$message_remove = 'Člen odstraněn';
				}else {
					$message_remove = 'Člena se nepodařilo odstranit';
				}
			}
		}
	}else {
		$nameError_remove = 'Nemůžete odstranit vedoucího';
	}

}

?>

     	<h2>Členové týmu <?php echo $nazev_teamu?></h2><br>	
		
		<div id="table-scroll">	            
            <table>

                <tr bgcolor="#3d9615"><font color="#FFF">
                    <td><font color="#FFF"><b>ČLENOVÉ</b></font></td> 
    			</tr>
                   
                    <?php 
                    $data = mysqli_query($conn, "SELECT * FROM clenove_teamu WHERE id_teamu = $id");
                    while($data_array = mysqli_fetch_array($data, MYSQLI_ASSOC)){

                    ?>
                    
                <tr>
                     <td> <?php echo $data_array['login_clena']?> </td>                
                </tr>    
    				<?php 
                    }

                    ?>
	
            </table>

		<br>	
		<?php
		if($vedouci){
		?>
		
		<table>
            <tr ><font color="#FFF">
                <td>
					<h3><font color="#000">Přidat do týmu</h3>
						<div class="formular">
							<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])."?id_teamu=". $id; ?>" autocomplete="off">
							<div class="msg"><?php echo "{$message}";?></div>
								<h4>*Login studenta</h4>
									<input id="box" type="text" name="jmeno" value="">
									<br><span class="text-danger"><?php echo $nameError; ?></span></font>			

									<font color="#c60614">* položky označené hvězdičkou jsou povinné</font>
								<br><br>
								<input type="submit" name="pridat" value="Přidat člena" size="30"><br><br>
							</form> 
					</div>
				</td> 
		
                <td>
					<h3><font color="#000">Odebrat z týmu</h3>
					<div class="formular">
						<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])."?id_teamu=". $id; ?>" autocomplete="off">
						<div class="msg"><?php echo "{$message_remove}";?></div>
							<h4>*Login studenta</h4>
								<input id="box" type="text" name="jmeno_remove" value="">
								<br><span class="text-danger"><?php echo $nameError_remove; ?></span></font>			
								<font color="#c60614">* položky označené hvězdičkou jsou povinné</font>
							<br><br>
							
							<input type="submit" name="odebrat" value="Odebrat člena" size="30"><br><br>
						</form> 
					</div>
				</td> 
    		</tr>
			
		</table>

		<?php
			}
		?>
</div>			


<?php include("template/footer.php");?>