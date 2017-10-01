<?php
session_start();
require_once 'check_login.php';
require_once 'dbconnect.php';
$title = 'Zapsané předměty - Fakultní informační systém';
include("template/header.php");
?>

            <h2>Zapsané předměty</h2>
              
            <table>
                <tr bgcolor="#3d9615"><font color="#FFF">
                    <td><font color="#FFF"><b>ZAPSANÉ PŘEDMĚTY</b></font></td> 
    			</tr>
                        
                        <?php
                        $login = $_SESSION['login'];
                        $query = "SELECT nazev FROM predmet, student, zapsany_predmet WHERE student.login = '$login' AND student.login = zapsany_predmet.login AND zapsany_predmet.id_predmet = predmet.id_predmet";
                        $data = mysqli_query($conn, $query) or die("Cannot access database.").mysqli_error($conn);
                        while($data_array = mysqli_fetch_array($data, MYSQLI_ASSOC)){ ?>
                                             
                 <tr> 
                  	 <td><?php echo "{$data_array['nazev']}"; ?></td>
                 </tr> 
  

                    <?php
                }

                ?>
                
             </table>      
                
<?php include("template/footer.php");?>