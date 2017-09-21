<?php
	session_start();
?>

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
    <div class="col-md-12">

        <div class="form-group">
        <h2>Fakultní informační systém</h2>
        </div>

        <div class="form-group">
            <hr />
        </div>

    <div class="form-group">
        <div class="input-group">
            <a href="index.php" style="text-decoration: none"><button type="submit" class="btn btn-block btn-primary"><h4>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspPŘIHLÁSIT SE JAKO STUDENT&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</h4></button></a>
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <a href="index.php" style="text-decoration: none"><button type="submit" class="btn btn-block btn-primary"><h4>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspPŘIHLÁSIT SE JAKO VYUČUJÍCÍ&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</h4></button></a>
    </div>
    </div>

    </div>
    </div>

</div>

</body>
</html>
<?php ob_end_flush(); ?>
