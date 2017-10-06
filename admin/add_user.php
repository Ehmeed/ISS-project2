<?php
    session_start();
    require_once 'check_login_admin.php';
    require_once '../dbconnect.php';
    $title = 'Přidat uživatele - Fakultní informační systém';
    include("admin_header.php"); 
?>

<!--Obsah stranky-->          
            <h2>Přidat uživatele</h2><br>	
				<a href="add_student.php" class="link"><button class="tlacitko"><h4>PŘIDAT STUDENTA</h4></button></a><br><br>
                <a href="add_teacher.php" class="link"><button class="tlacitko"><h4>PŘIDAT VYUČUJÍCÍHO</h4></button></a><br><br>
                <a href="add_admin.php" class="link"><button class="tlacitko"><h4>PŘIDAT ADMINISTRÁTORA</h4></button></a>
            
        

<?php include("admin_footer.php");?>