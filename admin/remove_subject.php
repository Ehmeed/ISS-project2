<?php
    session_start();
    require_once 'check_login_admin.php';
    require_once '../dbconnect.php';
    $title = 'Odebrat předmět - Fakultní informační systém';
    include("admin_header.php"); 
?>

<!--Obsah stranky-->          
            <h2>Odebrat předmět</h2>

				<form method="post" action="" autocomplete="off"><br>
				   <input id="box" type="text" name="search">
				   <input type="submit" value="Vyhledat předmět" size="30" name="submit">
				</form>
         

<?php include("admin_footer.php");?>