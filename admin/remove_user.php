<?php
    session_start();
    require_once 'check_login_admin.php';
    require_once '../dbconnect.php';
    $title = 'Odebrat uživatele - Fakultní informační systém';
    include("admin_header.php"); 

    // TODO REMOVE I RESITEL KDYZ REMOVE SUTDNET

    $query_student = "SELECT jmeno, prijmeni, id_resitel, login FROM student";
    $query_teacher = "SELECT jmeno, id_vyucujici, login FROM vyucujici";
    $query_admin = "SELECT login FROM admin";
    $message = '';

    if(isset($_POST['submit'])){
        $expression = htmlspecialchars(strip_tags(trim($_POST['search'])));
        if(empty($expression)){
            $expression = '%';
        }
        $query_student = "SELECT jmeno, prijmeni, id_resitel, login, rodne_cislo FROM student WHERE LOWER(login) LIKE LOWER('%$expression%') OR
                          LOWER(jmeno) LIKE LOWER('%$expression%') OR LOWER(prijmeni) LIKE LOWER('%$expression%') OR LOWER(rodne_cislo) LIKE LOWER('%$expression%')";
        $query_teacher = "SELECT jmeno, id_vyucujici, login FROM vyucujici  LOWER(login) LIKE LOWER('%$expression%') OR  LOWER(jmeno) LIKE LOWER('%$expression%')";
        $query_admin = "SELECT login FROM admin WHERE LOWER(login) LIKE LOWER('%$expression%')";
    }

?>

<!--Obsah stranky-->          
            <h2>Odebrat uživatele</h2>
               
				<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
                <br><div class="msg"><?php echo "{$message}";?></div>
					   <input id="box" type="text" name="search">
					   <input type="submit" value="Vyhledat uživatele" size="30" name="submit">
				</form>
				
				<br><table>

					<tr bgcolor="#3d9615"><font color="#FFF">
						<td><font color="#FFF"><b>JMÉNO</b></font></td> 
						<td><font color="#FFF"><b>LOGIN</b></font></td>
						<td><font color="#FFF"><b>ZAŘAZENÍ</b></font></td>
						<td><font color="#FFF"><b>ODEBRAT</b></font></td>
					</tr>
					   
				 
					<tr>
						<td> X </td>                
						<td> X </td>  
						<td> X </td>  
						<td><input type="submit" value="<?php ?>"></td> 
					</tr>    

            </table>
            
         

<?php include("admin_footer.php");?>