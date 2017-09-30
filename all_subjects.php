<?php
session_start();
require_once 'check_login.php';
require_once 'dbconnect.php';
$title = 'Všechny předměty - Fakultní informační systém';
include("template/header.php");
?>

            <h2>Všechny předměty</h2>
           
            <form><br>
               <input type="submit" value="Vyhledat" size="30">
               <input type="text">
            </form> <br>
            
            <table>

                <tr bgcolor="#3d9615"><font color="#FFF">
                    <td><font color="#FFF"><b>NAZEV PREDMETU</b></font></td> 
        			<td><font color="#FFF"><b>GARANT PREDMETU</b></font></td>
    			</tr>
                   
                    <?php
                    $query = "SELECT * FROM predmet, vyucujici WHERE predmet.id_garant = vyucujici.id_vyucujici";
                    $data = mysqli_query($conn, $query) or die("Cannot access database.").mysqli_error($conn);
                    while($data_array = mysqli_fetch_array($data, MYSQLI_ASSOC)){?>
                    
                <tr>
                     <td> <?php echo "{$data_array['nazev']}";?> </td>                
                     <td> <?php echo "{$data_array['jmeno']}";?> </td>  
                </tr>    
    
    			<?php
                }
    
                ?>
            </table>
            

<?php include("template/footer.php");?>