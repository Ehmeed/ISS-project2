<?php
session_start();
require_once 'check_login.php';
require_once 'dbconnect.php';
$title = 'Všechny předměty - Fakultní informační systém';
include("template/header.php");

$query = "SELECT * FROM predmet, vyucujici WHERE predmet.id_garant = vyucujici.id_vyucujici";

if(isset($_POST['submit'])){
    $expression = htmlspecialchars(strip_tags(trim($_POST['search'])));
    if(empty($expression)){
        $expression = '%';
    }
    $query = "SELECT * FROM predmet, vyucujici WHERE predmet.id_garant = vyucujici.id_vyucujici AND LOWER(predmet.nazev) LIKE LOWER('%$expression%')";
}
?>

            <h2>Všechny předměty</h2>
           
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off"><br>
               <input type="text" name="search">
               <input type="submit" value="Vyhledat" size="30" name="submit">
               
            </form> <br>
            
            <table>

                <tr bgcolor="#3d9615"><font color="#FFF">
                    <td><font color="#FFF"><b>NAZEV PREDMETU</b></font></td> 
        			<td><font color="#FFF"><b>GARANT PREDMETU</b></font></td>
    			</tr>
                   
                    <?php
                    
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