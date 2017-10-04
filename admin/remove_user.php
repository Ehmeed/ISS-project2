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
        $query_teacher = "SELECT jmeno, id_vyucujici, login FROM vyucujici  WHERE LOWER(login) LIKE LOWER('%$expression%') OR  LOWER(jmeno) LIKE LOWER('%$expression%')";
        $query_admin = "SELECT login FROM admin WHERE LOWER(login) LIKE LOWER('%$expression%')";
    }

    // odstranit studenta
    $query_all_student = "SELECT id_resitel FROM student";
    $data = mysqli_query($conn, $query_all_student) or die("Cannot access database.").mysqli_error($conn);
    while($data_array = mysqli_fetch_array($data, MYSQLI_ASSOC)){
        $subject = "student:" . $data_array['id_resitel'];
        if (isset($_POST[$subject])){  
            $id = $data_array['id_resitel'];

            if(mysqli_query($conn, "DELETE from student WHERE id_resitel = $id")){
                mysqli_query($conn, "DELETE from resitel WHERE id_resitel = $id");
                $message = "Student odstraněn";
            }else {
                $message = "Ups, studenta se nepodařilo odstranit";
            }
        }
    }

    // odstranit ucitele
    $query_all_teacher = "SELECT id_vyucujici FROM vyucujici";
    $data = mysqli_query($conn, $query_all_teacher) or die("Cannot access database.").mysqli_error($conn);
    while($data_array = mysqli_fetch_array($data, MYSQLI_ASSOC)){
        $subject = "teacher:" . $data_array['id_vyucujici'];
        if (isset($_POST[$subject])){  
            $id = $data_array['id_vyucujici'];

            if(mysqli_query($conn, "DELETE from vyucujici WHERE id_vyucujici = $id")){
                $message = "Vyučující odstraněn";
            }else {
                $message = "Ups, vyučujícího se nepodařilo odstranit";
            }
        }
    }

    // odstranit admina
    $query_all_admin = "SELECT login FROM admin";
    $data = mysqli_query($conn, $query_all_admin) or die("Cannot access database.").mysqli_error($conn);
    while($data_array = mysqli_fetch_array($data, MYSQLI_ASSOC)){
        $subject = "admin:" . $data_array['login'];
        if (isset($_POST[$subject])){  
            $id = $data_array['login'];
            if(mysqli_query($conn, "DELETE from admin WHERE login = '$id'")){
                $message = "Admin odstraněn";
            }else {
                $message = "Ups, admina se nepodařilo odstranit";
            }
        }
    }

?>

<!--Obsah stranky-->          
            <h2>Odebrat uživatele</h2>
               
				<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
                <br><div class="msg"><?php echo "{$message}";?></div>
					   <input id="box" type="text" name="search">
					   <input type="submit" value="Vyhledat uživatele" size="30" name="submit">
				
				
				<br><table>

					<tr bgcolor="#3d9615"><font color="#FFF">
						<td><font color="#FFF"><b>JMÉNO</b></font></td> 
						<td><font color="#FFF"><b>LOGIN</b></font></td>
						<td><font color="#FFF"><b>ZAŘAZENÍ</b></font></td>
						<td><font color="#FFF"><b>ODEBRAT</b></font></td>
					</tr>
					   
				    <!--  STUDENTI -->
                    <?php                        
                        $data = mysqli_query($conn, $query_student) or die("Cannot access database.").mysqli_error($conn);
                        while($data_array = mysqli_fetch_array($data, MYSQLI_ASSOC)){
                    ?>
        					<tr>
        						<td> <?php echo "{$data_array['jmeno']} {$data_array['prijmeni']}";?>  </td>                
        						<td> <?php echo "{$data_array['login']}";?>  </td>  
        						<td> student </td>  
        						<td><input type="submit" value="ODSTRANIT" name="<?php echo "student:{$data_array['id_resitel']}"?>"></td> 
        					</tr>    
                    <?php
                        }
                    ?>
                    <!--  UCITELE -->
                    <?php                        
                        $data = mysqli_query($conn, $query_teacher) or die("Cannot access database.").mysqli_error($conn);
                        while($data_array = mysqli_fetch_array($data, MYSQLI_ASSOC)){
                    ?>
                            <tr>
                                <td> <?php echo "{$data_array['jmeno']}";?>  </td>                
                                <td> <?php echo "{$data_array['login']}";?>  </td>  
                                <td> vyučující </td>  
                                <td><input type="submit" value="ODSTRANIT" name="<?php echo "teacher:{$data_array['id_vyucujici']}"?>"></td> 
                            </tr>    
                    <?php
                        }
                    ?>
                    <!--  ADMINI -->
                     <?php                        
                        $data = mysqli_query($conn, $query_admin) or die("Cannot access database.").mysqli_error($conn);
                        while($data_array = mysqli_fetch_array($data, MYSQLI_ASSOC)){
                    ?>
                            <tr>
                                <td> - - -  </td>                
                                <td> <?php echo "{$data_array['login']}";?>  </td>  
                                <td> admin </td>  
                                <td><input type="submit" value="ODSTRANIT" name="<?php echo "admin:{$data_array['login']}"?>"></td> 
                            </tr>    
                    <?php
                        }
                    ?>

            </table>
            </form>
            
         

<?php include("admin_footer.php");?>