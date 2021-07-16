<!DOCTYPE html>

<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Configuration</title>
    <link rel="stylesheet" href="conf.css"/>

</head>
<body>
<div class="login-box">
    <form action="modify_vlan.php" method="post">

        <h1>Modification d'interfaces</h1>
	<?php
		session_start();
		$con=mysqli_connect('localhost', 'user', 'password') or die("erreur de connexion");
		mysqli_select_db($con, "login") or die("erreur de connexion");
		$query=mysqli_query($con, "select site from user where username ='".$_SESSION['user']."'") or die("erreur de connexion");
		$site=mysqli_fetch_assoc($query);
		echo "<p>Site de ".$site['site']."</p>";
	?>
        <div class="textbox">
		<label>Switch :
			<select name="switch">
				<option>Select switch</option>
				<?php
					$options = array('http' => array(
    					  'method'  => 'GET',
    					  'header' => 'Authorization: Token 0b0964a2582f7051b8eaf35e244aaba0b3bbc604'));
					$context  = stream_context_create($options);
					$json = file_get_contents('http://193.51.100.194:8005/api/1/netbox/?category=GSW&page=1', false, $context);
					$json2 = file_get_contents('http://193.51.100.194:8005/api/1/netbox/?category=GSW&page=2', false, $context);

					$arr = json_decode($json, true);
					$arr2 = json_decode($json2, true);
					$tab=[];
					$nbr=0;
					for ($i=0; $i<100; $i++) {
				        	$temp=$arr['results'][$i]['room']['id'];
						if (strpos($temp, $site['site']) !== false){
							$tab[$nbr]=$arr['results'][$i]['id'];
							echo "<option>".$temp."</option>";
							$nbr++;
						}
					}
					for ($i=0; $i<100; $i++) {
				        	$temp=$arr2['results'][$i]['room']['id'];
						 if (strpos($temp, $site['site']) !== false){
							$tab[$nbr]=$arr2['results'][$i]['id'];
							echo "<option>".$temp."</option>";
							$nbr++;
                                                }
					}
				?>
			</select>
		</label>

        </div>
        <div class="textbox">
		<label>Interface :
                        <select name="interface">
                                <option>Select interface</option>
                                <?php
					$options = array('http' => array(
    					'method'  => 'GET',
					'header' => 'Authorization: Token 0b0964a2582f7051b8eaf35e244aaba0b3bbc604'));
					$context  = stream_context_create($options);
					$page = 1;
					echo "<p>".count($tab)."</p>";
					for ($j = 0; $j < count($tab); $j++) {
						$x=0;
						 while ($x != 1) {
				        		if ($json = file_get_contents('http://193.51.100.194:8005/api/1/interface/?netbox='.$tab[$j].'&iftype=6&page='.$page, false, $context)) {
                						$arr = json_decode($json, true);
                						for ($i = 0; $i<100; $i++) {
									if (!empty($arr['results'][$i]['ifname'])) {
					                        		echo "<option>".$arr['results'][$i]['ifname']."</option>";
									}
                						}
                						$page = $page + 1;
        						}
				        		else {
                						$x = 1;
        						}
						}
					}

                                ?>
                        </select>
                </label>

        </div>
	<div class="textbox">
                <input type="text" name="vlan" placeholder="Vlan:  "/>
        </div>
        <input class="btn" type="submit" name="" value="Lancer le Playbook">
	</form>
 <!-- https://www.youtube.com/watch?v=MYmx8S4349s -->
</div>

</body>
</html>

