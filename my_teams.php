<?php
session_start();
require_once 'check_login.php';
require_once 'dbconnect.php';
$title = 'Moje týmy - Fakultní informační systém';
include("template/header.php");

$login = $_SESSION['login'];
$query = "SELECT tym.nazev_tymu, tym.login_vedouciho, tym.id_resitel FROM tym, clenove_teamu WHERE tym.id_resitel = clenove_teamu.id_teamu AND clenove_teamu.login_clena = '$login'";
?>

     	<h2>Moje týmy</h2><br>	
		
			<div id="table-scroll">	            
            <table>

                <tr bgcolor="#3d9615"><font color="#FFF">
                    <td><font color="#FFF"><b>NÁZEV TÝMU</b></font></td> 
        			<td><font color="#FFF"><b>VEDOUCÍ</b></font></td>
    			</tr>
                   
                    <?php 
                    $data = mysqli_query($conn, $query);
                    while($data_array = mysqli_fetch_array($data, MYSQLI_ASSOC)){

                    ?>
                    
                <tr>
                     <td> <a href="members.php?id_teamu=<?php echo $data_array['id_resitel']?>"><?php echo $data_array['nazev_tymu']?> </a></td>                
                     <td> <?php echo $data_array['login_vedouciho']?> </td>  
                </tr>    
            <?php 
                }
            ?>
	
            </table>
            </div>


<?php include("template/footer.php");?>