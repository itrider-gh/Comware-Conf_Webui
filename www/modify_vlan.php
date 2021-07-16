<?php

$file=fopen("../txt/temp.txt","r+");

echo $_POST['vlan'];

fwrite($file, $_POST['vlan'].":".$_POST['interface'].":".$_POST['switch']);
fclose($file);

//sleep(10);

$file=fopen("../txt/log.txt", "r");
$log=fread($file, filesize("../txt/log.txt"));
echo $log;
fclose($file);

?>
