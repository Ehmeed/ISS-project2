<?php
    session_start();
    require_once 'check_login.php';
    require_once 'dbconnect.php';
    $title = '�vod - Fakultní informační systém';
    include("template/header.php"); 
?>

<!--Obsah stranky-->          
            <h2>Úvod</h2>
            <h4><b>Poslední přihlášení:</b> <i><span id="currTime"></span></i></h4>
            <h4><b>Jméno:</b> <?php 
                    $login = $_SESSION['login'];
                    $data_array = dbquery("SELECT jmeno, prijmeni FROM student WHERE login='$login'", $conn);?>
                    <i><?php echo $data_array['jmeno']. ' ' . $data_array['prijmeni']; ?></i>
            </h4>
            <h4><b>Login:</b> <i><?php echo $_SESSION['login'] ?> </i></h4>
            
        

<script>
    var time = new Date();
    document.getElementById("currTime").innerHTML = time.toLocaleTimeString();
</script>    
            

<?php include("template/footer.php");?>