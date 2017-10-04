<?php
    session_start();
    require_once 'check_login_teacher.php';
    require_once '../dbconnect.php';
    $title = 'Předměty - Fakultní informační systém';
    include("teacher_header.php"); 
?>

<!--Obsah stranky-->          
            <h2>Předměty</h2>

            
        

<?php include("teacher_footer.php");?>