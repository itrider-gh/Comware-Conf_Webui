<?php
echo "okok";

$con=mysqli_connect('localhost', 'user', 'password') or die("erreur de connexion");
echo "oui1";
mysqli_select_db($con, "login") or die("erreur de connexion");
echo "oui2";
if (empty($_POST['username']) or empty($_POST['password']) or empty($_POST['site'])){
        echo "<script type=\"text/javascript\"> window.location='registre.php?log=false';</script>";
        echo "erreur dans l'identifiant ou le mot de passe";
}
else {
        $pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        mysqli_query($con, "insert into user (username, password, site) VALUES ('".$_POST['username']."', '".$pass_hash."', '".$_POST['site']."')") or die("erreur de connexion");
        echo "<script type=\"text/javascript\"> window.location='registre.php?log=ok';</script>";
}

mysqli_close($con);

?>

