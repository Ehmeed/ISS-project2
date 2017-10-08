<?php
session_start();
require_once 'check_login.php';
require_once 'dbconnect.php';
$id = $_GET['id_projekt'];
$login = $_SESSION['login'];
if(!isset($id) or empty($id)){
	header("Location: home.php");
    exit;
}
$my_id = mysqli_fetch_array(mysqli_query($conn, "SELECT id_resitel FROM student WHERE login = '$login'"), MYSQLI_NUM)[0];
//nacteni dat projektu
$data = mysqli_query($conn,"SELECT DISTINCT projekt.nazev, projekt.popis, projekt.maximum_bodu, projekt.minimum_bodu, projekt.datum_odevzdani, vyucujici.jmeno, predmet.nazev, projekt.datum_prihlaseni FROM projekt, predmet, vyucujici WHERE projekt.id_projekt = $id AND projekt.predmet = predmet.id_predmet AND projekt.zadavatel = vyucujici.id_vyucujici") or die("Cannot access database.").mysqli_error($conn);
$data_array = mysqli_fetch_array($data, MYSQLI_NUM);
if(mysqli_num_rows($data) != 1){
	header("Location: home.php");
    exit;
}

$title = $data_array[0];
$desc = $data_array[1];
$max_body = $data_array[2];
$min_body = $data_array[3];
$datum = $data_array[4];
$vyucujici = $data_array[5];
$predmet = $data_array[6];
$datum_registrace = $data_array[7];
$button_text = '';
$message = '';
$team_id = '';

