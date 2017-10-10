<?php
    session_start();
    require_once 'check_login_teacher.php';
    require_once '../dbconnect.php';
    $title = 'Projekty - Fakultní informační systém';
    include("teacher_header.php"); 
?>

<!--Obsah stranky-->          
            <h2>Projekty</h2>
			
			    <a href="my_projects.php" class="link"><button class="tlacitko"><h4>MOJE PROJEKTY</h4></button></a><br><br>
                <a href="create_project.php" class="link"><button class="tlacitko"><h4>VYTVOŘIT NOVÝ</h4></button></a><br><br>
                

            
        

<?php include("teacher_footer.php");?>