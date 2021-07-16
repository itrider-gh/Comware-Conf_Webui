<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>registre</title>
	<link rel="stylesheet" href="registre.css"/>
</head>

<body>

<div id="login">
	<a href="login.php"><h4>Login</h4></a>
</div>

<div class="login-box">

	<div class="regfrom"><h1>Enregistrement netadmin</h1></div>
	<div class="mane">
		<form method="post" action="traitement.php">
		 <div class="textbox">
            <input type="text" placeholder="Username:" name="username" value="">
        </div>
			 <div class="textbox">
            <input type="text" placeholder="Password:" name="password" value="">
        </div>
<!--		 </div>
			 <div class="textbox">
            <input type="text" placeholder="Password Confirmation:" name="" value="">
        </div>
		</div>
-->
		<div class="textbox">
			<label>Site :
				<select name="site">
					<option>Select Site</option>
					<option>cmc</option>
					<option>bonneuil</option>
					<option>chu</option>
					<option>droit</option>
					<option>etex</option>
					<option>fbleau</option>
					<option>livry</option>
					<option>melun</option>
					<option>pyram</option>
					<option>senart</option>
					<option>staps</option>
					<option>stdenis</option>
					<option>stsimon</option>
					<option>torcy</option>
					<option>vitry</option>
					<option>zmd</option>
				</select>
			</label>
		</div>
		<input class="btn" type="submit" name="" value="Enregistre">
		<?php
			if ($_GET['log'] == "false"){
				echo "<p class='middle'>Erreur lors de l'inscription.</p>";
			}
			if ($_GET['log'] == "ok"){
                                echo "<p class='middle'>Enregistrement effectué, faire un autre enregistrement?</p>";
                        }
		?>
		</form>
	</div>
	</div>
	</body>
</html>
