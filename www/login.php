<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Login page</title>
    <link rel="stylesheet" href="style.css"/>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<a href="Page 2\configuration.php"></a>
</head>
<body>
<div class="login-box">
    <form action="welcome.php" method="post">

        <h1>Login</h1>
        <div class="textbox">
			<i class="fas fa-user"></i>
            <input type="text" placeholder="Username" name="username" value="">
        </div>

        <div class="textbox">
			<i class="fas fa-unlock"></i>
            <input type="password" placeholder="Password" name="password" value="">
        </div>
        <input class="btn" type="submit" name="" value="Connexion"> </a>
	</form>
	<?php
	if ($_GET['log'] == "false"){
		echo "<p>username ou password incorrect</p>";
	}
	?>
	<!-- https://www.youtube.com/watch?v=D1DiyGOtwlM -->

</div>
</body>
</html>

