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

//nacteni dat projektu
$data = mysqli_query($conn,"SELECT DISTINCT projekt.nazev, projekt.popis, projekt.maximum_bodu, projekt.minimum_bodu, projekt.datum_odevzdani, vyucujici.jmeno, predmet.nazev, projekt.datum_prihlaseni FROM projekt, predmet, vyucujici WHERE projekt.id_projekt = $id AND projekt.predmet = predmet.id_predmet AND projekt.zadavatel = vyucujici.id_vyucujici") or die("Cannot access database.").mysqli_error($conn);
$data_array = mysqli_fetch_array($data, MYSQLI_NUM);
if(mysqli_num_rows($data) != 1){
	header("Location: home.php");
    exit;
}

// ZDE ZPRACOVANI PRI KLIKNUTI NA TLACITKO PRIHLASIT
// TODO TEAMY VYTVARENI 

$title = $data_array[0];
$desc = $data_array[1];
$max_body = $data_array[2];
$min_body = $data_array[3];
$datum = $data_array[4];
$vyucujici = $data_array[5];
$predmet = $data_array[6];
$datum_registrace = $data_array[7];
$button_text = '';

include("template/header.php");
?>

            <h2><?php echo $title ?></h2><br>
			
			<h4><b>Týmy:</b> </h4>
			<select id="box" name="tymy">
					<option value=""></option> 		
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
			 <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])."?id_projekt=$id"; ?>" autocomplete="off"><br> 			
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
					 <td><input type="submit" name="<?php echo $data_array['id_varianta']?>"value="<?php echo $button_text ?>"></td><!-- TADY MÁŠ TEN BUTTON -->
                 </tr> 
                 <?php
                 }
                 ?>
             </table> 
             </form>
			</div>			 
                
<?php include("template/footer.php");?>