<?php

$con=mysqli_connect('localhost', 'user', 'password') or die("erreur de connexion");
echo "oui1";

mysqli_select_db($con, "login") or die("erreur de connexion");
echo "oui2";

echo $_POST['password'];

$query=mysqli_query($con, "select password from user where username ='".$_POST['username']."'") or die("erreur de connexion");

$pass_hash=mysqli_fetch_assoc($query);

echo $pass_hash;

if (password_verify($_POST['password'], $pass_hash['password']))
{
  echo "Mot de passe correct";
  session_start();
  $_SESSION["user"]=$_POST['username'];
  echo $_SESSION["user"];
  echo "<script type=\"text/javascript\"> window.location='configuration.php';</script>";
}
else
{
  echo "Mot de passe incorrect";
  echo "<script type=\"text/javascript\"> window.location='login.php?log=false';</script>";
}

?>