// ZDE ZPRACOVANI PRI KLIKNUTI NA TLACITKO PRIHLASIT
$query = "SELECT varianta.id_varianta FROM varianta";
$data = mysqli_query($conn, $query) or die("Cannot access database.").mysqli_error($conn);
while($data_array = mysqli_fetch_array($data, MYSQLI_ASSOC)){
  $variant = $data_array['id_varianta'];
  if (isset($_POST[$variant])){
  	//kontrola zda jiz student neni prihalseny
	$team_id = $_POST['tymy'];
	//TODO CHECK DATe
	$datum = mysqli_fetch_array(mysqli_query($conn, "SELECT datum_prihlaseni FROM projekt WHERE id_projekt = $id"), MYSQLI_NUM)[0];
	$today = date("Y-m-d H:i:s");
	if($today > $datum){
		$message = 'Přihlašování již skončilo';
		break;
	}
	
	if($team_id == "0"){
		//jednotlivec
		$errors = mysqli_num_rows(mysqli_query($conn, "SELECT DISTINCT * FROM prihlasena_varianta, student, projekt, varianta WHERE student.login = '$login' AND prihlasena_varianta.id_resitel = student.id_resitel AND prihlasena_varianta.id_varianta = varianta.id_varianta AND varianta.projekt = projekt.id_projekt AND projekt.id_projekt = $id"));
		$reged_as_single = $errors;
		$errors = $errors + mysqli_num_rows(mysqli_query($conn, "SELECT DISTINCT * FROM clenove_teamu, prihlasena_varianta, varianta, projekt WHERE clenove_teamu.login_clena = '$login' AND prihlasena_varianta.id_resitel = clenove_teamu.id_teamu AND prihlasena_varianta.id_varianta = varianta.id_varianta AND varianta.projekt = projekt.id_projekt AND projekt.id_projekt = $id"));

		if($errors != 0){
			$message = 'Na tento projekt jste již přihlášen';
		}
		$reged = mysqli_num_rows(mysqli_query($conn,"SELECT DISTINCT predmet.id_predmet FROM zapsany_predmet, projekt, predmet WHERE
			zapsany_predmet.login = '$login' AND zapsany_predmet.id_predmet = predmet.id_predmet AND projekt.predmet = predmet.id_predmet AND projekt.id_projekt = $id"));
		if($reged != 1){
			$message = 'Na tento projekt se nemůžete přihlásit, nemáte zapsaný odpovídající předmět.';
		}

		if($errors == 0 and $reged == 1){
			$prihlasenych = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM prihlasena_varianta WHERE id_varianta = $variant"));
			$kapacita = mysqli_fetch_array(mysqli_query($conn, "SELECT maximum_resitelu FROM varianta WHERE id_varianta = $variant"), MYSQLI_NUM)[0];
			if($kapacita <= $prihlasenych){
				$message = 'Varianta je již plně obsazená';
			}else {
				$studentu_v_tymu = mysqli_fetch_array(mysqli_query($conn, "SELECT studentu_v_tymu FROM varianta WHERE id_varianta = $variant"), MYSQLI_NUM)[0];
				if($studentu_v_tymu > 2){
					$message = 'Nemůžete se přihlásit sám na týmový projekt';
				}else {
					if(mysqli_query($conn, "INSERT INTO prihlasena_varianta(id_resitel, id_varianta) VALUES($my_id, $variant)")){
						$message = 'Byl jste přihlášen';
					}else {
						$message = 'Přihlášení se nezdařilo';
					}
				}
			}
		}else if($reged_as_single == 1 and $_POST[$variant] = 'ODHLÁSIT'){
			mysqli_query($conn, "DELETE FROM prihlasena_varianta WHERE id_resitel = $my_id AND id_varianta = $variant");
			$message = 'Byl jste odhlášen';
		}

	}else {
		//team
		$fail = false;
		$team_id = substr($team_id, 5);
		$members_array = array();
		if($_POST[$variant] == 'ODHLÁSIT'){
			if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM prihlasena_varianta WHERE id_varianta = $variant AND id_resitel = $team_id")) != 0){
				mysqli_query($conn, "DELETE FROM prihlasena_varianta WHERE id_resitel = $team_id AND id_varianta = $variant");
				$message = 'Byl jste odhlášen';
			}					
		}else{

		$data = mysqli_query($conn, "SELECT DISTINCT login_clena FROM clenove_teamu WHERE id_teamu = $team_id");
		while($members = mysqli_fetch_array($data, MYSQLI_NUM)){
			$members_array[] = $members[0];
		}
		//kontrola zda je jich spravny pocet pro registraci
		$studentu_v_tymu = mysqli_fetch_array(mysqli_query($conn, "SELECT studentu_v_tymu FROM varianta WHERE id_varianta = $variant"), MYSQLI_NUM)[0];
		if(count($members_array) > $studentu_v_tymu){
			$message = 'Počet členů v týmu je moc vysoký pro tuto variantu';
		}else {
			//kontrola zda neni varianta plna
			$prihlasenych = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM prihlasena_varianta WHERE id_varianta = $variant"));
			$kapacita = mysqli_fetch_array(mysqli_query($conn, "SELECT maximum_resitelu FROM varianta WHERE id_varianta = $variant"), MYSQLI_NUM)[0];
			if($kapacita <= $prihlasenych){
				$message = 'Varianta je již plně obsazená';
			}else { 
								
				//kontrola vsech clenu, zda se muzou registrovat na projekt
				foreach ($members_array as $team_member_login) { 
			    	$reged = mysqli_num_rows(mysqli_query($conn,"SELECT DISTINCT predmet.id_predmet FROM zapsany_predmet, projekt, predmet WHERE zapsany_predmet.login = '$team_member_login' AND zapsany_predmet.id_predmet = predmet.id_predmet AND projekt.predmet = predmet.id_predmet AND projekt.id_projekt = $id"));
					if($reged != 1){
						$message = 'Na tento projekt se nemůžete přihlásit, některý z členů nemá zapsaný odpovídající předmět.';
						$fail = true;
						break;
					}
					$errors = mysqli_num_rows(mysqli_query($conn, "SELECT DISTINCT * FROM prihlasena_varianta, student, projekt, varianta WHERE student.login = '$team_member_login' AND prihlasena_varianta.id_resitel = student.id_resitel AND prihlasena_varianta.id_varianta = varianta.id_varianta AND varianta.projekt = projekt.id_projekt AND projekt.id_projekt = $id"));
					
					$team_reged = mysqli_num_rows(mysqli_query($conn, "SELECT DISTINCT * FROM clenove_teamu, prihlasena_varianta, varianta, projekt WHERE clenove_teamu.login_clena = '$team_member_login' AND prihlasena_varianta.id_resitel = clenove_teamu.id_teamu AND prihlasena_varianta.id_varianta = varianta.id_varianta AND varianta.projekt = projekt.id_projekt AND projekt.id_projekt = $id"));
					if($errors != 0 or $team_reged != 0){
						$message = 'Na tento projekt je již některý z členů teamu přihlášen';
						$fail = true;
						break;
					}

				}
				//vsichni clenove v poradku, system se muze pokusit o prihlaseni teamu
				if(!$fail){
					if(mysqli_query($conn, "INSERT INTO prihlasena_varianta(id_resitel, id_varianta) VALUES($team_id, $variant)")){
						$message = 'Byl jste přihlášen';
					}else {
						$message = 'Přihlášení se nezdařilo';
					}
				}
			}
		}
	}
		
	}
  	//break;
  }
} 




include("template/header.php");
?>

            <h2><?php echo $title ?></h2><br>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])."?id_projekt=$id"; ?>" autocomplete="off">
			<h4><b>Týmy:</b> </h4>
			<select id="box" name="tymy">
					<option value="0">(žádný tým)</option> 	

					<?php
                	$query = "SELECT tym.id_resitel, tym.nazev_tymu FROM tym, clenove_teamu WHERE
                	 login_clena = '$login' AND clenove_teamu.id_teamu = tym.id_resitel AND tym.login_vedouciho = '$login'";
                	$data = mysqli_query($conn, $query) or die("Cannot access database.").mysqli_error($conn);
               		while($data_array = mysqli_fetch_array($data, MYSQLI_ASSOC)){ 	
               		?>

               		<option value="<?php echo "team:".$data_array['id_resitel']?>" <?php  if($team_id==$data_array['id_resitel']) echo "selected"?>><?php echo $data_array['nazev_tymu']?></option> 

               		<?php
               		}
               		?>
			</select> <br><br>
			
            <h4><b>• Předmět:</b> <?php echo $predmet ?></h4>
			<h4><b>• Zadavatel:</b> <?php echo $vyucujici ?></h4>
			<h4><b>• Datum registrace:</b> <?php echo $datum ?></h4>
			<h4><b>• Datum odevzdání:</b> <?php echo $datum ?></h4>
			<h4><b>• Maximum bodů:</b> <?php echo $max_body ?></h4>
			<h4><b>• Minimum bodů:</b> <?php echo $min_body ?></h4>
			<h4><b>• Popis:</b> <?php echo $desc ?></h4><br>

			
			<h2>Varianty</h2>
			<div id="table-scroll">
			 <br> 			
			<div class="msg"><?php echo "{$message}";?></div>
            <table>
                <tr bgcolor="#3d9615"><font color="#FFF">
                    <td><font color="#FFF"><b>VARIANTA</b></font></td> 
					<td><font color="#FFF"><b>POČET PŘIHLÁŠENÝCH</b></font></td> 
					<td><font color="#FFF"><b>KAPACITA</b></font></td> 
					<td><font color="#FFF"><b>PŘIHLÁSIT</b></font></td> 
    			</tr>  

				<?php
                $query = "SELECT id_varianta, maximum_resitelu FROM varianta WHERE projekt = $id";
                $data = mysqli_query($conn, $query) or die("Cannot access database.").mysqli_error($conn);
                while($data_array = mysqli_fetch_array($data, MYSQLI_ASSOC)){ 
                
                //pocet prihlasenych
                $count_data = mysqli_query($conn, "SELECT COUNT(*) FROM prihlasena_varianta WHERE id_varianta = {$data_array['id_varianta']}");
                $count = mysqli_fetch_array($count_data, MYSQLI_NUM);
                
                //kontrola zda je student prihlaseny
                $reg_data = mysqli_query($conn, "SELECT DISTINCT id_varianta FROM prihlasena_varianta, student WHERE (prihlasena_varianta.id_resitel = student.id_resitel AND student.login = '$login' AND prihlasena_varianta.id_varianta = {$data_array['id_varianta']}) OR
                	EXISTS (
                		SELECT clenove_teamu.login_clena FROM clenove_teamu, tym, prihlasena_varianta WHERE
                		prihlasena_varianta.id_varianta = {$data_array['id_varianta']} AND prihlasena_varianta.id_resitel = clenove_teamu.id_teamu AND clenove_teamu.login_clena = '$login'
                	)

                	");
                $reg = mysqli_num_rows($reg_data);
                if($reg >= 1){
                	$button_text = 'ODHLÁSIT';
                }else {
                	$button_text = 'PŘIHLÁSIT';
                }
				$link = "version.php?id_varianta=";
				?>
				
				<tr> 
                  	 <td><a href="<?php echo $link.$data_array['id_varianta']?>"><?php echo $data_array['id_varianta']?></a></td>	
					 <td><?php echo $count[0]?></td>
					 <td><?php echo $data_array['maximum_resitelu']?></td>
					 <td><input type="submit" name="<?php echo $data_array['id_varianta']?>"value="<?php echo $button_text ?>"></td>
                 </tr> 
                 <?php
                 }
                 ?>
             </table> 
             </form>
			</div>			 
                
<?php include("template/footer.php");?>