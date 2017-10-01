<?php
session_start();
require_once 'check_login.php';
require_once 'dbconnect.php';
$title = 'Informace - Fakultní informační systém';
include("template/header.php");
?>

            <h2>Informace</h2>
            	<h3>Informační systémy (IIS) - Vysoké Učení Technické v Brně, FIT </h3>
            	<h4><b>• Vytvořili:</b>  Milan Hruban (xhruba08), David Hél (xhelda00) <br>
            	<b>• Projekt:</b>  Přihlašování na projekty (informační systém</h4>

				<h3>Zadání:</h3>
				Navrhněte aplikaci, která umožní studentům přihlašovat se na projekty z předmětů. 
				Systém musí umožnit vložit informace o projektech, včetně velikosti týmů a maximálního počtu týmů, které se mohou na jedno téma přihlásit. 
				Učiteli musí poskytovat přehled obsazení projektů a musí umožnit zadat bodové hodnocení jednotlivých studentů. 
            
<?php include("template/footer.php");?>