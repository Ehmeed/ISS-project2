<?php
    session_start();
    require_once 'check_login_admin.php';
    require_once '../dbconnect.php';
    $title = 'Úvod - Administrace - Fakultní informační systém';
    include("admin_header.php"); 
?>

<!--Obsah stranky-->          
            <h2>Administrace</h2>
            <h4><b>Poslední přihlášení:</b> <i><span id="currTime"></span></i></h4>
            <h4><b>Přihlášen jako administrátor:</b> <?php echo $_SESSION['login'] ?>
            
            
        

<script>
    var time = new Date();
    document.getElementById("currTime").innerHTML = time.toLocaleTimeString();
</script>    
            

<?php include("admin_footer.php");?>