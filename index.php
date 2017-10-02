<?php

	ob_start();
	session_start();
	require_once 'dbconnect.php';

	$error = false;
	$loginError = '';
	$passwordError = '';
	$wrongLogin = false;
	$wrongLoginMessage = "Špatné přihlašovací jméno nebo heslo.";
	$login = '';
	$password = '';

	// check is user already logged in, redirect
	if(isset($_SESSION['login'])){
		header("Location: home.php");
        exit;
	}

	if( isset($_POST['btn-login']) ) {  
			$login = htmlspecialchars(strip_tags(trim($_POST['login'])));
			$password = htmlspecialchars(strip_tags(trim($_POST['password'])));

			if(empty($login)){
				$loginError = 'Zadejte login';
				$error = true; 
			}
			if(empty($password)){
				$passwordError = "Zadejte heslo";
				$error = true;
			}

			if(!$error){
				// check login and password in db
				//$password = md5($password); TODO
				$query = "SELECT id_resitel, login, password FROM student WHERE login='$login'";
				$data = mysqli_query($conn, $query) or die("Cannot access database.").mysqli_error($conn);
				$data_array = mysqli_fetch_array($data, MYSQLI_ASSOC);

				if(mysqli_num_rows($data) == 1 && $data_array['password'] == $password){
					$_SESSION['login'] = $login;
					$_SESSION['power'] = "student";
					header("Location: home.php");
				} else {
					$query = "SELECT login, password FROM vyucujici WHERE login='$login'";
					$data = mysqli_query($conn, $query) or die("Cannot access database.").mysqli_error($conn);
					$data_array = mysqli_fetch_array($data, MYSQLI_ASSOC);		
					if(mysqli_num_rows($data) == 1 && $data_array['password'] == $password){
						$_SESSION['login'] = $login;
						$_SESSION['power'] = "teacher";
						header("Location: home.php"); // TODO REDIRECT TO TEACHER SITE
					} else {
						$query = "SELECT login, password FROM admin WHERE login='$login'";
						$data = mysqli_query($conn, $query) or die("Cannot access database.").mysqli_error($conn);
						$data_array = mysqli_fetch_array($data, MYSQLI_ASSOC);
						if(mysqli_num_rows($data) == 1 && $data_array['password'] == $password){
							$_SESSION['login'] = $login;
							$_SESSION['power'] = "admin";
							header("Location: admin/home.php"); // TODO REDIRECT TO TEACHER SITE
						} else {
							$wrongLogin = true;
						}		
					}					
					
				}

			}

	}

	
?>

<!-- html část-->

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Fakultní informační systém</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
    <link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

<div class="container">

	<div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    
    	<div class="col-md-12">
        
        	<div class="form-group">
            	<h2 class="">Vstoupit do systému</h2>
            </div>
        
        	<div class="form-group">
            	<hr />
            </div>
            
             <?php
			if ($wrongLogin) {
				
				?>
				<div class="form-group">
            	<div class="alert alert-danger">
				<span class="glyphicon glyphicon-info-sign"></span> <?php echo $wrongLoginMessage; ?>
                </div>
            	</div>
                <?php
			}
			?>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            	<input type="login" name="login" class="form-control" placeholder="Login" maxlength="40" />
                </div>
                <span class="text-danger"><?php echo $loginError; ?></span>
            </div>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            	<input type="password" name="password" class="form-control" placeholder="Heslo" maxlength="15" />
                </div>
                <span class="text-danger"><?php echo $passwordError; ?></span>
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="btn-login">PŘIHLÁSIT SE</button>
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
        
        </div>
   
    </form>
    </div>	

</div>

</body>
</html>
<?php ob_end_flush(); ?>