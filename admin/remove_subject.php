<?php
    session_start();
    require_once 'check_login_admin.php';
    require_once '../dbconnect.php';
    $title = 'Odebrat předmět - Fakultní informační systém';
    include("admin_header.php"); 


    $query = "SELECT nazev, id_predmet FROM predmet";
    $message = '';

    if(isset($_POST['submit'])){
        $expression = htmlspecialchars(strip_tags(trim($_POST['search'])));
        if(empty($expression)){
            $expression = '%';
    }
    $query = "SELECT nazev, id_predmet FROM predmet WHERE LOWER(predmet.nazev) LIKE LOWER('%$expression%')";
}

    $queryAll = "SELECT predmet.id_predmet FROM predmet";
    $data = mysqli_query($conn, $queryAll) or die("Cannot access database.").mysqli_error($conn);
    while($data_array = mysqli_fetch_array($data, MYSQLI_ASSOC)){
        $subject = $data_array['id_predmet'];
        if (isset($_POST[$subject])){  
            if(mysqli_query($conn, "DELETE from predmet WHERE id_predmet = $subject")){
                $message = "Předmet odstraněn";
            }else {
                $message = "Ups, předmět se nepodařilo odstranit";
            }
        }
    }
?>

<!--Obsah stranky-->          
            <h2>Odebrat předmět</h2>

				<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
                <br><div class="msg"><?php echo "{$message}";?></div>
				   <input id="box" type="text" name="search">
				   <input type="submit" value="Vyhledat předmět" size="30" name="submit">
				
				<br><div id="table-scroll">
                <table>

                    <tr bgcolor="#3d9615"><font color="#FFF">
                        <td><font color="#FFF"><b>NÁZEV PŘEDMĚTU</b></font></td> 
                        <td><font color="#FFF"><b>ODEBRAT PŘEDMĚT</b></font></td> 
                    </tr>
                       
                        <?php
                        
                        $data = mysqli_query($conn, $query) or die("Cannot access database.").mysqli_error($conn);
                        while($data_array = mysqli_fetch_array($data, MYSQLI_ASSOC)){?>
                        
                    <tr>
                         <td> <?php echo "{$data_array['nazev']}";?> </td>  
                         <td><input type="submit" value="ODSTRANIT" size="50" name="<?php echo "{$data_array['id_predmet']}"?>"></td>  
                    </tr>    
        
                    <?php
                    }
        
                    ?>
                </table>
				</div>
                </form>
				
         

<?php include("admin_footer.php");?>