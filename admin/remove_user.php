<?php
    session_start();
    require_once '../check_login.php';
    require_once '../dbconnect.php';
    $title = 'Odebrat uživatele - Fakultní informační systém';
    include("admin_header.php"); 
?>

<!--Obsah stranky-->          
            <h2>Odebrat uživatele</h2>
               
				<form method="post" action="" autocomplete="off"><br>
					   <input id="box" type="text" name="search">
					   <input type="submit" value="Vyhledat uživatele" size="30" name="submit">
				</form>
            
         

<?php include("admin_footer.php");?>